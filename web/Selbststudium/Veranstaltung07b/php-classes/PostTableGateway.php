<?php
require_once 'includes/config.inc.php';
require_once 'php-classes/Post.php';

class PostTableGateway {
    private $conn;

    /*-----------------------------------------*/

    public function __construct() {
        $this->conn = $this->connect();
    }
    
    /*-----------------------------------------*/
    
    private function connect(){
        $host='localhost';
        $dbname=DBNAME;
        $username=USERNAME;
        $password=PASSWORD;
        
        try{
            $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password, array(
                PDO::ATTR_PERSISTENT => true
            ));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
            
            return $conn;
        } catch(PDOException $e) {
            exit('Error: '.$e->getMessage().'</br>');
        }
    }
        
    /*-----------------------------------------*/

    public function getAllPosts() {
        try {
            $stmt = $this->conn->prepare('SELECT * FROM tbl_hoehnmic ORDER BY created');
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
            $stmt->execute();
            
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            exit('Error: '.$e->getMessage().'</br>');
        }
    }
        
    public function findByID($id) {
        try {
            $stmt = $this->conn->prepare('SELECT * FROM tbl_hoehnmic WHERE id = :id');
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
            $stmt->execute(array(
                'id' => $id
            ));
         
            return $stmt->fetch();
        } catch(PDOException $e) {
            exit('Error: '.$e->getMessage().'</br>');
        }
    }

    public function findByAttribute($attribute, $value) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM tbl_person WHERE $attribute = :$attribute");
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
            $stmt->execute(array(
                ":$attribute" => $value
            ));
         
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            exit('Error: '.$e->getMessage().'</br>');
        }
    }
    
    /*-----------------------------------------*/

    public function insert($title, $content) {
        if(!trim($title) || !trim($content)){
            return;
        }
        
        try {
            $stmt = $this->conn->prepare('INSERT INTO tbl_hoehnmic (created, title, content) VALUES (:created, :title, :content)');
            $stmt->execute(array(
                ':created' => NULL,
                ':title' => $title,
                ':content' => $content
            ));
            
            return $this->conn->lastInsertId();
        } catch(PDOException $e) {
            exit('Error: '.$e->getMessage().'</br>');
        }
    }
    
    public function update($id, $title, $content) {
        if(!trim($title) || !trim($content)){
            return;
        }
        
        try {
            $stmt = $this->conn->prepare('UPDATE tbl_hoehnmic SET title=:title, content=:content WHERE id = :id');
            $stmt->execute(array(
                ':id' => $id,
                ':title' => $title,
                ':content' => $content
            ));
        } catch(PDOException $e) {
            exit('Error: '.$e->getMessage().'</br>');
        }
    }
    
    public function delete($id) {
        try {
            $stmt = $this->conn->prepare('DELETE FROM tbl_hoehnmic WHERE id=:id');
            $stmt->execute(array(
                ':id' => $id
            ));
        } catch(PDOException $e) {
            exit('Error: '.$e->getMessage().'</br>');
        }
    }
} 

?>
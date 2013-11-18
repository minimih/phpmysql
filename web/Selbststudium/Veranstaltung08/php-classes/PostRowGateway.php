<?php
require_once 'includes/config.inc.php';

class PostRowGateway {
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
    
    private function getMutex( $dbo, $id )
    {
        // Get the previous state of the mutex from the table and increment by one (this is an atomic operation)
        $stmt = $this->conn->prepare('SELECT mutex FROM tbl_hoehnmic WHERE id=:id; UPDATE tbl_hoehnmic SET mutex = mutex + 1  WHERE id = :id');
        $stmt->bindParam( ":id", $id );
        $stmt->execute();
        $mutex = $stmt->fetch();

        // Increment the returned mutex by one, this is the expected state if no update occured in between
        return $mutex[0] + 1;
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
    
    /*-----------------------------------------*/

    public function insert($title, $content) {
        if(!trim($title) || !trim($content)){
            return;
        }
        
        try {
            $stmt = $this->conn->prepare('INSERT INTO tbl_hoehnmic (created, title, content, mutex) VALUES (:created, :title, :content, :mutex)');
            $stmt->execute(array(
                ':created' => NULL,
                ':title' => $title,
                ':content' => $content,
                ':mutex' => 0
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
            $mutex = $this->getMutex( $dbo, $id );

            $stmt = $this->conn->prepare('UPDATE tbl_hoehnmic SET title=:title, content=:content WHERE id = :id AND mutex=:mutex');
            $stmt->execute(array(
                ':id' => $id,
                ':title' => $title,
                ':content' => $content,
                ':mutex' => $mutex
            ));
        } catch(PDOException $e) {
            exit('Error: '.$e->getMessage().'</br>');
        }
    }
    
    public function delete($id) {
        try {
            $stmt = $this->conn->prepare('DELETE FROM tbl_hoehnmic WHERE id=:id AND mutex=:mutex');
            $stmt->execute(array(
                ':id' => $id,
                ':mutex' => $mutex
            ));
        } catch(PDOException $e) {
            exit('Error: '.$e->getMessage().'</br>');
        }
    }
} 

?>
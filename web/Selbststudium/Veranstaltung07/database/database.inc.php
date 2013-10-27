<?php
function connect(){
    $host='localhost';
    $dbname='loc_orm';
    $username='loc_orm';
    $password='12341234';
    $tablename='tbl_hoehnmic';
    
    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, array(
            PDO::ATTR_PERSISTENT => true
        ));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        
        return $conn;
    } catch(PDOException $e) {
        exit('Error: '.$e->getMessage().'</br>');
    }
}

//posts
function getPosts(){
    $conn = connect();
    try {
        $stmt = $conn->prepare("SELECT * FROM $tablename ORDER BY id");
        $stmt->execute();
        
        return $stmt->fetchAll();
    } catch(PDOException $e) {
        exit('Error: '.$e->getMessage().'</br>');
    }
}

function getPostById($id){
    $conn = connect();
    try {
        $stmt = $conn->prepare("SELECT * FROM $tablename WHERE id = :id");
        $stmt->execute(array(
            'id' => $id
        ));
     
        return $stmt->fetchAll();
    } catch(PDOException $e) {
        exit('Error: '.$e->getMessage().'</br>');
    }
}

function addPost($title, $content){
    if(!trim($title)){
        return;
    }
        
    $conn = connect();
    try {
        $stmt = $conn->prepare("INSERT INTO $tablename (title, content) VALUES (:title, :content)");
        $stmt->execute(array(
            ':title' => $title,
            ':content' => $content
        ));
    } catch(PDOException $e) {
        exit('Error: '.$e->getMessage().'</br>');
    }    
}

function deletePost($id){
    $conn = connect();
    try {
        $stmt = $conn->prepare("DELETE FROM $tablename WHERE id=:id");
        $stmt->execute(array(
            ':id' => $id
        ));
    } catch(PDOException $e) {
        exit('Error: '.$e->getMessage().'</br>');
    }    
}

function editPost($id, $title, $content){
    $conn = connect();
    try {
        $stmt = $conn->prepare("UPDATE $tablename SET (title=:title, content=:content) WHERE id = :id");
        $stmt->execute(array(
            ':id' => $id,
            ':title' => $title,
            ':content' => $content
        ));
    } catch(PDOException $e) {
        exit('Error: '.$e->getMessage().'</br>');
    }
}

?>
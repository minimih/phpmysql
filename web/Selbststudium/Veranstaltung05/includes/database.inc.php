<?php
function connect(){
    $host='localhost';
    $dbname='todo_app';
    $username='todo';
    $password='nFVUCj9T2D4X6pbP';
    
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

//items
function getAllItems(){
    $conn = connect();
    try {
        $stmt = $conn->prepare('SELECT * FROM todos ORDER BY completed, id');
        $stmt->execute();
        
        return $stmt->fetchAll();
    } catch(PDOException $e) {
        exit('Error: '.$e->getMessage().'</br>');
    }
}

function getItem($id){
    $conn = connect();
    try {
        $stmt = $conn->prepare('SELECT * FROM todos WHERE id = :id');
        $stmt->execute(array(
            'id' => $id)
        );
     
        return $stmt->fetchAll();
    } catch(PDOException $e) {
        exit('Error: '.$e->getMessage().'</br>');
    }
}

function addItem($title, $completed = false){
    if(!trim($title)){
        return;
    }
        
    $conn = connect();
    try {
        $stmt = $conn->prepare('INSERT INTO todos (title, completed) VALUES (:title, :completed)');
        $stmt->execute(array(
            ':title' => $title,
            ':completed' => $completed
        ));
    } catch(PDOException $e) {
        exit('Error: '.$e->getMessage().'</br>');
    }    
}

function updateItem($id, $title, $completed){
    $conn = connect();
    try {
        $stmt = $conn->prepare('UPDATE todos SET title=:title, completed=:completed WHERE id = :id');
        $stmt->execute(array(
            ':id' => $id,
            ':title' => $title,
            ':completed' => $completed
        ));
    } catch(PDOException $e) {
        exit('Error: '.$e->getMessage().'</br>');
    }
}

function deleteItem($id){
    $conn = connect();
    try {
        $stmt = $conn->prepare('DELETE FROM todos WHERE id=:id');
        $stmt->execute(array(
            ':id' => $id
        ));
    } catch(PDOException $e) {
        exit('Error: '.$e->getMessage().'</br>');
    }    
}
?>
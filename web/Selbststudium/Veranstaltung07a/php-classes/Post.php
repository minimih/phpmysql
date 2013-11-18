<?php
require_once 'php-classes/PostRowGateway.php';

class Post {
    private $id;
    private $created;
    private $title;
    private $content;
    
    private $gateway;
    
    function __construct(){
        $this->gateway = new PostRowGateway();
    }
    
    /*-----------------------------------------*/

    public function findByID($id) {
        return  $this->gateway->findById($id);
    }

    /*-----------------------------------------*/
    
    public function insert() {
        $this->gateway->insert($this->title, $this->content);
    }
    
    public function update() {
        $this->gateway->update($this->id, $this->title, $this->content);
    }
    
    public function delete() {
        $this->gateway->delete($this->id);
    }
    
    /*-----------------------------------------*/
    //getter/setter
    
    public function getID(){
        return $this->id;
    }

    public function setID($val){
        $this->id = $val;
    }
    
    public function getCreated(){
        return $this->created;        
    }
    public function setCreated($val){
        $this->created = $val;
    }
    
    public function getTitle(){
        return $this->title;        
    }
    public function setTitle($val){
        $this->title = $val;        
    }
    
    public function getContent(){
        return $this->content;        
    }
    public function setContent($val){
        $this->content = $val;        
    }
} 

?>
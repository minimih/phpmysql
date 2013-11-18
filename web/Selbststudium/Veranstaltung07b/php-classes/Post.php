<?php

class Post {
    private $id;
    private $created;
    private $title;
    private $content;
    
    /*-----------------------------------------*/
    //getter/setter
    
    public function getID(){
        return $this->id;
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
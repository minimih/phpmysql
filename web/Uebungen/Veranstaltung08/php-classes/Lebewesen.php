<?php

abstract class Lebewesen {
    protected $alter = 0;
    
    abstract public function altern();

    /*-----------------------------------------*/
    //getter/setter
    
    public function getAlter(){
        echo "$this->alter <br/>";        
    }
}

?>
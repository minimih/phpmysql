<?php
require_once 'Mensch.php';

class Schweizer extends Mensch {
    
    public function __construct(){
        
    }

    public function umbenennen($value){
        Mensch::umbenennen($value);
        
        $this->behoerdengang();
    }
    
    public function behoerdengang(){
        throw new Exception("Geduldsfaden gerissen", 1);
    }
}

?>
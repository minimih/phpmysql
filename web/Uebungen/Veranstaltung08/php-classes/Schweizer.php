<?php
require_once 'Mensch.php';

class Schweizer extends Mensch {
    
    public function __construct($name, $geschlecht){
        parent::__construct($name, $geschlecht);
    }

    public function umbenennen($value){
        parent::umbenennen($value);
        
        $this->behoerdengang();
    }
    
    public function behoerdengang(){
        throw new Exception("Geduldsfaden gerissen", 1);
    }
}

?>
<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    require_once 'php-classes/Mensch.php';
    require_once 'php-classes/Schweizer.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>The awesome evolution of oop</title>
    </head>
    <body>
        <?php
        $mensch = new Mensch("Albert Einstein", "mann");
        $mensch->getName();
        
        $mensch->umbenennen("Alan Turing");

        $mensch->getAlter();
        
        //get_class($this -> mensch);
        
        $mensch->getVorfahre();
        ?>
    </body>
</html>
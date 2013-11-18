<!DOCTYPE HTML>

<?php
 error_reporting(E_ALL);
        ini_set("display_errors", 1);

function zaubern($p, $q){
    return ($q === 0) ? $p :zaubern($q, $p % $q);
}

function x10(&$number)
    $number *=10;

$count = 5;
x10($count);
echo($count);

?>
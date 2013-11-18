<!DOCTYPE html5>
<html>
<head>
	<title>Uebung</title>
</head>
<body>
	<h2>viele Fehler im Skript</h2>
	<?php
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
    
        echo "Der Wert der variable i ist: " . $i;
        echo 5 / 0;
        error_repoting();
    ?>
</body>
</html>
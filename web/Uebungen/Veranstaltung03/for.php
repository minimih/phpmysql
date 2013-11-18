<!DOCTYPE html5>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Uebung</title>
    </head>
    <body>
        <?php
        for ($i=35; $i >= 5; $i-=5) { 
            echo '<p style="font-size:' .$i. 'px">Schriftgrösse ' .$i. ' pt</p>';
        }
    ?>
</body>
</html>
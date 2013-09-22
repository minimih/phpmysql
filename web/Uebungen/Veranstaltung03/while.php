<!DOCTYPE html5>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Uebung</title>
    </head>
    <body>
        <?php
        $sum = 1;

        while($sum <= 100)
        {
            echo "$sum<br>";
            $sum += $sum;
        }
    ?>
</body>
</html>
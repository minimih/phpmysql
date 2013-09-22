<!DOCTYPE html5>
<html>
<head>
    <title>Uebung</title>
</head>
<body>
    <?php
       $drachme = 174123.25;
       $bez_drachme = "grichische Drachmen";
       $euro = $drachme * 0.0011;
       $bez_euro = "Euro";
    
       $output = "Peter sagt: 'Meine $drachme $bez_drachme sind $euro $bez_euro wert.'<br>";
       
       echo $output;
       echo "Peter sagt: 'Meine $drachme $bez_drachme sind $euro $bez_euro wert.'<br>";
       echo 'Peter sagt: \'Meine $drachme $bez_drachme sind $euro $bez_euro wert.\'<br>';
       echo 'Peter sagt: \'Meine ' .$drachme. ' ' .$bez_drachme. ' sind ' .$drachme * 0.0011. ' ' .$bez_euro. ' wert.\'<br>';
    ?>
</body>
</html>
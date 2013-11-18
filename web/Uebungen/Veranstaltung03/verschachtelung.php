<!DOCTYPE html5>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Uebung</title>
    </head>
    <body>
        <?php
        $gepaeck = 10;

        if ($gepaeck < 20) {
            $kategorie = "S (bis 20 kg)";
        } else if ($gepaeck < 40) {
            $kategorie = "M (20 bis 40 kg)";
        } else if ($gepaeck < 60) {
            $kategorie = "L (40 bis 60 kg)";
        } else{
            $kategorie = "XL (über 60 kg)";            
        }

        echo "Das Gepäckstück wiegt $gepaeck kg. Es gehört zur Kategorie $kategorie.<br>";
    ?>
    <p>Kategorien: 0-20, 20-40, 40-60, mehr als 60 kg<br></p>
</body>
</html>
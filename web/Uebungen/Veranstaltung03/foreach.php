<!DOCTYPE html5>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Uebung</title>
    </head>
    <body>
    <table border="1">
        <tr>
            <th>Land</th>
            <th>Hauptstadt</th>
        </tr>
        <?php
            $arr = array(
                "Schweiz" => "Bern",
                "Frankreich" => "Paris",
                "Deutschland" => "Berlin",
                "Italien" => "Rom",
                "Spanien" => "Madrid"
            );
            
            $arr["Österreich"] = "Wien";
            
            foreach ($arr as $key => $value) {
                echo "<tr><td>$key</td><td>$value</td></tr>";
            }
        ?>
    </table>
</body>
</html>
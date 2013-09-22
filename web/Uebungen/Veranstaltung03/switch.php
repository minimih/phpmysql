<!DOCTYPE html5>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Uebung</title>
    </head>
    <body>
        <?php
        $note = 5.5;

        var_dump($note);

        switch ($note) {
            case 1:
            case 2:
            case 3:
                echo "nicht bestanden<br/>";
                break;            
            
            case 4:
            case 5:
            case 6:
                echo "bestanden<br/>";
                break;
                
            case "nicht bewertet":
                echo "test wurde nicht abgegeben -> 1<br/>";
                break;
            
            default:
                echo "Dieser Scheiss ist falsch";                
        }
    ?>
</body>
</html>
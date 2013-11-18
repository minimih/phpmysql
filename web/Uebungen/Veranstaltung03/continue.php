<!DOCTYPE html5>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Uebung</title>
	</head>
	<body>
		<?php
        for ($i = -2; $i <= 2; $i++) {
            $res = 5 / $i;
            if ($i === 0) {
                echo "Don't do things like that, Stupido<br/>";
                continue;
            }
            echo "$res<br/>";
        }
		?>
	</body>
</html>
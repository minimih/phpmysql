<!DOCTYPE html5>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Uebung</title>
	</head>
	<body>
		<?php
		function cost($num, $prize = 45, $currency = "CHF"){
		    $res = $num * $prize;
		    print_r("Kosten: $res $currency.<br/>");
		}
        
        cost(7, 39.99, "Dollar");
        cost(10);
        cost(15, 29);
		?>
	</body>
</html>
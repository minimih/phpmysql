<!DOCTYPE html5>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Uebung</title>
	</head>
	<body>
		<?php
		$datas = array(
            array('id' => 5, 'parent' => 0, 'name' => 'rekursionen sind schon was tolles'),
            array('id' => 6, 'parent' => 5, 'name' => 'super sache'),
            array('id' => 7, 'parent' => 5, 'name' => 'sehr elegant'),
            array('id' => 8, 'parent' => 5, 'name' => 'aber auch rechenintensiv'),
            array('id' => 1, 'parent' => 0, 'name' => 'was haltet ihr von der vorlesung?'),
            array('id' => 2, 'parent' => 1, 'name' => 'naja..'),
            array('id' => 3, 'parent' => 1, 'name' => 'ist ja seine erste'),
            array('id' => 4, 'parent' => 1, 'name' => 'also ich finds super'),
        );
        
        $current = 0;
        
        function recursion( $datas, $current ) {
            echo "<ul>";
            foreach ($datas as $value) {
                
                if( $value['parent'] == $current ) {
                    echo "<li>";
                    echo $value['name'];
                    recursion($datas, $value['id']);
                    echo "</li>";
                }
            }
            echo "</ul>";
        }
        
        recursion($datas);
		?>
	</body>
</html>
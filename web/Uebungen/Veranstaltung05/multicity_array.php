<?php
$multiCity = array(
    array('City', 'Country', 'Continent'),
    array('Tokyo', 'Japan', 'Asia'),
    array('Mexico City', 'Mexico', 'North America'),
    array('New York City', 'USA', 'North America'),
    array('Mumbai', 'India', 'Asia'),
    array('Seoul', 'Korea', 'Asia'),
    array('Shanghai', 'China', 'Asia'),
    array('Lagos', 'Nigeria', 'Africa'),
    array('Buenos Aires', 'Argentina', 'South America'),
    array('Cairo', 'Egypt', 'Africa'),
    array('London', 'UK', 'Europe')
);

function filterByValue ($array, $index, $value){
    if(is_array($array) && count($array)>0) 
    {
        foreach(array_keys($array) as $key){
            $temp[$key] = $array[$key][$index];
            
            if ($temp[$key] == $value){
                $newarray[$key] = $array[$key];
            }
        }
      }
  return $newarray;
}

function filterMultidArray( $array, $row, $value ) {
    $res = array();
    foreach ($array as $r) {
        if( $r[$row] === $value ) {
            array_push($res, $r);
        }
    }
    
    return $res;
}
?>

<html>
	<head>
		<title>Multi-dimensional Array</title>
		<style type="text/css">
			td, th {
				width: 8em;
				border: 1px solid black;
				padding-left: 4px;
			}
			th {
				text-align: center;
			}
			table {
				border-collapse: collapse;
				border: 1px solid black;
			}
		</style>
	</head>
	<body>
		<h2>Auflistung Array
		<br />
		</h2>
		<table>
			<thead>
				<tr>
					<?php
                    // table head ausgeben
                    foreach ($multiCity[0] as $key => $value) {
    					echo "<th>".$value."</th>";
                    }
                    ?>
				</tr>
			</thead>
			<?php
            // durchiterieren und key/values ausgeben
            //remove header
            array_shift($multiCity);
            
            foreach ($multiCity as $row) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    echo "<td>".$value."</td>";
                }
                echo "</tr>";
            }
			?>
		</table>

		<h2>Auflistung der St&auml;dte in Asien</h2>
	    <?php
	    $asia = array_column(filterByValue($multiCity, 2, "Asia"), 0);
        sort($asia);
        foreach ($asia as $row) {
            echo $row."<br/>";
        }
        ?>

		<h2>Auflistung der Kontinente, sowie die Zahl der L&auml;nder darin (im Array)</h2>
		<?php
		$continents = array_unique(array_column($multiCity, 2));
        sort($continents);
        foreach ($continents as $row) {
            $var = count(filterMultidArray($multiCity, 2, $row));
            
            echo $row." (".$var.")<br/>";
        }
        ?>

		<h2>Auflistung nach L&auml;nder A-Z</h2>
        <?php
        $countries = array_column($multiCity, 1);
        sort($countries);
        foreach ($countries as $row) {
            echo $row."<br/>";
        }
        ?>
        
	</body>
</html>
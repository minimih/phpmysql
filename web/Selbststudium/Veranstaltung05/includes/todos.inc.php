<?php

$todoStatus = htmlspecialchars((isset($_GET['todo']) ? $_GET['todo'] : ''));

switch ($todoStatus) {
	case 'active':
        print_r("active");
        
		break;

	case 'completed':
        print_r("completed");
		
		break;
	
	case 'all':
	default:
        print_r("all/default");
		
        
        
		break;
}


?>
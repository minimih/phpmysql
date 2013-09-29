<!DOCTYPE HTML>
<html>
<head>
		<title>Webform</title>

		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<!-- Styles -->
		<link href="css/reset.css" rel="StyleSheet" type="text/css" media="screen">
		<!--[if lt IE 7]><link href="" rel="StyleSheet" type="text/css" media="screen"><![endif]-->

        <link href='http://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps:700' rel='stylesheet' type='text/css'>

        <link href="css/main.css" rel="StyleSheet" type="text/css" media="screen">
        
		<!-- Scripts -->
		<!--[if IE]><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script><![endif]-->
</head>
<body>
    
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    session_start();
    
    if(isset($_GET['reset']))
    {
        session_destroy();
        header("Location:".$_SERVER['PHP_SELF']);
    }

    if(sizeof($_POST) > 0)
    {
        $name = htmlspecialchars($_POST['name']);
        $alter = htmlspecialchars($_POST['alter']);
        
        $_SESSION['people'][] = array(
            'name' => $name,
            'alter' => $alter
        );
    }
    
    if(isset($_SESSION['people']))
    {
        $form = "<table><tr><th>Name</th><th>Alter</th></tr>";
        
        foreach ( $_SESSION['people'] as $val) {
            $form .= "<tr>";
            $form .= "<td>".$val['name']."</td>";
            $form .= "<td>".$val['alter']."</td>";
            $form .= "</tr>";
        }
        
        $form .= "</table>";
        
        echo "$form";
    }
    ?>
    
    <form id="contact" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <div class="formContent">
            <p>
                <label for="name">Name:</label>
                <input id="name" name="name" type="text" value="" required />
            </p>
            <p>
                <label for="alter">Alter:</label>
                <input id="alter" name="alter" type="text" value="" required />
            </p>
        </div>
        <div class="formButtons">
            <p>
                <input id="sendForm" class="css3button" name="submit" value="Person eintragen" type="submit" />
            </p>
        </div>
    </form>
    
    <a href="<?php echo($_SERVER['PHP_SELF']."?reset") ?>">Clear People</a>
</body>
</html>
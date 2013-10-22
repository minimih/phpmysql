<!DOCTYPE HTML>
<html>
    <head>
        <title>Michael Hoehn's Blog</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
    <?php
        session_start();

        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        
        if(sizeof($_POST) > 0)
        {
            $user = htmlspecialchars($_POST['user']);
            $password = htmlspecialchars($_POST['password']);
            
            if(($user == "admin") && ($password == "admin")){
                $_SESSION['loggedin'] = true;
                
                header("Location:index.php");
            }
        }
        
        $loggedin = false;
        if(isset($_SESSION['loggedin'])){
            $loggedin = true;
        }
        
        include 'includes/header.inc.php';
    ?>
    
    <header>
        <h2>Admin Login</h2>
    </header>
    
    <form id="login" method="post">
        <p>
            <label for="user">Username*</label>
            <input id="user" name="user" type="text" value="" required />
        </p>
        <p>
            <label for="password">Password*</label>
            <input id="password" name="password" type="password" value="" required />
        </p>
        <p>
            <input name="submit" value="Login" type="submit" />
        </p>
        <p>*Pflichtfelder</p>
    </form>
</body>
</html>
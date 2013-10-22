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
        
        // Suppress DateTime warnings
        date_default_timezone_set(@date_default_timezone_get());
        
        $loggedin = false;
        if(isset($_SESSION['loggedin'])){
            $loggedin = true;
        }
        
        include 'includes/header.inc.php';

        if(sizeof($_POST) > 0 && $loggedin) {
            $title = htmlspecialchars($_POST['title']);
            $text = htmlspecialchars($_POST['text']);
            $date = date('Y/m/d-H:i:s');
            $filedate = date("Ymd_His");
            
            if(trim($title) && trim($text)){
                //save as text
                $article = array(
                    'title' => $title,
                    'text' => $text,
                    'date' => $date,
                    'filedate' => $filedate
                );
                
                //save article
                $filedate = date("Ymd_His");
                
                $uploaddir = "posts/";
                if(!file_exists($uploaddir)){
                    mkdir($uploaddir, 0644);
                }
                
                file_put_contents("posts/article-$filedate.bin",serialize($article));
                
                header("Location:index.php");
            }
        }
    ?>
    
    <header>
        <h2>Beitrag erfassen</h2>
    </header>
    
    <form id="create" method="post">
        <p>
            <label for="title">Titel*</label>
            <textarea id="title" name="title" value="" rows="5" required ></textarea>
        </p>
        <p>
            <label for="text">Text*</label>
            <textarea id="text" name="text" value="" rows="5" required ></textarea>
        </p>
        <p>
            <input name="submit" value="Beitag Posten" type="submit" />
        </p>
        <p>*Pflichtfelder</p>
    </form>
    
    </article>
</body>
</html>
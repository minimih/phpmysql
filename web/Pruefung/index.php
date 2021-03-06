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
        
        function find_all_files($dir)
        {
            $result = array();
            if(file_exists($dir)){
                $root = scandir($dir);
                foreach($root as $value)
                {
                    if($value === '.' || $value === '..') {continue;}
                    if(is_file("$dir/$value")) {$result[]="$dir/$value";continue;}
                    foreach(find_all_files("$dir/$value") as $value)
                    {
                        $result[]=$value;
                    }
                }
            }
            return $result;
        } 
        
        $loggedin = false;
        if(isset($_SESSION['loggedin'])){
            $loggedin = true;
        }
        
        include 'includes/header.inc.php';
    
        //load articles
        $uploaddir = "posts/";
        $articles = find_all_files($uploaddir);
        
        foreach ($articles as $item) {
            $article = unserialize(file_get_contents($item));
            
            $title = $article['title'];
            $date = $article['date'];
            $text = $article['text'];
            
            echo '<article>';
            echo '<header>';
            echo '<h1>'.$title.'</h1>';
            echo '</header>';
            echo '<section>';
            echo $text;
            echo '</section>';
            echo '<date>';
            echo 'Erstellt am: '.$date;
            echo '</date>';
            echo '</article>';
        }
    ?>    
</body>
</html>
<?php
require_once 'includes/head.inc.php';
require_once 'php-classes/Post.php';

$postId = htmlspecialchars((isset($_GET['id']) ? $_GET['id'] : NULL));

if($postId){
    $post = new Post();
    $post = $post->findByID($postId);
    $post->delete();
    
    header("Location: ./");
}
?>

<?php
require_once 'includes/tail.inc.php';
?>
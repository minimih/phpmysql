<?php
require_once 'includes/head.inc.php';
require_once 'php-classes/PostTableGateway.php';

$postId = htmlspecialchars((isset($_GET['id']) ? $_GET['id'] : NULL));

if($postId){
    $gw = new PostTableGateway();
    $post = $gw->findByID($postId);
}

if(sizeof($_POST) > 0){
    if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['content'])){
        $id = trim(htmlspecialchars($_POST['id']));
        $title = trim(htmlspecialchars($_POST['title']));
        $content = trim(htmlspecialchars($_POST['content']));
        
        if (!empty($id) && !empty($title) && !empty($content)) {
            $gw = new PostTableGateway();
            $gw->update($id, $title, $content);
    
            header("Location: ./");
        }else{
            echo '<div class="alert alert-danger"><strong>Error!</strong> Blog post title and content must not be empty</div>';
        }
    }
}

?>

<form method="post">
    <?php
    echo '
        <input type="hidden" class="form-control" name="id" value="'.$post->getId().'">
        <div class="input-group">
            <label for="content">Title</label>
            <input type="text" class="form-control" name="title" value="'.$post->getTitle().'">
            <label for="content">Content</label>
            <textarea class="form-control" rows="5" name="content">'.$post->getContent().'</textarea>
            <hr>
            <button type="submit" class="btn btn-success">Save</button>
        </div>';
    ?>
</form>

<?php
require_once 'includes/tail.inc.php';
?>
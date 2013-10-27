<?php
require_once 'includes/head.inc.php';
require_once 'database/postGateway.inc.php';

if(sizeof($_POST) > 0){
    if(isset($_POST['title']) && isset($_POST['content'])){
        $title = trim(htmlspecialchars($_POST['title']));
        $content = trim(htmlspecialchars($_POST['content']));
        
        if (!empty($title) && !empty($content)) {
            $gw = new PostGateway();
            $gw->insert($title, $content);
    
            header("Location: ./");
        }else{
            echo '<div class="alert alert-danger"><strong>Error!</strong> Blog post title and content must not be empty</div>';
        }
    }
}

?>

<form method="post">
    <div class="input-group">
        <label for="content">Title</label>
        <input type="text" class="form-control" name="title">
        <label for="content">Content</label>
        <textarea class="form-control" rows="5" name="content"></textarea>
        <hr>
        <button type="submit" class="btn btn-success">Create</button>
        <button type="reset" class="btn btn-danger" >Clear</button>
    </div>
</form>

<?php
require_once 'includes/tail.inc.php';
?>
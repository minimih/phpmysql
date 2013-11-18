<?php
require_once 'includes/head.inc.php';
require_once 'php-classes/Post.php';
require_once 'php-classes/PostTableGateway.php';

if(sizeof($_POST) > 0){
    if(isset($_POST['id']) && isset($_POST['delete'])){
        $id = trim(htmlspecialchars($_POST['id']));
        $gw = new PostTableGateway();
        $gw->delete($id);
    }
}
?>
<!-- Example row of columns -->
<div class="row">
    <?php
        $gw = new PostTableGateway();
        foreach ($gw->getAllPosts() as $post) {
            echo '<div><form method="post">';
            echo '<h2>'.$post->getTitle().'</h2>';
            echo '<p>'.$post->getContent().'</p>';
                
            if($loggedin){
                echo '<p>
                    <input type="hidden" class="form-control" name="id" value="'.$post->getId().'">
                    <a class="btn btn-success btn-xs" href="editPost.php?id='.$post->getId().'">Edit</a>
                    <button type=submit class="btn btn-danger btn-xs" name="delete">Delete</button>
                </p>';
            }
            
            echo '</form></div>';
        }
    ?>
</div>

<?php
require_once 'includes/tail.inc.php';
?>
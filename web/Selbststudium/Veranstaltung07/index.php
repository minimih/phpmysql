<?php
require_once 'includes/head.inc.php';
require_once 'database/postGateway.inc.php';

if(sizeof($_POST) > 0){
    if(isset($_POST['id']) && isset($_POST['delete'])){
        $id = trim(htmlspecialchars($_POST['id']));
        $gw = new PostGateway();
        $gw->delete($id);
    }
}
?>
<!-- Example row of columns -->
<div class="row">
    <?php
        $gw = new PostGateway();
        foreach ($gw->getAllPosts() as $post) {
            echo '<div><form method="post">';
            echo '<h2>'.$post['title'].'</h2>';
            echo '<p>'.$post['content'].'</p>';
                
            if($loggedin){
                echo '<p>
                    <input type="hidden" class="form-control" name="id" value="'.$post['id'].'">
                    <a class="btn btn-success btn-xs" href="editPost.php?id='.$post['id'].'">Edit</a>
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
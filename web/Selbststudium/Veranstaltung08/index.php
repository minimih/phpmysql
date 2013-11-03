<?php
require_once 'includes/head.inc.php';
require_once 'php-classes/Post.php';
require_once 'php-classes/PostRowGateway.php';
?>
<!-- Example row of columns -->
<div class="row">
    <?php
        $gw = new PostRowGateway();
        foreach ($gw->getAllPosts() as $post) {
            echo '<div>';
            echo '<h2>'.$post->getTitle().'</h2>';
            echo '<p>'.$post->getContent().'</p>';
                
            if($loggedin){
                echo '<p>
                    <a class="btn btn-success btn-xs" href="editPost.php?id='.$post->getId().'">Edit</a>
                    <a class="btn btn-danger btn-xs" href="deletePost.php?id='.$post->getId().'">Delete</a>
                </p>';
            }
            
            echo '</div>';
        }
    ?>
</div>

<?php
require_once 'includes/tail.inc.php';
?>
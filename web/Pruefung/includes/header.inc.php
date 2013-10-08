<header>
    <h1>Michael Hoehn's Blog</h1>
    
    <nav>
    <ul>
    <li><a href="login.php">Login</a></li>
    <?php
        if($loggedin){
            echo '<li><a href="create.php">Create</a></li>';
            echo '<li><a href="edit.php">Edit</a></li>';
            echo '<li><a href="delete.php">Delete</a></li>';
        }
    ?>
    </ul>
    </nav>
</header>

<hr>
<!DOCTYPE html>
<html>
	<head>
		<title>Todo App</title>
		<meta charset="utf-8" />

		<!-- Bootstrap -->
		<link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap-theme.min.css" media="screen">
		<link rel="stylesheet" href="css/style.css" media="screen">

		<!-- JavaScript -->
		<script src="/lib/js/jquery/jquery-2.0.3.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="/lib/js/html5shiv.js"></script>
		<script src="/lib/js/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
		<?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        
        include_once 'includes/database.inc.php';
        include_once 'includes/todos.inc.php';
        
        //addItem("am tobi de bildschirm dräckig mache", true);
        
        //getAllItems();
        
        //deleteItem(1);

        $todos = getAllItems();
        
        
		?>

		<div class="container">
			<section id="todoapp">
				<header id="header">
					<h1>Todo App</h1>
					<form method="post">
					   <input id="new-todo" placeholder="What needs to be done?" autofocus>
					</form>
				</header>
				<section id="main">
					<ul id="todo-list">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <input type="text" class="form-control" value="bla">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-remove"></span></button>
                            </span>
                        </div>
					    
					    <?php
						   $remaining = count($todos);
						   $completed = 0;
						   
					       foreach ($todos as $item) {
							   
							   if($item['completed'] == true){						       
    							   $completed += 1;
                                   $remaining -= 1;
							   }
                               
							   echo '<li>';
						   
                               echo '<form method="post">';
                               echo '<input class="toggle" type="checkbox" '.($item['completed'] ? "checked" : "").'>';
                               echo '<input type="text" class="form-control" name="title" value="'.$item['title'].'">';
                               
                               
                               
                              // if()
                               echo '<button type="button" class="btn"><span class="glyphicon glyphicon-ok"></span></button>';
                               echo '<button type="button" class="btn"><span class="glyphicon glyphicon-remove"></span></button>';
                               echo '<input type="hidden" name="id" value="'.$item['id'].'">';
                               
                               echo '</form>';

							   echo '</li>';
						   }

                           echo "Remaining: $remaining<br/>";
                           echo "Completed: $completed<br/>";
                        ?>
					</ul>
				</section>
				<footer id="footer">
				    <?php
                        echo '<span id="todo-count"><strong>'.$remaining.' </strong>'.($remaining === 1 ? "item" : "items").' left</span>';
                    ?>
                    <ul id="filters">
                        <li>
                            <a href="?todo=all" <?php echo ($todoStatus === "all" ? 'class="selected"' : '') ?> >All</a>
                        </li>
                        <li>
                            <a href="?todo=active" <?php echo ($todoStatus === "active" ? 'class="selected"' : '') ?> >Active</a>
                        </li>
                        <li>
                            <a href="?todo=completed" <?php echo ($todoStatus === "completed" ? 'class="selected"' : '') ?> >Completed</a>
                        </li>
                    </ul>
                    <?php
                        if ($completed) {
                            echo '<button id="clear-completed">Clear completed ('.$completed.')</button';
                        }
                    ?>
				</footer>
			</section>
			<footer id="info">
				Double-click to edit a todo
			</footer>
		</div>
		
	</body>
</html>
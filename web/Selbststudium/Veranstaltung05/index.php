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
        
        if(sizeof($_POST) > 0){
    
            //insert new todo
            if(isset($_POST['new-todo'])){
                $newTodo = trim(htmlspecialchars($_POST['new-todo']));
                
                if (!empty($newTodo)) {
                    addItem($newTodo, false);
                }
            }
            
            //edit todo
            if (isset($_POST['todo-title'])) {
                $todoId = htmlspecialchars($_POST['todo-id']);                
                $todoTitle = trim(htmlspecialchars($_POST['todo-title']));                
                
                if (!empty($todoTitle)) {
                    editItemTitle($todoId, $todoTitle);
                }
            }
    
            //set todo status
            if (isset($_POST['todo-status'])) {
                $todoId = htmlspecialchars($_POST['todo-id']);                
                $todoStatus = htmlspecialchars($_POST['todo-status']);
                           
                if (!empty($todoId)) {
                    switch ($todoStatus) {
                        case 'check':
                            editItemStatus($todoId, true);
                            break;
                        case 'uncheck':
                            editItemStatus($todoId, false);
                            break;
                        case 'remove':
                            deleteItem($todoId);
                            break;
                    }
                }
            }

            //clear completed items
            if (isset($_POST['todo-clear'])) {
                 foreach (getAllItems() as $item) {
                    if($item['completed'] == true){
                        deleteItem($item['id']);
                    }
                }
            }
        }
        
        $todoFilter = htmlspecialchars((isset($_GET['filter']) ? $_GET['filter'] : 'all'));
        switch ($todoFilter) {
            case 'active':
                $todos = getActiveItems();
                break;
            case 'completed':
                $todos = getCompletedItems();
                break;
            default:
                $todos = getAllItems();
                break;
        }

        //get completed and remaining todos
        $allTodos = getAllItems();
        $completedTodos = 0;
        
        foreach ($allTodos as $item) {
            if($item['completed'] == true){
                $completedTodos += 1;
            }
        }
        
        $remainingTodos = count($allTodos) - $completedTodos;
		?>

		<div class="container">
			<section id="todoapp">
				<header id="header">
					<h1>Todo App</h1>
					<form method="post">
					   <input type="text" id="new-todo" name="new-todo" placeholder="What needs to be done?" autofocus>
					</form>
				</header>
				<section id="main">
					    <?php
					       foreach ($todos as $item) {
							   
                               $itemId = $item['id'];
                               $itemCompleted = $item['completed'];
                               $itemTitle = $item['title'];
                               
                               echo '<form method="post">';
                               
                               echo '<input type="hidden" name="todo-id" value="'.$itemId.'">';
                               echo '<input type="hidden" name="todo-completed" value="'.$itemCompleted.'">';
                               
						       echo '<div class="input-group">';
                               
                               //check for completed
                               if($itemCompleted){
                                   echo '<span class="input-group-btn completed">';
                                   echo '<button type="submit" name="todo-status" value="uncheck" class="btn btn-default"><span class="glyphicon glyphicon-check"></span></button>';
                                   echo '</span>';
                                   //set title
                                   echo '<input type="text" class="form-control title" name="todo-title" value="'.$itemTitle.'" disabled>';
                               }else{
                                   echo '<span class="input-group-btn">';
                                   echo '<button type="submit" name="todo-status" value="check" class="btn btn-default"><span class="glyphicon glyphicon-unchecked"></span></button>';
                                   echo '</span>';
                                   //set title
                                   echo '<input type="text" class="form-control title" name="todo-title" value="'.$itemTitle.'">';
                               }
                               
                               //set remove btn
                               echo '<span class="input-group-btn">';
                               echo '<button type="submit" name="todo-status" value="remove" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span></button>';
                               echo '</span>';
						       
						       echo '</div>';
                               echo '</form>';
						   }
                        ?>
				</section>
				<footer id="footer">
				    <?php
                        echo '<span id="todo-count"><strong>'.$remainingTodos.' </strong>'.($remainingTodos === 1 ? "item" : "items").' left</span>';
                    ?>
                    <ul id="filters">
                        <li>
                            <a href="?filter=all" <?php echo ($todoFilter === "all" ? 'class="selected"' : '') ?> >All</a>
                        </li>
                        <li>
                            <a href="?filter=active" <?php echo ($todoFilter === "active" ? 'class="selected"' : '') ?> >Active</a>
                        </li>
                        <li>
                            <a href="?filter=completed" <?php echo ($todoFilter === "completed" ? 'class="selected"' : '') ?> >Completed</a>
                        </li>
                    </ul>
                    <?php
                        if ($completedTodos) {
                            echo '<form method="post"><button type="submit" id="clear-completed" name="todo-clear">Clear completed ('.$completedTodos.')</button></form>';
                        }
                    ?>
				</footer>
			</section>
			<footer id="info">
				Press enter key to edit/save a todo
			</footer>
		</div>
		
		<script>
		    $(document).ready(function() {
                $('.title').keydown(function(event) {
                    if (event.keyCode == 13) {
                        this.form.submit();
                        return false;
                     }
                });
            });
		</script>
		
	</body>
</html>
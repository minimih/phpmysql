<?php
$form_ddg = htmlspecialchars($_POST['ddg']);

//MAIL HEADERS
$query = $form_ddg;

header("Location:https://duckduckgo.com/?q=$query");
?>
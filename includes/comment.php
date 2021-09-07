<?php  
session_start();
include("db.php");

mysql_query("INSERT INTO comments(comment,article_id,autor,email) VALUES ('{$_POST['comment']}','{$_POST['article_id']}','{$_POST['name']}','{$_POST['email']}')");

header("Location: {$_SESSION['url']}");



?>
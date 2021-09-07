<?php  
session_start();
require_once("db.php");
$email = $_POST["email"];
$pass = md5($_POST["pass"]);

$log_q = mysql_query("SELECT * FROM users WHERE email='$email' AND pass='$pass'");
$log = mysql_fetch_assoc($log_q);
if(mysql_num_rows($log_q)==1){
	$_SESSION["name"] = $log["name"];
	header("Location: {$_SESSION['url']}");
}else{
	header("Location: ../index.php");
}



?>
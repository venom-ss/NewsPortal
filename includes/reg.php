<?php  
include("db.php");
$name = $_POST["user"];
$email = $_POST["email"];
$pass = md5($_POST["pass"]);

if(mysql_query("INSERT INTO users(name,email,pass) VALUES('$name','$email','$pass')")){
	echo "success";
}else{
	echo mysql_error();
}

header("Location: ../index.php");



?>
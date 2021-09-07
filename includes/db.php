<?php  
if(!mysql_connect("localhost","root","")){
	die("მონაცემთა ბაზასთან კავშირი ვერ მოხერხდა!".mysql_error());
}

if (!mysql_select_db("news_portal")) {
	die("მონაცემთა ბაზა არ არსებობს".mysql_error());
}

mysql_query("SET NAMES 'utf8'");

?>
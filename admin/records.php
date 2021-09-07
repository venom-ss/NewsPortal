<?php require_once("includes/header.php"); ?>
<?php 

	$trash = isset($_GET['trash'])?1:0;
?>
<div class="records-top">
	<h2 class="records-title">ჩანაწერები</h2>

	<ul class="records-butt">
		<li>
			<a class="new-record" href="record.php?process=insert">
				ახალი ჩანაწერი
			</a>
		</li>
		<li>
			<a class="restore" href="?trash=1">
				წაშლილის აღდგენა
			</a>
		</li>
		<li>
			<a class="sort" href="#">
				სორტირება
			</a>
		</li>
		<div class="cls"></div>
	</ul>
	<div class="cls"></div>
</div>
<ul class="records">
<?php
	if(isset($_GET['visib'])){
		$visib_q = mysql_query("SELECT * FROM news WHERE id={$_GET['record_id']}");
		$visib = mysql_fetch_assoc($visib_q);
		if($visib['visibility']==0){
			mysql_query("UPDATE news SET visibility=1 WHERE id={$_GET['record_id']}");
			header("refresh:0; url=records.php");
		}else{
			mysql_query("UPDATE news SET visibility=0 WHERE id={$_GET['record_id']}");
			header("refresh:0; url=records.php");
		}
	}
	$rec_q = mysql_query("SELECT * FROM news WHERE trash='{$trash}'");
	while($rec = mysql_fetch_assoc($rec_q)){
		if($rec['visibility']){
			$bg_img = "img/visible.png";
		}else{
			$bg_img = "img/non_visible.png";
		}
		echo 
		"
		<li>

			<p>{$rec['title']}</p>
			<div class='record-manage'>
				<a style='background-image: url({$bg_img})' class='record-visibility' href='?visib=1&record_id={$rec['id']}'></a>
				<a class='record-edit' href='record.php?process=edit&record_id={$rec['id']}'></a>
				<a class='record-del' href='record.php?process=trash&record_id={$rec['id']}'></a>
			</div>
			<div class='cls'></div>
		</li>
		";
	}
	

?>
</ul>

<?php require_once("includes/footer.php"); ?>
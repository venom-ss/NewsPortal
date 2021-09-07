<?php require_once("includes/header.php"); ?>
<div class="records-top">
	<h2 class="records-title">ჩანაწერები</h2>
	<div class="cls"></div>
</div>
<?php  
	
	if($_GET["process"]=="edit"){
		$rec_q = mysql_query("SELECT * FROM news WHERE id={$_GET['record_id']}");
		$rec = mysql_fetch_assoc($rec_q);

		$text = $rec["text"];
		$title = $rec["title"];
		if(isset($_POST["submit"])){
			$visib = isset($_POST['visib'])?1:0;

			if(!mysql_query("UPDATE news SET text='".$_POST['text']."',title='".$_POST['title']."',visibility=".$visib." WHERE id=".$_GET["record_id"])){
				 echo mysql_error();
			}

			mysql_query("DELETE FROM news_cat WHERE news_id=".$_GET["record_id"]);
			foreach ($_POST['cat'] as $key => $value) {
				mysql_query("INSERT INTO news_cat (news_id,category_id) VALUES ('".$_GET["record_id"]."','".$value."')");
			}
			header("Refresh: 0");
		}
	}elseif($_GET["process"]=="insert"){
		$text = "";
		$title = "";


		if(isset($_POST["submit"])){
			

			$visib = isset($_POST['visib'])?1:0;


			mysql_query("INSERT INTO news (title,text,visibility) VALUES ('".$_POST['title']."','".$_POST['text']."','". $visib."')");
			$last_q = mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT 1");
			$last = mysql_fetch_assoc($last_q);

			$news = $last['id'];
			foreach ($_POST['cat'] as $key => $value) {
				mysql_query("INSERT INTO news_cat (news_id,category_id) VALUES ('$news','$value')");
			}
		}
	}
	else{
		$text = "";
		$title = "";
		mysql_query("UPDATE news SET trash='1' WHERE id={$_GET['record_id']}");
		header("refresh: 0; url=records.php");
	}
?>
	<form  class="add-record"  method="POST">
		<div class="add-record-left">
			<input type="text" name="title" value="<?php echo $title; ?>">
			<textarea name="text" id="" cols="30" rows="10"><?php echo $text; ?></textarea>
			<script>

		        CKEDITOR.replace( 'text',
		        	{height: "350px"}
		        );
		        
			</script>
			
			<input type="submit" value="დამატება" name="submit">
		</div>
		<div class="add-record-right">
			<div class="chk-cont">
				<input type="checkbox" id="visib" name="visib" >
				<div onclick="chk()" class="chk-style" id="style"></div>
			</div>
			<div class="chk-label">
				ჩანაწერის ხილვადობა
			</div>
			<div class="cls"></div>
			<script>
			var bool = true;
			function chk(){
				
				if (bool) {
					document.getElementById('style').style.backgroundImage = "url('img/visible.png')";
					document.getElementById('visib').checked = true;
					bool = false;
				}
				else{
					document.getElementById('style').style.backgroundImage = "url('img/non_visible.png')";
					document.getElementById('visib').checked = false;
					bool = true;
				}
			}
			function file_select(){
				document.getElementById('file').click();
				$("#file").change(function(){
					alert($("#record").serialize())
					$.ajax({
						url: "img_upload.php",
						type: "POST",
						data: $("#file").serialize(),
						success: function(data){
							alert(data);
						}
					});										
				});
			}

			</script>
			<?php  



			?>
			<div onclick="file_select()" class="img-up" style="background-color: <?php  ?>; ;">
				
				სურათის ატვირთვა
			</div>
			<div class="record-cats">
				კატეგორიები
			</div>
			<ul class="cats">
			<?php  
				$cat_q = mysql_query("SELECT * FROM categories");
				while($cat = mysql_fetch_assoc($cat_q)){
					?>
						<li>
							<input type="checkbox" name="cat[]" value="<?php echo $cat['id']; ?>"><label for="chk"><?php echo $cat["category_ka"]; ?></label>
						</li>

					<?php
				}

			?>
				
			</ul>
		</div>
	</form>
	<form id="record" action="img_upload.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="rec_img" id="file">
	</form>


	


<?php require_once("includes/footer.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php  

$info_q = mysql_query("SELECT * FROM users WHERE id={$_GET['profile_id']}");
$info = mysql_fetch_assoc($info_q);
?>

	

<div class="profile">

	<form id="img-up-form" class="img-upload" action="img_up.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="name" value="<?php echo $info['name']; ?>">
		<input type="hidden" name="id" id="" value="<?php echo $info['id']; ?>">
		<input type="file" name="img" id="img" value="change profile img">
	</form>	

	<div class="profile-img">
		<img src="<?php echo $info['profile_img']; ?>" alt="">
		<a id="img-up-but" href="#"></a>		
	</div>

	
		<script>
			$(document).ready(function(e){
				$("#img-up-but").click(function(){
					document.getElementById('img').click();
				})
				$("#img").change(function(){
					$("#img-up-form").submit();
				})
			})
		</script>
	<div class="profile-info">
		
		<ul>
			<li><?php echo $info['first_name']; ?></li>
			<li><?php echo $info['last_name']; ?></li>
			<li><?php echo $info['email']; ?></li>
		</ul>
	</div>
	<div class="cls"></div>
	<h2>
		<?php echo $info['name']; ?>
	</h2>
</div>

<?php require_once("includes/footer.php"); ?>
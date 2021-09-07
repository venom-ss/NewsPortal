<?php require_once("includes/header.php") ?>

<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(41.729863, 44.766317),
    zoom:16,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    scrollwheel:false
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
  var marker = new google.maps.Marker({
          position: new google.maps.LatLng(41.729863, 44.766317),
          map: map,
          title: 'ITVET',
        });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="googleMap"></div>
<div class="contact-left">
	<h4>contact info</h4>
	<?php  
		$contact_q = mysql_query("SELECT * FROM contact ORDER BY id DESC");
		while($contact = mysql_fetch_assoc($contact_q)){
			echo 
			"
				<p><strong>{$contact["contact_type"]}: </strong>{$contact["info"]}</p>
			";
		}


	?>
</div>
<div class="contact-right">
	<h4>mail us</h4>
	<form action="sendmail.php" method="post">
		<input type="text" name="name" placeholder="Name:">
		<input type="email" name="email" placeholder="E-Mail:">
		<input type="text" name="tel" placeholder="Telephone:">
		<div class="cls"></div>
		<textarea name="msg" placeholder="Message:"></textarea>
		<input type="submit" value="SEND">
		<div class="cls"></div>
	</form>
</div>
<div class="cls"></div>



<?php require_once("includes/footer.php") ?>
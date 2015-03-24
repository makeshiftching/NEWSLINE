<!doctype html>
<?php require_once("includes/init.php"); ?>
<?php require_once(resolvePath("includes/header.php"));?>
<html>
<script>
$(document).ready(function(){
	fadeOut();
});
function fadeOut(){
	$('img').fadeOut(1000,fadeIn);
}
function fadeIn(){
	var file=$('img').attr('src');
	file = file.substr(13,1);
	console.log(file);
	var num = parseInt(file);
	num++;
	if( num == 6 ) num = 1;
	$('img').attr('src',"images/images"+num+".jpg");
	$('img').fadeIn(1000,function(){
		setTimeout(fadeOut,6000);
	});
}

</script>
<meta charset="utf-8">
	<div class="jumbotron col-md-10 col-md-offset-1">
  		<h1>Welcome To Online Shopping!</h1>
		<p>more comfortable, less price</p>
		<div><img width="100%" height="100%" src="images/images1.jpg" alt="shopping"></div>
	  	<br></br>
	  	<?php
	  		$user = User::getUser();
	  		if( $user == false ){ 
	  	?>
				<a href="regis_client.php" class="btn btn-primary btn-lg" role="button">Client Register</a>
	  	<?php
	  		} 
	  	?>
	</div>
	
</html>

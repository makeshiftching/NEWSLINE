<style type="text/css">
body {
	background-image: url("images/background.jpg");
	overflow-y:scroll;
}
</style>
<?php 

$usertype = User::getUserType();

if( $usertype == CLIENT ) require_once(resolvePath("includes/client_header.php"));
else if( $usertype == SELLER ) require_once(resolvePath("includes/seller_header.php"));
else require_once(resolvePath("includes/unknown_header.php"));

?>

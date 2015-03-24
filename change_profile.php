<?php
require_once("includes/init.php");
require_once(resolvePath("includes/header.php"));

if( !isset($_POST) ) exit(1);

$db = new DB();
$user_id = $_POST['db_cp_user_id'];
$email = $_POST['db_cp_email'];
$full_name = $_POST['db_cp_full_name'];
$password = $_POST['db_cp_password'];
$conf_password = $_POST['db_cp_conf_password'];
$type = $_POST['db_cp_type'];

if( $conf_password != $password ){
	echo "Please confirm your password again.";
	exit(1);
}
if( $password == '' ){
	$password = User::getUser()['password'];
}else $password = myhash($password);

$result = $db->query("update Users set password='$password',email='$email',full_name='$full_name' where user_id=$user_id");
//var_dump($result);

if( $type == "client" ){
	$send_addr = $_POST['db_cp_send_addr'];
	$credit_id = $_POST['db_cp_credit_id'];
	$ccv = $_POST['db_cp_ccv'];
	if( $ccv == '' ){
		$ccv = User::getUser()['ccv'];
	}
	$result = $db->query("update Clients set send_addr='$send_addr',credit_id='$credit_id',ccv='$ccv' where user_id=$user_id");
	//var_dump($result);
}
else if( $type == "seller" ){
	$contact_no = $_POST['db_cp_contact_no'];
	$result = $db->query("update Sellers set contact_no='$contact_no' where user_id=$user_id");

}

header("Location: change_profile_ui.php?success=1");
?>

<?php
require_once("includes/init.php");
require_once(resolvePath("includes/header.php"));
?>

<html>
<body>
<div sytle="height:50px"></div>
<div class="panel panel-default col-md-8 col-md-offset-2" >
	<div class="panel-body">


<?php
if( !isset($_POST) ) exit(1);

$db = new DB();
$username = $_POST['db_cp_username'];
$email = $_POST['db_cp_email'];
$full_name = $_POST['db_cp_full_name'];
$password = $_POST['db_cp_password'];
$conf_password = $_POST['db_cp_conf_password'];
$type = $_POST['db_cp_type'];

if( strlen($username) <= 0 ){
	echo "<span style='color:red'>Please fill the username</span>";
	exit(1);
}

$result = $db->query("select username from Users where username = '$username'");

if( count($result) > 0 ) {
	echo "<span style='color:red'>The username already exists.</span>";
	exit(1);
}
if( $conf_password != $password ){
	echo "<span style='color:red'>Please confirm your password again.</span>";
	exit(1);
}
$password = myhash($password);
$result = $db->query("insert into Users (username,password,email,full_name)
values ('$username','$password','$email','$full_name')");
//var_dump($result);

$user_id = $db->query("select user_id from Users where username ='$username'");
$user_id = $user_id[0]['user_id'];

if( $type == "client" ){
	$send_addr = $_POST['db_cp_send_addr'];
	$credit_id = $_POST['db_cp_credit_id'];
	$ccv = $_POST['db_cp_ccv'];
	//echo "send_addr=$send_addr credit_id=$credit_id ccv=$ccv";
	$result = $db->query("insert into Clients (user_id,send_addr,credit_id,ccv) values ($user_id,'$send_addr','$credit_id','$ccv')");
	//var_dump($result);
}
else if( $type == "seller" ){
	$contact_no = $_POST['db_cp_contact_no'];
	$result = $db->query("insert into Sellers (user_id,contact_no) values ($user_id,'$contact_no')");

}
echo "<span style='color:green'>Register Successfully</span>";
?>

	</div>
</div>
</body>
</html>

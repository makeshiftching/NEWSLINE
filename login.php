<?php
require_once("includes/init.php");
function invalidUserPass(){
	echo "Invalid username or password";
	exit(1);
}
if(!isset($_POST)) invalidUserPass();
$username = $_POST['db_cp_username'];
$password = $_POST['db_cp_password'];

$db = new DB();
$result = $db->query("select password from Users where username = '$username'");
if( count($result) == 0 ) invalidUserPass();
$result = $result[0];
if( myhash($password) != $result['password'] ) invalidUserPass();
$time = time();
setcookie('username',$username,$time+DURATION);
setcookie('password',myhash(myhash($password).$time),$time+DURATION);
setcookie('starttime',$time,$time+DURATION);
//echo "login successful";
header("Location: ".resolveURL(''));
?>

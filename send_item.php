<?php
header('Location: send_item_ui.php');
require_once("includes/init.php");
require_once(resolvePath("includes/header.php"));


//echo "TT";
$send_id = $_POST['send_id'];
$status = $_POST['status'];
//echo $send_id." ".$status;
$db = new DB();
$date = date("Y-m-d H:i:s");
//echo $date;
$result = $db->query("update Sending set send_status = $status where send_id = $send_id");
$result = $db->query("update Sending set date = '$date' where send_id = $send_id");
//var_dump($result);
//header('Location: '.resolveURL('send_item_ui.php'));

?>
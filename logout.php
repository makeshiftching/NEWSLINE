<?php
require_once("includes/init.php");
setcookie('username','',$time-100);
setcookie('password','',$time-100);
setcookie('starttime','',$time-100);
header("Location: ".resolveURL(""));
?>

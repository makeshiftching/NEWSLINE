<?php

function resolvePath($path){
	return '/Applications/MAMP/htdocs/NEWSLINE/'.$path;	
}
function resolveURL($path){
	return '/NEWSLINE/'.$path;
}
function myhash($input){
	return sha1($input);
}

require_once(resolvePath('includes/define.php'));
require_once(resolvePath('classes/Config.php'));
require_once(resolvePath('classes/DB.php'));
require_once(resolvePath('classes/User.php'));

User::refresh();
?>

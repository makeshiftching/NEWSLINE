<?php

class User{
	static function getSameUser(){
		if( ! isset($_COOKIE['username']) ){
				return false;
		}
		$db = new DB();
		$username = $_COOKIE['username'];
		$password = $_COOKIE['password'];
		$starttime = $_COOKIE['starttime'];
		if( !($user = $db->query("select * from Users where username='$username'")) ){
			return false;
		}
		$user = $user[0];
		$time = time();
		if( $time > $starttime+DURATION || $password != myhash($user['password'].$starttime) ){
			return false;
		}
		return $user;
	}
	static function refresh(){
		if( $user = User::getUser() ){
			$time = time();
			setcookie('username',$_COOKIE['username'],$time+DURATION);
			setcookie('password',myhash($user['password'].$time),$time+DURATION);
			setcookie('starttime',$time,$time+DURATION);
		}
	}
	static function getUser(){
		$user = User::getSameUser();
		if( !$user ) return false;
		$type = User::getUserType();
		$user_id = $user['user_id'];

		$db = new DB();
		$user_new = array();
		if( $type == CLIENT ){
			$user_new = $db->query("select * from Clients where user_id='$user_id'");
		}else if( $type == SELLER){
			$user_new = $db->query("select * from Sellers where user_id='$user_id'");
		}
		$user_new = $user_new[0];
		return array_merge($user,$user_new);
	}
	static function getUserType(){
		$user = User::getSameUser();
		if( !$user ) return UNKNOWN;
		$user_id = $user['user_id'];
		$db = new DB();
		$user_new = $db->query("select * from Clients where user_id='$user_id'");
		if( count($user_new) > 0 ) return CLIENT;
		
		$user_new = $db->query("select * from Sellers where user_id='$user_id'");
		if( count($user_new) > 0 ) return SELLER;

		return UNKNOWN;
	}
}
?>

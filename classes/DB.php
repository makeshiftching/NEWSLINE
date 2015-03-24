<?php
class DB{
	private $mysqli;
	function __construct(){
		$username = Config::get('mysql/username');
		$password = Config::get('mysql/password');
		$host = Config::get('mysql/host');
		$db = Config::get('mysql/db');
		$this->mysqli = new mysqli($host,$username,$password,$db);
		if ($this->mysqli->connect_errno) {
			echo "Failed to connect to MySQL: " . $this->$mysqli->connect_error;
		}
	}
	function query($text){
		$result = $this->mysqli->query($text);
		if( gettype($result) == 'boolean' ) return $result;
		$all = array();
		while( $tmp = $result->fetch_assoc() ){
			$all[] = $tmp;
		}
		return $all;
	}
}
		
?>

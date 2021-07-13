<?php
require 'DBConnect.php';
function login($uname,$password){
	$conn= connect();
	$sql = $conn -> prepare("SELECT * FROM USERS WHERE uname= ? and password = ?");
	$sql = $conn -> blind_param ("ss",$uname,$password);
} 

?>
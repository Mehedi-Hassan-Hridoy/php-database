<?php

require 'DBConnect.php';

function register($fname,$gender,$birthday,$religion,$presentaddress,$permanentaddress,$phone,$email,$website,$uname,$password){
	$conn = connect();
	$sql = $conn-> prepare("INSERT INTO USERS (fname,gender,birthday,religion,presentaddress,permanentaddress,phone,email,website,uname,password) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
	$sql-> blind_param("ss",$fname,$gender,$birthday,$religion,$presentaddress,$permanentaddress,$phone,$email,$website,$uname,$password);
	$response = $sql -> execute();
	$conn-> close();
	return $response;
}

?> 
<?php
//make consts from phpMyadmin feedback_db
	define('DB_HOST','Localhost');
	define('DB_USER','root');
	define('DB_PASSW','');
	define('DB_NAME','feedback_db');

	// connection 
	$connect = new mysqli(DB_HOST,DB_USER,DB_PASSW,DB_NAME);
	// check the connection 
	if($connect->connect_error){
		die('Connection failed'.$connect->connect_error);
	}
//test connection	
//echo 'Connected sucessfuly!'
?>
<?php
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');

function connect_database() {
	$fetchType = "array";
	$dbHost = "localhost";
	$dbLogin = "u243595787_gateway";
	$dbPwd = "Kavish2004$";
	$dbName = "u243595787_gateway";
	$con = mysqli_connect($dbHost, $dbLogin, $dbPwd, $dbName);
	if (!$con) {
		die("Database Connection failed: " . mysqli_connect_errno());
	}
	return ($con);
}

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'u243595787_gateway');
define('DB_PASSWORD', 'Kavish2004$');
define('DB_NAME', 'u243595787_gateway');
?>
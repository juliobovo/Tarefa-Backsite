<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";
	

	$conn = new mysqli($servername, $username, $password, $dbname);

	if($conn->connect_errno)
		echo "Fallha na Conexao  (". $conn->connect_errno.") ". $conn->connect_errno

	//$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	//if (!$conn) {
	//    die("Connection failed: " . mysqli_connect_error());
   //	}



?>
<?php

	$dbhost = 'localhost';
	$dbuser = 'id4073030_admin';
	$dbpass = 'mniFatima';
	$dbname = 'id4073030_page';

	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);


	//checking the connection
	if (mysqli_connect_errno()){
		die('Database connection failed'.mysqli_connect_error());
	}

?>
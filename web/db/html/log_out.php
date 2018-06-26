<?php 
	@ob_start();
	session_start();

	$_SESSION = array();

	if (isset($_COOKIE[session_name()])) {
		# code...
		setcookie(session_start(),'',time()-86400,'/');
	}

	session_destroy();

	header('Location:dbhome.php?logout=yes');

 ?>
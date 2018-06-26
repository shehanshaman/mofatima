<?php 
	@ob_start();
	session_start(); 
?>
<?php require_once('con_page.php'); ?>

<?php 

	$query = "UPDATE result SET last_update=now()";
	$details = mysqli_query($connection, $query);

	if($details){
		header('Location: modify.php?time_change=yes');
	}

 ?>

<?php mysqli_close($connection); ?>
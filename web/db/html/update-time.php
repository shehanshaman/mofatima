<?php 
	@ob_start();
	session_start(); 
?>
<?php require_once('../inc/connection.php'); ?>
<?php require_once('../inc/functions.php'); ?>

<?php 

	$query = "UPDATE result SET last_update=now()";
	$details = mysqli_query($connection, $query);

	verify_query($details);

	header('Location: admin/admin-members.php');

 ?>

<?php mysqli_close($connection); ?>
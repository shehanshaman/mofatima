<?php 
	@ob_start();
	session_start(); 
?>
<?php require_once('../../inc/connection.php'); ?>
<?php require_once('../../inc/functions.php'); ?>

<?php 
	
	if (isset($_GET['user_id']) && isset($_GET['user_name'])) {
		# code...
		//getting deatials
		$user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
		$user_name = mysqli_real_escape_string($connection, $_GET['user_name']);

		$query = "DELETE from members_details where FAMILY_ID = {$user_id} AND NAME = '{$user_name}'";

		$result_set = mysqli_query($connection, $query);

		if($result_set){
			//user found
			header('Location: ../admin/admin-family.php?family_delete=yes');
			
		}else{
			//query unsessesfull
			header('Location: ../admin/admin-family.php?query_error');
		}
	}

 ?>

<?php mysqli_close($connection); ?>
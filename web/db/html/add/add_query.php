<?php 
	@ob_start();
	session_start(); 
?>
<?php require_once('../../inc/connection.php'); ?>
<?php require_once('../../inc/functions.php'); ?>

<?php 
	
	$errors = array();

	$add_query =	'';

	if(isset($_POST['submit'])){

		$add_query =	$_POST['add_query'];

		if(empty($errors)){

			$add_query = mysqli_real_escape_string($connection,$_POST['add_query']);

			$query = $add_query;

			$result = mysqli_query($connection,$query);

			if($result){
				header('Location: ../admin/admin-members.php?query_added=true');
			}else{
				$errors[] = 'Failed to add the new record.';
			}
		}
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Add-New-Member</title>
	<link rel="stylesheet" type="text/css" href="../../css/add.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<link rel="stylesheet" type="text/css" href="../../css/add_query.css">
</head>
<body>

	<div class="wrapper clearfix"></div>
		
		<div class="top_bar">
			<div class="db_name">
				<p>Welcome to User Mangement System</p>
			</div>
			<div class="user_id">
				<p> Hello <?php echo $_SESSION['user_name']; ?>  
					<a href="../admin/admin-members.php"> Back to Admin</a>
				</p>
			</div>
		</div><!-- top_bar -->

		<div class="addin">

			<?php 
				if(!empty($errors)){
					display_errors($errors);
				}
			 ?>
			
			<form action="add_query.php" method="post">

				<table>

				<tr>
					<td><label>Query </label></td>
					<td><input type="text" name="add_query" <?php echo 'value = "'. $add_query .'"'; ?> required></td>
				</tr>

				<tr>
					<td><label>&nbsp;</label></td>
					<td><button type="submit" name="submit">SAVE</button></td>
				</tr>
				
				</table>
			</form>

		</div>
	
	</div>
	<div class="bottom_bar">
		<div class="create">
			<p>Created By M.S.S.M PERERA</p>
		</div>
		<div class="link">
			<a href="../../../">Fatima Church Home</a>
		</div>
	</div>
</body>
</html>

<?php mysqli_close($connection); ?>
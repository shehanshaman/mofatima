<?php 
	@ob_start();
	session_start(); 

?>

<?php require_once('../../inc/connection.php'); ?>
<?php require_once('../../inc/functions.php'); ?>

<?php 
	$errors = array();

	if(isset($_POST['submit'])){

		//checking required fields
		$req_fields  = array('user_name','password','valid');
		
		$errors = array_merge($errors,check_req_fields($req_fields));
		

		$max_len_fields  = array('user_name' => 20,'password' => 20);

		$errors = array_merge($errors,check_max_len($max_len_fields));
		
		if(empty($errorsr)){
			//add data to database
			$user_name = mysqli_real_escape_string($connection,$_POST['user_name']);
			$password = mysqli_real_escape_string($connection,$_POST['password']);
			$valid = mysqli_real_escape_string($connection,$_POST['valid']);

			$query = "INSERT INTO admins VALUES ('{$user_name}','{$password}','{$valid}',NOW())";

			$result = mysqli_query($connection,$query);

			if($result){
				header('Location: ../admin/admin-admin.php?don=true');
			}else{
				$errors[] = 'Failed to add the new record.';
			}
		}

	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Add-Admin</title>
	<link rel="stylesheet" type="text/css" href="../../css/add.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
</head>
<body>

	<div class="wrapper clearfix"></div>
		
		<div class="top_bar">
			<div class="db_name">
				<p>Welcome to User Mangement System</p>
			</div>
			<div class="user_id">
				<p> Hello <?php echo $_SESSION['user_name']; ?>  
					<a href="../admin/admin-admin.php"> Back to Admin</a>
				</p>
			</div>
		</div><!-- top_bar -->

		<div class="addin">

			<?php 
				if(!empty($errors)){
					display_errors($errors);
				}
			 ?>
			
			<form action="add-admin.php" method="post">

				<table>

				<tr>
					<td><label>User Name</label></td>
					<td><input type="text" name="user_name" ></td>
				</tr>

				<tr>
					<td><label>Password </label></td>
					<td><input type="text" name="password"></td>
				</tr>

				<tr>
					<td><label>Valid 0 or 1 </label></td>
					<td><input type="text" name="valid" ></td>
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
			<a href="../../">Fatima Church Home</a>
		</div>
	</div>
</body>
</html>

<?php mysqli_close($connection); ?>
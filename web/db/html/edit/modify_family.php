<?php 
	@ob_start();
	session_start(); 
?>
<?php require_once('../../inc/connection.php'); ?>
<?php require_once('../../inc/functions.php'); ?>

<?php 
	
	if (!isset($_SESSION['usr_id'])) {
		# code...
		header('Location: ../user.php');
	}

	$errors = array();

	$FAMILY_ID =	'';
	$NAME = '';

	//past
	$NAME_past = '';
	$FAMILY_ID_past = '';

	if (isset($_GET['family_id']) && isset($_GET['name'])) {
		# code...
		//getting deatials
		$FAMILY_ID_past = mysqli_real_escape_string($connection, $_GET['family_id']);
		$NAME_past = mysqli_real_escape_string($connection, $_GET['name']);

		$FAMILY_ID = $FAMILY_ID_past;
		$NAME = $NAME_past;

		
	}


	if(isset($_POST['submit'])){

		$NAME =	$_POST['NAME'];
		$FAMILY_ID_past = $_POST['FAMILY_ID_past'];
		$NAME_past =	$_POST['NAME_past'];

		//checking required fields
		$req_fields  = array('NAME');
		
		$errors = array_merge($errors,check_req_fields($req_fields));
		

		$max_len_fields  = array('NAME' => 50);

		$errors = array_merge($errors,check_max_len($max_len_fields));
		
		if(empty($errors)){
			//add data to database
			$NAME = mysqli_real_escape_string($connection,$_POST['NAME']);

			$query = "UPDATE members_details SET NAME = '{$NAME}' WHERE FAMILY_ID = '{$FAMILY_ID_past}' AND NAME = '{$NAME_past}'";

			$result = mysqli_query($connection,$query);

			if($result){
				header('Location: ../user.php?family_modified=true');
			}else{
				$errors[] = 'Failed to modify the new record.';
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
</head>
<body>

	<div class="wrapper clearfix"></div>
		
		<div class="top_bar">
			<div class="db_name">
				<p>Welcome to User Mangement System</p>
			</div>
			<div class="user_id">
				<p> Hello <?php echo $_SESSION['usr_id']; ?>  
					<a href="../user.php"> Back to User</a>
				</p>
			</div>
		</div><!-- top_bar -->

		<div class="addin">

			<?php 
				if(!empty($errors)){
					display_errors($errors);
				}
			 ?>
			
			<form action="modify_family.php" method="post">

				<input type="hidden" name="FAMILY_ID_past" value="<?php echo $FAMILY_ID_past; ?>">

				<input type="hidden" name="NAME_past" value="<?php echo $NAME_past; ?>">

				<table>

				<tr>
					<td><label>Name </label></td>
					<td><input type="text" name="NAME" <?php echo 'value = "'.$NAME.'"'; ?> ></td>
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
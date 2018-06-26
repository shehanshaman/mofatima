<?php 
	@ob_start();
	session_start(); 
?>
<?php require_once('../../inc/connection.php'); ?>
<?php require_once('../../inc/functions.php'); ?>


<?php 
	
	$errors = array();

	$NAME =	'';
	$FAMILY_ID = '';

	if(isset($_POST['submit'])){

		$NAME =	$_POST['NAME'];
		$FAMILY_ID =$_POST['FAMILY_ID'];

		//checking required fields
		$req_fields  = array('NAME','FAMILY_ID');
		
		$errors = array_merge($errors,check_req_fields($req_fields));
		
		if(empty($errors)){
			//add data to database
			$NAME_array = array();
			$NAME_array = explode(",",mysqli_real_escape_string($connection,$_POST['NAME']));
			$FAMILY_ID = mysqli_real_escape_string($connection,$_POST['FAMILY_ID']);

			$x = 1; 

			while($x <= sizeof($NAME_array)) {
				$NAME = $NAME_array[$x-1];

			    $query = "INSERT INTO members_details VALUES({$FAMILY_ID},'{$NAME}')";
				$result = mysqli_query($connection,$query);
			    $x++;
			} 

			if($result){
				header('Location: ../admin/admin-family.php?family_add=true');
			}else{
				$errors[] = 'Failed to modify the new record.';
			}

		}

	}

 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Add-New-Family</title>
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
					<a href="../admin/admin-family.php"> Back to Admin</a>
				</p>
			</div>
		</div><!-- top_bar -->

		<div class="addin">

			<?php 
				if(!empty($errors)){
					display_errors($errors);
				}
			 ?>
			
			<form action="add-family.php" method="post">

				<table>

				<tr>
					<td><label>Family ID </label></td>
					<td><input type="text" name="FAMILY_ID" <?php echo 'value = "'. $FAMILY_ID .'"'; ?> ></td>
				</tr>

				<tr>
					<td><label>Name </label></td>
					<td><input type="text" name="NAME" <?php echo 'value = "'. $NAME .'"'; ?> ></td>
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
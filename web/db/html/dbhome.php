<?php 
    @ob_start();
    session_start();
    require_once('../inc/connection.php'); 
?>

<?php 

	//check for form submission
	if(isset($_POST['submit'])) {
		$error_search = array();
		//check enter user id
		if (!isset($_POST['id']) || strlen(trim($_POST['id']) < 1)) {
			$error_search[] = 'User id Missing / Invalid';
		}

		//check if there is an error
		if(empty($error_search)){
			//id to variable
			$id = mysqli_real_escape_string($connection, $_POST['id']);

			//database query
			$query = "SELECT * FROM members 
						WHERE SID = '{$id}'
						LIMIT 1";

			$result_set = mysqli_query($connection, $query);

			if($result_set){
				//query sussesfull

				if(mysqli_num_rows($result_set) == 1){
					//valid user found
					$member = mysqli_fetch_assoc($result_set);
					$_SESSION['usr_id'] = $member['SID'];

					//add last login date
					$query = "UPDATE members SET last_login = NOW() WHERE SID = '{$_SESSION['usr_id']}' LIMIT 1";


					$result_set = mysqli_query($connection, $query);

					if(!$result_set){
						die("Database query failed.");
					}

					header('Location: user.php');
				}else{
					$error_search[] = 'Invalid user';
				}

			}else{
				$error_search[] = 'Database query failed';
			}
		}
	}

	//admins
	else if(isset($_POST['submit_admin'])) {
		$errors = array();
		//check enter user id
		if (!isset($_POST['user_name']) ) {
			$errors[] = 'User name is Missing / Invalid';
		}

		if (!isset($_POST['password']) || strlen(trim($_POST['password']) < 1)) {
			$errors[] = 'User password is Missing / Invalid';
		}

		//check if there is an error
		if(empty($errors)){

			//id to variable
			$user_name = mysqli_real_escape_string($connection, $_POST['user_name']);

			$password = mysqli_real_escape_string($connection, $_POST['password']);

			//database query
			$query = "SELECT * FROM admins 
						WHERE user_name = '{$user_name}'
						AND password = '{$password}'
						LIMIT 1";

			$result_set = mysqli_query($connection, $query);

			if($result_set){
				//query sussesfull

				if(mysqli_num_rows($result_set) == 1){
					//valid user found
					$admin = mysqli_fetch_assoc($result_set);
					$_SESSION['user_name'] = $admin['user_name'];

					//add last login date
					$query = "UPDATE admins SET last_login = NOW() WHERE user_name = '{$_SESSION['user_name']}' LIMIT 1";


					$result_set = mysqli_query($connection, $query);

					if(!$result_set){
						die("Database query failed.");
					}

					header('Location: admin/admin-members.php');
				}else{
					$errors[] = 'Invalid user';
				}

			}else{
				$errors[] = 'Database query failed';
			}
		}
	}

	$update = '';

	$query = "SELECT last_update from result";

	$details = mysqli_query($connection, $query);

	$row = mysqli_fetch_assoc($details);
	$update = "{$row['last_update']}";
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>LOG IN</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/page.css">
	
</head>
<body>
	<div class="top_bar col-sm-12 col-xs-12">
		<div class="db_name">
			<p>Welcome to User Mangement System</p>
		</div>
	</div><!-- top_bar -->
	
	<div class="wrapper middle">
		
		<div class="search_usr clearfix">
			<form action="dbhome.php" method="post">
				<fieldset>
					<legend>

						<?php 

							if(isset($_GET['logout'])){
								echo '<div class="alert alert-success alert-dismissable fade in log_out">
									    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									    <strong>Success!</strong> You have successfully Log Out from the system
									  </div>';
							}

						 ?>


						<h1>SEARCH</h1>

						<?php 
							if (isset($error_search) && !empty($error_search)) {
								echo '<div class="alert alert-danger alert-dismissable fade in">
									    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									    <strong>Danger!</strong> Invalid Id
									  </div>';
							}

						 ?>

						<p>
							<label>User ID : </label>
							<input class="form-control" type="txt" name="id" placeholder="Enter your ID">
						</p>

						<p>
							<button type ="submit" name="submit" class="btn btn-success">search </button>
						</p>
					</legend>
				</fieldset>
			</form>
		</div><!-- search_usr -->

		<div class="admin_login clearfix">
			<form action="dbhome.php" method="post">
				<fieldset>
					<legend>

						<h1>LOG IN</h1>

						<?php 
							if (isset($errors) && !empty($errors)) {
								echo '<div class="alert alert-danger alert-dismissable fade in">
									    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									    <strong>Danger!</strong> Invalid User Name or Password
									  </div>';
							}

						 ?>

						<p>
							<label>User ID : </label>
							<input class="form-control" type="txt" name="user_name" placeholder="Enter your user name">
							<label>Password : </label>
							<input class="form-control" type="password" name="password" placeholder="Enter your Password">
						</p>

						<p>
							<button type ="submit" name="submit_admin" class="btn btn-success">LOG IN </button>
						</p>
					</legend>
				</fieldset>
			</form>		
		</div>

	</div>

	<div class="bottom_bar col-sm-12 col-xs-12">
		<div class="create col-sm-9 col-xs-12">
			<p>Created By M.S.S.M PERERA</p>
				<p><?php echo "Last update on ".$update." ."; ?>
				</p>
		</div>
		<div class="link col-sm-3 col-xs-12">
			<a href="../../">Fatima Church Home</a>
		</div>
	</div>
</body>
</html>
<?php mysqli_close($connection); ?>
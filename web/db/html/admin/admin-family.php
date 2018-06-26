<?php 
	@ob_start();
	session_start(); 
?>
<?php require_once('../../inc/connection.php'); ?>
<?php require_once('../../inc/functions.php'); ?>

<?php 

	if (!isset($_SESSION['user_name'])) {
		# code...
		header('Location: ../dbhome.php');
	}

	//check valid or not
	$valid_or_not = '';
	$add_query = '';

	$query = "SELECT * from admins WHERE user_name='{$_SESSION['user_name']}' LIMIT 1";
	$details = mysqli_query($connection, $query);

	$user = mysqli_fetch_assoc($details);
	$valid_or_not = "{$user['valid']}";

	if($valid_or_not){
		$add_query = "<br> <br> <a href=\"../add/add_query.php\">Add Query</a>";
	}

//members details with family

	$family_details = '';
	$sort = '';
	$sort_value = '';
	//getting the details
	$query0 = "SET @x = 0";

	if(isset($_POST['sort'])){
		$sort = $_POST['sort'];
		
		if ($sort == 'NAME') {
			# code...
			if(isset($_POST['sort_name'])){
				$sort = $_POST['sort_name'];
				$sort_value = "WHERE NAME LIKE '%".$sort."%'";
				//echo $sort_value;
			}
		}else if ($sort == 'FAMILY_ID') {
			if (isset($_POST['sort_id'])) {
				# code...
				$sort = $_POST['sort_id'];
				$sort_value = "WHERE FAMILY_ID = ".$sort;
				//echo $sort_value;
			}
		}
	}

	if (isset($_POST['reset-sort'])) {
		# code...
		$sort_value = '';
	}

	$query1 = "SELECT @x:=@x+1 as num,FAMILY_ID,NAME from members_details $sort_value order by FAMILY_ID";

	$details = mysqli_query($connection, $query0);
	$details = mysqli_query($connection, $query1);

	verify_query($details);
			//query sussesfull
	while ($user = mysqli_fetch_assoc($details)) {
		# code...
		$family_details .= "<tr>";
		$family_details .= "<td>{$user['num']}</td>";
		$family_details .= "<td>{$user['FAMILY_ID']}</td>";
		$family_details .= "<td>{$user['NAME']}</td>";
		$family_details .= "<td><a href=\"../edit/modify_family_by_admin.php?family_id={$user['FAMILY_ID']}&name={$user['NAME']}\">Edit</a></td>";
		$family_details .= "<td><a href=\"../delete/delete_family.php?user_id={$user['FAMILY_ID']}&user_name={$user['NAME']}\">Delete</a></td>";
		$family_details .= "</tr>";

	}

	//money
	$save = '';

	//getting the details
	$query = "SELECT * from result";

	$details = mysqli_query($connection, $query);

	verify_query($details);

	$row = mysqli_fetch_assoc($details);
	$save = "{$row['money']}";

	$update = '';

	$query = "SELECT last_update from result";

	$details = mysqli_query($connection, $query);

	verify_query($details);

	$row = mysqli_fetch_assoc($details);
	$update = "{$row['last_update']}";
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
					<a href="../log_out.php"> Log Out</a>
				</p>
			</div>
			
		</div><!-- top_bar -->
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <ul class="nav navbar-nav">
		      <li><a href="admin-members.php">Members</a></li>
		      <li><a href="admin-past.php">Past Members</a></li>
		      <li><a href="admin-admin.php">Admins</a></li>
		      <li><a href="admin-donation.php">Donations</a></li>
		      <li class="active"><a href="admin-family.php">Family</a></li>
		    </ul>
		  </div>
		</nav>
		<main class="main">
			<div class="alert alert-info">
			  <strong>We have Rs :</strong> <?php echo $save; ?>
			</div>


			<div class="sort">
				<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Sort</button>
				  <div id="demo" class="collapse">
				    <h3>Sort by</h3>
					<form accept="admin-members.php" method="post">
					    <div class="radio">
					      <label><input type="radio" name="sort" value="FAMILY_ID">Family ID :</label>
					      <input type="text" name="sort_id">
					    </div>
					    <div class="radio">
					      <label><input type="radio" name="sort" value="NAME">Name:</label>
					      <input type="text" name="sort_name">
					    </div>
					    
					    <input type="submit" name="submit-sort" class="btn btn-success">
					    <input type="submit" name="reset-sort" class="btn btn-warning" value="Reset">
					  </form>
				  </div>
				
			</div>

			<table class="family_details table table-striped">
				<tr>
					<h1>Family Details
						<span>
							<a href="../add/add-family.php" class="add"> +Add new</a>
						</span>
					</h1>
					<th>No</th>
					<th>Family No</th>
					<th>Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>

				<?php echo $family_details; ?>
			</table>

		</main>
		<div class="bottom_bar">
			<div class="create">
				<p>Created By M.S.S.M PERERA</p>
				<p><?php echo "Last update on ".$update." ."; ?>
					<a href="../update-time.php"><button type="button" class="btn btn-danger">Update Time</button>
					</a>
				</p>
			</div>
			<div class="link">
				<a href="../../../">Fatima Church Home</a>
				<?php echo $add_query; ?>
			</div>
		</div>
	</wrapper>

</body>

</html>
<?php mysqli_close($connection); ?>
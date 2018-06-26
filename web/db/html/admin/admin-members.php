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
		$add_query = "<br> <br><a href=\"../add/add_query.php\">Add Query</a>";
	}


	$members_details = '';
	$sort = 'SID';
	$null = '';
	$where = '';

	//getting the details
	$query0 = "SET @x = 0";
	if(isset($_POST['sort'])){
		$sort = $_POST['sort'];
		if ($sort == 'last_login') {
			# code...
			$null = 'WHERE last_login != ""';
		}else if ($sort == 'SID') {
			# code...
			if(!empty($_POST['value-SID'])){
				$sort0 = $_POST['value-SID'];
				$where = 'WHERE SID = '.$sort0;
			}
		}else if ($sort == 'FAMILY_ID') {
			# code...
			if(!empty($_POST['value-FAMILY'])){
				$sort0 = $_POST['value-FAMILY'];
				$where = 'WHERE FAMILY_ID = '.$sort0;
			}
		}else if ($sort == 'GROUP_NO') {
			# code...
			if(!empty($_POST['value-GROUP'])){
				$sort0 = $_POST['value-GROUP'];
				$where = 'WHERE GROUP_NO = '.$sort0;
			}
		}
	}

	if (isset($_POST['reset-sort'])) {
		# code...
		$where = '';
		$null = '';
		$sort = 'SID';
	}

	$query1 = "SELECT @x:=@x+1 as num,SID,FAMILY_ID,PAY,START,TEL_NUM,GROUP_NO,ADDRESS,last_login from members $where $null order by $sort";
	$details = mysqli_query($connection, $query0);
	$details = mysqli_query($connection, $query1);

	verify_query($details);
	//query sussesfull
	while ($user = mysqli_fetch_assoc($details)) {
		# code...
		$members_details .= "<tr>";
		$members_details .= "<td>{$user['num']}</td>";
		$members_details .= "<td>{$user['SID']}</td>";
		$members_details .= "<td>{$user['FAMILY_ID']}</td>";
		$members_details .= "<td>{$user['PAY']}</td>";
		$members_details .= "<td>{$user['START']}</td>";
		$members_details .= "<td>{$user['TEL_NUM']}</td>";
		$members_details .= "<td>{$user['GROUP_NO']}</td>";
		$members_details .= "<td>{$user['ADDRESS']}</td>";
		$members_details .= "<td>{$user['last_login']}</td>";
		$members_details .= "<td><a href=\"../edit/modify_user.php?user_id={$user['SID']}\">Edit</a></td>";
		$members_details .= "<td><a href=\"../delete/delete_user.php?user_id={$user['SID']}\">Delete</a></td>";
		$members_details .= "</tr>";
	}

	//money & time
	$save = '';
	

	//getting the details
	$query = "SELECT money from result";

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
		      <li class="active"><a href="admin-members.php">Members</a></li>
		      <li><a href="admin-past.php">Past Members</a></li>
		      <li><a href="admin-admin.php">Admins</a></li>
		      <li><a href="admin-donation.php">Donations</a></li>
		      <li><a href="admin-family.php">Family</a></li>
		    </ul>
		  </div>
		</nav>
		<main class="main">
			<div class="alert alert-info">
			  <strong>We have Rs :</strong> <?php echo $save; ?>
			 <a href="../change-money.php">
			 	 <button type="button" class="btn btn-warning">Change Money</button>
			 </a>
			</div>

			<div class="sort">
				<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Sort</button>
				  <div id="demo" class="collapse">
				    <h3>Sort by</h3>
					<form accept="admin-members.php" method="post">
					    <div class="radio">
					      <label><input type="radio" name="sort" value="SID">SID : </label>
					      <input type="text" name="value-SID">
					    </div>
					    <div class="radio">
					      <label><input type="radio" name="sort" value="last_login">Last Login</label>
					    </div>
					    <div class="radio">
					      <label><input type="radio" name="sort" value="FAMILY_ID">Family ID : </label>
					      <input type="text" name="value-FAMILY">
					    </div>
					    <div class="radio">
					      <label><input type="radio" name="sort" value="GROUP_NO">Group : </label>
					      <input type="text" name="value-GROUP">
					    </div>
					    <input type="submit" name="submit-sort" class="btn btn-success">
					    <input type="submit" name="reset-sort" class="btn btn-warning" value="Reset">
					  </form>
				  </div>
				
			</div>

			<table class="members_details table table-striped">
				<h1>Member
					<span>
						<a href="../add/add-member.php" class="add"> +Add new</a>
					</span>
				</h1>
				<tr>
					<th>No</th>
					<th>SID</th>
					<th>Family ID</th>
					<th>Pay</th>
					<th>START</th>
					<th>Tel Number</th>
					<th>Group</th>
					<th>Address</th>
					<th>Last Login</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>

				<?php echo $members_details; ?>
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
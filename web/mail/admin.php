<?php 
	@ob_start();
	require_once('../page/con_page.php'); 

	//admins details
	$admins_details = '';

	$query0 = "SET @x = 0";
	$query1 = "SELECT @x:=@x+1 as num,user_name,pwd,last_update from page";

	$details = mysqli_query($connection, $query0);
	$details = mysqli_query($connection, $query1);

	while ($user = mysqli_fetch_assoc($details)) {
		# code...
		$admins_details .= "<tr>";
		$admins_details .= "<td>{$user['num']}</td>";
		$admins_details .= "<td>{$user['user_name']}</td>";
		$admins_details .= "<td>{$user['pwd']}</td>";
		$admins_details .= "<td>{$user['last_update']}</td>";
		$admins_details .= "<td><a href=\"delete.php?user_id={$user['user_name']}\">Delete</a></td>";
		$admins_details .= "</tr>";
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Page Admins</title>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 </head>
 <body>
 	<table class="admins_details table table-striped">
		<h1>Admins</h1>

		<tr>
			<th>No</th>
			<th>User Name</th>
			<th>Password</th>
			<th>Last Login</th>
			<th>Delete</th>
		</tr>

		<?php echo $admins_details; ?>
	</table>
 </body>
 </html>
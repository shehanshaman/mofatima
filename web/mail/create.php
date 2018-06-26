<?php 
 @ob_start();
 session_start();
 require_once('../page/con_page.php'); 

 $error = '';
 $x = 0;

	if (isset($_REQUEST['pwd1']) && isset($_REQUEST['pwd2'])){
		if ($_REQUEST['pwd1']==$_REQUEST['pwd2']) {
			$pwd = $_REQUEST['pwd1'];
			$username = $_SESSION['email'];

			$query = "INSERT into page values('{$username}','{$pwd}',null)";
			$result_set = mysqli_query($connection, $query);
			if ($result_set) {
				# code...
				//echo "Your account created";
				$x = 1;
			}else{
				$error = "Your username is not valid";
			}
		}
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Step3</title>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    .middle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        font-size: 25px;
    }
</style>
 </head>
 <body>
 	<div class="jumbotron">
	 	<div>
	      <h2>Create Admin Account : Step 3 of 3</h2>
	      <p>Enter your password</p>
	    </div>

	    <div class = "middle">
	    	<div>
		    	<?php if (!empty($error)) {
		    		echo '<div class="alert alert-danger">
		    				<strong>Danger!</strong> Your username or password is not valid
		  				</div>';
		    	}else if($x){
		    		echo '<div class="alert alert-success">
		    				<strong>Success!</strong> Your account created
		  				</div>';
		  			echo '<a href="../page/">Click here to login</a>';
		    	} ?>

		    </div>
		 	<form method="post" class="well col-sm-12 col-xs-12">
		 		Password : <input type="text" name="pwd1" class="form-control">
		 		Re enter Password : <input type="text" name="pwd2" class="form-control">
		 		<input type="submit" value="Submit" class="btn btn-success"/>
		 	</form>
		</div>
	</div>
 </body>
 </html>
 <?php mysqli_close($connection); ?>
<?php 
 @ob_start();
session_start();
$error = '';
	if (isset($_REQUEST['pin'])) {
		$enter_pin = $_REQUEST['pin'];
		if ($enter_pin == $_SESSION['comment']) {
			header("Location:create.php");
		}else{
			$error =  "PIN number in invalid";
		}
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Step2</title>
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
      <h2>Create Admin Account : Step 2 of 3</h2>
      <p>Check your e-mail and enter PIN</p>
    </div>
    
	<div class = "middle">
		<div>
	    	<?php if (!empty($error)) {
	    		echo '<div class="alert alert-danger">
	    				<strong>Danger!</strong> PIN number in invalid.
	  				</div>';
	    	} ?>
	    </div>
	 	<form accept="post" class="well col-sm-12 col-xs-12">
	 		PIN: <input name="pin" type="text" class="form-control"/>
	 		<input type="submit" value="Submit" class="btn btn-success"/>
	 	</form>
	 </div>
</div>
 </body>
 </html>
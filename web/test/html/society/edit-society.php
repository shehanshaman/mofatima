<?php 
	
	if (isset($_GET['id'])) {
		# code...
		$file = '../../Data/society/'.$_GET['id'].'.txt';
		$log_file = '../../Data/log.txt';

		$log_txt = file_get_contents($log_file);


		if (isset($_POST['text']))
		{
		    // save the text contents
		    file_put_contents($file, $_POST['text']);
		    $log_txt .= $_GET['id']." ".date("Y/m/d h:i:sa")."\r\n";
		    file_put_contents($log_file, $log_txt);

		    if($_GET['id']=='dhs'){
		    	header('Location:divyahardaye.php');
		    }
		    else if($_GET['id']=='ds'){
		    	header('Location:darmaduthasamithiya.php');
		    }
		    else if($_GET['id']=='ms'){
		    	header('Location:maranadarasamithiya.php');
		    }
		    else if($_GET['id']=='ps'){
		    	header('Location:pujaudaw.php');
		    }
		    else if($_GET['id']=='ts'){
		    	header('Location:tharunasamithiya.php');
		    }


		    
		}

		$text = file_get_contents($file);

	}else{
		header("Location:../../society.php");
	}
	
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Edit Society</title>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<style type="text/css">
	 	@import url(//fonts.googleapis.com/earlyaccess/notosanssinhala.css);
		@charset "UTF-8";
 		.middle {
		    position: absolute;
		    top: 50%;
		    left: 50%;
		    transform: translate(-50%, -50%);
		    text-align: center;
		    background-color: #ffeeba;
		}

		.middle h3{
			padding: 10px;
			margin: 10px;
		}

		.enter{
			padding: 10px;
		}

		.sinhala{
			font-family: 'Noto Sans Sinhala', sans-serif;
		}
 	</style>
 </head>
 <body>

 	<div class="modify middle">
 		<a href="../../society.php"><button class="btn">BACK</button></a>
 		<label class="col-sm-12 col-xs-12"><h3>Brief Introduction</h3></label>
		<form class="col-sm-12" action="" method="post">
			<textarea class="col-sm-12 col-xs-12 sinhala" name="text"  rows="12" cols="25"><?php echo htmlspecialchars($text) ?></textarea>
			<div class="col-sm-12 btn-group col-xs-12 enter">
				<input class="btn btn-success col-sm-6 col-xs-6" type="submit" />
				<input class="btn btn-warning col-sm-6 col-xs-6" type="reset" />
			</div>
			<a href="https://www.google.com/intl/si/inputtools/try/">
				<label><b>Sinhala Input</b> <br> <p>Note : Recommend google sinhala fonts click here to use.</p> </label>
			</a>
		</form>
 	</div>
 	
 </body>
 </html>
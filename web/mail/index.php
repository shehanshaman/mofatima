<?php
 @ob_start();
session_start();

$error = '';

//if "email" variable is filled out, send email
  if (isset($_REQUEST['email']))  {

    //Email information
    $admin_email = "fatimachurchdg@gmail.com";
    $email = $_REQUEST['email'];

    if (empty(trim($email))) {
        $error = 'Enter e-mail';
    }else if(substr($email, -3) != 'com'  || strlen($email) < 9){
      $error = 'Enter valid e-mail';
    }else{

      $subject = 'Create Admin Account';
    $pin = rand(100,1000);
    $comment = "Fatima church Dippitigoda

    Creating your account... 
    
    Your pin number : ".$pin."

    
    Thankyou";

    $_SESSION['comment'] = $pin;
    $_SESSION['email'] = $email;

    //send email
    mail($email, "$subject", $comment, "From:" .$admin_email );
    //Email response
    echo "Thank you for contacting us!";
    header("Location:check.php");
    }
  //if "email" variable is not filled out, display the form
  }

?>

 <!DOCTYPE html>
<html>
<head>
  <title>step1</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
<body col-sm-12 col-xs-12>
  <div class="jumbotron">
    <div>
      <h2>Create Admin Account : Step 1 of 3</h2>
      <p>Enter your e-mail as the username</p>
    </div>
    <div>
      <?php if (!empty($error)) {
            echo '<div class="alert alert-danger">
                <strong>Danger!</strong> e-mail is not valid
              </div>';}
              ?>
    </div>
    <form method="post" class="middle well col-sm-6 col-xs-8" >
      <label>Email </label><input name="email" type="text" class="form-control" /><br />
      <input type="submit" value="Submit" class="btn btn-success" />
    </form>
  </div>
</body>
</html>
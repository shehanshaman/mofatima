<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" type="image/x-icon" href="img/icons/favicon.ico" />
    <title>WELCOME</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>
body, html {
    height: 100%;
    margin: 0;
}

.bgimg {
    <?php 
        $x = date("s") %10;
        $text = '';
        switch ($x) {
            case "0": 
                $text = "background-image:  url('../img/background/1.jpg');";
                break;
            case "1": 
                $text = "background-image:  url('../img/background/6.jpg');";
                break;
            case "2": 
                $text = "background-image:  url('../img/background/2.jpg');";
                break;
            case "3": 
                $text = "background-image:  url('../img/background/7.gif');";
                break;
            case "4": 
                $text = "background-image:  url('../img/background/3.jpg');";
                break;
            case "5": 
                $text = "background-image:  url('../img/background/8.jpg');";
                break;
            case "6": 
                $text = "background-image:  url('../img/background/4.jpg');";
                break;
            case "7": 
                $text = "background-image:  url('../img/background/9.jpg');";
                break;
            case "8": 
                $text = "background-image:  url('../img/background/5.jpg');";
                break;
            case "9": 
                $text = "background-image:  url('../img/background/10.jpg');";
                break;
        }
        echo $text;
     ?>
    /*background-image:  url('../img/home/intro1.jpg');*/
    height: 100%;
    background-position: center;
    background-size: cover;
    position: relative;
    color: white;
    font-family: "Courier New", Courier, monospace;
    font-size: 25px;
}

.topleft {
    position: absolute;
    top: 0;
    left: 16px;
}

.bottomleft {
    position: absolute;
    bottom: 0;
    left: 16px;
}

.bottomright{
    position: absolute;
    bottom: 0;
    right: 16px;
}

.middle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.middle h1{
    font-size: 75px;
    font-weight: bold;
}

hr {
    margin: auto;
    width: 40%;
}

audio { 
   display:none;
}

</style>
<body>

    <audio controls autoplay>
      <source src="../audio/background_christmas.mp3" type="audio/mpeg">
    </audio>

<div class="bgimg">
  <div class="topleft">
    <p>FATIMA CHURCH</p>
  </div>
  <div class="middle">
    <h1>COMING SOON</h1>
    <hr>
    <p id="demo" style="font-size:30px"></p>
  </div>
  <div class="bottomleft">
    <p>DIPPITIGODA KELANIYA</p>
  </div>
  <div class="bottomright">
      <p><a href="../home.php"><button class="btn btn-info">exit</button></a></p>
  </div>
</div>

<script>
//set count down date
var t = new Date();
t.setSeconds(t.getSeconds() + 10);

var countDownDate = t;

// Set the date we're counting down to
//var countDownDate = new Date("Jan 5, 2017 15:37:25").getTime();

// Update the count down every 1 second
var countdownfunction = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
   /* document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";*/
    document.getElementById("demo").innerHTML = seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(countdownfunction);
        document.getElementById("demo").innerHTML = "WELCOME";
        window.location.href = "../home.php";

    }
}, 1000);
</script>

</body>
</html>

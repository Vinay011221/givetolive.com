
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $current = $_SERVER['PHP_SELF']; 
if($current == '/DonorHome.php'){
  echo '<title>givetolive | Home</title>';
}
elseif($current == '/Donors.php'){
  echo '<title>givetolive | Donate</title>';
}
elseif($current == '/Events.php') {
  echo ' <title>givetolive | Events</title>';
}
elseif ($current == '/about.php') {
  echo ' <title>givetolive | About</title>';
}
elseif ($current == '/contact.php') {
  echo ' <title>givetolive | Contact Us</title>';
}
?>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="http://givetolive.com/css/sty.css" type="text/css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>


<nav class="navbar navbar-default">
<div class="im1 ">
      <img src="images/i1.jpg"><p class="orgname">givetolive</p>
</div>
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="<?php if($current == '/DonorHome.php'){echo 'active';}?>"><a href="DonorHome.php">Home</a></li>
        <li class="<?php if($current == '/Donors.php'){echo 'active';}?>"><a href="Donors.php">Donors</a></li>
        <li class="<?php if($current == '/Events.php'){echo 'active';}?>"><a href="Events.php">Events</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Back to start</a></li>
        <li class="<?php if($current == '/contact.php'){echo 'active';}?>"><a href="contact.php"><span class="glyphicon glyphicon-earphone"></span> Contact Us</a></li>
        <li class="<?php if($current == '/about.php'){echo 'active';}?>"><a href="about.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
      </ul>
    </div>
  </div>
</nav>


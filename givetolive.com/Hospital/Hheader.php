<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $current = $_SERVER['PHP_SELF']; 
if($current == '/Hospital/Hhome.php'){
  echo '<title>givetolive | Home</title>';
}
elseif($current == '/Hospital/Hospital.php'){
  echo '<title>givetolive | Hospital</title>';
}
elseif($current == '/Hospital/Hblood.php') {
  echo ' <title>givetolive | BloodBank</title>';
}
elseif ($current == '/Hospital/Habout.php') {
  echo ' <title>givetolive | About</title>';
}
elseif ($current == '/Hospital/Hcontact.php') {
  echo ' <title>givetolive | Contact Us</title>';
}
?>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/sty.css" type="text/css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>

</script>
</head>
<body>


<nav class="navbar navbar-default">
<div class="im1 ">
      <img src="../images/i1.jpg"><p class="orgname">givetolive</p>
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
        <li class="<?php if($current == '/Hospital/Hhome.php'){echo 'active';}?>"><a href="Hhome.php">Home</a></li>
        <li class="<?php if($current == '/Hospital/Hospital.php'){echo 'active';}?>"><a href="Hospital.php">Hospital</a></li>
        <li class="<?php if($current == '/Hospital/Hblood.php'){echo 'active';}?>"><a href="Hblood.php">BloodBank</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="hlogin.php?logout=true"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        <li class="<?php if($current == '/Hospital/Hcontact.php'){echo 'active';}?>"><a href="Hcontact.php"><span class="glyphicon glyphicon-earphone"></span> Contact Us</a></li>
        <li class="<?php if($current == '/Hospital/Habout.php'){echo 'active';}?>"><a href="Habout.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
      </ul>
    </div>
  </div>
</nav>


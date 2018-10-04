<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<?php $current = $_SERVER['PHP_SELF']; 
if($current == '/Admin/main.php'){
  echo '<title>givetolive | Admin</title>';
}
elseif($current == '/Admin/dashboard.php'){
  echo '<title>givetolive | Dashboard</title>';
}elseif($current == '/Admin/mumbai.php'){
  echo '<title>givetolive | Mumbai</title>';
}elseif($current == '/Admin/mumdash.php'){
  echo '<title>givetolive | Dashboard</title>';
}elseif($current == '/Admin/pune.php'){
  echo '<title>givetolive | Pune</title>';
}elseif($current == '/Admin/punedash.php'){
  echo '<title>givetolive | Dashboard</title>';
}elseif($current == '/Admin/thane.php'){
  echo '<title>givetolive | Thane</title>';
}elseif($current == '/Admin/thanedash.php'){
  echo '<title>givetolive | Dashboard</title>';
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
        <li class="<?php if($current == '/Admin/main.php'){echo 'active';}?>"><a href="main.php">Home</a></li>
        <li class="<?php if($current == '/Admin/dashboard.php'){echo 'active';}?>"><a href="dashboard.php">Dashboard</a></li>
      </ul>




      <ul class="nav navbar-nav navbar-right">
        <li><a href="adlogin.php?logout=true"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

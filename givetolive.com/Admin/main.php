<?php require_once 'header.php';?>
<?php require_once '../db.php';?>
<?php if(isset($_SESSION["aname"])): ?>
<?php 
$aname = $_SESSION["aname"];
$query = 'SELECT branch FROM manager WHERE aname = :aname';
$querystmt = $conn->prepare($query);
$querystmt->execute(['aname'=>$aname]);
$branches = $querystmt->fetch();
$branch = $branches['branch'];
?>
<div class="container">
<div class="jumbotron">
    <h1>Welcome <span><strong><?php echo $_SESSION["aname"] ;?></strong></span></h1> 
    <p><?php if($aname != 'all'){echo 'The Sub-Administrator of '.ucwords($branch).' branch.';}?></p>
    <p>Manage and view all details of system.</p>
    
  </div> 
</div>
<div class="container">
        <p style="font-size: 20px; font-family: monospace">The software system is an online blood bank management system that helps in managing various blood bank operations effectively. The project consists of a central repository containing various blood deposits available along with associated details. These details include blood type, storage area and date of storage. These details help in maintaining and monitoring the blood deposits. The project is an online system that allows to check weather required blood deposits of a particular group are available in the blood bank. Moreover the system also has added features such as patient name and contacts, blood booking and even need foe certain blood group is posted on the website to find available donors for a blood emergency. This online system is developed on .net platform and supported by an Sql database to store blood and user specific details.<br> 
            <strong>Advantages:</strong><br>
Helps Blood Banks to automate blood donor and depository online.<br>
Encourages blood donors to donate.<br>
Helps people find blood donors in times of need.<br>
  </p> 
</div>
<?php endif; ?>

<?php require_once 'footer.php';?>
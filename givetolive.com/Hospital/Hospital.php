<?php require_once 'Hheader.php';?>
<?php require_once '../db.php';?>
<?php if(isset($_SESSION["hid"])): ?>

<?php
$hid = $_SESSION["hid"] ;
global $conn;
$sql = "SELECT * FROM hospital WHERE hid = ?";
$stm = $conn->prepare($sql);
$stm->execute([$hid]);
$detail = $stm->fetch();


?>

<div class="container">
  <div class="container hbox">
    <div class="Hdetails">
       <div class="heading text-center"><h1>Your Hospital Details</h1></div>
       <hr>
       <div class="hbody">
        <p><label>Agent Name: </label> <?php echo $detail['agentName'];?></p>
        <p><label>Agent Email:</label> <?php echo $detail['agentEmail'];?></p>
        <p><label>Contact Number:</label> <?php echo $detail['Hcontact'];?></p>
        <p><label>Hospital Name:</label> <?php echo $detail['hname'];?></p>
        <p><label>Hospital Adress:</label> <?php echo $detail['hadd'];?></p>
       </div>
    </div>
  </div>
</div>

<?php endif; ?>


<?php require_once 'Hfooter.php';?>

<?php require_once 'header.php';?>
<?php require_once '../db.php';?>
<?php if(isset($_SESSION["aname"])): ?>
<?php
global $conn;
$aname = $_SESSION["aname"] ;
$query = 'SELECT branch FROM manager WHERE aname = :aname';
$querystmt = $conn->prepare($query);
$querystmt->execute(['aname'=>$aname]);
$branches = $querystmt->fetch();
$branch = $branches['branch'];
// echo $branch;
global $branch;
function donorCount(){
    global $conn,$branch;
    if($branch == 'all'){
      $stmt = $conn->prepare('SELECT * FROM donors');
      $stmt->execute();
      $donorCount = $stmt->rowCount();
      echo $donorCount;
    }else{
    $stmt = $conn->prepare('SELECT * FROM donors WHERE city = :city');
    $stmt->execute(['city'=>$branch]);
    $donorCount = $stmt->rowCount();
    echo $donorCount;
    }
  };

  function hospCount(){
    global $conn,$branch;
    if($branch == 'all'){   
      $stmt1 = $conn->prepare('SELECT * FROM hospital');
      $stmt1->execute();
      $hospCount = $stmt1->rowCount();
      echo $hospCount;
    }else{
      $stmt1 = $conn->prepare('SELECT * FROM hospital  WHERE city = :city');
      $stmt1->execute(['city'=>$branch]);
      $hospCount = $stmt1->rowCount();
      echo $hospCount;
    }
  };
   
  function bloodCount(){
      global $conn,$branch;
      if($branch == 'all'){
      $stmt2 = $conn->prepare('SELECT SUM(bloodAmount) FROM donors');
      $stmt2->execute();
      $bCount = $stmt2->fetch();
      echo $bCount['SUM(bloodAmount)'];
    }else{
      global $conn,$branch;
      $stmt2 = $conn->prepare('SELECT SUM(bloodAmount) FROM donors  WHERE city = :city ');
      $stmt2->execute(['city'=>$branch]);
      $bCount = $stmt2->fetch();
      echo $bCount['SUM(bloodAmount)'];
    }
  };

  function adCount(){
    global $conn;
    $stmt3 = $conn->prepare('SELECT * FROM manager');
    $stmt3->execute();
    $adCount = $stmt3->rowCount();
    echo $adCount;
  };
   
 

?>


<section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Dashboard<?php if($branch == 'mumbai'){echo ' / Mumbai';}elseif($branch == 'pune'){echo ' / Pune';}elseif($branch == 'thane'){echo ' / Thane';}elseif($branch == 'all'){echo '';} ?></li>
        </ol>
      </div>
    </section>

    <br>
    <!--Panel 1  -->
<div class="container">
  <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Website Overview</h3>
        </div>
          <div class="panel-body">
            <?php if($branch != 'all'){?>
                <div class="col-md-4">
                  <div class="well dash-box text-center">
                    <h4>Donors</h4>
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true">
                      <!-- no of users fetch from db.--></span><?php donorCount();?></h2>
                    
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="well dash-box text-center">
                  <h4>Hosp.Agents</h4>
                    <h2><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> <?php hospCount();?></h2>
                    
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="well dash-box text-center">
                    <h4>BloodAmount</h4>
                    <h2><span class="glyphicon glyphicon-tint" aria-hidden="true"></span> <?php bloodCount();?>ml</h2>
                  
                  </div>
                </div>
              <?php } else{?>
                <div class="col-md-3">
                  <div class="well dash-box text-center">
                    <h4>Donors</h4>
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true">
                      <!-- no of users fetch from db.--></span><?php donorCount();?></h2>
                    
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box text-center">
                  <h4>Hosp.Agents</h4>
                    <h2><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> <?php hospCount();?></h2>
                    
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box text-center">
                  <h4>Sub-Admins</h4>
                    <h2><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> <?php adCount();?></h2>
                    
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box text-center">
                    <h4>BloodAmount</h4>
                    <h2><span class="glyphicon glyphicon-tint" aria-hidden="true"></span> <?php bloodCount();?>ml</h2>
                  
                  </div>
                </div>
              <?php };?>
          </div>
  </div>
</div>


     <!-- panel 2 -->
<div class="container">
  <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Donors</h3>
              </div>
    <div class="panel-body">
              <table class="table table-striped table-responsive dDetail">
                <thead>
                  <tr>
                    <th>Sr.</th>
                    <th>Donor</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Blood Group</th>
                    <th>Blood(in ml)</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
    <?PHP //NAMED PARAMS
    if($branch == 'all'){
          $i = 1;
          $sql4 = "SELECT * FROM donors";
          $stmt4 = $conn->query($sql4);
          $stmt4->execute();
          $posts = $stmt4->fetchAll();
          foreach($posts as $post){
    ?>    
                  <tr>
                    <td><?php echo $i++ ;?></td>
                    <td><?php echo $post['dname'];?></td>
                    <td><?php echo $post['dcontact'];?></td>
                    <td><?php echo $post['demail'];?></td>
                    <td><?php echo $post['city'];?></td>
                    <td><?php  echo $post['dBrgp'];?></td>
                    <td><?php echo $post['bloodAmount'];?></td>
                    <td><button class="btn btn-sm btn-danger">Remove</button></td>
                  </tr>
     <?PHP }}else{
      $i = 1;
          $sql4 = "SELECT * FROM donors WHERE city = :city";
          $stmt4 = $conn->prepare($sql4);
          $stmt4->execute(['city'=>$branch]);
          $posts = $stmt4->fetchAll();
          foreach($posts as $post){
    ?>    
                  <tr>
                    <td><?php echo $i++ ;?></td>
                    <td><?php echo $post['dname'];?></td>
                    <td><?php echo $post['dcontact'];?></td>
                    <td><?php echo $post['demail'];?></td>
                    <td><?php echo $post['city'];?></td>
                    <td><?php  echo $post['dBrgp'];?></td>
                    <td><?php echo $post['bloodAmount'];?></td>
                    <td><button class="btn btn-sm btn-danger">Remove</button></td>
                  </tr>
     <?php }};?> 
                </tbody>
              </table>
    </div>
  </div>


</div>


<div class="container">
<div class="panel panel-default">
    <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Hospital Agents</h3>
              </div>
      <div class="panel-body">
          <table class="table table-striped table-responsive dDetail">
            <thead>
                <tr>
                 <th>Sr.</th>
                 <th>Agent</th>
                 <th>Contact</th>
                 <th>Email</th>
                 <th>Hospital Name</th>
                 <th>Address</th>
                 <th>City</th>
                 <th>Action</th>
                </tr>
            </thead>
            <tbody>
      <?PHP 
        if($branch == 'all'){ 
            $i = 1;
            $sql5 = "SELECT * FROM hospital ";
            $stmt5 = $conn->query($sql5);
            $stmt5->execute();
            $hposts = $stmt5->fetchAll();
            foreach($hposts as $hpost){
      ?>    
              <tr>
               <td><?php echo $i++ ;?></td>
               <td><?php echo $hpost['agentName'];?></td>
               <td><?php echo $hpost['Hcontact'];?></td>
               <td><?php echo $hpost['agentEmail'];?></td>
               <td><?php  echo $hpost['hname'];?></td>
               <td><?php  echo $hpost['hadd'];?></td>
               <td><?php echo $hpost['city'];?></td>
               <td><button class="btn btn-sm btn-danger">Remove</button></td>
              </tr>
     <?PHP }}else{
      $i = 1;
            $sql5 = "SELECT * FROM hospital WHERE city = :city";
            $stmt5 = $conn->prepare($sql5);
            $stmt5->execute(['city'=>$branch]);
            $hposts = $stmt5->fetchAll();
            foreach($hposts as $hpost){
      ?>    
              <tr>
               <td><?php echo $i++ ;?></td>
               <td><?php echo $hpost['agentName'];?></td>
               <td><?php echo $hpost['Hcontact'];?></td>
               <td><?php echo $hpost['agentEmail'];?></td>
               <td><?php  echo $hpost['hname'];?></td>
               <td><?php  echo $hpost['hadd'];?></td>
               <td><?php echo $hpost['city'];?></td>
               <td><button class="btn btn-sm btn-danger">Remove</button></td>
              </tr>

     <?php }}?>
           </tbody>
          </table>
      </div>
</div>
</div>
    

    
<?php endif; ?>
   
<?php require_once 'footer.php';?>
<?php require_once 'Hheader.php';?>
<?php require_once '../db.php';?>

<?php
global $conn;


?>
<div class="container">
  <div class="container hbox">
    <div class="Hdetails">
       <div class="heading text-center"><h1>Blood Bank</h1></div>
       <hr>
        <!-- <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
         <label>Select Blood Group:</label>
         <select class="form-control" onchange="showUser(this.value)" name="bgrp">
         <option>-- select blood group--</option>
               <option value="AB+">AB+</option>
               <option value="AB-">AB-</option>
               <option value="A+">A+</option>
               <option value="A-">A-</option>
               <option value="B+">B+</option>
               <option value="B-">B-</option>
               <option value="O+">O+</option>
               <option value="O-">O-</option>
         </select><br>
         <input type="submit"  id="select" class="btn btn-primary" name="select" value="select" /> 
        </form> -->
        <!-- Hidden Table -->
     

    <table class="table table-striped table-responsive dDetail">
    <thead>
      <tr>
        <th>Sr.</th>
        <th>Donor</th>
        <th>Blood Group</th>
        <th>Blood(in ml)</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?PHP //NAMED PARAMS
    
     $i = 1;
     $sql1 = "SELECT * FROM donors";
     $stmt = $conn->query($sql1);
     $stmt->execute();
     $posts = $stmt->fetchAll();
     foreach($posts as $post){
    ?>    
      <tr>
        <td><?php echo $i++ ;?></td>
        <td><?php echo $post['dname'];?></td>
        <td><?php  echo $post['dBrgp'];?></td>
        <td><?php echo $post['bloodAmount'];?></td>
        <td><button class="btn btn-sm btn-primary">BUY</button></td>
      </tr>
     <?PHP };?>
    </tbody>
  </table>
    </div>
  </div>
</div>
<?php require_once 'Hfooter.php';?>

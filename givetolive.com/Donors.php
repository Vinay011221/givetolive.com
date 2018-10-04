<?php require_once 'header.php';?>
<?php require_once 'db.php';?>
<?php
global $conn;
 // message vars
 $msg = '';
 $msgClass='';
if(isset($_POST['addDonation'])){
  $dname = $_POST['donorName'];
  $demail = $_POST['donorEmail'];
  $dcontact = $_POST['donorContact'];
  $city = $_POST['city'];
  $dadd = $_POST['dAddress'];
  $dgend = $_POST['Dgender'];
  $dage = $_POST['donorAge'];
  $dbgp = $_POST['bloodgroup'];
  $blood = $_POST['bloodQuantity'];
  $sql1 = 'INSERT INTO donors(dname,demail,dcontact,city,address,gender,dage,dBrgp,bloodAmount) VALUES(:dname,:demail,:dcontact,:city,:address,:gender,:dage,:dBrgp,:bloodAmount)';
  $stmt1 = $conn->prepare($sql1);
  $stmt1->bindParam('dname', $dname);
  $stmt1->bindParam('demail', $demail);
  $stmt1->bindParam('dcontact', $dcontact );
  $stmt1->bindParam('city', $city);
  $stmt1->bindParam('address', $dadd);
  $stmt1->bindParam('gender',$dgend);
  $stmt1->bindParam('dage', $dage);
  $stmt1->bindParam('dBrgp', $dbgp);
  $stmt1->bindParam('bloodAmount',$blood);
  if($dgend!= "" || $dbgp!=""){
  if($stmt1->execute()){
    echo "<script>console.log('Donation done')</script>";
    $msg = 'Your Donation was added succesfully';
    $msgClass='alert-success';
   }else{
    echo "<script>console.log('Donation failed')</script>";
    $msg = 'Donation failed';
    $msgClass='alert-danger';
   }
  }
  else{
    echo "<script>console.log('Donation failed')</script>";
    $msg = 'Please select gender and blood group';
    $msgClass='alert-danger';
  }
}






?>
<br>

<div class="container donor-container">
<?php if ($msg!=''): ?>
    <div id="alertBox" class="alert <?php echo $msgClass ; ?>">
        <button onclick="closeAlert()" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <?php echo $msg ;?>
    </div>
<?php endif; ?>
<script>
function closeAlert(){
   $('#alertBox').hide();
}

</script>
  <div class="donor-adv">
      <div class="inner-box">
             <h1>"Well Do the Work, <br> You Save A Life"</h1>

      </div>
  </div>
  <div class="row donor-box">
      <div class="AddDonation text-center">
          <button class="btn btn-primary" data-toggle="modal" data-target="#donorForm"><span class="glyphicon glyphicon-plus"></span> Add Donation</button>
          <br><br><br>
          <p>You agree to Donate Blood by following our <a href="terms&cond.php" style="color:dodgerblue">Terms Of Service</a>.</p>

      </div>
  </div>
</div>

<!--Donor Form modal -->
<div class="modal fade" id="donorForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Donation</h4>
      </div>
      <div class="modal-body">
        <form action="Donors.php" method="post">
        <div class="form-group">
          <label>Donor Name:</label>
          <input type="text" class="form-control" name="donorName" placeholder="Enter donor's name">
        </div>
        <div class="form-group">
          <label>Email address:</label>
          <input type="email" class="form-control" name="donorEmail" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label>Contact no:</label>
          <input type="text" class="form-control" name="donorContact">
        </div>
        <div class="form-group">
          <label>Select your City:</label>
          <select name="city" required="required" class="form-control">
               <option>--select city--</option>
               <option value="mumbai">Mumbai</option>
               <option value="thane">Thane</option>
               <option value="pune">Pune</option>
          </select>
        </div>
        <div class="form-group">
        <label>Address:</label>
        <textarea class="form-control" name="dAddress"rows="3"></textarea>
        </div>
       <div class="form-group">
           <label>Gender:</label>
           <label class="radio-inline"><input required="required" type="radio" value="Male" name="Dgender">Male</label>
           <label class="radio-inline"><input required="required" type="radio" value="Female" name="Dgender">Female</label>
       </div>
        <div class="form-group">
          <label>Donor Age:</label>
          <input type="number" required="required" class="form-control" name="donorAge">
        </div>
        <div class="form-group">
          <label>Blood Group:</label>
          <select name="bloodgroup" required="required" class="form-control">
              <option>-- select blood group--</option>
               <option value="AB+">AB+</option>
               <option value="AB-">AB-</option>
               <option value="A+">A+</option>
               <option value="A-">A-</option>
               <option value="B+">B+</option>
               <option value="B-">B-</option>
               <option value="O+">O+</option>
               <option value="O-">O-</option>
          </select>
        </div>
        <div class="form-group">
           <label class="sr-only" for="exampleInputAmount">Blood Quantity(in ml)</label>
           <div class="input-group">
            <input type="number" required="required" class="form-control" name="bloodQuantity" placeholder="Amount">
            <div class="input-group-addon">ml</div>
         </div>
        </div>
        <button type="submit" name="addDonation" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end -->
<?php require_once 'footer.php';?>

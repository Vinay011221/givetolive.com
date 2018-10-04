<?php require_once '../db.php';?>


<?php 
 // message vars
 $msg = '';
 $msgClass='';
 //connection
global $conn;
if(isset($_POST["register"])){
    $user=htmlspecialchars($_POST['usernamesignup']);
    $email=htmlspecialchars($_POST['emailsignup']);
    $contact=htmlspecialchars($_POST['contact']);
    $pass=htmlspecialchars($_POST['passwordsignup']);
    $rePass=htmlspecialchars($_POST['passwordsignup_confirm']);
    $hname=htmlspecialchars($_POST['hname']);
    $hadd=htmlspecialchars($_POST['hadd']);
    $city=htmlspecialchars($_POST['hcity']);


    $plen = strlen($pass);
    if(!empty($user) || !empty($email)){
     if($plen <= 7){
      if($pass == $rePass){
        $sql = 'INSERT INTO hospital(agentName,agentEmail,Hcontact,agentPass,hname,hadd,city) VALUES(:agentName,:agentEmail,:Hcontact,:agentPass,:hname,:hadd,:city)';
        $stmt = $conn->prepare($sql);
        if($stmt->execute(['agentName'=>$user, 'agentEmail' => $email,'Hcontact'=>$contact,'agentPass'=>$pass,'hname' =>$hname,'hadd' =>$hadd,'city' =>$city])){
            $msg = 'Succesfully Registered! <br><p>Now go and login with username and password</p><br><a href="hlogin.php">GO</a>';
            $msgClass='alert-success';
        }
      }else{
        $msg = 'Password and confirm password does not match';
        $msgClass='alert-danger';
      } 
     } else{
        $msg = 'Password must be of 7 or less than 7 characters or numbers';
        $msgClass='alert-danger';
     }
    } else{
        $msg = 'Username or Password empty!';
        $msgClass='alert-danger';
     }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hosp. Agent | Register</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/sty.css" type="text/css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
<style>

</style>
</head>
<body>
    <div><h1 class="text-center text-white" >
      Welcome, Please register your account
    </h1>
    </div>
    <div class="container" id="login">
    <div>
         <?php if ($msg!=''): ?>
           <div class="alert <?php echo $msgClass ; ?>"><?php echo $msg ;?></div>
         <?php endif; ?>
 
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="on" method="post"> 
                                <h1> Sign up </h1> 
                                <p class="form-group"> 
                                    <label for="usernamesignup">Your username</label>
                                    <input class="form-control" name="usernamesignup" required="required" type="text" placeholder="Your name" />
                                </p>
                                <p class="form-group"> 
                                    <label> Your email</label>
                                    <input class="form-control" name="emailsignup" required="required" type="email" placeholder="eg. example@mail.com"/> 
                                </p>
                                <p class="form-group"> 
                                    <label> Your Contact</label>
                                    <input class="form-control" name="contact" required="required"  placeholder="91xxxxxx"/> 
                                </p>
                                <p class="form-group"> 
                                    <label>Your password </label>
                                    <input class="form-control" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="form-group"> 
                                    <label>Please confirm your password </label>
                                    <input class="form-control" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="form-group"> 
                                    <label>Hospital Name</label>
                                    <input class="form-control" name="hname" required="required" type="Hospital Name" placeholder="Your Hospital Name"/>
                                </p>
                                <p class="form-group"> 
                                    <label>Hospital Address</label>
                                    <textarea class="form-control" required="required" name="hadd"></textarea>
                                </p>
                                <p class="form-group"> 
                                    <label>Select City</label>
                                    <select class="form-control" name="hcity">
                                    <option>-- select City--</option>
                                    <option value="mumbai">Mumbai</option>
                                    <option value="thane">Thane</option>
                                    <option value="pune">Pune</option>
                                    </select>
                                </p>
                                <p class=" button"> 
									<input type="submit" class="btn btn-danger" name="register" value="Sign up"/> 
								</p>
                                <p class="form-group">  
									Already a member ?
									<a href="hlogin.php"id="link-signup"> Go and log in </a>
								</p>
                            </form>
           </div>

    </div>
</body>
</html>
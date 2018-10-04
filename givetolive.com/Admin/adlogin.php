<?php require_once '../db.php';?>


<?php 
 // message vars
 $msg = '';
 $msgClass='';
 //connection
global $conn;
if(isset($_POST["login"])){
    $user=$_POST["username"];
    $pass=($_POST["password"]);
 
    $sql="SELECT * FROM manager where (aname = '$user' AND apass='$pass') OR (aemail = '$user' AND apass= '$pass')";
    
    $htm = $conn->query($sql);
    if($htm->rowCount()){
     $var=$htm->fetchAll(PDO::FETCH_ASSOC);
        if($var){
            foreach ($var as $row) {
                if($row["aname"]==$user || $row["aemail"]==$user){
                    if($row["apass"]==$pass){
                        if($row["branch"]=='all'){
                           $_SESSION["aname"] = $row['aname'];
                           header('Location:http://givetolive.com/Admin/main.php');
                        }elseif($row["branch"]=='mumbai'){
                           $_SESSION["aname"] = $row['aname'];
                           header('Location:http://givetolive.com/Admin/main.php');
                        }elseif($row["branch"]=='thane'){
                            $_SESSION["aname"] = $row['aname'];
                            header('Location:http://givetolive.com/Admin/main.php');
                        }elseif($row["branch"]=='pune'){
                            $_SESSION["aname"] = $row['aname'];
                            header('Location:http://givetolive.com/Admin/main.php');
                         }else{
                            die("sad");
                            $msg = 'Invalid Username or password.';
                            $msgClass='alert-danger';
                         }
                      }
                     else
                     {
                         die("sad");
                         $msg = 'Invalid Username or password.';
                         $msgClass='alert-danger';
                     }
                }
            }
        }
     }
     
      else{
          $msg = 'Invalid Username or password.';
          $msgClass='alert-danger';
     }
 }
 


if(isset($_REQUEST['logout']))
{
    $_SESSION = array();
    session_destroy();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hosp. Agent | Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/sty.css" type="text/css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</head>
<body>
<div><h1 class="text-center text-white" >
      Welcome, Please login to continue
    </h1></div>
    <div class="container" id="login">
    <div >
    <?php if ($msg!=''): ?>
         <div class="alert <?php echo $msgClass ; ?>"><?php echo $msg ;?></div>
    <?php endif; ?>
 
                            <form class="form-login1" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="on" method="post"> 
                                <h1 class="text-light-blue">Log in</h1> 
                                <p class="form-group text-white"> 
                                    <label for="username"> Your email or username </label>
                                    <input id="username" name="username" class="form-control" required="required" type="text" placeholder="username or example@mail.com"/>
                                </p>
                                <p class="form-group text-white"> 
                                    <label for="password"> Your password </label>
                                    <input id="password" name="password" class="form-control" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="checkbox text-white">
                                    <label>
                                     <input type="checkbox"> Check me out
                                    </label>
                                </p>
                                <p class="form-group text-white"> 
                                    <input type="submit"  class="btn btn-primary" name="login" value="Login" /> 
								</p>
                                <p class="form-group text-white">
                                    <a href="../index.php" id="link-signup">Go home</a>
								</p>
                            </form>
                        </div>

    </div>
</body>
</html>


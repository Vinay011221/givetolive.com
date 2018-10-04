<?php

 if(session_status() == PHP_SESSION_NONE)
 {
     session_start();
 }

$servername = "localhost";
$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=$servername;dbname=blood bank", $username, $password);
    
    echo "<script>console.log('Connected successfully')</script>";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?> 
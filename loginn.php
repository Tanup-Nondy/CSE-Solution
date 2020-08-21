<?php
include "db.php";
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['mail']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['pass']); 
      
      $sql = "SELECT id FROM login WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         $_SESSION["admin"]="true";
 			echo "<script type='text/javascript'>alert('Login Successfull!!');</script>";
 			//alert("Login Successfull!!");
 			header("Location:index.php");
      }else {
         $_SESSION["admin"]="false";
 			echo "<script type='text/javascript'>alert('Email or Password doesn't match!!!');</script>";
 			header("Location:index.php");
      }
   }
?>
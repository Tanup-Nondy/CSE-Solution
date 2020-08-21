<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
echo $email.$password;
$count=45;
include "db.php";
            
$insert="SELECT * FROM login where email='$email' and password='$password' ";
$chk=mysqli_query($conn,$insert);
 if($chk){
 		$c=0;
            while($row=mysqli_fetch_array($chk)){
              $c=$c+1;
          }
          echo $c;
 		if($c==1){
 			$_SESSION["admin"]="true";
 			echo "success";
 			//echo "<script type='text/javascript'>alert('Login Successfull!!');</script>";
 			//alert("Login Successfull!!");
 			//header("Location:index.php");
 		}else{
 			$_SESSION["admin"]="false";
 			echo "error";
 			//echo "<script type='text/javascript'>alert('Email or Password doesn't match!!!');</script>";
 			//header("Location:index.php");
 		}
 }else{
 	$_SESSION["admin"]="false";
 			echo "<script type='text/javascript'>alert('Email or Password doesn't match!!!');</script>";
 			//header("Location:index.php");
 }

?>
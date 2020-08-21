<?php
$session = $_POST['session'];
$semester = $_POST['semester'];

include "db.php";
            
$insert="INSERT INTO sem_ses(session,semester) VALUES('$session','$semester')";
 if(mysqli_query($conn,$insert)){
 		header("Location:routines.php");
 }else{
 	echo "error";
 }

?>
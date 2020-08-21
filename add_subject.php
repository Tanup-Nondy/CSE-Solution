<?php
$subject = $_POST['subject'];


include "db.php";
            
$insert="INSERT INTO subjects(subject) VALUES('$subject')";
 if(mysqli_query($conn,$insert)){
 		header("Location:books.php");
 }else{
 	echo "error";
 }

?>
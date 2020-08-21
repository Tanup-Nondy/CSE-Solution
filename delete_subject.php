<?php
$subject = $_POST['subject'];


include "db.php";
            
$delete="DELETE FROM subjects where subject='$subject'";
 if(mysqli_query($conn,$delete)){
 		header("Location:books.php");
 }else{
 	echo "error";
 }


?>
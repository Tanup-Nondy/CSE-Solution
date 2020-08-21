<?php
session_start();
$subject = $_POST['subject'];
$id=$_POST['id'];
$_SESSION["subject"]="$subject";
include "db.php";
            
$delete="DELETE FROM books where id='$id'";
 if(mysqli_query($conn,$delete)){
 		header("Location:books.php");
 }else{
 	echo "error";
 }


?>
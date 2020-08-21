<?php
session_start();
$session = $_POST['session'];
$semester = $_POST['semester'];
$_SESSION["ses"]="$session";
$_SESSION["sem"]="$semester";
$day = $_POST['day'];
$time = $_POST['time'];
$course = $_POST['course'];
$teacher = $_POST['teacher'];


include "db.php";
            
$insert="INSERT INTO routines(session,semester,day,time,course,teacher) VALUES('$session','$semester','$day','$time','$course','$teacher')";
 if(mysqli_query($conn,$insert)){
 		header("Location:view_routine.php");
 }else{
 	echo "error";
 }

?>
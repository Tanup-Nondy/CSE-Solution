<?php
session_start();
$session = $_POST['session'];
$semester = $_POST['semester'];
$_SESSION["ses"]="$session";
$_SESSION["sem"]="$semester";
$id = $_POST['id'];
$day = $_POST['day'];
$time = $_POST['time'];
$course = $_POST['course'];
$teacher = $_POST['teacher'];

include "db.php";
            
$update="UPDATE routines set day='$day',time='$time',course='$course',teacher='$teacher' where session='$session' and semester='$semester' and id=$id";
 if(mysqli_query($conn,$update)){
 		header("Location:view_routine.php");
 }else{
 	echo "error";
 }

/*if($name !=''&& $email !=''&& $contact !=''&& $address !='')
{
//  To redirect form on a particular page
header("Location:https://www.formget.com/app/");
}
else{
?><span><?php echo "Please fill all fields.....!!!!!!!!!!!!";?></span> <?php
}*/

?>
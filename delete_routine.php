<?php
$session = $_POST['session'];
$semester = $_POST['semester'];

include "db.php";
            
$delete="DELETE FROM sem_ses where session='$session' and semester='$semester'";
 if(mysqli_query($conn,$delete)){
 	$delete="DELETE FROM routines where session='$session' and semester='$semester'";
 	if(mysqli_query($conn,$delete)){
 		header("Location:routines.php");
 	}else{
 		echo "error";
 	}
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
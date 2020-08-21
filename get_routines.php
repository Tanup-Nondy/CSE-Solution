<?php
include "db.php";
$select="SELECT DISTINCT session,semester FROM routines ";
$result=mysqli_query($conn,$select);
while($row=mysqli_fetch_array($result)){
	echo '<div style="background-color:black;color:white;border:1px solid;border-color:white;">';
	echo "Question:".$count."</br>";
	echo $row['details']."</br>";
	echo $row['opt1']."</br>";
	echo $row['opt2']."</br>";
	echo $row['opt3']."</br>";
	echo $row['opt4']."</br>";
	echo "Answer"."</br>";
	echo $row['answer']."</br>";
	echo "</div>";
	$count=$count+1;
}
?>
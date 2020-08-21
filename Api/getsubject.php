<?php
include "db.php";

header('content-type:application/json');
	$request=$_SERVER['REQUEST_METHOD'];
	switch ($request) {
		case 'GET':
			getmethod($conn);
			break;	
		default:
			# code...
			break;
	}
	function getmethod($conn){
		$sql="SELECT * FROM subjects";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$rows=array();
			while($r=mysqli_fetch_assoc($result)){
				$rows['result'][]=$r;
			}
			echo json_encode($rows);
		}else{
			echo '{result:" "no data found"}';
		}
	}
	
?>
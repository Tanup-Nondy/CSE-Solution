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
        $sem=htmlspecialchars($_GET["sem"]);
        $ses=htmlspecialchars($_GET["ses"]);
		
		$sql="SELECT * FROM routines where session='$ses' and semester='$sem'";
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
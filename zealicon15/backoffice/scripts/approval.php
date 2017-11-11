<?php
$type= $_GET['type'];
$id = $_GET['id'];
session_start();
include '../common-code/db.php';
$conn = dbConnect();
$value = 1;
if ($type==="accept"){
    	$sql = "UPDATE events SET `display`='$value' where `id`='$id'";
		$result = $conn->query($sql);
        dbDisconnect($conn);
        if($result){
			header("location:../approval.php");
		}
		else{
			echo "Some error occured..:(";
		}
}
?>
<?php
$type= $_GET['type'];
$id = $_GET['id'];
session_start();
include '../common-code/db.php';
$conn = dbConnect();
if ($type==="team"){
    	$sql = "DELETE from team where `id`='$id'";
		$result = $conn->query($sql);
        dbDisconnect($conn);
        if($result){
			header("location:../team.php");
		}
		else{
			echo "Some error occured..:(";
		}
}
if ($type==="contact"){
    	$sql = "DELETE from contactus where `id`='$id'";
		$result = $conn->query($sql);
        dbDisconnect($conn);
        if($result){
			header("location:../contact.php");
		}
		else{
			echo "Some error occured..:(";
		}
}
if ($type==="society"){
    	$sql = "DELETE from society where `id`='$id'";
		$result = $conn->query($sql);
        dbDisconnect($conn);
        if($result){
			header("location:../societies.php");
		}
		else{
			echo "Some error occured..:(";
		}
}

if ($type==="event"){
    	$sql = "DELETE from events where `id`='$id'";
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
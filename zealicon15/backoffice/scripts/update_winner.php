<?php 
	session_start();
	include '../common-code/db.php';
		updateWinner();

	function updateWinner(){
		$conn = dbConnect();
		$event_name='';$winner1='';$winner2='';
		if(isset($_POST['event_name'])) $event_name = $conn->real_escape_string($_POST['event_name']);
		if(isset($_POST['winner1'])) $winner1 = $conn->real_escape_string($_POST['winner1']);
		if(isset($_POST['winner2'])) $winner2 = $conn->real_escape_string($_POST['winner2']);
		$sql = "UPDATE events SET `winner1`='$winner1', `winner2`='$winner2' WHERE `name`='$event_name'";
		$result = $conn->query($sql);
		dbDisconnect($conn);
		if($result){
			header("location:../winners.php");
		}
		else{
			echo "Some error occured..:(";
		}
	}
?>
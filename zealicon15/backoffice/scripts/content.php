<?php 
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}

	include_once $_SERVER['DOCUMENT_ROOT'].'/common-code/db.php';

	if(isset($_POST['type']) && $_POST['type'] == 'about')
	{
		addAboutData();
	}
	if(isset($_POST['type']) && $_POST['type'] == 'schedule')
	{
		addSchedule();
	}

	function addAboutData(){
		$data = '';
		if(isset($_POST['about']))
		$data = htmlspecialchars($_POST['about']);
		$conn = dbConnect();
		$sql = "UPDATE festdata SET data='".$data."' WHERE type='about'";
		$result = $conn->query($sql);
		dbDisconnect($conn);
		if($result){
			header("location:../content.php");
		}
		else{
			echo "some error occured..:(";
		}
	}

	function getFestData($type){
		$conn = dbConnect();
		$sql = "SELECT * FROM festdata WHERE type='".$type."' LIMIT 1";
		$result = $conn->query($sql);
		$data =  $result->fetch_assoc();
		dbDisconnect($conn);
		return $data;
	}

	function addSchedule(){
		$filePath = '';
		if(isset($_FILES['scheduleFile']) && $_FILES['scheduleFile']['error'] != 4)
		{
			$target_dir = "../uploads/schedule/";
			$target_file = $target_dir . basename($_FILES["scheduleFile"]["name"]);
			if(move_uploaded_file($_FILES["scheduleFile"]["tmp_name"], $target_file))
			{
				$filePath = 'uploads/schedule/'.$_FILES["scheduleFile"]["name"];
			}
		}
		$conn = dbConnect();
		$sql = "UPDATE festdata SET data='".$filePath."' WHERE type='schedule'";
		$result = $conn->query($sql);
		dbDisconnect($conn);
		if($result and $filePath!= ''){
			echo "File Successfully uploaded.. :)";
			echo "<a href='../content.php' style='display:inline-block;padding:10px 15px;background:#2ecc71;margin-left:20px;text-decoration:none;color:white;'>Go Back</a>";
		}
		else{
			echo "some error occured..:(";
		}
	}
 ?>
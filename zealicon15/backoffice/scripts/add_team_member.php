<?php 
	session_start();
	include '../common-code/db.php';
		addTeamMember();

	function addTeamMember(){
		$conn = dbConnect();
		$filePath = '';$name='';$category='';$title='';$long_desc='';$short_desc='';$fb_link='';$l_link='';
		if(isset($_POST['name'])) $name = $conn->real_escape_string($_POST['name']);
		if(isset($_POST['category'])) $category = $conn->real_escape_string($_POST['category']);
		if(isset($_POST['title'])) $title = $conn->real_escape_string($_POST['title']);
		if(isset($_POST['long_desc'])) $long_desc = $conn->real_escape_string($_POST['long_desc']);
		if(isset($_POST['short_desc'])) $short_desc = $conn->real_escape_string($_POST['short_desc']);
		if(isset($_POST['fb_link'])) $fb_link = $_POST['fb_link'];
		if(isset($_POST['l_link'])) $l_link = $_POST['l_link'];
		if(isset($_FILES['file']))
		{
			$target_dir = "../uploads/team/";
			$target_file = $target_dir . basename($_FILES["file"]["name"]);
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
			{
				$filePath = 'uploads/team/'.$_FILES["file"]["name"];
			}
		}
		$description = array(
			'long_desc' => $long_desc,
			'short_desc' => $short_desc,
		);
		$description = json_encode($description);
        $links = array(
			'fb_link' => $fb_link,
			'l_link' => $l_link,
		);
		$links = json_encode($links);
		$sql = "INSERT INTO team (name,category,title,description,links,img) VALUES ('".$name."','".$category."','".$title."','".$description."','".$links."','".$filePath."')";
        echo $sql;
		$result = $conn->query($sql);
		dbDisconnect($conn);
		if($result){
			header("location:../team.php");
		}
		else{
			echo "Some error occured..:(";
		}
	}
?>
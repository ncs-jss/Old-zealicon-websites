<?php 

	include_once 'db.php';

	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}

	$flashData = '';

	function login(){
		if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'])
		{
			header("location:/");
		}
		$username='';
		$password='';
		if(isset($_POST['username']))
			$username = $_POST['username'];
		if(isset($_POST['password']))
			$password = $_POST['password'];
		if($username == '' || $password == ''){
			return;
		}	
		else
		{
			if(doLogin($username,$password))
			{
				header("location:/");
			}
			else
			{
				$GLOBALS['flashData'] = "Username or password incorect";
			}
		}
	}

	function doLogin($username,$password){
		$conn = dbConnect();
		$username = $conn->real_escape_string($username);
		$password = $conn->real_escape_string($password);
		$sql = "SELECT id,societyName,username,isSuperAdmin FROM society WHERE username='".$username."' AND password='".$password."' LIMIT 1";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			$_SESSION['user'] = $result->fetch_assoc();
			$_SESSION['loggedIn'] = true;
			return 1;
		}
		dbDisconnect($conn);
		return 0;
	}

	function clearFlashData(){
		if($GLOBALS['flashData'] != '')
			$GLOBALS['flashData'] = '';
	}

	function LoggedIn(){
		if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'])
			return 1;
		else
			return 0;
	}

	function auth(){
		if(isset($_SESSION['user']['isSuperAdmin']) && $_SESSION['user']['isSuperAdmin']){}
		else{
			header("location:/");
		}
	}
?>
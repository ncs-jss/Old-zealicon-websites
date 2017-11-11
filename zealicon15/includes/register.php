<?php

require '../backoffice/common-code/db.php';
$conn = dbConnect();


print_r($_REQUEST);



if(isset($_REQUEST['mobile'])&&isset($_REQUEST['email'])&&isset($_REQUEST['name'])&&isset($_REQUEST['course'])&&isset($_REQUEST['collegeName'])){
    $mobile = $_REQUEST['mobile'];
    $email = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $course = $_REQUEST['course'];
    $collegeName = $_REQUEST['collegeName'];	
    $sql = "Insert into registration(mobile,email,name,course,collegeName) values($mobile,'$email','$name','$course','$collegeName')";
    
    if($conn->query($sql)){
	echo json_encode(array('err'=>false,'msg'=>'registered successfully'));
     }else{
	echo json_encode(array('err'=>true,'msg'=>'Already registered'));	
     }

}else{
echo json_encode(array('err'=>true,'msg'=>'Please fill all the inputs'));
}



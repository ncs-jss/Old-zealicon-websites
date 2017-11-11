<?php
    session_start();
	if(!isset($_SESSION['society']))
	{
	 $_SESSION['error']="Please Log In First";
	 header('Location: ../society.php');
	}
	if(isset($_POST['eventpdf']))
	$sname=$_POST['eventpdf'];			
	$file = 'file';
	$allow = array("pdf","doc","txt");
	if($_FILES[$file]['name']!="")
	{
	$filename = $_FILES[$file]['name'];
	$ext = end(explode(".", $filename));
	if($_FILES[$file]['error']<=0)
	{
		if(($_FILES[$file]['size']<2100000)&&(in_array($ext, $allow)))
		{
			if (file_exists("../events/pdf/".$sname.".txt"))
			{
				unlink("../events/pdf/".$sname.".txt");
				echo "<script>alert('Replacing existing details file');</script>";
			}else
			if (file_exists("../events/pdf/".$sname.".pdf"))
			{
				unlink("../events/pdf/".$sname.".pdf");
				echo "<script>alert('Replacing existing details file');</script>";
			}else
			if (file_exists("../events/pdf/".$sname.".doc"))
			{
				unlink("../events/pdf/".$sname.".doc");
				echo "<script>alert('Replacing existing details file');</script>";
			}
				if(move_uploaded_file($_FILES[$file]['tmp_name'],"../events/pdf/".$sname.".".$ext))
				{
					echo "<script> alert('File uploaded succesfully... You can now open the file for editing or compile it'); location.href='../societylogin.php';</script>";
					
				}
			
		}
		else
		{
		if($_FILES[$file]['size']>2100000)
		echo "<script> alert('Invalid File...!!! Size is large.'); location.href='../upload_cv.php';</script>";
		else
		if(!in_array($ext, $allow))
		echo "<script> alert('Invalid File...!!! Format not supported.'); location.href='../upload_cv.php';</script>";
		}
	}
}
else
{	
	$_SESSION['error']="Browse the file first";
	header("Location:../pdfupload.php");
}
	?>
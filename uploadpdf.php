<?php

require_once "config.php";
session_start();

$allowed_file_types = ['application/pdf'];
$allowed_size_mb = 100; 

if(isset($_POST['access_flag'])){
	$_SESSION['access_type'] = $_POST['access_type'];
	echo 'valid';
}


// validate upload error
switch($_FILES['file']['error']) {
	// no error
	case UPLOAD_ERR_OK:
		break;

	// no file
	case UPLOAD_ERR_NO_FILE:
		exit('Error : No file send as attachment');

	// php.ini file size exceeded 
	case UPLOAD_ERR_INI_SIZE:
		exit('Error : File size exceeded as set in php.ini');

	// other upload error
	default:
        exit('Error : File upload failed');
}

// validate file type from file data
$finfo = finfo_open();
$file_type = finfo_buffer($finfo, file_get_contents($_FILES['file']['tmp_name']), FILEINFO_MIME_TYPE);
if(!in_array($file_type, $allowed_file_types))
	exit('Error : Incorrect file type');

// validate file size
$file_size = $_FILES['file']['size'];
if($file_size > $allowed_size_mb*1024*1024)
	exit('Error : Exceeded size');

// safe unique name from file data
$file_unique_name = sha1_file($_FILES['file']['tmp_name']);
$file_extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
$file_name = $file_unique_name . '.' . $file_extension;

$destination = 'pdfupload/' . $file_name;

// save file to destination
if(move_uploaded_file($_FILES['file']['tmp_name'], $destination) === TRUE){
	
    $query = "INSERT INTO pdf_detail (pdf_name, pdf_location, access_type, upload_date, username) 
                     VALUES ('".$_FILES['file']['name']."', '$destination', '".$_SESSION['access_type']."', '".date("Y-m-d h:i:sa")."','".$_SESSION['username']."')";
    $results = mysqli_query($link, $query);
	//echo "this ". $results . " ok ";
	echo 'save';
}
else{
	echo 'unsave';
}

?>
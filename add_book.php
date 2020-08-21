<?php 
session_start();
include "db.php";
$im_name= $_FILES['image']['name'];
$pdf_name= $_FILES['file']['name'];

$im_tmp_name= $_FILES['image']['tmp_name'];
$pdf_tmp_name= $_FILES['file']['tmp_name'];

$submitbutton= $_POST['submit'];

$im_position= strpos($im_name, "."); 
$pdf_position= strpos($pdf_name, "."); 

$im_fileextension= substr($im_name, $im_position + 1);
$pdf_fileextension= substr($pdf_name, $pdf_position + 1);

$im_fileextension= strtolower($im_fileextension);
$pdf_fileextension= strtolower($pdf_fileextension);

$name= $_POST['name'];
$subject= $_POST['subject'];
$_SESSION["subject"]=$subject;
if (isset($name)) {

$path_im= 'Uploads/images/';
$path_pdf= 'Uploads/pdfs/';

if (!empty($im_name) && !empty($pdf_name)){
move_uploaded_file($im_tmp_name, $path_im.$im_name); 
move_uploaded_file($pdf_tmp_name, $path_pdf.$pdf_name); 
$insert="INSERT INTO books(subject,name,image,pdf) VALUES('$subject','$name','$im_name','$pdf_name')";
 if(mysqli_query($conn,$insert)){
 		header("Location:view_books.php");
 }else{
 	echo "error";
 }
}
}
?>

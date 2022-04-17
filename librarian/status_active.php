<?php 
include "../dbcon.php";
$id = base64_decode($_GET['id']);
 mysqli_query($con,"UPDATE `students` SET `status`='1' WHERE `id` ='$id' ");
	header('location:students.php');

	
 ?>
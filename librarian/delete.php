<?php
	include "../dbcon.php";

	$id = base64_decode($_GET['bookdelete']);

	$delete = mysqli_query($con,"DELETE FROM `books` WHERE `id`='$id'");

	if($delete){
		header('location:manage-book.php');
	}


?>
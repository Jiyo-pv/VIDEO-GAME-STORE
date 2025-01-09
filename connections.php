<?php
	$conn=mysqli_connect("localhost","root","","rad.io");
	if($conn->connect_error)
	{
		die($conn->connect_error);
	}
?>
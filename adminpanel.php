<?php
require 'connections.php';
$result=mysqli_fetch_array($conn->query("select * from admin"));

if($_POST['pass']!=$result[0])
{
	die("you dont have acces to admin panel");	
}
else 
{
	echo "<script>alert('hello admin');</script>";
}
?>
<html>
<head>
	<title>control panel</title>
</head>
<body>
	<iframe src="adminlinks.php" width="15%" height="100%"  style="border-style: none;" frameborder="0"></iframe>
<iframe style="border-style: none;" src="adminstore.php" name="f" width="84%" height="100%" frameborder="0"></iframe>	
</body>
<style type="text/css">
	body
	{	margin: 0;
		border: 0;
		padding: 0;
		background-color: #28282B;
		overflow: hidden;
	}
</style>
</html>
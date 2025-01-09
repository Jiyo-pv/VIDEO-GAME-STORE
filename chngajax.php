<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>

<style >
	div.chng{
		border: solid;
		

	}
	div.chng{
		animation-name: appear;
		animation-duration: 8s;
		animation-delay: 3s;
		opacity: 0;
		padding: 15px;
		animation-fill-mode: forwards;
		margin-left: 200px;
	}
	@keyframes appear
	{
		0%{
	opacity: 0;
}
50%{
	opacity: 1;
	}
	100%{
		opacity: 0;
	}
}
</style>
<body>

	
</body>
</html>
<?php
require 'connections.php';
echo "<div id='changelog' class='chng'>";
$s=$_GET['a'];
$p=$_GET['b'];
$result=$conn->query("select * from admin");
$row=mysqli_fetch_array($result);
if($row[2]!=$s)
{
	echo "wrong security code!";
}
else
{	$conn->query("update admin set password='$p'");
	echo "password changed";
}


?>
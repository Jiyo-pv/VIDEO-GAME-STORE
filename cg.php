<?php
session_start();
$i=$_SESSION['i'];
require('connections.php');
if(isset($_POST['submit']))
{	$p=$_POST['ps'];
	$pn=$_POST['psn'];
	$check=mysqli_fetch_array($conn->query("select pass from users where uid='$i'"));
	if($check[0]!=$p)

	{
		echo "<script>alert('your password is incorrect')</script>";
	}
	else
	{
		$conn->query("update users set pass='$pn' where uid='$i'");
		echo "<script>alert('password updated')</script>";

	}

}
echo "<div><h1>change password</h1>";
echo "<form action='cg.php' method='post'>enter current password:<input type='text' required name='ps' id='ps'>";

echo "<br>new password:<input type='text' required name='psn' id='psn'>";

echo "<br>repeat password:<input type='text' required name='psr' id='psr' onchange='check()'>";
echo "<br><input type='submit' name='submit' value='confirm'></form></div>";


?>
<!DOCTYPE html>
<html>
<head>
	<script>
function check() {
	
	a=document.getElementById('psn');
	b=document.getElementById('psr');
	if(a.value!=b.value) 
	{
		alert('passwords doesnt match');
	}
}
</script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style>
		body
		{	background-color: lavender;
			
		

		}
		div
		{	width: 400px;
			height: 200px;
			border: solid;
			margin-left: 30%;
			justify-content: center;
			align-content: center;
			text-align: center;
			background-color:	darkgreen;
			border-color: blue;
			color: ghostwhite;

		}
		input
		{
			margin-top: 2%;
		}
		input[type='submit']
		{
			background-color: darkblue;
			color: white;
			padding: 5px 5px;
			margin-bottom: 2%;
			
			margin-left: 60%;
		}
		
		input[type='submit']:hover
		{
			box-shadow: 2px 2px 15px blueviolet;
			animation-name: bordering;
			animation-duration: 1s;
			animation-iteration-count: infinite;

		}
		@keyframes bordering
		{
			0%
			{
				border-left-color: steelblue;
			}
			25%
			{
				border-top-color: steelblue;
			}
			50%
			{
				border-right-color: royalblue;
			}
			75%
			{
				border-bottom-color: white;
			}
			100%
			{
				border-bottom-color: steelblue;
			}

		}

	</style>
</head>
<body >

</body>
</html>

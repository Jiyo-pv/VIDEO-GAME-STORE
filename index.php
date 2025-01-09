<?php
session_start();
session_destroy();
session_start();
echo "<script>span=document.getElementById('error');</script>";
if(isset($_POST['dl']))
{	$i=$_POST['i'];
	require 'connections.php';
	$conn->multi_query("delete from cart where uid='$i';delete from library where uid='$i';delete from users where
		uid='$i'");
	echo "<script>alert('your account has been deleted permanently')</script>";
	

}
?>
<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
	<style type="text/css">
		body{   margin-top: 0%;
			background-image: url(loginbg1.png);
			background-size: cover;
			justify-content: center;
			align-content: center;
			text-align: center;
			font-size: 20px;
		}
		
		span.user
		{	margin-top: 4%;
			border: solid;
			background-color: green ;
			color: white;
			animation-name: fade;
			animation-duration: 6s;
			animation-fill-mode: forwards;
			padding: 4px;
		}
		span.password
		{	margin-top: 4%;
			padding: 4px;
			border: solid;
			background-color: red;
			color: white;
			animation-name: fade;
			animation-duration: 6s;
			animation-fill-mode: forwards;

		}

		a,a:visited{
			color: white;
		}
		@keyframes fade
		{
			0%
			{
				opacity: 1;
			}
			100%
			{
				opacity: 0;
			}
		}
		.admin
		{
			background-image: url('admin.gif');
			background-size: cover;
			border-radius: 90%;
			width: 70px;
			height: 70px;
			margin-top: 0%;
			margin-left: 80%;
			position:  relative;
		}
		.box
		{	color: white;
			background-color: transparent;
			border-top: solid;
			border-bottom: solid;
			border-color: white;

			width: 500px;height: 484px;
			justify-content: flex-start;
			align-content: flex-start;
			position: relative;
			left: 50%;
			animation-name: open;
			animation-duration: 2s;
			overflow: hidden;
			border-width: 5px;
			font-family: cursive;
			border-radius: 20px;
			transition: 1s ease;
			animation-timing-function: ease;


		}

		
		input[type="text"]
		{
			border:2;
			margin-top: 2%;
			outline-color: blueviolet;
			height: 60px;


		}
		input[type="password"]
		{
			border:2;
			margin-top: 2%;
			outline-color: blueviolet;
			height: 60px;
			

		}
		
		input[type="submit"]
		{
			background-color: blue;
			color:white;
			border-radius: 15px;
			padding: 8px 20px;
			transition: all 0.3s ease;
			margin-top: 0%;

		}
		input[type="submit"]:hover
		{
			transform: scale(1.2);
		}
		h1
		{	
			color: darkred;
		}
		
		
	.title-lg
	{
				width: 300px;
				height: 100px;
				
			mix-blend-mode: luminosity;
	
		margin-left: 3%;
	}


	button
	{		margin-left: 85%;
				color: wheat;
		background-color: cadetblue;
		font-family: cursive;


	}
	button:hover
	{
		box-shadow: 0px 0px 10px aliceblue;
	}
	.logo
	{	left: 38%;
		background-image: url('logo1.png');
		width: 130px;
		height: 160px;
		border-radius: 90%;
		
		border: none;
		background-size: cover;
		transition: 2s;
		position: relative;


	}	
	@keyframes turning
	{	0%
		{
			background-image: url('logo1.png');
			

		}
		50%
		{
			background-image: url('logo.png');
			transform: rotate(15deg);



		}
		85%
		{	transform: rotate(-15deg);
			background-image: url('logo.png');
		}
		100%
		{
			transform: rotate(0deg);

		}

	}
	.logo:hover
	{			animation-name: turning;
		animation-duration: 4s;
		animation-timing-function: ease-out;
		animation-delay: 1s;

		background-image: url('logo.png');
	}
	.wrapper
	{
		display: grid;
		grid-template-columns: repeat(2, 1fr);

	}
	</style>
	
</head>
<body  onload="s()">
	
	<div class="wrapper">
	<div class="box">
		<div class="logo"></div>
	<form method="POST" action="index.php">
		<img src="t1.png" class="title-lg"><br>
		<label for="un">username:</label>
		<input type="text"  name="un" style="height: 20px;" required><br>
		
		<label for="pw">password:</label>
		<input type="password"  name="pw" style="height: 20px" required>
		</h2><br>
		<?php
		if(isset($_POST['submit']))
{
	require 'connections.php';
	
$u=$_POST['un'];
$p=md5($_POST['pw']);
$result=$conn->query("select uid,user,pass,ram,cpu,hdd from users where user='$u'");
if(mysqli_num_rows($result)==0)
{
	echo "<span class='user'>unknown username</span>";
	goto skip;
}
$row=mysqli_fetch_array($result);
if($row[2]!=$p)
{
	echo "<span class='password'>wrong password</span>";
	
}
else
{
$_SESSION['u']=$u;
$_SESSION['i']=$row[0];
$_SESSION['ram']=$row[3];
$_SESSION['cpu']=$row[4];
$_SESSION['hdd']=$row[5];

header("location:home.php");
}}
skip:
?><br>
		<input type="submit" value="LOGIN" name="submit"><br>	
		are you new here?
		<a href="registration.php">signup</a><br>
	</form>
</div>
<form action="adminpass.html"><input type="submit" title="ADMIN CONTROLS" class="admin" value=" "></form>
</div></body>
</html>
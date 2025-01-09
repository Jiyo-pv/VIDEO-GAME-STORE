<?php
		require("connections.php");
		if(isset($_POST['submit']))
		{	$e=1;
			$u=$_POST['un'];
			$p=md5($_POST['pw']);
			$e=$_POST['em'];
			$result=$conn->query("select * from users");
			while($row=mysqli_fetch_array($result))
			{
				if($u==$row[1])
				{
					echo "<script>alert('username already exists')</script>";
					$e=0;
				}
			}
			if($e){
			$conn->query("insert into users(user,pass,email,doj) values('$u','$p','$e',curdate())");
			echo "<script>alert('sign up successfull')</script>";
			}
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
			background-image: url('regz.gif');
			background-size: 100%;
			justify-content: center;
			align-content: center;
			text-align: flex-start;
			font-size: 20px;
		}
		div
		{	color: white;
			background-color: transparent;
			width: 450px;height: 430px;
			
			position: absolute;		
			padding-left: 150px;
			top:15%;
			text-shadow: 0px 0px 10px blue;
			left: 25%;
			border-radius: 10px;
			animation-name: open;
			animation-duration: 2s;
			border-bottom: solid;
			border-top: solid;
			border-color: white;
			animation-fill-mode: forwards;
			border-width: 5px;
			font-family: monospace;
			font-weight: bold;
			overflow: hidden;
		}
		@keyframes open
		{
			from{
				height: 0px;
				display: block;


			}
			to{
				display: block;

			}
		}
		input[type="text"]
		{
			border:2;
			margin-top: 2%;
			outline-color: blueviolet;


		}
		input[type="password"]
		{
			border:2;
			margin-top: 2%;
			outline-color: blueviolet;


		}
		
		input[type="submit"]
		{
			background-color: blue;
			color:white;
			border-radius: 70px;
			padding: 8px 20px;
			transition: all 0.3s ease;
			margin-top: 4%;
			margin-left: 30%;

		}
		input[type="submit"]:hover
		{
			transform: scale(1.2);
		}
		h1
		{
			color: white;
			font-family: sans-serif;
			font-weight: bold;


		}
		
		
		
	button
	{		margin-left: 85%;
				color: wheat;
		background-color: cadetblue;
		font-family: cursive;

	}
	</style>
	<script type="text/javascript">
		
		
		function check()
		{	a=document.getElementById('pw');
		b=document.getElementById('pw1');
		
			if(a.value!=b.value)
			{
				alert('passwords dont match');
			}
		};
		function show() {
			var x = document.getElementById("pw");
			y=document.getElementById('pw1');

  if (x.type === "password") {
    x.type = "text";y.type = "text";
  } else {
    x.type = "password"; y.type = "password";
  }
		}
	</script>
</head>
<body >

	<div >
	<form method="POST" action="registration.php"><h2>
		<h1><u>SIGN-UP</u></h1>
		<h2></h2>
		<label for="un">enter username:</label>
		<input type="text" id="un" name="un" style="height: 20px;" required><br>
		<label for="un">enter email:</label>
		<input type="email" name="em" style="height: 20px;" required><br>
		
		<label for="pw">password:</label>	
		<input type="password" id="pw" name="pw" style="height: 20px" required>
		<br><label><input type="checkbox" onclick="show()" style="width:30px;height: 20px;margin-top: 1%;">show pasword</label>

		<label for="pw1"><br>repeat password:</label>
		<input type="password" id="pw1" name="pw1" style="height: 20px" required  onchange="check()">
		</h2><br>
		<input type="submit" value="SIGN-UP" name="submit"><br></form>
		<form action="index.php"><input type="submit" value="LOGIN" name="submit"><br></form>
	
	
</div>
</body>
</html>
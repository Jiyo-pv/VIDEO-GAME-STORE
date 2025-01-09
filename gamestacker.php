<?php 
require 'connections.php';
if(isset($_POST['sub']))
{	
	$g=$_POST['game'];
	$filename=$_FILES['icon']['name'];
	$tmpname=$_FILES['icon']['tmp_name'];
	$folder="images/".$filename;
	move_uploaded_file($tmpname,$folder);

	$vid=$_FILES['video']['name'];
	$tmpvid=$_FILES['video']['tmp_name'];
	$vidfolder="videos/".$vid;
    move_uploaded_file($tmpvid,$vidfolder);

	$price=$_POST['price'];
	$ram=$_POST['ram'];
	$cpu=$_POST['cpu'];
	$hdd=$_POST['hdd'];
	$pub=$_POST['pub'];
	$des=$_POST['des'];
	$sql="insert into store(game,price,icon,ram,cpu,hdd,publisher,video,description) values('$g','$price','$filename','$ram','$cpu','$hdd','$pub','$vid','$des')";

	if($conn->query($sql)!=true)
	{
		echo "<script>alert('couldnt upload the game');</script>";
	}
	else
	{
		echo "<script> alert(' $g  added to the store');</script>";
	};
	$result=mysqli_fetch_array($conn->query("select gid from store where game='$g'"));
	$ide=$result[0];
	if(isset($_POST['rc']))
	{
		$rc=1;
	}
	else
	{
		$rc=0;
	}
	if(isset($_POST['sh']))
	{
		$sh=1;
	}
	else
	{
		$sh=0;
	}if(isset($_POST['ac']))
	{
		$ac=1;
	}
	else
	{
		$ac=0;
	}
	if(isset($_POST['op']))
	{
		$op=1;
	}
	else
	{
		$op=0;
	}
	if(isset($_POST['ad']))
	{
		$ad=1;
	}
	else
	{
		$ad=0;
	}
	if(isset($_POST['fp']))
	{
		$fp=1;
	}
	else
	{
		$fp=0;
	}
	if(isset($_POST['tp']))
	{
		$tp=1;
	}
	else
	{
		$tp=0;
	}	
	$conn->query("insert into genre values('$ide','$rc','$sh','$ac','$op','$ad','$fp','$tp')");

}
?>
<html>
<head>
	<style type="text/css">
		
		body
		{	color: papayawhip;
			background-image: url('bg.gif');
			justify-content: center;
			align-content: center;
			font-family: cursive;
			background-size: cover;



		}
		div
		{	margin-left: 20%;
			background-color: darkslategrey;
			border: solid;
			border-color: goldenrod;
			width: 500px;
			height: 650px;
			justify-content: center;
			text-align: center;
		}
		input[type='submit']
		{	color: darkred;
			background-color: springgreen;
			padding: 8px 18px;
		}
		input[type='submit']:hover
		{
			box-shadow: 0px 0px 10px wheat;
		}
		input
		{
			margin-top: 3%;
		}
		u
		{
			color: indianred;
		}

	</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body><div>

	<u><h1>ADD GAME TO STORE</h1></u>
<form  method="POST" action="gamestacker.php" enctype= "multipart/form-data">
	<label>enter game name:
	<input type="text" name="game"  autocomplete="on"   ></label>
	<br><label>add game icon
	<input type="file" accept="image/*" name="icon"   autocomplete="on"></label>
	<br><label>add game video
	<input type="file" accept="video/*" name="video"   autocomplete="on"></label>
	<label>
		<br>enter game description:<br>
		<textarea name="des" rows="8" cols="40"  >	</textarea>
	</label>
	<br>genre:
	<input type="checkbox" name="rc" checked>racing
	<input type="checkbox" name="sh" checked>shooter
	<input type="checkbox" name="ac" checked>action
	<input type="checkbox" name="op" checked>open world
	<input type="checkbox" name="ad" checked>adventure
	<br>
	<input type="checkbox" name="fp" checked>fpp
	<input type="checkbox" name="tp" checked>tpp
	<br><label>publisher:<input type="text" name="pub"    autocomplete="on"><br></label>
	<label>RAM:
	<select name="ram">
		<option value="2">
			2 GB
		</option>
		<option value="4">
			4 GB
		</option>
		<option value="8" selected>
			8 GB
		</option>
		<option value="16" >
			16 GB
		</option>
	</select></label><br>
	<label>

	CPU:
	<select name="cpu">
		<option value="3">
			i3/ryzen 3
		</option>
		<option value="5" selected>
			i5/ryzen 5
		</option>
	</select></label><br>
	<label>hdd:
	<input type="number" name="hdd" ></label><br>
	<label>price:
	<input type="text" name="price"  autocomplete="on"></label>

	<br><input type="submit" name="sub" value='ADD'>
</form></div>
</body>
</html>
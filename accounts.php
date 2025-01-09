<?php
require('connections.php');
session_start();
$u=$_SESSION['u'];

$i=$_SESSION['i'];
if(isset($_POST['device']))
{
	$ram=$_POST['ram'];
	$cpu=$_POST['cpu'];
	$hdd=$_POST['hdd'];
	$_SESSION['ram']=$ram;
	$_SESSION['cpu']=$cpu;
	$_SESSION['hdd']=$hdd;
	if($conn->query("update users set ram='$ram',cpu='$cpu',hdd='$hdd' where uid='$i'"))
	{
		echo "<span>your device specifications updated</span>";
	}
}
echo "<h1><u>ACCOUNT DETAILS</U></h1>";
echo  "<table border=5><tr><th colspan=2>user details</tr>";
echo "<tr><td>username:</td><td>$u</td></tr>";
$row=mysqli_fetch_array($conn->query("select * from users where uid='$i'"));
echo "<tr><td>password:</td><td><input id ='p' style='padding: 3px;height:40px;width:40px;font-size:25px;width :200px'type='password' value=$row[2] readonly id='p'>";
echo "<button id='b' onclick='show()' >show</button></td></tr>";
echo "<tr><td>email:</td><td>$row[3]</td></tr>";
echo "<tr><td>signed up on:</td><td>$row[4]</td></tr></table>";
echo "<a href='transactions.php'><h3>view transaction history</h3></a>";
echo "<div class='wrapper'>";
echo  "<form action='cg.php'><button class='cg' type='submit'>change password</button></form><form action='dl.php'><button type='submit' class='dl'>delete account</button></form></div>";
echo "<details style='cursor:pointer'><summary>your device</summary>
<fieldset><form method='post' action='accounts.php'>RAM:
<input type='number' name='ram' required><br>
HDD:<input type='number' name='hdd' required>
<br>CPU:<select name='cpu'>
<option value='3'>ryzen 3/i3</option>
<option value='5'>ryzen 5/i5</option>
</select><br>
<input type='submit' class='save' name='device' value='save' style='background-color:blue;color:white'>
</form></fieldset>
</details>";
?>
<script type="text/javascript">
	function show(){
	a=document.getElementById('p');
	b=document.getElementById('b');
	if(a.type=='password')
	{
		a.type='text';
		b.innerHTML='hide';
	}
	else
	{
		a.type='password';
		b.innerHTML='show';
	}
	}
</script>
<style>
	.save{
	margin-top: 3%;
	}
	.save:hover
	{
		box-shadow: 0px 0px 10px;

	}
	fieldset
	{
		width: 40%;
		background-color: grey;
		color: black;
		font-family: monospace;
		font-size: 20px;
	}
	.cg
	{	color: white;
		background-color: seagreen;
		width: 100px;
		margin-top: 13%;
		margin-right: 15%;
	}
	.dl{width: 100px;
		color: white;
		background-color: red;
	
		margin-top: 12%;
	}
	button:hover
	{
		box-shadow: 0px 0px 10px honeydew;
	}
	span
	{
		background-color: lightgreen;
		opacity: 0;
		color: blue;
		position: absolute;
		animation-name: appear;
		animation-duration: 8s;

	}
	@keyframes appear
	{
		from{
			opacity: 1;
		}
		to
		{
			opacity: 0;
		}
	}
	h1
	{	font-family: cursive;
		color: white;
	
	}
	a:visited
	{
		color: whitesmoke;
	}
	a{
		color: floralwhite;
	}
	@keyframes slideleft
	{
		0%
		{	
			margin-left: 50%;
		}
		100%
		{	
			margin-left: 0%;
		}
	}
	body

	{
		background-image: url('acwall.gif');
		background-size: cover;
		color: white;
	}
	button
	{	text-align: flex-start;
		height: 40px;
		width: 40px;

	}
	table
	{
		font-size: 20px;
		animation-name: slideup;
		animation-duration: 2s;
		color: ghostwhite;
		
	}
	@keyframes slideup
	{
		0%
		{
			margin-top: 60%;
		}
		100%
		{
			margin-top: 0%;
		}
	}
	td{
		animation-name: loadin;
		animation-duration: 4s;
	}

	@keyframes loadin{
		0%{
			opacity: 0;
		}
		100%{
			opacity: 1;
		}
	}
	.wrapper
	{		margin-top: 3%;
		display: grid;
		grid-template-columns: repeat(6, 1fr);
	}
</style>
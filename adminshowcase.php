<?php
require("connections.php");
if(isset($_POST['sub']))
{
	$id=$_POST['gid'];
	$game=$_POST['game'];
	$icon=$_POST['icon'];
	$price=$_POST['price'];
	$ram=$_POST['ram'];
	$cpu=$_POST['cpu'];
	$hdd=$_POST['hdd'];
	$pub=$_POST['publisher'];
	$video=$_POST['video'];
	$desc=$_POST['des'];
	$id=$_POST['gid'];
	echo "<form action='adminstore.php'><input type='submit' value='back' class='back'></form><h1>$game</h1>";
	echo "<video height='320' width='700' controls autoplay> <source src='videos/$video'></video><br><h3>$desc</h3>";
	echo "<h3><u><b>system requirements</u></b>";
	echo "<li>hdd:$hdd";
	echo "<li>ram:$ram";
	echo "<li>cpu:$cpu";
	echo "<br></h3><h1>price:₹$price</h1>";
}
?>
<style>
input[type='submit'].back{
	border: none;
	outline:none;
	color: white;
	font-size: 33;
	background-color: blue;
	border-radius: 30px;
	padding: 15px 15px;
}
.back:hover
{
	box-shadow: 0px 0px 10px blue;
}
body
{	
	background-color: lightsteelblue;

}
h1
{
	color: darkgreen;
}

</style>
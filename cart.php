<?php
session_start();
$i=$_SESSION['i'];

require('connections.php');
if(isset($_POST['clear'])){
	$conn->query("delete from cart where uid='$i'");	
}
if(isset($_POST['rm']))
{
	$rm=$_POST['i'];
	$conn->query("delete from cart where gid='$rm' and uid='$i'");
}
echo "<h1><u>CART</u></h1>";
$result=$conn->query("select gid,game,icon,price from cart where uid='$i'");
$total=0;
$count=0;
echo "<div class='wrapper'><table border='2'><tr><th>Sl.no</th><th>icon</th><th>product</th><th>price</th>";
if(mysqli_num_rows($result)===0)
{
	echo "<tr><td colspan='4'>cart is empty</td></tr>";
}
else {	echo "<td><form method='post' action='cart.php'><button type='submit' name='clear' class='clear' >clear</button></form></tr>";
	while($row=mysqli_fetch_array($result))
	{			$count++;

		echo "<tr><td>$count</td><td><img width='70px' height='80px' src='images/$row[2]'></td><td>$row[1]</td><td>₹$row[3]</td>";
		echo "<td><form method='post' action='cart.php'>";
		echo "<input type='hidden' value='$row[0]' name='i'>";
		echo "<button type='submit' name='rm' class='remove'>remove</button></form></td>";
		$total+=$row[3];
	}
	
		echo "</table><div><h1>total:₹$total<br><form method='post' action='checkout.php'>";
		echo  "<input type='hidden' value='$total' name='tot'>";
		echo  "<input type='hidden' value='$count' name='cn'>";

		echo  "<input type='submit' value='checkout' name='con'></form></div></div>";

	}


?>
<html>
<head>

	<style>
		
		body
		{	
			
			font-family: cursive;
			background-color: white;
			
			
		}
		th
		{
			background-color: darkblue;
			color:floralwhite;
		}
		td 
		{	padding: 15px 15px;
			text-align: center;
			background-color: whitesmoke;
			color: black;

		}
		table
		{	
			width: 200px;

		}
		input[type='submit']
{
	background-color: blue;
	color: white;
	font-family: cursive;
	font-size: 30;
	padding: 8px 50px;
	
}
.clear
{
	background-color: blue;
	color: white;
	padding: 5px;

}
.clear:hover{
	box-shadow: 0px 0px 10px blue;
}
.remove
{
	background-color: red;
	color: white;

}
.remove:hover
{	

	box-shadow: 0px 0px 10px blue;
	color: white;
	background-color: blue;
	transition: 2s;
	height: 30px;
}
.wrapper
{
	display: grid;
	grid-template-columns: repeat(2, 1fr);
}
input[type='submit']:hover
{
	box-shadow: 0px 0px 15px dimgrey;
}
	</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

</body>
</html>
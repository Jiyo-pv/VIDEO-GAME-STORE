<?php
require('connections.php');
$i=$_POST['i'];
$u=$_POST['u'];
$p=$_POST['p'];
$e=$_POST['e'];
$d=$_POST['d'];
$date=date("d/m/Y",strtotime($d));
echo "<h1><u>user details</u></h1>";
echo "<h2>user id:$i";
echo "<br>username:$u";
echo "<br>email:$e";
echo "<br>joined on :$date</h2>";
echo "<h1><br><u>games in library</u></h1><h2>";
$result=$conn->query("select * from library where uid='$i'");
echo "<table border ><tr><th>game</th><th>price</th><th>purchased on</th></tr>";
$profit=0;
while($row=mysqli_fetch_array($result))
{	echo "<tr><td>";
	echo "$row[2]<br></td><td>";
	echo "₹$row[4]<br></td><td>";
	$profit+=$row[4];
	echo "$row[5]<br></tr>";
}
if(mysqli_num_rows($result)==0)
{
	echo "<tr><td>0 games in library</tr>";
}
else
{
	echo "<b>total transactions:₹$profit</b>";
}
?>
<style>
	body{
		color: white;
		font-family: monospace;
		font-size: 15;
	}
	th{	font-size: 30;
		font-family: sans-serif;
	}
	td{
		font-family: monospace;
		font-size: 30;
	}
	table{
		padding: 5px;
	}
</style>


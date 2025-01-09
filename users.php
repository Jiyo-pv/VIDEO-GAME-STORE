<?php
require('connections.php');
echo "<h1><u>users</u></h1><form action='refund.php'><button type='submit' style='margin-bottom:3px'>pending refunds</button></form>";
$result=$conn->query("select * from users");
echo "<table border cellpadding=5px><tr><th>user name </th><th>uid</th><th>joined on</th><th></th></tr>";
while($row=mysqli_fetch_array($result))
{	echo "<tr>
		<td>$row[1]</td><td>$row[0]</td><td>$row[4]</td>
		<td>";
	echo "<form method='post' action='userdetails.php'>";
	echo "<input type='hidden' value='$row[0]' name='i'>";
	echo "<input type='hidden' value='$row[1]' name='u'>";
	echo "<input type='hidden' value='$row[2]' name='p'>";
	echo "<input type='hidden' value='$row[3]' name='e'>";
	echo "<input type='hidden' value='$row[4]' name='d'>";
	echo "<button type='submit'name='sb'>view more</button></form>";
	echo "</td></tr>";
}
?>
<style>

	h1
	{
		color: whitesmoke;
		font-family: monospace;

		font-weight: bold;
		font-style: italic;
	}
	tr{
		color: white;
		border: solid;
	}
	table
	{
		border: solid;
		border-color: white;
	}
	body

	{	color: white;
		background-color: royalblue;
		background-image: url('ug.gif');
		background-size: cover;
		overflow-x: hidden;
	}
	button:hover
	{
		box-shadow: 0px 0px 8px white;
	}
button
{	margin
	font-family: cursive;
	font-size: 15px;
	padding: 8px 25px;
	background-color: darkblue;
	color:wheat;
}
</style>
<?php
require 'connections.php';
$no_of_games=mysqli_fetch_array($conn->query("select count(*) from store"));
$no_of_users=mysqli_fetch_array($conn->query("select count(*) from users"));
$totalsale=mysqli_fetch_array($conn->query("select sum(price) from library"));
$h=mysqli_fetch_array($conn->query("select * from viewsell"));
echo "<h1>no of games in store:$no_of_games[0]<br><br>no of users:$no_of_users[0]<br><br>total sales:₹$totalsale[0]<br>";
echo "<u>user-wise sales report</u>";
echo "	<table  border><tr><th>user</th><th>total transactions</th></tr>";
$transreport=$conn->query("select user,sum(price) from library,users where users.uid=library.uid group by library.uid order by sum(price)
	desc");
$flag=0;
while($usertrans=mysqli_fetch_array($transreport))
{
	echo "<tr><td>$usertrans[0]</td><td>₹$usertrans[1]";
	if($flag==0)
	{
		echo "  <h5>(highest transaction)</h5>";
		$flag=1;
	}
	echo "</td></tr>";

}
echo "</table>";


echo "<u>highest selling title:</u><br><details><summary><img src='images/$h[2]'></summary>$h[1]<br> active players:$h[0]</details>";
echo "<br><details style='margin-left:0px'><summary>show genre-wise statistics</summary>";
require 'genrestat.php';
echo "</details>";
?>
<style type="text/css">
	body{
		color: white;
		
	}
	h1{
		font-family: monospace;
	}
	img{
		border: solid;
		width: 150px;
		height: 200px;

	}
	div{
		background-color: transparent;
	}
	h5
	{
		color: greenyellow;
		font-weight: 32;
	}
	details
	{
				margin-left: 30%;
	}
	table
	{
		padding: 5px;
	}
	td{
		padding: 5px;
	}
</style>
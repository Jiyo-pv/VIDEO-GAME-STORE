<?php
session_start();
require('connections.php');
$i=$_SESSION['i'];
if(isset($_POST['refund']))
{	$gdi=$_POST['gi'];
	$ga=$_POST['g'];
	$conn->query("update library set refund=1 where uid='$i' and gid='$gdi'");
	echo "<script>alert('refund request for $ga was sent')</script>"; 

}
echo "<h1><u>your transactions</u></h1>";
$result=$conn->query("select uid,gid,game,icon,price,DATE(date),refund from library where uid='$i' order by date desc");
if(mysqli_num_rows($result)>0)
{
	echo "<table border=2><tr><th>product</th><th>price</th><th>purchase date</th><th>refundability</th></tr>";
	while($row=mysqli_fetch_array($result))
	{	$on=$row[5];
		$df=mysqli_fetch_array($conn->query("select datediff(curdate(),'$on')"));
		
		echo "<tr><td>$row[2]</td><td>$row[4]</td><td>$on</td>";
		echo "<td>";
		if($row[6]==1){
			echo "refund requested</td></tr>";
		}
		else if($df[0]<5 )
		{
			echo "<form method='post' action='transactions.php'>";
			echo "<input type='hidden' value='$row[1]' name='gi'>";
			echo "<input type='hidden' value='$row[2]' name='g'>";
			echo "<input type='submit' value='refund' name='refund'></form></td></tr>";
		}else
		{
			echo "cant refund<b title='you can refund only if the game was bought within 5 days'> (?)</b></td></tr>";

		}



	}
	echo "</table>";

}
else
{
	echo '<h2>you have not purchased any games</h2>';
		echo '<script>document.body.style.backgroundImage="url(emptylib.gif)";document.body.style.backgroundSize="contain";document.body.style.backgroundColor="white";</script>';
	
}
?>
<style type="text/css">
	body
	{	padding-left: 50px;
		background-color: #28282B;
		background-repeat: no-repeat;
		color: white;
	}
	
	
	td
	{
		color: white;
		animation-name: show;
		animation-duration: 4s;


	}
	@keyframes show
	{
		0%
		{
			opacity: 0;
		}
		100%
		{
			opacity: 1;
		}

	}
	input[type='submit']
	{
		background-color: limegreen;
		color: white;
		padding: 3px;
		animation-name: shows;
		animation-duration: 1s;
		border-radius: 10%;
	}
	@keyframes shows
	{

		0%
		{
			opacity: 0;	
		}
		75%

		{
			opacity: 0.5;
			width: 30px;
			transform: rotate(90deg);
		}
		100%
		{	opacity: 1;
			transform: rotate(0deg);
		}


	}
	input[type='submit']:hover
	{
		box-shadow: 0px 3px 10px skyblue;
	}
</style>
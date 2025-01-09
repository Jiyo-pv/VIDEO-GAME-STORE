<?php
session_start();
$i=$_SESSION['i'];
$failed=0;
require("connections.php");

if(isset($_POST['con']))

{	
	$g=$_POST['gm'];
	$ide=$_POST['id'];
	$pr=$_POST['prce'];
	$pic=$_POST['ic'];
	$result=$conn->query("select gid from library where uid='$i'");
	while($row=mysqli_fetch_array($result))
	{
		if($row[0]==$ide)
		{
			$failed=1;

			goto cancel;
		}
	}
	$conn->query("delete from cart where gid='$ide' and uid='$i'");
	if($conn->query("insert into library(uid,gid,game,icon,price) values('$i','$ide','$g','$pic','$pr')"))
	{	
		echo "<h3>$g added to library</h3><script>";
		echo 'document.body.style.backgroundImage="url(paid.gif)";document.body.style.backgroundSize="contain"</script>';

		goto cancel;
	}
	else
	{
		echo "<h3>something went wrong.try again</h3>";
		goto cancel;

	}
}
$game=$_POST['game'];
$price=$_POST['price'];
$icon=$_POST['icon'];
$id=$_POST['gid'];
echo "<h2><U>confirm your order</u><h2><br><h1>$game <br> <img width=180px height=180px src='images/$icon'> <br> ₹$price</h1><br>";
echo "<div class='payments'>
		<u><h3>verify payment</h3></u>
		  <div id='upi-id'>
        <label for='upi_id'>UPI ID:</label>
        <input type='text' id='upi_id' name='upi_id' placeholder='example@bank' pattern='[a-zA-Z0-9.\-_]{2,256}@[a-zA-Z]{2,64}'>
        	<button onclick='check()' type='submit' style='background-Color:green;color:white' id='vr'>verify</button>
    </div>

		</div><div></div>";
echo "<form method='post' action='buy.php'>";
echo "<input type='hidden' value='$price' name='prce'>";

echo "<input type='hidden' value='$game' name='gm'>";
echo "<input type='hidden' value='$id' name='id'>";
echo "<input type='hidden' value='$icon' name='ic'>";
echo "<input type='submit' class='confirm' name='con' value='confirm' id='cn' disabled></form>";
cancel:
if($failed==1)
{
	echo '<h2>already in library</h2><script>document.body.style.backgroundImage="url(failed.gif)";document.body.style.backgroundSize="100% 100%"</script>';

}
echo "<form action='store.php'>";
echo "<input type='submit' value='BACK'></form>";
?>
<script type="text/javascript">
	function check() {
		a=document.getElementById('upi_id').value;
		if(a==""||a==null)
		{
			alert('please provide upi id');
		
		}
		else
		{
			document.getElementById('vr').innerHTML="verified";
		document.getElementById('vr').disabled=true;
		document.getElementById('cn').classList.remove("confirm");
		document.getElementById('cn').disabled=false;
		
		}
		// body...
	}
</script>
<style type="text/css">
	h1,h2
	{	
		font-family: sans-serif;
		color: black;
	}
	input[type='submit'].confirm{
		background-color: darkred;
		color: white;
	}
	input[type='submit']
	{
		background-color: blue;
		color: white;
		font-family: monospace;
		font-size: 30;
		padding: 8px 100px;
		
	}
	input[type='submit']:hover
	{
		box-shadow: 3px 3px 5px dimgrey;
	}
	.payments
	{
		width: 400;
		height: 100;
		background-color: white;
	}
	body
	{
		background-image: url('buy0.gif');
		display: grid;
		grid-template-columns: repeat(2, 1fr);
		background-size: 100%;
		background-repeat: no-repeat;
		background-color: white;
	}
	div{
		padding: 5px;
	}
</style>
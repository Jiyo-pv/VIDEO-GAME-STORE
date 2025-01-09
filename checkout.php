<?php
session_start();
$i=$_SESSION['i'];
$paid=0;
require 'connections.php';
if(isset($_POST['go']))
{	$c=$_POST['c'];
	$result=$conn->query("select gid,game,icon,price from cart where uid='$i'");
	while($row=mysqli_fetch_array($result))
	{
		$conn->query("insert into library(uid,gid,game,icon,price) values('$i','$row[0]','$row[1]','$row[2]','$row[3]')");
	}
	$conn->query("delete  from cart");	
	{	$paid=1;
		goto cancel;
	}
	
}

$c=$_POST['cn'];
$t=$_POST['tot'];
echo "<h2><U>confirm your order</u><h2><br><h1>$c items  for ₹$t</h1>";
echo "<div class='payments'>
		<u><h3>verify payment</h3></u>
		  <div id='upi-id'>
        <label for='upi_id'>UPI ID:</label>
        <input type='text' id='upi_id' name='upi_id' placeholder='example@bank' pattern='[a-zA-Z0-9.\-_]{2,256}@[a-zA-Z]{2,64}'>
        	<button onclick='check()' type='submit' style='background-Color:green;color:white' id='vr'>verify</button>
    </div>

		</div><div></div>";

echo "<form method='post' action='checkout.php'>";
echo  "<input type='hidden' value='$c' name='c'>";

echo "<input type='submit' name='go' class='confirm' value='confirm' id='cn' disabled></form>";





cancel:
if($paid){
echo "<h2>$c items added to library</h2><script>";
		echo 'document.body.style.backgroundImage="url(paid.gif)";document.body.style.backgroundSize="contain"</script>';
}
echo "<form action='store.php'>";
echo "<input type='submit' value='GO BACK'></form>";
?>
<style type="text/css">
	body
	{
		background-image: url('buy2.gif');
		background-repeat: no-repeat;
		background-size: 100% 100%;
		background-color: white;
	}
	h1,h2
	{	font-family: cursive;
		color: blueviolet;
	}
	input[type='submit']
	{
		background-color: lightgreen;
		color: darkred;
		font-family: cursive;
		font-size: 30;
		padding: 8px 100px;
		
	}
	input[type='submit'].confirm{
		background-color: darkred;
		color: white;
	}
	div{
		margin: 5px;
	}
	input[type='submit'].confirm{
		background-color: darkred;
		color: white;
	}
	input[type='submit']:hover
	{
		box-shadow: 3px 3px 5px dimgrey;
	}
</style>
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

		document.getElementById('cn').disabled=false;
		document.getElementById('cn').classList.remove("confirm");
		
			}
		// body...
	}
</script>

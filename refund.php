<style>
	*{
		color: white;
		padding: 5px;
		font-family: monospace;
	}
	input
	{
		color: white;
		font-family: monospace;
		background-color: green;
	}
	input:hover{
		box-shadow: 0px 0px 10px firebrick;
	}
</style>
<?php
require 'connections.php';
if(isset($_POST['subuser'])){
	$u=$_POST['u'];
	$g=$_POST['g'];
	if($conn->query("delete from library where uid='$u' and gid='$g'"))
	{
		echo "<script>alert('refund successfull')</script>"; 
	}
}
echo "<h1><u>pending refunds</u></h1>";

$result=$conn->query('select * from library where refund=1');
if(mysqli_num_rows($result)==0)
{
	echo "no pending refunds";

}
else
{ echo "<table border><tr><th>message</th><th>action</th></tr>";	
while($row=mysqli_fetch_array($result))
{	$name=mysqli_fetch_array($conn->query("select user from users where uid='$row[0]'"));
	echo "<tr><td ><b title='uid:$row[0]'>$name[0] </b>requested refund of ₹$row[4] on $row[2]</td>";
	echo "<td><form method='post' >
		<input type='hidden' value='$row[0]' name='u'>
		<input type='hidden' value='$row[1]' name='g'>
		<input type='submit' value='confirm refund' name='subuser'></form></td></tr>";
}
}
<?php
session_start();
$u=$_SESSION['i'];
require 'connections.php';
$data=file_get_contents("php://input");
$cartinput=json_decode($data,true);
$gid=$cartinput["x"];
// $gid=$_REQUEST['a'];
$result=$conn->query("select game,icon,price from store where gid='$gid'");
$row=mysqli_fetch_array($result);

$conn->query("insert into cart(uid,gid,game,icon,price) values('$u','$gid','$row[0]','$row[1]','$row[2]')");
$count=mysqli_fetch_array($conn->query("select count(*) from cart where uid='$u'"));
echo $count[0];
?>

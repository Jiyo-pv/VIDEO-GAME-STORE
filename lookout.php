
<?php
session_start();
$u=$_SESSION['u'];
$i=$_SESSION['i'];
require("connections.php");	
if(isset($_POST['acart']))
{	$id=$_POST['gid'];
	$game=$_POST['game'];
	$icon=$_POST['icon'];
	$price=$_POST['price'];
	$result=$conn->query("select * from cart where uid='$i' and gid='$id'");
	if(mysqli_num_rows($result))
	{
			echo '<script>alert("already in the cart")</script>';
			goto hello;
	}
	
	$result=$conn->query('select uid,gid from library');
	while($row=mysqli_fetch_array($result))
	{
		if($row[0]==$i && $row[1]==$id)
		{
			echo '<script>alert("already in your library")</script>';
			goto hello;
		}
	}
	$conn->query("insert into cart(uid,gid,game,icon,price)values('$i','$id','$game','$icon','$price')");
	echo "<script>alert('added to cart')</script>";
	hello:


}
	$row=mysqli_fetch_array($conn->query("select * from store order by rand()"));
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
	$ramsupport=$ram<=$_SESSION['ram'];
	$cpusupport=$cpu<=$_SESSION['cpu'];
	$hddsupport=$hdd<=$_SESSION['hdd'];
	if($ramsupport && $cpusupport && $hddsupport)
	{	
		$support=1;
	}
	else
	{
		$support=0;
	}
	$genres= array('racing','shooter','action','open world','adventure','fpp','tpp');
	$gn=mysqli_fetch_array($conn->query("select * from genre where gid='$id'"));
	echo "<form action='store.php'><input type='submit' value='BACK TO STORE' class='back'></form><h1>$game</h1>";
	echo "<video height='320' width='700' controls autoplay> <source src='videos/$video'></video><img class='poster' src='images/$icon'>";
	echo "<br><h3>$desc</h3><h3>publisher:$pub<br>";
	echo "<u><h2>Genre:</h2><div class='wrapper'></u>";
	if($gn[1]==1)
	{	echo "<form method='post' action='store.php'>";
		echo "<input type='hidden' value='racing' name='flt'>";
		echo "<input type='submit' value='$genres[0]' name='apply' class='tag'></form>";
	}
	if($gn[2]==1)
	{   echo "<form method='post' action='store.php'>";
		echo "<input type='hidden' value='shooter' name='flt'>";
		echo "<input type='submit' value='$genres[1]' name='apply' class='tag'></form>";


	}
	if($gn[3]==1)
	{
		echo "<form method='post' action='store.php'>";
		echo "<input type='hidden' value='action_' name='flt'>";
		echo "<input type='submit' value='$genres[2]' name='apply' class='tag'></form>";

	}
	if($gn[4]==1)
	{
		echo "<form method='post' action='store.php'>";
		echo "<input type='hidden' value='open_world' name='flt'>";
		echo "<input type='submit' value='$genres[3]' name='apply' class='tag'></form>";

	}
	if($gn[5]==1)
	{
		echo "<form method='post' action='store.php'>";
		echo "<input type='hidden' value='adventure' name='flt'>";
		echo "<input type='submit' value='$genres[4]' name='apply' class='tag'></form>";

	}
	if($gn[6]==1)
	{
		echo "<form method='post' action='store.php'>";
		echo "<input type='hidden' value='fpp' name='flt'>";
		echo "<input type='submit' value='$genres[5]' name='apply' class='tag'></form>";

	}
	if($gn[7]==1)
	{
		echo "<form method='post' action='store.php'>";
		echo "<input type='hidden' value='tpp' name='flt'>";
		echo "<input type='submit' value='$genres[6]' name='apply' class='tag'></form>";

	}
	echo "</div><br><u><b>system requirements</u></b>";
	
	echo "<br><li>hdd:$hdd gb";
	if($hddsupport)
	{
		echo "<img width=20px height=20px src='support.jpg' style='border-radius:90%'>";
	}
	else
	{
		echo "<img width=20px height=20px src='notsupport.png' style='border-radius:90%'>";

	}
	echo "<li>ram:$ram gb";
	if($ramsupport)
	{
		echo "<img width=20px height=20px src='support.jpg' style='border-radius:90%'>";
	}
	else
	{
		echo "<img width=20px height=20px src='notsupport.png' style='border-radius:90%'>";

	}
	echo "<li>cpu:ryzen/i $cpu";
	if($cpusupport)
	{
		echo "<img width=20px height=20px src='support.jpg' style='border-radius:90%'>";
	}
	else
	{
		echo "<img width=30px height=30px src='notsupport.png' style='border-radius:70%'>";

	}
	if($support)
	{
		echo "<br><br><span class='yes'><a href='accounts.php'>your device</a> can run this game</span>";
	}
	else
	{
		echo "<br><br><span class='no'><a href='accounts.php'>your device </a> cannot run this game</span>";

	}
	echo "<br></h3><h1>price:₹$price</h2>";
	echo "<form method='post' action='buy.php' enctype='multipart/form-data'>";
	echo "<input type='hidden' name='gid' value='$id'>";
	echo "<input type='hidden' name='game' value='$game'>";
	echo "<input type='hidden' name='icon' value='$icon'>";
	echo "<input type='hidden' name='price' value='$price'>";

	echo "<input type='submit' class='buy' name='buy' value='buy'></form>";
	echo "<div class='lastline'><form method='post' action='lookout.php'>";
	echo "<input type='hidden' name='gid' value='$id'>";
	echo "<input type='hidden' name='game' value='$game'>";
	echo "<input type='hidden' name='icon' value='$icon'>";
	echo "<input type='hidden' name='price' value='$price'>";
	echo "<input type='hidden' name='ram' value='$ram'>";
	echo "<input type='hidden' name='cpu' value='$cpu'>";
	echo "<input type='hidden' name='hdd' value='$hdd'>";
	echo "<input type='hidden' name='publisher' value='$pub'>";
	echo "<input type='hidden' name='video' value='$video'>";
	echo "<input type='hidden' name='des' value='$desc'>";

	echo "<input type= 'submit' value='ADD TO CART' class='cart' title='ADD TO CART' name='acart'></form>";
			echo "<form method='post'><input type='hidden' value='$row[0]' name='gid'>";
			echo "<input type='hidden' value='$row[1]' name='game'>";
			echo "<input type='hidden' value='$row[2]' name='icon'>";
			echo "<input type='hidden' value='$row[3]' name='price'>";
			echo "<input type='hidden' value='$row[4]' name='ram'>";
			echo "<input type='hidden' value='$row[5]' name='cpu'>";
			echo "<input type='hidden' value='$row[6]' name='hdd'>";
			echo "<input type='hidden' value='$row[7]' name='publisher'>";
			echo "<input type='hidden' value='$row[8]' name='video'>";
			echo "<input type='hidden' value='$row[9]' name='des'>";			
	echo "<input type='submit' class='next' value='you might also like: $row[1]'></form>"
?>
<style>
body
{	
	background-color: #28282B;
	color: white;	
	overflow-x: hidden;

}
.lastline
{
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	grid-column-gap: 200px;

}
input[type='submit'].next
{
	color: white;
	border-color: white;
	margin-right: 0px;
	background-color: transparent;
	font-size:larger;
	height: 40px;
	font-family: monospace;
}
.yes
{

	background-color: green;
	border-color: white;
	border-radius: 12px;
	padding: 3px;
}
.no{
	border-color: white;
	border-radius: 12px;
	padding: 3px;
	background-color: red;
}
a
{
	color: white;
}
a:visited{
	color: white;
}
input[type='submit'].buy
{	color: white;
	background-color: dodgerblue;

	width: 210px ;
}
h2
{
	color: white;
	
}
h1
{
	color: floralwhite;
}
input[type='submit']
{
	background-color: skyblue;
	color: darkred;
	font-family: fantasy;
	font-size: 30;
	border-radius: 10px;
	
	
}
input[type='submit'].tag
{
	padding: 5px 5px;
	background-color: transparent;
	font-family: cursive;
	color: white;
	outline: none;

	
}
.poster
{
	width: 300px;
	height: 350px;
}
input[type='submit'].back{
	
	background-color: transparent;
	outline: none;

	
}
.wrapper
{	border: none;

	position: relative;
	justify-content: flex-start;
	align-content: flex-start;

	display: grid;
	grid-template-columns: repeat(8, 4fr);

	column-gap: 20px;
}
input[type='submit'].cart
{	color: white;
	background-color: transparent;
	width: 210px;
	border: solid;
	
	
}

input[type='submit']:hover
{
	box-shadow: 0px 0px 10px white ;

}

</style>
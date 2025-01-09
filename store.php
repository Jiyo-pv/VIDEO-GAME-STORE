<?php
session_start();
$iui=$_SESSION['i'];
?>
<html>
<head>
	<script type="text/javascript">


		function at(a)
		{
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() 
			{
				if(this.readyState==4 && this.status==200)
				{
					document.getElementById(a).value='added to cart';
					document.getElementById(a).disabled=true;
					document.getElementById(a).classList.remove('addcart');
					document.getElementById('cartbutton').innerHTML=this.responseText;
					document.getElementById(a).classList.add('justadded');
				}
			};
			xmlhttp.open("GET","cartajax.php?a="+a,true);
			xmlhttp.send();
		}			
		function showhint(x){	
		

		

		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange= function() 
		{
		if (this.readyState==4 && this.status==200)
		{
        document.getElementById("searchhint").innerHTML=this.responseText;
      	}
		};
		xmlhttp.open("GET","searchhint.php?x="+x);
      	xmlhttp.send();
	}
	</script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>store</title>
	<style type="text/css">
		div.heading:hover{
			box-shadow: none;
		}
		div.heading
		{	color: white;
			font-family: monospace;
			font-size: 32;
			border-right: 5px solid;
			width: 90px;
			overflow: hidden;

			animation: cursor .4s infinite ,type 1s steps(5);
			
			margin-bottom: 0%;
		}
		@keyframes cursor{
			50%{
				border-color: transparent;
			}
		}
		@keyframes type
		{
			from
			{
				width: 0;
				
			}
		}		
		h1
		{
			color: white;
			text-transform: uppercase;
		}
		h2
		{
			color: white;

		}
		body
		{
			background-color: #28282B;
			overflow-x: hidden;
			scroll-behavior: smooth;

		}
		div.game
		{	color: skyblue;
			width: 170px;height: 200px;
			justify-content: center;
			align-content: center;
			position: relative;
			border: none;
			border-top-right-radius: 15px;
			border-top-left-radius: 15px;
			border-width: 5px;
			font-family: cursive;
			margin-left: 12%;
			margin-top: 0%;		
			
			animation-duration: 1s;

			animation-timing-function: ease;
			transition: transform 0s ease-out;
		}
		div.game:hover
		{
			transform: translateY(-4px);

		}
		@keyframes throwin
		{
			0%
			{
				margin-left: 200%;
				transform: rotate(-360deg);
			}

			100%
			{
				margin-left: 0%;
			}
		}

		@keyframes pop
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
		@keyframes loadfade
		{
			from{
				transform: translateY(2000px);

			 

			}
		}
		img
		{	
			width:100%;
			height:150px;
			animation-name: hide;
			animation-duration: 2s;
			border-top-left-radius: 15px;
			border-top-right-radius: 15px;
			animation-timing-function: ease;
			
		}	
		@keyframes hide{
		 from{	perspective: 1000px;
		 		opacity: 0;
		 		transform: rotateY(190deg);
		 		background-image: url('loadfade.gif');
		 		background-size: contain;
		 }
		}
		
		div:hover
		{
			box-shadow: 0px 0px 15px whitesmoke; 
			transform: scale(1.01);
			

		}
		.wrapper
	   {
	   		
	   	
			position: relative;
			border: none;
			padding-top: 20px;
			justify-content: flex-start;
			align-content: flex-start;
			margin-left: 0%;
			margin-top: 3%;
	  	display: grid;
	  	grid-template-columns: repeat(4, 1fr);
	    gap: 1px;
	    grid-column-gap:  40px;
	  }
	  @keyframes loader
	  {
	  	from{
	  		background-image: url('loadfade.gif');

	  	}
	  }
	  input[type='button'].addcart
	  {	width: 100%;
	  	height: 30px;
	  	color: white;
	  	border: solid;
	  	border-color: white;
	  	background-color: transparent;
	  	
	  }
	  input[type='submit'].addcartlib
	  {
	  	height: 30px;
	  		
	  	color: white;
	  	border: solid;
	  	border-color: white;
	  	background-color: transparent;
	  }
	  input[type='submit'].addcartlib:hover
{
	border-color: red;
	color: white;

	
}
input[type='button'].justadded:hover
{
	border-color: red;
	color: white;
}
input[type='button'].justadded
	  {
	  	height: 30px;
	  	width: 100%;
	  	font-family: monospace;
	  	color: white;
	  	border: solid;
	  	animation-name: buffer;
	  	animation-duration: 5s;
	  	border-color: white;
	  	background-color: transparent;
	  
	  }
	  @keyframes buffer
	  {
	  	from{ 	
	  		background-repeat: no-repeat;
	  		background-size: cover;
	  		background-image: url('adly.gif');
	  		text-indent: -999px;
	  		background-position: center ;
	  		background-color: black;
	  	}
	  	to{
	  		background-position: center;
	  	}
	  }
  
	  input[type='button'].addcart:hover
{
	cursor: pointer;
	color: white;
	background-image: url('atocrt.gif');
	background-size: contain;
	background-repeat: no-repeat;
	border-color: blue;
	
}
.searchbox
{
	display: grid;
	grid-template-columns: repeat(1, 1fr);


}
	  @keyframes loadslash

	  {
	  	0%
	  	{
	  		background-image: url('l1.gif');
	  		background-size: cover;


	  	}
	  	100%
	  	{
	  		background-image: none;
	  	}
	  }
	  .line{
	  	position: relative;
	  	display: grid;
	  	grid-template-columns: repeat(6, 1fr);
	  	border: none;
	  	grid-column-gap: 250px;

	  	height: 100px;
	  	bottom: 3%;
	  	margin-top:3%;
	  	width: 1024px;
	  }
	  div.searchhint:empty{
	  	border: none;
	  	padding: 0px;
	  }
	  div.searchhint
	  {	margin-top: 40px;
	  	margin-bottom: 0%;
	  	position: absolute;
	  max-height: 70px;
	  color: white;
	  	width: fit-content;
	  	background-color: transparent;
	  	
	 

	 

	  
	  	border-color: white;
	  	border-left-width: border-right-width: 5px;
	  	box-shadow: 0px 0px 0px;
	  
	  }
	  div.searchhint:hover
	  {	transform: none;
	  
	  	box-shadow: 0px 0px 0px;
	  }
	  .line:hover
	  {
	  	box-shadow: 0px 0px 0px;
	  	transform: scale(1.0);
	  	
	  }
	  .searchbox{
	  	padding: 5px;
	  }
	  .searchbox:hover{
	  	box-shadow: none;
	  	transform: none;
	  	width: fit-content;
	  	grid-column-gap: 0px;
	  }
	  .searcher
	  {background-color: black;
	  	height: 35px;
	  }

	  .cart
	  {
	  	background-image: url('cart.jpeg');
	  	background-size: cover;
	  	height: 70px;
	  	width: 70px;
	  	font-size: 22px;
	  	border-radius: 90%;
	   margin-left: 480px;
	  	margin-bottom: 0%;
	  	position: absolute;
	  text-align: right;
	  padding-right: 28px;
	  padding-bottom: 56px;
	  	color: white;
	  	position: absolute;
	  	
	  }
	  .cart:hover
	  {
	  	box-shadow: 1px 1px 10px steelblue;
	  	background-image: url('crthover.gif');
	  	color: blue;
	  	font-family: fantasy;
	  	background-size: cover;
	  	transition: 1s;
	  	text-align: center;
	  	font-size: 60px;
	  	padding: 0px;

	  }
	  input[type='text']{
	  	margin-left: 0px;
	  	padding: 5px 5px;
	  	color: white;
	  }

	  .wrapper:hover
	  {
	  	box-shadow: 0px 0px 0px;
	  transform: scale(1.0);	
	  }
	  input[type='submit']
	  {		border: none;
	  		width: 170px;
	  		font-weight: bold;
	  		font-family: monospace;
	  		color: white;
	  		background-color: black;
	  		font-size: 15;
	  		text-transform: uppercase;

	  }
	  input[type='submit']:hover
	  {
	  
	  color: floralwhite;


	  }

	  
	  input[type='submit'].apl
		{
			border: solid;
			padding: 2px;
			background-color: black;
			font-family: monospace;
			width: 60px;
		}
		select
		{
			padding: 6px 5px;
		}
		
		span{
			position: absolute;
			opacity: 0;
			background-color: steelblue;
			color: white;
			width:70% ;
			font-size: 26;
			border-top-left-radius: 15px;
			transition: 0s;
			font-family: monospace;
			text-align: center;
			

		}
		@keyframes widen
		{
			from
			{	opacity: 0;
				width: 0%;
			}
			to
			{	opacity: 1;
				width: 70%;
			}
		}
		.game:hover span{
			opacity: 1;

			animation-name: widen;
			animation-duration: 1s;
		}
		sup
		{
			margin-bottom: 50px;
		}
		.genres{
				position: absolute;
				margin-top: 5px;
			display: grid;
			grid-template-columns: repeat(8, 1fr);
			grid-column-gap: 0px;
			margin-left: 20%;
			border-radius: 90px;
			width: 420px;
			height: fit-content;


		}
		.genres .nav:hover{
			
				border-color: white;
		}
		.genres .nav-left:hover{
			
				border-color: white;
		}
		.genres .nav-right:hover{
				
				border-color: white;
		}
		.genres .nav{
			border-right: solid ;
			border-left: solid;
			width: fit-content;
			color: black;
			background-color: grey;
		}
		.genres:hover
		{
				box-shadow: 0px 0px 0px;
				transform: none;

		}
		.genres .nav-left{
			border-right: solid;
			border-left: solid;
			width: fit-content;
			color: black;
			background-color: grey;
			border-top-left-radius: 40px;
			border-bottom-left-radius: 40px;
		
		}

.genres .nav-right{
	border-right: solid;
			border-left: solid;
	width: fit-content;
	color: black;
			background-color: grey;
			border-top-right-radius: 40px;
			border-bottom-right-radius: 40px;
		}

	</style>
	
	
</head>
<body>
<div class='genres'>
	<form method='POST' action='store.php' >
		<input type='hidden' value='none' name='flt'>
		<input type='submit' name='apply' value='all' id='all' class='nav-left'>
	</form>
	<form method='POST' action='store.php'>
		<input type='hidden' value='action_' name='flt'>
		<input type='submit' name='apply' value='action' id='action' class='nav'>
	</form>
	<form method='POST' action='store.php'>
		<input type='hidden' value='adventure' name='flt'>
		<input type='submit' name='apply' value='adventure' id='adventure' class='nav'>
	</form>
	<form method='POST' action='store.php'>
		<input type='hidden' value='open_world' name='flt'>
		<input type='submit' name='apply' value='openworld' id='openworld' class='nav'>
	</form>
	<form method='POST' action='store.php'>
		<input type='hidden' value='shooter' name='flt'>
		<input type='submit' name='apply' value='shooter' id='shooter' class='nav'>
	</form>
	<form method='POST' action='store.php'>
		<input type='hidden' value='racing' name='flt'>
		<input type='submit' name='apply' value='racing' id='racing' class='nav'>
	</form>
	<form method='POST' action='store.php'>
		<input type='hidden' value='fpp' name='flt'>
		<input type='submit' name='apply' value='fpp' id='fpp' class='nav'>
	</form>
	<form method='POST' action='store.php'>
		<input type='hidden' value='tpp' name='flt'>
		<input type='submit' name='apply' value='tpp' id='tpp' class='nav-right'>
	</form>

</div>

<?php
	require "connections.php";
	if(isset($_POST['acart']))
{	$id=$_POST['gid'];
	$game=$_POST['game'];
	$icon=$_POST['icon'];
	$price=$_POST['price'];
	
	$conn->query("insert into cart(uid,gid,game,icon,price)values('$iui','$id','$game','$icon','$price')");
	hello:
}
	$cart=mysqli_fetch_array($conn->query("select count(*) from cart where uid='$iui'"));
	$count=$cart[0];
	if($count==0)
	{
		$count='';
	}
	if(isset($_POST['apply']))
	{	$dim=$_POST['apply'];
		echo "<script>document.getElementById('$dim').style.backgroundColor='black';document.getElementById('$dim').style.color='white';</script>";
		$f=$_POST['flt'];
		if($f!='none')
		{
		$result=$conn->query("select store.gid,game,icon,price,ram,cpu,hdd,publisher,video,description from store,genre where store.gid=genre.gid and $f=1 order by rand()");
		goto nxt;	
		}
	}
	if(isset($_POST['sr']))
	{
		$f=$_POST['sr'];
		$result=$conn->query("select store.gid,game,icon,price,ram,cpu,hdd,publisher,video,description from store,genre where store.gid=genre.gid and game like '%{$f}%' order by rand()");
		goto nxt;	
		
	}
	$result=$conn->query("select * from store order by rand()");
	nxt:

	if(mysqli_num_rows($result)>0)
	{	echo "<div class='heading'>STORE</div><h2>";
			echo "<div class='line'>";
			echo "<div class='searchbox' style='none'><form method='post' action='store.php'><input type='text' class='searcher' autocomplete='off' name='sr'  placeholder='search store' onkeyup='showhint(this.value)'> ";
			echo "</form><div class='searchhint' id='searchhint'></div></div>"; 
			
			echo  "<form method='post' action='cart.php'><button type='submit' class='cart' title='CART' id='cartbutton'><sup>$count</sup></button></form></div><br>";

	if(isset($_POST['apply']))
	{
		$f=$_POST['flt'];
		$f=str_replace('_',' ',$f);
		if($f!='none')
		{
			echo "<h1><u>$f</u></h1>";	
		}
	}
	if(isset($_POST['sr']))
	{$sh=$_POST['sr'];
echo "search results for '$sh'  :<br>";
}
	echo "<div class='wrapper'>";
		while ($row=mysqli_fetch_array($result))
		{	
			echo "<form method='post' action='lookout.php' enctype='multipart/form-data'>";
			echo "<div class='game'><label for='$row[1]'><span>₹$row[3]</span><img src='images/$row[2]'></label><br>";
			echo "<input type='hidden' value='$row[0]' name='gid'>";
			echo "<input type='hidden' value='$row[1]' name='game'>";
			echo "<input type='hidden' value='$row[2]' name='icon'>";
			echo "<input type='hidden' value='$row[3]' name='price'>";
			echo "<input type='hidden' value='$row[4]' name='ram'>";
			echo "<input type='hidden' value='$row[5]' name='cpu'>";
			echo "<input type='hidden' value='$row[6]' name='hdd'>";
			echo "<input type='hidden' value='$row[7]' name='publisher'>";
			echo "<input type='hidden' value='$row[8]' name='video'>";
			echo "<input type='hidden' value='$row[9]' name='des'>";
			echo "<input type='submit' id='$row[1]' value='$row[1]' name='sub'>";
			echo "</form><form>";
			echo "<input type='hidden' value='$row[0]' name='gid'>";
			echo "<input type='hidden' value='$row[1]' name='game'>";
			echo "<input type='hidden' value='$row[2]' name='icon'>";
			echo "<input type='hidden' value='$row[3]' name='price'>";
			$libsearch=mysqli_fetch_array($conn->query("select * from library where uid=$iui and gid='$row[0]'"));
			$cartsearch=mysqli_fetch_array($conn->query("select * from cart where uid='$iui' and gid='$row[0]'"));
			$flag=0;
			if($libsearch)
			{	$flag=1;
				echo "<input type='submit' value='in-library' class='addcartlib' disabled='disabled' style='cursor:not-allowed'>";
			
			}
			if($cartsearch)
			{	$flag=1;
			echo "<input type='submit'  value='in-cart' class='addcartlib' disabled='disabled'  style='cursor:not-allowed'>";
			

			}
			if($flag===0)
			{
			echo "<input id=$row[0] onclick='at($row[0])' type='button' value='add to cart' class='addcart' name='acart' >";
			}
			echo "</form></div>";
		}

	}
	else
	{	
		if(isset($_POST['sr']))
		{	$f=$_POST['sr'];
		echo "<h2><br><br>0 games found for ''$f''</h2>";
		echo "<form action='store.php'>";
		echo "<input type='submit' value='refresh store' style='background-color:skyblue;border:solid;color:black'></form>";
		}
		else
		{


		die('<h2><br><br>no games available in store</h2>');
	}
	}

?>
</body>
</html>
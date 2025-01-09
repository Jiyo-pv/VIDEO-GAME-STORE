<?php
session_start();
$i=$_SESSION['i'];
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>store</title>
	<style type="text/css">
		div.heading:hover{
			box-shadow: none;
			transform: scale(1.0);
		}
		div.heading
		{	color: white;
			font-family: monospace;
			font-size: 32;
			border-right: 5px solid;
			width: 125px;
			
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
		body
		{	background-repeat: no-repeat;
			background-color: #28282B;
			overflow-x: hidden;
		}
		div.game
		{	 border-top-left-radius: 15px;
			 border-top-right-radius: 15px;

			color: skyblue;
			width: 160px;height: 165px;
			justify-content: center;
			align-content: center;
			position: relative;
			border: none;
			border-color: darkcyan;
			border-width: 5px;
			font-family: cursive;
			margin-left: 0%;
			margin-top: 0%;
			box-shadow: 0px 0px 5px grey;

		}
		
		
		div.loading
		{	width: 10px;
			height: 1px;
			border: none;
			position: absolute;
			font-family: cursive;
		
			margin-left: 85%;
			
		}
		img
		{	border-top-left-radius: 15px;
			border-top-right-radius: 15px;
			width:160px;
			height:140px;
		}
		div.game:hover
		{
			box-shadow: 0px 0px 15px blue; 
			transform: scale(1.1);
			

		}
		.wrapper
	   {
	   		width: 1024px;
			position: relative;
			border: none;
			justify-content: flex-start;
			align-content: flex-start;
			margin-left: 0%;
			margin-top: 0%;
			padding: 5px;
			margin-top: 2px;
	  	display: grid;
	  	grid-template-columns: repeat(4, 1fr);
	    gap: 16px;
	    box-shadow: none;
	  }
	  .wrapper:hover
	  {
	  	box-shadow: 0px 0px 0px;
	  	transform: scale(1.0);
	  }
	  input[type='button']
	  {		border: none;
	  		width: 160px;
	  		font-family: fantasy;
	  		color: white;
	  		background-color: black;
	  		font-size: 15;
	  		text-transform: uppercase;
	  }
	  .loading
	  {	animation-duration: 5s;
	  	animation-iteration-count: infinite;
	  	animation-name: loading;
	  }
	  @keyframes loading
	  {
	  	0%{
	  		filter: drop-shadow(0px, 0px);

	  	}
	  	25%
	  	{color: cadetblue;

	  	}
	  	50%
	  	{
	  		color: wheat;
	  	}
	  	75%
	  	{
	  		color: red;
	  	}
	  	85%
	  	{
	  		color: white;
	  	}
	  	100%
	  	{
	  		color: green;
	  	}
	  }
	  span{
	  		opacity: 0;
	  		margin-left: 30%;
	  		margin-top: 25%;
	  		width: 60px;
	  		height: 56px;
	  		border-radius: 90%;
	  	
	  		border: none;
	  		background-image: url('play.jpg');
	  		background-size: 100%;


	  		
	  		position: absolute;
	  }
	  span:hover{
	  	box-shadow: 0px 0px 10px white;
	  }
	  .game:hover span{
	  	opacity: 1;
	  }
	</style>
	<script type="text/javascript">
		function load() {

		
			document.getElementById('loading').innerHTML='loading...';

		}
	</script>
</head>
<body>

<?php
	require("connections.php");
	$result=$conn->query("select gid,game,icon from library where uid='$i' order by rand()");
	if(mysqli_num_rows($result)>0)
	{	echo "<div class='heading'>LIBRARY</div><h2><div class='loading' id ='loading'></div><br>";
		echo "<div class='wrapper'>";
		while ($row=mysqli_fetch_array($result))
		{	
			
			echo "<label><div class='game'><span></span><img src='images/$row[2]'><br>";
			echo "<a href='pacman.html'><input type='button' value='$row[1]' onclick='load()'> </a></div></label>";
			
		}

	}
	else
	{
		echo "<h2 style='color:green'>your library is empty<br> lets grab something the store<a href='store.php'><br>visit store</a></h2>";
		echo '<script>document.body.style.backgroundImage="url(emptylib.gif)";document.body.style.backgroundSize="contain";document.body.style.backgroundColor="white";</script>';
	}

?>
</body>
</html>
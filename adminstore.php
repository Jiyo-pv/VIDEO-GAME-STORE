
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>store</title>
	<style type="text/css">

		h2
		{
			color: darkblue;

		}
		body
		{
			background-color: lavender;
		}
		div
		{	color: skyblue;
			width: 170px;height: 185px;
			justify-content: center;
			align-content: center;
			position: relative;
			border: none;
			border-color: darkcyan;
			border-width: 5px;
			font-family: cursive;
			margin-left: 0%;
			margin-top: 0%;
			animation-name: load;
			animation-duration: 1s;
				border-top-left-radius: 15px;
				border-top-right-radius: 15px;

		}
		@keyframes load
		{
			0%
			{	transform: rotate(360deg);
				margin-top: 1500%;
			}
		
		}
		input[type='submit'].chng
		{
			background-color: darkblue;
			color: white;
			font-family: monospace;
		}
		img
		{	
			width:170px;
			height:161px;
						border-top-left-radius: 15px;
				border-top-right-radius: 15px;
		}
		div:hover
		{
			box-shadow: 5px 4px 15px sienna; 
			transform: scale(1.01);
			color: papayawhip;

		}
		select
		{
			padding: 5px 4px;
		}
		input[type='submit'].apl
		{
			border: solid;
		}
		.wrapper
	   {
	   		
			position: relative;
			border: none;
			justify-content: flex-start;
			align-content: flex-start;
			margin-left: 0%;
			margin-top: 0%;
	  	display: grid;
	  	grid-template-columns: repeat(5, 1fr);
	    gap: 1px;
	    grid-column-gap: 40px;
	    animation-duration: 0s;
	  }
	  .wrapper:hover
	  {
	  	box-shadow: 0px 0px 0px;
	  	transform: scale(1.0);
	  }
	  input[type='submit']
	  {		border: none;
	  	border-width: 2px;
	  		width: 170px;
	  			height: 32px;
	  		font-family: fantasy;
	  		color: white;
	  		background-color: green;
	  		font-size: 15;
	  }
	  input[type='submit']:hover
	  {
	  	color: wheat;
	  }
	</style>
</head>
<body>

<?php
	require("connections.php");
	if(isset($_POST['apply']))
	{
		$f=$_POST['flt'];
		if($f!='none')
		{
		$result=$conn->query("select store.gid,game,icon,price,ram,cpu,hdd,publisher,video,description from store,genre where store.gid=genre.gid and $f=1 order by rand()");
		goto nxt;	
		}
	}
	$result=$conn->query("select * from store order by rand()");
	nxt:

	if(mysqli_num_rows($result)>0)
	{	echo "<h2><u>STORE </u><h2><form action='chng.php'><input type='submit' class='chng' value='change password'></form> ";
		echo "<form method='post' action='adminstore.php'>filter:<select name='flt' ><option value='racing'>racing</option>
		<option value='action_'>action</option>
		<option value='open_world'>open world</option>
		<option value='adventure'>adventure</option>
		<option value='shooter'>shooter</option>
		<option value='fpp'>fpp</option>
		<option value='tpp'>tpp</option>
		<option value='none' selected>no filter</option>
		</select></select><input type='submit' value='apply' class='apl' name='apply'></form>";
		if(isset($_POST['apply']))
	{
		$f=$_POST['flt'];
		$f=str_replace('_',' ',$f);
		if($f!='none')
		{
			echo "showing results for:'$f'<br><br>";	
		}
	}
	
		echo "<div class='wrapper'>";

		while ($row=mysqli_fetch_array($result))
		{	
			echo "<label><form method='post' action='adminshowcase.php' enctype='multipart/form-data'>";
			echo "<div title=₹$row[3]><img src='images/$row[2]'><br>";
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
			echo "<input type='submit' value='$row[1]' name='sub'></div>";
			echo "</form></label>";
		}

	}
	else
	{
		die('<h2>no games available in store</h2>');
	}

?>
</body>
</html>
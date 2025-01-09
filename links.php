<?php
session_start();
$u=$_SESSION['u'];
?>
<html><head>
	<link href="favicon.jpg" rel="icon" type="image/jpg">
<style>

	body{
		color: ghostwhite;
		font-family: monospace;
		background-color: #28282B;
		font-size: 34px;
		padding-left: 3px;
	}
	button
	{
		background-color: lightslategrey;
		margin-left: 0px;
		color: white;
		border-width: 3;
		font-family: monospace;
		font-size: 20;
		margin-top: 15%;
		width: 170px;
		height: 60px;
		box-shadow: 0px 0px 5px black;


	}
	button[type='submit']
	{
		margin-top: 200px;
	}
	button:hover
	{
		box-shadow: 0px 0px 15px powderblue;
	}
	.account
	{
		border-radius: 90%;
		width: 70px;
		height: 70px;
		background-color: mediumseagreen;
		background-image: url('avatar1.gif');
		background-size: cover;
		background-repeat: no-repeat;
		margin-right: 3px;
	}
</style>
<script type="text/javascript">
function refill() {
	// body...

	a=document.getElementById('ac');
	c=Math.floor(Math.random() * 12);
	switch(c)
	{
	case 0:
		a.style.backgroundImage="url(avatar0.gif)";

		break;
	case 1:
		a.style.backgroundSize='contain';
		a.style.backgroundImage="url(avatar1.gif)";
		
		break;
	case 2:
		a.style.backgroundImage="url(avatar2.gif)";
		break;
	case 3:
		a.style.backgroundImage="url(avatar3.gif)";
		break;
	case 4:
		a.style.backgroundSize='cover';
		a.style.backgroundImage="url(avatar4.gif)";
		
		break;
	case 5:
		a.style.backgroundImage="url(avatar5.gif)";
		break;
	case 6:
		a.style.backgroundImage="url(avatar6.gif)";
		break;
	case 7:
		a.style.backgroundImage="url(avatar7.gif)";
		break;
	case 8:
		a.style.backgroundImage="url(avatar8.gif)";
		break;
	case 9:
		a.style.backgroundImage="url(avatar9.gif)";
		break;
	case 10:
		a.style.backgroundImage="url(avatar10.gif)";
		break;
	case 11:
		a.style.backgroundImage="url(avatar11.gif)";
		break;
	}
}
</script>
</head>
<body onload="refill()">
<b><a href='accounts.php' target="f"><button id='ac' title='My Account'class='account'> </button></a><?php echo "$u" ?></b>
	

<button id="a" onClick="parent.f.location.href='store.php'">STORE</button>
<br>
<button id="b" onClick="parent.f.location.href='library.php'">LIBRARY</button>
<form action='index.php' target='_parent'>
<button type='submit'>LOGOUT</button></form> 
<br>

</body></html>
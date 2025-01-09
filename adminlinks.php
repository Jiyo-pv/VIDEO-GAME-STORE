
<html><head>
<style>
	body{ color: white;
		background-color: #28282B;
		font-family: inherit;
		padding: 0px;
	}
	button
	{
		background-color: black;
		color: white;
		border-width: 3;
		font-family: monospace;
		font-size: 20;
		margin-top: 15px;
		width: 170;
		height: 60;

	}
	button:hover
	{	border-color: white;
		box-shadow: 0px 0px 15px powderblue;
	}
</style>
</head>
<body> 
<b><h1>ADMIN CENTRE</h1></b>
<button onClick="parent.f.location.href='salesreport.php'">view sales report</button>

<button onClick="parent.f.location.href='adminstore.php'">view store</button>

<button onClick="parent.f.location.href='gamestacker.php'">+ add game</button>

<button onClick="parent.f.location.href='users.php'">USERS</button>
<a href='index.php' target="_parent"><button >leave </button></a>
</body></html>
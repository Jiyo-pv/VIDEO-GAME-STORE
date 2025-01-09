<?php
session_start();
$i=$_SESSION['i'];
echo "<div><h1>do you really want to delete your account?</h1>";
echo "<div class='wrapper'><form method='post' action='index.php' target='parent'>";
echo "<input type='hidden' value='$i' name='i'>";
echo "<input type='submit' name='dl' value='confirm' class='delete'></form>";
echo "<form method='post' action='accounts.php'>";
echo "<input type='submit' value='cancel' class='cancel'></form></div></div>";
?>
<style>
	.wrapper{
		display: grid;
		grid-template-columns: repeat(2, 1fr);
		border: none;
		width: 100px;
		height: 10px;
		grid-column-gap: 30px;
	}

	.delete
	{
		background-color: red;
		color: white;
	}

	.cancel
	{
		background-color: green;
		color: white;
	}
	input:hover
	{
		box-shadow: 0px 0px 10px darkblue;
	}
	body
	{	background-color: lavender;
		
	}
	div
	{	background-color: white;
		height: 150px;
		width: 500px;
		border-color: royalblue;
		margin-left: 20%;
		border: solid;
	}
</style>
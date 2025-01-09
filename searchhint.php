<?php

$conn=mysqli_connect('localhost','root','','rad.io');
$f=$_REQUEST['x'];

if($f!=="")
{
	$result=$conn->query("select gid,game,icon,price,ram,cpu,hdd,publisher,video,description from store where game like '%{$f}%' order by rand()");

$row=mysqli_fetch_array($result);
if($row){			
echo "<label><div class='searchint' style='overflow:hidden;border:solid;padding:4px;padding-bottom:10px;height:64px'>	
<img src='images/$row[2]'class='hint'><a>$row[1]</a>
<form method='POST' action='lookout.php' enctype='multipart/form-data' target='f'> ";
			
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
			echo "<input type='submit' style='display:none' value='$row[1]' name='sub'>";
			echo "</form></label></div>";
}
else
{
	echo "couldnt fetch results";
}
}

?>
<style type="text/css">
	.hint{
		animation-name: none;
		border-radius: 0px;
		cursor: pointer;
		width: 70px;
		bottom: 0px;
		height: 68px;
	}
	a{ color: white;
		
		
	 border-bottom: solid;

	}
	a:hover
	{
		cursor: pointer;
		color: blueviolet;
	}
</style>
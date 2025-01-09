<!DOCTYPE html>
<html>
<?php

?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		body
		{	padding-top: 7%;
			background-image: url('board.jpg');
			background-size: 100%;
			background-repeat: no-repeat;
			font-family: cursive;
			font-size: 32;
			background-color: burlywood;
		}
		.hide{
			opacity: 0;
		}
		u{
			margin-left: 20%;
			font-size: 50;
		}
		h3
		{
			margin-left: 15%;
		}
		.submit{
			background-color: green;
			font-family: monospace;
			color: white;
			margin-left: 25%;
			margin-top: 12px;
			font-size: 32px;
		}
		.submit:hover
		{
			box-shadow: 0px 0px 10px blue;
		}
		.done{
			width: 50px;
			height: 50px;
			background-color: green;
			font-family: monospace;
			margin-left: 25%;
			display: none;
			color: white;
			margin-top: 12px;
			font-size: 20px;
			animation-name: ch;
			animation-duration: 1s;
		}
		@keyframes ch{
			from{ 
				background-image: url('lv.gif');
			
				background-repeat: no-repeat;
				background-size: contain;
				display: block;
			}
			to{
				opacity: 0;
			}
		}
	</style>
	<script type="text/javascript">
		function change() {
			r=document.getElementById('submit');
			a=document.getElementById('code').value;
			b=document.getElementById('pass').value;
			if(a.value==''||b.value=='')
			{
				alert('fill something please');
			}
			else
			{
			r.classList.remove('submit');
			r.classList.add('done');
			r.disabled=true;
			r.innerHTML=' ';
			}
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() 
			{
				if(this.readyState==4 && this.status==200)
				{
				
					document.getElementById('output').innerHTML=this.responseText;
					
				}
			};
			xmlhttp.open("GET","chngajax.php?a="+a+"&b="+b,true);
			xmlhttp.send();
		
		}
		function hide(){
			r=document.getElementById('submit');
			r.classList.add("hide");
		}
		function check(){
			a=document.getElementById('code').value;
			b=document.getElementById('pass').value;
			if(a!='' && b!=''){
			r=document.getElementById('submit');
			r.classList.remove('hide');
			r.classList.add('submit');}
			if(a==''||b=='')
			{
				r=document.getElementById('submit');
			r.classList.add('hide');
			}
		}
	</script>
</head>
<body onload="hide()"  onkeyup="check()">
	<h3>last updated:<?php require 'connections.php';
$row=mysqli_fetch_array($conn->query("select last_updated from admin"));
echo $row[0];$row[0]; ?></h3>
	<h2><u>CHANGE PASSWORD</u></h2>
	<form>
	<h3>enter security code:
	<input type="number" id="code" value=""><br>
	enter new password:
	<input type="text" id='pass' value=""><br>
	<button class='hide' id='submit' onclick="change()">GO</button>
</h3></form>
<div style="border:none;position: absolute;" id='output'></div> 

</body>
</html>
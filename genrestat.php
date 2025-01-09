<?php
//action_  adventure open_world fpp tpp shooter
require 'connections.php';
$racing=mysqli_fetch_array($conn->query("SELECT COUNT(library.game) from library,genre WHERE library.gid=genre.gid and genre.racing=1"));
$action=mysqli_fetch_array($conn->query("SELECT COUNT(library.game) from library,genre WHERE library.gid=genre.gid and genre.action_=1"));
$adventure=mysqli_fetch_array($conn->query("SELECT COUNT(library.game) from library,genre WHERE library.gid=genre.gid and genre.adventure=1"));
$openworld=mysqli_fetch_array($conn->query("SELECT COUNT(library.game) from library,genre WHERE library.gid=genre.gid and genre.open_world=1"));
$fpp=mysqli_fetch_array($conn->query("SELECT COUNT(library.game) from library,genre WHERE library.gid=genre.gid and genre.fpp=1"));
$tpp=mysqli_fetch_array($conn->query("SELECT COUNT(library.game) from library,genre WHERE library.gid=genre.gid and genre.tpp=1"));
$shooter=mysqli_fetch_array($conn->query("SELECT COUNT(library.game) from library,genre WHERE library.gid=genre.gid and genre.shooter=1"));

echo "<div id='myChart' style='max-width:700px; height:400px'></div>
<script src='https://www.gstatic.com/charts/loader.js'></script>";
echo "<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['genre', 'count'],
  ['racing',$racing[0]],
  ['action',$action[0]],
  ['adventure',$adventure[0]],
  ['open world',$openworld[0]],
  ['shooter',$shooter[0]],
  ['fpp',$fpp[0]],
  ['tpp',$tpp[0]]
]);

// Set Options
const options = {
  title:'What players like most',is3D:true,backgroundColor: '#28282B',color: 'white', legendTextStyle: { color: '#FFF' },
    titleTextStyle: { color: '#FFF' },
};

// Draw
const chart = new google.visualization.PieChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>
"
?>
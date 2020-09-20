<html>
<head>
	<style type="text/css">
		#contest_name
{
	font-size: 35px;
	color: #990033;
}
table, td, th {  
  border: 2px solid #ff3300;
  text-align: center;
}

table {
  border-collapse: collapse;
}
th
{
	font-weight:bold;
	color:#0066ff;
}
th, td {
  padding: 15px;
  font-size:20px;
}
	</style>
<center>
	<p id="contest_name">HONEYMINT CONTEST</p>
	<br>
<?php 
$start = mktime(0,0,0,4,16,2020);
$end = mktime(0,0,0,4,19,2020);
$countdown = round(($end-$start)/86400);
if($countdown)
{
?>
<h2>Contest is in progress!</h2>
<?php
}
else
{
	include('static/connect.php');
	$sql="select * from tblrefferals a join tblusers b on a.uid=b.uid order by refers desc limit 3";
	$res=mysqli_query($con,$sql);
	echo "<h2>Top 3 Winners </h2>";
	echo "<table><tr><th>S.No</th><th>Contestant Name</th><th>Mobile Number</th><th>No.of Refers</th></tr>";
	$ct=0;
	while($row=mysqli_fetch_array($res))
	{
		$ct+=1;
		echo "<tr><td>".$ct."</td><td>".$row['ufname']."</td>
		<td>".$row['phn']."</td><td>".$row['refers']."</td></tr>";
	}
}
?>
</center>
</html>
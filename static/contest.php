<?php
session_start();
if(!$_SESSION['uid'])
{
	if($_GET['ref'])
		$_SESSION['ref']=$_GET['ref'];
header('Location:signin.php');
}
include('connect.php');
$sql="select * from tblrefferals where uid='".$_SESSION['uid']."'";
$c=mysqli_num_rows(mysqli_query($con,$sql));
$reflink="localhost/contest/static/contest.php?ref=".$_SESSION['uid']; 
?>
<html>
<head>
	<title>Contest</title>
  <meta charset="UTF-8">
	<link rel="stylesheet" href="../styles/main.css"/>
	</head>
<body>
		<ul style="float:right;"><li>
		<label id="uname"><?php echo $_SESSION['uname']?>
		</label></li>
		<li>
			<form action="logout.php">
<input type="image" id="imgbtn" alt="LogOut"
       src="../images/logout.jpg" ></li></form></ul>
<br>
<center>
<p id="contest_name">HONEYMINT CONTEST</p>
<hr>
<h1 name="content">Refer your friends & Win</h1>
<?php include('ch.php');?>
<br>
<?php
if(!$c)
{?>
	<form action='addreferre.php' >
		<input name="btnjoin" type="submit" value="Join"></form>
<?php
}
else
{
	?>
<input name="btnjoin" type="submit" value="&#10003;Joined" disabled> 
	<h3>Share the link below to earn referral points</h3>
	<textarea id='reflink' rows=1 cols=50 disabled ><?php echo $reflink?></textarea>
	<h3>Your refers:<?php
	$sql="select refers from tblrefferals where uid='".$_SESSION['uid']."'";
	$res=mysqli_query($con,$sql);
	$res=mysqli_fetch_array($res);
	 echo $res['refers']
	 ?></h3>
<?php 
}
?>
</center>
</body>
</html>
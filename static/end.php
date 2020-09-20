<?php
session_start();
if(!$_SESSION['uid'])
{
header('Location:signin.php');
}
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
<img src="../images/ended.png" alt="Contest Ended">
</html>
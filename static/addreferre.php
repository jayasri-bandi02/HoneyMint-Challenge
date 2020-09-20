<?php
include('connect.php');
session_start();
if(isset($_GET['btnjoin']))
{
$sql="insert into tblrefferals values('".$_SESSION['uid']."',0)";
if(mysqli_query($con,$sql))
{
	if($_SESSION['ref'])
	{
	$sql="update tblrefferals SET refers = refers + 1 WHERE uid ='".$_SESSION['ref']."'";
	mysqli_query($con,$sql);
	unset($_SESSION['ref']);
	}
	header('Location:contest.php');
}
else
	echo "Internal Error";
}
?>
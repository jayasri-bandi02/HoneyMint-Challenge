<?php
$con=mysqli_connect("localhost","root","");
$sql="create database contestant_db";
if(mysqli_query($con,$sql))
{
	echo "Db created";
}
else
{
	echo "Error".mysqli_error($con);
}
?>
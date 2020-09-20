<?php
include("connect.php");
$sql="create table tblusers (uid char(5),umail varchar(30),ufname varchar(20),ulname varchar(20),upass varchar(20),phn char(10))";
if(mysqli_query($con,$sql))
{
	echo "Table created";
}
else
{
	echo "Error".mysqli_error($con);
}
?>
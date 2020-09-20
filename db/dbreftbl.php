<?php
$con=mysqli_connect("localhost","root","","contestant_db");
if (!$con)
	die("Error connecting db");
$sql="create table tblrefferals (uid char(5), refers integer)";
if(mysqli_query($con,$sql))
{
	echo "Table created";
}
else
{
	echo "Error".mysqli_error($con);
}
?>
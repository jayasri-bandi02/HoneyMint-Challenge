<?php
//$start = mktime(0,0,0,4,16,2020);
//$start=today();
$start = mktime(0,0,0,4,16,2020);
$end = mktime(0,0,0,4,19,2020);
$countdown = round(($end-$start)/86400);
?>
<h2>
<?php 
if($countdown)
echo "$countdown day/s left";
else
{
	header('Location:end.php');
}
?></h2>

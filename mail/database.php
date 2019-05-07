<?php
$url= 'sql103.epizy.com';
$username= 'epiz_22958658';
$password='UcMEORCi';
$conn=mysqli_connect($url,$username,$password, "epiz_22958658_beingpreneur");
if(!$conn)
{
    die ('Could not connect:' .mysql_error());
}
?>

<?php
include("connect.php");

$watch_id=$_GET['id'];
$sql="delete from watch where watch_id=$watch_id ";
$res=mysqli_query($con,$sql);
header("location:admincode.php");
?>
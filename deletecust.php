<?php
include("connect.php");

$user_id=$_GET['id'];
$sql="delete from customer where user_id=$user_id ";
$res=mysqli_query($con,$sql);
header("location:cust.php");
?>
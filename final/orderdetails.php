<?php 
include("connect.php");
					//echo "hello";
					//ob_start();
					echo $_GET['uid'];
					$quer="select max(orders_id) from order_master where customer_id=$_GET[uid]";
					$r=mysqli_query($con,$quer) or die(mysqli_error($con));
					$oid=mysqli_fetch_row($r) or die(mysqli_error($con));

					$orders_id= $oid[0];
					//echo $orderid;
					//ob_end_flush();
					header_remove();
					header("location:order.php?oid=$orders_id");

?>					

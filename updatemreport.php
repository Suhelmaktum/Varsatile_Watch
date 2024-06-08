<?php	
		if(isset($_POST['btnsubmit']))
	    {	
	    	include('connect.php');
	    	$orders_id=$_POST['orders_id'];
	    	//$watch_id=$_POST['watch_id'];
			//$watch_name=$_POST['watch_name'];
			//$price=$_POST['price'];
			//$brand=$_POST['brand'];
			//$quantity=$_POST['quantity'];
			//$total=$_POST['total'];
				
			
			$query="update order_master set orders_id='$orders_id'";

			$res=mysqli_query($con,$query);
			
			header("location:vieworder.php");
        }
    ?>
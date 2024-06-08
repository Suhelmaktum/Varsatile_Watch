<?php	
		if(isset($_POST['btnsubmit']))
	    {	
	    	include('connect.php');
	    	$watch_id=$_POST['watch_id'];
			$watch_name=$_POST['watch_name'];
			$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$price=$_POST['price'];
			$category=$_POST['category'];
			$information=$_POST['information'];
			$brand=$_POST['brand'];
				
			
			$query="update watch set watch_id='$watch_id',watch_name='$watch_name',
			image='$image',price='$price',category='$category',information='$information',
			brand='$brand' where watch_id='$watch_id'";

			$res=mysqli_query($con,$query);
			
			header("location:admincode.php");
        }
    ?>
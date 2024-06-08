<!DOCTYPE html>
<html>
<head>


	<title></title>
	<link rel="stylesheet" type="text/css" href="css/updaterecord.css">
</head>
<body align="center">
	<table width="100%" border="7%" bgcolor="white" cellspacing="5" cellpadding="5" align="center">
		<tr align="center" bgcolor="sky blue">
			<td>
	<h1 align="center">Update Report</h1>
</td>
</tr>
<tr>
	<td align="center">
<form action="updatemreport.php" method="post" enctype="multipart/form-data">
<div class="cat">
	     		<?php 
	     			include("connect.php");
	     			$watch_id=$_GET['id'];


	     			$query="select * from order_detail";

					$result=mysqli_query($con,$query) or die(mysqli_error($con));

					$row=mysqli_fetch_row($result);
					$orders_id=$row[0];
					//$watch_id=$row[1];
					//$watch_name=$row[2];
					//$price=$row[3];
					//$brand=$row[4];
					//$quantity=$row[5];
					//$total=$row[6];


					
				?>
				</br><b><label for="orders_id">Order Id</label>
	     		<input type="text" name="orders_id" value="<?php echo $orders_id;?>"></br>


				<!--</br><b><label for="watch_id">Watch Id</label>
				<input type="text" name="watch_id" value="<?php echo $watch_id;?>"></br>

				</br><b><label for="watch_name">Watch Name</label>
				<input type="text" name="watch_name" value="<?php echo $watch_name;?>"></br>

				</br><label for="price">Price</label>
				<input type="number" name="price" value="<?php echo $price;?>"></br>

				</br><label for="brand">Brand</label>
				<input type="text" name="brand" value="<?php echo $brand;?>"></br>

				</br><label for="quantity">Quantity</label>
				<input type="text" name="quantity" value="<?php echo $quantity;?>"></br>

				</br><label for="total">Total</label>
				<input type="text" name="total" value="<?php echo $total;?>"></b></br>-->
			
			</br><button type="submit" name="btnsubmit" value="Save"  alert.('Watch information is updated');>Update</button></br>
			

	
	</div>
	
</td>
</tr>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>View Order</title>
	<link rel="stylesheet" type="text/css" href="css/productentry.css">
</head>
<body>
<form action="vieworder.php" method="post" enctype="multipart/form-data">
	<?php
		include("connect.php");
		
		if(isset($_POST['btnsubmit']))
	    {
	    	$orders_id=$_POST['orders_id'];
	    	$watch_id=$_POST['watch_id'];
			$watch_name=$_POST['watch_name'];
			$price=$_POST['price'];
			$brand=$_POST['brand'];
			$quantity=$_POST['quantity'];
			$total=$_POST['total'];
		

			$query="insert into order_detail(orders_id,watch_id,watch_name,price,brand,quantity,total) values ('$orders_id''$watch_id''$watch_name','$price','$brand','$quantity','$total')";
			$res=mysqli_query($con,$query) or die(mysqli_error($con));
        ?>
		
    	
       
			<div class="catdisplay" align="center">
			<h4>Product List</h4>
			<table border="1" align="center" width="90%">
				<th width="3%">Order ID</th>
				<th width="3%">Watch ID</th>
				<th width="15%">Watch Name</th>
				<th width="5%">Price</th>
				<th width="6%">Brand</th>
				<th width="4%">Quantity</th>
				<th width="3%">Total</th>
				

				
				<?php
					
					$query="select * from order_detail";
					$result=mysqli_query($con,$query);
					while($row=mysqli_fetch_row($result)){
				?>
				<tr>
				<td><?php echo $row[0];?></td>
				<td><?php echo $row[1];?></td>
				<td><?php echo $row[2];?></td>
				<td><?php echo $row[3];?></td>
				<td><?php echo $row[4];?></td>
				<td><?php echo $row[5];?></td>
				<td><?php echo $row[6];?></td>
				
				
				</tr>
			   <?php }
			} else {?>
			</table>
			</div>

					<div class="catdisplay" align="center">
			<h4>Product List</h4>
			<table border="1" align="center" width="90%">
				<th width="3%">Order ID</th>
				<th width="3%">Watch ID</th>
				<th width="15%">Watch Name</th>
				<th width="5%">Price</th>
				<th width="6%">Brand</th>
				<th width="4%">Quantity</th>
				<th width="3%">Total</th>
				
				<?php
					
					$query="select * from order_detail";
					$result=mysqli_query($con,$query);
					while($row=mysqli_fetch_row($result)){

				?>
				<tr>
				<td><?php echo $row[0];?></td>
				<td><?php echo $row[1];?></td>
				<td><?php echo $row[2];?></td>
				<td><?php echo $row[3];?></td>
				<td><?php echo $row[4];?></td>
				<td><?php echo $row[5];?></td>
				<td><?php echo $row[6];?></td>
				
				</tr>
		   
			   <?php } }?>
			</table>
		</div>
	
</form>
</body></html>
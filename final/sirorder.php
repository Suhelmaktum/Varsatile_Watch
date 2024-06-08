
<?php
session_start();
if(isset($_POST['Order'])){

	if(isset($_SESSION['user']))
	{
	  header("location:order.php");
	}
	else
	{
	  header("location:LOGIN.PHP");
	} 
}

?>
			
<?php 
	{
echo "</ul>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Continue to Shopping</title>
	<link rel="stylesheet" type="text/css" href="checkout.css">
	<link rel="stylesheet" type="text/css" href="bill.css">
</head>

<body align="center">
<table width="75%" border="10" bgcolor="white" cellspacing="5" cellspacing="5" align="center">
<tr align="center" bgcolor="sky blue" border="1">
    <td><center><b><h2 style="margin-top: 15px">ONLINE WATCH SHOPPING<h2></b></center>
    </td>
</tr>
    <tr>
    <td align="center">
<form action="order.php" method="POST">
    
	<?php
	
		include("connect.php");
		
			
        ?>

<div class="catdisplay" align="center">
			
			<table border="1" align="center">
								
				<?php
					include("connect.php");
					$query="select * from customer where email='$_SESSION[user]'";
					$result=mysqli_query($con,$query);
					$row=mysqli_fetch_row($result);

					$user_id=$row[0];
					
					if(isset($_POST['Order'])){

					$q="insert into order_master(customer_id,date) values($user_id,'curdate()')";
					$res=mysqli_query($con,$q) or die(mysqli_error($con));
					//mysqli_close($con);
					//include("connection.php");
					
					header("location:orderdetails.php?uid=$user_id");		

				}
?>				<h4 align="center"><b>Customer Name : </b><?php echo $row[1];?><br>
					
				<b>Address : </b><?php echo $row[4];?></h4>
				

<?php 


				?>
						
				
		</div>
	</body>
	</html>

<tr><div class="catdisplay" align="center">
			
			<table border="2" bgcolor="white">
	<th>Sr No</th>
	<th>Watch Name</th>
	<th>Price</th>
	<th>Brand</th>
	<th>Quantity</th>
	<th>Total</th>
	
</tr>
<?php

	if(!empty($_SESSION['shopping_cart'])){

		$total=0;
		$cnt=1;
		foreach ($_SESSION['shopping_cart'] as $key => $value) {
		 
		?>
		<tr>
		
			<td><?php echo $cnt;?></td>
			<td><?php echo $value['watch_name'];?></td>
			<td><?php echo $value['price'];?></td>
			<td><?php echo $value['brand'];?></td>
			<td><?php echo $value['quantity'];?></td>
			<td width="27%" align="center"><?php echo number_format($value['price']*$value['quantity'],2);?></td>
		</tr>
		<?php
	$total=$total+ ($value['price']*$value['quantity']);
	$cnt++;
	}
?>
		<tr>
			<td colspan="7" align="right"><b>Total Amount:<?php echo number_format($total,2);?>/-</td></b>
				</tr>
		
	<?php }

	?>
	
<tr>
		
</tr>	
</table>

	</form>
</div>
</body>
</html>
</section>

<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
if(isset($_POST['checkout'])){

	if(isset($_SESSION['user']))
	{
	  header("location:order.php");
	}
	else
	{
	  header("location:Order.php");
	} 
}

?>



	<section class="banner-bottom">
		<div class="container">
			
			
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
</head>
<body>
<table border="1" align="center">
<tr><th>watch_id</th>
	<th>watch_name</th>
	<th>price</th>
	<th>Brand</th>
	<th>quantity</th>
	<th>total</th>
	<th>action</th>
</tr>
<?php
	if(!empty($_SESSION['shopping_cart'])){

		$total=0;
		foreach ($_SESSION['shopping_cart'] as $key => $value) {
			# code...
		?>
		<tr>
			<td><?php echo $value['watch_id'];?></td>
			<td><?php echo $value['watch_name'];?></td>
			<td><?php echo $value['price'];?></td>
			<td><?php echo $value['brand'];?></td>
			<td><?php echo $value['quantity'];?></td>
			<td><?php echo number_format($value['price']*$value['quantity'],2);?></td>
			<td><a href="checkout.php?action=remove?&id=<?php echo $value['watch_id'];?>">Delete</a></td>

		</tr>
<?php
	$total=$total+ ($value['price']*$value['quantity']);
	}

?>
		<tr>
			<td colspan="6" align="right">Total Amount:<?php echo number_format($total,2);?>&#8377;</td>
				</tr>
		
	<?php }

	?>
	
<tr>
	
</tr>	
</table>
<div class="cnt"><a href="demo1.php"><input type="button" name="Continue to Shopping" class="button" value="Continue to Shopping..!"></a><br><br><form action="order.php" method="POST"><input type="submit" name="Order" class="button" value="Buy Now"></form>
</div>

</body>
</html>
</section>

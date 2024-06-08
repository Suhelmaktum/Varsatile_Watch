
<?php
session_start();
if(isset($_GET["action"])){

		 
	foreach ($_SESSION['shopping_cart'] as $keys => $values) {
		# code...

		if($values['watch_id']==$_GET['id']){
		unset($_SESSION['shopping_cart'][$keys]);
		//echo "<script>alert('Item removed');</script>";
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
		header("location:check.php");
		}

	
}
}

if(isset($_POST['check'])){

	if(isset($_SESSION['user']))
	{
	  header("location:order.php");
	}
	else
	{
	  header("location:LOGIN.PHP");
	} 
}
if(isset($_POST['add_to_cart'])) {

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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="checkout.css">
</head>
<body>
	<style type="text/css">
	body{

	background: url('beautiful-watch-wallpaper-for-computer.jpg');
	background-size: cover;
	background-size: 

  
  height: 500px;
  background-position: center;
  background-repeat: no-repeat;
  
  position: relative;
}

.button {
  background-color:  #0404B4; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #0404B4;
}

.button1:hover {
  background-color: #0404B4;
  color: white;
}


table#t01 tr {
  background-color: #0404B4;
  color: white;
}
table#t02 tr {
  background-color: white;
  color: black;
  text-align: center;
  border-color: gray;
</style>
<table width="60%" border="2" align="center"
	id="t01">
<tr align="center">
<td><h2>Checkout</h2></td>
</tr>
</table>
<table align="center" cellpadding="10" border="2" width="60%" id="t02">



<tr>
	<td>

<table class="table table-bordered" align="center">
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
			<td><a href="check.php?action=remove?&id=<?php echo $value['watch_id'];?>">Delete</a></td>

		</tr>
<?php
	$total=$total+ ($value['price']*$value['quantity']);
	}

?>
		<tr>
			<td colspan="6" align="right">Total Amount:<?php echo number_format($total,2);?>/-</td>
				</tr>
		
	<?php }

	?>
	
<tr>
	
</tr>	
</table>



<div class="cnt"><a href="demo.php"><input type="button" name="Continue to Shopping" class="button button1" value="Continue to Shopping..!"></a><br><form action="order.php" method="POST"><a href="order.php"></a><input type="submit" name="Order" class="button button1" value="Buy Now"></form>
</div>

	</td>	
</tr>

</table>




</body>
</html>
</section>

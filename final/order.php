
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="checkout.css">
	<link rel="stylesheet" type="text/css" href="bill.css">
</head>

<body align="center">
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
  background-color: #0404B4; /* Green */
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


h2{
	color: white;
}

table#t01 tr {
  background-color: black;
  color: white;
}
table#t02 tr {
  background-color: white;
  color: black;
  text-align: center;
  border-color: gray;

</style>



<table width="75%" border="10" bgcolor="white" cellspacing="5" cellspacing="5" align="center">
<tr align="center" bgcolor="#0404B4" border="1">
    <td><center><b><h2><u>ONLINE WATCH SHOPPING</u><h2></b></center>
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

					$q="insert into order_master(customer_id,date) values($user_id,curdate())";
					$res=mysqli_query($con,$q) or die(mysqli_error($con));
					//mysqli_close($con);
					//include("connection.php");
					
					header("location:orderdetails.php?uid=$user_id");		

				}
					
				if (isset($_SESSION['shopping_cart'])) {
					# code...
				
					if(!empty($_SESSION['shopping_cart']))
					{

				foreach ($_SESSION['shopping_cart'] as $key => $value) 
				{
						//$total=number_format($value['price']*$value['quantity'],2);
					$total=$value['price']*$value['quantity'];
						
				
						

				 $insquery="insert into order_detail(orders_id,watch_id,watch_name,price,brand,quantity,total) values('$_GET[oid]','$value[watch_id]','$value[watch_name]','$value[price]','$value[brand]','$value[quantity]','$total')";

				$insres=mysqli_query($con,$insquery) or die(mysqli_error($con));


			}
		
		}
	}
		$q="delete from order_detail where orders_id=0";
				$res1=mysqli_query($con,$q) or die(mysqli_error($con));
				?>
						
				<h6 align="center"><b>Customer Name:</b><?php echo $row[1];?><br>
				
				<b>Address:</b><?php echo $row[4];?></h4>
			
		</div>
		<br>
	</body>
	</html>

<tr><div class="catdisplay" align="center">
			
			<table class="table table-bordered">
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
	$total=$total + ($value['price'] * $value['quantity']);
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
<br>
	<a href="insert.php"><button type="button" class="button button1">UPI PAYMENT</button></a>
	<BR>
	<a href="cod.php"><button type="button" class="button button1">CASH ON DELIVERY</button></a>


	</br>

<a href="demo.php"><button type="button" class="button button1">Back to home</button></a>

	</form>
</div>
</body>
</html>
</section>

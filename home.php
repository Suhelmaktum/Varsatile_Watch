
<?php
session_start();

include("connect.php");

if(isset($_POST['add_to_cart'])){
	
	if(isset($_SESSION['shopping_cart'])){
		$item_array_id=array_column($_SESSION['shopping_cart'],'watch_id');
		if(!in_array($_GET['watch_id'], $item_array_id)){
			$count=count($_SESSION['shopping_cart']);
			$item_array=array(
			'watch_id' => $_GET['watch_id'],
			'watch_name' => $_POST['watch_name'],
			'image' => $_POST['image'],
			'price' => $_POST['price'],	
			'quantity' => $_POST['qty']);

			$_SESSION['shopping_cart'][$count]=$item_array;	
		}
		else
		{
			echo "<script>alert('Item already added');</script>";
			echo "<script>window.location('home.php');</script>";
			//header("location:home.php");
		}
	}
	else
	{
		$item_array= array(
			'watch_id' => $_GET['id'],
			'watch_name' => $_POST['watch_name'],
			'image' => $_POST['image'],
			'price' => $_POST['price'],	
			'quantity' => $_POST['qty']	
			);
	 		
	 		$_SESSION['shopping_cart'][0]=$item_array;
	}


}

if(isset($_GET["action"])){
	
	
	foreach ($_SESSION['shopping_cart'] as $keys => $values) {
		# code...
		 
		if($values['watch_id']==$_GET['id']){
		unset($_SESSION['shopping_cart'][$keys]);
		//echo "<script>alert('Item removed');</script>";
		header("location:home.php");
		}

	
}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<?php 

$query="select * from watch";
$result=mysqli_query($con,$query);
echo "<ul class='products'>";
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result)){?>

<li class="products">
	<form method="post" action="home.php?watch_id=<?php echo $row['watch_id'];?>">
		<ul><div ><?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="30%",align="center';?></div>
	     <div class="product-content"><h3><?php echo $row['watch_name'];?></h3></div>
		<div class="product-info">Price:<?php echo $row['price'];?>/-</div><br>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="qty" value="1">
		<input type="hidden" name="watch_name" value="<?php echo $row['watch_name'];?>"><br>
		<input type="hidden" name="image" value="<?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="30%",align="center';?>"><br>
		<input type="hidden" name="price" value="<?php echo $row['price'];?>"><br>
	    <input type="submit" name="add_to_cart" class="button" value="Add to Cart"><br>
	 
</li>
</ul>

	</form>
<?php 
	}
echo "</ul>";
}

?>
<table border="1" align="center">
<tr>	<th>watch id</th>
	<th>watch name</th>
	<th>price</th>
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
			<td><?php echo $value['quantity'];?></td>
			<td><?php echo number_format($value['price']*$value['quantity'],2);?></td>
			<td><a href="home.php?action=remove?&id=<?php echo $value['watch_id'];?>">Delete</a></td>

		</tr>
<?php
	$total=$total+ ($value['price']*$value['quantity']);
	}

?>
		<tr>
			<td colspan="3" align="right"><?php echo number_format($total,2);?></td>
		</tr>
	<?php }

	?>

<tr>
	
</tr>	
</table>

</body>
</html>
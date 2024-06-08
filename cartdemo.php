<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet"> 
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	
<?php
session_start();
//$_SESSION['user'];
include("connect.php");

if(isset($_POST['add_to_cart'])){
		$watch_id=$_GET['watch_id'];

		$query="select * from watch where watch_id=watch_id";

		$result=mysqli_query($con,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$bookByisbn[] = $row;
		}
	if(isset($_SESSION['shopping_cart'])){
		$watch_id=$_GET['watch_id'];
		
		$item_array_id=array_column($_SESSION['shopping_cart'], 'watch_id');
		if(!in_array($_GET['watch_id'], $item_array_id)){
			$count=count($_SESSION['shopping_cart']);
			/*$item_array=array(
			'isbn' => $_GET['isbn'],
			'name' => $_POST['title'],
			'price' => $_POST['price'],	
			'quantity' => $_POST['qty']	 );*/

			$item_array = array($bookByisbn[0]["watch_id"]=>array('watch_id' => $_GET['watch_id'],
			'watch_name' => $_POST['watch_name'],
			'price' => $_POST['price'],	
			'quantity' => $_POST['qty']	));

			$_SESSION['shopping_cart']=array_merge($_SESSION['shopping_cart'],$item_array);	
		}
		else
		{
			foreach ($_SESSION['shopping_cart'] as $keys => $values) {
		# code...
		 
			if($values['watch_id']==$_GET['watch_id']){
							$_SESSION["shopping_cart"][$keys]["quantity"] += $_POST["qty"];

	 		
	 		
			}
			}
			
		}
	}
	else
	{
			$item_array = array($bookByisbn[0]["watch_id"]=>array('watch_id' => $_GET['watch_id'],
			'watch_name' => $_POST['watch_name'],
			'price' => $_POST['price'],	
			'quantity' => $_POST['qty']	));
		
			
	 		$_SESSION['shopping_cart']=$item_array;
	}


}

if(isset($_GET["action"])){
	
	
	foreach ($_SESSION['shopping_cart'] as $keys => $values) {
		# code...
		 
		if($values['watch_id']==$_GET['id']){
		unset($_SESSION['shopping_cart'][$keys]);
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
		header("location:harshad.php");
		}

	
}
}


?>


<?php 

$query="select * from watch";
$result=mysqli_query($con,$query);
echo "<ul class='products'>";
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result)){?>

<li class="products">
	<form method="post" action="harshad.php?watch_id=<?php echo $row[0];?>">
		<div class="product-content"><h3><?php echo $row[1];?></h3></div>
	     <div ><?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="500%",align="center">' ;?></div>
	
		<div class="product-info"><?php echo $row['watch_name'];?></div>
		<div class="product-info"><?php echo $row['price'];?></div>
		
		<span>Quantity</span>
		<input type="text" size="2" maxlength="4" name="qty" value="1" />
		<input type="hidden" name="watch_name" value="<?php echo $row['watch_name'];?>">
		<input type="hidden" name="image" value="<?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="500%",align="center';?>">
		<input type="hidden" name="price" value="<?php echo $row['price'];?>">
	    <input type="submit" name="add_to_cart" class="button" value="SHOP NOW">
	 
</li>

	</form>
<?php 
	}
echo "</ul>";
}

?>



<div class="chiwda">
	
	<table border="1" align="center">
<tr>	<th>watch id</th>
	<th>watch name</th>
	<th>price</th>
	<th>quantity</th>
	<th>total</th>
	<th>action</th>
</tr>
</div>
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
			<td><a href="cartdemo.php?action=remove?&id=<?php echo $value['watch_id'];?>">Delete</a></td>
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
	
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
			'price' => $_POST['price']);

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
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
		<ul><div class="product-thumb"><?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="30%",align="center';?></div>
	     <div class="product-content"><h3><?php echo $row['watch_name'];?></h3></div>
		<div class="product-info">Price:<?php echo $row['price'];?>/-</div><br>
		<input type="hidden" name="watch_name" value="<?php echo $row['watch_name'];?>"><br>
		<input type="hidden" name="image" value="<?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="30%",align="center';?>"><br>
		<input type="hidden" name="price" value="<?php echo $row['price'];?>"><br>
	    <a href="home.php"><input type="submit" name="add_to_cart" class="button" value="Add to Cart"></a><br>
	 
</li>
</ul>

	</form>
<?php 
	}
echo "</ul>";
}

?>

</body>
</html>
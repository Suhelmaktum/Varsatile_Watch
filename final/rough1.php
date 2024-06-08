<?php
session_start();
?>

<?php
//$_SESSION['user'];
include("connect.php");

if(isset($_POST['add_to_cart'])){
		
		$watch_id=$_GET['id'];
		
		$query="select * from watch where watch_id=$watch_id";

		$result=mysqli_query($con,$query) or mysqli_error($con);

		while($row=mysqli_fetch_assoc($result)) {
			$bookByisbn[] = $row;
		}
	if(isset($_SESSION['shopping_cart'])){
		$watch_id=$_GET['id'];
		
		$item_array_id=array_column($_SESSION['shopping_cart'],'watch_id');
		if(!in_array($_GET['id'], $item_array_id)){
			$count=count($_SESSION['shopping_cart']);
			

			$item_array = array($bookByisbn[0]["watch_id"]=>array('watch_id' => $_GET['id'],
			'watch_name' => $_POST['watch_name'],
			'price' => $_POST['price'],	
			'brand'=> $_POST['brand'],
			'quantity' => $_POST['qty']	));

			$_SESSION['shopping_cart']=array_merge($_SESSION['shopping_cart'],$item_array);	
		}
		else
		{
			foreach ($_SESSION['shopping_cart'] as $keys => $values) {
		# code...
		 
			if($values['watch_id']==$_GET['id']){
				
			$_SESSION["shopping_cart"][$keys]["quantity"] += $_POST["qty"];

	 		
	 		
			}
			}
			

		}
	}
	else
	{
			$item_array = array($bookByisbn[0]["watch_id"]=>array('watch_id' => $_GET['id'],
			'watch_name' => $_POST['watch_name'],
			'price' => $_POST['price'],
			'brand'=>$_POST['brand'],
			'quantity' => $_POST['qty']	));
		
	 		
	 		$_SESSION['shopping_cart']=$item_array;
	}


}

if(isset($_GET["action"])){
	
	
	foreach ($_SESSION['shopping_cart'] as $keys => $values) {
		# code...
		 
		if($values['watch_id']==$_GET['id']){
		unset($_SESSION['shopping_cart'][$keys]);
		//echo "<script>alert('Item removed');</script>";
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
		header("location:rough1.php");
		}

	
}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Information</title>
	<style>
		
ul.products li {
	display: inline-block;
	max-width: 200px;
	padding: 20px;
	background-color: white;
	margin: 10px;
	border: 1px solid #EAEAEA;  
	color: #3D3D3D;
	list-style: none;
}
ul.products li h3 {
	margin: -10px -10px 10px -10px
	padding: 5px;
	text-align: center;
	background-color: lightgray;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 1.1em;
	color: #5A5A5A;
}
ul.products li fieldset {
	border: none;
	padding: 5px 5px 5px 0px;
	margin: 0;
}
ul.products li fieldset label{
	display:block;
	margin-bottom: 4px;
}
ul.products li fieldset label span{
	width: 80px;
	float: left;
}
ul.products li fieldset label select{
	min-width: 30px;
}

.product-thumb{
	text-align:center;
}
.product-desc {
	font-style: italic;
	
	margin-bottom: 4px;
	height: 40px;
	overflow: hidden;
	margin-top: 5px;
}
.product-content{
	color:black;
	height: 80px;
	text-align: center;
}
.product-content1{
	color:black;
	margin-top: 1px;
	text-align: left;
}
.product-info{
	color:black;
	font-height: 80px;	
}
table#t01 tr {
  background-color: black;
  color: white;
}



	</style>
</head>

<body style="background-image: url('Photography-Wallpapers-And-Backgrounds-1.jpg');">
	<a href="demo.php"><input type="button" name="Back To Page" class="button" value="Back To Page"></a>
	<?php
//$_SESSION['user'];
include("connect.php");
		$watch_id=$_GET['id'];
		


$query="select * from watch where watch_id=$watch_id";
$result=mysqli_query($con,$query);
echo "<ul class='products'>";
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result)){?>

	<table width="60%" border="2" align="center"
	id="t01">
<tr align="center">
<td><h1>Detail Information</h1></td>
</tr>
</table>
	<table align="center" cellspacing="50" cellpadding="10" border="3" width="60%" id="t02" style="background-color:#D8D8D8;">



<tr>
	<td width="30%" style="background-color: white;">

		<li class="products" align="right">
	<form method="post" action="rough1.php?id=<?php echo $row['watch_id'];?>&name=<?php echo $row['brand'];?> & cat=<?php echo $row['category'];?>">
		<ul>
		<center><div class="product-content"><h3><?php echo $row['watch_name'];?></h3></div></center>
			<a href="rough1.php?watch_id=<?php echo $row['watch_id'];?>"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row[2]).'" height="60%",align="center">';?></div></a>
			<br><br>
		</ul>
	</form>
</li>


	</td>



	<td style="text-align: top; background-color: white;">

		<div class="product-info">Price : <?php echo $row['price'];?>/-</div>
		<div class="product-info">Brand : <?php echo $row['brand'];?></div>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="qty" value="1" /><br><br>

		<input type="hidden" name="watch_name" value="<?php echo $row['watch_name'];?>">
		<input type="hidden" name="price" value="<?php echo $row['price'];?>">
		<input type="hidden" name="brand" value="<?php echo $row['brand'];?>">
	    <input type="submit" name="add_to_cart" class="button" value="Add to Cart"
	    			style="	background-color: #39b3d7;
	    		min-width: 100px;
	    		color: #FFF;
	    		font: 15px/15px Arial, Helvetica, sans-serif;
	    		min-height: 30px;
	    		text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.26);
	    		border-radius: 3px;">
	    <a href="check.php"><input type="button" name="check" class="button" value="Proceed to Checkout"
	    			style="	background-color: #39b3d7;
	    		min-width: 100px;
	    		color: #FFF;
	    		font: 15px/15px Arial, Helvetica, sans-serif;
	    		min-height: 30px;
	    		text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.26);
	    		border-radius: 3px;"></a>
	 
	</td>
</tr>
</table>

<?php 
	}
echo "</ul>";
}

?>
</body>
</html>
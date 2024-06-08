<?php
//session_start();
session_start();
if(isset($_SESSION['user']))
{
	$uid=$_SESSION['user'];
}
else
{	$uid="";
}

?>
<?php
//$_SESSION['user'];
include("connect.php");

if(isset($_POST['add_to_cart'])){
		$watch_id=$_GET['id'];

		$query="select * from watch where watch_id=$watch_id";

		$result=mysqli_query($con,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$bookByisbn[] = $row;
		}
	if(isset($_SESSION['shopping_cart'])){
		$watch_id=$_GET['id'];
		
		$item_array_id=array_column($_SESSION['shopping_cart'], 'watch_id');
		if(!in_array($_GET['id'], $item_array_id)){
			$count=count($_SESSION['shopping_cart']);


			$item_array = array($bookByisbn[0]["watch_id"]=>array('watch_id' => $_GET['id'],
			'watch_name' => $_POST['watch_name'],
			'price' => $_POST['price'],	
			'brand'=> $_POST['brand'],
			'quantity' => $_POST['qty'] ));

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
			'brand'=> $_POST['brand'],
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
		header("location:single.php");
		}

	
}
}
			
?>
<style>


form{
	margin-top: 50px;
	height: 400px;
	width: 400px; 
}

.product-content{

	height: 40px;
	text-align:;
	font-size: 25px;
	font-style: 
}

.product-info 
{

	font-size: 20px;
}

span{

	font-size: 20px;
}

input{

	font-size: 20px;
}

.cnt input{

	font-size: 20px; 
	text-align: center;
}
		ul.products {
	padding: 0;
	margin: 0;
	max-width: 1100px;
	margin-left: 10px;
	margin-right: auto;
	margin-top: 10px;
}
ul.products li {
	display: inline-block;
	max-width: 600px;
	padding: 20px 30px;
	background-color: #FFFFFF;
	margin: 10px;
	border: 1px solid #EAEAEA;  
	color: #3D3D3D;
	list-style: none;
}
ul.products li h3 {
	margin: -10px -10px 10px -10px
	padding: 5px;
	text-align: center;
	background-color: #F5F5F5;
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
	min-width: 100px;
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
	</style>
							
<?php
$watch_id=$_GET['watch_id'];

$query="select * from watch where watch_id=$watch_id";
$result=mysqli_query($con,$query);
echo "<ul class='products'>";

if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){?>
	
	<li class="products" align="center">
	<form method="post" action="single.php?id=<?php echo $row['watch_id'];?>&name=<?php echo $row['brand'];?> & cat=<?php echo $row['category'];?>">
		<div class="product-content"><h3><?php echo $row['watch_name'];?></h3></div>
		<center><div class="product-thumb"><a href="info.php?id=<?php echo $row['watch_id'];?>"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row[2]).'" height="30%" ,align="center">' ;?></div></a>
		<div class="product-info">Price:<?php echo $row['price'];?>&#8377;</div>
		<div class="product-info">brand:<?php echo $row['brand'];?>&#8377;</div>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="qty" value="1" /><br>

		<input type="hidden" name="watch_name" value="<?php echo $row['watch_name'];?>">
		<input type="hidden" name="price" value="<?php echo $row['price'];?>">
		<input type="hidden" name="brand" value="<?php echo $row['brand'];?>"><br>
	   
	 <input type="submit" name="add_to_cart" class="btn" value="Add to Cart" style="display: inline;
	 																			background-color: #39b3d7;
	 																			min-width: 100px;
	 																			color: #FFF;
	 																			font: 15px/15px Arial, Helvetica, sans-serif;
	 																			min-height: 30px;
	 																			text-shadow: 1px 1px 1px rgba(0,0,0,0.26);
	 																			border-radius: 3px;">
	 	<a href="check.php" style="color: skyblue;"><input type="button" name="check" class="btn" value="Proceed to Checkout" 
	 		style="display: inline;
	 			   background-color: #39b3d7;
	 			   min-width: 100px;
	 			   color: #FFF;
	 			   font: 15px/15px Arial, Helvetica, sans-serif;
	 				min-height: 30px;
	 			text-shadow: 1px 1px 1px rgba(0,0,0,0.26);
	 			border-radius: 3px;"></a>
	 																			
	 	
</li>

	</form>

<?php 
	}
echo "</ul>";
}

?>

</body>
</html>


































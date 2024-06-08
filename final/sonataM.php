<!DOCTYPE html>
<html>
<head>
<title>Luxury Watches A Ecommerce Category Flat Bootstarp Resposive Website Template | Single :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
<script src="js/jquery-1.11.0.min.js"></script>
<!--Custom-Theme-files-->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--start-menu-->
<script src="js/simpleCart.min.js"> </script>
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
<!--dropdown-->
<script src="js/jquery.easydropdown.js"></script>	
<script type="text/javascript">
	$(function() {
	
	    var menu_ul = $('.menu_drop > li > ul'),
	           menu_a  = $('.menu_drop > li > a');
	    
	    menu_ul.hide();
	
	    menu_a.click(function(e) {
	        e.preventDefault();
	        if(!$(this).hasClass('active')) {
	            menu_a.removeClass('active');
	            menu_ul.filter(':visible').slideUp('normal');
	            $(this).addClass('active').next().stop(true,true).slideDown('normal');
	        } else {
	            $(this).removeClass('active');
	            $(this).next().stop(true,true).slideUp('normal');
	        }
	    });
	
	});
</script>
</head>
<body style="background-image: url('');">
	<!--start-logo-->
	<style type="text/css">
		.glow{
  text-align :center;
  shape-outside: 30px;
  font-size: 50px;
  color: white;
  text-align: center;
  -webkit-animation: glow 1s ease-in-out infinite alternate;
  -moz-animation: glow 1s ease-in-out infinite alternate;
  animation: glow 1s ease-in-out infinite alternate;
  line-height: 50pt;
}
@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
  }
  
  to {
    text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
  }

	</style>
	<a href="check.php">
	<p align="right"><img src="images/cart-3.png" alt="" /><span style="color: black;">Check Shopping</span></p></a>

	<a href="demo.php"><input type="button" name="Back To Homepage" class="button" value="Home"></a>
	<div class="logo" >
		<a href="demo.php"><h1 style="color: white;" class="glow">Online Watch Shopping</h1></a>
	</div>
</body>
<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
?>

<?php
//$_SESSION['user'];
include("connect.php");

if(isset($_POST['add_to_cart'])){
		
		$watch_id=$_GET['id'];
		
		$query="select watch_id,watch_name,price,category,information,brand from watch where watch_id=$watch_id";

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
		header("location:sonataM.php");
		}

	
}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>

	
<style type="text/css">
	body{

	background: url('60.jpg');
	background-size: cover;
	background-size: 

  
  height: 500px;
  background-position: center;
  background-repeat: no-repeat;
  
  position: relative;
}

ul.products{
padding: 0;
	margin: 0;
	max-width: 1400px;
	margin-left: 10px;
	margin-right: auto;
	margin-top: 10px;
	
}
ul.products li {
	display: inline-block;
	max-width:250px;
	padding: 10px 10px;
	background-color: white;
	margin: 10px;
	border: 1px solid #EAEAEA;  
	color: #3D3D3D;
	list-style: none;
}
}

</style>
<?php 

$query="select * from watch where brand='$_GET[name]' and  category='$_GET[cat]'";
$result=mysqli_query($con,$query);
echo "<ul class='products'>";
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result)){?>

<li class="products" align="right">
	<form method="post" action="sonataM.php?id=<?php echo $row['watch_id'];?>&name=<?php echo $row['brand'];?> & cat=<?php echo $row['category'];?>">
		<ul>
		<center><div class="product-content"><h3><?php echo $row['watch_name'];?></h3></div>
			<a href="infohome.php?watch_id=<?php echo $row['watch_id'];?>"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row[2]).'" height="10%",align="center">';?></div></a>
			<br><br>
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

	    		<?php
	    		if (isset($_POST['add_to_cart'])) {
	    			# code...
	    		?>

	    <a href="check.php"><input type="button" name="check" class="button" value="Proceed to Checkout"
	    			style="	background-color: #39b3d7;
	    		min-width: 100px;
	    		color: #FFF;
	    		font: 15px/15px Arial, Helvetica, sans-serif;
	    		min-height: 30px;
	    		text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.26);
	    		border-radius: 3px;"></a>
	 

	    		<?php
	    	}
	    	?>
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


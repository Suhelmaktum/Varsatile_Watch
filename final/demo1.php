<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
		header("location:demo1.php");
		}

	
}
}


?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style3.css">
<title>Online Watch Shopping</title>
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
</head>
<body> 
		<!--top-header-->
	<div class="top-header">
		<div class="container">
			<div class="top-header-main">
				<div class="col-md-6 top-header-left">
					<div class="drop">
						
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 top-header-left">
					<div class="cart box_1">
						<a href=>
							 <div class="total">
								<span class="simpleCart_total"></span></div>
								<img src="images/cart-1.png" alt="" />
								<?php
									if(isset($_SESSION['user'])){
									$count=count($_SESSION['user']);
									echo $count;
								}
								?>
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--top-header-->
	<!--start-logo-->
	<div class="logo">
		<a href="demo1.php"><h1>Online Watch Shopping</h1></a>
	</div>
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-md-9 header-left">
				<div class="top-nav">
					<ul class="memenu skyblue"><li class="active"><a href="demo1.php">Home</a></li>
						<li class="grid"><a>Men</a>
							<div class="mepanel">
								<div class="row">
									<div class="col1 me-one">
										<ul>
											<li><a href="titanM.php">Titan</a></li>
											<li><a href="citizenM.php">Citizen</a></li>
											<li><a href="fastrackM.php">Fastrack</a></li>
											<li><a href="sonataM.php">Sonata</a></li>
											<li><a href="fossilM.php">Fossil</a></li>
										</ul>
									</div>
										</div>
							</div>
						</li>
						<li class="grid"><a>Women</a>
							<div class="mepanel">
								<div class="row">
									<div class="col1 me-one">
										<ul>

											<li><a href="titanF.php">Titan</a></li>
											<li><a href="citizenF.php">Citizen</a></li>
											<li><a href="fastrackF.php">Fastrack</a></li>
											<li><a href="sonataF.php">Sonata</a></li>
											<li><a href="fossilF.php">Fossil</a></li>
								</div>
							
						
						<li><a align="left" href="">Login/Resister</a>
						
						</li>
						<li class="nav-item">
						<a class="nav-link" "href=""=>Log Out</a>
						<a class="nav-link" href="">Contact</a>
						</li>
					
			<li>		
				<div class="search-bar" style="width: 150px;">
					<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
					<input type="submit" value="">

				</div>
			</li>
				</ul>
				<div class="clearfix"> </div>
				</div>
				</div>
				
				
			</div>
			 

			<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--bottom-header-->
	<!--banner-starts-->
	<div class="bnr" id="home">
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider4" style="height: 300px;" >
			    <li>
					<img src="images/bnr-1.jpg" alt=""/ style="height: 400px;">
				</li>
				<li>
					<img src="images/bnr-2.jpg" alt=""/ style="height: 325px;">
				</li>
				<li>
					<img src="images/bnr-3.jpg" alt=""/ style="height: 325px;">
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--banner-ends--> 
	<!--Slider-Starts-Here-->
				<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			<!--End-slider-script-->
			</div>
		</div>
	</div>
	<link rel="stylesheet" type="text/css" href="style3.css">
<?php 

$query="select * from watch";
$result=mysqli_query($con,$query);
echo "<ul class='products'>";
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result)){?>

<li class="products" align="right">
	<form method="post" action="demo1.php?id=<?php echo $row['watch_id'];?>">
		<center><div class="product-thumb"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row[2]).'" height="10%",height="10%" ,align="center">' ;?></div>
		<div class="product-content"><h3><?php echo $row['watch_id'];?></h3></div>
	    <div class="product-content"><h3><?php echo $row['watch_name'];?></h3></div>
		<div class="product-info">Price:<?php echo $row['price'];?>&#8377;</div>
		<div class="product-info">weight:<?php echo $row['brand'];?></div>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="qty" value="1" />

		<input type="hidden" name="watch_name" value="<?php echo $row['watch_name'];?>">
		<input type="hidden" name="price" value="<?php echo $row['price'];?>">
		<input type="hidden" name="brand" value="<?php echo $row['brand'];?>">
		<br><br>
	    <input type="submit" name="add_to_cart" class="button" value="Add to Cart"></center>
	 
</li>

	</form>

<?php 
	}
echo "</ul>";
}

?>
<table border="1" align="center">
<tr><th>watch_id</th>
	<th>watch_name</th>
	<th>price</th>
	<th>brand</th>
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
			<td><a href="demo1.php?action=remove?&id=<?php echo $value['watch_id'];?>">Delete</a></td>

		</tr>
<?php
	$total=$total+ ($value['price']*$value['quantity']);
	}

?>
		<tr>
			<td colspan="4" align="right">Total Amount:<?php echo number_format($total,2);?>&#8377;</td>
			<td colspan="2"><a href=><input type="button" name="" class="button" value="Proceed to Checkout"></a></td>
		</tr>
	<?php }

	?>

<tr>
	
</tr>	
</table>

</body>
</html>

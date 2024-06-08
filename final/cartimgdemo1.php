
				
<?php
session_start();
//$_SESSION['user'];
include("connect.php");

if(isset($_SESSION['user']))
{
	$uid=$_SESSION['user'];
}
else
{	$uid="";
}

?>
<?php

if(isset($_POST['add_to_cart'])){
		$watch_id=$_GET['watch_id'];

		$query="select * from watch where watch_id=$watch_id";

		$result=mysqli_query($con,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$bookByisbn[] = $row;
		}
	if(isset($_SESSION['shopping_cart'])){
		$watch_id=$_GET['watch_id'];
		
		$item_array_id=array_column($_SESSION['shopping_cart'], 'watch_id');
		if(!in_array($_GET['watch_id'], $item_array_id)){
			$count=count($_SESSION['shopping_cart']);

			$item_array = array($bookByisbn[0]["watch_id"]=>array('watch_id' => $_GET['watch_id'],
			'watch_name' => $_POST['watch_name'],
			'price' => $_POST['price'],	
			'brand' => $_POST['brand'],	
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
			'brand' => $_POST['brand'],		
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
		header("location:cartimgdemo1.php");
		}

	
}
}


?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style3.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
						<a href="check.php">
							 <div class="total">
								<span class="simpleCart_total"></span></div>
								<img src="images/cart-1.png" alt="" />
								<?php
									$count=count($_SESSION['user']);
									echo $count;
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
	<span> Welcome.....! <?php echo $uid?></span>
	<div class="logo">
		<a href="demo.php"><h1>Online Watch Shopping</h1></a>
	</div>
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-md-9 header-left">
				<div class="top-nav">
					<ul class="memenu skyblue"><li class="active"><a href="demo.php">Home</a></li>
						<li class="grid"><a>Men</a>
							<div class="mepanel">
								<div class="row">
									<div class="col1 me-one">
										<ul>
											<li><a href="sonataM.php?watch_name=Titan & category=Men">Titan</a></li>
											<li><a href="sonataM.php?name=Citizen & cat=Men">Citizen</a></li>
											<li><a href="sonataM.php?name=Fastrack & cat=Men">Fastrack</a></li>
											<li><a href="sonataM.php?watch_name=Sonata & category=Men">Sonata</a></li>
											<li><a href="sonataM.php?name=Fossil & cat=Men">Fossil</a></li>
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
											<li><a href="sonataM.php?name=Titan & cat=Women">Titan</a></li>
											<li><a href="sonataM.php?name=Citizen & cat=Women">Citizen</a></li>
											<li><a href="sonataM.php?name=Fastrack & cat=Women">Fastrack</a></li>
											<li><a href="sonataM.php?name=Sonata & cat=Women">Sonata</a></li>
											<li><a href="sonataM.php?name=Fossil & cat=Women">Fossil</a></li>
										</ul>
								</div>
							
						
						<li><a align="left" href="LOGIN.PHP">Login/Resister</a>
						
						</li>
						<li class="nav-item">
						<a class="nav-link" href="logout.php">Log Out</a>
						</li>
					
			<li>		
				<div class="search-bar">
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
			<ul class="rslides" id="slider4" >
			    <li>
					<img src="images/bnr-1.jpg" alt=""/>
				</li>
				<li>
					<img src="images/bnr-2.jpg" alt=""/>
				</li>
				<li>
					<img src="images/bnr-3.jpg" alt=""/>
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
	<!--about-starts-->
	<div class="about"> 
		<div class="container">
			<div class="about-top grid-1">
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="images/abt-1.jpg" alt=""/>
						<figcaption>
							<h2>Nulla maximus nunc</h2>
							<p>In sit amet sapien eros Integer dolore magna aliqua</p>	
						</figcaption>			
					</figure>
				</div>
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="images/abt-2.jpg" alt=""/>
						<figcaption>
							<h4>Mauris erat augue</h4>
							<p>In sit amet sapien eros Integer dolore magna aliqua</p>	
						</figcaption>			
					</figure>
				</div>
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="images/abt-3.jpg" alt=""/>
						<figcaption>
							<h4>Cras elit mauris</h4>
							<p>In sit amet sapien eros Integer dolore magna aliqua</p>	
						</figcaption>			
					</figure>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<style type="text/css">
	body{

	background: url('60.jpg');
	background-size: cover; 
  height: 500px;
  background-position: center;
  background-repeat: no-repeat;
  
  position: relative;
}
</style>

	<!--about-end-->

<?php 

$query="select * from watch";
$result=mysqli_query($con,$query);
echo "<ul class='products'>";
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result)){?>

<li class="products">
	<form method="post" action="cartimgdemo1.php?watch_id=<?php echo $row['watch_id'];?>">
		<ul>
			<div class="product-content"><h3><?php echo $row['watch_name'];?></h3></div>
	<a href="cartimgdemo.php?watch_id=<?php echo $row['watch_id'];?>">	<div class="img-responsive zoom-img" ><?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="30%",align="center"';?>></div>
	</a>		
		<div class="product-info" align="center">Price : <?php echo $row['price'];?>/-</div>
		<div class="product-content"><h3>Brand : <?php echo $row['brand'];?></h3></div>
		<span>Quantity</span>	
		<input type="text" size="2" maxlength="2" name="qty" value="1">
		<input type="hidden" name="watch_name" value="<?php echo $row['watch_name'];?>">
		<input type="hidden" name="image" class="img-responsive zoom-img" value="<?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="30%",align="center"';?>">
		<h4><a class="item_add" href="check.php"><i></i></a> <span class=" item_price">
<input type="hidden" name="price" value="<?php echo $row['price'];?>"></span></h4>
<input type="hidden" name="brand" value="<?php echo $row['brand'];?>">
	    <input type="submit" name="add_to_cart" class="btn" value="Add to Cart" style="display: inline;
	    																			background-color: #39b3d7;
	    																			min-width: 100px;
	    																			color: #FFF;
	    																	font: 15px/15px Arial, Helvetica, sans-serif;
	    																			min-height: 30px;
	    																	text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.26);
	    																		border-radius: 3px;">
	    <style type="text/css">
	    	
	    </style><br></br>
	    <a href="check.php"><input type="button" name="check" class="btn" value="Proceed to Checkout" style="display: inline;
	    																			background-color: #39b3d7;
	    																			min-width: 80px;
	    																			color: #FFF;
	    																	font: 15px/15px Arial, Helvetica, sans-serif;
	    																			min-height: 30px;
	    																	text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.26);
	    																		border-radius: 3px;"></a>
</div>



	 
</li>
</ul>

	</form>

<?php 
	}
echo "</ul>";
}

?>

	<!--product-end-->
	<!--information-starts-->
				
								
	<!--footer-end-->	
</body>
</html>
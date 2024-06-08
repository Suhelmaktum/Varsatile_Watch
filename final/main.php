<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
				
<?php
session_start();
//$_SESSION['user'];
include("connect.php");

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
				//$values['quantity']=$_POST['qty'];	
				//$oldqty=$values['quantity'];
				//unset($_SESSION['shopping_cart'][$keys]);
				//$count=count($_SESSION['shopping_cart']);
	 		
				//$item_array= array(
//isbn' => $_GET['isbn'],
				//'name' => $_POST['title'],
				//'price' => $_POST['price'],	
				//'quantity' => $oldqty+$_POST['qty']	
			///);
			$_SESSION["shopping_cart"][$keys]["quantity"] += $_POST["qty"];

	 		
	 		//$_SESSION['shopping_cart'][$keys]=$item_array;
	
				//set($_SESSION['shopping_cart'][$keys]);
				//echo $values['quantity'];
				//header("location:checkout.php");
			}
			}
			//echo "<script>alert('Item already added');</script>";
			//echo "<script>window.location('home.php');</script>";
			//header("location:home.php");

		}
	}
	else
	{
			$item_array = array($bookByisbn[0]["watch_id"]=>array('watch_id' => $_GET['watch_id'],
			'watch_name' => $_POST['watch_name'],
			'price' => $_POST['price'],	
			'quantity' => $_POST['qty']	));
		
			/*$item_array= array(
			'isbn' => $_GET['isbn'],
			'name' => $_POST['title'],
			'price' => $_POST['price'],	
			'quantity' => $_POST['qty']	
			);*/
	 		
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
		header("location:demo.php");
		}

	
}
}


?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
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
						<a href="checkout.html">
							 <div class="total">
								<span class="simpleCart_total"></span></div>
								<img src="images/cart-1.png" alt="" />
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
							
						<li class="nav-item">
						<a class="nav-link" href="LOgOut.php">Log Out</a>
						</li>
						<li><a align="left" href="loginn.php">Login/Resister</a>
						
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
	<!--about-end-->

<?php 

$query="select * from watch";
$result=mysqli_query($con,$query);
echo "<ul class='products'>";
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result)){?>

<li class="products">
	<div class="product"> 
			<div class="product-top">
				<div class="product-one">
					<div class="col-md-4 ">
	<form method="post" action="demo.php?watch_id=<?php echo $row['watch_id'];?>">
		<ul>
	<a href="single.php?watch_id=<?php echo $row['watch_id'];?>">	<div class="img-responsive zoom-img" ><?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="30%",align="center"';?>></div>
	</a>		
	     <div class="product-content"><h3><?php echo $row['watch_name'];?></h3></div>
		<div class="product-info">Price:<?php echo $row['price'];?>/-</div><br>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="qty" value="1">
		<div class="product-bottom">
		<input type="hidden" name="watch_name" value="<?php echo $row['watch_name'];?>"><br>
		<input type="hidden" name="image" class="img-responsive zoom-img" value="<?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="30%",align="center"';?>"><br>
		<h4><a class="item_add" href="checkout.html"><i></i></a> <span class=" item_price">
<input type="hidden" name="price" value="<?php echo $row['price'];?>"><br></span></h4>
</div>
	    <input type="submit" name="add_to_cart" class="button" value="Add to Cart"><br>




	 
</li>
</ul>

	</form>

</div>
</div>
</div>
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
			<td><a href="demo.php?action=remove?&id=<?php echo $value['watch_id'];?>">Delete</a></td>

		</tr>
<?php
	$total=$total+ ($value['price']*$value['quantity']);
	}

?>
		<tr>
			<td colspan="4" align="right">Total Amount:<?php echo number_format($total,2);?>/-</td>
			<td colspan="2"><a href="checkout.html"><input type="button" name="checkout" class="button" value="Proceed to Checkout"></a></td>
		</tr>
	<?php }

	?>


<tr>
	
</tr>	
</table>

	<!--product-end-->
	<!--information-starts-->
				
								
	<!--footer-end-->	
</body>
</html>
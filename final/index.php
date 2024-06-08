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
			/*$item_array=array(
			'isbn' => $_GET['isbn'],
			'name' => $_POST['title'],
			'price' => $_POST['price'],	
			'quantity' => $_POST['qty']	 );*/

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
			'brand' => $_POST['brand'],		
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
			<span style="color: white"> Welcome.....! <?php echo $uid?></span>
	
			<div class="top-header-main">
				<div class="col-md-6 top-header-left">
					<div class="drop">
						
						<div class="clearfix"></div>
					</div>
				</div>
				
					<div class="cart box_1">
						<a href="check.php" style="color: black">
							<p><img src="images/cart-3.png" alt="" /><span style="color: white;">Check Shopping</span></p>
							
				
					</div>
				</div>
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
		
			<div class="header">
				

				<div class="top-nav">
					<ul class="memenu skyblue"><li class="active"><a href="demo.php"><b style="color: black">Home</b></a></li>
						<li class="grid"><a>Men</a>
							<div class="mepanel" style="width: 130px;">
								<div class="row" style="width: 80px;">
									<div class="col1 me-one" style="width: 60px;">
										<ul>
											<li><a href="sonataM.php?name=Titan & cat=Men">Titan</a></li>
											<li><a href="sonataM.php?name=Citizen & cat=Men">Citizen</a></li>
											<li><a href="sonataM.php?name=Fastrack & cat=Men">Fastrack</a></li>
											<li><a href="sonataM.php?name=Sonata & cat=Men">Sonata</a></li>
											<li><a href="sonataM.php?name=Fossil & cat=Men">Fossil</a></li>
											<li><a href="sonataMa.php">All</a></li>
										</ul>
									</div>
										</div>
							</div>
						</li>
						<li class="grid"><a>Women</a>
							<div class="mepanel" style="width: 130px; margin-left: 200px;">
								<div class="row" style="width: 80px;">
									<div class="col1 me-one" style="width: 60px;">
										<ul>
											<li><a href="sonataM.php?name=Titan & cat=Women">Titan</a></li>
											<li><a href="sonataM.php?name=Citizen & cat=Women">Citizen</a></li>
											<li><a href="sonataM.php?name=Fastrack & cat=Women">Fastrack</a></li>
											<li><a href="sonataM.php?name=Sonata & cat=Women">Sonata</a></li>
											<li><a href="sonataM.php?name=Fossil & cat=Women">Fossil</a></li>
											<li><a href="sonataFa.php">All</a></li>
										</ul>
								</div>
							</div>
						</div>
							
						<li><a align="left" href="LOGIN.PHP">Login/Resister</a>
						
						</li>
						<li class="nav-item">
						<a class="nav-link" href="logout.php">Log Out</a>
						</li>
					
			
				</ul>
	
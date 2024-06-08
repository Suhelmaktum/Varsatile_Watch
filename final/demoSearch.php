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
<link rel="stylesheet" type="text/css" href="style3.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<title>Versatile Watch Shopping </title>
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
<style>
	.form-group {
    margin:0;
    padding:20px ;

    &:first-child { border-color: transparent; }
}

.form-control {
  padding: 0px 10px 0 20px;
  margin-top: 10px;
  color: #333;
  font-size: 28px;
  font-weight: 500;
    border: 3px solid #555;
    -webkit-box-shadow: none;
    box-shadow: none;
    min-height:60px;
    height: auto;
    border-radius: 50px 0  0 50px !important;
}
.form-control :focus {
        -webkit-box-shadow: none;
        box-shadow: none;
        border-color: transparent;

    }

#searchbtn
{ border:0;
  padding: 0px 10px;
  margin-top: 10px;
  color: #fff;
  background:#888;
  font-size: 27px;
  font-weight: 500;
    border: 3px solid #555;
    border-left: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    min-height:60px;
    height: auto;
border-radius: 0 50px 50px 0 !important;
}


</style>	


		<!--top-header-->
	<div class="top-header">

		<div class="container">
		<?php
$mysqli = new mysqli("localhost","root","","watch");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>	
			<div class="top-header-main">
				<div class="col-md-6 top-header-left">
				<div class="container">
    <h1 class=text-center> <a href="demo.php"><h1><b>VERSATILE WATCH SHOPPING</b></h1></a></h1>
	  <p><h4 style="text-align:center;color:white" >⌚<i><b> Make Your Time Perfect With The Perfect Watch</b> </i>⌚</h4></p>
	<hr>
	<div class="row">
    <div class="col-xs-10 col-xs-offset-1">

    <form action="demoSearch.php" method="post" role="search">
    <div class="input-group">
    <input class="form-control" placeholder="Search . . ." name="srch_term" id="ed-srch-term" type="text">
    <div class="input-group-btn">
		
    <button type="submit" id="searchbtn">
    search</button>
    </div>
    </div>
    </form>
	

    </div>
	</div>
</div>
					<div class="drop">
						
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 top-header-left">
					<div class="cart box_1">
						<a href="check.php" style="color: black">
							<p><img src="images/cart-3.png" alt="" /><span style="color: white;">Check Shopping</span></p>
							
				
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>


	<!--top-header-->
	<!--start-logo-->

	
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-md-9 header-left">

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
							
						
						
						<li>
						<a class="nav-link" href="contact.php">Contact</a>
						</li>
					
						<?php 
						if (isset($_SESSION['user'])) {
							# code...
						
						?>
						<li class="nav-item">
						<a class="nav-link" href="logout.php">Log Out</a></li>
						<?php
							}

							else
							{
						?>

					<li><a align="left" href="LOGIN.PHP">Login/Resister</a>
						
						</li>
						<?php
							}
						?>
						
			<!--<li>		
				<div class="search-bar" style="border-color: black; width: 150px";>
					<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" style="border-color: black">
					<input type="submit" value="">

				</div>
			</li>-->
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
						<img class="img-responsive" src="images/abt-1.jpg" alt=""/>
				</div>
				<div class="col-md-4 about-left">
						<img class="img-responsive" src="images/abt-2.jpg" alt=""/>
				</div>
				<div class="col-md-4 about-left">
						<img class="img-responsive" src="images/abt-3.jpg" alt=""/>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<style type="text/css">
	body{

	background: url('');
	background-size: cover; 
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
.saru {
  width: 150px;
  padding: 15px;
  margin: 5px;
  margin-top: 2px;
}
</style>

	<!--about-end-->

<?php 



	$srchterm=$_POST['srch_term'];

$query="select * from watch where watch_name like '%$srchterm%'";
$result=mysqli_query($con,$query);
echo "<ul class='products'>";
if(mysqli_num_rows($result)>0){
	
	while($row=mysqli_fetch_array($result)){?>

<li class="products">
	<form method="post" action="demo.php?watch_id=<?php echo $row['watch_id'];?>">
		<ul>
			<div class="product-content"><h3><?php echo $row['watch_name'];?></h3></div>
	<div class="saru"><a href="info.php?id=<?php echo $row['watch_id'];?>">	<div class="img-responsive zoom-img" ><?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="30%",align="center"';?>></div>
	</a>		</div>
		<input type="hidden" name="image" class="img-responsive zoom-img" value="<?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="30%",align="center"';?>">
		
	   
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
         <html>
			 <body>
			<style>
				footer{
					text-align:center;
					padding:3px;

				}
			</style>
			
				
			<table border="4" width="100%">
				<th bgcolor=gray>
				<footer>
				
				    <p><b><h4>Powered by</h4></b> </p><br>
					<p><b><h4>Versatile Watch Shopping</h4></b> <br>
					<p><b><h4>Contact: 9307834947 , 9892432849</h4></b></p>
					<p><b><h4>Email-versatilewatch@gmail.com</h4></b></p><br>

					</p>
			</footer>
			</th>
			</table>
            </body>
	    </html>		
			
								
	<!--footer-end-->	
</body>
</html>
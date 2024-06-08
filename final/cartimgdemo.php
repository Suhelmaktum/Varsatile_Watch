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
		header("location:single.php");
		}

	
}
}


?>



<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
	<style>
		
ul.products li {
	display: inline-block;
	max-width: 400px;
	padding: 20px 30px;
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
.product-content{
	color:black;
	font-height: 80px;
}
.product-info{
	color:black;
	font-height: 80px;	
}


	</style>
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
<body style="background-image: url('watch.jpg');">
	<!--start-logo-->
	<div class="logo" >
		<a href="demo.php"><h1 style="color: white;">Online Watch Shopping</h1></a>
	</div>

<?php
include("connect.php");

$watch_id=$_GET['watch_id'];

$query="select * from watch where watch_id=$watch_id";
$result=mysqli_query($con,$query);
echo "<ul class='products'>";

if(mysqli_num_rows($result)>0){
$row=mysqli_fetch_row($result);
	?>
	
	<li class="products">
	<form method="post" action="demo.php?watch_id=<?php echo $row['watch_id'];?>">
		<ul>
			<div class="product-content"><h3><?php echo $row[1];?></h3></div>
	<a href="single.php?watch_id=<?php echo $row['watch_id'];?>">	<div class="img-responsive zoom-img"><?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="80%",align="center">';?></div></a>
			
	     <div class="product-content">Brand :<?php echo $row[6];?></div>
		<div class="product-info">Price:<?php echo $row[3];?>/-</div>
		<div class="product-info">Description:<?php echo $row[5];?></div>
		<div class="product-bottom">
			<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="qty" value="1">
		<input type="hidden" name="watch_name" value="<?php echo $row['watch_name'];?>">
		<input type="hidden" name="information" value="<?php echo $row['information'];?>">

		<input type="hidden" name="brand" value="<?php echo $row['brand'];?>">
		<input type="hidden" name="image" class="img-responsive zoom-img" value="<?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="80%",align="center"';?>">
		<h4><a class="item_add" href="checkout.html"></a> <span class=" item_price">
<input type="hidden" name="price" value="<?php echo $row['price'];?>"><br></span></h4>
</div>
		 <div align="center"> <a href="check.php"><input type="submit" name="add_to_cart" class="button" value="Add to Cart" style="	background-color: #39b3d7;
	    		min-width: 100px;
	    		color: #FFF;
	    		font: 15px/15px Arial, Helvetica, sans-serif;
	    		min-height: 30px;
	    		text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.26);
	    		border-radius: 3px;" ><br></a></div>
</div>






	 
</li>
</ul>

	</form>

</div>
</div>
</div>


	

<?php
}
?>
	 
							</li>  </ul>
						</div>

<table border="1" align="center" style="border-color: black;
										font-size: 14px;">	
<tr style="border-color: black;
			font-size: 15px;">	<th>watch id</th>
	<th>watch name</th>
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
			<td><a href="demo.php?action=remove?&id=<?php echo $value['watch_id'];?>">Delete</a></td>

		</tr>
<?php
	$total=$total+ ($value['price']*$value['quantity']);
	}

?>
		<tr>
			<td colspan="4" align="right">Total Amount:<?php echo number_format($total,2);?>/-</td>
			<td colspan="2"><a href="check.php"><input type="button" name="check" class="button" value="Proceed to Checkout" 
				style="	background-color: #39b3d7;
	    		min-width: 100px;
	    		color: #FFF;
	    		font: 15px/15px Arial, Helvetica, sans-serif;
	    		min-height: 30px;
	    		text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.26);
	    		border-radius: 3px;"></a></td>
		</tr>
	<?php }

	?>

<tr>
	
</tr>	
</table>

							
						<!-- FlexSlider -->
						<script src="js/imagezoom.js"></script>
						<script defer src="js/jquery.flexslider.js"></script>
						<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>
					</div>	
					<div class="clearfix"> </div>
				</div>
				
			
	<!--end-single-->
	
	<!--footer-starts-->
	
	<!--footer-end-->	
</body>
</html>
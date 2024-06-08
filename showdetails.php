<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		<title></title
</head>
<body>




<?php 

include("connection.php"); 

$mvid=$_GET['id'];
//echo $mvid;

$query="select * from movie where m_id=$mvid";
$result=mysqli_query($con,$query);
echo "<ul class='products'>";
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result)){?>

<li class="products">

	<form method="post" action="showdetails.php?id=<?php echo $row['m_id'];?>">
		<div class="product-thumb"><?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[6]).'"height="25%">' ;?></div>
	     <div class="product-content"><h3>Name:<?php echo $row['1'];?></h3></div>
	     <div class="product-content"><h3>Director:<?php echo $row['2'];?></h3></div>
	     <div class="product-content"><h3>Actors:<?php echo $row['3'];?></h3></div>
	     <div class="product-content"><h3>Category:<?php echo $row['4'];?></h3></div>
	     <div class="product-content"><h3>Release Date:<?php echo $row['5'];?></h3></div>
		
		
	    
	 
</li>


	</form>
<?php 
	}
echo "</ul>";
}

?>

<?php



$mvid=$_GET['id'];

	$query="select * from shows where m_id=$mvid";
$result=mysqli_query($con,$query);
echo "<ul class='products'>";
echo"Show dates:";
if(mysqli_num_rows($result)>0){
	
	while($row=mysqli_fetch_array($result)){?>

<li class="products">

	
		
		<button type="button" name="btn" class="btn btn-sucess " data-id=<?php echo $row['show_date'] ;?>
			id="btn"><?php echo $row['show_date'] ;?></button>

	

<?php
}
?>
<div id="dates">
	
</div>
<?php
}
?>	
<script type="text/javascript">
	$('.btn').click(function() {
		// body..
		//alert("gettime");
		var cid=$(this).data('id');
		console.log(cid);
		$.ajax({
			url:"gettime.php",
			method:"post",
			data:{id:cid},
			success:function(data){
				$('#dates').html(data);
			}
		});
	});
</script>
</body>
</html>
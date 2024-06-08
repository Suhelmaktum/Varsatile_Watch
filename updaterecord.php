<!DOCTYPE html>
<html>
<head>


	<title></title>
	<link rel="stylesheet" type="text/css" href="css/updaterecord.css">
</head>
<body align="center">
	<table width="100%" border="7%" bgcolor="white" cellspacing="5" cellpadding="5" align="center">
		<tr align="center" bgcolor="sky blue">
			<td>
	<h1 align="center">Update Records</h1>
</td>
</tr>
<tr>
	<td align="center">
<form action="updrecmaster.php" method="post" enctype="multipart/form-data">
<div class="cat">
	     		<?php 
	     			include("connect.php");
	     			$watch_id=$_GET['id'];


	     			$query="select * from watch where watch_id='$watch_id'";

					$result=mysqli_query($con,$query) or die(mysqli_error($con));

					$row=mysqli_fetch_row($result);
					$watch_name=$row[1];
					$image=$row[2];
					$price=$row[3];
					$category=$row[4];
					$information=$row[5];
					$brand=$row[6];


					
				?>
				
	     		<input type="hidden" name="watch_id" value="<?php echo $watch_id;?>"></br>

				</br><b><label for="watch_name">Watch Name</label>
				<input type="text" name="watch_name" value="<?php echo $watch_name;?>"></br>

				</br><label for="image">Product image :</label>
				<input type="file" name="image" value="<?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="30%",align="center">';?></br>

				</br><label for="price">Watch Price</label>
				<input type="number" name="price" value="<?php echo $price;?>"></br>

				</br><label for="category">Watch Category</label>
				<input type="text" name="category" value="<?php echo $category;?>"></br>

				</br><label for="information">Watch Information</label>
				<input type="text" name="information" value="<?php echo $information;?>"></br>

				</br><label for="brand">Watch Brand</label>
				<input type="text" name="brand" value="<?php echo $brand;?>"></b></br>
			
			</br><button type="submit" name="btnsubmit" value="Save"  alert('Watch information is updated');>Update</button></br>
			

	
	</div>
	
</td>
</tr>
</body>
</html>

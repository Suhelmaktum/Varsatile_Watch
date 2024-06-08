<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="css/productentry.css">
</head>
<body>
<form action="admincode.php" method="post" enctype="multipart/form-data">
	<?php
		include("connect.php");
		
		if(isset($_POST['btnsubmit']))
	    {
	    	
			$watch_name=$_POST['watch_name'];
			$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$price=$_POST['price'];
			$category=$_POST['category'];
			$information=$_POST['information'];
			$brand=$_POST['brand'];
		

			$query="insert into watch(watch_name,image,price,category,information,brand) values ('$watch_name','$image','$price','$category','$information','$brand')";
			$res=mysqli_query($con,$query) or die(mysqli_error($con));
        ?>
		
    	
       
			<div class="catdisplay" align="center">
			<h4>Product List</h4>
			<table border="1" align="center">
				<th width="3%">Watch ID</th>
				<th width="15%">Watch Name</th>
				<th width="7%">Image</th>
				<th width="5%">Price</th>
				<th width="6%">Category</th>
				<th width="30%">Information</th>
				<th width="7%">brand</th>
				

				<th colspan="2" width="8%">Action</th>
				<?php
					
					$query="select * from watch";
					$result=mysqli_query($con,$query);
					while($row=mysqli_fetch_row($result)){
				?>
				<tr>
				<td><?php echo $row[0];?></td>
				<td><?php echo $row[1];?></td>
				<td><?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="30%",align="center">' ;?></td>
				<td><?php echo $row[3];?></td>
				<td><?php echo $row[4];?></td>
				<td><?php echo $row[5];?></td>
				<td><?php echo $row[6];?></td>
				<td><a href="updaterecord.php?id=<?php echo $row[0];?>" >Edit</a></td>
				<td><a href="deleterecord.php?id=<?php echo $row[0];?>">Delete</a></td>
				</tr>
			   <?php }
			} else {?>
			</table>
			</div>

					<div class="catdisplay" align="center">
			<h4>Product List</h4>
			<table border="1" align="center">
				<th width="3%">Watch ID</th>
				<th width="15%">Watch Name</th>
				<th width="7%">Image</th>
				<th width="5%">Price</th>
				<th width="6%">Category</th>
				<th width="30%">Information</th>
				<th width="7%">brand</th>
				

				<th colspan="2" width="8%">Action</th>
				<?php
					
					$query="select * from watch";
					$result=mysqli_query($con,$query);
					while($row=mysqli_fetch_row($result)){

				?>
				<tr>
				<td><?php echo $row[0];?></td>
				<td><?php echo $row[1];?></td>
				<td><?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="30%",align="center">' ;?>
					
				</td>
				<td><?php echo $row[3];?></td>
				<td><?php echo $row[4];?></td>
				<td><?php echo $row[5];?></td>
				<td><?php echo $row[6];?></td>
				<td><a href="updaterecord.php?id=<?php echo $row[0];?>" >Edit</a></td>
				<td><a href="deleterecord.php?id=<?php echo $row[0];?>">Delete</a></td>
				</tr>
		   
			   <?php } }?>
			</table>
		</div>
	
</form>
</body></html>
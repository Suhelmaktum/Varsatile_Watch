<!DOCTYPE html>
<html>
<head>
	<title>Breed Information</title>
	<link rel="stylesheet" type="text/css" href="css/breed_info.css">
</head>
<body>
<form action="breed_info.php" method="post">
<div class="abc">
<div class="binfo">
<h3 align="center"> Breed Information</h3>
<hr>
	<div class="binfo">
		<select name="brname">
			<?php  
                include("connection.php");
                $query="select * from breed_name";
                $result=mysqli_query($con,$query);
                	while($r=mysqli_fetch_row($result)){

			?>
			     <option value="<?php echo $r[0]; ?>"> <?php echo $r[1];?> </option>
			     
			  <?php } ?>    
			</select>
		
		<label for="height">Ideal Height</label><input type="text" name="height" placeholder="height">
		<label for="weight">Ideal weight</label><input type="text" name="weight" placeholder="weight">
		<label for="lifespane">Ideal lifespane</label><input type="text" name="lifespane" placeholder="Life spane">

		<button type="submit" name="save" value="save">Save</button>
</div>
</div>


<?php
     
	include("connection.php");

	if(isset($_POST['save']))
	{
		$brid=$_POST['brname'];
		$hight=$_POST['height'];
		$weight=$_POST['weight'];
		$lifespane=$_POST['lifespane'];

		$que="select * from breed_name where breed_id=$brid";
		
		$result=mysqli_query($con,$que)or die(mysqli_error($con));
		
		while($row=mysqli_fetch_array($result)){
		
		$bid=$row[0];
		//$bname=$row[1];
		$cid=$row[2];

	   }
	
				
		$query="insert into breed_info(catid,breedid,height,weight,lifespan) values ('$cid','$bid','$hight','$weight','$lifespane')";
		$res=mysqli_query($con,$query) or die(mysqli_error($con));

	?>

	<div class="infodisplay">
	<h2> Breed Information </h2>
	<table border="1">

	<th>Breed name</th>
	<th>Height(Inches)</th>
	<th>Weight(Pounds)</th>
	<th>Lifespae(Year)</th>

	<th colspan="2">Action</th>
	<?php

		$query="select b_id,b_name,height,weight,lifespan from breed_info,breed_name where breed_name.breed_id=breed_info.breedid";
		$result=mysqli_query($con,$query);

		//$que="select b_name from breed_name where breed_id="
		while($row=mysqli_fetch_row($result)){
		$infoid=$row[0];
	?>
	<tr>

	
	<td><?php echo $row[1];?></td>
	<td><?php echo $row[2];?></td>
	<td><?php echo $row[3];?></td>
	<td><?php echo $row[4];?></td>
	<td><a href="update_breedinfo.php?infoid=<?php echo $infoid;?>" >Edit</a></td>
	<td><a href="delete_breedinfo.php?infoid=<?php echo $infoid;?>">Delete</a></td>
	</tr>
			   

	<?php }
	} else {?>
	</table>
	</div>

	<div class="infodisplay">
	<h2>Breed Information</h2>
	<table border="1">

	<th>Breed name</th>
	<th>Height(Inches)</th>
	<th>Weight(Pounds)</th>
	<th>Lifespae(Years)</th>

	<th colspan="2">Action</th>
	<?php
					
		$query="select  b_id,b_name,height,weight,lifespan from breed_info,breed_name where breed_name.breed_id=breed_info.breedid";
		$result=mysqli_query($con,$query);
		while($row=mysqli_fetch_row($result)){
		$infoid=$row[0];
	?>
	<tr>
	
	<td><?php echo $row[1];?></td>
	<td><?php echo $row[2];?></td>
	<td><?php echo $row[3];?></td>
	<td><?php echo $row[4];?></td>
	<td><a href="update_breedinfo.php?infoid=<?php echo $infoid;?>" >Edit</a></td>
	<td><a href="delete_breedinfo.php?infoid=<?php echo $infoid;?>">Delete</a></td>
	</tr>
			   
	<?php } 
	}?>
	</table>
	</div>

</form>
</body>
</html>
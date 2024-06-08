<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="css/admincode.css">
</head>
<body>
<form action="info.php" method="post">
<div align="center">
	<table width="70%" border="7%" bgcolor="white" cellspacing="5" cellpadding="5" align="center">
		<tr align="center" bgcolor="sky blue">
			<td>
	<h1 align="center">Information Entry</h1>
</td>
</tr>
<tr>
	<td align="center">
		<form action="info.php" method="POST" >
<div class="product">
		<label for="information">Information :</label>
		<textarea rows="8" cols="50" name="information" required="true"></textarea><br>
	<input type="submit" name="btn" value="Add Information" align="center">
</div>


</td>
</tr>





	<?php
		include("connect.php");
		
		if(isset($_POST['btn']))
	    {
	    	
			$information=$_POST['information'];
		
		

			$query="insert into info1(information) values ('$information')";
			$res=mysqli_query($con,$query) or die(mysqli_error($con));
        ?>
		
    	
       
			<div class="catdisplay" align="center">
			<h4>Product List</h4>
			<table border="1">
				<th>Info ID</th>
				
				<th>Information</th>

				<th colspan="2">Action</th>
				<?php
					
					$qu="select * from info1";
					$res=mysqli_query($con,$qu);
					while($row=mysqli_fetch_row($res)){
				?>
				<tr>
				<td><?php echo $row[0];?></td>
				<td><?php echo $row[1];?></td>

				<td><a href="updaterecord.php?id=<?php echo $row[0];?>" >Edit</a></td>
				<td><a href="deleterecord.php?id=<?php echo $row[0];?>">Delete</a></td>
				</tr>
			   <?php }
			} else {?>
			</table>
			</div>

					<div class="catdisplay" align="center">
			<h4>Product List</h4>
			<table border="1">
				<th>Info ID</th>
				
				<th>Information</th>
			

				<th colspan="2">Action</th>
				<?php
					
					$qu="select * from info1";
					$res=mysqli_query($con,$qu);
					while($row=mysqli_fetch_row($res)){

				?>
				<tr>
				<td><?php echo $row[0];?></td>
				<td><?php echo $row[1];?></td>
				<td><a href="updaterecord.php?id=<?php echo $row[0];?>" >Edit</a></td>
				<td><a href="deleterecord.php?id=<?php echo $row[0];?>">Delete</a></td>
				</tr>
		   
			   <?php } }?>
			</table>
		</div>
	
</form>
</table>

</body></html>
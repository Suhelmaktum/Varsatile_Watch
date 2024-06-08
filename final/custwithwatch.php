<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="css/admincode.css">
</head>
<body>
	<div align="center">
<form action="custwithwatch.php" method="post">

	<html>
<head>
    <link rel="stylesheet" type="text/css" href="productentry.css">
</head>
<body align="center">
<table width="100%" border="10" bgcolor="white" cellspacing="6" cellspacing="6" align="center">
<tr align="center" bgcolor="sky blue" border="1">
    <td><h2><b> Customer List </b></h2>
    </td>
</tr>
    <tr>
    <td align="center">
<form action="productentry.php" method="POST"></br>
    


	

	<?php
	
		include("connect.php");
		
			
        ?>


<div class="catdisplay" align="center">
			
			<table border="1" align="center" width="100%">
				<th width="4%">Cust_ID</th>
				<th>Customer Name</th>
				<th width="8%">Contact</th>
				<th width="20%">E-mail Id</th>
				<th>Address</th>
				<th width="7%">Password</th>
				<th width="7%">Date</th>
				
				<th colspan="2" width="6%">Action</th>
				<?php
					include("connect.php");
					$query="select * from customer";
					$result=mysqli_query($con,$query);
					while($row=mysqli_fetch_row($result)){

				?>
				<tr>
		<td><?php echo $row[0];?></td>
	
				<td><?php echo $row[1];?></td>
				<td><?php echo $row[2];?></td>
				<td><?php echo $row[3];?></td>
				<td><?php echo $row[4];?></td>
				<td><?php echo $row[5];?></td>
				<td><?php echo $row[6];?></td>
				<td><a href="deletecust.php?id=<?php echo $row[0];?>">Delete</a></td>
				
				
				</tr>
			   <?php }
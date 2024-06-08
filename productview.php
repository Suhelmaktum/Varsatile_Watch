<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="css/productentry.css">
</head>
<body>
<div align="center">
	<table width="100%" border="7%" bgcolor="white" cellspacing="5" cellpadding="5" align="center">
		<tr align="center" bgcolor="sky blue">
			<td>
	<h1 align="center">Product View</h1>
</td>
</tr>
<tr>
	<td align="center">
		<form action="admincode.php" method="POST" enctype="multipart/form-data">
<div class="product" align="center"><br>

	<label for="watch_name">Watch Name :</label>
	<input type="text" name="watch_name" required="true"><br><br>

	<label for="image">Image:</label>
	<input type="file" name="image" required="true"><br><br>

	<label for="price">Price :</label>
	<input type="text" name="price" required="true"><br><br>

	<label for="category">Category :</label>
	<input type="text" name="category" required="true"><br><br>

	<label for="information">Information :</label>
	<input type="text" name="information" required="true"><br><br>

	<label for="brand">Brand :</label>
	<input type="text" name="brand" required="true"><br><br>
	
	</div><br>
	<input type="submit" name="btnsubmit" value="Save">
</div>


</td>
</tr>
</form>
</table>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Information</title>
	
	<style>

.button {
  background-color:  black; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid black;
}

.button1:hover {
  background-color: black;
  color: white;
}


		
ul.products li {
	display: inline-block;
	max-width: 200px;
	padding: 20px;
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
	min-width: 30px;
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
	height: 80px;
	text-align: center;
}
.product-content1{
	color:black;
	margin-top: 1px;
	text-align: left;
}
.product-info{
	color:black;
	font-height: 80px;	
}
table#t01 tr {
  background-color: black;
  color: white;
}



	</style>
</head>

<body style="background-image: url('');">
	
	<?php
include("connect.php");

$watch_id=$_GET['watch_id'];

$query="select * from watch where watch_id=$watch_id";
$result=mysqli_query($con,$query);
echo "<ul class='products'>";

if(mysqli_num_rows($result)>0){
$row=mysqli_fetch_row($result);
	?>

	<table width="60%" border="2" align="center"
	id="t01">
<tr align="center">
<td><h1>Detail Information</h1></td>
</tr>
</table>
	<table align="center" cellspacing="50" cellpadding="10" border="3" width="60%" id="t02" style="background-color:#D8D8D8;">



<tr>
	<td width="30%" style="background-color: white;">

		<div class="products">
	<form method="post" action="demo.php?watch_id= echo $row['watch_id'];">
		
			<div class="product-content"><h3><?php echo $row[1];?></h3></div>
<div class="img-responsive zoom-img"> <?php echo '<img src="data:image/jpeg;base64,'. base64_encode($row[2]).'"height="80%",align="center">';
?>
</div></a>
	</form>
</div>
	</td>



	<td style="text-align: top; background-color: white;">

		 <div class="product-content1">Brand :<?php echo $row[6];?></div>
		<div class="product-info">Price:<?php echo $row[3];?>/-</div>
		<div class="product-info">Description:<?php echo $row[5];?></div>
		<div class="product-bottom">
			

		
		</div>
	</td>
</tr>
</table>
<?php
}
?>
<br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
 
 	<a href="demo.php"><input type="button" name="Back To Page" class="button button1" value="Back To Page" align="center"></a>
 	
</body>
</html>
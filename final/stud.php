<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action='stude.php' method='POST'>
	Enter Name=<input type="text" name="nm"></br>
	Enter Address=<input type="text" name="ad"></br>
	Enter Contact=<input type="number" name="con"></br>
	<input type="submit" name="ok" value="ok">
</form>
<?php
	$name=$_POST['nm'];
	$address=$_POST['ad'];
	$contact=$_POST['con'];
	if(isset($_POST['ok']))
{
	$con=mysql_connect("localhost","root","mysql");
	echo $con."<br>";
	if($con)
		echo "Mysql connected to php"."<br>";
	else
		echo "Mysql is not connected to php"."<br>";
	$res=select_mysql_db("student",$con)
	$sql="insert into stud values('$name','$address','$contact')";
	$result=mysql_query($sql,$con) or die(mysql_error());
	if($result)
		echo "Data is inserted"."<br>";
	else
		echo "Data is not inserted"."<br>";
}
	mysql_close($con);
?>
</body>
</html>
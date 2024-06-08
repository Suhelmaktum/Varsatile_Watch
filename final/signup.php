
<!DOCTYPE html>
<html>
<body>
<head>
	<link rel="stylesheet" type="text/css" href="login1.css">
</head>
<body>
	<img src="wp1853765.jpg" width="100%" height="100%" >

<form action="signup.php" method="POST">
	<div class="loginbox1 ">
				<img src="image1.jpg" class="user" height="20%">
        
	Enter Name :
		<input type="text" name="user_name" required="true" placeholder="Enter username"><br>

	Enter Contact No. :
		<input type="number" name="contact" required="true"></br>

	Enter Email_Id:
		<input type="email" name="email" required="true"><br>

	Enter Address:
		<input type="text" name="address" required="true" placeholder="Enter Address"><br>

	Enter Password:
		<input type="password" name="password" required="true"><br>

	Enter Date:
		<input type="date" name="date">

<input type="submit" name="btnsubmit" value="Submit"><br>

<a href="LOGIN.PHP"><center>back to login</center></a></div>
</form>
</body>
</html>

<?php
include("connect.php");
		
		if(isset($_POST['btnsubmit']))
	    {
$user_name=$_POST['user_name'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$address=$_POST['address'];
$password=$_POST['password'];
$date=$_POST['date'];

		$con=mysqli_connect("localhost","root","");

		mysqli_select_db($con,"watch");

		$sql="insert into customer(user_name,contact,email,address,password,date) values('$user_name','$contact','$email','$address','$password','$date')";
		$result=mysqli_query($con,$sql);

	if($result)
		 header("location:LOGIN.PHP");
	else                                       
		echo "record not saved"."<br>";

mysqli_close($con); 
}
?>
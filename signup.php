<html>
<head>
    
    <!--<link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet"> 
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
</head>
<body>
	<img src="wp1853765.jpg" width="100%" height="100%">



<form action="signup.php" method="POST">
	<link rel="stylesheet" type="text/css" href="login1.css">
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

<input type="submit" name="btnsubmit" value="save"><br>

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

		$con=mysqli_connect("localhost","root","");

		mysqli_select_db($con,"watch");

		$sql="insert into customer(user_name,contact,email,address,password) values('$user_name','$contact','$email','$address','$password')";
		$result=mysqli_query($con,$sql);

	if($result)
		echo "record saved";
	else                                       
		echo "record not saved"."<br>";

mysqli_close($con); 
}
?>
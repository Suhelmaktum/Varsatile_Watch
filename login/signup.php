<html>
<body>

<html>
<head>
    
    <!--<link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet"> 
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
</head>
<body align="center">
	<img src="wp1853765.jpg.jpg" class="user" height="100%">



<form action="signup.php" method="POST">
	<link rel="stylesheet" type="text/css" href="login.css">
	<div class="loginbox1 " align="center">
				<img src="image1.jpg" class="user" height="20%"><br></br>
        
	Enter Name :
		<input type="text" name="user_name" required="true" placeholder="Enter username"><br></br>

	Enter Contact No. :
		<input type="number" name="contact" required="true"></br></br>

	Enter Email_Id:
		<input type="email" name="email" required="true"><br></br>

	Enter Address:
		<input type="text" name="address" required="true" placeholder="Enter Address"><br></br>

	Enter Password:
		<input type="password" name="password" required="true"><br></br>

<input type="submit" name="btnsubmit" value="save"><br></br>

<a href="loginn.php" align="center"> back to login</a></div>
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
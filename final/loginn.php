
<?php
	session_start();
	if(isset($_POST['btnsubmit']))
	{        
                ob_start();


		$email=$_POST['email'];
		$password=$_POST['password'];
		$con=mysqli_connect("localhost","root","") or die(mysqli_error());
		mysqli_select_db($con,"watch");
		$sql="select email from customer where email='$email' and password='$password'";
		$result=mysqli_query($con,$sql);
		$result=mysqli_num_rows($result);


		if($result!=0)   
            
                     {     
                     $_SESSION['user']=$email;   
                     header("location:check.php");
                     
                      
                }
                else
                
                       echo "invalid user name and password...If Not a member then Register";
        }
    
    ob_end_flush();

?>


		



<!DOCTYPE html>
<html>
<head>
	<style>
		h2 {
			color: white;
		}
	</style>
	<title>Login</title>
	<link rel="stylesheet" href="login3.css">
</head>
<body>
	<img src="wp1853765.jpg" width="100%" height="100%" >
	<!--<div class="title"><p><h1 align="center">Watch Shopping</h1></p></div>-->
		
	<form action="loginn.php" method="post">

	<div class="loginbox">

		
		<h2>log In Here </h2>
		<form action="loginn.php" method="post">
			<label><p>username</p>
			<input type="text" name="email" placeholder="Enter username"></label>
			<label><p>password</p>
			<input type="password" name="password" placeholder="*************"></label>
			<input type="submit" name="btnsubmit" value="Submit">
			<center><a href="signup.php">Not a Member? </center></a></br>			 
			<center><a href="demo.php">Back to Homepage</a></center>
	</form>
	</div>
</form>
</body>
</html>



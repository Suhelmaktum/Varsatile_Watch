<?php
    
                ob_start();
                $email=$_POST['email'];
                $passward=$_POST['passward'];
        $con=mysqli_connect("localhost","root","");
                mysqli_select_db($con,"watch");
                
                $sql="select email from admin where email='$email' and passward='$passward'";
        $result=mysqli_query($con,$sql);
$result=mysqli_num_rows($result);
                

                if($result!=0)   

                     header("location:adminmain.html");
                 
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
	<!--<link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet"> 
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
</head>
<body>
	<img src="wp1853765.jpg" width="100%" height="100%" >
	<!--<div class="title"><p><h1 align="center">Watch Shopping</h1></p></div>-->
		
	<form action="loginn.php" method="post">

	<div class="loginbox">

		
		<h2>log In Here </h2>
		<form>
			<p>username</p>
			<input type="email" name="email" placeholder="Enter username">
			<p>password</p>
			<input type="password" name="password" placeholder="Enter password"></br><br>
			<a href="http://localhost/watchproject/index.php"><input type="submit" name="btnsubmit" value="log In"></a><br></br>
			 
	</form>
	</div>
</form>
</body>
</html>



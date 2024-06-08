<?php
    session_start();


        if(isset($_POST['btnsubmit']))
        {       
                ob_start();
                $email=$_POST['email'];
                $password=$_POST['password'];
        $con=mysqli_connect("localhost","root","");
                mysqli_select_db($con,"watch");
                
                $sql="select email from customer where email='$email' and password='$password'";
        $result=mysqli_query($con,$sql);
$result=mysqli_num_rows($result);
                

                if($result!=0 && isset($_SESSION['shopping_cart']))   
            
                     {     
                     $_SESSION['user']=$email;

                     header("location:check.php");
                      
                }
                elseif ($result!=0) {
                    # code...
                     $_SESSION['user']=$email;
                    header("location:demo.php");
                }

                else
                    
                       header("location:signup.php");
        }
    
    ob_end_flush();

?>
    
    
<!DOCTYPE html>
<html>
<head>
        <title align="center">User page</title>
        <link rel="stylesheet" type="text/css" href="LOGINN.CSS">
</head>
<body>
<img src="wp1853765.jpg" class="user" height="100%" width="100%"> 
<div class="box" >
    <h2>LOGIN</h2>     
<form action="LOGIN.PHP" method="post">
<div class="inputbox">
<label><b style="color: gray">User ID:<input type="text" name="email" placeholder="User ID"></b></label>
<label><b style="color: gray">Password: <input type="password" name="password" placeholder="*************"></b></label>
<input type="submit" name="btnsubmit" value="Submit">

            <center><a href="signup.php" style="color: pink">Create New Account</center>
            	<center><a href="demo.php" style="color: pink">Back to Homepage</a></center> 
</a>
</div>
</form>
</body>
</html>
</body>

</html>
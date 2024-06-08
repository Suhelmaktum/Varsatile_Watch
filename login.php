<?php
    session_start();


        if(isset($_POST['btnsubmit']))
        {       
                ob_start();
                $email=$_POST['email'];
                $passward=$_POST['passward'];
        $con=mysqli_connect("localhost","root","");
                mysqli_select_db($con,"watch");
                
                $sql="select email from admin where email='$email' and passward='$passward'";
        $result=mysqli_query($con,$sql);
$result=mysqli_num_rows($result);
                

                if($result!=0)   
            
                     {     
                     $_SESSION['user']=$email;

                     header("location:adminmain.html");
                      
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
        <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<img src="wp1853765.jpg" class="user" height="100%" width="100%"> 
<div class="box">
    <h2>LOGIN</h2>     
<form action="login.php" method="post">
<div class="inputbox">
<label><b>User ID:<input type="text" name="email" placeholder="User ID"></b></label>
<label><b>Password: <input type="password" name="password" placeholder="*************"></b></label>
<input type="submit" name="btnsubmit" value="Submit">

            	<center><a href="adminmain.html">Back to Admin Panel</a></center> 
</a>
</div>
</form>
</body>
</html>
</body>

</html>
<?php
    session_start();

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
<form action="adminlogin.php" method="post">
<div class="inputbox">
<label><b>User ID:<input type="text" name="email" placeholder="User ID"></b></label>
<label><b>Password: <input type="password" name="password" placeholder="*************"></b></label>
<input type="submit" name="btnsubmit" value="Submit">

            	 
</a>
</div>
</form>
</body>
</html>
</body>

</html>

<?php
        if(isset($_POST['btnsubmit']))
        {       
                ob_start();
                $eml=$_POST['email'];
                $pwd=$_POST['password'];
        $con=mysqli_connect("localhost","root","");
                mysqli_select_db($con,"watch");
                
         $sql="select email from admin where email='$eml' and password='$pwd'";
        $res=mysqli_query($con,$sql);
        $re=mysqli_num_rows($res);
                

                if($re!=0)   
        

                     header("location:adminmain.html");
                      
                
                else
                    echo '<script language="javascript">';
                      echo 'alert("Invalid User name and  password")';
                    echo '</script>';
                    exit;
                    header("location:adminlogin.php");

        }
    
    ob_end_flush();

?>
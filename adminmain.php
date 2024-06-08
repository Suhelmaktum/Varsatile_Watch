<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="adminmain.css">
<style>
	.menu {
  overflow: hidden;
  background-color: #333;
  width: 100%;
  padding: auto;
}

/* Navbar links */
.menu a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  width: 20%;
  padding: 20px;
  border: 1px solid #4CAF50;
}

.menu a:hover {
  background-color: #ddd;
  color: red;
  width: 20%;
}
.pagecontainer{
  width: 100%;
  height: 100%;
  }

.pagecontainer iframe{
  width: 100%;
  min-height: 100vh;
  background-color: white;
  background-image: url("Best-Affordable-Moon-Phase-Watches.jpg");
  background-size: cover;
 
}

</style>
</head>
<body style="text-align:center;" bgcolor="purple">
	<div align="right"><a href="adminlogout.php"><input type="button" name="check" class="button" value="Log Out"
	    			style="	background-color: black;
	    		min-width: 100px;
	    		color: #FFF;
	    		font: 15px/15px Arial, Helvetica, sans-serif;
	    		min-height: 30px;
	    		text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.26);
	    		border-radius: 3px;"></a> </br></br></div>
<div class="line"><h2>Online Watch Shopping</h2></div>

  	<div class="glow">ADMIN PANEL</div>

  	

    <div class="menu" align="center">
    	<a href="admincode.php" target="detail">View Product</a>
      <a href="productentry.html" target="detail">Product Entry</a>
      <a href="cust.php" target="detail">View Customer</a>
      <a href="vieworder.php" target="detail">View orders</a>
      <a href="final/report.php" target="detail">View Reports</a>
      </div>

  

     <div class="pagecontainer" align="center"> <iframe src="" name="detail" align="center" ></iframe></div> 

</body>

</html>

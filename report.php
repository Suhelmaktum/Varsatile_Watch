<!DOCTYPE html>
<html>
<head>
	<title></title>

<style>


form{
	margin-top: 5px;
	height: 50px;
}	 
table#t01 tr {
  background-color: black;
  color: white;
}
table#t02 tr {
  background-color: white;
  color: black;
  text-align: center;
  border-color: gray;
  height: 100px;	
	</style>
	<body>						
	<table width="60%" border="2" align="center" id="t01">
<tr align="center">
<td><h1>Reports</h1></td>
</tr>
</table>
<table align="center" cellpadding="10" border="2" width="60%" id="t02">
<tr align="center">
	<td>
		<form action="viewreport.php" method="post">
	</form>
		<a href="ex.php"><input type="button" name="check" class="button" value="View Watch Report"
	    			style="	background-color: #39b3d7;
	    		min-width: 250px;
	    		color: #FFF;
	    		font: 15px/15px Arial, Helvetica, sans-serif;
	    		min-height: 30px;
	    		text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.26);
	    		border-radius: 3px;"></a> </br></br>
		


		<a href="customer_report.php"><input type="button" name="check" class="button" value="View Customer Report"
	    			style="	background-color: #39b3d7;
	    		min-width: 250px;
	    		color: #FFF;
	    		font: 15px/15px Arial, Helvetica, sans-serif;
	    		min-height: 30px;
	    		text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.26);
	    		border-radius: 3px;"></a> </br></br>
				<?php
		echo "No Report Yet";
		?>
		
		<a href="ex1.php"><input type="button" name="check" class="button" value="View Customer With Watch Report"
	    			style="	background-color: #39b3d7;
	    		min-width: 100px;
	    		color: #FFF;
	    		font: 15px/15px Arial, Helvetica, sans-serif;
	    		min-height: 30px;
	    		text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.26);
	    		border-radius: 3px;"></a> </br></br>
	    <a href="custreport.php"><input type="button" name="check" class="button" value="Date Wise Report"
	    			style="	background-color: #39b3d7;
	    		min-width: 250px;
	    		color: #FFF;
	    		font: 15px/15px Arial, Helvetica, sans-serif;
	    		min-height: 30px;
	    		text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.26);
	    		border-radius: 3px;"></a> </br></br></br>
		
	</td>
</tr>
</table>

	</form>



</body>
</html>






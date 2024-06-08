<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body><center><h3>Brand Wise Report<h3>
	<form action="brandwisereport.php" method="post">
		<label for="brand">Select Brand :</label>
		<select name="brand">
			<option value="Fastrack">Fastrack</option>
			<option value="Sonata">Sonata</option>
			<option value="Citizen">Citizen</option>
			<option value="Fossil">Fossil</option>
			<option value="Titan">Titan</option>
		</select><br></br>
		<input type="submit" name="btn" value="submit">
	</form>
</center>
</body>
</html>

<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'Watch Details',0,1,'C');
	$this->Ln(10);
	//Ensure table header is output
	parent::Header();
}
}

include('connect.php');
//Connect to database
mysqli_connect('localhost','root','','watch');
//mysql_select_db('db');
if (isset($_POST['btn'])) {
	ob_start();
	$brand=$_POST['brand'];
$pdf=new PDF();
//$pdf->AddPage();
//First table: put all columns automatically
//$pdf->Table('select watch_name,price,brand,category from watch order by watch_id');
$pdf->AddPage();
//Second table: specify 3 columnsAddCol('watch_id',20,'','C');
$pdf->AddCol('orders_id',20,'Order Id');
$pdf->AddCol('watch_name',100,'Watch Name');
$pdf->AddCol('price',25,'Price');
$pdf->AddCol('brand',30,'Brand');
//$pdf->AddCol('watch_name',80,'Watch Names');

$pdf->AddCol('quantity',20,'Quantity');
$pdf->AddCol('total',20,'Total');


//$pdf->AddCol('pop',40,'Pop (2001)','R');
$prop=array('padding'=>3);
$pdf->Table("select orders_id,watch_name,price,brand,quantity,total from order_detail where brand='$brand' order by orders_id,watch_name,price,brand,quantity,total",$prop);
//$pdf->Table('select watch_id,watch_name,price,brand,category from watch order by watch_id limit 0,10',$prop);
$pdf->Output();
ob_end_flush();
}
?>

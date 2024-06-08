<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="watchdatewise.php " method="post">
		<input type="number" name="id" value="id">
		<input type="date" name="dt">
		<input type="date" name="date1">
		<input type="submit" name="btn" value="submit">
	</form>

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
	$this->Cell(0,6,'customer Details',0,1,'C');
	$this->Ln(10);
	//Ensure table header is output
	parent::Header();
}
}
include('connect.php');
//Connect to database
mysqli_connect('localhost','root','','watch');
if (isset($_POST['btn'])) {
	ob_start();
	$id1=$_POST['id'];
	$d1=$_POST['dt'];
	$d2=$_POST['date1'];

//mysql_select_db('db');

$pdf=new PDF();
//$pdf->AddPage();
//First table: put all columns automatically
//$pdf->Table('select watch_name,price,brand,category from watch order by watch_id');
$pdf->AddPage();
//Second table: specify 3 columnsAddCol('watch_id',20,'','C');
$pdf->AddCol('orders_id',20,'Order Id');
$pdf->AddCol('watch_name',65,'Watch name');
$pdf->AddCol('price',30,'Price');
$pdf->AddCol('brand',60,'Brand');
$pdf->AddCol('quantity',80,'Quantity');
$pdf->AddCol('total',25,'Total');


//$pdf->AddCol('pop',40,'Pop (2001)','R');
$prop=array(
			'padding'=>3);

$pdf->Table("select orders_id,watch_name,price,brand,quantity,total from order_detail where orders_id='$id1' and date between'$d1' and '$d2'",$prop);
//$pdf->Table('select watch_id,watch_name,price,brand,category from watch order by watch_id limit 0,10',$prop);
$pdf->Output();
ob_end_flush();
}
?>

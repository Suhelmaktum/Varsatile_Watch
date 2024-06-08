

<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'Customer With Product Report',0,1,'C');
	$this->Ln(10);
	//Ensure table header is output
	parent::Header();
}
}
include('connect.php');
//Connect to database
mysqli_connect('localhost','root','','watch');
//mysql_select_db('db');

$pdf=new PDF();
//$pdf->AddPage();
//First table: put all columns automatically
//$pdf->Table('select watch_name,price,brand,category from watch order by watch_id');
$pdf->AddPage();
//Second table: specify 3 columnsAddCol('watch_id',20,'','C');
$pdf->AddCol('orders_id',20,'Order Id');
$pdf->AddCol('user_name',65,'Customer name');
$pdf->AddCol('watch_name',100,'Watch Names');
$pdf->AddCol('price',25,'Price');
$pdf->AddCol('quantity',20,'Quantity');
$pdf->AddCol('date',30,'Date');
$pdf->AddCol('total',20,'Total');



//$pdf->AddCol('pop',40,'Pop (2001)','R');
$prop=array(
			'padding'=>3);
$pdf->Table('select user_name,order_master.orders_id,order_master.date,watch_name,price,quantity,total from customer,order_detail,order_master where user_id=customer_id and order_detail.orders_id=order_master.orders_id',$prop);
//$pdf->Table('select watch_id,watch_name,price,brand,category from watch order by watch_id limit 0,10',$prop);
$pdf->Output();
?>

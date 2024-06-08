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

$pdf=new PDF();
//$pdf->AddPage();
//First table: put all columns automatically
//$pdf->Table('select watch_name,price,brand,category from watch order by watch_id');
$pdf->AddPage();
//Second table: specify 3 columnsAddCol('watch_id',20,'','C');
$pdf->AddCol('orders_id',20,'order id');
$pdf->AddCol('user_name',60,'user name');
$pdf->AddCol('date',30,'date');
$pdf->AddCol('watch_name',80,'watch Names');
$pdf->AddCol('price',25,'price');
$pdf->AddCol('quantity',20,'quantity');
$pdf->AddCol('category',20,'Category');
$pdf->AddCol('total',20,'total');


//$pdf->AddCol('pop',40,'Pop (2001)','R');
$prop=array(
			'padding'=>3);
$pdf->Table('select user_name,order_master.orders_id,watch_id,date,watch_name,price,quantity,category,total from customer,order_detail,order_master,watch where user_id=customer_id and order_master.orders_id=order_detail.orders_id and date',$prop);
//$pdf->Table('select watch_id,watch_name,price,brand,category from watch order by watch_id limit 0,10',$prop);
$pdf->Output();
?>

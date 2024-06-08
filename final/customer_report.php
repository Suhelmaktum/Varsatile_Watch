<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'Customer Report',0,1,'C');
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
$pdf->AddCol('user_id',20,'user id');
$pdf->AddCol('user_name',65,'Customer name');
$pdf->AddCol('contact',30,'Contact');
$pdf->AddCol('email',60,'Email');
$pdf->AddCol('address',80,'Address');
$pdf->AddCol('date',25,'date');


//$pdf->AddCol('pop',40,'Pop (2001)','R');
$prop=array(
			'padding'=>3);
$pdf->Table('select user_id, user_name,contact,email,address,date from customer order by user_id,user_name,contact,email,address,date',$prop);
//$pdf->Table('select watch_id,watch_name,price,brand,category from watch order by watch_id limit 0,10',$prop);
$pdf->Output();
?>

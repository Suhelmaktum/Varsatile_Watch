<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'Customer Detail',0,1,'C');
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
/*$pdf->Table('select user_id,user_name,contact,email,address from customer order by user_id');*/
$pdf->AddPage();
//Second table: specify 3 columns
$pdf->AddCol('user_id',20,'','C');
$pdf->AddCol('user_name',40,'customer Names');
$pdf->AddCol('contact',40,'Contact');
$pdf->AddCol('email',40,'Email');
$pdf->AddCol('address',40,'Address');
//$pdf->AddCol('pop',40,'Pop (2001)','R');
$prop=array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,210),
			'padding'=>2);
$pdf->Table('select user_id,user_name,contact,email,address from customer order by user_id limit 0,10',$prop);
$pdf->Output();
?>

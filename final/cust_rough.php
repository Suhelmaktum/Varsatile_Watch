<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="cust_rough.php" method="post">
		<select name="cust">
			<?php
				include("connect.php");
				$q="select * from watch";
				$res=mysqli_query($con,$q);
				while ($row=mysqli_fetch_row($res)) {
					?>
					<option><?php echo $row[2];?></option>
					<?php
				}
			?>
		</select>
		<input type="submit" name="btn">
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
$prop=array(
			'padding'=>3);

$pdf->Table("select orders_id,user_name,price,brand,quantity,total from customer where watch_name='$brand' order by orders_id");

//$pdf->Table('select watch_id,watch_name,price,brand,category from watch order by watch_id limit 0,10',$prop);
$pdf->Output();
ob_end_flush();
}
?>

<?php
$category= $_POST['category'];
echo $category;exit();
$rs = array();
include("connect.php");
$sql = "SELECT *  FROM brand WHERE cat_id = ".$category."";
$query = mysqli_query($con,$sql);
while ($row = mysqli_fetch_assoc($query)) {
	$rs[] = $row;
}

print_r($rs);exit();
foreach ($rs as $key => $rs) {
	$html = "<option value=".$rs['id'].">..</option>";
}

?>
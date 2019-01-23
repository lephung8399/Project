<?php
if(isset($_GET["txtMa"])&&isset($_GET["txtTen"]))
{
	$maTL=$_GET["txtMa"];
	$tenTL=$_GET["txtTen"];
	include("../connectDb/open.php");
	$sql = "UPDATE `tblTheLoai` SET tenTheLoai ='$tenTL' where maTheLoai=$maTL";
	echo $sql;
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:home.php?dog=2");
}else{
	header("Location:home.php?dog=2");
}
?>
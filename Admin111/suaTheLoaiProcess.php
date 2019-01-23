<?php
if(isset($_GET["txtMa"])&&isset($_GET["txtTenTL"]))
{
	$maTL=$_GET["txtMa"];
	$tenTL=$_GET["txtTenTL"];
	include("../connectDb/open.php");
	mysqli_query($con,"UPDATE `tblTheLoai` SET `maTheLoai`=$maTL,`tenTheLoai`='$tenTL' where maTheLoai=$maTL");
	mysqli_close($con);
	header("Location:index.php");
}else{
	header("Location:index.php");
}
?>
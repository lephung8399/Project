<?php
if(isset($_GET["txtTenTL"]))
{
	$tenTL=$_GET["txtTenTL"];

	include("../connectDb/open.php");
	mysqli_query($con,"INSERT INTO `tbltheloai`(`tenTheLoai`) VALUES ('$tenTL')");
	include("../connectDb/close.php");;
	header("Location:index.php?dog=2");

}else{
	header("Location:themTheLoai.php");
}
?>
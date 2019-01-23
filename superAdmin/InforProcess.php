<?php
if(isset($_GET["txtma"])&&isset($_GET["txtTenTK"])&&isset($_GET["txtPass"])&&isset($_GET["txtEmail"])&&isset($_GET["txtMaQuyen"]))
{
	$maTaiKhoan=$_GET["txtma"];
	$tenTaiKhoan=$_GET["txtTenTK"];
	$pass=$_GET["txtPass"];
	$email=$_GET["txtEmail"];
	$maquyen=$_GET["txtMaQuyen"];
	include("../connectDb/open.php");
	mysqli_query($con,"UPDATE `tbladmin` SET `maTaiKhoan`=$maTaiKhoan,`tenTaiKhoan`='$tenTaiKhoan',`password`='$pass',`email`='$email',`maQuyen`=$maquyen WHERE maTaiKhoan=$maTaiKhoan");

	include("../connectDb/close.php");
	header("location:index.php?dog=1");
}else{
	header("Location:index.php?dog=1");
}
?>


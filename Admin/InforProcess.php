<?php
if(isset($_GET["txtma"])&&isset($_GET["txtTenAdmin"])&&isset($_GET["txtTenTK"])&&isset($_GET["txtPass"])&&isset($_GET["txtEmail"]))
{
	$maTaiKhoan=$_GET["txtma"];
	$txtTenAdmin=$_GET["txtTenAdmin"];
	$tenTaiKhoan=$_GET["txtTenTK"];
	$pass=$_GET["txtPass"];
	$email=$_GET["txtEmail"];
	include("../connectDb/open.php");
	$sql="UPDATE `tbladmin` SET `maTaiKhoan`=$maTaiKhoan,`tenAdmin`='$txtTenAdmin',`tenTaiKhoan`='$tenTaiKhoan',`password`='$pass',`email`='$email' WHERE maTaiKhoan=$maTaiKhoan";
	mysqli_query($con,$sql);
	// echo $sql;
	// mysqli_query($con,"UPDATE `tbladmin` SET `maTaiKhoan`=$maTaiKhoan,`tenTaiKhoan`='$tenTaiKhoan',`password`='$pass',`email`='$email',`maQuyen`=$maquyen WHERE maTaiKhoan=$maTaiKhoan");


	include("../connectDb/close.php");
	header("location:home.php?dog=1");
}else{
	header("Location:home.php?dog=1");
}
?>


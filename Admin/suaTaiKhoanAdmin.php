<?php
if(isset($_GET["txtMa"])&&isset($_GET["txtTen"])&&isset($_GET["txtUser"])&&isset($_GET["txtPass"])&&isset($_GET["txtEmail"]))
{
	$maAdmin=$_GET["txtMa"];
	$tenAdmin=$_GET["txtTen"];
	$txtUser=$_GET["txtUser"];
	$txtPass=$_GET["txtPass"];
	$txtEmail=$_GET["txtEmail"];
	include("../connectDb/open.php");
	$sql = "UPDATE `tbladmin` SET tenAdmin ='$tenAdmin', tenTaiKhoan='$txtUser', password='$txtPass', email='$txtEmail' where maTaiKhoan=$maAdmin";
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:home.php?dog=6");
}else{
	header("Location:home.php?dog=6");
}
?>
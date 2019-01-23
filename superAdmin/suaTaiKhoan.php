<?php
if(isset($_GET["txtMa"])&&isset($_GET["txtTen"])&&isset($_GET["txtPass"])&&isset($_GET["txtEmail"])&&isset($_GET["txtMaQuyen"]))
{
	$maTK=$_GET["txtMa"];
	$tenTK=$_GET["txtTen"];
	$txtPass=$_GET["txtPass"];
	$txtEmail=$_GET["txtEmail"];
	$txtMaQuyen=$_GET["txtMaQuyen"];


	include("../connectDb/open.php");
	$sql = "UPDATE `tbladmin` SET tenTaiKhoan ='$tenTK',password='$txtPass',email='$txtEmail',maQuyen=$txtMaQuyen where maTaiKhoan=$maTK";
	echo $sql;
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:index.php?dog=5");
}else{
	header("Location:index.php?dog=5");
}
?>
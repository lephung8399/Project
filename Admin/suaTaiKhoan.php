<?php
if(isset($_GET["txtMa"])&&isset($_GET["txtUser"])&&isset($_GET["txtPass"])&&isset($_GET["txtTen"])&&isset($_GET["txtEmail"])&&isset($_GET["txtDiaChi"])&&isset($_GET["txtGT"]))
{
	$maTK=$_GET["txtMa"];
	$txtUser=$_GET["txtUser"];
	$txtPass=$_GET["txtPass"];
	$txtTen=$_GET["txtTen"];
	$txtEmail=$_GET["txtEmail"];
	$txtDiaChi=$_GET["txtDiaChi"];
	$txtGT=$_GET["txtGT"];
	echo $txtGT;


	include("../connectDb/open.php");
	$sql = "UPDATE `tbldocgia` SET User ='$txtUser',Pass='$txtPass',tenDocGia='$txtTen',email='$txtEmail',diaChi='$txtDiaChi',gioiTinh=$txtGT where maDocGia=$maTK";
	echo $sql;
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:home.php?dog=5");
}else{
	header("Location:home.php?dog=5");
}
?>
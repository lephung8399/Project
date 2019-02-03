<?php
if(isset($_GET["txtTen"])&&isset($_GET["txtUser"])&&isset($_GET["txtPass"])&&isset($_GET["txtEmail"])&&isset($_GET["Quyen"]))
{	
	$txtTen=$_GET["txtTen"];
	$txtUser=$_GET["txtUser"];
	$txtPass=$_GET["txtPass"];
	$txtEmail=$_GET["txtEmail"];
	$Quyen=$_GET["Quyen"];

	include("../connectDb/open.php");
	$sql = "INSERT INTO `tbladmin`( `tenAdmin`, `tenTaiKhoan`, `password`, `email`, `maQuyen`,tinhTrang) VALUES ('$txtTen','$txtUser','$txtPass','$txtEmail','$Quyen',1)";
	echo $sql;
	mysqli_query($con, $sql);
	include("../connectDb/close.php");
	 header("Location:home.php?dog=6");
}else{
header("Location:index.php");
}
?>
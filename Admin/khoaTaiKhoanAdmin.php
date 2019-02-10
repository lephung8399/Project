<?php
if(isset($_GET["maTaiKhoan"])){
	$maTaiKhoan=$_GET["maTaiKhoan"];
	include("../connectDb/open.php");
	$sql="UPDATE tbladmin set tinhTrang=0 where maTaiKhoan=$maTaiKhoan";
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("location:home.php?dog=6");
}else{
	header("location:home.php?dog=6");
}
?>
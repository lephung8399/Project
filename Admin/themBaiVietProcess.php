<?php
session_start();
if(isset($_POST["txtTieuDe"])&&isset($_POST["txtMoTa"])&&isset($_POST["txtTomTat"])&&isset($_POST["txtNoiDung"])&&isset($_POST["txtDate"])&&isset($_POST["txtAnh"])&&isset($_SESSION['maTaiKhoan']))
{	
	$tieude=$_POST["txtTieuDe"];
	$mota=$_POST["txtMoTa"];
	$tomtat=$_POST["txtTomTat"];
	$noidung=$_POST["txtNoiDung"];
	$date=$_POST["txtDate"];
	$maTL=$_POST["theLoai"];
	$maAnh=$_POST["txtAnh"];
	$nguoiDung=$_SESSION['maTaiKhoan'];

	include("../connectDb/open.php");
	$sql = "INSERT INTO `tbltintuc`(`tieuDe`, maTheLoai,`moTa`, `tomTat`, `noiDung`,`ngay`,URLanh,soLuotXem,maTaiKhoan) VALUES ('$tieude',$maTL,'$mota','$tomtat','$noidung','$date','$maAnh','0','$nguoiDung')";
	// echo $sql;

	mysqli_query($con, $sql);
	include("../connectDb/close.php");
	header("Location:home.php?dog=3");
}else{
	header("Location:themBaiViet.php");
}
?>
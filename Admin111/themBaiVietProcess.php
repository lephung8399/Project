<?php
if(isset($_GET["txtTieuDe"])&&isset($_GET["txtMoTa"])&&isset($_GET["txtTomTat"])&&isset($_GET["txtNoiDung"])&&isset($_GET["txtDate"]))
{	
	$tieude=$_GET["txtTieuDe"];
	$mota=$_GET["txtMoTa"];
	$tomtat=$_GET["txtTomTat"];
	$noidung=$_GET["txtNoiDung"];
	$date=$_GET["txtDate"];
	include("../connectDb/open.php");
	mysqli_query("INSERT INTO `tbltintuc`(`tieuDe`, `moTa`, `tomTat`, `noiDung`,`ngay`) VALUES ('$tieude','$mota','$tomtat','$noidung','$date')");
	include("../connectDb/close.php");
	header("Location:index.php");
}else{
header("Location:themBaiViet.php");
}
?>
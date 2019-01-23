<?php
if(isset($_GET["txtTieuDe"])&&isset($_GET["txtMoTa"])&&isset($_GET["txtTomTat"])&&isset($_GET["txtNoiDung"])&&isset($_GET["txtDate"]))
{	
	$tieude=$_GET["txtTieuDe"];
	$mota=$_GET["txtMoTa"];
	$tomtat=$_GET["txtTomTat"];
	$noidung=$_GET["txtNoiDung"];
	$date=$_GET["txtDate"];
	$maTL=$_GET["theLoai"];
	include("../connectDb/open.php");
	$sql = "INSERT INTO `tbltintuc`(`tieuDe`, maTheLoai,`moTa`, `tomTat`, `noiDung`,`ngay`) VALUES ('$tieude',$maTL,'$mota','$tomtat','$noidung','$date')";
	echo $sql;
	mysqli_query($con, $sql);
	include("../connectDb/close.php");
	 header("Location:index.php?dog=3");
}else{
header("Location:themBaiViet.php");
}
?>
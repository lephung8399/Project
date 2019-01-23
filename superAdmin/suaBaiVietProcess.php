<?php
if(isset($_GET["txtMa"])&&isset($_GET["txtTieuDe"])&&isset($_GET["txtMoTa"])&&isset($_GET["txtTomTat"])&&isset($_GET["txtNoiDung"])&&isset($_GET["txtNgay"]))
{
	$maTin=$_GET["txtMa"];
	$tieude=$_GET["txtTieuDe"];
	$mota=$_GET["txtMoTa"];
	$tomtat=$_GET["txtTomTat"];
	$noidung=$_GET["txtNoiDung"];
	$ngay=$_GET["txtNgay"];
	include("../connectDb/open.php");
	mysqli_query($con,"UPDATE `tbltintuc` SET `tieuDe`='$tieude',`moTa`='$mota',`tomTat`='$tomtat',`noiDung`='$noidung',`ngay`='$ngay'  WHERE maTin=$maTin");
	mysqli_close($con);
	header("Location:index.php?dog=3");

}else{
		header("Location:index.php?dog=3");

}
?>
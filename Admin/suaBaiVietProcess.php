<?php
if(isset($_POST["txtMa"])&&isset($_POST["txtTieuDe"])&&isset($_POST["txtMoTa"])&&isset($_POST["txtTomTat"])&&isset($_POST["txtNoiDung"])&&isset($_POST["txtNgay"]))
{
	$maTin=$_POST["txtMa"];
	$tieude=$_POST["txtTieuDe"];
	$mota=$_POST["txtMoTa"];
	$tomtat=$_POST["txtTomTat"];
	$noidung=$_POST["txtNoiDung"];
	$ngay=$_POST["txtNgay"];
	include("../connectDb/open.php");
	mysqli_query($con,"UPDATE `tbltintuc` SET `tieuDe`='$tieude',`moTa`='$mota',`tomTat`='$tomtat',`noiDung`='$noidung',`ngay`='$ngay'  WHERE maTin=$maTin");
	mysqli_close($con);
	header("Location:home.php?dog=3");

}else{
		header("Location:home.php?dog=3");

}
?>
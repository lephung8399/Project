<?php
if(isset($_GET["maDocGia"])){
	$maDocGia=$_GET["maDocGia"];
	include("../connectDb/open.php");
	$sql="UPDATE tbldocgia set tinhTrang=1 where maDocGia=$maDocGia";
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("location:home.php?dog=5");
}else{
	header("location:home.php?dog=5");
}
?>
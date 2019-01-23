<?php
if(isset($_GET["id"]))
{
	$maTaiKhoan=$_GET["id"];
	include("../connectDb/open.php");
	$sql=("delete from tbladmin where maTaiKhoan=$maTaiKhoan");
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:index.php?dog=5");
}else{
	header("Location:index.php?dog=5");
}

?>
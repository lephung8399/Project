<?php
if(isset($_GET["id"]))
{
	$maTin=$_GET["id"];
	include("../../ConnectDemo/open.php");
	$sql=("delete from tbladmin where maTaiKhoan=$maTin");
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:home.php?dog=6");
}else{
	header("Location:home.php?dog=6");
}
?>
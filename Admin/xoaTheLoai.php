<?php
if(isset($_GET["id"]))
{
	$maTheLoai=$_GET["id"];
	include("../connectDb/open.php");
	$sql=("delete from tblTheLoai where maTheLoai=$maTheLoai");
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:home.php?dog=2");
}else{
	header("Location:home.php?dog=2");
}

?>
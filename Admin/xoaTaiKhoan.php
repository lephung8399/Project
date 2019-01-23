<?php
if(isset($_GET["id"]))
{
	$maDocGia=$_GET["id"];
	include("../connectDb/open.php");
	$sql=("delete from tbldocgia where maDocGia=$maDocGia");
	
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:home.php?dog=5");
}else{
	header("Location:home.php?dog=5");
}

?>
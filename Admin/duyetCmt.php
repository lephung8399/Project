<?php
if(isset($_GET["maCmt"]))
{
	$maCmt=$_GET["maCmt"];
	include("../connectDb/open.php");
	$sql="UPDATE tblcmt set tinhTrang=1 where maCmt=$maCmt";
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:home.php?dog=4");
}else{
	header("Location:home.php?dog=4");

}
?>
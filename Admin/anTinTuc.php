<?php
if(isset($_GET["maTin"]))
{
	$maTin=$_GET["maTin"];
	include("../connectDb/open.php");
	$sql="UPDATE tblTinTuc set tinhTrang=0 where maTin=$maTin";
	echo $sql;
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:home.php?dog=3");
}else{
	header("Location:home.php?dog=3");

}
?>
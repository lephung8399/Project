<?php
if(isset($_GET["id"]))
{
	$maTin=$_GET["id"];
	include("../connectDb/open.php");
	$sql=("delete from tbltintuc where maTin=$maTin");
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:home.php?dog=3");
}else{
	header("Location:home.php?dog=3");
}
?>
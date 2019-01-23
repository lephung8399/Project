<?php
if(isset($_GET["id"]))
{
	$maTin=$_GET["id"];
	include("../../ConnectDemo/open.php");
	$sql=("delete from tbltintuc where maTin=$maTin");
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:index.php?dog=3");
}else{
	header("Location:index.php?dog=3");
}
?>
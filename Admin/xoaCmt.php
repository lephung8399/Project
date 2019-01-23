<?php
if(isset($_GET["id"]))
{
	$maCmt=$_GET["id"];
	include("../connectDb/open.php");
	$sql="delete from tblcmt where maCmt=$maCmt";
	mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:home.php?dog=4");
}else
{
	header("Location:home.php?dog=4");

}
?>
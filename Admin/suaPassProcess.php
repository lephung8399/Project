<?php 
	session_start();
	if( isset($_POST['tntPass']) )
		{

		$pass = $_POST['tntPass'];
		$ma=$_POST["ma"];
			include("../connectDb/open.php");
			$sql  = "UPDATE tblAdmin SET password = '$pass' WHERE maTaiKhoan='$ma' ";
			echo $sql;
			$query = mysqli_query($conn,$sql);
			 
			 mysqli_close($conn);
		}
		header('location: ../index.php');
 ?>
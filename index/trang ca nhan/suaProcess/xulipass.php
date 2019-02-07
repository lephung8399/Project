<?php 
	session_start();
	if( isset($_POST['tntPass']) )
		{

		$pass = $_POST['tntPass'];
		$ma=$_POST["ma"];
			$conn = new mysqli("localhost", "root", "", "project");
			$sql  = "UPDATE tbldocgia SET Pass = '$pass' WHERE maDocGia='$ma' ";
			echo $sql;
			$query = mysqli_query($conn,$sql);
			 
			 mysqli_close($conn);
		}
		header('location: ../index.php');
 ?>
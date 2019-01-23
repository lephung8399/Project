<?php 
	session_start();
	if( isset($_POST['tntDiaChi']) && isset($_POST['tntEmail']) && isset($_POST['tntHoTen']))
		{
		$diachi = $_POST['tntDiaChi'];
		$email = $_POST['tntEmail'];
		$hoten = $_POST['tntHoTen'];
		/*$pass = $_POST['tntPass'];*/
		$ma=$_POST["ma"];
			$conn = new mysqli("localhost", "root", "", "project");
			$sql  = "UPDATE tbldocgia SET diaChi = '$diachi' , email = '$email', tenDocGia='$hoten' WHERE maDocGia='$ma' ";
			echo $sql;
			$query = mysqli_query($conn,$sql);
			 
			 mysqli_close($conn);
		}
		header("location: ../index.php");
 ?>
 
<?php 
	session_start();
	if(isset($_POST['txtUser']) && isset($_POST['txtPass']))
	{
		include("../connectDb/open.php");
		$user = $_POST['txtUser'];
		$pass = $_POST['txtPass'];
		mysqli_set_charset($con, 'utf8');
		$sql="select * from tbladmin where (tenTaiKhoan = '$user' or email = '$user') and password = '$pass'";
		$result = mysqli_query($con, $sql);
		echo $sql;
		$row = mysqli_num_rows($result);
		if($row == 0) {
			header("location: index.php?err=1");
			mysqli_close($con);
		}
		else
		{
			while ($USER = mysqli_fetch_array($result)) {
				$_SESSION['tenTaiKhoan'] = $USER['tenTaiKhoan'];
				echo $_SESSION['tenTaiKhoan'];
				$_SESSION['maTaiKhoan'] = $USER['maTaiKhoan'];
				echo $_SESSION['maTaiKhoan'];
				$_SESSION['maQuyen'] = $USER['maQuyen'];
				echo $_SESSION['maQuyen'];
			}
			header("location:home.php");
			mysqli_close($con);	
		}
	}
?>
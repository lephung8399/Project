<?php 
		session_start();
	if(isset($_POST['txtcmt'])&&isset($_POST['maDocGia'])&&isset($_POST['maTin'])) {
		$cmt = ($_POST['txtcmt']);
		$maTin= ($_POST['maTin']);
		$maDocGia= ($_POST['maDocGia']);

			$conn = new mysqli("localhost", "root", "", "project");
			mysqli_set_charset($conn,'utf8');
			$sql = "INSERT INTO `tblcmt`( `noiDungCmt`,maTin,maDocGia) VALUES ('$cmt',$maTin,$maDocGia)";
			mysqli_query($conn, $sql);
 			mysqli_close($conn);
 			header("Location:../chiTietTinTuc.php?maTin=$maTin");
 			
 			/*echo $sql;*/
	}
 ?>
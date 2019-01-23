<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>suaDiaChi</title>
</head>
<body>
		<?php
	if(isset($_GET["id"]))
	{
	
		$id=$_GET["id"];
	?>
		<!-- <form method="POST" action="xuli.php" > -->
		Địa Chỉ: <input type="text" name="tntDiaChi" id="textDiaChi">
		<span id="errDiaChi"></span>
		<button type="submit" name="ma" value="<?php echo $id;?>">Thay Đổi</button>
	<!-- </form> -->
		<?php
	}
	?>
	<?php 
		session_start();
	if(isset($_POST['txtcmt'])) {
		$cmt = ($_POST['txtcmt']);
			$conn = new mysqli("localhost", "root", "", "project");
			$sql = "INSERT INTO `tblcmt`( `noiDungCmt`) VALUES ('$cmt')";
			mysqli_query($conn, $sql);
 			mysqli_close($conn);
 			/*echo $sql;*/
	}
 ?>
</body>
</html>
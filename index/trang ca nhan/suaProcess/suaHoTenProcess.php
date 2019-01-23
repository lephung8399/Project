<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>suaHoTen</title>
	<link rel="stylesheet" href="xuli.php">
</head>
<body>
	<?php
	if(isset($_GET["id"]))
	{
	
		$id=$_GET["id"];
	?>
	<form method="POST" action="xuli.php"   >
	Họ Tên: <input type="text"  name="tntHoTen" id="txtHo"><br>
	Email: <input type="email" name="tntEmail" id="txtEmail"><br>
	Địa Chỉ: <input type="text" name="tntDiaChi" id="textDiaChi"><br>
	<button type="submit" name="ma" value="<?php echo $id;?>">Thay Đổi</button><br>
	</form>
	<?php
	}
	?>
</body>
</html>

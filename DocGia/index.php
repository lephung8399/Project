<?php
include("../connectDb/open.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../Css/cssDocGia.css">
</head>

<body>
	<div id="main">
		<div id="header">
			<div id="lienHe">
				<div style="margin: auto; padding-top: 40px; display: flex; align-items: center;">
					<h4 style="font-family: sans-serif; margin-right: 5px; display: inline-block;">	LIÊN KẾT VỚI CHÚNG TÔI:
					</h4>
					<a href="https:www.facebook.com/hunglephu99"><img src="https://img.icons8.com/windows/32/000000/facebook.png"></a>
					<a href="https://www.instagram.com/hungleph/"><img src="https://img.icons8.com/windows/32/000000/instagram-new.png"></a>
					
				</div>
			</div>
			<div id="logo"></div>
			<div id="SearchLogin">
				<div id="khongdelamgi"></div>
				<div id="timKiem" style="margin: auto;  display: flex; align-items: center;">
					<form style="padding-top: 40px margin-right: 5px; display: inline-block;">
						<input type="search" name="Search" placeholder="Nhập Từ Khóa Tìm Kiếm... " >
						<img src="https://img.icons8.com/material/30/000000/search.png">
						 
					</form>
				</div>
				<div id="taiKhoan" style="margin: auto; padding-top: 40px">
					<a href="dangNhap.php"><img src="https://img.icons8.com/ios-glyphs/30/000000/user.png"></a>
				</div>
			</div>
		</div>
			<div id="mainMenu">
				<div id="containerMenu" >
					<?php $sql="select * from tbltheloai order by maTheLoai limit 4";
						$result=mysqli_query($con,$sql);
						 ?>
					<ul id="menu" >
						<li>
							<a href="index.php">Trang Chủ </a>
						</li><?php
						while($menuTheLoai=mysqli_fetch_array($result)){ ?>
						<li>
							<a href="chiTietTheLoai.php?maTheLoai=<?php echo($menuTheLoai["maTheLoai"]);?>"><?php echo($menuTheLoai["tenTheLoai"]);?></a>
						</li>
						<?php 
							}
						?>
						<li>
							<a href="#">Liên Hệ</a>
						</li>
					</ul>
					
				</div>
			</div>
			
			<div id="space"></div>
			<div id="content"></div>
	</div>
</body>
</html>
<!-- <table border="1">
	<h1>Thông Tin Cá Nhân</h1>
	<?php 
		while ($a = mysqli_fetch_array($sql)) {
	?>
	<tr>
		<td>User:</td>
		<td>
			<?php
					echo ($a["User"]); ?>
		</td>
		<td></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td>
			<?php echo ($a["Pass"]); ?>
			
		</td>
		<td><a href="suapassProcess.html">Sửa</a></td>
	</tr>
	<tr>
		<td>Họ Tên:</td>
		<td>
			<?php echo ($a["tenDocGia"]);?>
			
		</td>
		<td><a href="suaHoTenProcess.html">Sửa</a></td>
	</tr>
	<tr>
		<td>Địa Chỉ:</td>
		<td>
			<?php echo ($a["diaChi"]); ?>
			
		</td>
		<td><a href="suaDiaChiProcess.html">Sửa</a></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td>
			<?php echo ($a["email"]);?>
			
		</td>
		<td><a href="suaEmailProcess.html">Sửa</a></td>
	</tr>
	<?php

}
	?>
</table> -->

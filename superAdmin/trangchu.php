<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
<!-- 	<link rel="stylesheet" type="text/css" href="../Css/CssAdmin.css">
 --></head>
<body>

	<!-- <div id="main">
		
		
		<div id="info">
		<h1 style="padding-left: 10px; font-family: monospace; ">Chào mừng đến với Trang Chủ SuperAdmin</h1><br>
		<a href="#" style="text-decoration: none; margin-left: 200px; font-size: 25px; font-family: sans-serif;"><strong>Thông tin cá nhân</strong></a>
		<?php

		include("../connectDb/open.php");
		$sql=("select * from tbladmin");
		$result=mysqli_query($con,$sql);
		while($infor=mysqli_fetch_array($result))
		{
		?>
				<table id="tableInfor">
					<tr>
						<td>Mã Tài Khoản:</td>
						<td>
							<?php echo ($infor["maTaiKhoan"]);?>
						</td>
					</tr>
					<tr>
						<td>Tên Tài Khoản</td>
						<td>
							<?php echo ($infor["tenTaiKhoan"]);?>
						</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>
							<?php echo ($infor["email"]);?>
						</td>
					</tr>
					<tr>
						<td>Mã Quyền</td>
						<td>
							<?php echo ($infor["maQuyen"]);?>
						</td>
					</tr>
					<tr>
						<td ></td>
						<td>
							<a href="capNhatInforAdmin.php?id=<?php echo($infor["maTaiKhoan"]);?>" style="text-decoration: none;font-size: 25px; font-family: sans-serif;">Cập Nhật</a>

						</td>
						
					</tr>
					<?php
				}
					?>
				</table>
				<?php 
				include("../connectDb/close.php");
				?>


		</div>
		<div id="quanLiTheLoai">
			<a href="#" style="text-decoration: none;  font-size: 27px; font-family: sans-serif;"><strong>Quản lí thể loại</strong></a>
			<?php
			include("../connectDb/open.php");
			$sql=("select * from tblTheLoai");
			$result=mysqli_query($con,$sql); 
			?>
			<table border="2px"; cellspacing="3" cellpadding="5" style="width: 100%">
				<tr >
					<th style="width: 10%">Mã Thể Loại</th>
					<th style="width: 40%">Tên Thể Loại</th>
					<th style="width: 50%">Chức năng</th>
				</tr>
			<?php
			while($theloai=mysqli_fetch_array($result)){
				?>

				<tr>
					<td><?php echo ($theloai["maTheLoai"]); ?></td>
					<td><?php echo ($theloai["tenTheLoai"]); ?></td>
					<td>
						<a href="suaTheLoai.php?id=<?php echo($theloai["maTheLoai"]);?>">Sửa</a>
						<a href="xoaTheLoai.php?id=<?php echo($theloai["maTheLoai"]);?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
					</td>
				</tr>				
				<?php
			}
			?>
			</table>
			<br>
			<p>
			<a href="themTheLoai.php" style="font-size: 20px; text-decoration: none; font-family: sans-serif; margin-left:300px">Thêm thể loại</a>
			<?php
			include("../connectDb/close.php");
			?>
			
			
		</div>
		<br>
		<div id="quanLiBaiViet">
			<a href="#" style="text-decoration: none;  font-size: 27px; font-family: sans-serif;"><strong>Quản lí Bài viết</strong></a>
			<br>
			<?php
			include("../connectDb/open.php");
			$sql=("select * from tbltintuc");
			$result= mysqli_query($con,$sql);

			?>
			<table border="2px"; cellspacing="3" cellpadding="5" style="width: 100%">
				<tr>
					<th style="width: 10%">Mã tin</th>
					<th style="width: 10%">Mã Thể Loại</th>
					<th style="width: 40%">Tiêu Đề</th>
					<th style="width: 10%">Ngày đăng</th>
					<th style="width: 10%">Số Lượt xem</th>
					<th style="width: 20%">Chức năng</th>
				</tr>
				<?php
				while($tintuc=mysqli_fetch_array($result)){
					?>
					<tr>
						<td><?php echo ($tintuc["maTin"]); ?></td>
						<td><?php echo ($tintuc["maTheLoai"]); ?></td>
						<td><?php echo ($tintuc["tieuDe"]); ?></td>
						<td><?php echo ($tintuc["ngay"]); ?></td>
						<td><?php echo ($tintuc["soLuotXem"]); ?></td>
						<td>
							<a href="suaBaiViet.php?id=<?php echo($tintuc["maTin"]);?>">Sửa</a>
							<a href="xoaBaiViet.php?id=<?php echo($tintuc["maTin"]);?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
							<a href="#">Xem tin</a>
						</td>
					</tr>
					<?php 
				}
				?>
			</table>
			<br>
			<a href="themBaiViet.php" style="font-size: 20px; text-decoration: none; font-family: sans-serif; margin-left:300px">Thêm Bài Viết</a>
			<?php
			include("../connectDb/close.php");
			?>
		</div>
		<div id="quanLiTaiKhoan"></div>
		<div id="quanLiBTV"></div>
		<div id="thongKe"></div>
		<div id="quanLiCmt"></div>
	</div> -->
</body>
</html>
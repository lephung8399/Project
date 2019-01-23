<?php
if(!isset($_SESSION['maQuyen'])) header("location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản Lí Tài Khoản</title>
</head>
<body>
	<a href="#" style="text-decoration: none;  font-size: 27px; font-family:  monospace;"><strong>Quản lí tài khoản độc giả</strong></a>
	<?php
	include("../connectDb/open.php");
	mysqli_set_charset($con,'utf8');
	$sql=("select * from tbldocgia");
	$result=mysqli_query($con,$sql); 

	?>
		<table border="2px"; cellspacing="3" cellpadding="0" style="width: 100%">
			<tr>
				<th style="width: 5%">Mã Tài Khoản</th>
				<th style="width: 10%">Tên Tài Khoản</th>
				<th style="width: 10%">Mật Khẩu</th>
				<th style="width: 15%">Tên Độc Giả</th>
				<th style="width: 10%">Email</th>
				<th style="width: 5%">Địa Chỉ</th>
				<th style="width: 15%">Giới Tính</th>
				<th style="width: 10%">Quyền Hạn</th>
				<th style="width: 20%">Chức năng</th>
			</tr>
			<?php
			while($taikhoan=mysqli_fetch_array($result)){
				?>
			<form action="suaTaiKhoan.php">
				<tr>
					<td>
						<input type="text" name="txtMa" style="width: 20%" value="<?php echo($taikhoan["maDocGia"]);?>" readonly="readonly" >
						</td>
					<td>
						<input type="text" name="txtUser" value="<?php echo($taikhoan["User"]);?>" >
					</td>
					<td>
						<input type="password" name="txtPass" value="<?php echo($taikhoan["Pass"]);?>" >
					</td>
					<td>
						<input type="text" name="txtTen" value="<?php echo($taikhoan["tenDocGia"]);?>" >
					</td>
					<td>
						<input type="text" name="txtEmail" value="<?php echo($taikhoan["email"]);?>" >
					</td>
					<td>
						<input type="text" name="txtDiaChi" value="<?php echo($taikhoan["diaChi"]);?>" >
					</td>
					<td>
						<input type="radio" name="txtGT" value="1"  <?php if($taikhoan["gioiTinh"]==1) echo "checked";
						?>>Nam
						<input type="radio" name="txtGT" value="0" <?php if($taikhoan["gioiTinh"]==0) echo "checked";
						?> >Nữ
					</td>
					<td>
						<?php
							if($taikhoan["maQuyen"] == 1){echo "Độc Giả";}
							if($taikhoan["maQuyen"] == 2){echo "Admin";}
							if($taikhoan["maQuyen"] == 3){echo "SuperAdmin";}
						?>
						<!-- CHỨC NĂNG CỦA SUPERADMIN(CÓ THỂ THAY ĐỔI QUYỀN HẠN)<input type="text" name="txtMaQuyen" value="<?php echo($taikhoan["maQuyen"]);?>" > -->
					</td>
					<td>
						<input type="submit" onclick="return confirm('Bạn có chắc muốn Thay đổi?')" value="Chỉnh Sửa">
						
						<button><a href="xoaTaiKhoan.php?id=<?php echo($taikhoan["maDocGia"]);?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a></button>
					</td>
				</tr>
			</form>
			<?php
		}
		?>
		</table>
</body>
</html>
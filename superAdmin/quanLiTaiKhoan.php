<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<a href="#" style="text-decoration: none;  font-size: 27px; font-family:  monospace; display: inline-block;"><strong>Quản lí tài khoản</strong></a>
	<button><a href="themTaiKhoan.php" style="font-size: 17px; text-decoration: none; font-family: sans-serif; width: 100%; margin: auto; display: inline-block;">Thêm Tài Khoản Admin</a></button>
	<?php
	include("../connectDb/open.php");
	$sql=("select * from tbladmin");
	$result=mysqli_query($con,$sql); 

	?>
	<form>
		<table border="2px"; cellspacing="3" cellpadding="5" style="width: 100%">
			<tr>
				<th style="width: 10%">Mã Tài Khoản</th>
				<th style="width: 20%">Tên Tài Khoản</th>
				<th style="width: 20%">Mật Khẩu</th>
				<th style="width: 20%">Email</th>
				<th style="width: 10%">Quyền Hạn</th>
				<th style="width: 20%">Chức năng</th>
			</tr>
			<?php
			while($taikhoan=mysqli_fetch_array($result)){
				?>
			<form action="suaTaiKhoan.php">
				<tr>
					<td>
						<input type="text" name="txtMa" style="width: 20%" value="<?php echo($taikhoan["maTaiKhoan"]);?>" readonly="readonly" >
						</td>
					<td>
						<input type="text" name="txtTen" value="<?php echo($taikhoan["tenTaiKhoan"]);?>" >
					</td>
					<td>
						<input type="password" name="txtPass" value="<?php echo($taikhoan["password"]);?>" >
					</td>
					<td>
						<input type="text" name="txtEmail" value="<?php echo($taikhoan["email"]);?>" >
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
						
						<button><a href="xoaTaiKhoan.php?id=<?php echo($taikhoan["maTaiKhoan"]);?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a></button>
					</td>
				</tr>
			</form>
			<?php
		}
		?>
		</table>
	</form>
</body>
</html>
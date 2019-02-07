<?php
if(!isset($_SESSION['maQuyen'])) header("location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		#qltt{width: 50%;
			
			margin: auto}
		/* Blue */
		.info {
		  border-color: #2196F3;
		  color: dodgerblue
		}

		.info:hover {
		  background: #2196F3;
		  color: white;
		}
		.btn {
		  border: 2px solid black;
		  background-color: white;
		  color: black;
		  padding: 14px 28px;
		  font-size: 16px;
		  cursor: pointer;
		}
	</style>
</head>
<body>
	<div id="qltt">

			<a href="#" style="text-decoration: none; margin-left: 200px; font-size: 25px; font-family: monospace;"><strong>Thông tin cá nhân</strong></a>
				<?php
				$id=$_SESSION['maTaiKhoan'];
				include("../connectDb/open.php");
				$sql=("select * from tbladmin where maTaiKhoan=$id");
				$result=mysqli_query($con,$sql);
				while($infor=mysqli_fetch_array($result))
				{
				?>
				<form action="InforProcess.php">
						<table id="tableInfor">
							<tr>
								<td><strong>Mã Tài Khoản:</strong></td>
								<td>
									<input type="text" name="txtma" value="<?php echo($infor["maTaiKhoan"]);?>" readonly="readonly">
								</td>
							</tr>
							<tr>
								<td><b>Tên Admin</b></td>
								<td>
									<input type="text" name="txtTenAdmin" value="<?php echo($infor["tenAdmin"]);?>" >
								</td>
							</tr>
							<tr>
								<td><b>Tên Tài Khoản</b></td>
								<td>
									<input type="text" name="txtTenTK" value="<?php echo($infor["tenTaiKhoan"]);?>" >
								</td>
							</tr>
							<tr>
								<td><b>Email</b></td>
								<td>
									<input type="text" name="txtEmail" value="<?php echo($infor["email"]);?>" >
								</td>
							</tr>
							<tr>
								<td><b>Mật Khẩu:</b></td>
								<td>
									<input type="password" name="txtPass" value="<?php echo('password');?>" >
								</td>
							</tr>
							<tr>
								<td><b>Trạng Thái:</b></td>
								<td style="color: red">
									
									<?php  if($infor["tinhTrang"] == 1){echo 'Hoạt động';}
											if($infor["tinhTrang"] == 0){echo "Đã bị khóa";}
									?>
									
								</td>
							</tr>
								
							
							<?php
						}
							?>
						</table>
					
						<input type="submit" value="Cập Nhật" onclick="return confirm('Bạn có chắc muốn cập nhật?')"  >
						</form>
						<?php 
						include("../connectDb/close.php");
						?>
			</div>
</body>
</html>
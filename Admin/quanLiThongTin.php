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
								<td>Mã Tài Khoản:</td>
								<td>
									<input type="text" name="txtma" value="<?php echo($infor["maTaiKhoan"]);?>" readonly="readonly">
								</td>
							</tr>
							<tr>
								<td>Tên Tài Khoản</td>
								<td>
									<input type="text" name="txtTenTK" value="<?php echo($infor["tenTaiKhoan"]);?>" >
								</td>
							</tr>
							<tr>
								<td>Email</td>
								<td>
									<input type="text" name="txtEmail" value="<?php echo($infor["email"]);?>" >
								</td>
							</tr>
							<tr>
								<td>Mật Khẩu:</td>
								<td>
									<input type="password" name="txtPass" >
								</td>
							</tr>
								
							
							<?php
						}
							?>
						</table>
					
						<input type="submit" value="Cập Nhật" onclick="return confirm('Bạn có chắc muốn cập nhật?')">
						</form>
						<?php 
						include("../connectDb/close.php");
						?>
			</div>
</body>
</html>
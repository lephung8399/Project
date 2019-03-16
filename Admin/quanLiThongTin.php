<?php
if(!isset($_SESSION['maQuyen'])) header("location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản Lí Thông Tin</title>
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
		<script type="text/javascript">
		function thaydoi() {
			var matkhauDB = <?php echo $pass ?>;
			var passlai=document.getElementById('txtMatKhauLai').value;
			var passcu=document.getElementById('txtMatKhauCu').value;
			var pass=document.getElementById('txtMatKhau').value;

			var errMatKhauCu=document.getElementById("errMatKhauCu");
			var errMatKhau=document.getElementById("errMatKhau");

			var regMatKhauCu=/^[a-zA-Z0-9]+$/;
			var regMatKhau=/^[a-zA-Z0-9]+$/;
			var dem=0;

			if(pass.length==0)
			{
				document.getElementById("txtMatKhau").style.border="2px solid red";
			}else
			{
				var kqMatKhau=regMatKhau.test(pass);
				if(kqMatKhau)
				{
					errMatKhau.innerHTML="";
					document.getElementById("txtMatKhau").style.border="2px solid 	#7FFF00";
					dem++;		
				}else
				{
					document.getElementById("txtMatKhau").style.border="2px solid red";	
				}
			}

			if(passcu == matkhauDB)
			{
				document.getElementById("txtMatKhauCu").style.border="2px solid 	#7FFF00";
				dem++;
			}
			else{
				document.getElementById("txtMatKhau").style.border="2px solid red";	
			}
			if (pass==passlai) {
				document.getElementById("txtMatKhauLai").style.border="2px solid 	#7FFF00";
				dem++;	
			}
			else{
				/*document.getElementById("txtMatKhauLai").alert("Mật khẩu không khớp");*/
				document.getElementById("txtMatKhauLai").style.border="2px solid red"
			}
			
			if (dem==3) {
				document.getElementById("frm").type = "submit";	
			}

	}
	</script>
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
									<h5 style="color: green">
										<?php  
											if($infor["tinhTrang"] == 1){echo '<img src="https://img.icons8.com/color/48/000000/ok.png">(Đang hoạt động)';}
										?>
									</h5>
									<h5 style="color: red">
										<?php
											if($infor["tinhTrang"] == 0){echo '<img src="https://img.icons8.com/color/48/000000/shutdown.png">(Đã bị khóa)';}
										?>
									</h5>
									
								</td>
							</tr>
								
							
							<?php
						}
							?>
						</table>
					
						<input type="submit" value="Cập Nhật" onclick="return confirm('Bạn có chắc muốn cập nhật?')"  >
						</form>
						
						<?php
							if(isset($_GET["id"]))
							{
							
								$id=$_GET["id"];
							?>
						<form method="POST"  action="suaPassProcess.php" >
							<center>
								<h5>Đổi mật khẩu</h5>
									<table>
										<tr>
											<td>
												Mật Khẩu Cũ:
											</td> 
											<td>
												<input type="password" name="tntpasscu" id="txtMatKhauCu" /> <br />
											</td>							
												<span id="errMatKhauCu" ></span>							
										</tr>
										<tr>
											<td>
												Mật Khẩu Mới:
											</td> 
											<td>
												<input type="password" name="tntPass" id="txtMatKhau"><br />
											</td>
												<span id="errMatKhau"></span>
										</tr>
										<tr>
											<td>
												Nhập Lại Mật Khẩu:
											</td>
											<td>
												 <input type="password" name="tntPassLai" id="txtMatKhauLai"><br />
											</td>
												<span id="errMatKhau"></span>							
										</tr>
										<tr>
											<td></td>
											<td>
												<center>
													<button type="button" name="ma" id="frm" onclick="thaydoi()" value="<?php echo $id;?>">Thay Đổi</button>
												</center>
											</td>
											<td></td>
										</tr>
									</table>
								</center>
							</form>
							<?php
				}
				
						include("../connectDb/close.php");
						?>
						
			</div>
</body>
</html>
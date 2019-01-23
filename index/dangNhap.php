<?php
session_start();
if(isset($_SESSION["User"]))
{
	header("Location: trang ca nhan/index.php");		
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
			<title>Login</title>
	<link rel="stylesheet" href="css/style.css" type="text/css"  />
</head>
<body>
<div class="center-container">

	<div class="header-w3l">
		<h1>LOGIN</h1>
	</div>
	<div class="main-content-agile">
		<form action="indexProcess.php" method="POST" >
			<div class="sub-main-w3">	
				<div class="wthree-pro">
					<h2>Đăng Nhập</h2>
				</div>
					<div>
						<input placeholder="Tên Tài Khoản" name="txtUser" class="user" type="dangnhap" id="tntUser">
					</div>
					<div >
						<input  placeholder="Mật Khẩu" name="txtPass" class="pass" type="password"  id="tntPass">	
					</div>
					<div>
						<div class="right-w3l">
							<input type="submit" value="Đăng Nhập" id="button1"	>
							<a href="dangki/dangki.php"><input type="button" value="Đăng Kí" id="submit" ></a>
						</div>
					</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>
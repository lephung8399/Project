<?php
session_start();
if(isset($_SESSION["User"]))
{
	header("Location: trang ca nhan/index.php");		
}
?>
<!DOCTYPE HTML>
<html lang="en">
<script type="text/javascript">
	function validate()
	{
		var user=document.getElementById("tntUser").value;
		var pass=document.getElementById("tntPass").value;
		dem = 0;
		//user
		if(user.length==0)
		{
			document.getElementById("tntUser").style.border="2px solid red";
		}else
			{
				document.getElementById("tntUser").style.border="2px solid 	#7FFF00";
				dem++;
			}
		//password
		if(pass.length==0)
		{
			document.getElementById("tntPass").style.border="2px solid red";
		}else
			{
				document.getElementById("tntPass").style.border="2px solid 	#7FFF00";
				dem++;
			}

		if(dem==2)
		{
			document.getElementById("button1").type = "submit";
		}
	}
</script>
<head>
	<meta charset="UTF-8">
			<title>Login</title>
	<link rel="stylesheet" href="css/style.css" type="text/css"  />
</head>
<body>
	<form action="indexProcess.php" id="frm" method="POST" >
<div class="center-container">

	<div class="header-w3l">
		<h1>LOGIN</h1>
	</div>
	<div class="main-content-agile">
		
			<div class="sub-main-w3">	
				<div class="wthree-pro">
					<h2>Đăng Nhập</h2>
				</div>
					<div>
						<input placeholder="Tên Tài Khoản" name="txtUser" class="user" type="dangnhap" id="tntUser" onchange="validate()">
					</div>
					<div >
						<input  placeholder="Mật Khẩu" name="txtPass" class="pass" type="password"  id="tntPass" onchange="validate()">	
					</div>
					<div>
						<div class="right-w3l">
							<input type="button" value="Đăng Nhập" id="button1" onclick="validate()">
							<a href="dangki/dangki.php"><input type="button" value="Đăng Kí" id="submit" ></a>
						</div>
					</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>
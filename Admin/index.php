<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		#main{width: 400px;
			height: 200px;
			margin: auto;
			background-color: grey;
			margin-top: 200px;
			position: relative;}
		/*#text1{
			width: 100%;
			height: 150px;
			margin: auto;
			position: absolute;
			background-color: blue;


		}*/
		#dangNhap{
			width: 100%;
			height: 50px;
			margin: auto;
			position: absolute;
			background-color:  ;

		}
	</style>
	<script type="text/javascript">
		function login()
		{
			if(document.getElementById("txtUser").value.length != 0 && document.getElementById("txtPass").value.length != 0)
				document.getElementById("loginButton").type= 'submit';
			else if(document.getElementById("txtUser").value.length == 0 && document.getElementById("txtPass").value.length == 0) document.getElementById("errLogin").innerHTML = "Hãy điền tên đăng nhập và mật khấu"
			else if(document.getElementById("txtPass").value.length == 0) document.getElementById("errLogin").innerHTML = "Hãy điền mật khấu"
			else document.getElementById("errLogin").innerHTML = "Hãy điền tên đăng nhập";
		}
	</script>
</head>

<body>
	<?php 
		session_start();
		if(isset($_SESSION['maQuyen'])) header("location: home.php");
	?>
	<div id="main">
		<form action="loginProcess.php" method="POST">
			<div id="text1" align="center">
				<table>
					<tr>
						<td>
							<h4>Tên Tài Khoản:</h4>
						</td>
						<td>
							<input type="text" id="txtUser" placeholder="Nhập tên tài khoản..." name="txtUser">
						</td>
					</tr>
					<tr>
						<td>
							<h4>Mật Khẩu:</h4>
						</td>
						<td>
							<input type="password" id="txtPass" placeholder="Nhập mật khẩu..." name="txtPass">
						</td>
					</tr>
				</table>
			</div>
			<div align="center" >
				<span id="errLogin"></span>
			</div>
			<?php 
							if(isset($_GET['err']))
								if($_GET['err'] == 1) {
									?>
										<script type="text/javascript">
											document.getElementById("errLogin").innerHTML = "Sai tên đăng nhập hoặc mật khấu";
										</script>
									<?php
								}
							?>
			<div id="dangNhap">
				<div align="center" style="margin-top: 10px">
					<input type="button" id="loginButton" onclick="login()" value="Đăng Nhập">
				</div>
			</div>
		</form>
	</div>
		
</body>
</html>
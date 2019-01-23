<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang Chủ SuperAdmin</title>
	<style type="text/css">
		#main{width: 1200px;
			height: 1000px;
			margin: auto;

		}
		#mainMenu{
			width: 1200px;
			height: 60px;
			background-color: #14AC78;
			margin: inherit;
		}
		#menu{
			width: 80%;
			height: 60px;
			float: left
		}
		#content{
			width: 100%;
			height: 940px;
			
			background-color: #EDF6D3
		}
		#login{float: left;
			width: 20%;
			height: 60px;
			background-color: #B7ADAD
		}
	</style>
</head>
<body>
	<div id="main">
		<div id="mainMenu">
			<div id="menu">
				<a href="?dog=4"><h2 style="display: inline-block; margin-left: 10px ">Trang Chủ</h2></a>
				<a href="?dog=1"><h2  style="display: inline-block; margin-left: 10px">Thông Tin Cá Nhân</h2></a>
				<a href="?dog=2"><h2  style="display: inline-block; margin-left: 10px">Quản Lí Thể Loại</h2></a>
				<a href="?dog=3"><h2 style="display: inline-block; margin-left: 10px">Quản Lí Bài Viết</h2></a>
				<a href="?dog=5"><h2 style="display: inline-block; margin-left: 10px">Quản Lí Tài Khoản</h2></a>

				
			</div>
			<div id="login">
				
			</div>
		</div>
		<br>
		<div id="content">
			<?php
			if(isset($_GET["dog"]))
			{
				$dog=$_GET["dog"];
				switch ($dog) {
					case 1:
						include("quanLiThongTin.php");
						break;
					case 2:
						include("quanLiTheLoai.php");
						break;
					case 3:
					include("quanLiBaiViet.php");
					break;
					case 4:
					include("trangchu.php");
					break;
					case 5:
					include("quanLiTaiKhoan.php");
					break;

					
					default:
						include("trangchu.php");
						break;
				}
			}else
			{
				include("trangchu.php");
			}
			?>
		</div>
	</div>
</body>
</html>
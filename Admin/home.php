<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang Quản Lí Admin</title>
	<style type="text/css">
		#main{width: 1200px;
			height: max-height;
			margin: auto;

		}
		#mainMenu{
			width: 1200px;
			height: 60px;
			background-color: #14AC78;
			margin: inherit;
		}
		#menu{
			width: 90%;
			height: 60px;
			float: left
		}
		#content{
			width: 100%;
			height: max-height;
			
			background-color: #EDF6D3
		}
		#login{float: left;
			width: 10%;
			height: 60px;
			background-color: #B7ADAD
		}
		/*HƯng rất đẹp zai*/

	</style>
</head>
<body>
	<div id="main">
		<div id="mainMenu">
			<div id="menu">
				<a href="?dog=1"><h3  style="display: inline-block; margin-left: 10px">Thông Tin Cá Nhân</h3></a>
				<?php
				 if(($_SESSION['maQuyen']) >1){?>
				 	<a href="?dog=2"><h3  style="display: inline-block; margin-left: 10px">Quản Lí Thể Loại</h3></a>
				<?php }?>
				<a href="?dog=3"><h3 style="display: inline-block; margin-left: 10px">Quản Lí Bài Viết</h3></a>
				<?php
				 if(($_SESSION['maQuyen']) >1){?>
				<a href="?dog=4"><h3 style="display: inline-block; margin-left: 10px ">Quản Lí Comment</h3></a>
				<?php }?>
				<?php
				 if(($_SESSION['maQuyen']) >1){?>
				<a href="?dog=5"><h3 style="display: inline-block; margin-left: 10px">Quản Lí Độc Giả</h3></a>
				<?php }?>
				<?php
				if(($_SESSION['maQuyen']) == 3){?>
				<a href="?dog=6"><h3 style="display: inline-block; margin-left: 10px">Quản Lí Tài Khoản</h3></a>
				<?php }?>

				
			</div>
			<div id="login">
				
				<a href="dangXuat.php"><h4 style="display: inline-block; margin-left: 30px ">Đăng Xuất</h4></a>
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
					include("quanLiCmt.php");
					break;
					case 5:
					include("quanLiTaiKhoan.php");
					break;
					case 6:
					include("quanLiAdmin.php");
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
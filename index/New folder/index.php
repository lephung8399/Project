<?php
include("../connectDb/open.php");
session_start();


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Demo</title>
		<link rel="stylesheet" type="text/css" href="../Css/cssIndex.css">
	</head>
	<body>
		<div id="main">

			
			<div id="header">
				<div id="lienHe">
					<div style="margin: auto; padding-top: 40px; display: flex; align-items: center;">
						<h4 style="font-family: sans-serif; margin-right: 5px; display: inline-block;">	LIÊN KẾT VỚI CHÚNG TÔI:
						</h4>
						<a href="https:www.facebook.com/hunglephu99"><img src="https://img.icons8.com/windows/32/000000/facebook.png"></a>
						<a href="https://www.instagram.com/hungleph/"><img src="https://img.icons8.com/windows/32/000000/instagram-new.png"></a>
						
					</div>
				</div>
				<div id="logo"></div>
				<div id="SearchLogin">
					<div id="khongdelamgi"></div>
					<div id="timKiem" style="margin: auto;  display: flex; align-items: center;">
						<form style="padding-top: 40px margin-right: 5px; display: inline-block;">
							<input type="search" name="Search" placeholder="Nhập Từ Khóa Tìm Kiếm... " >
							<img src="https://img.icons8.com/material/30/000000/search.png">
							 
						</form>
					</div>
					<div id="taiKhoan" style="margin: auto; padding-top: 40px">
						<a href="dangNhap.php"><img src="https://img.icons8.com/ios-glyphs/30/000000/user.png"></a>
					</div>
				</div>
			</div>
			<div id="mainMenu">
				<div id="containerMenu" >
					<?php $sql="select * from tbltheloai order by maTheLoai limit 4";
						$result=mysqli_query($con,$sql);
						 ?>
					<ul id="menu" >
						<li>
							<a href="index.php">Trang Chủ </a>
						</li><?php
						while($menuTheLoai=mysqli_fetch_array($result)){ ?>
						<li>
							<a href="chiTietTheLoai.php?maTheLoai=<?php echo($menuTheLoai["maTheLoai"]);?>"><?php echo($menuTheLoai["tenTheLoai"]);?></a>
						</li>
						<?php 
							}
						?>
						<li>
							<a href="#">Liên Hệ</a>
						</li>
					</ul>
					
				</div>
			</div>
			
			<div id="space"></div>
			<div id="slide">
				<div id="leftslide">

					<img src="img/news200.jpg"  style="max-width: 100%; height: 100%; left: 3px;width: 100%; display: inline; position: absolute; ">
					<div id="abc"><h3><a href="#" style="font-weight: 500;font-size: 37px; text-decoration: none; color: white; font-family: sans-serif;">
						<?php $sql="select * from tbltintuc order by maTin DESC limit 1";
						$result=mysqli_query($con,$sql);
						$tinTuc=mysqli_fetch_array($result);
						 echo($tinTuc["tieuDe"])?>
					 </a></h3>
					</div>
				</div>
				<div id="rightslide">
						<div id="topright">
							<div id="divimg1">
								<img src="img/news202.jpg" style="max-width: 100%; height: 100%; left: 3px;width: 100%; display: inline; position: absolute; margin-left: 3px">
								<div id="abc"><h3><a href="chiTietTinTuc.php?maTin=<?php echo($tinTuc["maTin"]);?>" class="aslide"><?php $sql="select * from tbltintuc order by  maTin desc limit 2";
								 echo($tinTuc["tieuDe"])?></a></h3>
								</div>					
							</div>
						</div>
						<div id="botright">
							<div id="divimg3">
								<img src="img/buom4.gif" style="max-width: 100%; height: 100%; left: 3px;  display: inline; position: absolute; width: 100%; position: absolute;">
								<div id="abc"><h3><a href="chiTietTinTuc.php?maTin=<?php echo($tinTuc["maTin"]);?>" class="aslide">
								<?php $sql="select * from tbltintuc order by  maTin desc limit 3";
								 echo($tinTuc["tieuDe"])?></a></h3></div>
							</div>
							<div id="divimg4">
								<img src="img/news201.jpg" style="max-width: 100%; height: 100%; left: 3px;  display: inline; position: absolute; width: 100%; position: absolute; margin-left: 3px">
								<div id="abc"><h3><a href="chiTietTinTuc.php?maTin=<?php echo($tinTuc["maTin"]);?>" class="aslide">
								<?php $sql="select * from tbltintuc order by  maTin desc limit 2";
								 echo($tinTuc["tieuDe"])?></a></h3></div>
							</div>
						</div>
					</div>
				</div>
				
			<div id="space"></div>
			<div id="content">
				<div id="congNghe">
					<div id="leftTittle">
						<div id="tittleMain">
							<div id="chamcham"></div>
							<div id="tieuDe" style="position: relative; "><h2 style="position: absolute;text-align: center; letter-spacing: 7px; text-transform: uppercase; font-family: sans-serif;">Công Nghệ</h2></div>
							<div id="chamcham"></div>
						</div>
					</div>
					<div id="tinTheLoai">
						<?php 
								include("../connectDb/open.php");
								$result=mysqli_query($con,"select * from tbltintuc where maTheLoai=1 ORDER BY maTin DESC LIMIT 3");
								while($tinTheLoai=mysqli_fetch_array($result))
								{
								?>
									<div id="anh1" >
										<table width="100%">
											<tr style=""><img src="<?php echo($tinTheLoai["URLanh"])?>" height="300" width="300">
											</tr>
											<tr>
											<a href="chiTietTinTuc.php?maTin=<?php echo($tinTheLoai["maTin"]);?>" style="font-weight:bold;font-size:18px;text-decoration:none"><?php echo($tinTheLoai["tieuDe"]);?></a>
											</tr>
											<p>
											<tr>
											<a><?php echo($tinTheLoai["moTa"]);?></a>
											</tr>
										</table>
									</div>
								<?php
							}
						?>
					</div>
				</div>
				<br>
				<div id="thegioi">
					<div id="leftTittle">
						<div id="tittleMain">
							<div id="chamcham"></div>
							<div id="tieuDe" style="position: relative; ">
								<h2 style="position: absolute;text-align: center; letter-spacing: 7px; text-transform: uppercase; font-family: sans-serif;">Thế Giới</h2></div>
							<div id="chamcham"></div>
						</div>
					</div>
					<div id="tinTheLoai2">
						<?php 
								include("../connectDb/open.php");
								$result=mysqli_query($con,"select * from tbltintuc where maTheLoai=2 ORDER BY maTin DESC LIMIT 3");
								while($tinTheLoai=mysqli_fetch_array($result))
								{
								?>
									<div id="anh1" style="">
										<table width="100%">
											<tr style=""><img src="<?php echo($tinTheLoai["URLanh"])?>" height="300" width="300">
											</tr>
											<br>
											<tr>
											<a href="chiTietTinTuc.php?maTin=<?php echo($tinTheLoai["maTin"]);?>" style="font-weight:bold;font-size:18px;text-decoration:none"><?php echo($tinTheLoai["tieuDe"]);?></a>
											</tr>
											<p>
											<tr>
											<a><?php echo($tinTheLoai["moTa"]);?></a>
											</tr>
										</table>
									</div>
								<?php
							}
							?>

					</div>
				</div>
								<br>
				<div id="thethao">
					<div id="leftTittle">
						<div id="tittleMain">
							<div id="chamcham"></div>
							<div id="tieuDe" style="position: relative; ">
								<h2 style="position: absolute;text-align: center; letter-spacing: 7px; text-transform: uppercase; font-family: sans-serif;">Thể Thao</h2></div>
							<div id="chamcham"></div>
						</div>
					</div>
					<div id="tinTheLoai3">
						<?php 
								include("../connectDb/open.php");
								$result=mysqli_query($con,"select * from tbltintuc where maTheLoai=3 ORDER BY maTin DESC LIMIT 3");
								while($tinTheLoai=mysqli_fetch_array($result))
								{
								?>
									<div id="anh1" style="">
										<table width="100%">
											<tr style=""><img src="<?php echo($tinTheLoai["URLanh"])?>" height="300" width="300">
											</tr>
											<br>
											<tr>
											<a href="chiTietTinTuc.php?maTin=<?php echo($tinTheLoai["maTin"]);?>" style="font-weight:bold;font-size:18px;text-decoration:none"><?php echo($tinTheLoai["tieuDe"]);?></a>
											</tr>
											<p>
											<tr>
											<a><?php echo($tinTheLoai["moTa"]);?></a>
											</tr>
										</table>
									</div>
								<?php
							}
							?>

					</div>
				</div>
				<p>
				<div id="phongcach">
					<div id="leftTittle">
						<div id="tittleMain">
							<div id="chamcham"></div>
							<div id="tieuDe" style="position: relative; ">
								<h2 style="position: absolute;text-align: center; letter-spacing: 7px; text-transform: uppercase; font-family: sans-serif;">Phong Cách</h2></div>
							<div id="chamcham"></div>
						</div>
					</div>
					<div id="tinTheLoai4">
						<?php 
								include("../connectDb/open.php");
								$result=mysqli_query($con,"select * from tbltintuc where maTheLoai=4 ORDER BY maTin DESC LIMIT 3");
								while($tinTheLoai=mysqli_fetch_array($result))
								{
								?>
									<div id="anh1" style="">
										<table width="100%">
											<tr style=""><img src="<?php echo($tinTheLoai["URLanh"])?>" height="300" width="300">
											</tr>
											<br>
											<tr>
											<a href="chiTietTinTuc.php?maTin=<?php echo($tinTheLoai["maTin"]);?>" style="font-weight:bold;font-size:18px;text-decoration:none"><?php echo($tinTheLoai["tieuDe"]);?></a>
											</tr>
											<p>
											<tr>
											<a><?php echo($tinTheLoai["moTa"]);?></a>
											</tr>
										</table>
									</div>
								<?php
							}
							?>

					</div>
				</div>
					
			</div>
				

		</div>

	</body>
</html>
<?php
include("connectDb/open.php");
session_start();
//hello hungvuathemvao

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Demo</title>
		<style type="text/css">
			#myBtn {
			  display: none;
			  position: fixed;
			  bottom: 20px;
			  right: 30px;
			  z-index: 99;
			  font-size: 18px;
			  border: none;
			  outline: none;
			  background-color: red;
			  color: white;
			  cursor: pointer;
			  padding: 15px;
			  border-radius: 4px;
			}

			#myBtn:hover {
			  background-color: #555;
		</style>
		<script>
		function validate()
		{
			var search = document.getElementById("txtsearch").value;
			var regsearch = /^[a-zA-Z0-9]+$/;
			var dem=0;
			if(search.length==0)
			{
				alert("Yêu cầu nhập để tìm kiếm!")
				document.getElementById("txtsearch").style.border="2px solid red";
				return;
			}
			else
			{
				var kqsearch=regsearch.test(search);
				if(kqsearch==true || true)
				{
					document.getElementById("txtsearch").style.border="2px solid 	#7FFF00";
					dem++;		
				}
			}
			if(dem == 1)
			{	
				document.getElementById('searchForm').action = 'index/searchprocess.php';
				return true;		
			}
			else
			{
				return false;
			}
		}
		</script>
		<link rel="stylesheet" type="text/css" href="Css/cssIndex.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<style>
			#submitbtn{
				width: 88px;height: 36px;border: 1px solid #999;border-radius: 6px;background:#fff;padding-left: 22px
			}
			#submitbtn:hover{
				background: #ebebeb
			}
			#timKiem i{
				position: relative;
			    top: -29px;
			    right: -152px;
			    color: #999
			}
		</style>
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
				<a href="index.php"><div id="logo"></div></a>
				<div id="SearchLogin">
					<div id="khongdelamgi"></div>
					<div id="timKiem" style="margin: auto;  display: flex; align-items: center;">
						<form style="padding-top: 40px margin-right: 5px; display: inline-block;" id="searchForm"  method="get" onsubmit="validate()">
							<input type="text" id="txtsearch" name="Search" placeholder=" Tìm Kiếm... ">
							<!-- <input type="submit" id="submitbtn" value="Tìm kiếm" onclick="return validate()"><i class="fas fa-search"></i> -->
							<!-- <img  src="https://img.icons8.com/material/30/000000/search.png" > -->
						</form>
					</div>
					<?php
					if (isset($_SESSION["User"])) {
					 	$user = $_SESSION["User"];
					?>
					<div id="taiKhoan" style="margin: auto; padding-top: 27px;">
						<a href="index/dangNhap.php" style="  width: 200px;
													    display: block;
													    height: 30px;
													    background: #f0f0f0;
													    text-align: center;
													    line-height: 30px;
													    text-decoration: none;
													    color: red;
													    border-radius: 6px;
													    float: left; "
    					><span style="font-size: 18px;"><?php echo "Xin chào : ".$user; ?></span></a>
    					<a href="index/trang ca nhan/dangXuat.php" style="width: 200px;
													    display: block;
													    height: 30px;
													    background: #f0f0f0;
													    text-align: center;
													    line-height: 30px;
													    text-decoration: none;
													    color: red;
													    border-radius: 6px;
													    float: left;
													    margin-top: 2px;
													    font-size: 18px"

													    >Đăng xuất</a>
					</div>
					<?php
						}else{
							?>
							<div id="taiKhoan" style="margin: auto; padding-top: 40px">
								<a href="index/dangNhap.php"><img src="https://img.icons8.com/ios-glyphs/30/000000/user.png"></a>
							</div>
							<?php
						}
					?>
				</div>
			</div>
			<div id="mainMenu">
				<div id="containerMenu" >
					<?php $sql="select * from tbltheloai order by maTheLoai limit 5";
						$result=mysqli_query($con,$sql);
						 ?>
					<ul id="menu" >
						<li>
							<a href="index.php">Trang Chủ </a>
						</li><?php
						while($menuTheLoai=mysqli_fetch_array($result)){ ?>
						<li>
							<a href="index/chiTietTheLoai.php?maTheLoai=<?php echo($menuTheLoai["maTheLoai"]);?>"><?php echo($menuTheLoai["tenTheLoai"]);?></a>
						</li>
						<?php 
							}
						?>
						<!-- <li>
							<a href="#">Liên Hệ</a>
						</li> -->
					</ul>
					
				</div>
			</div>
			
			<div id="space"></div>
			<div id="slide">
				<div id="leftslide">
				<?php $sql="select * from tbltintuc where maTheLoai=1 and tinhTrang=1 order by maTin DESC limit 1";
						$result=mysqli_query($con,$sql);
						$tinTuc=mysqli_fetch_array($result);
						?>
					<img src="<?php echo substr(($tinTuc["URLanh"]),3)?>" height="100%" width="100%">
					<!-- <img src="img/news200.jpg"  style="max-width: 100%; height: 100%; left: 3px;width: 100%; display: inline; position: absolute; "> -->
					<div class="aslide"><h3><a href="index/chiTietTinTuc.php?maTin=<?php echo($tinTuc["maTin"]);?>" style="font-weight: 500;font-size: 37px; text-decoration: none; color: white; font-family: sans-serif;">
							<?php			
						 echo($tinTuc["tieuDe"])?>
					 </a></h3>
					</div>

				</div>
				<div id="rightslide">
						<div id="topright">
							<div id="divimg1">
								<?php $sql="select * from tbltintuc where maTheLoai=2 and tinhTrang=1 order by maTin DESC limit 1";
									$result=mysqli_query($con,$sql);
									$tinTuc2=mysqli_fetch_array($result);
									?>
								<img src="<?php echo substr(($tinTuc2["URLanh"]),3)?>" height="100%" width="100%">
								<!-- <img src="img/news202.jpg" style="max-width: 100%; height: 100%; left: 3px;width: 100%; display: inline; position: absolute; margin-left: 3px"> -->
								<div ><h3><a href="index/chiTietTinTuc.php?maTin=<?php echo($tinTuc2["maTin"]);?>" class="aslide"><?php $sql="select * from tbltintuc order by  maTin desc limit 2";
								 echo($tinTuc2["tieuDe"])?></a></h3>
								</div>					
							</div>
						</div>
						<div id="botright">
							<div id="divimg3">
								<?php $sql="select * from tbltintuc where maTheLoai=3 and tinhTrang=1 order by maTin DESC limit 1";
									$result=mysqli_query($con,$sql);
									$tinTuc3=mysqli_fetch_array($result);
									?>
								<img src="<?php echo substr(($tinTuc3["URLanh"]),3)?>" height="100%" width="100%">
								<!-- <img src="img/buom4.gif" style="max-width: 100%; height: 100%; left: 3px;  display: inline; position: absolute; width: 100%; position: absolute;"> -->
								<div ><h3><a href="index/chiTietTinTuc.php?maTin=<?php echo($tinTuc3["maTin"]);?>" class="aslide">
								<?php $sql="select * from tbltintuc order by  maTin desc limit 3";
								 echo($tinTuc3["tieuDe"])?></a></h3></div>
							</div>
							<div id="divimg4">
								<?php $sql="select * from tbltintuc where maTheLoai=4  and tinhTrang=1 order by maTin DESC limit 1";
									$result=mysqli_query($con,$sql);
									$tinTuc4=mysqli_fetch_array($result);
									?>
								<img src="<?php echo substr(($tinTuc4["URLanh"]),3)?>" height="100%" width="100%">
								<!-- <img src="img/news201.jpg" style="max-width: 100%; height: 100%; left: 3px;  display: inline; position: absolute; width: 100%; position: absolute; margin-left: 3px"> -->
								<div ><h3><a href="index/chiTietTinTuc.php?maTin=<?php echo($tinTuc4["maTin"]);?>" class="aslide">
								<?php $sql="select * from tbltintuc order by  maTin desc limit 2";
								 echo($tinTuc4["tieuDe"])?></a></h3></div>
							</div>
						</div>
					</div>
				</div>
				
			<div id="space"></div>
			<div id="content">
				<div id="congNghe">
					<div>
						<div class="tittleMain">
							<div class="chamcham"></div>
							<div class="tieuDe" style="position: relative; "><h2 style="position: absolute;text-align: center; letter-spacing: 7px; text-transform: uppercase; font-family: sans-serif;">Công Nghệ</h2></div>
							<div class="chamcham"></div>
						</div>
					</div>
					<div id="tinTheLoai">
						<?php 
								include("connectDb/open.php");
								$result=mysqli_query($con,"select * from tbltintuc where maTheLoai=1 and tinhTrang=1 ORDER BY maTin DESC LIMIT 3");
								while($tinTheLoai=mysqli_fetch_array($result))
								{
								?>
									<div class="anh1" >
										<table width="100%">
											<tr style=""><img src="<?php echo substr(($tinTheLoai["URLanh"]),3)?>" height="300" width="300">
											</tr>
											<tr>
											<a href="index/chiTietTinTuc.php?maTin=<?php echo($tinTheLoai["maTin"]);?>" style="font-weight:bold;font-size:18px;text-decoration:none"><?php echo($tinTheLoai["tieuDe"]);?></a>
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
					<div >
						<div class="tittleMain">
							<div class="chamcham"></div>
							<div class="tieuDe" style="position: relative; ">
								<h2 style="position: absolute;text-align: center; letter-spacing: 7px; text-transform: uppercase; font-family: sans-serif;">Thế Giới</h2></div>
							<div class="chamcham"></div>
						</div>
					</div>
					<div id="tinTheLoai2">
						<?php 
								include("connectDb/open.php");
								$result=mysqli_query($con,"select * from tbltintuc where maTheLoai=2 and tinhTrang=1 ORDER BY maTin DESC LIMIT 3");
								while($tinTheLoai=mysqli_fetch_array($result))
								{
								?>
									<div class="anh1" style="">
										<table width="100%">
											<tr style=""><img src="<?php echo substr(($tinTheLoai["URLanh"]),3)?>" height="300" width="300">
											</tr>
											<br>
											<tr>
											<a href="index/chiTietTinTuc.php?maTin=<?php echo($tinTheLoai["maTin"]);?>" style="font-weight:bold;font-size:18px;text-decoration:none"><?php echo($tinTheLoai["tieuDe"]);?></a>
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
					<div>
						<div class="tittleMain">
							<div class="chamcham"></div>
							<div class="tieuDe" style="position: relative; ">
								<h2 style="position: absolute;text-align: center; letter-spacing: 7px; text-transform: uppercase; font-family: sans-serif;">Thể Thao</h2></div>
							<div class="chamcham"></div>
						</div>
					</div>
					<div id="tinTheLoai3">
						<?php 
								include("connectDb/open.php");
								$result=mysqli_query($con,"select * from tbltintuc where maTheLoai=3 and tinhTrang=1 ORDER BY maTin DESC LIMIT 3");
								while($tinTheLoai=mysqli_fetch_array($result))
								{
								?>
									<div class="anh1" style="">
										<table width="100%">
											<tr style=""><img src="<?php echo substr(($tinTheLoai["URLanh"]),3)?>" height="300" width="300">
											</tr>
											<br>
											<tr>
											<a href="index/chiTietTinTuc.php?maTin=<?php echo($tinTheLoai["maTin"]);?>" style="font-weight:bold;font-size:18px;text-decoration:none"><?php echo($tinTheLoai["tieuDe"]);?></a>
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
					<div>
						<div class="tittleMain">
							<div class="chamcham"></div>
							<div class="tieuDe" style="position: relative; ">
								<h2 style="position: absolute;text-align: center; letter-spacing: 7px; text-transform: uppercase; font-family: sans-serif;">Phong Cách</h2></div>
							<div class="chamcham"></div>
						</div>
					</div>
					<div id="tinTheLoai4">
						<?php 
								include("connectDb/open.php");
								$result=mysqli_query($con,"select * from tbltintuc where maTheLoai=4 and tinhTrang=1 ORDER BY maTin DESC LIMIT 3");
								while($tinTheLoai=mysqli_fetch_array($result))
								{
								?>
									<div class="anh1" style="">
										<table width="100%">
											<tr style=""><img src="<?php echo substr(($tinTheLoai["URLanh"]),3)?>" height="300" width="300">
											</tr>
											<br>
											<tr>
											<a href="index/chiTietTinTuc.php?maTin=<?php echo($tinTheLoai["maTin"]);?>" style="font-weight:bold;font-size:18px;text-decoration:none"><?php echo($tinTheLoai["tieuDe"]);?></a>
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
				<div id="kinhdoanh">
					<div>
						<div class="tittleMain">
							<div class="chamcham"></div>
							<div class="tieuDe" style="position: relative; ">
								<h2 style="position: absolute;text-align: center; letter-spacing: 7px; text-transform: uppercase; font-family: sans-serif;">Kinh Doanh</h2></div>
							<div class="chamcham"></div>
						</div>
					</div>
					<div id="tinTheLoai5">
						<?php 
								include("connectDb/open.php");
								$result=mysqli_query($con,"select * from tbltintuc where maTheLoai=5 and tinhTrang=1 ORDER BY maTin DESC LIMIT 3");
								while($tinTheLoai=mysqli_fetch_array($result))
								{
								?>
									<div class="anh1" style="">
										<table width="100%">
											<tr style=""><img src="<?php echo substr(($tinTheLoai["URLanh"]),3)?>" height="300" width="300">
											</tr>
											<br>
											<tr>
											<a href="index/chiTietTinTuc.php?maTin=<?php echo($tinTheLoai["maTin"]);?>" style="font-weight:bold;font-size:18px;text-decoration:none"><?php echo($tinTheLoai["tieuDe"]);?></a>
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
		<!-- Go to the Top BUTTON -->
		<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
			<script>
			// When the user scrolls down 20px from the top of the document, show the button
			window.onscroll = function() {scrollFunction()};

			function scrollFunction() {
			  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			    document.getElementById("myBtn").style.display = "block";
			  } else {
			    document.getElementById("myBtn").style.display = "none";
			  }
			}

			// When the user clicks on the button, scroll to the top of the document
			function topFunction() {
			  document.body.scrollTop = 0;
			  document.documentElement.scrollTop = 0;
			}
			</script>
	</body>
</html>
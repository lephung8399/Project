<?php
include("../connectDb/open.php");
session_start();


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Demo</title>
		<link rel="stylesheet" type="text/css" href="../Css/cssTheLoai.css">
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
						<form style="padding-top: 40px margin-right: 5px; display: inline-block;"  action="searchprocess.php" method="get">
							<input type="search" id="txtsearch" name="Search" placeholder=" Tìm Kiếm... " >
							<!-- <input type="submit" id="submitbtn" value="Tìm kiếm" onclick="return validate()"><i class="fas fa-search"></i> -->
							<!-- <img  src="https://img.icons8.com/material/30/000000/search.png" > -->
						</form>
					</div>
					<?php
					if (isset($_SESSION["User"])) {
					 	$user = $_SESSION["User"];
					?>
					<div id="taiKhoan" style="margin: auto; padding-top: 27px;">
						<a href="dangNhap.php" style="  width: 200px;
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
    					<a href="trang ca nhan/dangXuat.php" style="width: 200px;
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
								<a href="dangNhap.php"><img src="https://img.icons8.com/ios-glyphs/30/000000/user.png"></a>
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
							<a href="../index.php">Trang Chủ </a>
						</li><?php
						while($menuTheLoai=mysqli_fetch_array($result)){ ?>
						<li>
							<a href="chiTietTheLoai.php?maTheLoai=<?php echo($menuTheLoai["maTheLoai"]);?>"><?php echo($menuTheLoai["tenTheLoai"]);?></a>
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
			<div id="content">
				<div id="chamcham"></div>
				<div id="cuonTin">
				<?php
						include("../connectDb/open.php");
						if(isset($_GET["maTheLoai"]))
						{
							$TheLoai=$_GET["maTheLoai"];
							$query="select * from tbltintuc where maTheLoai=$TheLoai and tinhTrang=1 order by maTin DESC ";
							$excute=mysqli_query($con,$query);

						}
						?>
				    <table width="100%" style="margin:auto">
				    	<?php
						while($tinTuc1=mysqli_fetch_array($excute))
						{
							//moi tin la 1 dong
							?>
				            <tr>
				            	<td style="border-bottom: 0.1px solid grey">
				                	<table>
				                    	<tr>
				                        	<td rowspan="2"><img src="<?php echo($tinTuc1["URLanh"])?>" height="100" width="150"/></td>
				                            <td height="50px" style="vertical-align:top"><a href="chiTietTinTuc.php?maTin=<?php echo($tinTuc1["maTin"]);?>" style="font-weight:bold;font-size:18px;text-decoration:none"><?php echo($tinTuc1["tieuDe"]);?></a></td>
				                        </tr>
				                        <tr>
				                            <td valign="top"><?php echo($tinTuc1["moTa"]);?>
				                            	
				                            	<br><?php echo($tinTuc1["ngay"]);?>
				                            	<br>Số lượt xem:<?php echo($tinTuc1["soLuotXem"]);?>
				                            </td>
				                        </tr>
				                    </table>
				                </td>
				            </tr>
				            <?php	
						}
					?>
				    </table>
				    <?php
					include("../ConnectDB/close.php");
					?>
				</div>
				<div id="tinNoiBat">
					<div id="tittleTinNB">
						<h3 style="width: 100%; margin: auto; text-align: left; padding-top: 10px">Được Quan Tâm Nhất</h3>
					</div>
					<div id="tinNB">
						<?php
						include("../connectDb/open.php");
						if(isset($_GET["maTheLoai"]))
						{
							$TheLoai=$_GET["maTheLoai"];
							$query="select * from tbltintuc where tinhTrang=1 order by soLuotXem DESC limit 4";
							$excute=mysqli_query($con,$query);

						}
						?>
					    <table width="100%" style="margin:auto">
					    	<?php
							while($tinTuc=mysqli_fetch_array($excute))
							{
								//moi tin la 1 dong
								?>
					            <tr>
					            	<td >
					                	<table>
					                    	<tr>
					                        	<td rowspan="2"><img src="<?php echo($tinTuc["URLanh"])?>" height="100" width="150"/></td>
					                            <td height="50px" style="vertical-align:top"><a href="chiTietTinTuc.php?maTin=<?php echo($tinTuc["maTin"]);?>" style="font-weight:bold;font-size:18px;text-decoration:none"><?php echo($tinTuc["tieuDe"]);?></a></td>
					                        </tr>
					                        
					                    </table>
					                </td>
					            </tr>
					            <?php	
							}
						?>
					    </table>
					    <?php
						include("../ConnectDB/close.php");
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
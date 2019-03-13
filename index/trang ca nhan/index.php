<?php 
	session_start();
	$user=$_SESSION["User"];
	$pass=$_SESSION["Pass"];
	$conn = mysqli_connect("localhost","root","","project");
	mysqli_set_charset($conn,'utf8');
	$thongtin = mysqli_query($conn,"select * from tbldocgia where User='$user' and Pass='$pass'");
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Thông Tin Cá Nhân</title>
	<link rel="stylesheet" type="text/css" href="../../Css/cssDocGia.css">
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
				h3{
			padding-top: 24px;
			text-align:center;
			border-bottom: 1px solid #d6d6d6;
			padding-bottom: 16px;
			font-size:30px;
		}
		table{
			color: red;
			background-color: #f9f9f9;
			width: 100%
		}
		#size{

			    font-size: 16px;	   
		}
		td {
			height:34px ;
			width: 130px;
			 padding-left: 12px
		}
		td input{
			width: 280px;
			height: 32px;
			border-radius: 6px;
			background: #fff;
			border: 1px solid #ebebeb;
			padding-left: 12px;
			margin-left: 12px;
			font-size: 14px
		}
		.edit{
			margin-top: 12px;
			text-align: center;
			width: 100%;
		}
		.edit a{
			float: left;
			display:block;
			text-align: center;
			width:28%;
			text-decoration: none;
			font-size: 16px;
			color: #111;
			background-color: #ebebeb;
			margin-left: 70px;
			height: 30px;
			line-height: 30px;
			border-radius: 8px;
		}
		.edit .a1:hover{
			background-color: #d0d0d0
		}
		.edit .a2:hover{
			background-color: #d0d0d0
		}
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
				document.getElementById('searchForm').action = '../searchprocess.php';
				return true;		
			}
			else
			{
				return false;
			}
		}
		</script>
		<link rel="stylesheet" type="text/css" href="../../Css/cssIndex.css">
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
						<a href="../dangNhap.php" style="  width: 200px;
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
    					<a href="dangXuat.php" style="width: 200px;
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
								<a href="../dangNhap.php"><img src="https://img.icons8.com/ios-glyphs/30/000000/user.png"></a>
							</div>
							<?php
						}
					?>
			</div>
		</div>
			<div id="mainMenu">
				<div id="containerMenu" >
					<?php $sql="select * from tbltheloai order by maTheLoai limit 4";
						$result=mysqli_query($conn,$sql);
						 ?>
					<ul id="menu" >
						<li>
							<a href="../../index.php">Trang Chủ </a>
						</li><?php
						while($menuTheLoai=mysqli_fetch_array($result)){ ?>
						<li>
							<a href="../chiTietTheLoai.php?maTheLoai=<?php echo($menuTheLoai["maTheLoai"]);?>"><?php echo($menuTheLoai["tenTheLoai"]);?></a>
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
			<div id="content">
				<?php
				$conn = mysqli_connect("localhost","root","","project");
				mysqli_set_charset($conn,"utf8");
				$sql = mysqli_query($conn,"select * from tbldocgia where User='$user' and Pass='$pass'"); 
				?>
				<table>
				<div class="tong">
					<h3>Thông Tin Cá Nhân</h3>
				<?php 
						while ($a = mysqli_fetch_array($sql)) {
					?>
				<div>
					<tr>
						<td id="size">User</td>
						<td>
							<input type="text" value="<?php
									echo ($a["User"]); ?>" disabled="disabled">
						</td>
						<td></td>
					</tr>
				</div>
				<div>
					<tr>
						<td id="size">Password</td>
						<td>
							<input type="text" value="<?php echo ("**********"); ?>" disabled="disabled">
						</td>
					</tr>
				</div>
				<div>
					<tr>
						<td id="size">Họ tên</td>
						<td>
							<input type="text" value="<?php echo ($a["tenDocGia"]);?>" disabled="disabled">
						</td>
					</tr>
				</div>
				<div>
					<tr>
						<td id="size">Địa chỉ</td>
						<td>
							<input type="text" value="<?php echo ($a["diaChi"]); ?>" disabled="disabled">
						</td>
						
					</tr>
				</div>
				<div>
					<tr>
						<td id="size">Email</td>
						<td>
							<input type="text" value="<?php echo ($a["email"]);?>" disabled="disabled">		
						</td>	
					</tr>
				</div>
				
				</div>
				
			</table>
				<div class="edit">
					<a class="a1" href='suaProcess/suapassProcess.php?id=<?php echo$a["maDocGia"]?>'>Đổi Mật Khẩu</a>
					<a class="a2" href='suaProcess/suaHoTenProcess.php?id=<?php echo$a["maDocGia"]?>'>Sửa</a>
				</div>
				<?php

			}
				?>

<!-- 				<div id="thongTinCaNhan" style="background-color: red">
					<table border="1" style="margin: auto; height: 200px; width: 700px">
						<h1 style="text-align: center;">Thông Tin Cá Nhân</h1>
						<?php 
							while ($a = mysqli_fetch_array($thongtin)) {
						?>
						<tr>
							<td>User:</td>
							<td>
								<?php
										echo ($a["User"]); ?>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td>
								<?php echo ("**********"); ?>
								
							</td>
							<td><a href='suaProcess/suapassProcess.php?id=<?php echo$a["maDocGia"]?>'>Đổi Mật Khẩu</a></td>
						</tr>
						<tr>
							<td>Họ Tên:</td>
							<td>
								<?php echo ($a["tenDocGia"]);?>
								
							</td>
							<td><a href='suaProcess/suaHoTenProcess.php?id=<?php echo$a["maDocGia"]?>'>Sửa</a></td>
						</tr>
						<tr>
							<td>Địa Chỉ:</td>
							<td>
								<?php echo ($a["diaChi"]); ?>
								
							</td>
							
						</tr>
						<tr>
							<td>Email:</td>
							<td>
								<?php echo ($a["email"]);?>			
							</td>	
						</tr>
						 
						<?php

					}
						?>
					</table>
				</div> -->
			</div>
	

</body>
</html>
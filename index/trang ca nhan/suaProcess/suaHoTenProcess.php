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
	<title>Sửa Thông Tin Cá Nhân</title>
	<link rel="stylesheet" type="text/css" href="../../../Css/cssDocGia.css">
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
			padding-bottom: 16px
		}
		table{
			color: red;
			background-color: #f9f9f9;
			width: 70%
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
						<form style="padding-top: 40px margin-right: 5px; display: inline-block;"  action="../../searchprocess.php" method="get">
							<input type="search" id="txtsearch" name="Search" placeholder=" Tìm Kiếm... " >
							<input type="submit" id="submitbtn" value="Tìm kiếm" onclick="return validate()"><i class="fas fa-search"></i>
							<!-- <img  src="https://img.icons8.com/material/30/000000/search.png" > -->
						</form>
					</div>
				<?php
					if (isset($_SESSION["User"])) {
					 	$user = $_SESSION["User"];
					?>
					<div id="taiKhoan" style="margin: auto; padding-top: 27px;">
						<a href="../../dangNhap.php" style="  width: 200px;
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
    					<a href="../dangXuat.php" style="width: 200px;
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
								<a href="../../dangNhap.php"><img src="https://img.icons8.com/ios-glyphs/30/000000/user.png"></a>
							</div>
							<?php
						}
					?>
			</div>
		</div>
			<div id="mainMenu">
				<div id="containerMenu" >
					<?php $sql="select * from tbltheloai order by maTheLoai limit 5";
						$result=mysqli_query($conn,$sql);
						 ?>
					<ul id="menu" >
						<li>
							<a href="../../../index.php">Trang Chủ </a>
						</li><?php
						while($menuTheLoai=mysqli_fetch_array($result)){ ?>
						<li>
							<a href="../../chiTietTheLoai.php?maTheLoai=<?php echo($menuTheLoai["maTheLoai"]);?>"><?php echo($menuTheLoai["tenTheLoai"]);?></a>
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
	<?php
	if(isset($_GET["id"]))
	{
	
		$id=$_GET["id"];
		include("../../../connectDb/open.php");
		$sql=("select * from tbldocgia where maDocGia=$id");
		$result=mysqli_query($con,$sql);
		while($infor=mysqli_fetch_array($result))
		{
		?>
<form method="POST" action="xuli.php" >
	<center>
		<h3>Chỉnh Thông Tin Cá Nhân</h3>
		<table>
			<tr>
				<td>
					Họ Tên:
				</td> 
				<td>
					<input type="text"  name="tntHoTen" id="txtHo" value="<?php echo($infor["tenDocGia"]);?>"><br>
				</td>
			</tr>
			<tr>
				<td>
					Email:
				</td>
				<td>
				 	<input type="email" name="tntEmail" id="txtEmail" value="<?php echo($infor["email"]);?>"><br>
				</td>
			</tr>
			<tr>
				<td>
					Địa Chỉ:
				</td>
				<td>
					<input type="text" name="tntDiaChi" id="textDiaChi" value="<?php echo($infor["diaChi"]);?>"><br>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<center>
						<button type="submit" name="ma" value="<?php echo $id;?>">Thay Đổi</button><br>
					</center>
				</td>
				<td></td>
			</tr>
		</table>
	</center>
</form>
	<?php
	}
}
include("../../../connectDb/close.php");
	?>
</body>
</html>

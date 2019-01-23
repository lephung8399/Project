<?php
include("../connectDb/open.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../Css/cssChiTietTinTuc.css">
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
			<div id="content">

				<div id="noiDungChinh">
					<?php
							if(isset($_GET["maTin"]))
							{
								$maTin=$_GET["maTin"];
								include("../ConnectDB/open.php");
								$result=mysqli_query($con,"SELECT `maTin`, `maTheLoai`, `maTaiKhoan`, `tieuDe`, `moTa`, `tomTat`, `noiDung`, `URLanh`, day(`ngay`) as ngay, month(`ngay`) as month, year(`ngay`) as year , `soLuotXem` FROM `tbltintuc` where maTin=$maTin");
								$tinTuc=mysqli_fetch_array($result);	
						?>
					<div id="chamcham"></div>
					<div id="tittle">
						
						<h3 style="width: 100%; margin: auto; text-align: left; padding-top: 2px; font-size: 40px; font-family: sans-serif;">
							<?php echo($tinTuc["tieuDe"]);?>
						</h3>
						
					</div>
					<div id="spaceTin">
						<div id="InforTin" style="text-align: left;margin: auto; margin-top: 7px;margin-left: 5px;">
							<?php echo $tinTuc['ngay']. '-' .$tinTuc['month']. '-' .$tinTuc['year']?>
						</div>
					</div>
					<div id="TinTin">
						<?php echo($tinTuc["noiDung"]);?>
						
					</div>
					<?php
					mysqli_close($con);
				}
				?>
				</div>
				<div id="tinNoiBat">
					<div id="chamcham"></div>
					<div id="tittleTinNB">
						<h3 style="width: 100%; margin: auto; text-align: left; padding-top: 10px">Được Quan Tâm Nhất</h3>
					</div>
					<div id="tinNB">
						
					</div>
				</div>
				
			</div>

	<!--  <?php 
	if(isset($_GET["maTin"]))
	{
		$maTin=$_GET["maTin"];
		include("../ConnectDB/open.php");
		$result=mysqli_query($con,"select * from tbltintuc where maTin=$maTin");
		$tinTuc=mysqli_fetch_array($result);	
		?>
        <h2><?php echo($tinTuc["tieuDe"]);?></h2>
        <br>
        <img src="<?php echo($tinTuc["URLanh"]);?>" width=700px; height=400px; >
        <p>
        	<?php echo($tinTuc["noiDung"]);?>
        </p>
        <div>
        	<h5>Tin Lien quan:</h5>
        	<?php
			$result=mysqli_query($con,"select * from tbltintuc where maTheLoai=(select maTheLoai from tbltintuc where maTin=$maTin) order by maTin desc limit 5");
			
			?>
            <table>
            <?php
				while($tinLienQuan=mysqli_fetch_array($result))
				{
					?>
                    <tr>
                		<td><a href="chiTietTinTuc.php?maTin=<?php echo($tinLienQuan["maTin"]);?>"><?php echo($tinLienQuan["tieuDe"]);?></a></td>
               		 </tr>
                    <?php	
				}
			?>
            </table>
        </div>
        <?php
		include("../ConnectDB/close.php");
	}
	?> -->
</body>
</html> 
<?php
include("../connectDb/open.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Demo</title>
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
				return true;	
				
			}
			else
			{
				return false;
			}
		}

		</script>
		<link rel="stylesheet" type="text/css" href="../Css/cssIndex.css">
	</head>
	<body>
		<div id="main">

			
			<div id="header">
				<div id="lienHe">
					<div style="margin: auto; padding-top: 40px; display: flex; align-items: center;">
						<h4 style="font-family: sans-serif; margin-right: 5px; display: inline-block;">	LIÊN KẾT VỚI CHÚNG TÔI:
						</h4>
						<a href="https://www.instagram.com/hungleph/"><img src="https://img.icons8.com/windows/32/000000/instagram-new.png"></a>
						
					</div>
				</div>
				<div id="logo"></div>
				<div id="SearchLogin">
					<div id="khongdelamgi"></div>
					<div id="timKiem" style="margin: auto;  display: flex; align-items: center;">
						<form style="padding-top: 40px margin-right: 5px; display: inline-block;"  action="searchprocess.php" method="get">
							<input type="search" id="txtsearch" name="Search" placeholder=" Tìm Kiếm... " >
							<input type="submit" id="submitbtn" value="Tìm kiếm" onclick="return validate()">
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
						<?php
						if(isset($_GET['Search']))
					{
						$Search=$_GET['Search'];
						$sql="Select * from tbltintuc where noiDung like '%$Search%' or tieuDe like '%$Search%' or moTa like '%$Search%' or tomTat like '%$Search%' ";
					}
					$result=mysqli_query($con,$sql); 
					$demm=mysqli_num_rows($result);
					while ($baiViet = mysqli_fetch_array($result))
					{
						?>
							<div style="width: 300px; height: 500px; float: left; margin: 5px 2.5px">
								<div style="width: 100%;">
									<img src="<?php echo $baiViet['URLanh'] ?>" style="width: 300px">
								</div>
								<div style="width: 100%; ">
									<span style="font-size: 20px; font-weight: bold; margin: 5px">
										
										<a href="chiTietTinTuc.php?maTin=<?php echo $baiViet[0] ?>"><?php echo $baiViet['tieuDe'] ?></a>
									</span>
									<br>
									<span style="margin: 5px">
										<?php echo $baiViet['tomTat'] ?>
									</span>
								</div>
							</div>
						<?php
					}
						?>

		</div>
	</body>
</html>
<?php
include("../connectDb/close.php");
?>
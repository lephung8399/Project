<?php
session_start();
include("../connectDb/open.php");
mysqli_set_charset($con,'utf8');
// đây là phần số lượt xem 
$maTin = $_GET["maTin"];
$sql = "UPDATE  tbltintuc  SET soLuotXem = soLuotXem+1 WHERE maTin = $maTin";
mysqli_query($con,$sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../Css/cssChiTietTinTuc.css">
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
			  background-color: #555;}
			#ocmt{
      width: 630px;
      box-sizing: border-box;
      border: 1px solid black;
      border-radius: 4px;
      outline:none;
      padding: 12px 14px;
    }
</style>
<script>
	function validate1()
	{
		var txtLength = document.getElementById('txt').value.length;
		if(txtLength == 0)
		{
			alert('Bình luận trống!');
		}
		else
		{
			document.getElementById('btnSUBMIT').type = 'submit';
		}
	}
</script>
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
							<!-- <input type="submit" id="submitbtn" style=""value="Tìm kiếm" onclick="return validate()"><i class="fas fa-search"></i> -->
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
							<span style="margin-left: 100px">Số lượt xem: <?php echo($tinTuc["soLuotXem"]);?>
						</div>
					</div>
					<div id="TinTin">
						<?php echo($tinTuc["noiDung"]);?>
						
					</div>
					<?php
					}
						
					?>
					
					<div id="cmt">
						<h1 >Bình Luận</h1>
						<?php if(!isset($_SESSION['User'])) {
							// $User=$_SESSION['User'];
							?>
							Xin hãy
							<a href="dangNhap.php" style="text-decoration: none;">Đăng Nhập</a>, <a href="dangki/dangki.php" style="text-decoration: none;">Đăng Ký </a>để bình luận!
						<?php } ?>
						<form  id="frm" action="democmt/cmtprocess.php" method="POST" >
							<?php if(isset($_SESSION['User'])) { 
							$User=$_SESSION['User'];

							$query="select maDocGia from tblDocGia where User='$User'";
							$result=mysqli_query($con,$query);

							$maDocGia=mysqli_fetch_array($result);
							

								?>
							<textarea  id="txt"  name="txtcmt" style="width: 600px; height: 100px; border: none; border-bottom: 1px solid grey" placeholder="Nhập bình luận của bạn..."></textarea>
							<input type="number" name="maDocGia" value="<?php echo $maDocGia[0]; ?>" style="display: none;" readonly>
							<span id="err"></span>
							<input type="text" name="maTin" value="<?php echo $maTin;?>" style="display: none;" readonly>
							<br>
							<input type="button" id="btnSUBMIT"  value="Bình luận" onclick="validate1()" style="width: 120px; height: 30px">
							<?php } ?>
						</form><br>
						<!-- Hiển Thị Comment			  -->
					 <?php 
						if(isset($_POST['txtcmt']) || true){
						// $xemcmt = $_POST['txtcmt'];
						$conn = mysqli_connect("localhost","root","","project");
						mysqli_set_charset($conn,"utf8");
						$query="SELECT `maCmt`, `maTin`, `noiDungCmt`, `ngayCmt`, tbldocgia.tenDocGia as tenDocGia FROM `tblcmt` INNER JOIN tbldocgia on tblcmt.maDocGia = tbldocgia.maDocGia where maTin=$maTin and tblcmt.tinhTrang = 1 order by maCmt desc";
						// echo $query;
						$sql = mysqli_query($conn,$query);
						mysqli_set_charset($conn,'utf8');


							while ($a = mysqli_fetch_array($sql)) {
						?>
						
						<input type="text" name="ocmt" id="ocmt" value="<?php echo $a["tenDocGia"].' : '.$a["noiDungCmt"].' || '.$a["ngayCmt"]; ?>"" readonly><br>
								
								
							
						
						
						<?php 
						} 
					}
						?>
					</div>
					<div id="tinLienQuan">
						<h2 style="border-bottom: 5px solid #5FD9E2">Tin liên quan</h2>
				        	<?php
							$result=mysqli_query($con,"select * from tbltintuc where maTheLoai=(select maTheLoai from tbltintuc where maTin=$maTin) and tinhTrang=1 order by maTin desc limit 5");
							
							?>
				            <table>
				            <?php
								while($tinLienQuan=mysqli_fetch_array($result))
								{
									?>
				                    <tr>
				                		<td><a href="chiTietTinTuc.php?maTin=<?php echo($tinLienQuan["maTin"]);?>" style="text-decoration: none">
				                			<ul>
				                				<li>
				                					<?php echo($tinLienQuan["tieuDe"]); ?>
				                						
				                					</li>
				                				</ul>
				                			</a>
				                		</td>
				               		 </tr>
				                    <?php	
								}
							?>
				            </table>
					</div>
				</div>
				<div id="tinNoiBat">
					<div id="tittleTinNB" style="background: #CC0033">
						<h3 style="width: 100%; margin: auto; text-align: left; padding-top: 15px;padding-left:10px;color: white; font-family: ">ĐƯỢC QUAN TÂM NHẤT</h3>
					</div>
					<div id="tinNB">
						<?php
						include("../connectDb/open.php");
						if(isset($_GET["maTin"]))
						{
							$tinTuc=$_GET["maTin"];
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
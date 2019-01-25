<?php  
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
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
		.err{
			color: red
		}

	</style>
		<meta charset="UTF-8">
		<title>Thêm Bài Viết</title>
		<script src="jquery-3.1.1.min.js"></script>
		<script src="ckeditor/ckeditor.js"></script>
		<script src="ckfinder/ckfinder.js"></script>
		<script type="text/javascript">
		function validate()
		{
			var tieude=document.getElementById("txtTieuDe").value;
			var mota=document.getElementById("txtMoTa").value;
			var tomtat=document.getElementById("txtTomTat").value;
			var noidung=document.getElementById("txtNoiDung").value;
			var date=document.getElementById("date").value;
			// var tacgia=document.getElementById("txtTacGia").value;

			var errTieuDe=document.getElementById("errTieuDe");
			var errMoTa=document.getElementById("errMoTa");
			var errTomTat=document.getElementById("errTomTat");
			var errNoiDung=document.getElementById("errNoiDung");
			var errDate=document.getElementById("errDate");
			// var errTacGia=document.getElementById("errTacGia");
			
			var dem=0;
			// if(tacgia.length==0)
			// {
			// 	errTacGia.innerHTML="Không được để trống!";
			// }else
			// {
			// 	errTacGia.innerHTML="";
			// 			dem++;
			// }

			if(tieude.length==0)
			{
				errTieuDe.innerHTML="Không được để trống!";
			}else
			{
				errTieuDe.innerHTML="";
						dem++;
			}

			if(mota.length==0)
			{
				errMoTa.innerHTML="Không được để trống!";
			}else
			{
				errMoTa.innerHTML="";
						dem++;
			}

			if(tomtat.length==0)
			{
				errTomTat.innerHTML="Không được để trống!";
			}else
			{
				errTomTat.innerHTML="";
						dem++;
			}
			// if(noidung.length==0)
			// {
			// 	errNoiDung.innerHTML="Không được để trống!";
			// }else
			// {
			// 	errNoiDung.innerHTML="";
			// 			dem++;
			// }
			if(date.length==0)
			{
				errDate.innerHTML="Không được để trống!";
			}else
			{
				errDate.innerHTML="";
						dem++;
			}

			if(dem==4)
			{
				document.getElementById("frm").submit();
			}
		}
		</script>
		
	</head>
	<body>
		<div id="main">
			<div id="mainMenu">
					<div id="menu">
						<a href="?dog=4"><h3 style="display: inline-block; margin-left: 10px ">Trang Chủ</h3></a>
						<a href="?dog=1"><h3  style="display: inline-block; margin-left: 10px">Thông Tin Cá Nhân</h3></a>
						<?php
						 if(($_SESSION['maQuyen']) >1){?>
						 	<a href="?dog=2"><h3  style="display: inline-block; margin-left: 10px">Quản Lí Thể Loại</h3></a>
						<?php }?>
						<a href="?dog=3"><h3 style="display: inline-block; margin-left: 10px">Quản Lí Bài Viết</h3></a>
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
				
			?>

				<form action="upload.php" method="POST" enctype="multipart/form-data">
				Ảnh đại diện tin:<img src="" width="200px">
			    <input type="file" name="fileToUpload" id="fileToUpload">
			    <input type="submit" value="Upload Image" name="submit">
				</form>
				<form action="themBaiVietProcess.php" id="frm" method="POST">
					<table>
						<tr>
						<th>Tiêu đề:</td>
						<td>
							<input type="text" name="txtTieuDe" id="txtTieuDe">
						</td>
						<td><span id="errTieuDe" class="err"></span></td>
					</tr>
					<tr>
						<td>Mô tả</td>
						<td>
							<input type="text" name="txtMoTa" id="txtMoTa">
						</td>
						<td><span id="errMoTa" class="err"></span></td>
					</tr>
					<tr>
						<td>Tóm Tắt</td>
						<td>
							<input type="text" name="txtTomTat" id="txtTomTat">
						</td>
						<td><span id="errTomTat" class="err"></span></td>
					</tr>
					<tr>
						<td>Tên Thể Loại</td>
						
						<td>
							<select name="theLoai">
								<option>---Chọn Thể Loại---</option>
								<?php								
								include("../connectDb/open.php");
								$sql=("select * from tblTheLoai");
								$result=mysqli_query($con,$sql);
								while($theloai=mysqli_fetch_array($result)){
								?>
								
								<option value="<?php echo ($theloai["maTheLoai"]); ?>">
									<?php echo ($theloai["tenTheLoai"]); ?>
									
								</option>
								<?php
								}
								?>
							</select>
						</td>
						<?php
						include("../connectDb/close.php");
						?>
					</tr>
					<tr>
						<td>Ảnh:</td>
						<td>
							<input type="text" name="txtAnh" value="<?php if(isset($_GET["anh"])) echo $_GET["anh"];?>">
						</td>
						
					</tr>
					<tr>
						<td >Nội dung:</td>
						<td>
							<textarea name="txtNoiDung" id="txtNoiDung" style="width: 600px; height: 600px"></textarea>
						</td>
						<td><span id="errNoiDung" class="err"></span></td>
					</tr>
					<!-- <tr>
						<td>Tác Giả:</td>
						<td>
							<input type="text" name="txtTacGia" id="txtTacGia">
						</td>
						<td><span id="errTacGia" class="err"></span></td>
					</tr> -->
					<tr>
						<td>Ngày Đăng</td>
						<td>
							<input type="date" name="txtDate" id="date">
						</td>
						<td><span id="errDate" class="err"></span></td>
					</tr>
				</table>
				<input type="button" value="Thêm" onclick="validate()" style="width: 70px; height: 50px; margin-left: 600px ">
					<script>CKEDITOR.replace( 'txtNoiDung',		{
					filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
					filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
					filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
					filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
					filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
					filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
					
					});</script>
			</form>
			<!-- <form action="upload.php" method="POST" enctype="multipart/form-data">
				<img src="" width="200px">
			    <input type="file" name="fileToUpload" id="fileToUpload">
			    <input type="submit" value="Upload Image" name="submit">
			</form> -->
			<?php }
			?>
			
		</body>
	</html>
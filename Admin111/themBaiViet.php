<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Thêm Bài Viết</title>
		<script>
		function validate()
		{
			var tieude=document.getElementById("txtTieuDe").value;
			var mota=document.getElementById("txtMoTa").value;
			var tomtat=document.getElementById("txtTomTat").value;
			var noidung=document.getElementById("txtNoiDung").value;
			var date=document.getElementById("date").value;
			var errTieuDe=document.getElementById("errTieuDe");
			var errMoTa=document.getElementById("errMoTa");
			var errTomTat=document.getElementById("errTomTat");
			var errNoiDung=document.getElementById("errNoiDung");
			var errDate=document.getElementById("errDate");
			
			var dem=0;
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
			if(noidung.length==0)
			{
				errNoiDung.innerHTML="Không được để trống!";
			}else
			{
				errNoiDung.innerHTML="";
						dem++;
			}
			if(date.length==0)
			{
				errDate.innerHTML="Không được để trống!";
			}else
			{
				errDate.innerHTML="";
						dem++;
			}
			if(dem==5)
			{
				document.getElementById("frm").submit();
			}
		}
		</script>
		<link rel="stylesheet" type="text/css" href="../Css/CssThem.css">
	</head>
	<body>
		<div id="main">
			<div id="mainmenu">
				<ul id="menu" >
					<li>
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#">Công Nghệ</a>
						<ul>
							<li>
								<a href="#">Home 2</a>
							</li>
							<li>
								<a href="#">Home 2</a>
							</li>
							<li>
								<a href="#">Home 2</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Thế Giới</a>
						<ul>
							<li>
								<a href="#">Home 2</a>
							</li>
							<li>
								<a href="#">Home 2</a>
							</li>
							<li>
								<a href="#">Home 2</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Kinh Doanh</a>
					</li>
					<li>
						<a href="#">Showbiz</a>
					</li>
				</ul>
			</div>
			<div id="content">
				<form action="themBaiVietProcess.php">
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
							<select>
								<option>---Chọn Thể Loại---</option>
								<?php								
								include("../connectDb/open.php");
								$sql=("select * from tblTheLoai");
								$result=mysqli_query($con,$sql);
								while($theloai=mysqli_fetch_array($result)){
								?>
								
								<option><?php echo ($theloai["tenTheLoai"]); ?></option>
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
						<td >Nội dung:</td>
						<td>
							<textarea name="txtNoiDung" id="txtNoiDung" style="width: 600px; height: 600px"></textarea>
						</td>
						<td><span id="errNoiDung" class="err"></span></td>
					</tr>
					<tr>
						<td>Ngày Đăng</td>
						<td>
							<input type="date" name="txtDate" id="date">
						</td>
						<td><span id="errDate" class="err"></span></td>
					</tr>
				</table>
				<input type="button" value="Thêm" onclick="validate()" style="width: 70px; height: 50px; margin-left: 600px ">
			</form>
			<div>
				
			</div>
			<form action="themBaiVietProcess.php" id="frm">
				
			</form>
		</body>
	</html>
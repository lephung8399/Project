<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<a href="#" style="text-decoration: none;  font-size: 27px; font-family: monospace;"><strong>Quản lí Bài viết</strong></a>
			<br>
			<form method="POST">
				<table cellpadding="20px" cellspacing="0">
					<tr>
						<td width="120px">
						<strong>
						Mã Tin:</strong>
							<input type="text" name="maTin" style="width: 100px" value="<?php if(isset($_POST['maTin'])) echo $_POST['maTin']; ?>">
						</td>
						<td width="160px">
							<strong>Tên Thể Loại:</strong>
						<select name="tenTheLoai">
							<option value="999" selected <?php if(isset($_GET['maTheLoai'])) if($_GET['maTheLoai']== 999) echo "selected" ?>>
							---Chọn Thể Loại---</option>
							<option value="1" selected <?php if(isset($_GET['maTheLoai'])) if($_GET['maTheLoai']== 1) echo "selected" ?>>
							Công Nghệ</option>
							<option value="2" selected <?php if(isset($_GET['maTheLoai'])) if($_GET['maTheLoai']== 2) echo "selected" ?>>
							Thế Giới</option>
							<option value="3" selected <?php if(isset($_GET['maTheLoai'])) if($_GET['maTheLoai']== 3) echo "selected" ?>>
							Phóng Sự</option>
							<option value="4" selected <?php if(isset($_GET['maTheLoai'])) if($_GET['maTheLoai']== 4) echo "selected" ?>>
							Giải Trí</option>
						</select>
						</td>
						<td  width="270px">
						<strong>
							Tiêu Đề:</strong>
							<input type="text" name="tieuDe" style="width: 250px" value="<?php if(isset($_POST['tieuDe'])) echo $_POST['tieuDe']; ?>">
						</td>
						<td width="120px">
						<strong>
							Ngày Đăng:</strong>
							<input type="date" name="ngay" style="width: 100px" value="<?php if(isset($_POST['ngay'])) echo $_POST['ngay']; ?>">
						</td>
						<td  width="120px">
						<strong>
							Số Lượt Xem:</strong>
							<input type="text" name="soLuotXem" style="width: 100px" value="<?php if(isset($_POST['soLuotXem'])) echo $_POST['soLuotXem']; ?>">
						</td>
						<td>
							<input type="submit" value="Tìm Kiếm">
						</td>
					</tr>
				</table>
			</form>
			<?php
			include("../connectDb/open.php");
			$sql=("SELECT maTin, tbltheloai.maTheLoai, `tieuDe`, `ngay`,soLuotXem  FROM  tbltintuc INNER JOIN tbltheloai on tbltheloai.maTheLoai = tbltintuc.maTheLoai order by maTin");
			if(!empty($_POST['maTin'])){
				$maTin=$_POST['maTin'];
				$sql="SELECT maTin, tbltheloai.maTheLoai, `tieuDe`, `ngay`,soLuotXem  FROM  tbltintuc INNER JOIN tbltheloai on tbltheloai.maTheLoai = tbltintuc.maTheLoai where maTin=$maTin order by maTheLoai";
			}
			if(!empty($_POST['maTheLoai'])){
				if($_POST['maTheLoai'] != 999){
					$maTL=$_POST['maTin'];
					$sql="SELECT maTin, tbltheloai.maTheLoai, `tieuDe`, `ngay`,soLuotXem  FROM  tbltintuc INNER JOIN tbltheloai on tbltheloai.maTheLoai = tbltintuc.maTheLoai where maTheLoai=$maTL order by maTheLoai";
				}
			}
			if(!empty($_POST['tieuDe'])){
				$tieuDe=$_POST['tieuDe'];
				$sql="SELECT maTin, tbltheloai.maTheLoai, `tieuDe`, `ngay`,soLuotXem  FROM  tbltintuc INNER JOIN tbltheloai on tbltheloai.maTheLoai = tbltintuc.maTheLoai where tieuDe like '%$tieuDe%' order by maTheLoai";
			}
			if(!empty($_POST['ngay'])){
				$ngay=$_POST['maTin'];
				$sql="SELECT maTin, tbltheloai.maTheLoai, `tieuDe`, `ngay`,soLuotXem  FROM  tbltintuc INNER JOIN tbltheloai on tbltheloai.maTheLoai = tbltintuc.maTheLoai where ngay=$ngay order by maTheLoai";
			}

			$result= mysqli_query($con,$sql);

			?>
			<table border="2px"; cellspacing="3" cellpadding="5" style="width: 100%">
				<tr>
					<th style="width: 10%">Mã tin</th>
					<th style="width: 10%">Tên Thể Loại</th>
					<th style="width: 40%">Tiêu Đề</th>
					<th style="width: 10%">Ngày đăng</th>
					<th style="width: 10%">Số Lượt xem</th>
					<th style="width: 20%">Chức năng</th>
				</tr>
				<?php
				while($tintuc=mysqli_fetch_array($result)){
					?>
					<tr>
						<td><?php echo ($tintuc["maTin"]); ?></td>
						<td>
							<?php  if($tintuc["maTheLoai"]==1){echo "Công Nghệ";}
							if($tintuc["maTheLoai"]==2){echo "Thế Giới";}
							if($tintuc["maTheLoai"]==3){echo "Phóng Sự";}
							if($tintuc["maTheLoai"]==4){echo "Giải Trí";}
							 ?>
								
						</td>
						<td><?php echo ($tintuc["tieuDe"]); ?></td>
						<td><?php echo ($tintuc["ngay"]); ?></td>
						<td><?php echo ($tintuc["soLuotXem"]); ?></td>
						<td>
							<button><a href="suaBaiViet.php?id=<?php echo($tintuc["maTin"]);?>">Chỉnh Sửa</a></button>
							<button><a href="xoaBaiViet.php?id=<?php echo($tintuc["maTin"]);?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a></button>
							<button><a href="#">Xem tin</a></button>
						</td>
					</tr>
					<?php 
				}
				?>
			</table>
			<br>
			<button><a href="themBaiViet.php" style="font-size: 20px; text-decoration: none; font-family: sans-serif; width: 80%; margin: auto;">Thêm Bài Viết</a></button>
			<?php
			include("../connectDb/close.php");
			?>
</body>
</html>
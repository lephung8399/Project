<?php
if(!isset($_SESSION['maQuyen'])) header("location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản Lí Bài Viết</title>
</head>
<body>
	<a href="#" style="text-decoration: none;  font-size: 27px; font-family: monospace;  letter-spacing: 10px"><strong>Quản lí Bài viết</strong></a>
			<br>
			<form method="POST">
				<table cellpadding="20px" cellspacing="0">
					<tr>
						<!-- <td width="120px">
						<strong>
						Mã Tin:</strong>
							<input type="text" name="maTin" style="width: 100px" value="<?php if(isset($_POST['maTin'])) echo $_POST['maTin']; ?>">
						</td> -->
						<td width="160px">
							<strong>Tên Thể Loại:</strong>
						<select name="tenTheLoai">
							<option value="999" selected <?php if(isset($_POST['tenTheLoai'])) if($_POST['tenTheLoai']== 999) echo "selected" ?>>
							---Chọn Thể Loại---</option>
							<option value="1" <?php if(isset($_POST['tenTheLoai'])) if($_POST['tenTheLoai']== 1) echo "selected" ?>>
							Công Nghệ</option>
							<option value="2" <?php if(isset($_POST['tenTheLoai'])) if($_POST['tenTheLoai']== 2) echo "selected" ?>>
							Thế Giới</option>
							<option value="3" <?php if(isset($_POST['tenTheLoai'])) if($_POST['tenTheLoai']== 3) echo "selected" ?>>
							Thể Thao</option>
							<option value="4" <?php if(isset($_POST['tenTheLoai'])) if($_POST['tenTheLoai']== 4) echo "selected" ?>>
							Phong Cách</option>
						</select>
						</td>
						<td  width="270px">
							<strong>
								Tiêu Đề:
							</strong>
							<input type="hidden" value="0" name="search" >
							<input type="text" name="tieuDe" style="width: 250px" value="<?php if(isset($_POST['tieuDe'])) echo $_POST['tieuDe']; ?>" >
						</td>
						<td width="120px">
						<strong>
							Ngày Đăng:</strong>
							<input type="date" name="ngay" style="width: 100px" value="<?php if(isset($_POST['ngay'])) echo $_POST['ngay']; ?>">
						</td>
						<td width="120px">
						<strong>
							Tình Trạng</strong>
							<select name="tinhTrang">
							<option value="999" selected <?php if(isset($_POST['tinhTrang'])) if($_POST['tinhTrang']== 999) echo "selected" ?>>
							---Chọn Tình Trạng---</option>
							<option value="1" <?php if(isset($_POST['tinhTrang'])) if($_POST['tinhTrang']== 1) echo "selected" ?>>
							Đã duyệt</option>
							<option value="0" <?php if(isset($_POST['tinhTrang'])) if($_POST['tinhTrang']== 0) echo "selected" ?>>
							Chưa Duyệt</option>
						</select>
						</td>

						<td>
							<button type="submit" name="dog" value="3">Tìm</button>
						</td>
						<td>
							<input type="reset" name="Tạo lại">
						</td>
					</tr>
				</table>
			</form>
			<?php
			include("../connectDb/open.php");
			$query="select * from tbltintuc order by maTin desc";
			if(isset($_POST["search"])&&$_POST["search"]==0)
        	{
                $tieuDe=$_POST["tieuDe"];
                $ngay=$_POST["ngay"];
                $query="select * from tbltintuc where tieuDe like '%$tieuDe%' and ngay >'$ngay'";
                if($_POST["tinhTrang"]!=999)
                {
                    $tinhTrang=$_POST["tinhTrang"];
                    $query=$query." and tinhTrang=$tinhTrang";
                }
                if($_POST["tenTheLoai"]!=999)
                {
                    $maTheLoai=$_POST["tenTheLoai"];
                    $query=$query." and maTheLoai=$maTheLoai";
                }
                echo $query;
            }
            

   //      }
			// $sql=("SELECT maTin, tbltheloai.maTheLoai, `tieuDe`, `ngay`,URLanh,tinhTrang  FROM  tbltintuc INNER JOIN tbltheloai on tbltheloai.maTheLoai = tbltintuc.maTheLoai order by maTin DESC");
			
			// if(!empty($_POST['tenTheLoai'])){
			// 	if($_POST['tenTheLoai'] != 999){
			// 		$maTL=$_POST['tenTheLoai'];
			// 		$sql="select * from (SELECT maTin, tbltheloai.maTheLoai, `tieuDe`, `ngay`,URLanh,tinhTrang  FROM  tbltintuc INNER JOIN tbltheloai on tbltheloai.maTheLoai = tbltintuc.maTheLoai)a where maTheLoai=$maTL order by maTheLoai";
			// 	}
			// }
			// if(!empty($_POST['tieuDe'])){
			// 	$tieuDe=$_POST['tieuDe'];
			// 	$sql="SELECT maTin, tbltheloai.maTheLoai, `tieuDe`, `ngay`,URLanh,tinhTrang  FROM  tbltintuc INNER JOIN tbltheloai on tbltheloai.maTheLoai = tbltintuc.maTheLoai where tieuDe like '%$tieuDe%' order by maTheLoai";
			// }
			// if(!empty($_POST['ngay'])){
			// 	$ngay=$_POST['ngay'];
			// 	$sql="SELECT maTin, tbltheloai.maTheLoai, `tieuDe`, `ngay`,URLanh,tinhTrang  FROM  tbltintuc INNER JOIN tbltheloai on tbltheloai.maTheLoai = tbltintuc.maTheLoai where ngay='$ngay' order by maTheLoai";
			// }
			// if(isset($_POST['tinhTrang'])){
			// 	if($_POST['tinhTrang'] != 999){
			// 		$tinhTrang=$_POST['tinhTrang'];
			// 		$sql="select * from (SELECT maTin, tbltheloai.maTheLoai, `tieuDe`, `ngay`,URLanh,tinhTrang  FROM  tbltintuc INNER JOIN tbltheloai on tbltheloai.maTheLoai = tbltintuc.maTheLoai)a where tinhTrang=$tinhTrang order by maTheLoai";
			// 	}
			// }
			

			$result= mysqli_query($con,$query);

			?>
			<table border="2px"; cellspacing="3" cellpadding="5" style="width: 100%">
				<tr>
					<th style="width: 5%">Mã tin</th>
					<th style="width: 5%">Tên Thể Loại</th>
					<th style="width: 15%">Ảnh Tin</th>
					<th style="width: 30%">Tiêu Đề</th>
					<th style="width: 10%">Ngày đăng</th>
					<th style="width: 10%">Tình Trạng</th>
					<th style="width: 25%">Chức năng</th>
				</tr>
				<?php
				while($tintuc=mysqli_fetch_array($result)){
					?>
					<tr>
						<td><?php echo ($tintuc["maTin"]); ?></td>
						<td>
							<?php  if($tintuc["maTheLoai"]==1){echo "Công Nghệ";}
								if($tintuc["maTheLoai"]==2){echo "Thế Giới";}
								if($tintuc["maTheLoai"]==3){echo "Thể Thao";}
								if($tintuc["maTheLoai"]==4){echo "Phong Cách";}
							 ?>
								
						</td>
						<td><img src="<?php echo ($tintuc["URLanh"]); ?>" style="width: 100%; height: auto"></td>
						<td><?php echo ($tintuc["tieuDe"]); ?></td>
						<td><?php echo ($tintuc["ngay"]); ?></td>
						<td>
							<?php if($tintuc["tinhTrang"]==0){echo "Chưa Duyệt";}
									if($tintuc["tinhTrang"]==1){echo "Đã Duyệt";} ?>
										
						</td>
						<td>
							<?php 
							if($tintuc["tinhTrang"]==0 && $_SESSION['maQuyen'] == 1){ ?>
							<button><a href="suaBaiViet.php?id=<?php echo($tintuc["maTin"]);?>">Chỉnh Sửa</a></button>
							<?php }else if($_SESSION["maQuyen"]>1){?>
							 <button><a href="suaBaiViet.php?id=<?php echo($tintuc["maTin"]);?>">Chỉnh Sửa</a></button>
							<?php }?>
							<?php
				 				if(($_SESSION['maQuyen']) >1){?>
							<button><a href="xoaBaiViet.php?id=<?php echo($tintuc["maTin"]);?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a></button>
							<?php }?>
							<?php
				 				if(($_SESSION['maQuyen']) >1){?>
							<button><a href="hienTinTuc.php?maTin=<?php echo($tintuc["maTin"])?>">Duyệt</a></button>
							<?php }?>
							<?php
				 				if(($_SESSION['maQuyen']) >1){?>
							<button><a href="anTinTuc.php?maTin=<?php echo($tintuc["maTin"])?>">Không duyệt</a></button>
							<?php }?>
							<button>
								<a href="../index/chiTietTinTuc.php?maTin=<?php echo($tintuc["maTin"])?>">Xem Tin</a>
							</button>
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
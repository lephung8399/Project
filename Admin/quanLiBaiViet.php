<?php
if(!isset($_SESSION['maQuyen'])) header("location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản Lí Bài Viết</title>
	<style type="text/css">
		/* Blue */
		.info {
		  border-color: #2196F3;
		  color: dodgerblue
		}

		.info:hover {
		  background: #2196F3;
		  color: white;
		}
		.btn {
		  border: 2px solid black;
		  background-color: white;
		  color: black;
		  padding: 14px 28px;
		  font-size: 16px;
		  cursor: pointer;
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
			  background-color: dodgerblue;
			  color: white;
			  cursor: pointer;
			  padding: 15px;
			  border-radius: 4px;
			}

		#myBtn:hover {
		  background-color: #555;}
		
		  
	</style>
		
</head>
</head>
<body>
	<a href="#" style="text-decoration: none;  font-size: 27px; font-family: monospace;  letter-spacing: 10px"><strong>Quản lí Bài viết</strong></a>
			<br>
			<!-- form loc tim kiem -->
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
							<option value="5" <?php if(isset($_POST['tenTheLoai'])) if($_POST['tenTheLoai']== 5) echo "selected" ?>>
							Kinh Doanh</option>
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
			$query="SELECT tbladmin.tenAdmin, maTin, maTheLoai, tieuDe, moTa,noiDung,URLanh, date_format(ngay,'%d/%m/%Y') as ngay,tbltintuc.tinhTrang,soLuotXem FROM tbltintuc INNER JOIN tbladmin ON tbltintuc.maTaiKhoan=tbladmin.maTaiKhoan order by maTin desc";
			$demRow = 0;
			$sp1dong = 3;
			$sp1page = 6;
			$left = -10;
			$sqlSoSP = mysqli_query($con, "select * from tbltintuc");
			$demPage = ceil(mysqli_num_rows($sqlSoSP)/$sp1page);
			$query = "SELECT tbladmin.tenAdmin, maTin, maTheLoai, tieuDe, moTa,noiDung,URLanh, date_format(ngay,'%d/%m/%Y') as ngay,tbltintuc.tinhTrang,soLuotXem FROM tbltintuc INNER JOIN tbladmin ON tbltintuc.maTaiKhoan=tbladmin.maTaiKhoan order by maTin desc limit 0,$sp1page";
			if(isset($_GET['page']))
			{
				$page = $_GET['page'];
				if ($page > $demPage) {
					?>
					<script type="text/javascript">
						window.location.href="../?page=<?php echo $demPage ?>"
					</script>
					<?php
				}
				else if ($page < 1) {
					?>
					<script type="text/javascript">
						window.location.href="../?page=1"
					</script>
					<?php
				}
				else
				{
					$start = ($_GET['page']-1) * $sp1page;
					if($_GET['page'] == 1) $start = 0;
					$query = "SELECT tbladmin.tenAdmin, maTin, maTheLoai, tieuDe, moTa,noiDung,URLanh, date_format(ngay,'%d/%m/%Y') as ngay,tbltintuc.tinhTrang,soLuotXem FROM tbltintuc INNER JOIN tbladmin ON tbltintuc.maTaiKhoan=tbladmin.maTaiKhoan order by maTin desc limit $start,$sp1page";
				}
			}
			if(isset($_POST["search"])&&$_POST["search"]==0)
        	{
                $tieuDe=$_POST["tieuDe"];
                
                $query="SELECT tbladmin.tenAdmin, maTin, maTheLoai, tieuDe, moTa,noiDung,URLanh, date_format(ngay,'%d/%m/%Y') as ngay,tbltintuc.tinhTrang,soLuotXem FROM tbltintuc INNER JOIN tbladmin ON tbltintuc.maTaiKhoan=tbladmin.maTaiKhoan where tieuDe like '%$tieuDe%' ";
                // echo $query;
                if($_POST["tinhTrang"]!=999)
                {
                    $tinhTrang=$_POST["tinhTrang"];
                    $query=$query." and tbltintuc.tinhTrang=$tinhTrang";
                }
                if($_POST["tenTheLoai"]!=999)
                {
                    $maTheLoai=$_POST["tenTheLoai"];
                    $query=$query." and maTheLoai=$maTheLoai";
                }
                if($_POST['ngay'] != null)
                {
                	$ngay=$_POST["ngay"];
                	$query=$query." and ngay='$ngay'";
                }
            }
            

 
			// echo $query;

			$result= mysqli_query($con,$query);

			?>
			<table border="2px"; cellspacing="3" cellpadding="5" style="width: 100%">
				<tr>
					<th style="width: 5%">Mã tin</th>
					<th style="width: 5%">Tên Thể Loại</th>
					<th style="width: 15%">Ảnh Tin</th>
					<th style="width: 20%">Tiêu Đề</th>
					<th style="width: 10%">Người đăng</th>
					<th style="width: 10%">Ngày đăng</th>
					<th style="width: 10%">Tình Trạng</th>
					<th style="width: 25%">Chức năng</th>
				</tr>
				<?php
				while($tintuc=mysqli_fetch_array($result)){
					?>
					<tr>
						<td>
							<?php echo ($tintuc["maTin"]); ?>
						</td>
						<td style="color: #EA106C">
							<STRONG>
								<?php  
								if($tintuc["maTheLoai"]==1){echo "Công Nghệ";}
								if($tintuc["maTheLoai"]==2){echo "Thế Giới";}
								if($tintuc["maTheLoai"]==3){echo "Thể Thao";}
								if($tintuc["maTheLoai"]==4){echo "Phong Cách";}
								if($tintuc["maTheLoai"]==5){echo "Kinh Doanh";}
							 	?>
							 	
							 </STRONG>
								
						</td>
						<td>
							<img src="<?php echo ($tintuc["URLanh"]); ?>" style="width: 100%; height: auto">
						</td>
						<td>
							<strong>
								<?php echo ($tintuc["tieuDe"]); ?>
							</strong>
						</td>
						<td style="color: #EA106C">
							<?php echo ($tintuc["tenAdmin"]); ?>
						</td>
						<td>
							<?php echo ($tintuc["ngay"]); ?>
						</td>
						<td>
							<h5 style="color: red">
								<?php 
									if($tintuc["tinhTrang"]==0){echo "Chưa Duyệt";}
								?>
							</h5>
							<h5 style="color: green">
								<?php
									if($tintuc["tinhTrang"]==1){echo "Đã Duyệt";} 
								?>
							</h5>		
						</td>
						<td>
							<?php 
							if($tintuc["tinhTrang"]==0 && $_SESSION['maQuyen'] == 1){ ?>
							<button ><a href="suaBaiViet.php?id=<?php echo($tintuc["maTin"]);?>">Chỉnh Sửa</a></button>
							<?php }else if($_SESSION["maQuyen"]>1){?>
							 <button><a href="suaBaiViet.php?id=<?php echo($tintuc["maTin"]);?>">Chỉnh Sửa</a></button>
							<?php }?>
							<?php
				 				if(($_SESSION['maQuyen']) >1){?>
							<button ><a href="xoaBaiViet.php?id=<?php echo($tintuc["maTin"]);?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a></button>
							<?php }?>
							<?php
				 				if(($_SESSION['maQuyen']) >1){?>
							<button ><a href="hienTinTuc.php?maTin=<?php echo($tintuc["maTin"])?>">Duyệt</a></button>
							<?php }?>
							<?php
				 				if(($_SESSION['maQuyen']) >1){?>
							<button id="button"><a href="anTinTuc.php?maTin=<?php echo($tintuc["maTin"])?>">Không duyệt</a></button>
							<?php }?>
							<button >
								<a href="../index/chiTietTinTuc.php?maTin=<?php echo($tintuc["maTin"])?>">Xem Tin</a>
							</button>
						</td>
					</tr>
					<?php 
				}
				?>
			</table>
			<br>
			<button class="btn info"><a href="themBaiViet.php" style="font-size: 20px; text-decoration: none; font-family: sans-serif; width: 80%; margin: auto;" id="button">Thêm Bài Viết</a></button>
			
			<?php 
				for ($i=1; $i <= $demPage; $i++) { 
					?>
						<a href="./home.php?dog=3&page=<?php echo $i ?>"><?php echo $i ?></a>
					<?php
				}
			?>

			<?php
			include("../connectDb/close.php");
			?>
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
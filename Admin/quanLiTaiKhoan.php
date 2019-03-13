<?php


// print_r($_SESSION);die();
if(!isset($_SESSION['maQuyen']) || isset($_SESSION['maQuyen'])<2) header("location: index.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản Lí Tài Khoản</title>
	<style type="text/css">
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
		  background-color: #555;
	</style>
</head>
<body>
	<a href="#" style="text-decoration: none;  font-size: 27px; font-family:  monospace;"><strong>Quản lí tài khoản độc giả</strong></a>
	<br>
			<form method="POST">
				<table cellpadding="20px" cellspacing="0">
					<tr>
						<td  width="270px">
							<strong>
								Tên Độc Giả
							</strong>
							<input type="hidden" value="0" name="search" >
							<input type="text" name="tenDocGia" style="width: 250px" value="<?php if(isset($_POST['tenDocGia'])) echo $_POST['tenDocGia']; ?>" >
						</td>
						<td width="120px">
						<strong>
							Tên Tài Khoản</strong>
							<input type="text" name="User" style="width: 100px" value="<?php if(isset($_POST['User'])) echo $_POST['User']; ?>">
						</td>
						<td width="120px">
						<strong>
							Email</strong>
							<input type="text" name="email" style="width: 100px" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
						</td>
						<td width="120px">
						<strong>
							Tình Trạng</strong>
							<select name="tinhTrang">
							<option value="999" selected <?php if(isset($_POST['tinhTrang'])) if($_POST['tinhTrang']== 999) echo "selected" ?>>
							---Chọn Tình Trạng---</option>
							<option value="1" <?php if(isset($_POST['tinhTrang'])) if($_POST['tinhTrang']== 1) echo "selected" ?>>
							Hoạt động</option>
							<option value="0" <?php if(isset($_POST['tinhTrang'])) if($_POST['tinhTrang']== 0) echo "selected" ?>>
							Đã bị khóa</option>
						</select>
						</td>
						<td>
							<button type="submit" name="dog" value="5">Tìm kiếm</button>
						</td>
					</tr>
				</table>
			</form>
	<?php
	include("../connectDb/open.php");
	mysqli_set_charset($con,'utf8');
	$sql=("select * from tbldocgia");
	$demRow = 0;
	$sp1dong = 3;
	$sp1page = 6;
	$left = -10;
	$sqlSoSP = mysqli_query($con, "select * from tbldocgia");
	$demPage = ceil(mysqli_num_rows($sqlSoSP)/$sp1page);
	$sql = "select * from tbldocgia limit 0,$sp1page";
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
					$sql = "select * from tbldocgia limit $start,$sp1page";
				}
			}
	if(isset($_POST["search"])&&$_POST["search"]==0)
        	{
                $tenDocGia=$_POST["tenDocGia"];
                $User=$_POST['User'];
                $email=$_POST['email'];

                $sql="select * from tbldocgia where tenDocGia like '%$tenDocGia%' AND User like '%$User%' AND email like '%$email%'";
                if($_POST["tinhTrang"]!=999)
                {
                    $tinhTrang=$_POST["tinhTrang"];
                    $sql=$sql." and tinhTrang=$tinhTrang";
                }
            }
	$result=mysqli_query($con,$sql); 

	?>
		<table border="2px"; cellspacing="3" cellpadding="0" style="width: 100%">
			<tr>
				<th style="width: 5%">Mã Tài Khoản</th>
				<th style="width:">Tên Tài Khoản</th>
				<th style="width: ">Mật Khẩu</th>
				<th style="width: ">Tên Độc Giả</th>
				<th style="width:">Email</th>
				<th style="width: ">Địa Chỉ</th>
				<th style="width:">Giới Tính</th>
				<th style="width: ">Quyền Hạn</th>
				<th style="width: ">Trạng Thái</th>
				<th style="width: ">Chức năng</th>
			</tr>
			<?php
			while($taikhoan=mysqli_fetch_array($result)){
				?>
			<form action="suaTaiKhoan.php">
				<tr>
					<td >
						<input type="text" style="width:10px" name="txtMa" readonly="readonly" value="<?php echo($taikhoan["maDocGia"]);?> " style="width: 120px">
					</td>
					<td>
						<input type="text" name="txtUser" value="<?php echo($taikhoan["User"]);?>" style="width: 120px">
					</td>
					<td>
						<input type="password" name="txtPass" value="**********"  style="width: 100px">
					</td>
					<td>
						<input type="text" name="txtTen" value="<?php echo($taikhoan["tenDocGia"]);?>" style="width: 120px">
					</td>
					<td>
						<input type="text" name="txtEmail" value="<?php echo($taikhoan["email"]);?>" style="width: 120px">
					</td>
					<td>
						<input type="text" name="txtDiaChi" value="<?php echo($taikhoan["diaChi"]);?>" style="width: 120px">
					</td>
					<td>
						<input type="radio" name="txtGT" value="1"  <?php if($taikhoan["gioiTinh"]==1) echo "checked";
						?>>Nam
						<input type="radio" name="txtGT" value="0" <?php if($taikhoan["gioiTinh"]==0) echo "checked";
						?> >Nữ
					</td>
					<td>
						<h4 style="color: #CF5646">
							<?php
								if($taikhoan["maQuyen"] == 1){echo "Độc Giả";}
								if($taikhoan["maQuyen"] == 2){echo "Admin";}
								if($taikhoan["maQuyen"] == 3){echo "SuperAdmin";}
							?>
						</h4>
						<!-- CHỨC NĂNG CỦA SUPERADMIN(CÓ THỂ THAY ĐỔI QUYỀN HẠN)<input type="text" name="txtMaQuyen" value="<?php echo($taikhoan["maQuyen"]);?>" > -->
					</td>
					<td >
						<h5 style="color: red">
							<?php
								if($taikhoan["tinhTrang"] == 0){echo "Đã bị khóa";}
							?>
						</h5>
						<h5 style="color: green">
							<?php
								if($taikhoan["tinhTrang"] == 1){echo "Hoạt động";}
							?>
						</h5>
						
					</td>
					<td>
						<input type="submit" onclick="return confirm('Bạn có chắc muốn Thay đổi?')" value="Chỉnh Sửa">
						
						<!-- <button><a href="xoaTaiKhoan.php?id=<?php echo($taikhoan["maDocGia"]);?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a></button> -->
						<button><a href="activeTaiKhoanDocGia.php?maDocGia=<?php echo($taikhoan["maDocGia"]);?>">Hoạt động</a></button>
						<button><a href="khoaTaiKhoanDocGia.php?maDocGia=<?php echo($taikhoan["maDocGia"]);?>">Khóa</a></button>
					</td>
				</tr>
			</form>
			<?php
		}
		?>
		</table>
		<!-- Go to the Top BUTTON -->
		<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

			<?php 
				for ($i=1; $i <= $demPage; $i++) { 
					?>
						<a href="./home.php?dog=5&page=<?php echo $i ?>"><?php echo $i ?></a>
					<?php
				}
			?>


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
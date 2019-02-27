<?php
if(!isset($_SESSION['maQuyen'])) header("location: index.php");
if(($_SESSION['maQuyen']) < 3) header("location: index.php");
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
	<a href="#" style="text-decoration: none;  font-size: 27px; font-family:  monospace;"><strong>Quản lí tài khoản Admin</strong></a>
	<br>
	<form method="POST">
		<table cellpadding="20px" cellspacing="0">
			<tr>
				<td>
					<strong>Tên:</strong>
					<input type="hidden" value="0" name="search" >
					<input type="text" name="tenAdmin" style="width: 200px" value="<?php if(isset($_POST['tenAdmin'])) echo $_POST['tenAdmin']; ?>" autofocus>
				</td>
				<td>
					<strong>Quyền Hạn:</strong>
					<select name="maQuyen" style="width: 110px">
							<option value="999" selected <?php if(isset($_POST['maQuyen'])) if($_POST['maQuyen']== 999) echo "selected" ?>>
							---Tên quyền---</option>
							<option value="1" <?php if(isset($_POST['maQuyen'])) if($_POST['maQuyen']== 1) echo "selected" ?>>
							Biên Tập Viên</option>
							<option value="2" <?php if(isset($_POST['maQuyen'])) if($_POST['maQuyen']== 2) echo "selected" ?>>
							Admin</option>
							<option value="3" <?php if(isset($_POST['maQuyen'])) if($_POST['maQuyen']== 3) echo "selected" ?>>
							SuperAdmin</option>
					</select>
				</td>
				<td>
							<button type="submit" name="dog" value="6">Tìm kiếm</button>
				</td>

			</tr>
		</table>
	</form>
	<?php
	include("../connectDb/open.php");
	$query="select * from tbladmin";
			if(isset($_POST["search"])&&$_POST["search"]==0)
        	{
                $tenAdmin=$_POST["tenAdmin"];
                $query="select * from tbladmin where tenAdmin like '%$tenAdmin%'";
                if($_POST["maQuyen"]!=999)
                {
                    $maQuyen=$_POST["maQuyen"];
                    $query=$query." and maQuyen=$maQuyen";
                }
            }
	// $sql="select * from tbladmin";
	// if(!empty($_POST['tenAdmin'])){
	// 	$tenAdmin=$_POST['tenAdmin'];
	// 	$sql="SELECT * from tbladmin where tenAdmin like '%$tenAdmin%'";
	// 	echo $sql;
	// }
	// if(!empty($_POST['maQuyen'])){
	// 	$maQuyen=$_POST['maQuyen'];
	// 	$sql="SELECT * from tbladmin where maQuyen='$maQuyen'";

	// }
	$result=mysqli_query($con,$query); 

	?>
		<table border="2px"; cellspacing="3" cellpadding="0" style="width: 100%">
			<tr>
				<th style="width:2%">Mã TK</th>
				<th style="width: 5%">Tên</th>
				<th style="width:5% ">Tên Tài Khoản</th>
				<th style="width: 5%">Mật Khẩu</th>
				<th style="width: 10%">Email</th>
				<th style="width: 40%">Quyền Hạn</th>
				<th style="width: 10%">Tình Trạng</th>
				<th style="width: 25%">Chức năng</th>
			</tr>
			<?php
			while($QLadmin=mysqli_fetch_array($result)){
				?>
			<form action="suaTaiKhoanAdmin.php">
				<tr>
					<td>
						<input type="text" name="txtMa" readonly="readonly" value="<?php echo($QLadmin["maTaiKhoan"]);?>" >
						</td>
					<td>
						<input type="text" name="txtTen" value="<?php echo($QLadmin["tenAdmin"]);?>" >
					</td>
					<td>
						<input type="text" name="txtUser" value="<?php echo($QLadmin["tenTaiKhoan"]);?>" >
					</td>
					<td>
						<input type="password" name="txtPass" value="<?php echo($QLadmin["password"]);?>" >
					</td>
					<td>
						<input type="text" name="txtEmail" value="<?php echo($QLadmin["email"]);?>" style="width: 100%">
					</td>
					<td>
						<?php
							if($QLadmin["maQuyen"] == 1){echo "BTV";}
							if($QLadmin["maQuyen"] == 2){echo "Admin";}
							if($QLadmin["maQuyen"] == 3){echo "SuperAdmin";}
						?>
						<!-- CHỨC NĂNG CỦA SUPERADMIN(CÓ THỂ THAY ĐỔI QUYỀN HẠN)<input type="text" name="txtMaQuyen" value="<?php echo($QLadmin["maQuyen"]);?>" > -->
					</td>
					<td>
						<h6 style="color: blue">
							<?php
							if($QLadmin["tinhTrang"] == 1){echo "Hoạt động";}?>
						</h6>
						<h6 style="color: red">
							<?php if($QLadmin["tinhTrang"] == 0){echo "Đã khóa";}
							?> 
						</h6>

					</td>
					<td>
						<input type="submit" onclick="return confirm('Bạn có chắc muốn Thay đổi?')" value="Chỉnh Sửa">
						
						<button><a href="xoaTaiKhoanAdmin.php?id=<?php echo($QLadmin["maTaiKhoan"]);?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a></button>
						<button><a href="HienTaiKhoanAdmin.php?maTaiKhoan=<?php echo($QLadmin["maTaiKhoan"]);?>">Hoạt động</a></button>
						<button><a href="khoaTaiKhoanAdmin.php?maTaiKhoan=<?php echo($QLadmin["maTaiKhoan"]);?>">Khóa</a></button>
					</td>
				</tr>
			</form>
			<?php
		}
		?>
		<!-- Thêm Tài Khoản -->
		<tr>
			<form action="themTaiKhoanAdmin.php">
				<tr>
					<td>
						
					<td>
						<input type="text" placeholder="Nhập tên..." name="txtTen" value="<?php echo($QLadmin["tenAdmin"]);?>">
					</td>
					<td>
						<input type="text" placeholder="Nhập tên tài khoản..." name="txtUser" value="<?php echo($QLadmin["tenTaiKhoan"]);?>" >
					</td>
					<td>
						<input type="password" placeholder="Nhập mật khẩu..." name="txtPass" value="<?php echo($QLadmin["password"]);?>" >
					</td>
					<td>
						<input type="text" placeholder="Nhập email..." name="txtEmail" value="<?php echo($QLadmin["email"]);?>" style="width: 100%" >
					</td>
					<td>
						<input type="radio" name="Quyen" value="1" checked="checked">BTV
						<input type="radio" name="Quyen" value="2">Admin
						<input type="radio" name="Quyen" value="3">Super

					</td>
					<td>
						<input type="submit" onclick="return confirm('Bạn có chắc muốn Thêm?')" value="Thêm">
					</td>
				</tr>
			</form>
		</tr>
		</table>
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
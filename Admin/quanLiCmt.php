<?php
if(!isset($_SESSION['maQuyen'])) header("location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản Lí Comment</title>
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
	<a href="#" style="text-decoration: none;  font-size: 27px ; font-family:  monospace ; letter-spacing: 10px"><strong>Quản lí comment</strong></a>
	<br>
	<p>
	<?php
	include("../connectDb/open.php");
	$sql="SELECT maCmt,maTin, tbldocgia.tenDocGia, maCmt, noiDungCmt, ngayCmt, tblcmt.tinhTrang  FROM  tblcmt INNER JOIN tbldocgia on tbldocgia.maDocGia = tblcmt.maDocGia where tblcmt.tinhTrang =0 order by maCmt";
	$result=mysqli_query($con,$sql);
	?>
	<!-- Những Comment Chưa Duyệt -->
	<a href="#" style="text-decoration: none;  font-size: 20px; font-family:  monospace; font-style: italic;"><strong>Comment Chờ Duyệt</strong></a>
	<table border="2px"; cellspacing="3" cellpadding="5" style="width: 100%">
		<tr>
			<th width="5%">Mã Cmt</th>
			<th width="5%">Mã Tin</th>
			<th width="15%">Tên Độc Giả</th>
			<th width="25%">Nội Dung Cmt</th>
			<th width="15%">Ngày Cmt</th>
			<th width="10%">Tình Trạng</th>
			<th>Chức năng</th>
		</tr>
		<?php 
		while($CMT=mysqli_fetch_array($result))
		{
			?>
		<tr>
			<td><?php echo ($CMT["maCmt"]); ?></td>
			<td><?php echo ($CMT["maTin"]); ?></td>
			<td><?php echo ($CMT["tenDocGia"]); ?></td>
			<td><?php echo ($CMT["noiDungCmt"]); ?></td>
			<td><?php echo ($CMT["ngayCmt"]); ?></td>
			<td><?php if($CMT["tinhTrang"]==0){echo "Chưa Duyệt";} 
					if($CMT["tinhTrang"]==1){echo "Duyệt";}
			?></td>
			<td>
				<button><a href="xoaCmt.php?id=<?php echo($CMT["maCmt"]);?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a></button>
				<button><a href="duyetCmt.php?maCmt=<?php echo($CMT["maCmt"]);?>" onclick="return confirm('Bạn có chắc muốn Duyệt?')">Duyệt</a></button>
			</td>
		</tr>
	<?php }
	?>
	</table>
	<p>
		<br>

	<!-- Những Cmt Đã Duyệt -->
	<a href="#" style="text-decoration: none;  font-size: 20px; font-family:  monospace; font-style: italic;"><strong>Comment</strong></a>
	<form method="POST">
		<table cellspacing="0" cellpadding="10px">
			<tr>
				<td width="10px">
					<strong>
						Mã Tin:
					</strong>
					<input type="text" name="maTin" style="width: 100px" value="<?php if(isset($_POST['maTin'])) echo $_POST['maTin']; ?>">
				</td>
				<td width="10px">
					<strong>
						Người Comment:
					</strong>
					<input type="text" name="tenDocGia" style="width: 250px" value="<?php if(isset($_POST['tenDocGia'])) echo $_POST['tenDocGia']; ?>">
				</td>
				<td width="10px">
					<strong>
						Nội Dung:
					</strong>
					<input type="text" name="noiDungCmt" style="width: 250px" value="<?php if(isset($_POST['noiDungCmt'])) echo $_POST['noiDungCmt']; ?>">
				</td>
				<td>
					<strong>
						Ngày Cmt:
					</strong>
					<input type="date" name="ngayCmt" style="width: 100px" value="<?php if(isset($_POST['ngayCmt'])) echo $_POST['ngayCmt']; ?>">
				</td>
				<td>
					<strong>
						Tình Trạng:
					</strong>
					<select name="tinhTrang">
							<option value="999" selected <?php if(isset($_POST['tinhTrang'])) if($_POST['tinhTrang']== 999) echo "selected" ?>>
							---Chọn Tình Trạng---</option>
							<option value="1" <?php if(isset($_POST['tinhTrang'])) if($_POST['tinhTrang']== 1) echo "selected" ?>>
							Hiện</option>
							<option value="0" <?php if(isset($_POST['tinhTrang'])) if($_POST['tinhTrang']== 0) echo "selected" ?>>
							Ẩn</option>
						</select>
				</td>
				<td>
					<input type="submit" value="Tìm Kiếm">
				</td>
			</tr>
		</table>
	</form>
	<?php 
	include("../connectDb/open.php");
	$sql="SELECT maCmt,maTin, tbldocgia.tenDocGia, maCmt, noiDungCmt, ngayCmt, tblcmt.tinhTrang  FROM  tblcmt INNER JOIN tbldocgia on tbldocgia.maDocGia = tblcmt.maDocGia order by maCmt";
	if(!empty($_POST['maTin'])){
		$maTin=$_POST['maTin'];
		$sql="SELECT maCmt,maTin, tbldocgia.tenDocGia, maCmt, noiDungCmt, ngayCmt, tblcmt.tinhTrang  FROM  tblcmt INNER JOIN tbldocgia on tbldocgia.maDocGia = tblcmt.maDocGia where maTin=$maTin order by maCmt";
	}
	if(!empty($_POST['tenDocGia'])){
		$tenDocGia=$_POST['tenDocGia'];
		$sql="SELECT maCmt,maTin, tbldocgia.tenDocGia, maCmt, noiDungCmt, ngayCmt, tblcmt.tinhTrang  FROM  tblcmt INNER JOIN tbldocgia on tbldocgia.maDocGia = tblcmt.maDocGia where tenDocGia like '%$tenDocGia%' order by maCmt";
	
	}
	if(!empty($_POST['noiDungCmt'])){
		$noiDungCmt=$_POST['noiDungCmt'];
		$sql="SELECT maCmt,maTin, tbldocgia.tenDocGia, maCmt, noiDungCmt, ngayCmt, tblcmt.tinhTrang  FROM  tblcmt INNER JOIN tbldocgia on tbldocgia.maDocGia = tblcmt.maDocGia where noiDungCmt like '%$noiDungCmt%' order by maCmt";

	}
	if(!empty($_POST['ngayCmt'])){
		$ngayCmt=$_POST['ngayCmt'];
		$sql="SELECT maCmt,maTin, tbldocgia.tenDocGia, maCmt, noiDungCmt, ngayCmt, tblcmt.tinhTrang  FROM  tblcmt INNER JOIN tbldocgia on tbldocgia.maDocGia = tblcmt.maDocGia where ngayCmt='$ngayCmt' order by maCmt";
	
	}
	if(isset($_POST['tinhTrang'])){
		if($_POST['tinhTrang'] != 999){
		$tinhTrang=$_POST['tinhTrang'];
		$sql="SELECT maCmt,maTin, tbldocgia.tenDocGia, maCmt, noiDungCmt, ngayCmt, tblcmt.tinhTrang  FROM  tblcmt INNER JOIN tbldocgia on tbldocgia.maDocGia = tblcmt.maDocGia where tinhTrang=$tinhTrang  order by maCmt";
		}

	}
	$result=mysqli_query($con,$sql);
	?>
	<table border="2px"; cellspacing="3" cellpadding="5" style="width: 100%">
		<tr>
			<th width="5%">Mã Cmt</th>
			<th width="5%">Mã Tin</th>
			<th width="15%">Tên Độc Giả</th>
			<th width="25%">Nội Dung Cmt</th>
			<th width="15%">Ngày Cmt</th>
			<th width="10%">Tình Trạng</th>
			<th>Chức năng</th>
		</tr>
		<?php 
		while($CMT=mysqli_fetch_array($result))
		{
			?>
		<tr>
			<td><?php echo ($CMT["maCmt"]); ?></td>
			<td><?php echo ($CMT["maTin"]); ?></td>
			<td><?php echo ($CMT["tenDocGia"]); ?></td>
			<td><?php echo ($CMT["noiDungCmt"]); ?></td>
			<td><?php echo ($CMT["ngayCmt"]); ?></td>
			<td><?php if($CMT["tinhTrang"]==0){echo "Ẩn";} 
					if($CMT["tinhTrang"]==1){echo "Hiện";}
			?></td>
			<td>
				<button><a href="xoaCmt.php?id=<?php echo($CMT["maCmt"]);?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a></button>
				<button>
					<a href="../index/chiTietTinTuc.php?maTin=<?php echo($CMT["maTin"])?>">Xem Tin</a>
				</button>
			</td>
		</tr>
	<?php }
	?>
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

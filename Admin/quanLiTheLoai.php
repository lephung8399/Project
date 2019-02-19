<?php
if(!isset($_SESSION['maQuyen'])) header("location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản Lí Thể Loại</title>
	<script type="text/javascript">
		function validate()
	{
		var tenTL=document.getElementById("txtTenTL").value;
		var errtenTL=document.getElementById("err");
		var regtenTL=/^[a-zA-Z]+\s?[a-zA-Z]+$/;
		var dem=0;
		if(tenTL.length==0)
		{
			errtenTL.innerHTML="Không được để trống!";
		}else
		{
			errtenTL.innerHTML="";
			dem++;		
		}
		if(dem==1)
		{
			document.getElementById("frm").submit();
		}
	}
	</script>
</head>
<body>

	

			<?php
			include("../connectDb/open.php");
			$sql=("select * from tblTheLoai");
			if(isset($_POST['txtSearch']))
			{
				$tenTheLoai=$_POST['txtSearch'];
				$sql="Select * from tbltheloai where tenTheLoai like '%$tenTheLoai%'";
			}
			$result=mysqli_query($con,$sql); 
			$demm=mysqli_num_rows($result);
			if($demm!=0){
			?>
			<a href="#" style="text-decoration: none;  font-size: 27px; font-family:  monospace;"><strong>Quản lí thể loại</strong></a>
		<form method="POST">
			<table cellpadding="20px" cellspacing="0">
				<tr>
					
					<td >
						<b>Tên Thể Loại:</b>
						<input type="text" name="txtSearch" placeholder="Nhập thể loại..." autofocus>
					</td>
					<td>
						<input type="submit" value="Tìm Kiếm">
					</td>
				</tr>
			</table>
		</form>
			<table border="2px"; cellspacing="3" cellpadding="5" style="width: 100%">
				<tr >
					<th style="width: 10%">Mã Thể Loại</th>
					<th style="width: 40%">Tên Thể Loại</th>
					<th style="width: 50%">Chức năng</th>
				</tr>
			<?php
			while($theloai=mysqli_fetch_array($result)){
				?>
				<form action="suaTheLoai.php">
					<tr>
						<td>
							<input type="text" name="txtMa" style="width: 20%" value="<?php echo($theloai["maTheLoai"]);?>" readonly="readonly" >
						</td>
						<td>
							<input type="text" name="txtTen" value="<?php echo($theloai["tenTheLoai"]);?>" >
						</td>
						<td>
							<input type="submit" onclick="return confirm('Bạn có chắc muốn Thay đổi?')" value="Chỉnh Sửa">
							
							<!-- <button>
								<a href="xoaTheLoai.php?id=<?php echo($theloai["maTheLoai"]);?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
							</button> -->
						</td>
					</tr>
				</form>				
				<?php
			}
			?>
			</table>
			<?php
		}else{
			echo "Không Tìm Thấy Kết Quả";
		}?>
			<br>
			<p>
			
			<button><a href="themTheLoai.php" style="font-size: 20px; text-decoration: none; font-family: sans-serif; width: 80%; margin: auto;">Thêm thể loại</a></button>
			<?php
			include("../connectDb/close.php");
			?>
</body>
</html>
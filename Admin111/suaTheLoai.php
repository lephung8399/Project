<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa Thể Loại</title>
</head>
<body>
	<?php
	if(isset($_GET["id"]))
	{
		$maTheLoai=$_GET["id"];
		include("../connectDb/open.php");
		$sql="select * from tblTheLoai where maTheLoai=$maTheLoai";
		$result=mysqli_query($con,$sql);
		$theloai=mysqli_fetch_array($result);
		include("../connectDb/close.php");
		?>
	<form action="suaTheLoaiProcess.php">
		<table>
			<tr>
				<td>Mã Thể Loại</td>
				<td>
					<input type="text" name="txtMa" value="<?php echo($theloai["maTheLoai"]);?>" readonly="readonly">
				</td>
			</tr>
			<tr>
				<td>Tên Thể Loại</td>
				<td><input type="text" name="txtTenTL" value="<?php echo($theloai["tenTheLoai"]);?>" ></td>
			</tr>
		</table>
	<input type="submit" value="Sửa" onclick="return confirm('Bạn có chắc muốn Thay đổi?')">

	</form>
	<?php
}else
{
	header("Location:index.php");

}
?>
	

</body>
</html>
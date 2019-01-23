<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	if(isset($_GET["id"]))
	{
		$maTin=$_GET["id"];
		include("../connectDb/open.php");
		$sql="select * from tbltintuc where maTin=$maTin";
		$result=mysqli_query($con,$sql);
		$tintuc=mysqli_fetch_array($result);
		include("../connectDb/close.php");
		?>
		<form action="suaBaiVietProcess.php">
			<table>
				<tr>
					<td>Mã Tin</td>
					<td>
						<input type="text" name="txtMa" value="<?php echo($tintuc["maTin"]);?>" readonly="readonly">
					</td>
				</tr>
				<tr>
					<td>Tiêu đề:</td>
					<td>
						<input type="text" name="txtTieuDe" value="<?php echo($tintuc["tieuDe"]);?>">
					</td>
				</tr>
				<tr>
					<td>Mô tả:</td>
					<td>
						<input type="text" name="txtMoTa" value="<?php echo($tintuc["moTa"]);?>">
					</td>
				</tr>
				<tr>
					<td>Tóm Tắt:</td>
					<td>
						<input type="text" name="txtTomTat" value="<?php echo($tintuc["tomTat"]);?>">
					</td>
				</tr>
				<tr>
					<td>Nội Dung</td>
					<td>
						<textarea name="txtNoiDung" style="width: 300px; height: 200px"><?php echo($tintuc["noiDung"])?></textarea>
					</td>
				</tr>
				<tr>
					<td>Ngày đăng:</td>
					<td>
						<input type="date" name="txtNgay" value="<?php echo($tintuc["ngay"]);?>">
					</td>
				</tr>
			</table>
			<input type="submit" value="Sửa" onclick="return confirm('Bạn có chắc muốn Thay đổi?')" >
		</form>
	<?php
}else{
	header("Location:index.php");
}
	?>

</body>
</html>
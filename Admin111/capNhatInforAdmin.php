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
	  	$maTaiKhoan=$_GET["id"];
	  	include("../connectDb/open.php");
	  	$sql="select * from tblAdmin where maTaiKhoan=$maTaiKhoan";
	  	$result=mysqli_query($con,$sql);
	  	$inforFIX=mysqli_fetch_array($result);
	  	include("../connectDb/close.php");

?>
<form action="InforProcess.php">
	<table>
		<tr>
			<td>Mã Tài Khoản:</td>
			<td>
				<input type="text" name="txtma" value="<?php echo($inforFIX["maTaiKhoan"]);?>" readonly="readonly">
			</td>
		</tr>
		<tr>
			<td>Tên Tài Khoản:</td>
			<td>
				<input type="text" name="txtTenTK" value="<?php echo($inforFIX["tenTaiKhoan"]);?>" >
			</td>
		</tr>
		<tr>
			<td>Mật Khẩu:</td>
			<td>
				<input type="text" name="txtPass" value="<?php echo($inforFIX["password"]);?>" >
			</td>
		</tr>
		<tr>
			<td>Email:</td>
			<td>
				<input type="text" name="txtEmail" value="<?php echo($inforFIX["email"]);?>" >
			</td>
		</tr>
		<tr>
			<td>Mã Quyền</td>
			<td>
				<input type="text" name="txtMaQuyen" value="<?php echo($inforFIX["maQuyen"]);?>" >
			</td>
		</tr>
	</table>
	<input type="submit" value="Cập Nhật" onclick="return confirm('Bạn có chắc muốn cập nhật?')">
	</form>
	<?php
}else{
	header("Location:index.php");
}
?>



</body>
</html>
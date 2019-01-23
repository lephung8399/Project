<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm Thể Loại</title>
<script>
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
<style type="text/css"></style>
</head>
<body>
	<form action="themTheLoaiPROCESS.php" id="frm">
		Tên Thể Loại:<input type="text" name="txtTenTL" id="txtTenTL">
		<span id="err"></span><br>
		<input type="button" value="Thêm" onclick="validate()">
	</form>
</body>
</html>
 
<?php 
	session_start();
	$user=$_SESSION["User"];
	$conn = mysqli_connect("localhost","root","","project");
	$sql = mysqli_query($conn,"select * from tbldocgia where User='$user'");
 ?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>cmt</title>
	<SCRIPT>
		function validate()
		{
			var dem = 0;
			var cmt=document.getElementById("txt").value;
			var err=document.getElementById("err");
			var regcmt=/^[a-zA-Z0-9]+$/;
			if(cmt.length==0)
			{
				err.innerHTML="Bạn chưa nhập!";	
			}
			else
			{
				var kqcmt=regcmt.test(cmt);
				if(kqcmt)
				{
					err.innerHTML="";	
					dem++;
				}
			}
			if(dem == 1) {
				document.getElementById('btnSUBMIT').type = "submit";
			}
		}

	</SCRIPT>
</head>
<body>
	<form  id="frm" action="cmtprocess.php" method="POST" >
		<textarea  id="txt"  name="txtcmt"></textarea>
		<span id="err"></span>
		<input type="button" id="btnSUBMIT"  value="Bình luận" onclick="validate()" >
	</form>
		<?php  
	if(isset($_POST['txtcmt'])) {
		$cmt = $_POST['txtcmt'];
		$conn = new mysqli("localhost", "root", "", "project");
		$sql1 = "INSERT INTO `tblcmt`( `noiDungCmt`) VALUES ('$cmt')";
		// echo $sql1;
		mysqli_query($conn, $sql1);

	}
 ?>
 <?php 
	if(isset($_POST['txtcmt']) || true){
	// $xemcmt = $_POST['txtcmt'];
	$query="SELECT `maCmt`, `maTin`, `noiDungCmt`, `ngayCmt`, tbldocgia.tenDocGia as tenDocGia FROM `tblcmt` INNER JOIN tbldocgia on tblcmt.maDocGia = tbldocgia.maDocGia order by maCmt desc";
	// echo $query;
	$sql = mysqli_query($conn,$query);
	


		while ($a = mysqli_fetch_array($sql)) {
	?>
	<input type="text" name="txtxemcmt" disabled="disabled" value="<?php echo $a["tenDocGia"].': '.$a["noiDungCmt"].' - '.$a["ngayCmt"];
	 ?>">
	<br>
	
	
	<?php 
	} 
}
	?>
			
</body>
</html>
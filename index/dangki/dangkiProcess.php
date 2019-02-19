 <?php 
 if(isset($_POST['txtHo']) && isset( $_POST['txtTen']) && isset($_POST['txtEmail']) && isset($_POST['txtDiaChi'])  && isset($_POST['txtDienThoai']))
 {
 	$user = $_POST['txtdangnhap'];
 	$pass = $_POST['txtmatkhau'];
 	$Ho = $_POST['txtHo'];
 	$Ten = $_POST['txtTen'];
 	$gioiTinh = $_POST['rdbGt'];
 	$Email = $_POST['txtEmail'];
 	$DiaChi =  $_POST['txtDiaChi'] ;
 	$DienThoai = $_POST['txtDienThoai'] ;
 	$conn = new mysqli("localhost", "root", "", "project");
 	mysqli_set_charset($conn,'utf8');
 	/*if($gioiTinh) echo "Nam";
 	else echo "Nu";*/

 	/*echo $gioiTinh? "Nam":"Nu";*/
 	$sql = "INSERT INTO `tbldocgia`(`User`, `Pass`, `tenDocGia`, `sdt`, `email`, `diaChi`, `gioiTinh`, `maQuyen`,`tinhTrang`) VALUES ('$user','$pass','$Ho $Ten','$DienThoai','$Email','$DiaChi',$gioiTinh,1,1)";
 	if(mysqli_query($conn, $sql)){

 		mysqli_close($conn);
 		header("Location:../../index.php");

 	}
 	else
 	{
 		mysqli_close($conn);
 		header('Location: dangki.php?err=1');
 	}
 	
 }
  ?>

<?php 
if(isset($_POST["tntpasscu"])){
	$passcu = $_POST["tntpasscu"];
	$conn = new mysqli("localhost", "root", "", "project");
	$sql = SELECT * FROM `tbldocgia` WHERE Pass = $passcu;
	echo $sql;
	$query = mysqli_query($conn,$sql);
	header('xulipass.php');
}
else{
	echo "<script>javascript: alert('Mật Khẩu Cũ Không Đúng!')></script>"
}

 ?>

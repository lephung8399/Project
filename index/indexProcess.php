<?php
session_start();
if(isset($_POST["txtUser"])&&isset($_POST["txtPass"]))
{
	$user=$_POST["txtUser"];
	$pass=$_POST["txtPass"];
	//tien hanh kiem tra xem user va pass co ton tai khong
	$con = new mysqli("localhost","root","","project");
	mysqli_set_charset($con, 'utf8');
	//thao tac kiem tra db
	$sql="SELECT *
FROM `tbldocgia`
WHERE User = '$user' 
AND Pass = '$pass' AND tinhTrang=1";
	$result=mysqli_query($con,$sql);
	echo $sql;
	$demSoBanGhi=mysqli_num_rows($result);
	if($demSoBanGhi == 0)
	{
		//loi dang nhap	
		header("Location:dangNhap.php?err=1");
		
	}else
	{
		while ($USER = mysqli_fetch_array($result)) 
		{
				$_SESSION['User'] = $USER['User'];
				echo $_SESSION['User'];
				$_SESSION['Pass'] = $USER['Pass'];
				echo $_SESSION['Pass'];
		}
		header("Location: trang ca nhan/index.php");	
				mysqli_close($con);
	}
}
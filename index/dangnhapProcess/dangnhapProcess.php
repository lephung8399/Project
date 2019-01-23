<?php
	if(isset($_POST["txtUser"])&&isset($_POST["txtPass"]))
	{
		$user=$_POST["txtUser"];
		$pass=$_POST["txtPass"];
		//tien hanh kiem tra xem user va pass co ton tai khong
		$con = new mysqli("localhost","root","","user");
		//thao tac kiem tra db
		$sql="SELECT *
FROM `login`
WHERE userName = '$user'
AND pass = '$pass'";
		$result=mysqli_query($con,$sql);
		$demSoBanGhi=mysqli_num_rows($result);
		mysqli_close($con);
		if($demSoBanGhi==0)
		{
			//loi dang nhap	
			header("Location:login.php?err=1");
		}else
		{
			//ok
			header("Location:home.html");	
		}
	}else

	{
		header("Location:login.php");	
	}
?>
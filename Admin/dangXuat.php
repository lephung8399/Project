<?php
session_start();
unset($_SESSION['tenTaiKhoan']);
unset($_SESSION['maTaiKhoan']);
unset($_SESSION['maQuyen']);
header("Location:index.php");
?>
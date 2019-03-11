<?php
session_start();
session_destroy();
// unset($_SESSION['tenTaiKhoan']);
// unset($_SESSION['maTaiKhoan']);
// unset($_SESSION['maQuyen']);
header("Location:index.php");
?>
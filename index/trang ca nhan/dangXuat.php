<?php
session_start();
unset($_SESSION["User"]);
unset($_SESSION["Pass"]);
header("Location: ../../index.php");
?>

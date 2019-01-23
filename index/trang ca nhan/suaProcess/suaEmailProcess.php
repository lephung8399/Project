<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>suaEmail</title>
	<link rel="stylesheet" href="xuli.php">
</head>
<body>
	<?php
	if(isset($_GET["id"]))
	{
	
		$id=$_GET["id"];
	?>
	<form method="POST" action="xuli.php" >
	Email: <input type="email" name="tntEmail" id="txtEmail">
	<span id="errEmail"></span>
	<button type="submit" name="ma" value="<?php echo $id;?>">Thay Đổi</button>
	</form>
	<?php
	}
	?>
</body>
</html>

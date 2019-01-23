<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		#main{width: 900px;
			height: 1000px;
			margin: auto;
		}
		#menu{
			width: 100%;
			height: 60px;
			margin: inherit;
			background-color: blue
		}
		#content{
			width: 100%;
			height: 940px;
			margin: inherit;
			background-color: yellow
		}

	</style>
</head>
<body>
	<div id="main">
		<div id="menu"></div>
		<div id="content">
			<?php
			if(isset($_GET["dog"]))
			{
				$dog=$_GET["dog"];
				switch ($dog) {
					case 1:
						include("quanLiThongTin.php");
						break;
					
					default:
						include("trangchu.php");
						break;
				}
			}else
			{
				include("trangchu.php");
			}
			?>
		</div>
	</div>'
</body>
</html>
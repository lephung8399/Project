<?php
session_start();
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script>
	
	function validate()
	{
		//b1: lay toan bo du lieu ve
		var user=document.getElementById("txtUser").value;
		var pass=document.getElementById("txtMatKhau").value;
		var passNhapLai=document.getElementById("txtNhapLaiMatKhau").value;
		var ho=document.getElementById("txtHo").value;
		var ten=document.getElementById("txtTen").value;
		var ngay=document.getElementById("ddlNgay").value;
		var thang=document.getElementById("ddlThang").value;
		var nam=document.getElementById("ddlNam").value;
		var email=document.getElementById("txtEmail").value;
		var gioiTinh=document.getElementsByName("rdbGt");
		var diaChi=document.getElementById("textDiaChi").value;
		var dienThoai=document.getElementById("txtDienThoai").value;
		//b2 :lay tat cac the hien thi loi ve
		var errUser=document.getElementById("errUser");
		var errMatKhau=document.getElementById("errMatKhau");
		var errMatKhauNhapLai=document.getElementById("errMatKhauNhapLai");
		var errHo=document.getElementById("errHo");
		var errTen=document.getElementById("errTen");
		var errNgaySinh=document.getElementById("errNgaySinh");
		var errEmail=document.getElementById("errEmail");
		var errGioiTinh=document.getElementById("errGioiTinh");
		var errDiaChi=document.getElementById("errDiaChi");
		var errDienThoai=document.getElementById("errDienThoai");
		//b3: xay dung bieu thuc chinh quy
		var regUser=/^[a-zA-Z0-9_]+$/;
		var regMatKhau=/^[a-zA-Z0-9]+$/;
		var regEmail=/^[a-zA-Z]+[a-zA-Z0-9_.]*@[A-Za-z0-9]+\.?[a-zA-Z]+\.[A-Za-z]{2,3}$/;	
		var regSoDienThoai=/^[0-9+]+$/;
		//b4: validate
		var dem=0;
		//user
		if(user.length==0)
		{
			errUser.innerHTML="Yêu cầu nhập!";	
			document.getElementById("txtUser").style.border="2px solid red";
		}else if(user.length>=1&&user.length<=16)
		{
			var kqUser=regUser.test(user);
			if(kqUser)
			{
				errUser.innerHTML="";	
				document.getElementById("txtUser").style.border="2px solid 	#7FFF00";
				dem++;	
			}else
			{
				errUser.innerHTML="Sai định dạng!";	
				document.getElementById("txtUser").style.border="2px solid red";
			}
		}else
		{
			errUser.innerHTML="1 d?n 16 kí t?!";	
			document.getElementById("txtUser").style.border="2px solid red";	
		}
		//mat khau
		if(pass.length==0)
		{
			errMatKhau.innerHTML="Yêu c?u nh?p!";	
			document.getElementById("txtMatKhau").style.border="2px solid red";
		}else
		{
			var kqMatKhau=regMatKhau.test(pass);
			if(kqMatKhau)
			{
				errMatKhau.innerHTML="";
				document.getElementById("txtMatKhau").style.border="2px solid 	#7FFF00";
				dem++;		
			}else
			{
				errMatKhau.innerHTML="Sai d?nh d?ng!";	
				document.getElementById("txtMatKhau").style.border="2px solid red";	
			}
		}
		//nhap lai mat khau
		if(passNhapLai.length==0)
		{
			errMatKhauNhapLai.innerHTML="Yêu c?u nh?p!";
			document.getElementById("txtNhapLaiMatKhau").style.border="2px solid red";	
		}else if(passNhapLai!=pass)
		{
			errMatKhauNhapLai.innerHTML="Không kh?p!";
		document.getElementById("txtNhapLaiMatKhau").style.border="2px solid red";	
		}else
		{
			errMatKhauNhapLai.innerHTML="";	
			document.getElementById("txtNhapLaiMatKhau").style.border="2px solid 	#7FFF00";
			dem++;		
		}
		//ho
		if(ho.length==0)
		{
			errHo.innerHTML="Yêu c?u nh?p!";	
			document.getElementById("txtHo").style.border="2px solid red";
		}else
		{
			errHo.innerHTML="";	
				document.getElementById("txtHo").style.border="2px solid 	#7FFF00";
				dem++;	
		}
		//ten
		if(ten.length==0)
		{
			errTen.innerHTML="Yêu c?u nh?p!";	
			document.getElementById("txtTen").style.border="2px solid red";
		}else
		{
			errTen.innerHTML="";
				document.getElementById("txtTen").style.border="2px solid 	#7FFF00";	
				dem++;
		}
		//ngay sinh
		if(ngay==-1||thang==-1||nam==-1)
		{
			errNgaySinh.innerHTML="Yêu c?u nh?p!";
			document.getElementById("ddlNgay").style.border="2px solid red";
			document.getElementById("ddlThang").style.border="2px solid red";	
			document.getElementById("ddlNam").style.border="2px solid red";		
		}else
		{
			errNgaySinh.innerHTML="";	
			document.getElementById("ddlNgay").style.border="2px solid #7FFF00";
			document.getElementById("ddlThang").style.border="2px solid #7FFF00";	
			document.getElementById("ddlNam").style.border="2px solid #7FFF00";		
			dem++;		
		}
		//email
		if(email.length==0)
		{
			errEmail.innerHTML="Yêu c?u nh?p!";
			document.getElementById("txtEmail").style.border="2px solid red";	
		}else
		{
			var kqEmail=regEmail.test(email);
			if(kqEmail)
			{
				errEmail.innerHTML="";
				document.getElementById("txtEmail").style.border="2px solid #7FFF00";
				dem++;		
			}else
			{
				errEmail.innerHTML="Sai d?nh d?ng!";
				document.getElementById("txtEmail").style.border="2px solid red";	
			}
		}
		//gioi tinh 
		var demGt=0;
		for(var i=0;i<gioiTinh.length;i++)
		{
			if(gioiTinh[i].checked)
			{
				demGt++;	
			}	
		}
		if(demGt==0)
		{
			errGioiTinh.innerHTML="*Phai chon gioi tinh!";
			document.getElementById("GioiTinh").style.border="2px solid red";	
		}else
		{
			errGioiTinh.innerHTML="";
			document.getElementById("GioiTinh").style.border="2px solid #7FFF00";
			dem++;			
		}
		//dia chi
		if(diaChi.length==0)
		{
			errDiaChi.innerHTML="Yêu c?u nh?p";	
			document.getElementById("textDiaChi").style.border="2px solid red";
		}else
		{
			errDiaChi.innerHTML="";
			document.getElementById("textDiaChi").style.border="2px solid 	#7FFF00";
			dem++;			
		}
		//so dien thoai
		if(dienThoai.length==0)
		{
			errDienThoai.innerHTML="Yêu c?u nh?p!";	
			document.getElementById("txtDienThoai").style.border="2px solid red";
		}else
		{
			var kqDienThoai=regSoDienThoai.test(dienThoai);
			if(kqDienThoai)
			{
				errDienThoai.innerHTML="";	
				document.getElementById("txtDienThoai").style.border="2px solid 	#7FFF00";
				dem++;	
			}else
			{
				errDienThoai.innerHTML="Sai d?nh d?ng!";
				document.getElementById("txtDienThoai").style.border="2px solid red";	
			}
		}
		if(dem==10)
		{
			document.getElementById("frm").type = "submit";	+96
		}
	}
</script>
<style type="text/css">
	body{
	background: url(../images/1.jpg)no-repeat center top;
	background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    background-attachment: fixed;
    background-position: center;
    text-align: center;
	font-family: 'Open Sans', sans-serif;
	}
	table{
		margin-top: 10%;
		color: #FFFF00;
	}
	.errcolor{
		color: red;
	}
</style>
</head>
	
<body >
	<?php 
		if (isset($_GET['err'])) {
			if ($_GET['err'] == '1') {
				?>
				<script>
					alert("Ðang ký th?t b?i: trùng tên dang nh?p!");
				</script>
				<?php
			}
		}
	?>
	<form method="POST" action="dangkiProcess.php">
		<center>
	        <table>
	            <tr>
	                <th colspan="3" style="font-size: 24px; color: 	white;">Thông Tin Ðang Nhập</th>
	            </tr>
	            <tr>
	                <td >Tên Đăng Nhập:</td>
	                <td ><input type="text" id="txtUser" size="30" name="txtdangnhap" /></td>
	            </tr>
				<tr >
				    <td ></td>
				    <td class="errcolor"><span id="errUser" class="err"></span>
				</tr>
	            <tr>
	                <td>Mật Khẩu:</td>
	                <td><input type="password" id="txtMatKhau" size="30" name="txtmatkhau" /></td>
	                
	            </tr>
	            <tr>
	                <td ></td>
	                <td class="errcolor"><span id="errMatKhau" class="err"></span></td>
	            </tr>
	            <tr>
	                <td>Nhập lại mật khẩu:</td>
	                <td><input type="password" id="txtNhapLaiMatKhau" size="30" /></td>
	            </tr>
	            <tr>
	                <td ></td>
	                <td class="errcolor"><span id="errMatKhauNhapLai" class="err"></span></td>
	            </tr>
	            <tr>
	                <th colspan="3" style="font-size: 24px; color: 	white;">Thông Tin Cá Nhân</th>
	            </tr>
	            <tr>
	                <td>Họ Khách Hàng:</td>
	                <td><input type="text" id="txtHo" size="30" name="txtHo"/></td>
	            </tr>
	            <tr>
	                <td ></td>
	                <td class="errcolor"><span id="errHo" class="err"></span></td>
	            </tr>
	            <tr>
	                <td>Tên Khách Hàng:</td>
	                <td><input type="text" id="txtTen"size="30"  name="txtTen"/></td>
	            </tr>
	            <tr>
	                <td ></td>
	                <td class="errcolor"><span id="errTen" class="err"></span></td>
	            </tr>
	            <tr>
	                <td>Ngày Sinh:</td>
	                <td>
	                    <select id="ddlNgay" name="txtNgay">
	                        <option value="-1">--ngày--</option>
	                        <option value="">1</option>
	                        <option value="">2</option>
	                        <option value="">3</option>
	                        <option value="">4</option>
	                        <option value="">5</option>
	                        <option value="">6</option>
	                        <option value="">7</option>
	                        <option value="">8</option>
	                        <option value="">9</option>
	                        <option value="">10</option>
	                        <option value="">11</option>
	                        <option value="">12</option>
	                        <option value="">13</option>
	                        <option value="">14</option>
	                        <option value="">15</option>
	                        <option value="">16</option>
	                        <option value="">17</option>
	                        <option value="">18</option>
	                        <option value="">19</option>
	                        <option value="">20</option>
							<option value="">21</option>
	                        <option value="">22</option>
	                        <option value="">23</option>
	                        <option value="">24</option>
	                        <option value="">25</option>
	                        <option value="">26</option>
	                        <option value="">27</option>
	                        <option value="">28</option>
	                        <option value="">29</option>
	                        <option value="">30</option>
	                        <option value="">31</option>
	                    </select>/
	                    <select id="ddlThang" name="txtThang">
	                        <option value="-1">--Tháng--</option>
	                        <option value="">1</option>
	                        <option value="">2</option>
	                        <option value="">3</option>
	                        <option value="">4</option>
	                        <option value="">5</option>
	                        <option value="">6</option>
	                        <option value="">7</option>
	                        <option value="">8</option>
	                        <option value="">9</option>
	                        <option value="">10</option>
	                        <option value="">11</option>
	                        <option value="">12</option>
	                    </select>/
	                    <select id="ddlNam" name="txtNam">
	                        <option value="-1">--Năm--</option>
	                        <option value="">1988</option>
	                        <option value="">1989</option>
	                        <option value="">1990</option>
	                        <option value="">1991</option>
	                        <option value="">1992</option>
	                        <option value="">1993</option>
	                        <option value="">1994</option>
	                        <option value="">1995</option>
	                        <option value="">1996</option>
	                        <option value="">1998</option>
	                        <option value="">1998</option>
	                        <option value="">1999</option>
	                        <option value="">2000</option>
	                        <option value="">2001</option>
	                        <option value="">2002</option>
	                        <option value="">2003</option>
	                        <option value="">2004</option>
	                        <option value="">2005</option>
	                        <option value="">2006</option>
	                        <option value="">2007</option>
	                        <option value="">2008</option>
	                        <option value="">2009</option>
	                        <option value="">2010</option>
	                        <option value="">2011</option>
	                        <option value="">2012</option>
	                        <option value="">2013</option>
	                        <option value="">2014</option>
							<option value="">2015</option>
	                        <option value="">2016</option>
	                        <option value="">2017</option>
	                        <option value="">2018</option>
	         Yêu cầu nhập
	                </td>
	            </tr>
	            <tr>
	                <td ></td>
	                <td class="errcolor"><span id="errNgaySinh" class="err"></span></td>
	            </tr>
	            <tr>
	                <td>Giới tính:</td>
	                <td id="GioiTinh"><input type="radio" name="rdbGt" value="1" />Nam<input type="radio" name="rdbGt" value="0" />Nu</td>
	            </tr>
	            <tr>
	                <td ></td>
	                <td class="errcolor"><span id="errGioiTinh" class="err"></span></td>
	             </tr>
	            <tr>
	                <td>Email:</td>
	                <td><input type="text" id="txtEmail" size="30" name="txtEmail"/></td>
	            </tr>
	            <tr>
	                <td ></td>
	                <td class="errcolor"><span id="errEmail" class="err"></span></td>
	            </tr>
	            <tr>
	                <td>Ðịa Chỉ:</td>
	                <td><textarea id="textDiaChi" cols="31"  name="txtDiaChi"></textarea></td>
	            </tr>
	            <tr>
	                        		<td ></td>
	                <td class="errcolor"><span id="errDiaChi" class="err"></span></td>
	            </tr>
	            <tr>
	                <td>Điện thoại:</td>
	                <td><input type="text" id="txtDienThoai" size="30"  name="txtDienThoai"/></td>
	            </tr>
	            <tr>
            		<td ></td>
	                <td class="errcolor"><span id="errDienThoai" class="err"></span></td>
            	</tr>
	            <tr >
	                <th colspan="3"><input type="button" id="frm" value="Ðang Ký" style="height: 30px;font-size: 16px; width: 140px; background: linear-gradient(to right, #fc00ff, #00dbde);" onclick="validate()"/></th>
	    
	            </tr>
	        </table>
    	</center>
    </form>
</body>
</html>
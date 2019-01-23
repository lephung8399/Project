<script>
function validate()
	{
		//b1: lay toan bo du lieu ve
		var pass=document.getElementById("txtMatKhau").value;
		var ho=document.getElementById("txtHo").value;
		var email=document.getElementById("txtEmail").value;
		var diaChi=document.getElementById("textDiaChi").value;
		var dienThoai=document.getElementById("txtDienThoai").value;
		//b2 :lay tat cac the hien thi loi ve
		var errMatKhau=document.getElementById("errMatKhau");
		var errHo=document.getElementById("errHo");
		var errEmail=document.getElementById("errEmail");
		var errDiaChi=document.getElementById("errDiaChi");
		var errDienThoai=document.getElementById("errDienThoai");
		//b3: xay dung bieu thuc chinh quy
		var regUser=/^[a-zA-Z0-9_]+$/;
		var regMatKhau=/^[a-zA-Z0-9]+$/;
		var regHo=/^[a-zA-Z]+\s?[a-zA-Z]+\s?[a-zA-Z]+\s?[a-zA-Z]+$/;
		var regEmail=/^[a-zA-Z]+[a-zA-Z0-9_.]*@[A-Za-z0-9]+\.?[a-zA-Z]+\.[A-Za-z]{2,3}$/;	
		var regSoDienThoai=/^[0-9+]+$/;

		/*var mk = 0;
		var ho = 0;
		var email = 0;
		var diachi = 0;
		var sdt = 0;*/
		//mat khau
		if(pass.length==0)
		{
			errMatKhau.innerHTML="Yêu cầu nhập!";	
			document.getElementById("txtMatKhau").style.border="2px solid red";
		}else
		{
			var kqMatKhau=regMatKhau.test(pass);
			if(kqMatKhau)
			{
				errMatKhau.innerHTML="";
				document.getElementById("txtMatKhau").style.border="2px solid 	#7FFF00";
						/*mk++;*/
			}else
			{
				errMatKhau.innerHTML="Sai định dạng!";	
				document.getElementById("txtMatKhau").style.border="2px solid red";	
			}
		}
		//ho
		if(ho.length==0)
		{
			errHo.innerHTML="Yêu cầu nhập!";	
			document.getElementById("txtHo").style.border="2px solid red";
		}else
		{
			var kqHo=regHo.test(ho);
			if(kqHo)
			{
				errHo.innerHTML="";	
				document.getElementById("txtHo").style.border="2px solid 	#7FFF00";
					/*ho++;*/
			}else
			{
				errHo.innerHTML="Sai định dạng!";
				document.getElementById("txtHo").style.border="2px solid red";	
			}
		}
		//email
		if(email.length==0)
		{
			errEmail.innerHTML="Yêu cầu nhập!";
			document.getElementById("txtEmail").style.border="2px solid red";	
		}else
		{
			var kqEmail=regEmail.test(email);
			if(kqEmail)
			{
				errEmail.innerHTML="";
				document.getElementById("txtEmail").style.border="2px solid #7FFF00";
					/*	email++;*/
			}else
			{
				errEmail.innerHTML="Sai định dạng!";
				document.getElementById("txtEmail").style.border="2px solid red";	
			}
		}
		//dia chi
		if(diaChi.length==0)
		{
			errDiaChi.innerHTML="Yêu cầu nhập";	
			document.getElementById("textDiaChi").style.border="2px solid red";
		}else
		{
			errDiaChi.innerHTML="";
			document.getElementById("textDiaChi").style.border="2px solid 	#7FFF00";
						/*diachi++;*/
		}
		//so dien thoai
		if(dienThoai.length==0)
		{
			errDienThoai.innerHTML="Yêu cầu nhập!";	
			document.getElementById("txtDienThoai").style.border="2px solid red";
		}else
		{
			var kqDienThoai=regSoDienThoai.test(dienThoai);
			if(kqDienThoai)
			{
				errDienThoai.innerHTML="";	
				document.getElementById("txtDienThoai").style.border="2px solid #7FFF00";
				sdt++;
			}else
			{
				errDienThoai.innerHTML="Sai định dạng!";
				document.getElementById("txtDienThoai").style.border="2px solid red";	
			}
		}
/*		if(mk==1)
		{
			document.getElementById("frm").submit();	
		}
		if(ho==1)
		{
			document.getElementById("frm").submit();	
		}
		if(email==1)
		{
			document.getElementById("frm").submit();	
		}
		if(diachi==1)
		{
			document.getElementById("frm").submit();	
		}
		if(sdt==1)
		{
			document.getElementById("frm").submit();	
		}*/
	}
</script>
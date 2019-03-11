<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
.err{
  color: red
}
</style>
<script type="text/javascript">
    function login()
    {
     /* if(document.getElementById("txtUser").value.length != 0  && document.getElementById("txtPass").value.length != 0)
        document.getElementById("loginButton").type= 'submit';
      else if(document.getElementById("txtUser").value.length == 0 && document.getElementById("txtPass").value.length == 0) document.getElementById("errLogin").innerHTML = "Hãy điền tên đăng nhập và mật khấu"
      else if(document.getElementById("txtPass").value.length == 0) document.getElementById("errLogin").innerHTML = "Hãy điền mật khấu"
      else document.getElementById("errLogin").innerHTML = "Hãy điền tên đăng nhập";
    }*/


    var user=document.getElementById("txtUser").value;
    var pass=document.getElementById("txtPass").value;
    dem = 0;
    //user
    if(user.length==0)
    {
      document.getElementById("txtUser").style.border="2px solid red";
    }else
      {
        document.getElementById("txtUser").style.border="2px solid  #7FFF00";
        dem++;
      }
    //password
    if(pass.length==0)
    {
      document.getElementById("txtPass").style.border="2px solid red";
    }else
      {
        document.getElementById("txtPass").style.border="2px solid  #7FFF00";
        dem++;
      }

    if(dem==2)
    {
      document.getElementById("loginButton").type = "submit";
    }
  }
  </script>
</head>
<body>
  <?php 
    session_start();
    if(isset($_SESSION['maQuyen'])) header("location: home.php");
  ?>
<form action="loginProcess.php" method="POST" style="max-width:500px;margin:auto">
  <h2>Đăng Nhập</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Username" name="txtUser" id="txtUser" onchange="login()">
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="txtPass" id="txtPass" onchange="login()">
  </div>
  <div align="center" >
        <span id="errLogin"></span>
      </div>
      <?php 
              if(isset($_GET['err']))
                if($_GET['err'] == 1) {
                  ?>
                    <script type="text/javascript">
                      document.getElementById("errLogin").innerHTML = "Sai tên đăng nhập hoặc mật khấu";
                    </script>
                  <?php
                }
              ?>

  <button type="button" class="btn" onclick="login()" id="loginButton">Đăng nhập</button>
</form>

</body>
</html>

<?php

	require_once '../config/DB.php';
	require_once '../function/function.php';
	if(isset($_POST['submit'])){
		if(isset($_POST['username'])){
			$mssv = $_POST['username'];
		}
		if(isset($_POST['pass'])){
			$matkhau = $_POST['pass'];
		}
		// fix lỗi SQL Injection
        $taikhoan = str_replace('\'','\\\'',$mssv);
        $matkhau = str_replace('\'','\\\'',$matkhau);
		
		if(login($conn,'admin','taikhoan','matkhau',$taikhoan,$matkhau) == true){
			$_SESSION['admin'] = $taikhoan;
			header('location: index.php');
		}else{
			$_SESSION['errorAdmin'] = "Đăng nhập thất bại!";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <style>
        body{
            background-image: url('/KTX/imgs/cover.png');
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 246px;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }
        div{
            display: block;
        }
        #page-title{
            text-shadow: 6px 4px 7px black;
            font-size: 3.5rem;
            color:#fff4f4 !important;
        }
        .login-box .card,.register-box .card{
            margin-bottom: 0;
        }
        .card {
            box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
            margin-bottom: 1rem;
        }
        .card-body p{
            margin-top: 0;
            margin-bottom: 0;
        }
        form{
            display: block;
            margin-top: 0em;
        }
        .fa, .fas{
            font-weight: 900;
        }
        .input-group-append{
            display: flex;
        }
        .input-group-text{
            border-top-left-radius:0 ;
            border-bottom-left-radius:0 ;
        }
    </style>
</head>
<body>
    <div class="items" style="margin-top:200px">
        <div class="content">
            <h1 class="text-center text-white px-4 py-5" id="page-title">
                <b>KTX-Dormitory Management System</b>
                
            </h1>
        </div>
        <div class="login-box" style="background-color:white;width:360px;margin-left: 550px;">
            <div class="card card-maroon my-2">
                <div class="card-body">
                    <p class="login-box-msg" style="color:#C12525;font-size:0.9rem;font-weight:bold">
                    <?php 
                      if(isset($_SESSION['errorAdmin'])){
                        echo $_SESSION['errorAdmin'];
                        unset($_SESSION['errorAdmin']);
                      }
                    ?>
                  </p>
                    <form id="login-frm" method="post">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="username" autofocus="" placeholder="Username">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user">
                                
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="password" class="form-control" name="pass" placeholder="Password">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-8">
                            <!-- <a href="< ?php echo base_url ?>">Go to Website</a> -->
                          </div>
                          <!-- /.col -->
                          <div class="col-4" >
                            <button type="submit" name="submit" class="btn text-white" style="background-color:#D81B60;margin-left: 16px;">Sign In</button>
                          </div>
                          <!-- /.col -->
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

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
        $mssv = str_replace('\'','\\\'',$mssv);
        $matkhau = str_replace('\'','\\\'',$matkhau);
		
		if(login($conn,'sinhvien_chua_o','mssv','matkhau',$mssv,$matkhau) == true){
			$_SESSION['sinhvien'] = $mssv;
			
			header('location: index.php');
		}else{
			$_SESSION['errorSV'] = "Đăng nhập thất bại!";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/KTX/image/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/KTX/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/KTX/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/KTX/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/KTX/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/KTX/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/KTX/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/KTX/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/KTX/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/KTX/css/util.css">
	<link rel="stylesheet" type="text/css" href="/KTX/css/main.css">
<!--===============================================================================================-->
<style>
	@import url('https://fonts.googleapis.com/css?family=Red+Hat+Display:900&display=swap');
	.black-lives-matter {
	font-size: 5vw;
	line-height: 8vw;
	margin: 0;
	font-family: 'Red Hat Display', sans-serif;
	font-weight: 900;
	background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(208,2,187,1) 52%, rgba(0,212,255,1) 100%);
	
	background-size: 40%;
	background-position: 50% 50%;
	-webkit-background-clip : text;
	color: rgba(0,0,0,0.08);
	animation: zoomout 10s ease 500ms forwards;
	}

	@keyframes zoomout {
	from {
		background-size: 60%;
	}
	to {
		background-size: 5%;
	}
	}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('/KTX/image/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="POST" >
					<span class="login100-form-title p-b-49">
						<img src="/KTX/image/logo.png" alt="logo" style="width:50%;"><br>
						<h1 class="black-lives-matter" style="text-align:center">LOGIN</h1>
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">MSSV</span>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-center p-t-8 p-b-31" style="color:#C12525;font-size:0.9rem;font-weight:bold">
						<?php 
							if(isset($_SESSION['errorSV'])){
								echo $_SESSION['errorSV'];
								unset($_SESSION['errorSV']);
							}
						?>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">
								Login
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="/KTX/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/KTX/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/KTX/vendor/bootstrap/js/popper.js"></script>
	<script src="/KTX/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/KTX/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/KTX/vendor/daterangepicker/moment.min.js"></script>
	<script src="/KTX/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/KTX/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
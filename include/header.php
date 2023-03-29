<?php 
    require_once './config/DB.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/gioithieu.css">
    <link rel="stylesheet" href="css/lienhe.css">
    <link rel="stylesheet" href="css/thietbi.css">
    <link rel="stylesheet" href="css/loaiphong.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <header>
        <section class="header-1">
            <div class="box-start">
                <i class='fa fa-arrow-right' style='font-size:40px'></i>
                <h2 data-text="...Dormitory...">...Dormitory...</h2>
                <i class="fa fa-arrow-left" style="font-size:40px"></i>
            </div>
        </section>
        <section class="header-2">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                <div class="container">
                  <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                      <li class="nav-item">
                        <a href="mailto:khoab1910240@student.ctu.edu.vn" title="khoab1910240@student.ctu.edu.vn">
                            <i><img src="./imgs/gmail.png"></i>
                                <span>KTX@student.ctu.edu.vn</span>
                        </a>
                      </li>
                      <li class="mx-3">
                        <span class="text-white">|</span>
                      </li>
                      <li class="nav-item">
                        <a href="tel:0843 152 505" title="0843 152 505">
                            <i><img src="./imgs/telephone-call.png"></i>			      
                            <span>0843 152 505 (Miễn phí cuộc gọi)</span>
                         </a>
                      </li>
                    </ul>
                    <spapn class="mx-1">
                        <?php 
                            if(isset($_SESSION['sinhvien'])){
                                echo '
                                    <a href="dangxuat.php">
                                        <i><img src="./imgs/user.png"></i>			      
                                        <span>Đăng xuất</span>
                                    </a>
                                ';
                            }else{
                                echo '
                                    <a href="sinhvien/dangnhap.php">
                                        <i><img src="./imgs/user.png"></i>			      
                                        <span>Đăng nhập</span>
                                    </a>
                                ';
                            }
                        ?>
                        
                    </span>
                  </div>
                </div>
            </nav>
        </section>
        <section class="header-3">
            <div class="items">
                <div class="item">
                    <img src="./imgs/logo1.png" alt="LoGo" style="width:120px;height:120px">
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="index.php">TRANG CHỦ</a></li>
                        <li><a href="gioithieu.php">GIỚI THIỆU</a></li>
                        
                        <li><a href="lienhe.php">LIÊN HỆ</a></li>
                        <li class="detail-menu">
                            <a href="#">THÔNG TIN KHÁC</a>
                            <img src="./imgs/down-arrow.png" alt="" >
           
                                <ul  style="z-index: 900;">
                                    <li><a href="cantin.php">Căn tin KTX</a></li>
                                    <li><a href="khuthethao.php">Sân thể thao</a></li>
                                </ul>
                            
                            
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        
    </header>
<?php
   require_once '../../config/DB.php';
    if(isset($_SESSION['sinhvien'])){
        if(isset($_GET['day']) && isset($_GET['phong']) && isset($_GET['id_sv']) && isset($_GET['gioitinh'])){
            $day = $_GET['day'];
            $phong = $_GET['phong'];
            $idsv=$_GET['id_sv'];
            $gioitinh = $_GET['gioitinh'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y-m-d H:i:s');//Lấy ngày giờ hiện tại
            $idktx= '';
            $sql = "SELECT * from kytucxa where loaiphong='$gioitinh' and toanha = '$day' and phong = '$phong'";
            $res = mysqli_query($conn,$sql);
            $temp = 0; //Biến kiểm tra xem Đây là trường hợp thêm hay cập nhật lại CSDL
            $kiemtraktx = 0;//Kiểm tra sự tồn tại của dãy và phòng trong ký túc xá
            
            if(mysqli_num_rows($res) == 0){
                //Kiem tra dãy và phòng có tồn tại trong CSDL không
                $kiemtraktx = 1;
            }else{
            //Lấy ID kytucxa
                while($rows= mysqli_fetch_assoc($res)){
                    $idktx = $rows['id'];
                    $songuoihientai = $rows['songuoihientai'];
                    $songuoitoida = $rows['songuoitoida'];
                }
                if($songuoitoida-$songuoihientai==0){
                    $temp = 3;
                }else{
                // Lưu ý: Ngay tại đây thời điểm chưa được xét duyệt
                    // Kiểm tra xem sinh viên đã đăng ký phòng chưa

                    $sql = "SELECT * FROM nguyenvong_ktx where id_sv=$idsv";
                    $res = mysqli_query($conn,$sql);
                    
                    if(mysqli_num_rows($res) == 0){
                        //Trường hợp 1: Chưa đăng ký=> Thêm vao CSDL
                        $sql = "INSERT INTO `nguyenvong_ktx`(`id_sv`, `id_ktx`, `ngaydangky`,`trangthai`) 
                        VALUES ('$idsv','$idktx','$date','0')";
                        $res =  mysqli_query($conn,$sql);
                        if($res == true){
                            $temp = 1;
                        }
                    }else{
                        //Trường hợp 2: Đăng ký rồi => Cập nhật lại CSDL
                        $sql = "UPDATE `nguyenvong_ktx` SET `id_ktx`='$idktx',`ngaydangky`='$date',`trangthai`='0',`ghichu`='' WHERE id_sv=$idsv";
                        $res =  mysqli_query($conn,$sql);
                        if($res == true){
                            $temp = 2;
                        }
                    }
                }
            
            }
            $data = array(
                "kiemtraktx" =>$kiemtraktx,
                "temp" =>$temp
            );
            echo json_encode($data);
        }
    }else{
        header('location: ../dangnhap.php');
        die();
    }
?>
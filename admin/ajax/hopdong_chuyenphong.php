<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        
        if(
            isset($_GET['ngayhethan']) 
            && isset($_GET['msnv']) 
            && isset($_GET['tennv']) 
            && isset($_GET['idsv']) 
            && isset($_GET['hoten']) 
            && isset($_GET['ngaysinh']) 
            && isset($_GET['gioitinh']) 
            && isset($_GET['sodienthoai']) 
            && isset($_GET['nganhhoc']) 
            && isset($_GET['lop']) 
            && isset($_GET['quequan']) 
            && isset($_GET['phong'])
            && isset($_GET['ngaylap'])
        ){
            $mssv = $_GET['idsv'];
            $idsv = '';
            $sql = "SELECT * FROM sinhvien_chua_o where mssv = '$mssv'";
            $res = mysqli_query($conn,$sql);
            if($res == true){
                while($rows = mysqli_fetch_array($res)){
                    $idsv= $rows['id'];
                }
            }

             $ngayhethan = $_GET['ngayhethan'];//2022-11-05
             
             $hoten = $_GET['hoten'];//Bùi bé tư
             $ngaysinh = $_GET['ngaysinh'];//2022-10-21
             $gioitinh = $_GET['gioitinh'];//Nam
             $sodienthoai = $_GET['sodienthoai'];//0917349907
             $nganhhoc = $_GET['nganhhoc'];// Chế biến
             $lop = $_GET['lop'];//DI1978A
             $quequan = $_GET['quequan'];//Cà Mau
            $idktx = $_GET['phong'];//8  id phòng mới 
             $ngaylap = $_GET['ngaylap'];//2022-10-04
             $msnv = $_GET['msnv'];//102
             $tennv = $_GET['tennv'];//Đỗ Công Mạnh
            
            // Bước 1: Cập nhật lại ký túc xá
                // Lấy ID phòng cũ
                $sql = "SELECT * FROM `sinhvien_da_o`,sinhvien_chua_o where sinhvien_da_o.idsv = sinhvien_chua_o.id and sinhvien_chua_o.id = $idsv";
                $res = mysqli_query($conn,$sql);
                $id_phong_cu = '';
                if($res == true){
                    while($row = mysqli_fetch_array($res)){
                        $id_phong_cu = $row['idktx'];
                    }
                }
                // Giam số lượng phòng cũ
                $songuoicapnhat = '';
                $sql = "SELECT * FROM kytucxa where id = $id_phong_cu";
                $res = mysqli_query($conn,$sql);
                if($res == true){
                    while($row = mysqli_fetch_array($res)){
                        $songuoicapnhat = $row['songuoihientai']-1;
                    }
                }
                 $sql = "UPDATE `kytucxa` SET `songuoihientai`=$songuoicapnhat WHERE id = $id_phong_cu";
                 mysqli_query($conn,$sql);
                // Tăng số lương phòng mới  
                $songuoicapnhat = '';
                $sql = "SELECT * FROM kytucxa where id = $idktx";
                $res = mysqli_query($conn,$sql);
                if($res == true){
                    while($row = mysqli_fetch_array($res)){
                        $songuoicapnhat = $row['songuoihientai']+1;
                    }
                }
                 $sql = "UPDATE `kytucxa` SET `songuoihientai`=$songuoicapnhat WHERE id = $idktx";
                 mysqli_query($conn,$sql);
            // Bước 2: Cập nhật lại idktx trong table sinhvien_da_o
             $sql ="UPDATE `sinhvien_da_o` SET `idktx`= $idktx WHERE idsv = $idsv";
            mysqli_query($conn,$sql);
            // Bước 3: Cập nhật hợp đồng
                // Lấy id cua table sinhvien_da_o
                $id_sv_da_o = '';
                $sql ="SELECT sinhvien_da_o.id FROM `sinhvien_da_o`,sinhvien_chua_o WHERE sinhvien_da_o.idsv = sinhvien_chua_o.id and idsv = $idsv";
                $res = mysqli_query($conn,$sql);
                if($res == true){
                    while($row = mysqli_fetch_array($res)){
                        $id_sv_da_o = $row['id'];
                    }
                }
                // Lấy id của admin làm hợp đồng 
                $id_admin_hien_tai = '' ;
                $sql ="SELECT * FROM `nhanvien` WHERE msnv= '$msnv' and hoten='$tennv'";
                $res = mysqli_query($conn,$sql);
                if($res == true){
                    while($row = mysqli_fetch_array($res)){
                        $id_admin_hien_tai = $row['id'];
                    }
                }
                // Cập nhật hợp đồng 
                 $sql ="UPDATE `hopdong` SET `ngaylap`='$ngaylap',`ngayhethan`='$ngayhethan',`idnv`=$id_admin_hien_tai,`idkytucxa`=$idktx where `idsinhvien_da_o`=$id_sv_da_o";
                 mysqli_query($conn,$sql);
                }
    }else{
        header('location: ../dangnhap.php');
    }
?>
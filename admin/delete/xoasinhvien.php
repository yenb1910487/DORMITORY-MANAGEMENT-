<?php 
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['idsv_da_o']) && isset($_GET['idktx']) && isset($_GET['idsv_chua_o'])){
                $idsv_da_o = $_GET['idsv_da_o'];
                $idktx = $_GET['idktx'];
                $idsv_chua_o = $_GET['idsv_chua_o'];

                // Cập nhật lại số lượng ktx;
                $sql = "SELECT * FROM kytucxa where id = $idktx";
                $res =mysqli_query($conn,$sql);
                $soluongnguoi= '';
                if($res == true){
                    while($rows = mysqli_fetch_array($res)){
                        $soluongnguoi = $rows['songuoihientai']-1;
                    }
                }
                $sql = "UPDATE `kytucxa` set `songuoihientai`=$soluongnguoi WHERE id = $idktx";
                mysqli_query($conn,$sql);
                // Cập nhật lại sinhvien_chua_o kiemtra = 0;
                $sql  = "UPDATE `sinhvien_chua_o` SET `kiemtra`=0 WHERE id = '$idsv_chua_o'";
                mysqli_query($conn,$sql);
                // Xóa khỏi nguyenvong
                $sql = "DELETE FROM `nguyenvong_ktx` WHERE id_sv=$idsv_chua_o";
                mysqli_query($conn,$sql);
                // Xóa họp đồng
                $sql = "DELETE FROM `hopdong` where idsinhvien_da_o = $idsv_da_o";
                $res =mysqli_query($conn,$sql);
                if($res == true){
                    // Xóa khỏi sinh viên đã ở
                    $sql = "DELETE FROM `suachua_csvc` WHERE idktx = $idktx";
                    if(mysqli_query($conn,$sql)){
                        $sql = "DELETE FROM `sinhvien_da_o` where id = $idsv_da_o";
                        mysqli_query($conn,$sql);
                    }
                    
                    
                }
                header('location: /ktx/admin/danhsachsinhvien.php');
                die();    
        }else{
            header('location: /ktx/admin/danhsachsinhvien.php');
            die();
        }
    }else{
        header('location: /ktx/admin/danhsachsinhvien.php');
        die();
    }
?>
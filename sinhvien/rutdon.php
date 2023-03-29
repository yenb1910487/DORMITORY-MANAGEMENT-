<?php 
   require_once '../config/DB.php';
    if(!isset($_SESSION['sinhvien'])){
        header('location: dangnhap.php');
        exit();
    }
    $mssv = $_SESSION['sinhvien'];

    // lấy id_sv_da_o và id_ktx
    $sql = "SELECT sinhvien_da_o.id,kytucxa.id FROM `sinhvien_da_o`,sinhvien_chua_o,kytucxa WHERE kytucxa.id = sinhvien_da_o.idktx and sinhvien_chua_o.id = sinhvien_da_o.idsv and mssv= '$mssv'";
    $res = mysqli_query($conn,$sql);
    $id_sv_da_o = $id_ktx  = '';

    if($res == true){
        while($rows = mysqli_fetch_array($res)){
            $id_sv_da_o = $rows[0];
            $id_ktx = $rows[1];
        }
    }
     
    // Cập nhật lại số lượng ktx;
     $sql = "SELECT * FROM kytucxa where id = $id_ktx";
    $res =mysqli_query($conn,$sql);
    $soluongnguoi= '';
    if($res == true){
        while($rows = mysqli_fetch_array($res)){
            $soluongnguoi = $rows['songuoihientai']-1;
        }
    }
     $sql = "UPDATE `kytucxa` set `songuoihientai`=$soluongnguoi WHERE id = $id_ktx";
     mysqli_query($conn,$sql);

    // Cập nhật lại sinhvien_chua_o kiemtra = 0;
     $sql  = "UPDATE `sinhvien_chua_o` SET `kiemtra`=0 WHERE mssv = '$mssv'";
    mysqli_query($conn,$sql);
    // Xóa khỏi nguyện vọng ktx
    $idsv_chua_o = '';
    $sql = "SELECT id from sinhvien_chua_o where mssv = '$mssv'";
    $res = mysqli_query($conn,$sql);
    if($res==true){
        while($rows = mysqli_fetch_array($res)){
            $idsv_chua_o = $rows['id'];
        }
    }
    $sql = "DELETE FROM `nguyenvong_ktx` WHERE id_sv=$idsv_chua_o";
    mysqli_query($conn,$sql);
    // Xóa họp đồng
    $sql = "DELETE FROM `hopdong` where idsinhvien_da_o = $id_sv_da_o";
    $res =mysqli_query($conn,$sql);
    if($res == true){
        // Xóa khỏi sinh viên đã ở
        $sql = "DELETE FROM `suachua_csvc` WHERE idktx = $id_ktx";
                    if(mysqli_query($conn,$sql)){
                        $sql = "DELETE FROM `sinhvien_da_o` where id = $id_sv_da_o";
                        mysqli_query($conn,$sql);
                    }
        
    }    
     header('location: index.php');

?>


    
<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['idnv'])){
            $idnv = $_GET['idnv'];
            $sql ="SELECT * FROM nhanvien where id=$idnv";
            $res = mysqli_query($conn,$sql);
            $msnv = $hoten = $gioitinh = $quequan = $vitri=$luong = $sodienthoai = '';
            if($res == true){
                while($rows = mysqli_fetch_array($res)){
                    $idnv = $rows['id'];
                    $msnv = $rows['msnv'];
                    $hoten = $rows['hoten'];
                    $gioitinh = $rows['gioitinh'];
                    $quequan = $rows['quequan'];
                    $vitri = $rows['vitri'];
                    $luong = $rows['luong'];
                    $sodienthoai = $rows['sodienthoai'];
                }
            }
            $data = array(
                'idnv' =>$idnv,
                'msnv' => $msnv,
                'hoten' =>$hoten,
                'gioitinh'=>$gioitinh,
                'quequan'=>$quequan,
                'vitri'=>$vitri,
                'luong'=>$luong,
                'sodienthoai'=>$sodienthoai
            );
            echo json_encode($data);

        }
    }else{
        header('location: ../dangnhap.php');
    }
?>
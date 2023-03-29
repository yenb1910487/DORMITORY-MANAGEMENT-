<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['id_hoadon']) ){
            $id = $_GET['id_hoadon'];
            $sql = "SELECT * FROM hoadon where id = $id";
            $res = mysqli_query($conn,$sql);
            $kiemtra = '';
            if($res == true){
                while($rows = mysqli_fetch_array($res)){
                    $kiemtra = $rows['kiemtra'];
                }
            }
            $sql = '';

            if($kiemtra == 0){
                $sql = "UPDATE `hoadon` SET `kiemtra`=1 WHERE id = $id";
            }else{
                $sql = "UPDATE `hoadon` SET `kiemtra`=0 WHERE id = $id";
            }
            echo $sql ;
            mysqli_query($conn,$sql);
        }
        else{
            header('location: ../danhsachdichvu.php');
            die();
        }
    }else{
        header('location: ../dangnhap.php');
    }
?>
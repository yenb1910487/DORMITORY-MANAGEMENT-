<?php 
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "DELETE FROM `dichvu` WHERE id = $id";
            $res = mysqli_query($conn,$sql);
            if($res == true){
                header('location: /ktx/admin/danhsachdichvu.php');
                die();
            }
        }else{
            header('location: /ktx/admin/danhsachdichvu.php');
            die();
        }
    }else{
        header('location: /ktx/admin/danhsachdichvu.php');
        die();
    }
?>
<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM kytucxa where id = $id";
            $res = mysqli_query($conn,$sql);
            $tinhtrangphong = '';
            $giaphong = '';
            if($res == true){
                while($rows = mysqli_fetch_array($res)){
                    $tinhtrangphong = $rows['tinhtrangphong'];
                    $giaphong = $rows['giaphong'];
                }
            }
            $data = array(
                "id"=>$id,
                "tinhtrangphong"=>$tinhtrangphong,
                "giaphong"=>$giaphong
            );
            echo json_encode($data);
        }else{

        }
    }else{
        header('location: ../dangnhap.php');
        die();
    }
?>
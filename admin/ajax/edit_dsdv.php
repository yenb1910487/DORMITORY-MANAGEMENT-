<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['iddv'])){
            $iddv = $_GET['iddv'];
            $sql ="SELECT * FROM dichvu where id=$iddv";
            $res = mysqli_query($conn,$sql);
            $madichvu = $iddv = $tendichvu = $dongia = '';
            if($res == true){
                while($rows = mysqli_fetch_array($res)){
                    $iddv = $rows['id'];
                    $madichvu = $rows['madichvu'];
                    $tendichvu = $rows['tendichvu'];
                    $dongia= $rows['dongia'];

                }
            }
            $data = array(
                'iddv' =>$iddv,
                'madichvu' => $madichvu,
                'dongia' =>$dongia,
                'tendichvu'=>$tendichvu
            );
            echo json_encode($data);

        }
    }else{
        header('location: ../dangnhap.php');
    }
?>
<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['toanha'])){

            $phong ='';
            $toanha = $_GET['toanha'];
            $sql = "SELECT id,giaphong,phong FROM kytucxa where songuoihientai <songuoitoida and toanha = '$toanha'";
            $res = mysqli_query($conn,$sql);
            $kq = '';
            $gia = '';
            if($res == true){
                while($rows = mysqli_fetch_array($res)){
                    $id = $rows['id'];
                    $phong = $rows['phong'];
                    $gia = $rows['giaphong'];
                    $kq.="
                    <option value='".$id."'>".$phong."</option>
                    ";
                }
                
            }
            $data = array('option' => $kq
                   ,'gia' => $gia
                   );
            
            echo json_encode($data);
            die();  
        }else{
            header('location: ../index.php');
            die();
        }
    }else{
        header('location: ../dangnhap.php');
        die();
    }
?>

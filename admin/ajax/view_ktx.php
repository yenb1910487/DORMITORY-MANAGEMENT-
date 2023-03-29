<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM `kytucxa`,sinhvien_da_o,sinhvien_chua_o where sinhvien_da_o.idsv = sinhvien_chua_o.id and sinhvien_da_o.idktx = kytucxa.id and kytucxa.id = $id order by sinhvien_chua_o.mssv asc";
            $res = mysqli_query($conn,$sql);
            $kq = '';
            $count = 0;
            if($res == true){
                $i=0;
                $count = mysqli_num_rows($res);
                while($rows = mysqli_fetch_array($res)){
                    $i++;
                    $kq .= "
                        <tr>
                            <td>".$i."</td>
                            <td>".$rows['mssv']."</td>
                            <td>".$rows['hoten']."</td>
                            <td>".$rows['nganh']."</td>
                            <td>".$rows['sodienthoai']."</td>  
                            <td>".$rows['email']."</td>
                            <td>".$rows['lop']."</td>  
                        </tr>
                    ";
                }
            }
            $data = array(
                "count"=>$count,
                "kq" =>$kq

            );
            echo json_encode($data);
        }else{

        }
    }else{
        header('location: ../dangnhap.php');
        die();
    }
?>
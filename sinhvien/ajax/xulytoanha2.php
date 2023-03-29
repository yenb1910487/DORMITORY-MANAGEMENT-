<?php
    require_once '../../config/DB.php';
    mysqli_set_charset($conn, 'UTF8');
    if(isset($_GET['toanha'])){
        if($_GET['toanha'] == ''){
            $sql = "SELECT * FROM kytucxa";
        }
        else{
            $toanha = $_GET['toanha'];
            $toanha = str_replace('\'','\\\'',$toanha);
            $sql = "SELECT * FROM kytucxa where toanha = '$toanha' order by toanha,phong asc";
        }
        
    }
    $kq ="";
    $res = mysqli_query($conn,$sql);
    $index=1;
    $tt='';
    if($res == true){
        while($rows = mysqli_fetch_assoc($res)){
            if($rows['songuoitoida'] - $rows['songuoihientai'] == 0){
                $tt =  "Đủ";
            }else{
                $tt= "Còn trống";
            }
            $kq .= "
                <tr>
                    <td>".$index++."</td>
                    <td>".$rows['toanha'] ."</td>
                    <td>".$rows['phong']."</td>
                    <td>".$rows['loaiphong']." </td>
                    <td>".$rows['songuoihientai']." </td>
                    <td>".$rows['songuoitoida']." </td>
                    <td>".$tt." </td>
                    <td>".$rows['giaphong']."</td>
            
                </tr>
            ";
        }
    }

    echo $kq;
?>
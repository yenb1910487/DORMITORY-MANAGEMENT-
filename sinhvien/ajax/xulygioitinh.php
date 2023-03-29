<?php
    require_once '../../config/DB.php';
    
    if(isset($_GET['gioitinh'])){
        $gioitinh = $_GET['gioitinh'];
        if($gioitinh != ''){
            $sql = "SELECT * FROM kytucxa where loaiphong = '$gioitinh' order by toanha,phong asc";
            
        }else{
            $sql = "SELECT * FROM kytucxa";
            
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
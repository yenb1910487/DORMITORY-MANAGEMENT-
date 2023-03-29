<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['giatri']) && isset($_GET['loc_nganh']) && isset($_GET['loc_gioitinh'])){
            $giatri = $_GET['giatri'];
            $loc_nganh = $_GET['loc_nganh'];
            $loc_gioitinh = $_GET['loc_gioitinh'];
            $giatri = str_replace('\'','\\\'',$giatri);
            $loc_nganh = str_replace('\'','\\\'',$loc_nganh);
            $loc_gioitinh = str_replace('\'','\\\'',$loc_gioitinh);
            $sql ="SELECT * FROM `sinhvien_da_o`,sinhvien_chua_o,kytucxa where sinhvien_da_o.idsv = sinhvien_chua_o.id and sinhvien_da_o.idktx = kytucxa.id and (mssv like '%$giatri%') order by toanha,phong asc ";
            if($loc_nganh!=''){
                if($loc_gioitinh!=''){
                    $sql ="SELECT * FROM `sinhvien_da_o`,sinhvien_chua_o,kytucxa where sinhvien_da_o.idsv = sinhvien_chua_o.id and sinhvien_da_o.idktx = kytucxa.id and (mssv like '%$giatri%') and nganh='$loc_nganh' and gioitinh='$loc_gioitinh' order by toanha,phong asc "; 
                }else{
                    $sql ="SELECT * FROM `sinhvien_da_o`,sinhvien_chua_o,kytucxa where sinhvien_da_o.idsv = sinhvien_chua_o.id and sinhvien_da_o.idktx = kytucxa.id and (mssv like '%$giatri%') and nganh='$loc_nganh' order by toanha,phong asc "; 
                }
            }
            if($loc_nganh==''){
                if($loc_gioitinh==''){
                    $sql ="SELECT * FROM `sinhvien_da_o`,sinhvien_chua_o,kytucxa where sinhvien_da_o.idsv = sinhvien_chua_o.id and sinhvien_da_o.idktx = kytucxa.id and (mssv like '%$giatri%') order by toanha,phong asc "; 
                }else{
                    $sql ="SELECT * FROM `sinhvien_da_o`,sinhvien_chua_o,kytucxa where sinhvien_da_o.idsv = sinhvien_chua_o.id and sinhvien_da_o.idktx = kytucxa.id and (mssv like '%$giatri%') and gioitinh='$loc_gioitinh' order by toanha,phong asc "; 
                }
            }

            $run = mysqli_query($conn,$sql);
            $kq = '';
            $i=0;
            while($rows = mysqli_fetch_array($run)){
                $ngaysinh = new DateTime($rows['ngaysinh']);
                $formattedweddingdate = date_format($ngaysinh, 'd-m-Y');
                $i++;
                $kq.="
                <tr>
                    <td>".$i."</td>
                    <td>".$rows['mssv']."</td>
                    <td>".$rows['hoten'] ."</td>
                    <td>".$formattedweddingdate."</td>
                    <td>". $rows['quequan'] ."</td>
                    <td>". $rows['gioitinh'] ."</td>
                    <td>". $rows['sodienthoai'] ."</td>
                    <td>". $rows['email'] ."</td>
                    <td>". $rows['nganh'] ."</td>
                    <td>". $rows['toanha'] ."</td>
                    <td>". $rows['phong'] ."</td>
                    <td>
                            
                            <a onclick='canhbao4(".$rows[0].",".$rows['idktx'].",".$rows[1].")' data-id='".$rows[0]."'  class='delete_data'><img src='/KTX/image/delete.png'></a>
                        </td>
                
                </tr>
                ";
            }
            echo $kq;
        }
    }else{
        header('location: ../dangnhap.php');
    }
?>
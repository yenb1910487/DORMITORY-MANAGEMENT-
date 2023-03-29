<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['giatri'])){
            $giatri = $_GET['giatri'];
            $giatri = str_replace('\'','\\\'',$giatri);
            $sql = "SELECT hoadon.id,mahoadon,toanha,phong,sonuoc,tiennuoc,sodien,tiendien,ngaylap,kiemtra FROM `hoadon`,kytucxa where kytucxa.id = hoadon.id_ktx order by mahoadon,ngaylap asc";
            if($giatri != ''){
                $sql = "SELECT hoadon.id,mahoadon,toanha,phong,sonuoc,tiennuoc,sodien,tiendien,ngaylap,kiemtra FROM `hoadon`,kytucxa where kytucxa.id = hoadon.id_ktx and mahoadon like '%$giatri%' order by mahoadon,ngaylap asc";
            }
            
            $res = mysqli_query($conn,$sql);
            $kq = '';
            if($res == true){
                $i=0;
                while($rows = mysqli_fetch_assoc($res)){
                    $temp='';
                    if($rows['kiemtra'] == 1){
                        $temp = 'checked';
                    }
                    $i++;
                    $kq .= "<tr >
                    <td>".$i."</td>
                    <td>".$rows['mahoadon']."</td>
                    <td>".$rows['toanha']."</td>
                    <td>".$rows['phong']."</td>
                    <td>".$rows['sonuoc']."</td>
                    <td>".$rows['tiennuoc']."</td>
                    <td>".$rows['sodien']."</td>
                    <td>".$rows['tiendien']."</td>
                    <td>".$rows['ngaylap']."</td>
                    <td><input class='checked_hoadon' data-id='".$rows['id']."' type='checkbox' ".$temp."></td>
                    <td>
                        
                        <a onclick='canhbao3(".$rows['id'].")' data-id='".$rows['id']."'  class='delete_data'><img src='/KTX/image/delete.png'></a>
                    </td>
                    
            
                </tr>";
                }
            }
            
            echo $kq;
        }
    }else{
        header('location: ../dangnhap.php');
    }
?>
<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['mahoadon']) && isset($_GET['idktx']) && isset($_GET['sonuoc']) && isset($_GET['sodien']) ){
            $mahoadon = $_GET['mahoadon'];   
            $idktx = $_GET['idktx'];         
            $sonuoc = $_GET['sonuoc'];  
            $sodien = $_GET['sodien'];
            $tiennuoc = $sonuoc * 4000;
            $tiendien = $sodien * 7500;  
            $ngaylap = new DateTime();
            $now  = $ngaylap->format('Y-m-d');
            
            $mahoadon = str_replace('\'','\\\'',$mahoadon);
            $idktx = str_replace('\'','\\\'',$idktx);
            $sonuoc = str_replace('\'','\\\'',$sonuoc);
            $sodien = str_replace('\'','\\\'',$sodien);
            
            $sql = "SELECT * FROM hoadon where mahoadon = '$mahoadon'";
            $res = mysqli_query($conn,$sql);
            $kiemtra=0;
            $kiemtra = mysqli_num_rows($res);
            $kq = '';
            if($kiemtra > 0 ){
                
            }else{
                $sql = "INSERT INTO `hoadon`(`mahoadon`, `sodien`, `tiendien`, `sonuoc`, `tiennuoc`, `ngaylap`, `kiemtra`, `id_ktx`) 
                VALUES ('$mahoadon','$sodien','$tiendien','$sonuoc','$tiennuoc','$now',0,$idktx)";
                $res = mysqli_query($conn,$sql);
                if($res == true){
                    $sql = "SELECT hoadon.id,mahoadon,toanha,phong,sonuoc,tiennuoc,sodien,tiendien,ngaylap,kiemtra FROM `hoadon`,kytucxa where kytucxa.id = hoadon.id_ktx order by mahoadon,ngaylap asc";
                    $res = mysqli_query($conn,$sql);
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
                }
            }
            $data = array(
                "kiemtra"=>$kiemtra,
                "kq"=>$kq
            );
            echo json_encode($data);

        }
        else{
            header('location: ../danhsachdichvu.php');
            die();
        }
    }else{
        header('location: ../dangnhap.php');
    }
?>
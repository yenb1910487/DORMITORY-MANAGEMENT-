<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['giatri']) && isset($_GET['loc_tinhtrang'])){
            $giatri = $_GET['giatri'];
            $loc_tinhtrang = $_GET['loc_tinhtrang'];
            $giatri = str_replace('\'','\\\'',$giatri);
            $loc_tinhtrang = str_replace('\'','\\\'',$loc_tinhtrang);
            $sql = "SELECT * FROM kytucxa order by toanha,phong asc";
            if($giatri == 0){
                $sql = "SELECT * FROM kytucxa where songuoihientai=songuoitoida order by toanha,phong asc";
                if($loc_tinhtrang!=''){
                    $sql = "SELECT * FROM kytucxa where songuoihientai=songuoitoida and tinhtrangphong=$loc_tinhtrang order by toanha,phong asc";
                }
                
            }else{
                if($giatri==1){
                    $sql = "SELECT * FROM kytucxa where songuoihientai<songuoitoida order by toanha,phong asc";
                    if($loc_tinhtrang!=''){
                        $sql = "SELECT * FROM kytucxa where songuoihientai<songuoitoida and tinhtrangphong=$loc_tinhtrang order by toanha,phong asc";
                    }
                }
                if($giatri==''){
                    $sql = "SELECT * FROM kytucxa order by toanha,phong asc";
                    if($loc_tinhtrang!=''){
                        $sql = "SELECT * FROM kytucxa where tinhtrangphong=$loc_tinhtrang order by toanha,phong asc";
                    }
                }
            }
            
            $run = mysqli_query($conn,$sql);
            $kq = '';
            $i=0;
            while($rows = mysqli_fetch_array($run)){
                $suachua='';
                if($rows['tinhtrangphong']==1){$suachua= "<span class='text-warning' style='font-weight:bold'>Đang sữa chữa</span>";}
                else{$suachua= "<span style='font-weight:bold' class='text-success'>Tốt</span>";}
                $i++;
                $kq.="
                <tr>
                    <td>".$i."</td>
                    
                            <td>". $rows['toanha']."</td>
                            <td>". $rows['phong']."</td>
                            <td>". $rows['loaiphong']."</td>
                            <td>". $rows['songuoihientai']."</td>
                            <td>". $rows['songuoitoida']."</td>
                            <td>". $rows['giaphong']."</td>
                            <td>".$suachua."</td>
                            <td>
                            <a data-id='".$rows['id']."' href='' data-bs-toggle='modal' class='edit_data_phong' data-bs-target='#myModal1'><img src='/KTX/image/font-selection-editor.png' alt=''></a>

                            <a data-id='".$rows['id']."' href='' data-bs-toggle='modal' class='view_data' data-bs-target='#myModal'><img src='/KTX/image/eye.png'></a>
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
<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['id']) && isset($_GET['giaphong']) && isset($_GET['tinhtrangphong'])){
            $id = $_GET['id'];
            $giaphong = $_GET['giaphong'];
            $tinhtrangphong = $_GET['tinhtrangphong'];

            $giaphong = str_replace('\'','\\\'',$giaphong);
            $tinhtrangphong = str_replace('\'','\\\'',$tinhtrangphong);
            $kiemtra = 0;
            $kq='';
            $sql = "UPDATE `kytucxa` SET `giaphong`='$giaphong',`tinhtrangphong`='$tinhtrangphong' WHERE id = $id";
            $res = mysqli_query($conn,$sql);
            if($res == true){
                $kiemtra = 1;
                $sql = "SELECT * FROM kytucxa order by toanha,phong asc";
                $res = mysqli_query($conn,$sql);
                if($res == true){
                    $i=0;
                    while($rows = mysqli_fetch_array($res)){
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
                }
            }
            $data = array(
                "kiemtra"=>$kiemtra,
                "kq"=>$kq
            );
            echo json_encode($data);
        }else{

        }
    }else{
        header('location: ../dangnhap.php');
        die();
    }
?>
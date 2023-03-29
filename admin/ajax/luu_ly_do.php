<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['id']) && isset($_GET['lydo']) ){
            $id = $_GET['id'];
            $lydo = $_GET['lydo'];


            $lydo = str_replace('\'','\\\'',$lydo);
            
            $kiemtra = 0;
            $kq='';
            $sql = "UPDATE `suachua_csvc` SET `xacnhan`='2',`lydo`='$lydo' WHERE id=$id";
            $res = mysqli_query($conn,$sql);
            if($res == true){
                $kiemtra = 1;
                $sql = "SELECT * FROM suachua_csvc,kytucxa, sinhvien_da_o,sinhvien_chua_o where sinhvien_chua_o.id=sinhvien_da_o.idsv and kytucxa.id = suachua_csvc.idktx and sinhvien_da_o.id = suachua_csvc.idsv";
                $res = mysqli_query($conn,$sql);
                if($res == true){
                    $i=0;
                    while($rows = mysqli_fetch_array($res)){
                        $i++;
                        $ngaygui = new DateTime($rows['ngaygui']);
                        $formattedweddingdate = date_format($ngaygui, 'd-m-Y');
                        $temp='';
                        if($rows['xacnhan']==0){
                            $temp = "
                            <a data-bs-toggle='modal' class='ly_do_huy' data-bs-target='#myModal' style='cursor:pointer;color:blue' data-id='".$rows[0]."'> Hủy</a> /
                            <a class='xacnhan_csvc' style='cursor:pointer;color:blue' data-id-1='".$rows[0]."'> Xác nhận</a>";

                        }else{
                            if($rows['xacnhan']==2){
                                $temp = "
                                <span class='text-danger' style='font-weight:bold'>Đã hủy</span>
                                <br><span class='text-primary' style='font-weight:bold;text-decoration: underline;'><i><a class='hoantac' data-id='".$rows[0]."' style='cursor:pointer'>HOÀN TÁC</a></i></span>

                                ";
                            }
                            if($rows['xacnhan']==1){
                                $temp = "
                                <span class='text-success' style='font-weight:bold'>Đã xác nhận</span>
                                <br><span class='text-primary' style='font-weight:bold;text-decoration: underline;'><i><a class='hoantac' data-id='".$rows[0]."' style='cursor:pointer'>HOÀN TÁC</a></i></span>

                                ";
                            }
                        }                
                        $kq.="
                                <tr>
                                    <td>". $i." </td>
                                    <td>". $rows['mssv']." </td>
                                    <td>". $rows['hoten']." </td>
                                    <td>". $rows['phong'] ."</td>
                                    <td>". $rows['toanha']." </td>
                                    <td>". $rows['tensuachua']." </td>
                                    <td>". $rows['soluong'] ."</td>
                                    <td>". $rows['ghichu'] ."</td>
                                    <td>". $formattedweddingdate ."</td>
                                    <td>". $temp ."</td>  
                                    <td>".$rows['lydo']."</td>

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
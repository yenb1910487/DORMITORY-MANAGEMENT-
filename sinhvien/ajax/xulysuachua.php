<?php
    require_once '../../config/DB.php';

    if(isset($_GET['tensuachua']) && isset($_GET['soluong']) && isset($_GET['idsv']) && isset($_GET['idktx'])){
        $mssv = $_SESSION['sinhvien'];
        $tensuachua = $_GET['tensuachua'];
        $soluong = $_GET['soluong'];
        $ghichu = $_GET['ghichu'];
        $idsv = $_GET['idsv'];
        $idktx = $_GET['idktx'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d');//Lấy ngày giờ hiện tại
        $tensuachua = str_replace('\'','\\\'',$tensuachua);
        $soluong = str_replace('\'','\\\'',$soluong);
        $ghichu = str_replace('\'','\\\'',$ghichu);
        $idsv = str_replace('\'','\\\'',$idsv);
        $idktx = str_replace('\'','\\\'',$idktx);
        $sql = "INSERT INTO `suachua_csvc`( `tensuachua`, `soluong`, `ghichu`, `idsv`, `idktx`,`ngaygui`,`xacnhan`) 
        VALUES ('$tensuachua','$soluong','$ghichu','$idsv','$idktx','$date','0')";
        $res = mysqli_query($conn, $sql);
        if($res==true){
            $kq='';
            $sql = "SELECT * FROM suachua_csvc,sinhvien_chua_o,sinhvien_da_o where suachua_csvc.idsv=sinhvien_da_o.id and sinhvien_da_o.idsv=sinhvien_chua_o.id and sinhvien_chua_o.mssv='$mssv'";
            $res = mysqli_query($conn,$sql);
            if($res==true){
                $i=0;
                while($rows= mysqli_fetch_assoc($res)){
                    $i++;
                    $ngaygui = new DateTime($rows['ngaygui']);
                    $formattedweddingdate = date_format($ngaygui, 'd-m-Y');
                    $xacnhan='';
                    if($rows['xacnhan'] == 1){
                        $xacnhan= '<div class="text-success" style="font-weight:bold">Đã duyệt</div>';
                    }else{
                        if($rows['xacnhan']==0){
                            $xacnhan= 'Chờ xác nhận!';
                        }
                        else{
                            $xacnhan= '<div class="text-danger" style="font-weight:bold">Bị hủy</div>';

                        }

                    }
                    $kq.="
                        <tr>
                            <td>".$i."</td>
                            <td>".$rows['tensuachua']."</td>
                            <td>".$rows['soluong']."</td>
                            <td>".$rows['ghichu']."</td>
                            <td>".$formattedweddingdate."</td>
                            <td>".$xacnhan."</td>
                            <td>".$rows['lydo']."</td>
                        </tr>
                    ";
                }
            }
            echo $kq;

        }

    }

?>
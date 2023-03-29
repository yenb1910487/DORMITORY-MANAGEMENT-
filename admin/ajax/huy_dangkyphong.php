<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['id']) && isset($_GET['idktx'])){
            $idnguyenvong = $_GET['id'];
            $idktx = $_GET['idktx'];
            $sql = "SELECT * FROM kytucxa where id = $idktx";
            $res = mysqli_query($conn,$sql);
            $ghichu = '';
            if($res==true){
                while($rows = mysqli_fetch_array($res)){
                    if($rows['songuoihientai']==$rows['songuoitoida']){
                        $ghichu = "ĐỦ NGƯỜI";
                    }
                    if($rows['tinhtrangphong'] == 1){
                        $ghichu = 'ĐANG SỬA CHỮA';
                    }
                        
                }
            }

            $sql = "UPDATE `nguyenvong_ktx` SET `trangthai`='-1',`ghichu`='$ghichu' WHERE id = $idnguyenvong";
            $res = mysqli_query($conn,$sql);
            $kq='';
            if($res==true){
                        $sql = "SELECT * FROM nguyenvong_ktx,sinhvien_chua_o,kytucxa where nguyenvong_ktx.id_ktx=kytucxa.id and sinhvien_chua_o.id=nguyenvong_ktx.id_sv order by toanha,phong,ngaydangky asc";
                        $res = mysqli_query($conn,$sql);
                        if($res == true){
                            $i=0;
                            while($rows = mysqli_fetch_array($res)){
                                $i++;
                                $ngaysinh = new DateTime($rows['ngaysinh']);
                                $formattedweddingdate1 = date_format($ngaysinh, 'd-m-Y');
                                $ngaydangky = new DateTime($rows['ngaydangky']);
                                $formattedweddingdate2 = date_format($ngaydangky, 'H:i:s d-m-Y');
                                $temp='';
                                if($rows['trangthai']==0){
                                    $temp = "
                                    <a style='cursor:pointer;color:blue' data-id-3='".$rows[2]."' data-id-1='".$rows[0]."' class='huybo'  >Hủy </a>/
                                    <a class='xacnhan' style='cursor:pointer;color:blue' data-id-1='".$rows[0]."' data-id-2='".$rows[6]."' data-id-3='".$rows[2]."'> Xác nhận</a>                        ";

                                }else{
                                    if($rows['trangthai']==1){
                                        $temp = "
                                        <span class='text-success' style='font-weight:bold'>Đã xác nhận</span>
                                        ";
                                    }else{
                                        $temp="<span class='text-danger' style='font-weight:bold'>Đã hủy bỏ</span>";
                                    }
                                }
                                $kq.="
                                <tr>
                                    <td>".$i."</td>
                                    <td>".$rows['mssv']."</td>
                                    <td>".$rows['hoten']."</td>
                                    <td>".$rows['sodienthoai']."</td>
                                    <td>".$rows['nganh']."</td>
                                    <td>".$formattedweddingdate1."</td>
                                    <td>".$rows['lop']."</td>
                                    <td>".$rows['gioitinh']."</td>
                                    <td>".$rows['quequan']."</td>
                                    <td>".$rows['toanha']."</td>
                                    <td>".$rows['phong']."</td>
                                    <td>".$formattedweddingdate2."</td>
                                    <td>".$temp."</td>  
                                    <td>".$rows['ghichu']."</td>
                                </tr>
                                ";
                            }
                        }
            }
            echo $kq;
        }
    }else{
        header('location: ../dangnhap.php');
    }
?>
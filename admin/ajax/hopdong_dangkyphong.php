<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['id']) && isset($_GET['idsv'])  && isset($_GET['idktx'])){
            $idnguyenvong = $_GET['id'];
            $id_sv_chua_o = $_GET['idsv'];
            $id_ktx = $_GET['idktx'];
            $taikhoanadmin = $_SESSION['admin'];
            $date = date('Y-m-d');
            $id_nv = '';
            $kiemtraphong=0;
            $kq='';
            //Xét phòng KTX đó còn chỗ không
            $sql = "SELECT * FROM kytucxa where id = $id_ktx";
            $res = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($res);
            if($rows['songuoihientai']==$rows['songuoitoida']){
                $kiemtraphong = 1;
            }else{
                // Kiểm tra xem phòng đó có hư hay không
                    if($rows['tinhtrangphong']==1){
                        $kiemtraphong = 2;
                    }else{
                    //Lấy ID của admin
                    $sql = "SELECT idnv from admin where taikhoan='$taikhoanadmin'";
                    $res = mysqli_query($conn,$sql);
                    if($res==true){
                        while($rows = mysqli_fetch_array($res)){
                            $id_nv=$rows['idnv'];
                        }
                    }
                    // Cập nhật lại trangthai của bảng nguyenvong_ktx
                    $sql = "UPDATE `nguyenvong_ktx` SET `trangthai`='1' WHERE id = $idnguyenvong";
                    $res = mysqli_query($conn,$sql); 
                    // Cập nhật lại kiemtra của bảng sinhvien_chua_o
                    $sql = "UPDATE `sinhvien_chua_o` SET `kiemtra`='1' WHERE id = $id_sv_chua_o";
                    $res = mysqli_query($conn,$sql);

                    // Thêm nguyenvong này vào sinhvien_da_o
                    $sql = "INSERT INTO `sinhvien_da_o`(`idsv`, `idktx`) VALUES ('$id_sv_chua_o','$id_ktx')";
                    $res = mysqli_query($conn,$sql);
                    //Cập nhật lại số lượng phòng ký túc xá
                    $sql = "UPDATE `kytucxa` SET `songuoihientai`=songuoihientai+1 WHERE id=$id_ktx";
                    $res =mysqli_query($conn,$sql);
                    //Thêm vào hợp đồng
                    if($res == true){
                        $idsinhvien_da_o = '';
                        $sql = "SELECT id from sinhvien_da_o where idsv=$id_sv_chua_o";
                        $res = mysqli_query($conn,$sql);
                        if($res==true){
                            while($rows = mysqli_fetch_array($res)){
                                $idsinhvien_da_o=$rows['id'];
                            }
                        }
                        $sql = "INSERT INTO `hopdong`(`ngaylap`, `idnv`, `idkytucxa`, `idsinhvien_da_o`) 
                        VALUES ('$date','$id_nv','$id_ktx','$idsinhvien_da_o')";
                        $res = mysqli_query($conn,$sql);
                    }
                    // Lấy dữ liệu trả về trang hiện tại
                        
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
                                    <a style='cursor:pointer;color:blue' class='huybo' data-id-3='".$rows[2]."' data-id-1='".$rows[0]."'  >Hủy </a>/
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

                    }
                
            
                $data = array(
                    "kq"=>$kq,
                    "kiemtraphong"=>$kiemtraphong
                );
                echo json_encode($data);

        }
    }else{
        header('location: ../dangnhap.php');
    }
?>
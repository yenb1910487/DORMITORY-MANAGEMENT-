<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['idsv'])){
            $mssv = $_GET['idsv'];
            $sql = "SELECT mssv FROM `nguyenvong_ktx`,SINHVIEN_cHUA_o where sinhvien_chua_o.id = nguyenvong_ktx.id_sv and mssv = '$mssv'";
            $res = mysqli_query($conn,$sql);
            $tam = 0;
            if(mysqli_num_rows($res) > 0){
                $tam = 1;
            }else{
                $tam = 0;
            }
            $sql = "SELECT * FROM sinhvien_chua_o where mssv = '$mssv'";
            $res = mysqli_query($conn,$sql);
            $idsv = '';
            $mssv = $hoten = $ngaysinh =$quequan =$gioitinh =$sodienthoai=$nganh = $lop ='';
            $kq = '<option value="">Dãy</option>';
            if($res==true){
                while($rows = mysqli_fetch_array($res)){
                    $idsv = $rows['id'];
                }
                if(mysqli_num_rows($res)>0){
                    $sql = "SELECT * FROM sinhvien_chua_o where id = $idsv";
                    $res = mysqli_query($conn,$sql);
                    if($res == true){
                        $row = mysqli_fetch_array($res);
                        $mssv = $row['mssv'];
                        $hoten = $row['hoten'];
                        $ngaysinh = $row['ngaysinh'];
                        $quequan = $row['quequan'];
                        $gioitinh = $row['gioitinh'];
                        $sodienthoai = $row['sodienthoai'];
                        $nganh = $row['nganh'];
                        $lop = $row['lop'];
                    }
                    
                    $sql = "SELECT toanha from kytucxa where loaiphong='$gioitinh' and songuoihientai<songuoitoida  group by toanha  order by toanha asc";
                    $res =mysqli_query($conn,$sql);
                    if($res == true){
                        while($rows = mysqli_fetch_array($res)){
                            $kq .= "
                                <option value=".$rows['toanha'].">".$rows['toanha']."</option>
                            ";
                        }
                    }
                    
                }
            }
            

            
            $data = array('tam'=>$tam
                        ,'mssv' => $mssv
                           ,'hoten' => $hoten,
                           'ngaysinh' => $ngaysinh
                           ,'quequan' => $quequan,
                           'gioitinh' => $gioitinh
                           ,'sodienthoai' => $sodienthoai,
                           'nganh' => $nganh
                           ,'lop' => $lop,
                        'toanha'=>$kq);
            echo json_encode($data);
            // die();  
        }else{
            header('location: ../index.php');
            die();
        }
    }else{
        header('location: ../dangnhap.php');
        die();
    }
?>
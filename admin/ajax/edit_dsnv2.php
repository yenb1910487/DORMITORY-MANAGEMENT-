<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['idnv']) && isset($_GET['msnv']) && isset($_GET['hoten']) && isset($_GET['quequan']) && isset($_GET['gioitinh']) && isset($_GET['sodienthoai']) && isset($_GET['vitri']) && isset($_GET['luong'])){

            $idnv = $_GET['idnv'];
            $msnv = $_GET['msnv'];
            $hoten = $_GET['hoten'];
            $quequan = $_GET['quequan'];
            $gioitinh = $_GET['gioitinh'];
            $sodienthoai = $_GET['sodienthoai'];
            $vitri = $_GET['vitri'];
            $luong = $_GET['luong'];
            
            $idnv = str_replace('\'','\\\'',$idnv);
            $msnv = str_replace('\'','\\\'',$msnv);
            $hoten = str_replace('\'','\\\'',$hoten);
            $quequan = str_replace('\'','\\\'',$quequan);
            $sodienthoai = str_replace('\'','\\\'',$sodienthoai);
            $vitri = str_replace('\'','\\\'',$vitri);
            $luong = str_replace('\'','\\\'',$luong);


            $sql = "SELECT * FROM nhanvien where not id =$idnv";
            $res = mysqli_query($conn,$sql);
            $kiemtra = 0;
            $kq = '';
            $message= '';
            if($res == true){
                while($rows = mysqli_fetch_array($res)){
                    if($rows['msnv'] == $msnv){
                        $kiemtra = 1;
                    } 
                }
            }
            if($kiemtra == 1){
                
                $sql = "SELECT * FROM nhanvien order by msnv asc";
                    $res = mysqli_query($conn,$sql);
                    if($res == true){
                        $i=0;
                        while($rows = mysqli_fetch_array($res)){
                            $i++;
                            $kq .= "
                                <tr >
                                    <td>".$i."</td>
                                    <td>".$rows['msnv']."</td>
                                    <td>".$rows['hoten']."</td>
                                    <td>".$rows['gioitinh']."</td>
                                    <td>".$rows['quequan']."</td>
                                    <td>".$rows['vitri']."</td>
                                    <td>".$rows['luong']."</td>
                                    <td>".$rows['sodienthoai']."</td>
                                    <td>
                                        <a data-id='".$rows['id']."' href='' data-bs-toggle='modal' class='edit_data' data-bs-target='#myModal'><img src='/KTX/image/font-selection-editor.png'></a>
                                        <a data-id='".$rows['id']."' href=''><img src='/KTX/image/delete.png'></a>
                                    </td>
                            
                                </tr>
                            ";
                        }
                    }
            }else{
                $sql ="UPDATE `nhanvien` SET 
                `msnv`='$msnv',
                `hoten`='$hoten',
                `gioitinh`='$gioitinh',
                `quequan`='$quequan',
                `vitri`='$vitri',
                `luong`='$luong',
                `sodienthoai`='$sodienthoai' 
                WHERE 
                id =$idnv ";
                
                $res = mysqli_query($conn,$sql);
                if($res == true){
                    $sql = "SELECT * FROM nhanvien order by msnv asc";
                    $res = mysqli_query($conn,$sql);
                    if($res == true){
                        $i=0;
                        while($rows = mysqli_fetch_array($res)){
                            $i++;
                            $kq .= "
                                <tr >
                                    <td>".$i."</td>
                                    <td>".$rows['msnv']."</td>
                                    <td>".$rows['hoten']."</td>
                                    <td>".$rows['gioitinh']."</td>
                                    <td>".$rows['quequan']."</td>
                                    <td>".$rows['vitri']."</td>
                                    <td>".$rows['luong']."</td>
                                    <td>".$rows['sodienthoai']."</td>
                                    <td>
                                        <a data-id='".$rows['id']."' href='' data-bs-toggle='modal' class='edit_data' data-bs-target='#myModal'><img src='/KTX/image/font-selection-editor.png'></a>
                                        <a onclick='canhbao(".$rows['id'].")' data-id='".$rows['id']."'  class='delete_data'><img src='/KTX/image/delete.png'></a>
                                    </td>
                            
                                </tr>
                            ";
                        }
                        
                    }
                }
                
                
            }
            $data = array(
                "kq" =>$kq,
                "kiemtra"=>$kiemtra
            );
            echo json_encode($data);
        }else{
            header('location: ../dangnhap.php');
        die();
        }
    }else{
        header('location: ../dangnhap.php');
        die();
    }
?>
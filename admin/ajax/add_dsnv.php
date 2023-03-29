<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['msnv']) && isset($_GET['hoten']) && isset($_GET['quequan']) && isset($_GET['sodienthoai']) && isset($_GET['gioitinh']) && isset($_GET['vitri']) && isset($_GET['luong'])){
            $msnv = $_GET['msnv'];   
            $hoten = $_GET['hoten'];         
            $quequan = $_GET['quequan'];  
            $sodienthoai = $_GET['sodienthoai'];  
            $vitri = $_GET['vitri'];  
            $gioitinh = $_GET['gioitinh'];  
            $luong = $_GET['luong'];  
            
            $msnv = str_replace('\'','\\\'',$msnv);
            $hoten = str_replace('\'','\\\'',$hoten);
            $quequan = str_replace('\'','\\\'',$quequan);
            $sodienthoai = str_replace('\'','\\\'',$sodienthoai);
            $vitri = str_replace('\'','\\\'',$vitri);
            $gioitinh = str_replace('\'','\\\'',$gioitinh);
            $luong = str_replace('\'','\\\'',$luong);
             $sql = "SELECT * FROM nhanvien where msnv = '$msnv'";
            $res = mysqli_query($conn,$sql);
            $kiemtra=0;
            $kiemtra = mysqli_num_rows($res);
            $kq = '';
            if($kiemtra > 0 ){
                
            }else{
                $sql = "INSERT INTO `nhanvien`(`msnv`, `hoten`, `gioitinh`, `quequan`, `vitri`, `luong`, `sodienthoai`) 
                VALUES ('$msnv','$hoten','$gioitinh','$quequan','$vitri','$luong','$sodienthoai')";
                $res = mysqli_query($conn,$sql);
                if($res == true){
                    $sql = "SELECT * FROM nhanvien order by msnv asc";
                    $res = mysqli_query($conn,$sql);
                    if($res == true){
                        $i=0;
                        while($rows = mysqli_fetch_assoc($res)){
                            $i++;
                            $kq .= "<tr >
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
            header('location: ../danhsachnhanvien.php');
            die();
        }
    }else{
        header('location: ../dangnhap.php');
        die();
    }
?>
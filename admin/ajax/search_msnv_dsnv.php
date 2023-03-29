<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['giatri'])){
            $giatri = $_GET['giatri'];
            $giatri = str_replace('\'','\\\'',$giatri);
            $sql = "SELECT * FROM nhanvien where msnv like '%$giatri%' or hoten like '%$giatri%' order by msnv asc";
            $run = mysqli_query($conn,$sql);
            $kq = '';
            $i=0;
            while($rows = mysqli_fetch_array($run)){
                
                $i++;
                $kq.="
                <tr>
                    <td>".$i."</td>
                    <td>".$rows['msnv']."</td>
                            <td>". $rows['hoten']."</td>
                            <td>". $rows['gioitinh']."</td>
                            <td>". $rows['quequan']."</td>
                            <td>". $rows['vitri']."</td>
                            <td>". $rows['luong']."</td>
                            <td>". $rows['sodienthoai']."</td>
                            <td>
                            <a data-id='".$rows['id']."' href='' data-bs-toggle='modal' class='edit_data' data-bs-target='#myModal'><img src='/KTX/image/font-selection-editor.png'></a>
                            <a onclick='canhbao(".$rows['id'].")' data-id='".$rows['id']."'  class='delete_data'><img src='/KTX/image/delete.png'></a>
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
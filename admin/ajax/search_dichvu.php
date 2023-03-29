<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['giatri'])){
            $giatri = $_GET['giatri'];
            $giatri = str_replace('\'','\\\'',$giatri);
            $sql = "SELECT * FROM dichvu where madichvu like '%$giatri%' or tendichvu like '%$giatri%' order by madichvu asc";
            $run = mysqli_query($conn,$sql);
            $kq = '';
            $i=0;
            while($rows = mysqli_fetch_array($run)){
                
                $i++;
                $kq.="
                <tr>
                    <td>".$i."</td>
                    
                            <td>". $rows['madichvu']."</td>
                            <td>". $rows['tendichvu']."</td>
                            <td>". $rows['dongia']."</td>

                            <td>
                            <a data-id='".$rows['id']."' href='' data-bs-toggle='modal' class='edit_data_dichvu' data-bs-target='#myModal'><img src='/KTX/image/font-selection-editor.png'></a>
                            <a onclick='canhbao2(".$rows['id'].")' data-id='".$rows['id']."'  class='delete_data'><img src='/KTX/image/delete.png'></a>
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
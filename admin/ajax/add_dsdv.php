<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['madichvu']) && isset($_GET['tendichvu']) && isset($_GET['dongia']) ){
            $madichvu = $_GET['madichvu'];   
            $tendichvu = $_GET['tendichvu'];         
            $dongia = $_GET['dongia'];  

            
            $madichvu = str_replace('\'','\\\'',$madichvu);
            $tendichvu = str_replace('\'','\\\'',$tendichvu);
            $dongia = str_replace('\'','\\\'',$dongia);
            
             $sql = "SELECT * FROM dichvu where madichvu = '$madichvu'";
            $res = mysqli_query($conn,$sql);
            $kiemtra=0;
            $kiemtra = mysqli_num_rows($res);
            $kq = '';
            if($kiemtra > 0 ){
                
            }else{
                $sql = "INSERT INTO `dichvu`(`madichvu`, `tendichvu`, `dongia`) 
                VALUES ('$madichvu','$tendichvu','$dongia')";
                $res = mysqli_query($conn,$sql);
                if($res == true){
                    $sql = "SELECT * FROM dichvu order by madichvu asc";
                    $res = mysqli_query($conn,$sql);
                    if($res == true){
                        $i=0;
                        while($rows = mysqli_fetch_assoc($res)){
                            $i++;
                            $kq .= "<tr >
                            <td>".$i."</td>
                            <td>".$rows['madichvu']."</td>
                            <td>".$rows['tendichvu']."</td>
                            <td>".$rows['dongia']."</td>

                            <td>
                            <a data-id='".$rows['id']."' href='' data-bs-toggle='modal' class='edit_data_dichvu' data-bs-target='#myModal'><img src='/KTX/image/font-selection-editor.png'></a>
                            <a onclick='canhbao2(".$rows['id'].")' data-id='".$rows['id']."'  class='delete_data'><img src='/KTX/image/delete.png'></a>                            </td>
                    
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
            header('location: ../danhsachdichvu.php');
            die();
        }
    }else{
        header('location: ../dangnhap.php');
    }
?>
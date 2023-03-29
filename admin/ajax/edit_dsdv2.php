<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['iddv']) && isset($_GET['madichvu']) && isset($_GET['tendichvu']) && isset($_GET['giadichvu']) ){

            $iddv = $_GET['iddv'];
            $madichvu = $_GET['madichvu'];
            $tendichvu = $_GET['tendichvu'];
            $giadichvu = $_GET['giadichvu'];

            $madichvu = str_replace('\'','\\\'',$madichvu);
            $tendichvu = str_replace('\'','\\\'',$tendichvu);
            $giadichvu = str_replace('\'','\\\'',$giadichvu);
            
            $sql = "SELECT * FROM dichvu where not id =$iddv";
            $res = mysqli_query($conn,$sql);
            $kiemtra = 0;
            $kq = '';
            $message= '';
            if($res == true){
                while($rows = mysqli_fetch_array($res)){
                    if($rows['madichvu'] == $madichvu){
                        $kiemtra = 1;
                    } 
                }
            }
            if($kiemtra == 1){
                
                $sql = "SELECT * FROM dichvu order by madichvu asc";
                    $res = mysqli_query($conn,$sql);
                    if($res == true){
                        $i=0;
                        while($rows = mysqli_fetch_array($res)){
                            $i++;
                            $kq .= "
                                <tr >
                                    <td>".$i."</td>
                                    <td>".$rows['madichvu']."</td>
                                    <td>".$rows['tendichvu']."</td>
                                    <td>".$rows['dongia']."</td>

                                    <td>
                                        <a data-id='".$rows['id']."' href='' data-bs-toggle='modal' class='edit_data_dichvu' data-bs-target='#myModal'><img src='/KTX/image/font-selection-editor.png'></a>
                                        <a onclick='canhbao2(".$rows['id'].")' data-id='".$rows['id']."' ><img src='/KTX/image/delete.png'></a>
                                    </td>
                            
                                </tr>
                            ";
                        }
                    }
            }else{
                $sql ="UPDATE `dichvu` SET 
                `madichvu`='$madichvu',
                `tendichvu`='$tendichvu',
                `dongia`='$giadichvu' WHERE 
                id =$iddv ";
                
                $res = mysqli_query($conn,$sql);
                if($res == true){
                    $sql = "SELECT * FROM dichvu order by madichvu asc";
                    $res = mysqli_query($conn,$sql);
                    if($res == true){
                        $i=0;
                        while($rows = mysqli_fetch_array($res)){
                            $i++;
                            $kq .= "
                                <tr >
                                    <td>".$i."</td>
                                    <td>".$rows['madichvu']."</td>
                                    <td>".$rows['tendichvu']."</td>
                                    <td>".$rows['dongia']."</td>

                                    <td>
                                        <a data-id='".$rows['id']."' href='' data-bs-toggle='modal' class='edit_data_dichvu' data-bs-target='#myModal'><img src='/KTX/image/font-selection-editor.png'></a>
                                        <a onclick='canhbao2(".$rows['id'].")' data-id='".$rows['id']."' ><img src='/KTX/image/delete.png'></a>
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
            // print_r($data);
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
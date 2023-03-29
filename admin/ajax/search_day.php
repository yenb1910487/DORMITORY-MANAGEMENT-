<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['giatri'])){
            $giatri = $_GET['giatri'];
            $giatri = str_replace('\'','\\\'',$giatri);
            $sql = '';
            if($giatri == 0){
                $sql = 'SELECT * FROM `kytucxa` ORDER by toanha,phong asc ';
            }else{
                $sql ="SELECT * FROM `kytucxa` WHERE toanha='$giatri' ORDER by toanha,phong asc ";
            }
            
            $run = mysqli_query($conn,$sql);
            $kq = '';
            $i=0;
            
            while($rows = mysqli_fetch_array($run)){
                
                if($rows['songuoitoida'] -$rows['songuoihientai'] == 0 ){
                    $color = "style='background-color:#FF0000'";
                    $tt ="Đủ";
                }else{
                    $color = "style='background-color:#0fa'";
                    $tt="Trống";
                }
                $i++;
                $kq.="
                    <div class='col-sm-3'".$color." >
                        <span>
                            Dãy ".$rows['toanha']."<br>"."Phòng ".$rows['phong']." <br>
                            ".$tt."<br>".$rows['loaiphong']."
                        </span>
                    </div>
                ";
            }
            echo $kq;
        }
    }else{
        header('location: ../dangnhap.php');
    }
?>
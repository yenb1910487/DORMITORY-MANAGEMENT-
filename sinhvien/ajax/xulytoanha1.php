<?php
    require_once '../../config/DB.php';
    if(isset($_GET['toanha'])){
        $toanha = $_GET['toanha'];
        $toanha = str_replace('\'','\\\'',$toanha);

        $sql = "SELECT * FROM kytucxa where toanha = '$toanha' order by toanha,phong asc";
        
    }
    $kq = "<option value=''>Phòng</option>";
    $res = mysqli_query($conn,$sql);
    if($res == true){
        while($rows = mysqli_fetch_assoc($res)){
            $kq .= '
                <option value="'.$rows['phong'].'">'.$rows['phong'].'</option>
            ';
        }
    }

    echo $kq;
?>
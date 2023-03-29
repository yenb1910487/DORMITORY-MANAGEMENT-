<?php 
    require_once 'include/header.php';
    
?>
                <h4>Danh sách sinh viên đang ở</h4>
                <div class="search-tt mt-3">
                    <form action="" id="form_search_dssv">
                    <div class="input-group mb-3 " style="width:40%;margin:0 auto;" >
                        <span class="input-group-text" style="border-right:none;background:none;">
                            <button style="border:none;background:none;">
                                <img src="/KTX/image/searching.png" alt="">
                            </button>
                        </span>
                        <input type="text" id="search_dssv" class="form-control"style="border-left:none;" placeholder="Nhập MSSV hoặc tên sinh viên">
                    </div>
                    </form>
                </div>
                <div class="search-tt mt-3">
                    <form action="" id="form_loc_khoa">
                    <div class="input-group mb-3 " style="width:40%" >
                        <?php 
                            $sql = "SELECT mssv,nganh FROM sinhvien_chua_o order by mssv,nganh asc";
                            $res = mysqli_query($conn,$sql);
                            $ms_list = array();
                            $nganh_list = array();
                            if($res==true){
                                while($rows = mysqli_fetch_array($res)){
                                    if(!in_array(substr($rows['mssv'],0, 3),$ms_list)){
                                        array_push($ms_list, substr($rows['mssv'],0, 3));
                                    }
                                    if(!in_array($rows['nganh'],$nganh_list)){
                                        array_push($nganh_list, $rows['nganh']);
                                    }
                                }
                            }
                        ?>
                        
                        <select name="" id="loc_khoa" style="width:20%">
                            <option value="">Khóa</option>
                            <?php 
                                for($i=0;$i<count($ms_list) ;$i++){
                                    $K =  str_replace(mb_substr($ms_list[$i], 0,1), $ms_list[$i], "K");
                                    $so = mb_substr($ms_list[$i],1,3)+26;
                                    $khoa = $K.$so;
                                    
                            ?>
                            <option value="<?php echo $ms_list[$i]; ?>"><?php echo $khoa; ?></option>
                            <?php
                                }
                            ?>
                            
                        </select>
                        
                    </div>
                    <div class="input-group mb-3 " style="width:40%" >
                        
                        <select name="" id="loc_nganh" style="width:20%">
                            <option value="">Ngành</option>
                            <?php 
                                for($i=0;$i<count($nganh_list) ;$i++){
                            ?>
                            <option value="<?php echo $nganh_list[$i]; ?>"><?php echo $nganh_list[$i]; ?></option>
                            <?php
                                }
                            ?>
                            
                        </select>
                    </div>
                    <div class="input-group mb-3 " style="width:40%" >
                        <select name="" id="loc_gioitinh" style="width:20%">
                            <option value="">Giới tính</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            
                        </select>
                    </div>
                    </form>
                </div>
                <div class="danhsachsinhvien">
                    
                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <th>STT</th>
                            <th>MSSV</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Quê</th>
                            <th>Giới tính</th>
                            <th>SĐT</th>
                            <th>Email</th>
                            <th>Ngành</th>
                            <th>Tòa nhà</th>
                            <th>Phòng</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody id="dssv">
                        <?php
                            $sql = "SELECT * FROM `sinhvien_da_o`,sinhvien_chua_o,kytucxa where sinhvien_da_o.idsv = sinhvien_chua_o.id and sinhvien_da_o.idktx = kytucxa.id order by toanha,phong asc";
                            $result = mysqli_query($conn,$sql);
                            $i=0;
                            while($rows_dssv = mysqli_fetch_array($result)){
                                $i=$i+1;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $rows_dssv['mssv'] ?></td>
                                <td><?php echo $rows_dssv['hoten'] ?></td>
                                <td><?php
                                $ngaysinh = new DateTime($rows_dssv['ngaysinh']);
                                $formattedweddingdate = date_format($ngaysinh, 'd-m-Y');
                                
                                echo $formattedweddingdate ?></td>
                                <td><?php echo $rows_dssv['quequan'] ?></td>
                                <td><?php echo $rows_dssv['gioitinh'] ?></td>
                                <td><?php echo $rows_dssv['sodienthoai'] ?></td>
                                <td><?php echo $rows_dssv['email'] ?></td>
                                <td><?php echo $rows_dssv['nganh'] ?></td>
                                <td><?php echo $rows_dssv['toanha'] ?></td>
                                <td><?php echo $rows_dssv['phong'] ?></td>
                                <td>
                                
                                <a  onclick="canhbao4(<?php echo $rows_dssv[0] ?>,<?php echo $rows_dssv['idktx'] ?>,<?php echo $rows_dssv[1] ?>);" data-id="<?php echo $rows_dssv[0]?>"  class="delete_data"><img src="/KTX/image/delete.png" alt=""></a>
                            </td>
                                
                            </tr>
                        <?php       
                            }
                        ?>
                        
                        </tbody>
                    </table>
                    
                </div>
            
    </div>
<style>
</style>

</body>
</html>
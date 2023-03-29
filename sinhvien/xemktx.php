<?php 
    
    include('include/header.php');
    
?> 
        <div class="clearfix"></div>
        <section class="xemtinhtrangphong">
            <section class="info_ktx">
            <h4>Đăng ký phòng</h4>
            <form method="GET" id="form-ghi-chu-ktx">
                
                
                <form action="">
                    <?php 
                        $sql = "SELECT * FROM `nguyenvong_ktx`,sinhvien_chua_o,kytucxa where kytucxa.id = nguyenvong_ktx.id_ktx and nguyenvong_ktx.id_sv = sinhvien_chua_o.id and sinhvien_chua_o.mssv='$mssv'";
                        $res = mysqli_query($conn,$sql);
                        if($res == true){
                        $rows = mysqli_fetch_assoc($res);
                    ?>
                    <?php 
                        if(isset($rows['trangthai'])){
                            if($rows['trangthai'] == -1) 
                                echo "<div id='mes_dky' class='text-danger' style='font-weight:bold'>PHÒNG BẠN ĐĂNG KÝ ".$rows['ghichu']."<br>VUI LÒNG CHỌN PHÒNG KHÁC</div>";
                        } 
                        if(isset($rows['kiemtra'])){
                            if($rows['kiemtra'] == 1) 
                                echo "<div class='text-primary' style='font-weight:bold'>BẠN ĐÃ ĐƯỢC DUYỆT<br>NÊN KHÔNG THỂ ĐĂNG KÝ NỮA</div>";
                        } 
                    ?>
                    <label style="width:10%" for="" >Dãy</label>
                    <input type="text" id="nguyenvong_day" <?php if(isset($rows['kiemtra'])){if($rows['kiemtra'] == 1) echo "disabled"; }?> value="<?php if(isset($rows['toanha'])){ echo $rows['toanha'];} ?>">
                    <br>
                    <label style="width:10%" for="" >Phòng</label>
                    <input type="number" id="nguyenvong_phong" <?php if(isset($rows['kiemtra'])){if($rows['kiemtra'] == 1) echo "disabled"; }?> value="<?php if(isset($rows['phong'])){ echo $rows['phong'];} ?>">
                    <br>
                    <?php
                            }
                        
                    ?>
                    
                    <input type="submit" <?php if(isset($rows['kiemtra'])){if($rows['kiemtra'] == 1) echo "disabled"; }?> value="Xác nhận" id="submit_ghichu" >
                </form>
                
                
                
                <div class="mb-3 mt-3">
                    <span id="mes_nv" ></span>
                </div>
            </form>
            
            </section>
            
            <h4>Xem tình trạng phòng ở KTX</h4>
            <form method="GET">
                <label style="margin-right:0.5%;width:18%;">Xem tòa nhà</label>
                <select name="toanha" id="toanha">
                    <option value="">Tòa nhà</option>
                    <?php 
                        $sql = "SELECT  toanha
                        FROM kytucxa
                        GROUP BY toanha ORDER BY toanha asc";
                        $res = mysqli_query($conn,$sql);
                        if($res == true){
                            while($rows = mysqli_fetch_assoc($res)){
                    ?>
                            <option value="<?php echo $rows['toanha']; ?>"><?php echo $rows['toanha']; ?></option>

                    <?php
                            }
                        }
                    ?>
                    
                </select><br>

                <label style="margin-right:0.5%;width:18%;margin-top:2%;">Lọc theo giới tính</label><br>
                <input type="radio" value="" name="gioitinh" checked>Tất cả<br>
                <input type="radio" value="Nữ" name="gioitinh" >Phòng Nữ
                <input type="radio" value="Nam" name="gioitinh" >Phòng Nam<br>

                <br>

            </form>
        </section>

        <section class="bangthongkephong">
            <h5><span style="font-weight:bold;">Tổng số</span>: 2 dòng</h5>
            <table class="table table-striped text-center">
                <thead class="table-dark">
                    <th>STT</th>
                    <th>Tòa nhà</th>
                    <th>Phòng</th>
                    <th>Phòng Nam / Nữ</th>
                    <th>Số người hiện tại</th>
                    <th>Số người tối đa</th>
                    <th>Tình trang phòng</th>
                    <th>Gía phòng</th>

                </thead>
                
                <tbody id="xemktx">
                <?php 
                    $sql = "SELECT * FROM kytucxa order by toanha,phong asc";
                    $index=1;
                    $res = mysqli_query($conn,$sql);
                    if($res == true){

                    
                    while($rows = mysqli_fetch_assoc($res)){
                ?>
                    <tr><td><?php echo $index++; ?></td>
                        <td><?php echo $rows['toanha']; ?></td>
                        <td><?php echo $rows['phong']; ?></td>
                        <td><?php echo $rows['loaiphong']; ?></td>
                        <td><?php echo $rows['songuoihientai']; ?></td>
                        <td><?php echo $rows['songuoitoida']; ?></td>
                        <td><?php 
                            if($rows['songuoitoida'] - $rows['songuoihientai'] == 0){
                                echo "Đủ";
                            }else{
                                echo "Còn Trống";
                            }
                        ?></td>
                        <td><?php echo $rows['giaphong']; ?></td>
                       
                    </tr>
                <?php
                    }}
                ?>
                    
                </tbody>
            </table>
            
        </section>
        
    </div>
</body>

</html>
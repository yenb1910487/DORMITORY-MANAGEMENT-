<?php 
    include('include/header.php');
?>
        <div class="clearfix"></div>
        <section class="info_sv">
            <h4 >Thông tin sinh viên</h4>
            <table class="table table-striped text-center" >
                <tbody>
                    
                    <tr>
                        <td style="width:25%;text-align:right">Mã số sinh viên</td>
                        <td style="width:25%;text-align:left"><?php echo $rows['mssv']; ?></td>
                        <td style="width:25%;text-align:right">Ngày sinh</td>
                        <td style="width:25%;text-align:left"><?php 
                        $ngaysinh = new DateTime($rows['ngaysinh']);
                        $formattedweddingdate = date_format($ngaysinh, 'd-m-Y');
                        
                        echo $formattedweddingdate ?></td>
                    </tr>
                    <tr>
                        <td style="width:25%;text-align:right">Họ tên</td>
                        <td style="width:25%;text-align:left"><?php echo $rows['hoten']; ?></td>
                        <td style="width:25%;text-align:right">Lớp</td>
                        <td style="width:25%;text-align:left"><?php echo $rows['lop']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:25%;text-align:right">Ngành học</td>
                        <td style="width:25%;text-align:left"><?php echo $rows['nganh']; ?></td>
                        <td style="width:25%;text-align:right">Giới tính</td>
                        <td style="width:25%;text-align:left"><?php echo $rows['gioitinh']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:25%;text-align:right">Hộ khẩu tỉnh/TP</td>
                        <td style="width:25%;text-align:left"><?php echo $rows['quequan']; ?></td>
                        <td style="width:25%;text-align:right">Số điện thoại cá nhân</td>
                        <td style="width:25%;text-align:left"><?php echo $rows['sodienthoai']; ?></td>
                    </tr>
                    <tr>

                        <td style="width:25%;text-align:right">Tòa nhà</td>
                        <td style="width:25%;text-align:left">
                            <?php 
                                $row = [];
                                $toanha='';
                                if($rows['kiemtra'] ==1){
                                    $sql = "SELECT * FROM `sinhvien_chua_o`,sinhvien_da_o,kytucxa WHERE sinhvien_da_o.idsv = sinhvien_chua_o.id and sinhvien_da_o.idktx = kytucxa.id and mssv = '$mssv'";
                                    $row = select($conn,$sql);
                                    $toanha = $row['toanha'];
                                    echo $row['toanha'];
                                }
                            ?>
                        </td>
                        <td style="width:25%;text-align:right">Phòng</td>
                        <td style="width:25%;text-align:left"><?php 
                            $row = [];
                            $phong='';
                            if($rows['kiemtra'] ==1){
                                $sql = "SELECT * FROM `sinhvien_chua_o`,sinhvien_da_o,kytucxa WHERE sinhvien_da_o.idsv = sinhvien_chua_o.id and sinhvien_da_o.idktx = kytucxa.id and mssv = '$mssv'";
                                $row = select($conn,$sql);
                                $phong = $row['phong'];
                                echo $row['phong'];
                            }
                        ?></td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="tacvu">
            <ul <?php 
                if($rows['kiemtra'] ==0){
                    echo "style='display:none';";
                }
            ?>>
                <li>
                    <a  onclick="canhbao();" style="cursor:pointer">
                    <img src="/KTX/image/close.png" alt="">
                        Rút đơn ở ký túc xá
                    </a>
                </li>
            </ul>
        </section>
        <section class="quydinh mb-2">
            <button type="button" data-bs-toggle="collapse" data-bs-target="#demo"><img src="/KTX/image/fast-forward.png" alt="note"> Xem thêm một số quy định</button>
            <div id="demo" class="collapse" style="margin-left:3%;">
                1. SV nội trú khi ra vào khu vực KTX phải mang Thẻ Sinh viên và đúng giờ quy
            định.<br>
            2. Không làm ồn ào gây ảnh hưởng đến người khác trong giờ nghỉ (Buổi trưa từ
            12 giờ đến 13 giờ; Buổi tối từ 23 giờ đến 5 giờ sáng hôm sau).<br>
            3. Không được qua khu vực KTX SV khác giới; Không tiếp khách trong phòng ở
            (kể cả SV nội trú ở phòng khác).<br>
            4. Không hút thuốc trong phòng ở và khu vực công cộng.<br>
            5. Không treo màn che (ri-đô) quanh giường ngủ; Quần áo, đồ dùng cá nhân,
            sách vở phải sắp xếp gọn gàng, ngăn nắp.<br>
            6. Không chơi thể thao trong khuôn viên KTX, trừ những khu vực được quy định.
            7. Không tổ chức và uống rượu, bia trong KTX.<br>
            8. Không được nấu ăn trong phòng ở và khu vực KTX (Trừ các dãy nhà có thiết
            kế và lắp đặt trang thiết bị cho phép nấu ăn tại KTX-A); Không để thức ăn, thực phẩm
            vào tủ đựng đồ.<br>
            9. SV khi rời khỏi KTX dưới 05 ngày (trừ những ngày nghỉ được Trường quy
            định) phải báo với Phòng trưởng (người đại diện của mỗi phòng, được chỉ định hay do
            SV cử ra); Nếu rời khỏi KTX từ 05 ngày trở lên, Phòng trưởng có trách nhiệm báo với
            Giám thị.<br>
            </div>
        </section>
        <section>
            <h4>Thông tin phản hồi cơ sở vật chất</h4>
            <table class="table table-striped text-center">
                <thead class="table-dark">
                    <th>STT</th>
                    <th>Tên sửa chữa</th>
                    <th>Số lượng</th>
                    <th>Ghi chú</th>
                    <th>Ngày gửi</th>
                    <th>Trạng thái</th>
                    <th>Lý do</th>
                </thead>
                <tbody id="body_bangphanhoi">
                    <?php
                        $sql = "SELECT * FROM suachua_csvc,sinhvien_chua_o,sinhvien_da_o where suachua_csvc.idsv=sinhvien_da_o.id and sinhvien_da_o.idsv=sinhvien_chua_o.id and sinhvien_chua_o.mssv='$mssv'";
                        $res = mysqli_query($conn,$sql);
                        if($res==true){
                            $i=0;
                            while($rows= mysqli_fetch_assoc($res)){$i++;
                                
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rows['tensuachua']; ?></td>
                        <td><?php echo $rows['soluong']; ?></td>
                        <td><?php echo $rows['ghichu']; ?></td>
                        <td><?php $ngaygui = new DateTime($rows['ngaygui']);
                                $formattedweddingdate = date_format($ngaygui, 'd-m-Y');
                                
                                echo $formattedweddingdate; ?></td>
                        <td><?php 
                            if($rows['xacnhan'] == 1){
                                echo '<div class="text-success" style="font-weight:bold">Đã duyệt</div>';
                            }else{
                                if($rows['xacnhan']==0){
                                    echo 'Chờ xác nhận!';
                                }else{
                                    echo '<div class="text-danger" style="font-weight:bold">Bị hủy</div>';
                                }
                                
                            }
                        ?></td>
                        <td><?php echo $rows['lydo']; ?></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>

                </tbody>
            </table>
        </section>
        <section class="diennuoc">
            <h4>Thông tin đóng phí điện nước hiện tại</h4>
            <table class="table table-striped text-center">
                <thead class="table-dark">
                    <th>STT</th>
                    <th>Mã hóa đơn</th>
                    <th>Số nước</th>
                    <th>Tiền nước</th>
                    <th>Số điện</th>
                    <th>Tiền điện</th>
                    <th>Ngày lập</th>
                    <th>Trạng thái</th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM sinhvien_chua_o where mssv = '$mssv'";
                    $res= mysqli_query($conn,$sql);
                    $rows = mysqli_fetch_array($res);
                        $kiemtra = $rows['kiemtra'];
                        if($kiemtra == 1){
                            $idktx = '';
                            $sql = "SELECT * from kytucxa where toanha = '$toanha' and phong = '$phong'";
                            $res = mysqli_query($conn,$sql);
                            if($res == true){
                                while($rows = mysqli_fetch_assoc($res)){
                                    $idktx = $rows['id'];
                                }
                            }
                            $sql = "SELECT * FROM hoadon where id_ktx = $idktx";
                            $res = mysqli_query($conn,$sql);
                            $i=0;
                            if($res == true){
                                while($rows = mysqli_fetch_assoc($res)){$i++;
                        
                        
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php  echo $rows['mahoadon']?></td>
                        <td><?php  echo $rows['sonuoc']?></td>
                        <td><?php  echo $rows['tiennuoc']?></td>
                        <td><?php  echo $rows['sodien']?></td>
                        <td><?php  echo $rows['tiendien']?></td>
                        <td><?php  echo $rows['ngaylap']?></td>
                        <td>
                            <?php 
                                if($rows['kiemtra'] == 1){
                                    echo 'Đã đóng';
                                }else{
                                    echo 'Chưa đóng';
                                }
                            ?>

                        </td>
                    </tr>

                    <?php            
                            }
                        }
                    }
                    ?>
                    
                </tbody>
            </table>
            
        </section>
        
    </div>
</body>

</html>
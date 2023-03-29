<?php 
    require_once 'include/header.php';
?>
            <div>
                <h4>Danh sách cơ sở vật chất phản hồi bởi sinh viên</h4>
                <div class="search-tt mt-3">
                    <form action="" method="GET">
                    <div class="input-group mb-3 " style="width:40%;margin:0 auto;" >
                        <span class="input-group-text" style="border-right:none;background:none;">
                            <button style="border:none;background:none;">
                                <img src="/KTX/image/searching.png" alt="">
                            </button>
                        </span>
                        <input type="text" id="tim_day" class="form-control" style="width:50%;margin:0 auto;" placeholder="Nhập dãy cần tìm kiếm...">
                    </div>
                    </form>
                </div>
                
                <table class="table">
                    <thead class="table-dark">
                    <tr>
                        <th>STT</th>
                        <th>MSSV</th>
                        <th>Họ tên</th>
                        <th>Phòng</th>
                        <th>Dãy</th>
                        <th>Tên sửa chữa</th>
                        <th>Số lượng</th>
                        <th>Ghi chú</th>
                        <th>Ngày gửi</th>
                        <th>Thao tác</th>
                        <th>Lý do (hủy)</th>
                    </tr>
                    </thead>
                    <tbody id="body_table_csvc">
                        <?php 
                            $sql = "SELECT * FROM suachua_csvc,kytucxa, sinhvien_da_o,sinhvien_chua_o where sinhvien_chua_o.id=sinhvien_da_o.idsv and kytucxa.id = suachua_csvc.idktx and sinhvien_da_o.id = suachua_csvc.idsv";
                            $res = mysqli_query($conn,$sql);
                            if($res == true){
                                $i=0;
                                while($rows = mysqli_fetch_array($res)){
                                    if($rows['ghichu'] == ''){
                                        $rows['ghichu'] = "Không";
                                    }
                                    $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $rows['mssv'] ?></td>
                            <td><?php echo $rows['hoten'] ?></td>
                            <td><?php echo $rows['phong'] ?></td>
                            <td><?php echo $rows['toanha'] ?></td>
                            <td><?php echo $rows['tensuachua'] ?></td>
                            <td><?php echo $rows['soluong'] ?></td>
                            <td><?php echo $rows['ghichu'] ?></td>
                            <td><?php $ngaygui = new DateTime($rows['ngaygui']);
                                $formattedweddingdate = date_format($ngaygui, 'd-m-Y');
                                
                                echo $formattedweddingdate?></td>
                            <td>
                                <?php 
                                    if($rows['xacnhan']==0){
                                        echo "
                                        <a data-bs-toggle='modal' class='ly_do_huy' data-bs-target='#myModal' style='cursor:pointer;color:blue' data-id='".$rows[0]."'> Hủy</a> / 
                                        <a class='xacnhan_csvc' style='cursor:pointer;color:blue' data-id-1='".$rows[0]."'> Xác nhận</a>
                                        ";
                                    }else{
                                        if($rows['xacnhan']==2){
                                            echo "<span class='text-danger' style='font-weight:bold'>Đã hủy</span>
                                            <br><span class='text-primary' style='font-weight:bold;text-decoration: underline;'><i><a class='hoantac' data-id='".$rows[0]."' style='cursor:pointer'>HOÀN TÁC</a></i></span>
                                            ";
                                        }
                                        if($rows['xacnhan']==1){
                                            echo "<span class='text-success' style='font-weight:bold'>Đã xác nhận</span>
                                            <br><span class='text-primary' style='font-weight:bold;text-decoration: underline;'><i><a class='hoantac' data-id='".$rows[0]."' style='cursor:pointer'>HOÀN TÁC</a></i></span>
                                            ";
                                        }
                                    }
                                ?>
                            </td>
                            <td>
                                <?php echo $rows['lydo']; ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        ?>

                    </tbody>
                </table>
                <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Lý do hủy bỏ</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="">
                                        <div class="inputDiv">
                                            <input type="hidden" id="modal_idcsvc">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Lý do</label>
                                            <input type="text" placeholder="Nhập lý do"  id="modal_lydocsvc">
                                        </div>
                                        
                                        
                                        <div class="inputDiv text-center">
                                            <button id="modal_luucsvc">Lưu</button>
                                        </div>       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    </div>
<style>
</style>
</body>
</html>
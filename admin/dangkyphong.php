<?php 
    require_once 'include/header.php';
?>
            <div>
            <h4>Danh sách nguyện vọng đăng ký của sinh viên</h4>
                <div class="search-tt mt-3">
                    <form action="" method="GET">
                    <div class="input-group mb-3 " style="width:40%;margin:0 auto;" >
                        <span class="input-group-text" style="border-right:none;background:none;">
                            <button style="border:none;background:none;">
                                <img src="/KTX/image/searching.png" alt="">
                            </button>
                        </span>
                        <input type="text" id="tim_nv_mssv" class="form-control" style="width:50%;margin:0 auto;" placeholder="Nhập MSSV...">
                    </div>
                    </form>
                </div>

                <table class="table">
                    <thead class="table-dark">
                    <tr>
                        <th>STT</th>
                        <th>MSSV</th>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                        <th>Ngành</th>
                        <th>Ngày sinh</th>
                        <th>Lớp</th>
                        <th>Giới tính</th>
                        <th>Quê quán</th>
                        <th>Tòa nhà</th>
                        <th>Phòng</th>
                        <th>Ngày đăng ký</th>
                        <th>Thao tác</th>
                        <th>Ghi chú</th>
                    </tr>
                    </thead>
                    <tbody id="body_table_nguyenvongktx">
                        <?php 
                            $sql = "SELECT * FROM nguyenvong_ktx,sinhvien_chua_o,kytucxa where nguyenvong_ktx.id_ktx=kytucxa.id and sinhvien_chua_o.id=nguyenvong_ktx.id_sv order by toanha,phong,ngaydangky asc";
                            $res = mysqli_query($conn,$sql);
                            if($res == true){
                                $i=0;
                                while($rows = mysqli_fetch_array($res)){
                                    
                                    $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $rows['mssv'] ?></td>
                            <td><?php echo $rows['hoten'] ?></td>
                            <td><?php echo $rows['sodienthoai'] ?></td>
                            <td><?php echo $rows['nganh'] ?></td>
                            <td><?php
                            $ngaysinh = new DateTime($rows['ngaysinh']);
                            $formattedweddingdate = date_format($ngaysinh, 'd-m-Y');
                            
                            echo $formattedweddingdate
                            
                            ?></td>
                            <td><?php echo $rows['lop'] ?></td>
                            <td><?php echo $rows['gioitinh'] ?></td>
                            <td><?php echo $rows['quequan'] ?></td>
                            <td><?php echo $rows['toanha'] ?></td>
                            <td><?php echo $rows['phong'] ?></td>
                            <td><?php
                            $ngaysinh = new DateTime($rows['ngaydangky']);
                            $formattedweddingdate = date_format($ngaysinh, 'H:i:s d-m-Y');
                            
                            echo $formattedweddingdate;
                            ?></td>
                            <td>
                                <?php 
                                    if($rows['trangthai']==0){
                                        echo "
                                        <a style='cursor:pointer;color:blue' class='huybo' data-id-1='".$rows[0]."' data-id-3='".$rows[2]."'  >Hủy </a>/
                                        <a class='xacnhan' style='cursor:pointer;color:blue' data-id-1='".$rows[0]."' data-id-2='".$rows[6]."' data-id-3='".$rows[2]."'> Xác nhận</a>
                                        ";
                                    }else{
                                        if($rows['trangthai']==1){
                                            echo "<span class='text-success' style='font-weight:bold'>Đã xác nhận</span>";
                                        }else{
                                            echo "<span class='text-danger' style='font-weight:bold'>Đã hủy bỏ</span>";
                                        }
                                    }
                                ?>

                                
                            </td>
                            <td><?php echo $rows['ghichu'] ?></td>

                        </tr>
                        <?php
                                }
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
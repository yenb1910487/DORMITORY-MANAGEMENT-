<?php 
    require_once 'include/header.php';
?>
                <h4>Danh sách phòng</h4>
                <div class="search-tt mt-3">
                    <form action="" id="form_search_ktx">
                    <div class="input-group mb-3 " style="width:40%;margin:0 auto;" >
                        <span class="input-group-text" style="border-right:none;background:none;">
                            <button style="border:none;background:none;">
                                <img src="/KTX/image/searching.png" alt="">
                            </button>
                        </span>
                        <input type="text" id="search_phongktx" class="form-control"style="border-left:none;" placeholder="Nhập tòa nhà hoặc số phòng">
                    </div>
                    </form>
                </div>
                <div class="search-tt mt-3">
                    <form action="" id="form_loc_phong">
                    <div class="input-group mb-3 " style="width:40%" >
                        
                        <select name="" id="loc_tinhtrang" style="width:30%">
                            <option value="">Tình trạng phòng</option>
                            <option value="1">Đang sửa chữa</option>
                            <option value="0">Tốt</option>
                            
                        </select>
                        
                    </div>
                    <div class="input-group mb-3 " style="width:40%" >
                        
                        <select name="" id="loc_trong" style="width:30%">
                            <option value="">Sỉ số phòng</option>
                            <option value="1">Phòng còn chỗ</option>
                            <option value="0">Phòng đủ</option>
                            
                        </select>
                    </div>
                    </form>
                </div>
                <div >
                    
                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <th>STT</th>
                            <th>Tòa nhà</th>
                            <th>Số phòng</th>
                            <th>Phòng Nam / Nữ</th>
                            <th>Số người hiện tại</th>
                            <th>Số người tối đa</th>
                            <th>Gía phòng</th>
                            <th>Tình trạng</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody id="danhsachphong">
                        <?php 
                            $sql = "SELECT * FROM kytucxa order by toanha,phong asc";
                            $res = mysqli_query($conn,$sql);
                            if($res == true){
                                $i=0;
                                while($rows = mysqli_fetch_array($res)){
                                    $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $rows['toanha']; ?></td>
                            <td><?php echo $rows['phong']; ?></td>
                            <td><?php echo $rows['loaiphong']; ?></td>
                            <td><?php echo $rows['songuoihientai']; ?></td>
                            <td><?php echo $rows['songuoitoida']; ?></td>
                            <td><?php echo $rows['giaphong']; ?></td>
                            <td>
                                <?php if($rows['tinhtrangphong']==1){
                                    echo "<span class='text-warning' style='font-weight:bold'>Đang sữa chữa</span>";
                                }
                                else{
                                    echo "<span style='font-weight:bold' class='text-success'>Tốt</span>";
                                    } ?></td>
                            <td>
                            <a data-id="<?php echo $rows['id']?>" href="" data-bs-toggle="modal" class="edit_data_phong" data-bs-target="#myModal1"><img src="/KTX/image/font-selection-editor.png" alt=""></a>
                                <a data-id="<?php echo $rows['id']; ?>" href="" data-bs-toggle="modal" class="view_data" data-bs-target="#myModal"><img src="/KTX/image/eye.png" alt=""></a>
                            </td>
                            
                        </tr>
                        <?php            
                                }
                            }
                        ?>
                        
                        </tbody>
                    </table>
                    <div class="modal fade" id="myModal1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Chỉnh sửa phòng</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="">
                                        <div class="inputDiv">
                                            <input type="hidden" id="modal_idktx">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Gía phòng</label>
                                            <input type="number"  id="modal_giaphong">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Tình trạng</label>
                                            <input type="radio" name="tinhtrangphong" value="0">Tốt
                                            <input type="radio" name="tinhtrangphong" value="1">Sửa chữa
                                        </div>
                                        
                                        <div class="inputDiv text-center">
                                            <button id="modal_luu">Lưu</button>
                                        </div>       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade " id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Chi tiết phòng</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                <h5 >Danh sách gồm <span id="soluongtv"></span> thành viên</h5>
                                <table class="table">
                                    <thead class="table-secondary">
                                    <tr>
                                        <th>STT</th>
                                        <th>MSSV</th>
                                        <th>Họ tên</th>
                                        <th>Ngành</th>
                                        <th>SĐT</th>
                                        <th>Email</th>
                                        <th>Lớp</th>
                                    </tr>
                                    </thead>
                                    <tbody id="modal_sinhvien_kytucxa">
                                    <tr>
                                        
                                    </tr>
                                    </tbody>
                                </table>
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
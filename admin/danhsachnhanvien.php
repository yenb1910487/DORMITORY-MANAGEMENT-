<?php 
    require_once 'include/header.php';
?>
                <h4>Danh sách nhân viên</h4>
                <div class="search-tt mt-3">
                    <form action="">
                    <div class="input-group mb-3 " style="width:40%;margin:0 auto;" >
                        <span class="input-group-text" style="border-right:none;background:none;">
                            <button style="border:none;background:none;">
                                <img src="/KTX/image/searching.png" alt="">
                            </button>
                        </span>
                        <input type="text" id="search_msnv_dsnv" class="form-control"style="border-left:none;" placeholder="Nhập MNV hoặc tên nhân viên">
                    </div>
                    </form>
                </div>
                <div class="themthongtin mt-3 mb-3">
                    <button data-bs-toggle="modal" data-bs-target="#myModal1">
                        <img src="/KTX/image/add.png" alt="">
                       <span>Thêm</span> 
                    </button>
                </div>
                <div class="modal fade" id="myModal1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Thêm nhân viên</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form method="GET" >

                                        <div class="inputDiv">
                                            <label for="">MNV</label>
                                            <input type="text" id="them_msnv">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Họ tên</label>
                                            <input type="text" id="them_hoten">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Hộ khẩu</label>
                                            <input type="text" id="them_quequan">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Giới tính</label>
                                            <input type="radio" value="Nam" name="them_gioitinh">Nam
                                            <input type="radio" value="Nữ" name="them_gioitinh">Nữ
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">SĐT</label>
                                            <input type="number" id="them_sodienthoai">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Vị trí</label>
                                            <input type="text" id="them_vitri">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Lương</label>
                                            <input type="number" id="them_luong">
                                        </div>
                                        <div class="inputDiv text-center">
                                            <button id="them_dsnv" >Thêm</button>
                                        </div>       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <div class="danhsachnhanvien">
                    
                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <th>STT</th>
                            <th>MSNV</th>
                            <th>Họ tên</th>
                            <th>Giới tính</th>
                            <th>Quê quán</th>
                            <th>Vị trí</th>
                            <th>Lương</th>
                            <th>Số điện thoại</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody id="dsnv">
                        <?php
                            $sql = "SELECT * FROM nhanvien order by msnv asc";
                            $result = mysqli_query($conn,$sql);
                            $i=0;
                            while($rows_dsnv = mysqli_fetch_array($result)){
                                $i=$i+1;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $rows_dsnv['msnv']; ?></td>
                            <td><?php echo $rows_dsnv['hoten']; ?></td>
                            <td><?php echo $rows_dsnv['gioitinh']; ?></td>
                            <td><?php echo $rows_dsnv['quequan']; ?></td>
                            <td><?php echo $rows_dsnv['vitri']; ?></td>
                            <td><?php echo $rows_dsnv['luong']; ?></td>
                            <td><?php echo $rows_dsnv['sodienthoai']; ?></td>
                            <td>
                                <a data-id="<?php echo $rows_dsnv['id']?>" href="" data-bs-toggle="modal" class="edit_data" data-bs-target="#myModal"><img src="/KTX/image/font-selection-editor.png" alt=""></a>
                                <a onclick="canhbao(<?php echo $rows_dsnv['id'] ?>);" data-id="<?php echo $rows_dsnv['id']?>"  class="delete_data"><img src="/KTX/image/delete.png" alt=""></a>
                            </td>
                            
                        </tr>
                        <?php       
                            }
                        ?>
                        </tbody>
                    </table>
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Thông tin sinh viên</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="">
                                        <div class="inputDiv">
                                            <input type="hidden" id="modal_idnv">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">MNV</label>
                                            <input type="text" id="modal_msnv">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Họ tên</label>
                                            <input type="text" id="modal_hoten">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Hộ khẩu</label>
                                            <input type="text" id="modal_quequan">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Giới tính</label>
                                            <input type="radio" value="Nam"  name="modal_gioitinh">Nam
                                            <input type="radio" value="Nữ" name="modal_gioitinh">Nữ
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">SĐT</label>
                                            <input type="number" id="modal_sodienthoai">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Vị trí</label>
                                            <input type="text" id="modal_vitri">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Lương</label>
                                            <input type="number" id="modal_luong">
                                        </div>
                                        <div class="inputDiv text-center">
                                            <button id="modal_capnhat">Cập nhật</button>
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
<script id="mes_dsnv">

</script>
</body>
</html>
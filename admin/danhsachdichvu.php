<?php 
    require_once 'include/header.php';
?>
                <h4>Danh sách dịch vụ</h4>
                <div class="search-tt mt-3">
                    <form action="">
                    <div class="input-group mb-3 " style="width:40%;margin:0 auto;" >
                        <span class="input-group-text" style="border-right:none;background:none;">
                            <button style="border:none;background:none;">
                                <img src="/KTX/image/searching.png" alt="">
                            </button>
                        </span>
                        <input type="text" id="search_dichvu" class="form-control"style="border-left:none;" placeholder="Nhập mã hoặc tên dịch vụ">
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
                                    <h4 class="modal-title">Thêm dịch vụ</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="">
                                        <div class="inputDiv">
                                            <label for="">Mã dịch vụ</label>
                                            <input type="text" id="them_madichvu">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Tên dịch vụ</label>
                                            <input type="text" id="them_tendichvu">
                                        </div>
                                        
                                        <div class="inputDiv">
                                            <label for="">Gía</label>
                                            <input type="number" id="them_gia">
                                        </div>

                                        <div class="inputDiv text-center">
                                            <button id="them_dsdv">Thêm</button>
                                        </div>       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 mb-3">
                    <a class="p-2" style = "background:green;width:100%;color:#fff;font-size:1.2rem" href="excel/dichvu.php">Xuất file excel</a>
                </div>
                <div>
                    
                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <th>STT</th>
                            <th>Mã dịch vụ</th>
                            <th>Tên dịch vụ</th>
                            
                            <th>Đơn giá</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody  id="danhsachdichvu">
                            <?php 
                                $sql = "SELECT * FROM dichvu order by madichvu asc";
                                $i=0;
                                $res = mysqli_query($conn,$sql);
                                if($res == true){
                                    while($rows = mysqli_fetch_assoc($res)){
                                        $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i?></td>
                                    <td><?php echo $rows['madichvu'] ?></td>
                                    <td><?php echo $rows['tendichvu'] ?></td>
                                    
                                    <td><?php echo $rows['dongia'] ?></td>
                                    
                                    <td>
                                        <a data-id="<?php echo $rows['id']?>" href="" data-bs-toggle="modal" class="edit_data_dichvu" data-bs-target="#myModal"><img src="/KTX/image/font-selection-editor.png" alt=""></a>
                                        <a onclick="canhbao2(<?php echo $rows['id'] ?>);"  data-id="<?php echo $rows['id']?>"  class="delete_data"><img src="/KTX/image/delete.png" alt=""></a>
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
                                    <h4 class="modal-title">Thông tin dịch vụ</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="">
                                        <div class="inputDiv">
                                            <input type="hidden" id="modal_iddichvu">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Mã dịch vụ</label>
                                            <input type="text" id="modal_madichvu" >
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Tên dịch vụ</label>
                                            <input type="text" id="modal_tendichvu" >
                                        </div>
                                        
                                        <div class="inputDiv">
                                            <label for="">Gía</label>
                                            <input type="number" id="modal_giadichvu">
                                        </div>

                                        <div class="inputDiv text-center">
                                            <button id="modal_capnhatdichvu">Cập nhật</button>
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
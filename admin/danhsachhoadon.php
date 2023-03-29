<?php 
    require_once 'include/header.php';
?>
                <h4>Danh sách hóa đơn</h4>
                <div class="search-tt mt-3">
                    <form action="">
                    <div class="input-group mb-3 " style="width:40%;margin:0 auto;" >
                        <span class="input-group-text" style="border-right:none;background:none;">
                            <button style="border:none;background:none;">
                                <img src="/KTX/image/searching.png" alt="">
                            </button>
                        </span>
                        <input type="text" id="search_hoadon" class="form-control"style="border-left:none;" placeholder="Nhập mã hóa đơn">
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
                                            <label for="">Mã hóa đơn</label>
                                            <input type="text" id="them_mahoadon">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Tòa nhà</label>
                                            <select name="mssv" id="hoadon_toanha">
                                                <option value="" >Chọn dãy</option>
                                                <?php 
                                                    $sql = "SELECT * FROM kytucxa group by toanha order by toanha asc ";
                                                    $res = mysqli_query($conn,$sql);
                                                    if($res == true){
                                                        while($rows = mysqli_fetch_array($res)){
                                                ?>
                                                <option value="<?php echo $rows['toanha'] ?>"><?php echo $rows['toanha'] ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>            
                                            </select>
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Phòng</label>
                                            <select name="mssv" id="dangkyphong_phong">
                                                <option value="" disabled>Chọn phòng</option>
                                                         
                                            </select>
                                        </div>
                                        
                                        <div class="inputDiv">
                                            <label for="">Số nước</label>
                                            <input type="number" id="them_sonuoc">
                                        </div>
                                        <div class="inputDiv">
                                            <label for="">Số điện</label>
                                            <input type="number" id="them_sodien">
                                        </div>
                                        
                                        <div class="inputDiv text-center">
                                            <button id="them_hoadon" >Thêm</button>
                                        </div>       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <div class="danhsachhoadon">
                    <div style="font-weight:bold">
                        <i style="display:block">-Quy ước:</i>
                        <i style="display:block;padding-left:2%">+ Tiền nước: 1 khối 4000vnđ</i>
                        <i style="display:block;padding-left:2%">+ Tiền điện: 1kw 7500vnđ</i>
                        <i style="display:block;padding-left:2%">+ Gỉa sử rằng tất cả "KHÔNG" vượt qua ngưỡng phạt của tiền điện nước</i>
                    </div>
                    
                    <table class="table">
                        <thead class="table-dark">
                        <tr>
                            <th>STT</th>
                            <th>Mã hóa đơn</th>
                            <th>Tòa nhà</th>
                            <th>Phòng</th>
                            <th>Số nước (khối)</th>
                            <th>Tiền nước (nghìn đồng)</th>
                            <th>Số điện (kwh)</th>
                            <th>Tiền điện (nghìn đồng)</th>
                            <th>Ngày lập</th>
                            <th>Đã thanh toán</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody id="body_hoadon">
                        <?php 
                            $sql = "SELECT hoadon.id,mahoadon,toanha,phong,sonuoc,tiennuoc,sodien,tiendien,ngaylap,kiemtra FROM `hoadon`,kytucxa where kytucxa.id = hoadon.id_ktx order by mahoadon,ngaylap asc";
                            $res = mysqli_query($conn,$sql);
                            if($res == true){
                                $i=0;
                                while($rows = mysqli_fetch_assoc($res)){$i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $rows['mahoadon']; ?></td>
                            <td><?php echo $rows['toanha']; ?></td>
                            <td><?php echo $rows['phong']; ?></td>
                            <td><?php echo $rows['sonuoc']; ?></td>
                            <td><?php echo $rows['tiennuoc']; ?></td>
                            <td><?php echo $rows['sodien']; ?></td>
                            <td><?php echo $rows['tiendien']; ?></td>
                            <td><?php echo $rows['ngaylap']; ?></td>
                            <td>
                                <input class="checked_hoadon" data-id="<?php echo $rows['id'] ?>"  type="checkbox" 
                                    <?php 
                                        if($rows['kiemtra'] == 1){
                                            echo 'checked'; 
                                        }else{
                                            
                                        }
                                    ?>
                                >
                                
                            </td>
                            <td>
                                <a onclick="canhbao3(<?php echo $rows['id'] ?>);" data-id="<?php echo $rows['id']?>"  ><img src="/KTX/image/delete.png" alt=""></a>
                            </td>                
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
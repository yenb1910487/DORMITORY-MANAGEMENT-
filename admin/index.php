<?php 
    require_once 'include/header.php';
?>
                
                <h4 class="text-center mt-3 mb-3" style="border-bottom:none;">THÔNG TIN CÁ NHÂN</h4>
                <div id="thongtincanhan" class="mb-3 text-center">
                    <div class="text">
                        <div>
                            Họ và tên
                        </div>
                        <div>
                            <?php echo $row['hoten'] ?>
                        </div>
                    </div>
                    <div class="text">
                        <div>
                            MSNV
                        </div>
                        <div>
                            <?php echo $row['msnv'] ?>
                        </div>
                    </div>
                    <div class="text">
                        <div>
                            Giới tính
                        </div>
                        <div>
                        <?php echo $row['gioitinh'] ?>
                        </div>
                    </div>
                    <div class="text">
                        <div>
                            Quê quán
                        </div>
                        <div>
                        <?php echo $row['quequan'] ?>
                        </div>
                    </div>
                    <div class="text">
                        <div>
                            Vị trí
                        </div>
                        <div>
                        <?php echo $row['vitri'] ?>
                        </div>
                    </div>  
                    <div class="text">
                        <div>
                            Lương
                        </div>
                        <div>
                        <?php 
                        $luong = $row['luong'];
                         echo currency_format($luong) ?>
                        </div>
                    </div>
                    <div class="text">
                        <div>
                            SĐT
                        </div>
                        <div>
                        <?php echo $row['sodienthoai'] ?>
                        </div>
                    </div>
                     
                </div>
                            
    </div>

</body>
</html>
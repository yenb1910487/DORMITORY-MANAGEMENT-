
            <?php 
    require_once 'include/header.php';
?>
                
                <h4 class="text-center mt-3 mb-3" style="border-bottom:none;">ĐỔI MẬT KHẨU</h4>
                <div id="thongtincanhan" class="mb-3 text-center ">
                    <form method="POST">
                        <div class="text">
                            <div>
                                Tài khoản
                            </div>
                            <div>
                                <input type="text" class="form-control" value="<?php echo $row['taikhoan'] ?>" disabled>
                            </div>
                        </div>
                        <div class="text">
                            <div>
                                Mật khẩu cũ
                            </div>
                            <div>
                                <input id="matkhaucu" type="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="text">
                            <div>
                                Mật khẩu mới
                            </div>
                            <div>
                                <input id="matkhaumoi" type="password" class="form-control" placeholder="New Password"  >
                            </div>
                        </div>
                        
                        <div class="text">
                            <div>
                                Nhập lại mật khẩu mới
                            </div>
                            <div>
                                <input id="nhaplaimkmoi" type="password" class="form-control"  placeholder="New Password (2)">
                            </div>
                        </div>
                        
                        <div class=" mt-3 mb-3" id="mes_submitpw">
                            
                        </div>
                        <div class="text mt-3 mb-3">
                            <input id="luumatkhau" type="submit" value="Lưu" class="btn btn-success">
                        </div>
                        
                    </form>
                </div>
                            
    </div>

</body>
</html>

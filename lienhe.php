<?php 
    require_once 'include/header.php';
?>

<main class="lienhe">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.841454343738!2d105.76842661468002!3d10.029938975270296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBD4bqnbiBUaMah!5e0!3m2!1svi!2s!4v1662731557466!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <div class="row">
        <div class="col-sm-5">
            <div class="main">
            <form action="" method="POST" class="form" id="form-1">
          <h3 class="heading"><b>Liên hệ</b> </h3>
          <p class="desc">Hãy nhập vào form dưới đây để liên hệ với chúng tôi ❤️</p>
      
          <div class="spacer"></div>
      
          <div class="form-group">
            <label for="fullname" class="form-label">Tên đầy đủ</label>
            <input id="fullname" name="fullname" type="text" placeholder="VD: Khoa Nguyễn" class="form-control" required>
            <span class="form-message"></span>
          </div>
      
          <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" placeholder="VD: KTX@gmail.com" class="form-control" required>
            <span class="form-message"></span>
          </div>
      
          <div class="form-group">
            <label for="sdt" class="form-label">Số điện thoại</label>
            <input id="sdt" name="sdt" type="text" placeholder="VD: 01242882856" class="form-control" required>
            <span class="form-message"></span>
          </div>
          <div class="form-group">
            <label for="content" class="form-label">Nội dung liên hệ</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            <span class="form-message"></span>
          </div>
          <button class="form-submit">Gửi liên hệ</button>
        </form>
            </div>
        </div>
        <div class="col-sm-7">
                <h2 class="text-center">TỔNG ĐÀI KÝ TÚC XÁ: 0843 152 505</h2>
                <h2 class="text-center">DANH BẠ TRUNG TÂM QUẢN LÝ KTX-DORMITORY</h2>
                <div class="title-phone">
                    <p>Các số điện thoại khẩn cấp</p>
                </div>
                <div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên đơn vị</th>
                            <th>Số nội bộ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Công an phường Xuân Khánh</td>
                            <td>0292 3820 186</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Bảo vệ cổng chính</td>
                            <td>107</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Bảo vệ cổng phụ</td>
                            <td>108</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Bệnh viện trung ương thành phố Cần Thơ</td>
                            <td>(0292) 3 721 235</td>
                        </tr>
                        
                        </tbody>
                    </table>
                </div>
                <div class="title-phone">
                    <p>Số điện thoại khác</p>
                </div>
                <div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên đơn vị</th>
                            <th>Số nội bộ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Trạm y tế</td>
                            <td>119</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Ban quản lí chung (thầy Út)</td>
                            <td>109</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Ban quản lý góp ý sinh viên</td>
                            <td>110</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Ban quản lý thanh toán các khoản</td>
                            <td>121</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Phòng an ninh</td>
                            <td>113</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Phòng quản trị thiết bị</td>
                            <td>126</td>
                        </tr>
                        
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</main>


<?php 
    require_once 'include/footer.php';
?>
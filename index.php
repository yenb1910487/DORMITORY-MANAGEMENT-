<?php 
require_once 'include/header.php';
?>
    <main >
        <div id="container">
            <div id="toggleContainer">
                <label>Carousel</label>
                <div id="toggle">
                <div id="outer3">
                    <div id="slider3"></div>
                </div>
                <label>Tiles</label>
                </div>
            </div>
            <div id="galleryView">
                <div id="galleryContainer">
                <div id="leftView"></div>
                <button id="navLeft" class="navBtns"><i class="fas fa-arrow-left fa-3x"></i></button>
                <a id="linkTag">
                    <div id="mainView"></div>
                </a>
                <div id="rightView"></div>
                <button id="navRight" class="navBtns"><i class="fas fa-arrow-right fa-3x"></i></button>
                </div>
            </div>
            <div id="tilesView">
                <div id="tilesContainer"></div>
            </div>
        </div>
        <section class="desc">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <h3 class="text-center">Lựa chọn phòng ở phù hợp với điều kiện và nhu cầu của bạn</h3>
                    </div>
                    <div class="col-sm-8">
                        <p>Ký túc xá KTX-Dormitory trực thuộc Đại học Cần Thơ tọa lạc trên diện tích 42,08ha, với 06 tòa nhà cao tầng đáp ứng gần 3000 chỗ ở cho sinh viên, sinh viên, học viên cao học, nghiên cứu sinh (HSSV) và Lưu học sinh (LHS) nước ngoài. Phòng ở trong Ký túc xá được trang bị các trang thiết bị cần thiết cho cuộc sống: ti vi, điều hòa, bình nóng lạnh,... Chúng tôi cố gắng cung cấp đầy đủ các dịch vụ để HSSV nội trú cảm thấy hài lòng nhất. Sẽ có nhiều lựa chọn phòng ở phù hợp với nhu cầu và điều kiện của bạn.</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="container mt-4 mb-4">
            <section class="uudiem">
                <div class="text-center mb-5 box-heading">
                        <h1>ƯU ĐIỂM KTX-DORMITORY</h1>
                </div>
                <div class="row">
                    <div class="text-center col mx-4" style=" 
                    background:white;border:5px ridge;border-radius: 15px;height: 200px">
                        <div >
                            <img src="./imgs/friends.png" alt="friends">
                            <h5><b>DỄ DÀNG KẾT BẠN</b></h5>
                            <p>
                                Vì ký túc xá là phòng tập thể gồm nhiều sinh viên. Nên có thể dễ dàng kết thêm nhiều bạn mới
                            </p>
                        </div>
                        
                    </div>
                    <div class="text-center col mx-4" style="     
                    background:white;border:5px ridge;border-radius: 15px;height: 200px">
                        <div >
                            <img src="./imgs/security.png" alt="">
                            <h5><b>AN NINH TỐT</b></h5>
                            <p>
                                Hệ thống camera giám sát có mặt ở hầu hết các đường đi. Ngoài ra được bảo vệ nghiêm ngặt bởi các lực lượng an ninh.
                            </p>
                        </div>
                        
                    </div>
                    <div class="text-center col mx-4" style=" 
                    background:white;border:5px ridge;border-radius: 15px;height: 200px">
                        <div >
                            <img src="./imgs/salary.png" alt="money">
                            <h5><b>TIẾT KIỆM CHI PHÍ</b></h5>
                            <p>
                                Trung bình chi phí thuê KTX rất rẻ mấy lần so với chi phí ở trọ của sinh viên.
                            </p>
                        </div>
                        
                    </div>
                </div>
            </section>
        </div>
        <section class="thietbidichvu">
                <div class="mb-4">
                    <h3 class="text-center">TRANG THIẾT BỊ VÀ DỊCH VỤ</h3>
                    <div style="border-bottom:2px solid #FFFFFF;width:70px;margin:0 auto;"></div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="items">
                                <div class="item text-center">
                                    <i class="fa fa-user"></i><br>
                                    <a href="SHC.php">KHU VỰC SHC</a>
                                </div>
                                <div class="item text-center">
                                    <i class="fa fa-car"></i><br>
                                    <a href="nhaxe.php">NHÀ XE</a>
                                </div>
                                <div class="item text-center">
                                    <i class="fa fa-coffee"></i><br>
                                    <a href="cantin.php">CĂN TIN - COFFEE</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="items">
                                <div class="item text-center">
                                    <i class="fa fa-wifi"></i><br>
                                    <a href="wifi.php">INTERNER - WIFI</a>
                                </div>
                                <div class="item text-center">
                                    <i class="fa fa-futbol"></i><br>
                                    <a href="khuthethao.php">KHU THỂ THAO</a>
                                </div>
                                <div class="item text-center">
                                    <i class="fa fa-question"></i><br>
                                    <a href="hotrosinhvien.php">HỖ TRỢ SINH VIÊN</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="items">
                                <div class="item text-center">
                                    <i class="fa fa-recycle"></i><br>
                                    <a href="giatla.php">GIẶT LÀ</a>
                                </div>
                                <div class="item text-center">
                                    <i class="fa fa-shopping-cart"></i><br>
                                    <a href="sieuthi.php">SIÊU THỊ</a>
                                </div>
                                <div class="item text-center">
                                    <i class="fa fa-user-secret"></i><br>
                                    <a href="anninh.php">AN NINH</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        
        <section class="question">
            <div style="padding:3%">
                <div class="mb-4">
                    <h3 class="text-center">CÂU HỎI THƯỜNG GẶP</h3>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="items">
                                <h4>Các câu hỏi chung</h4>
                                <div id="accordion1">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                                            1. Tôi phải làm sao để được vào Ký túc xá ?
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="collapse" data-bs-parent="#accordion1">
                                            <div class="card-body">
                                            Để được duyệt đơn vào ở Ký túc xá (KTX), trước hết bạn phải vào đăng nhập <a href="dangnhap.php" style="color:blue;">tại đây</a> và làm theo hướng dẫn                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                                            2. Sau khi được duyệt đơn, tôi phải làm gì ? 
                                        </a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-bs-parent="#accordion1">
                                            <div class="card-body">
                                            Bạn cần đến ngay Ban Quản lý Ký túc xá để làm các thủ tục hoàn thiện hồ sơ đăng ký chỗ ở.                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">3. Tôi không phải là sinh viên của Trường, nhưng tôi muốn được ở KTX của Trường, tôi phải làm sao?
                                            </a>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-bs-parent="#accordion1">
                                            <div class="card-body">
                                            Nếu bạn là sinh viên trường ngoài, BQL Ký túc xá cũng sẽ hoan nghênh đón tiếp bạn vào ở tại KTX. Bạn sẽ phải đến gặp cán bộ BQL KTX, nhận mẫu đơn đăng ký, sau đó xin dấu xác nhận nơi bạn đang học.                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFour">
                                            4. Bạn bè, người thân của tôi muốn ở lại qua đêm thì phải làm sao
                                            </a>
                                        </div>
                                        <div id="collapseFour" class="collapse" data-bs-parent="#accordion1">
                                            <div class="card-body">
                                            Bạn phải thông báo với Ban Quản lý Ký túc xá để được hướng dẫn                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThreeFive">
                                            5. Tôi có được chọn chỗ không ?
                                            </a>
                                        </div>
                                        <div id="collapseThreeFive" class="collapse" data-bs-parent="#accordion1">
                                            <div class="card-body">
                                            Có. Bạn có thể hoàn toàn đăng ký chỗ ở theo ý muốn nếu bạn đăng ký ở sớm và lúc đó KTX còn đủ phòng ở theo nhu cầu của bạn.                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseSix">
                                            6.Khi nào tôi phải nộp đơn đăng ký ở ? 
                                            </a>
                                        </div>
                                        <div id="collapseSix" class="collapse" data-bs-parent="#accordion1">
                                            <div class="card-body">
                                            Cuối mỗi năm học, KTX sẽ có thông báo đến tất cả các bạn sinh viên nội trú về kế hoạch đăng ký chỗ ở cho năm học mới.                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="items">
                                <h4>Các câu hỏi liên quan đến hợp đồng và thanh lý hợp đồng</h4>
                                <div id="accordion1">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="btn" data-bs-toggle="collapse" href="#collapseOne1">
                                            1. Thời hạn hợp đồng của tôi bao lâu ?
                                            </a>
                                        </div>
                                        <div id="collapseOne1" class="collapse" data-bs-parent="#accordion1">
                                            <div class="card-body">
                                            Theo quy định của Trường, hợp đồng 01 năm học là 10 tháng.                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo1">
                                            2. Tôi có thể biết giá các phòng ở không ? 
                                        </a>
                                        </div>
                                        <div id="collapseTwo1" class="collapse" data-bs-parent="#accordion1">
                                            <div class="card-body">
                                            Có. Bạn truy cập vào: Bảng giá để tra tìm giá của các loại phòng ở.                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree1">
                                            3. Các khoản phí khác gồm những gì ?
                                            </a>
                                        </div>
                                        <div id="collapseThree1" class="collapse" data-bs-parent="#accordion1">
                                            <div class="card-body">
                                            Là các khoản phụ trội khi bạn sử dụng trong phòng ở, như: điện, nước, vệ sinh.                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFour1">
                                            4. Tiền cược tài sản là gì ?
                                            </a>
                                        </div>
                                        <div id="collapseFour1" class="collapse" data-bs-parent="#accordion1">
                                            <div class="card-body">
                                            Tiền cược là số tiền bạn phải đặt cược đối với các tài sản được trang bị trong phòng để đảm bảo bạn có trách nhiệm với các loại tài sản đó. Sau khi thanh toán hợp đồng, bạn sẽ được hoàn trả.                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="items">
                                <h4>Các câu hỏi liên quan đến an ninh, dịch vụ</h4>
                                <div id="accordion1">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="btn" data-bs-toggle="collapse" href="#collapseOne2">
                                            1. Tôi có được rời khỏi phòng dài ngày không ?
                                            </a>
                                        </div>
                                        <div id="collapseOne2" class="collapse" data-bs-parent="#accordion1">
                                            <div class="card-body">
                                            Có. Tuy nhiên, bạn phải báo cáo với cán bộ quản lý nhà.                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo2">
                                            2. Tôi có được tiếp khách và người thân trong phòng không ? 
                                        </a>
                                        </div>
                                        <div id="collapseTwo2" class="collapse" data-bs-parent="#accordion1">
                                            <div class="card-body">
                                            Không. Để đảm bảo an ninh trật tự, KTX chỉ cho phép tiếp khách và người thân tại khu vực sinh hoạt chung.                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree2">
                                            3. Ở trong KTX có an toàn không ?
                                            </a>
                                        </div>
                                        <div id="collapseThree2" class="collapse" data-bs-parent="#accordion1">
                                            <div class="card-body">
                                            Có. KTX đã xây dựng hàng rào xung quanh, lắp đặt camera an ninh tại các toà nhà, các khu công cộng. Ngoài ra, phòng Bảo vệ của Trường đảm nhận nhiệm vụ trực tại các cổng ra vào. Cổng chính trực 24/24.                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFour3">
                                            4. Y tế trong KTX có đảm bảo không ?
                                            </a>
                                        </div>
                                        <div id="collapseFour3" class="collapse" data-bs-parent="#accordion1">
                                            <div class="card-body">
                                            Có. Hằng ngày, từ 18h00 đến 6h00, có y tá túc trực để đảm bảo an toàn sức khỏe cho bạn và thực hiện sơ cứu ban đầu nếu có vấn đề xảy ra.                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThreeFive4">
                                            5. Khi cần, tôi nên gọi điện báo cho ai ?
                                            </a>
                                        </div>
                                        <div id="collapseThreeFive4" class="collapse" data-bs-parent="#accordion1">
                                            <div class="card-body">
                                            Bạn có thể gọi điện trực tiếp cho cán bộ quản lý nhà, hoặc đường dây nóng                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>

            </div>
        </section>
        <div class="container">
            <section class="camket">
                <div class="items">
                    <div class="item">
                        <div class="img">
                            <img src="./imgs/s1.png" alt="">
                        </div>
                        <div class="content">
                            <h2>Hoàn tiền nhanh</h2>
                            <p>Cam kết hoàn tiền nếu phòng hư hỏng</p>
                        </div>
                        
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="./imgs/s2.png" alt="">
                        </div>
                        <div class="content">
                            <h2>Ký túc xá chất lượng</h2>
                            <p>Cam kết hỗ trợ & liên hệ</p>
                        </div>
                        
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="./imgs/s3.png" alt="">
                        </div>
                        <div class="content">
                            <h2>Hỗ trợ 24/7</h2>
                            <p>Tư vấn chọn phòng phù hợp</p>
                        </div>
                        
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="./imgs/s4.png" alt="">
                        </div>
                        <div class="content">
                            <h2>Thanh toán dễ dàng</h2>
                            <p>Dễ dàng thanh toán sau khi nhận phòng</p>
                        </div>
                        
                    </div>
                </div>
            </section>
        </div>
        
        
    </main>
<?php require_once 'include/footer.php'?>
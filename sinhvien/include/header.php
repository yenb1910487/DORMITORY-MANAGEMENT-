<?php 
    require_once '../config/DB.php';
    require_once '../function/function.php';
    if(!isset($_SESSION['sinhvien'])){
        header('location: ./dangnhap.php');
    }
    $mssv = $_SESSION['sinhvien'];
    $sql = "SELECT * FROM sinhvien_chua_o where mssv = '$mssv'";
    $rows = select($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function canhbao(){
            swal({
                title: "Bạn có chắc chắn muốn rút đơn?",
                text: "Sau khi đồng ý, bạn không thể phục hồi lại được!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    
                    window.location="../sinhvien/rutdon.php";
                    
                }else{
                    swal("Thao tác đã bị hủy bỏ");
                }
            })
        }
        $(document).ready(function () {
            $("#toanha").on('input',function(){
                var gioitinh = $("input[name='gioitinh']").val();
                
                var toanha = $(this).val();
                $.ajax({
                    url: "./ajax/xulytoanha1.php",
                    type:"GET",
                    data: {toanha:toanha},
                    success:function(data){
                        $("#phong").html(data);
                    }
                })
                $.ajax({
                    url: "./ajax/xulytoanha2.php",
                    type:"GET",
                    data: {toanha:toanha,gioitinh:gioitinh},
                    success:function(data){
                        $("#xemktx").html(data);
                    }
                })                
            })
            
            $("input[name='gioitinh']").on('input',function(){
                var gioitinh = $(this).val();
                var toanha = $("#toanha").val();
                $.ajax({
                    url: "./ajax/xulygioitinh.php",
                    type:"GET",
                    data: {gioitinh:gioitinh,toanha:toanha},
                    success:function(data){
                        $("#xemktx").html(data);
                    }
                })
            })
            $("#xacnhansuachua").on('click',function(e){
                e.preventDefault();
                var tensuachua = $("#suachua").val();
                var ghichu = $("#ghichu").val();
                var soluong = $("#soluong").val();
                var idsv = $("#idsv").val();
                var idktx = $("#idktx").val();
                
                if(tensuachua == ''||soluong==''){
                    swal({
                            title: "Error",
                            text: "Nhập vào các trường bắt buộc",
                            icon: "error"
                            
                        })
                }else{

                    $.ajax({
                    url: "./ajax/xulysuachua.php",
                    type:"GET",
                    data: {tensuachua:tensuachua,ghichu:ghichu,soluong:soluong,idsv:idsv,idktx:idktx},
                    success:function(data){
                        swal({
                            title: "Success",
                            text: "Gửi thông tin sửa chữa thành công",
                            icon: "success"
                            
                        })
                        $("#body_bangphanhoi").html(data);
                        $("#form-sua-chua")[0].reset();
                    }
                })
                }
                
            })
            $("#submit_ghichu").on('click',function(e){
                e.preventDefault();
                var day = $("#nguyenvong_day").val();
                var phong = $("#nguyenvong_phong").val();
                var id_sv = <?php echo $rows['id'] ?>;
                var gioitinh = "<?php echo $rows['gioitinh'] ?>";
                if(day=='' || phong==''){
                    
                    swal({
                            title: "Error",
                            text: "Vui lòng nhập đầy đủ thông tin",
                            icon: "error"
                            
                        })
                }else{
                    $.ajax({
                        url: "./ajax/xulynguyenvong.php",
                        type:"GET",
                        data: {day:day,phong:phong,id_sv:id_sv,gioitinh:gioitinh},
                        success:function(string){
                            var getData = JSON.parse(string);
                            console.log(getData.kiemtraktx)
                            if(getData.kiemtraktx == 1){
                                swal({
                                    title: "KIỂM TRA LẠI!",
                                    text: "Dãy hoặc phòng không hợp lệ",
                                    icon: "error"  
                                })
                            }else{
                                if(getData.temp == 1){
                                    swal({
                                        title: "SUCCESS",
                                        text: "Đăng ký thành công, chờ phản hồi!",
                                        icon: "success"  
                                    })
                                    $("#mes_dky").html("");
                                }else{
                                    if(getData.temp == 2){
                                        swal({
                                            title: "SUCCESS",
                                            text: "Cập nhật lại thành công, chờ phản hồi!",
                                            icon: "success"  
                                        })
                                        $("#mes_dky").html("");
                                    }else{
                                        swal({
                                            title: "PHÒNG ĐỦ NGƯỜI",
                                            text: "Chọn phòng khác",
                                            icon: "error"   
                                        })
                                    }
                                    
                                }
                                
                            }
                        }
                    })
                }
                
            })
        })

    </script>

    <!-- CSS cua tôi -->
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        .container{
            background-color:white;
        }
        body{
            background-image:linear-gradient(to bottom, rgb(0, 159, 255, 0.5), rgb(236, 47, 75, 0.8)),
            url('https://niemvuilaptrinh.ams3.cdn.digitaloceanspaces.com/pexels-paul-ijsendoorn-33041.jpg');
            background-size: cover;
        }
        a{
            text-decoration:none;
        }
        h4{
            color: #e99714;
            font-weight:bold;
            font-size:20px;
            border-bottom:3px inset #e99714;
        }
        

        .header ul li{
            background-image: linear-gradient( #c6ffdd, #fbd786, #f7797d);
            font-weight:bold;
            border-right:none;
        }
        .header ul li a{
            color:#333333 !important;
            cursor:pointer;
        }
        .header ul li a:hover{
            color:#000000 !important;
        }
        .header p{
            display: inline;

        }
        .header .ten{
            float:right;font-weight:bold;
            
        }
        
        .header .ten span{
            color:#e99714;
            cursor: pointer;
        }
        .header .ten span:hover{
            color:#C75D00;
        }
        .tacvu ul{
            list-style-type: none;
            display: flex;
            justify-content: flex-end;
        }
        .tacvu ul li{
            margin-left: 2%;
            border: 2px solid lightgrey;
            background-color:lightgrey;
        }
        .tacvu ul li:hover{
            background-color:grey;
        }
        .tacvu ul li a{
            color: #3F0259;
            font-weight:bold;
        }
        .tacvu ul li a:hover{
            color: #AB05A6;
        }

        
        .quydinh button, .info_ktx #submit_ghichu{
            color:#3F0259;
            font-weight:bold;
            background-color:lightgrey;
            border:none;
        }
        .quydinh button:hover, .info_ktx #submit_ghichu:hover{
            color: #AB05A6;
            background-color:grey;
        }
        .info_ktx label{
            font-weight:bold;
        }
        /* Xemktx.php */
        .xemtinhtrangphong form{
            margin-left: 40%;
            padding: 1%;
        }
        .xemtinhtrangphong form select,
        .xemtinhtrangphong form input{
            margin-top:2%;
        }
        .xemtinhtrangphong form select{
            width:25%;
        }
        .xemtinhtrangphong form input{
            margin-right: 2%;
            margin-bottom:2%;
        }
        .sm{
            color: #3F0259;
            font-weight:bold;
            border: 2px solid lightgrey;
            background-color:lightgrey;
        }
        .sm:hover{
            color: #AB05A6;
            background-color:grey;
        }
        /* Keth thuc Xemktx.php */
        /* 
            KTX-DORMITORY
        */
        .ghichu {
            text-transform: uppercase;
            letter-spacing: .5em;
            display: inline-block;
            
            border-width: 4px 0;
            padding: 1.5em 0em;

            width: 40em;
            margin: 0 auto;
            
        }
  
        .tieudektx {
            
            font: 700 3em/1 "Oswald", sans-serif;
            letter-spacing: 0;
            padding: .25em 0 .325em;
            display: block;
            margin: 0 auto;
            text-shadow: 0 0 80px rgba(255,255,255,.5);

        /* Clip Background Image */

            background: url(https://i.ibb.co/RDTnNrT/animated-text-fill.png) repeat-y;
            -webkit-background-clip: text;
            background-clip: text;

        /* Animate Background Image */

            -webkit-text-fill-color: transparent;
            -webkit-animation: aitf 80s linear infinite;

        /* Activate hardware acceleration for smoother animations */

            -webkit-transform: translate3d(0,0,0);
            -webkit-backface-visibility: hidden;

        }
        

        /* Animate Background Image */

        @-webkit-keyframes aitf {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }
    </style>

</head>
<body>
    <div class="container">
        <section class="header">
            <p><a class="btn btn-primary " href="dangxuat.php">Đăng xuất</a></p>
            <p class="ten">
                <img src="/KTX/image/graduated.png" alt="logosinhvien">
                 Hi,
                 <span>
                    <?php 
                    
                    echo $rows['hoten'];
                    ?>
                 </span>
            </p>
            <div style="text-align:center;margin-top:2%;">
                <img src="/KTX/image/logo.png" alt="logo" style="width:12%;">

            </div>
            <div class="text-center" style="margin-bottom: 1%;margin-top:1%;background: #090d00; color: #efefef">
                <p class="ghichu"  style="">
                    LUÔN ĐỒNG HÀNH CÙNG BẠN
                    <span class="tieudektx">
                        KÝ TÚC XÁ - DORMITORY
                    </span>
                </p>
            </div>
            
            
            
            <ul class="list-group list-group-horizontal mb-4">
                <li class="list-group-item list-group-item-action list-group-item-light text-center"><a href="/KTX/sinhvien/xemktx.php">ĐĂNG KÝ PHÒNG</a></li>
                <li class="list-group-item list-group-item-action list-group-item-light text-center"><a href="/KTX/sinhvien/index.php">THÔNG TIN</a></li>
                <li class="list-group-item list-group-item-action list-group-item-light text-center"><a data-bs-toggle="modal" data-bs-target="#myModal" <?php
                    if($rows['kiemtra'] == 0) echo "style='pointer-events: none;cursor: default;opacity: 0.6;'";
                ?>>SỬA CHỮA CSVC</a></li>
            </ul>
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Đăng ký sửa chữa</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" method="POST" id="form-sua-chua" >
                            <div class="mb-3">
                                
                                <input type="hidden" id="idsv" value="<?php
                                    $sql ="SELECT sinhvien_da_o.id FROM `sinhvien_chua_o`,sinhvien_da_o where sinhvien_da_o.idsv = sinhvien_chua_o.id and mssv = '$mssv'";
                                    $res = mysqli_query($conn,$sql);
                                    $id = '';
                                    if($res == true){
                                        while($rows1 = mysqli_fetch_assoc($res)){
                                            $id = $rows1['id'];
                                        }
                                    }
                                    echo $id;
                                ?>" required>

                            </div>
                            <div class="mb-3">

                                <input type="hidden" id="idktx" value="<?php
                                    $sql ="SELECT sinhvien_da_o.idktx FROM `sinhvien_chua_o`,sinhvien_da_o where sinhvien_da_o.idsv = sinhvien_chua_o.id and mssv = '$mssv'";
                                    $res = mysqli_query($conn,$sql);
                                    $id = '';
                                    if($res == true){
                                        while($rows1 = mysqli_fetch_assoc($res)){
                                            $id = $rows1['idktx'];
                                        }
                                    }
                                    echo $id;
                                ?>" required>

                            </div>
                            <div class="mb-3">
                                <label for="suachua" style="width:25%;">Tên sửa chữa: </label>
                                <input type="text" name="tensuachua" id="suachua" required>
                                <img src="/KTX/image/medical.png" alt="*" style="width:2%;">
                            </div>
                            <div class="mb-3">
                                <label for="soluong" style="width:25%;">Số lượng: </label>
                                <input name="soluong" type="number" min="1" id="soluong" required>
                                <img src="/KTX/image/medical.png" alt="*" style="width:2%;">
                            </div>
                            <div class="mb-3">
                                <label for="ghichu" style="width:25%;">Ghi chú: </label>
                                <input type="text" name="ghichu" id="ghichu">
                            </div>
                            <button class="btn btn-success" id="xacnhansuachua" >Xác nhận</button>
                        </form>
                        <div class="mt-3">
                            <span>
                                <b>Ghi chú: </b>
                                Ô có dấu <img src="/KTX/image/medical.png" alt="*" style="width:2%;"> là bắt buộc
                            </span>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        
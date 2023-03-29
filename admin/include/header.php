<?php 
    require_once '../config/DB.php';
    if(!isset($_SESSION['admin'])){
        header('location: ./dangnhap.php');
    }

    function currency_format($number, $suffix = 'vnđ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
    $taikhoan = $_SESSION['admin'];
    
    $sql = "SELECT * FROM admin,nhanvien where admin.idnv = nhanvien.id and admin.taikhoan = '$taikhoan'";
    $res = mysqli_query($conn,$sql);
    $row= [];
    if(mysqli_num_rows($res) >0){
        $row = mysqli_fetch_assoc($res);
    }

    date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/KTX/css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php 
                $sql ="SELECT gioitinh,COUNT(*) as soluong
                FROM `sinhvien_da_o`,sinhvien_chua_o     where sinhvien_da_o.idsv = sinhvien_chua_o.id
                GROUP BY gioitinh";
                $res = mysqli_query($conn,$sql);
                if($res == true){
                    while($rows = mysqli_fetch_array($res)){
            ?>
            ['<?php echo $rows['gioitinh'] ?>',<?php echo $rows['soluong'] ?>],
            <?php
                    }
                }
          ?>

        ]);

        var options = {
          title: 'Thống kê sinh viên theo giới tính'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

         google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawAnnotations);
      function drawAnnotations() {
      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Time of Day');
      data.addColumn('number', 'Motivation Level');
      data.addColumn({type: 'string', role: 'annotation'});
      data.addColumn('number', 'Energy Level');
      data.addColumn({type: 'string', role: 'annotation'});

      var data = google.visualization.arrayToDataTable([
         ['Dãy', 'Số lượng'],
         <?php 
            $sql ="SELECT toanha,count(*) as soluong
            from kytucxa group by toanha";
            $res = mysqli_query($conn,$sql);
            if($res == true){
                while($rows = mysqli_fetch_assoc($res)){
        ?>
            ['<?php echo $rows['toanha'] ?>', <?php echo $rows['soluong'] ?>],
        <?php
                }
            }
         ?>

  
      ]);

      var options = {
        title: 'Thống kê số lượng phòng từng dãy',
        annotations: {
          alwaysOutside: true,
          textStyle: {
            fontSize: 20,
            
            auraColor: 'none'
          }
        },
        hAxis: {
          title: 'Tòa nhà',
          
          viewWindow: {
            min: [7, 30, 10],
            max: [17, 30, 10]
          }
        },
        vAxis: {
          title: 'Số lượng phòng'
        }
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
    
    <script id="dssv_script">
        
        function canhbao(id){
            swal({
                title: "Bạn có chắc chắn muốn xóa?",
                text: "Sau khi đồng ý, bạn không thể phục hồi lại được!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    
                    window.location="/KTX/admin/delete/xoanhanvien.php?id="+id;
                    
                }else{
                    swal("Thao tác đã bị hủy bỏ");
                }
            })
        }
        function canhbao2(id){
            swal({
                title: "Bạn có chắc chắn muốn xóa?",
                text: "Sau khi đồng ý, bạn không thể phục hồi lại được!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    
                    window.location="/KTX/admin/delete/xoadichvu.php?id="+id;
                    
                }else{
                    swal("Thao tác đã bị hủy bỏ");
                }
            })
        }
        function canhbao3(id){
            swal({
                title: "Bạn có chắc chắn muốn xóa?",
                text: "Sau khi đồng ý, bạn không thể phục hồi lại được!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    
                    window.location="/KTX/admin/delete/xoahoadon.php?id="+id;
                    
                }else{
                    swal("Thao tác đã bị hủy bỏ");
                }
            })
        }
        function canhbao4(idsv1,idktx,idsv2){
            swal({
                title: "Bạn có chắc chắn muốn xóa?",
                text: "Sau khi đồng ý, bạn không thể phục hồi lại được!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    
                    window.location="/KTX/admin/delete/xoasinhvien.php?idsv_da_o="+idsv1+"&idktx="+idktx+"&idsv_chua_o="+idsv2;
                    
                }else{
                    swal("Thao tác đã bị hủy bỏ");
                }
            })
        }
    $(document).ready(function(){   
        
        //Lọc theo khóa , ngành trong danhsachsinhvien
        $("#loc_khoa").on('input',function(e){
            var giatri = $(this).val();
            var loc_nganh = $("#loc_nganh").val();
            var loc_gioitinh = $("#loc_gioitinh").val();
            $.ajax({
                url: "./ajax/loc_khoa_dssv.php",
                type: "GET",
                data: {giatri:giatri,loc_nganh:loc_nganh,loc_gioitinh:loc_gioitinh},
                success:function(data){
                    $("#dssv").html(data);
                    $("#form_search_dssv")[0].reset();
                }
            })
        })
        $("#loc_nganh").on('input',function(e){
            var giatri = $(this).val();
            var loc_khoa = $("#loc_khoa").val();
            var loc_gioitinh = $("#loc_gioitinh").val();
            $.ajax({
                url: "./ajax/loc_nganh_dssv.php",
                type: "GET",
                data: {giatri:giatri,loc_khoa:loc_khoa,loc_gioitinh:loc_gioitinh},
                success:function(data){
                    $("#dssv").html(data);
                    $("#form_search_dssv")[0].reset();
                }
            })
        })
        $("#loc_gioitinh").on('input',function(e){
            var giatri = $(this).val();
            var loc_khoa = $("#loc_khoa").val();
            var loc_nganh = $("#loc_nganh").val();
            $.ajax({
                url: "./ajax/loc_gioitinh_dssv.php",
                type: "GET",
                data: {giatri:giatri,loc_khoa:loc_khoa,loc_nganh:loc_nganh},
                success:function(data){
                    $("#dssv").html(data);
                    $("#form_search_dssv")[0].reset();
                }
            })
        })
        // Tìm kiếm trong DSSV
        $("#search_dssv").on('input',function(){
            var giatri = $(this).val();
            $.ajax({
                url: "./ajax/search_mssv_dssv.php",
                type: "GET",
                data: {giatri:giatri},
                success:function(data){
                    $("#dssv").html(data);
                    $("#form_loc_khoa")[0].reset();
                    
                }
            })
        })
        // DSNV
            // Thêm NHân viên
        $("#them_dsnv").on('click',function(e){
            $(".edit_data").on('click',function(e){

            var idnv = $(this).attr("data-id");
            })
            e.preventDefault();
                var msnv = $("#them_msnv").val();
                var hoten = $("#them_hoten").val();
                var quequan = $("#them_quequan").val();
                var gioitinh ='';
                gioitinh = $("input[name='them_gioitinh']:checked").val();
                
                var sodienthoai = $("#them_sodienthoai").val();
                var vitri = $("#them_vitri").val();
                var luong = $("#them_luong").val();
                if(msnv == ''|| hoten==''||quequan==''||gioitinh==undefined||sodienthoai==''||vitri==''||luong==''){
                    swal({
                        title: "Error",
                        text: "Bạn phải nhập đầy đủ tất cả thông tin",
                        icon: "error"
                    });
                }
                else{
                    if(luong <= 0){
                        swal({
                            title: "Error",
                            text: "Lương phải > 0",
                            icon: "error"
                        });
                    }else{
                        $.ajax({
                        url: "./ajax/add_dsnv.php",
                        type: "GET",
                        data: {msnv:msnv,hoten:hoten,quequan:quequan,gioitinh:gioitinh,sodienthoai:sodienthoai,vitri:vitri,luong:luong},
                        success:function(string){
                           
                            var getData = JSON.parse(string);
                            if(getData.kiemtra == 0){
                                $("#dsnv").html(getData.kq);
                                editDSNV()
                                
                                swal({
                                    title: "Success",
                                    text: "Thêm nhân viên thành công rồi nè",
                                    icon: "success"
                                });
                                

                            }else{
                                swal({
                                    title: "Error",
                                    text: "Mã số nhân viên đã tồn tại",
                                    icon: "error"
                                });
                            }
                        }
                    })
                    }
                    
                }
        })
        
            // Tìm kiếm trong DSNV
            $("#search_msnv_dsnv").on('input',function(){
                var giatri = $(this).val();
                $.ajax({
                    url: "./ajax/search_msnv_dsnv.php",
                    type: "GET",
                    data: {giatri:giatri},
                    success:function(data){
                        $("#dsnv").html(data);
                        editDSNV();
                        $(".edit_data").on('click',function(e){

                        var idnv = $(this).attr("data-id");
                        
                       

                        })
                        
                    }
                })
            })   
            
            // Edit DSNV
            function editDSNV() {
                $(".edit_data").on('click',function(e){

var idnv = $(this).attr("data-id");

$.ajax({
    url: "./ajax/edit_dsnv.php",
    type: "GET",
    data: {idnv:idnv},
    success:function(string){
        
        var getData = JSON.parse(string);
    $("#modal_idnv").val(getData.idnv)
    $("#modal_msnv").val(getData.msnv);
    $("#modal_hoten").val(getData.hoten);
    $("#modal_gioitinh").val(getData.gioitinh);
    $("#modal_quequan").val(getData.quequan);
    $("#modal_vitri").val(getData.vitri);
    $("#modal_luong").val(getData.luong);
    $("#modal_sodienthoai").val(getData.sodienthoai);
    
    if(getData.gioitinh == 'Nam'){
        $( "input[name='modal_gioitinh'][value='Nam']" ).prop( "checked", true );
    }else{
        $( "input[name='modal_gioitinh'][value='Nữ']" ).prop( "checked", true );
    }
   
    }
})

})
$("#modal_capnhat").on('click',function(e){
e.preventDefault();
var idnv = $("#modal_idnv").val();
var msnv = $("#modal_msnv").val();
var hoten = $("#modal_hoten").val();
var quequan = $("#modal_quequan").val();
var gioitinh = $("input[name='modal_gioitinh']:checked").val();
var sodienthoai = $("#modal_sodienthoai").val();
var vitri = $("#modal_vitri").val();
var luong = $("#modal_luong").val();
if(msnv == '' || hoten ==''||quequan==''||gioitinh =='' ||sodienthoai==''||vitri=='' ||luong==''){
    swal({
        title: "Error",
        text: "Bạn phải nhập đầy đủ tất cả thông tin",
        icon: "error"
    });
}else{
    $.ajax({
        url: "./ajax/edit_dsnv2.php",
        type: "GET",
        data: {idnv:idnv,msnv:msnv,hoten:hoten,quequan:quequan,gioitinh:gioitinh,sodienthoai:sodienthoai,vitri:vitri,luong:luong},
        success:function(string){
            
            var getData = JSON.parse(string);
            
            if(getData.kiemtra == 1){
                swal({
                title:"Error",
                icon:"error",
                text:"Mã số nhân viên đã tồn tại rồi !"
                })
            }else{
                $("#dsnv").html(getData.kq);
                editDSNV();
                swal({
                title:"Success",
                icon:"success",
                text:"Bạn đã chỉnh sửa thông tin nhân viên thành công"
            })
            $(".edit_data").on('click',function(e){

                var idnv = $(this).attr("data-id");

                $.ajax({
                    url: "./ajax/edit_dsnv.php",
                    type: "GET",
                    data: {idnv:idnv},
                    success:function(string){
                        var getData = JSON.parse(string);
                    $("#modal_idnv").val(getData.idnv)
                    $("#modal_msnv").val(getData.msnv);
                    $("#modal_hoten").val(getData.hoten);
                    $("#modal_gioitinh").val(getData.gioitinh);
                    $("#modal_quequan").val(getData.quequan);
                    $("#modal_vitri").val(getData.vitri);
                    $("#modal_luong").val(getData.luong);
                    $("#modal_sodienthoai").val(getData.sodienthoai);
                    
                    if(getData.gioitinh == 'Nam'){
                        $( "input[name='modal_gioitinh'][value='Nam']" ).prop( "checked", true );
                    }else{
                        $( "input[name='modal_gioitinh'][value='Nữ']" ).prop( "checked", true );
                    }
                
                    }
                })

            })
            swal({
                title:"Success",
                icon:"success",
                text:"Bạn đã chỉnh sửa thông tin nhân viên thành công"
            })
            $(".edit_data").on('click',function(e){

                var idnv = $(this).attr("data-id");

                $.ajax({
                    url: "./ajax/edit_dsnv.php",
                    type: "GET",
                    data: {idnv:idnv},
                    success:function(string){
                        var getData = JSON.parse(string);
                    $("#modal_idnv").val(getData.idnv)
                    $("#modal_msnv").val(getData.msnv);
                    $("#modal_hoten").val(getData.hoten);
                    $("#modal_gioitinh").val(getData.gioitinh);
                    $("#modal_quequan").val(getData.quequan);
                    $("#modal_vitri").val(getData.vitri);
                    $("#modal_luong").val(getData.luong);
                    $("#modal_sodienthoai").val(getData.sodienthoai);
                    
                    if(getData.gioitinh == 'Nam'){
                        $( "input[name='modal_gioitinh'][value='Nam']" ).prop( "checked", true );
                    }else{
                        $( "input[name='modal_gioitinh'][value='Nữ']" ).prop( "checked", true );
                    }
                
                    }
                })

            })
            }
            
            

        }
    })
}


})  
            }
            editDSNV()
            // Sửa dữ liệu ký túc xá
            function click_edit_phong(){
                $(".edit_data_phong").on('click',function(e){
                    var id = $(this).attr("data-id");
                    $.ajax({
                        url: "./ajax/edit_kytucxa.php",
                        type: "GET",
                        data: {id:id},
                        success: function(string){
                            var getData = JSON.parse(string);
                            $("#modal_idktx").val(getData.id)
                            $("#modal_giaphong").val(getData.giaphong)
                            if(getData.tinhtrangphong == '0'){
                                $( "input[name='tinhtrangphong'][value='0']" ).prop( "checked", true );
                            }else{
                                $( "input[name='tinhtrangphong'][value='1']" ).prop( "checked", true );
                            }
                        }
                    })
                })
            }
            click_edit_phong()
            // Lưu lại modal chỉnh sửa trong ký túc xá
            function click_luu_ktx(){
                $("#modal_luu").on('click',function(e){
                    e.preventDefault()
                    var id = $("#modal_idktx").val();
                    var giaphong = $("#modal_giaphong").val();
                    var tinhtrangphong = $("input[name='tinhtrangphong']:checked").val();
                    if(giaphong == ''){
                        swal({
                            title: "Gía phòng bị bỏ trống!",
                            text: "Bạn phải nhập giá phòng.",
                            icon: "error"
                        });
                    }else{
                        if(giaphong<=0){
                            swal({
                                title: "Gía phòng phải hợp lệ!",
                                text: "Gía phòng > 0.",
                                icon: "error"
                            });
                        }else{
                            if(giaphong%1000!=0){
                                swal({
                                    title: "Gía phòng phải hợp lệ!",
                                    text: "Gía phòng phải chia hết cho 1000.",
                                    icon: "error"
                                });
                            }else{
                                $.ajax({
                                    url: "./ajax/luu_edit_ktx.php",
                                    type: "GET",
                                    data: {id:id,giaphong:giaphong,tinhtrangphong:tinhtrangphong},
                                    success: function(string){
                                        var getData = JSON.parse(string);
                                        if(getData.kiemtra==1){
                                            $("#danhsachphong").html(getData.kq);
                                            swal({
                                                title: "Success",
                                                text: "Bạn đã cập nhật thành công.",
                                                icon: "success"
                                            });
                                            view_details_ktx()
                                            click_luu_ktx()
                                            click_edit_phong()
                                            loc_tt()
                                            loc_trong()
                                            search_ktx()
                                        }
                                    }
                                })
                            }
                            
                        }
                        
                    }
                    
                })
            }
            click_luu_ktx()
            // Xem chi tiết phòng ký túc xá
            function view_details_ktx(){
                $(".view_data").on('click',function(e){
                var id = $(this).attr("data-id");
                $.ajax({
                    url: "./ajax/view_ktx.php",
                    type: "GET",
                    data: {id:id},
                    success: function(string){
                        var getData = JSON.parse(string);
                        $("#modal_sinhvien_kytucxa").html(getData.kq);
                        $("#soluongtv").html(getData.count);
                    }
                })
            })
            }
            view_details_ktx()
            function loc_tt(){
                $("#loc_tinhtrang").on('input',function(e){
                var giatri = $(this).val();
                var loc_trong = $("#loc_trong").val();
                
                    $.ajax({
                        url: "./ajax/loc_tinhtrang.php",
                        type: "GET",
                        data: {giatri:giatri,loc_trong:loc_trong},
                        success:function(data){
                            $("#danhsachphong").html(data);
                            $("#form_search_ktx")[0].reset();
                            view_details_ktx()
                            click_edit_phong()
                            click_luu_ktx()
                        }
                    })
                })
            }
            loc_tt()
            function loc_trong(){
                $("#loc_trong").on('input',function(e){
                var giatri = $(this).val();
                var loc_tinhtrang = $("#loc_tinhtrang").val();
                
                $.ajax({
                    url: "./ajax/loc_trong.php",
                    type: "GET",
                    data: {giatri:giatri,loc_tinhtrang:loc_tinhtrang},
                    success:function(data){
                        $("#danhsachphong").html(data);
                        $("#form_search_ktx")[0].reset();
                        view_details_ktx()
                        click_edit_phong()
                        click_luu_ktx()
                    }
                })
            })
            }
            loc_trong()
            function search_ktx(){
                $("#search_phongktx").on('input',function(){
                var giatri = $(this).val();
                
                
                $.ajax({
                    url: "./ajax/search_ktx.php",
                    type: "GET",
                    data: {giatri:giatri},
                    success:function(data){
                        $("#form_loc_phong")[0].reset();
                        $("#danhsachphong").html(data);
                        view_details_ktx()
                        click_edit_phong()
                        click_luu_ktx()
                        
                    }
                })
            }) 
            }
            search_ktx()
            // Hóa đơn
            $("#search_hoadon").on('input',function(){
                var giatri = $(this).val();
                
                $.ajax({
                    url: "./ajax/search_hoadon.php",
                    type: "GET",
                    data: {giatri:giatri},
                    success:function(data){
                        $("#body_hoadon").html(data);
                        check_hoadon()
                    }
                })
            })
            $("#them_hoadon").on('click',function(e){
                e.preventDefault();
                var mahoadon = $("#them_mahoadon").val();
                var idktx = $("#dangkyphong_phong").val();
                var sonuoc = $("#them_sonuoc").val();
                var sodien = $("#them_sodien").val();
                
                if(mahoadon ==''||idktx==''||sonuoc==''||sodien==''){
                    swal({
                        title: "Error",
                        text: "Bạn phải nhập đầy đủ tất cả thông tin",
                        icon: "error"
                    });
                }else{
                    if(sodien <=0 || sonuoc<=0){
                        swal({
                            title: "Warning",
                            text: "Số điện nước phải > 0",
                            icon: "warning"
                        });
                    }else{
                        $.ajax({
                            url: "./ajax/add_hoadon.php",
                            type: "GET",
                            data: {mahoadon:mahoadon,idktx:idktx,sonuoc:sonuoc,sodien:sodien},
                            success:function(string){
                                var getData = JSON.parse(string);
                                if(getData.kiemtra == 1){
                                    swal({
                                        title: "Error",
                                        text: "Mã hóa đơn đã tồn tại",
                                        icon: "error"
                                    });
                                }else{
                                    $("#body_hoadon").html(getData.kq);
                                    swal({
                                        title: "Success",
                                        text: "Thêm hóa đơn thành công",
                                        icon: "success"
                                    });
                                    check_hoadon()
                                }
                            }
                        });
                    }
                }
            })
            function check_hoadon(){
                $(".checked_hoadon").on('input',function(){
                var id_hoadon = $(this).attr('data-id');
                
                $.ajax({
                            url: "./ajax/update_thanhtoanhoadon.php",
                            type: "GET",
                            data: {id_hoadon:id_hoadon},
                            success:function(data){
                                
                            }
                        });

            }   )
            }
            check_hoadon()
            // Dich vu
            $("#them_dsdv").on('click',function(e){
            e.preventDefault();
                var madichvu = $("#them_madichvu").val();
                var tendichvu = $("#them_tendichvu").val();
                var dongia = $("#them_gia").val();

                if(madichvu == ''|| tendichvu==''||dongia==''){
                    swal({
                        title: "Error",
                        text: "Bạn phải nhập đầy đủ tất cả thông tin",
                        icon: "error"
                    });
                }
                else{
                    if(dongia <= 0){
                        swal({
                        title: "Error",
                        text: "Đơn giá phải >0",
                        icon: "error"
                    });
                    }
                    $.ajax({
                        url: "./ajax/add_dsdv.php",
                        type: "GET",
                        data: {madichvu:madichvu,tendichvu:tendichvu,dongia:dongia},
                        success:function(string){
                           
                            var getData = JSON.parse(string);
                            console.log(getData)
                            if(getData.kiemtra == 0){
                                $("#danhsachdichvu").html(getData.kq);
                                swal({
                                    title: "Success",
                                    text: "Thêm dịch vụ thành công rồi nè",
                                    icon: "success"
                                });
                                

                            }else{
                                swal({
                                    title: "Error",
                                    text: "Mã số dịch vụ đã tồn tại",
                                    icon: "error"
                                });
                            }
                        }
                    })
                }
        })
            // Tìm kiếm trong dichvu
            $("#search_dichvu").on('input',function(){
                var giatri = $(this).val();
                $.ajax({
                    url: "./ajax/search_dichvu.php",
                    type: "GET",
                    data: {giatri:giatri},
                    success:function(data){
                        
                        $("#danhsachdichvu").html(data);
                        

                        
                        
                                $(".edit_data_dichvu").on('click',function(e){

                                    var iddv = $(this).attr("data-id");

                                    $.ajax({
                                        url: "./ajax/edit_dsdv.php",
                                        type: "GET",
                                        data: {iddv:iddv},
                                        success:function(string){
                                            
                                            var getData = JSON.parse(string);
                                            $("#modal_iddichvu").val(getData.iddv);
                                        $("#modal_madichvu").val(getData.madichvu)
                                        $("#modal_tendichvu").val(getData.tendichvu);
                                        $("#modal_giadichvu").val(getData.dongia);
                                        }
                                    })

                                    })
                        
                    }
                })
            }) 


            $(".edit_data_dichvu").on('click',function(e){

                var iddv = $(this).attr("data-id");
                
                $.ajax({
                    url: "./ajax/edit_dsdv.php",
                    type: "GET",
                    data: {iddv:iddv},
                    success:function(string){
                        
                        var getData = JSON.parse(string);
                        $("#modal_iddichvu").val(getData.iddv);
                    $("#modal_madichvu").val(getData.madichvu)
                    $("#modal_tendichvu").val(getData.tendichvu);
                    $("#modal_giadichvu").val(getData.dongia);
                    }
                })

            })
            $("#modal_capnhatdichvu").on('click',function(e){
                e.preventDefault();
                var iddv = $("#modal_iddichvu").val();
                var madichvu = $("#modal_madichvu").val();
                var tendichvu = $("#modal_tendichvu").val();
                var giadichvu = $("#modal_giadichvu").val();
                
                if(iddv == '' || madichvu ==''||tendichvu==''||giadichvu ==''){
                    swal({
                        title: "Error",
                        text: "Bạn phải nhập đầy đủ tất cả thông tin",
                        icon: "error"
                    });
                }else{
                    $.ajax({
                        url: "./ajax/edit_dsdv2.php",
                        type: "GET",
                        data: {iddv:iddv,madichvu:madichvu,tendichvu:tendichvu,giadichvu:giadichvu},
                        success:function(string){
                            
                            var getData = JSON.parse(string);
                            
                            if(getData.kiemtra == 1){
                                swal({
                                title:"Error",
                                icon:"error",
                                text:"Mã số dich vu đã tồn tại rồi !"
                                })
                            }else{
                                $("#danhsachdichvu").html(getData.kq);
                                swal({
                                title:"Success",
                                icon:"success",
                                text:"Bạn đã chỉnh sửa thông tin dich vu thành công"
                            })
                            $(".edit_data_dichvu").on('click',function(e){

                                var iddv = $(this).attr("data-id");

                                $.ajax({
                                    url: "./ajax/edit_dsdv.php",
                                    type: "GET",
                                    data: {iddv:iddv},
                                    success:function(string){
                                        
                                        var getData = JSON.parse(string);
                                        $("#modal_iddichvu").val(getData.iddv);
                                    $("#modal_madichvu").val(getData.madichvu)
                                    $("#modal_tendichvu").val(getData.tendichvu);
                                    $("#modal_giadichvu").val(getData.dongia);
                                    }
                                })

                                })
                            swal({
                                title:"Success",
                                icon:"success",
                                text:"Bạn đã chỉnh sửa thông tin nhân viên thành công"
                            })
                            $(".edit_data_dichvu").on('click',function(e){

                                var iddv = $(this).attr("data-id");

                                $.ajax({
                                    url: "./ajax/edit_dsdv.php",
                                    type: "GET",
                                    data: {iddv:iddv},
                                    success:function(string){
                                        
                                        var getData = JSON.parse(string);
                                        $("#modal_iddichvu").val(getData.iddv);
                                    $("#modal_madichvu").val(getData.madichvu)
                                    $("#modal_tendichvu").val(getData.tendichvu);
                                    $("#modal_giadichvu").val(getData.dongia);
                                    }
                                })

                            })
                        }
                            
                            

                        }
                    })
                }
                

            }) 
            // Ket thuc dich vu 
        // Ajax tim dãy trong trang phan hoi CSVC.php
        function show_modal_ly_do_huy(){
            $(".ly_do_huy").on('click',function(e){
            var id = $(this).attr("data-id");
            $.ajax({
                url: "./ajax/modal_ly_do_huy.php",
                type: "GET",
                data: {id:id},
                success: function(data){

                    $("#modal_idcsvc").val(data)
                    $("#modal_lydocsvc").val("")
                    show_modal_ly_do_huy()
                    luu_ly_do()
                    xacnhan_csvc()   
                    hoantac()
                }
                })
            })
        }
        show_modal_ly_do_huy()
        function luu_ly_do(){
            $("#modal_luucsvc").on('click',function(e){
                    e.preventDefault()
                    var id = $("#modal_idcsvc").val();
                    var lydo = $("#modal_lydocsvc").val();
                    
                    if(lydo == ''){
                        swal({
                            title: "Lý do không được bỏ trống",
                            text: "Bạn phải nhập lý do hủy bỏ.",
                            icon: "error"
                        });
                    }else{
                        
                            
                                $.ajax({
                                    url: "./ajax/luu_ly_do.php",
                                    type: "GET",
                                    data: {id:id,lydo:lydo},
                                    success: function(string){
                                        var getData = JSON.parse(string);
                                        if(getData.kiemtra==1){
                                            $("#body_table_csvc").html(getData.kq);
                                            swal({
                                                title: "Success",
                                                text: "Bạn đã hủy bỏ thành công phản hồi của sinh viên",
                                                icon: "success"
                                            });
                                            
                                        }
                                        show_modal_ly_do_huy()
                                            luu_ly_do()
                                            xacnhan_csvc()
                                            hoantac()
                                    }
                                })
                            
                            
                        
                        
                    }
                    
                })
        }
        luu_ly_do()
        function tim_day(){
            $("#tim_day").on('input',function(){
            var giatri = $(this).val();
            $.ajax({
                url: "./ajax/search_CSVC.php",
                type: "GET",
                data: {giatri:giatri},
                success:function(data){
                    $("#body_table_csvc").html(data);
                    show_modal_ly_do_huy()
                    luu_ly_do()
                    xacnhan_csvc()
                    hoantac()
                }
            })
        })
        }
        tim_day()
        function xacnhan_csvc(){
            $(".xacnhan_csvc").on('click',function(e){
                e.preventDefault();
                var id = $(this).attr('data-id-1');
                
                $.ajax({
                    url: "./ajax/xacnhan_csvc.php",
                    type: "GET",
                    data: {id:id},
                    success: function(data){

                        $("#body_table_csvc").html(data);
                        show_modal_ly_do_huy()
                        luu_ly_do()
                        xacnhan_csvc()
                        hoantac()
                    }
                })

            })
        }
        xacnhan_csvc()
        function hoantac(){
            $(".hoantac").on('click',function(){
                
            var id = $(this).attr('data-id');
            $.ajax({
                url: "./ajax/hoantac_csvc.php",
                type: "GET",
                data: {id:id},
                success:function(data){
                    $("#body_table_csvc").html(data);
                    show_modal_ly_do_huy()
                    luu_ly_do()
                    xacnhan_csvc()
                    hoantac()
                }
            })
        })
        }
        hoantac()
        
        // Ket thuc tim dãy trong trang phan hồi

        // Ajax tim mssv trong trang nguyenvongktx
        $("#tim_nv_mssv").on('input',function(){
            var giatri = $(this).val();
            $.ajax({
                url: "./ajax/search_nv_mssv.php",
                type: "GET",
                data: {giatri:giatri},
                success:function(data){
                    $("#body_table_nguyenvongktx").html(data);
                    
                    huybo()
                    xacnhan()
                }
            })
        })
        // Ket thuc tim mssv trong nguyenvongktx

        // Ajax tim dãy trong trang dangkyphong
        $("#select_toanha").on('input',function(){
            var giatri = $(this).val();
            $.ajax({
                url: "./ajax/search_day.php",
                type: "GET",
                data: {giatri:giatri},
                success:function(data){
                    $("#phong_day").html(data);
                }
            })
        })
        
        $("#chuyenphong_mssv").on('input',function(){
            var idsv = $(this).val();
            
            if(idsv == ''){
                $("#dangkyphong_hoten").val("");
                $("#dangkyphong_ngaysinh").val("");
                $("#dangkyphong_gioitinh1").prop( "checked", false );
                $("#dangkyphong_gioitinh2").prop( "checked", false );
                $("#dangkyphong_sodienthoai").val("");
                $("#dangkyphong_nganhhoc").val("");
                $("#dangkyphong_lop").val("");
                $("#dangkyphong_quequan").val("");
                $("#dangkyphong_toanha").html("");
                    
            }else{
                
                $.ajax({
                url: "./ajax/search_mssv_chuyenphong.php",
                type: "GET",
                data: {idsv:idsv},
                success:function(string){
                    
                    var getData = JSON.parse(string);
                    
                    if(getData.tam == 1){
                        $("#dangkyphong_hoten").val(getData.hoten);
                        $("#dangkyphong_ngaysinh").val(getData.ngaysinh);
                    
                        if(getData.gioitinh == 'Nam'){
                            $( "#dangkyphong_gioitinh1" ).prop( "checked", true );
                        }else{
                            $( "#dangkyphong_gioitinh2" ).prop( "checked", true );
                        }

                        $("#dangkyphong_sodienthoai").val(getData.sodienthoai);
                        $("#dangkyphong_nganhhoc").val(getData.nganh);
                        $("#dangkyphong_lop").val(getData.lop);
                        $("#dangkyphong_quequan").val(getData.quequan);
                        $("#dangkyphong_toanha").html(getData.toanha);
                    }else{
                        $("#dangkyphong_hoten").val("");
                        $("#dangkyphong_ngaysinh").val("");
                        $("#dangkyphong_gioitinh1").prop( "checked", false );
                        $("#dangkyphong_gioitinh2").prop( "checked", false );
                        $("#dangkyphong_sodienthoai").val("");
                        $("#dangkyphong_nganhhoc").val("");
                        $("#dangkyphong_lop").val("");
                        $("#dangkyphong_quequan").val("");
                        $("#dangkyphong_toanha").html("");
                    }
                    

                }
                
            })
            }
            
        })


        $("#dangkyphong_mssv").on('input',function(){
            var idsv = $(this).val();
            
            if(idsv == ''){
                $("#dangkyphong_hoten").val("");
                $("#dangkyphong_ngaysinh").val("");
                $("#dangkyphong_gioitinh1").prop( "checked", false );
                $("#dangkyphong_gioitinh2").prop( "checked", false );
                $("#dangkyphong_sodienthoai").val("");
                $("#dangkyphong_nganhhoc").val("");
                $("#dangkyphong_lop").val("");
                $("#dangkyphong_quequan").val("");
                $("#dangkyphong_toanha").html("");
                    
            }else{
                
                $.ajax({
                url: "./ajax/search_mssv_dangkyphong.php",
                type: "GET",
                data: {idsv:idsv},
                success:function(string){
                    
                    var getData = JSON.parse(string);
                    
                    if(getData.tam == 1){
                        $("#dangkyphong_hoten").val(getData.hoten);
                        $("#dangkyphong_ngaysinh").val(getData.ngaysinh);
                    
                        if(getData.gioitinh == 'Nam'){
                            $( "#dangkyphong_gioitinh1" ).prop( "checked", true );
                        }else{
                            $( "#dangkyphong_gioitinh2" ).prop( "checked", true );
                        }

                        $("#dangkyphong_sodienthoai").val(getData.sodienthoai);
                        $("#dangkyphong_nganhhoc").val(getData.nganh);
                        $("#dangkyphong_lop").val(getData.lop);
                        $("#dangkyphong_quequan").val(getData.quequan);
                        $("#dangkyphong_toanha").html(getData.toanha);
                    }else{
                        $("#dangkyphong_hoten").val("");
                        $("#dangkyphong_ngaysinh").val("");
                        $("#dangkyphong_gioitinh1").prop( "checked", false );
                        $("#dangkyphong_gioitinh2").prop( "checked", false );
                        $("#dangkyphong_sodienthoai").val("");
                        $("#dangkyphong_nganhhoc").val("");
                        $("#dangkyphong_lop").val("");
                        $("#dangkyphong_quequan").val("");
                        $("#dangkyphong_toanha").html("");
                    }
                    

                }
                
            })
            }
            
        })
        $("#hoadon_toanha").on('input',function(){
            var toanha = $(this).val();

            if(toanha == ''){
                $("#dangkyphong_tienphong").val("");
                $("#dangkyphong_phong").html("<option value=''>Phòng</option>");
            }else{
                $.ajax({
                url: "./ajax/search_phong_hoadon.php",
                type: "GET",
                data: {toanha:toanha},
                success:function(string){
                    var getData = JSON.parse(string);
                    $("#dangkyphong_phong").html(getData.option);
                    $("#dangkyphong_tienphong").val(getData.gia);

                    

                }
                
            })
            }
            
        })
        $("#dangkyphong_toanha").on('input',function(){
            var toanha = $(this).val();

            if(toanha == ''){
                $("#dangkyphong_tienphong").val("");
                $("#dangkyphong_phong").html("<option value=''>Phòng</option>");
            }else{
                $.ajax({
                url: "./ajax/search_phong_dangkyphong.php",
                type: "GET",
                data: {toanha:toanha},
                success:function(string){
                    var getData = JSON.parse(string);
                    $("#dangkyphong_phong").html(getData.option);
                    $("#dangkyphong_tienphong").val(getData.gia);

                    

                }
                
            })
            }
            
        })
        function huybo(){
            $(".huybo").on('click',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id-1');
            var idktx = $(this).attr('data-id-3');
            swal({
                title: "Bạn có chắc chắn muốn hủy?",
                text: "Sau khi đồng ý, bạn không thể phục hồi lại được!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    $.ajax({
                    url: "./ajax/huy_dangkyphong.php",
                    type: "GET",
                    data: {id:id,idktx:idktx},
                    success: function(string){
                        
                        $("#body_table_nguyenvongktx").html(string);
                        xacnhan()
                        huybo()
                    }
                })
                    
                    
                }else{
                    swal("Thao tác đã bị hủy bỏ");
                }
            })     
        })
        }
        huybo()
        function xacnhan(){
            $(".xacnhan").on('click',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id-1');
            var idsv = $(this).attr('data-id-2');
            var idktx= $(this).attr('data-id-3');
            $.ajax({
                url: "./ajax/hopdong_dangkyphong.php",
                type: "GET",
                data: {id:id,idsv:idsv,idktx:idktx},
                success: function(string){
                    var getData = JSON.parse(string);
                    if(getData.kiemtraphong==1){
                        
                            swal({
                                title:"PHÒNG ĐÃ ĐẦY",
                                icon:"error",
                                text:"Vui lòng thông báo với sinh viên"
                            })
                        
                    }else{
                        if(getData.kiemtraphong==2){
                            swal({
                                title:"PHÒNG ĐANG SỬA CHỮA",
                                icon:"warning",
                                text:"Vui lòng thông báo với sinh viên"
                            })
                        }else{
                            $("#body_table_nguyenvongktx").html(getData.kq);
                            xacnhan()
                            huybo()
                        }
                        
                    }
                    
                    
                }
            })
        })
        }
        xacnhan()
        // Ket thuc tim dãy trong dangkyphong
        // Xac nhận cơ sở vật chất sửa chữa
        
        
    })
</script>

    <style>
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
    
    <script>
        $(document).ready(function(){
            $("#luumatkhau").on('click',function(e){
                e.preventDefault();
                var matkhaucu = $("#matkhaucu").val();
                var matkhaumoi = $("#matkhaumoi").val();
                var nhaplaimkmoi = $("#nhaplaimkmoi").val();
                if(matkhaucu == '' || matkhaumoi =='' || nhaplaimkmoi ==''){
                    swal({
                        title: "Error",
                        text: "Bạn phải nhập đầy đủ tất cả các trường",
                        icon: "error"
                    })
                }else{
                    $.ajax({
                        url: "./ajax/doimatkhau.php",
                        type: "POST",
                        data:{matkhaucu:matkhaucu,matkhaumoi:matkhaumoi,nhaplaimkmoi:nhaplaimkmoi},
                        success:function(data){
                            $("#mes_submitpw").html(data);
                            setTimeout(function(){
                                $("#mes_submitpw").fadeOut("slow");
                                $("#matkhaucu").val("");
                                $("#matkhaumoi").val("");
                                $("#nhaplaimkmoi").val("");
                            },3000)
                        },
                        error:function(data){
                            $("#mes_submitpw").html(data);
                        }
                    })
                }
                
            })
        

        })
                
                    
            
        
    </script>
</head>
<body>
    <div class="container">
        <div class="header">
            <p><a class="btn btn-primary " href="/KTX/dangxuat.php">Đăng xuất</a></p>
            <p class="ten">
                <img src="/KTX/image/admin.png" alt="logoadmin">
                 Hi,
                 <span>
                    <?php
                    echo $row['hoten']; ?> !
                 </span>
            </p>
            <div style="text-align:center;margin-top:2%;">
                <img src="/KTX/image/logo.png" alt="logo" style="width:12%;">

            </div>
            <div class="text-center" style="margin-bottom: 1%;margin-top:1%;background: #090d00; color: #efefef">
                <p class="ghichu"  style="">
                    CẨN THẬN - TẬN TÂM - KỸ LƯỠNG - TRÁCH NHIỆM
                    <span class="tieudektx">
                    DORMITORY  MANAGEMENT 
                    </span>
                </p>
            </div>
        </div>
        <div class="row" style="margin-top:5%;">
            <div class="col-sm-2" id="mainnav">
                <ul>
                    <li class="thefirst" >
                        <a href="#">Danh mục thông tin</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="/KTX/admin/danhsachsinhvien.php">Danh mục sinh viên</a>
                                
                            </li>
                            <li><a href="/KTX/admin/danhsachnhanvien.php">Danh mục nhân viên</a></li>
                            
                            <li><a href="/KTX/admin/danhsachdichvu.php">Danh mục dịch vụ</a></li>
                            <li><a href="/KTX/admin/danhsachphong.php">Danh mục phòng</a></li>
                            <li><a href="/KTX/admin/danhsachhoadon.php">Danh mục hóa đơn</a></li>
                            
                        </ul>
                    </li>
                    
                    <li><a href="/KTX/admin/dangkyphong.php">Duyệt nguyện vọng</a></li>
                    
                    
                    <li>
                        <a href="/KTX/admin/phanhoicsvc.php">Phản hồi CSVC</a>
                    </li>
                    <li>
                        <a href="#" >Quản trị hệ thống</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="/KTX/admin/index.php">Thông tin cá nhân</a>
                            </li>
                            <li><a href="/KTX/admin/doimatkhau.php">Đổi mật khẩu</a>
                        </ul>
                    </li>
                    <li>
                        <a href="/KTX/admin/thongke.php">Báo cáo thống kê</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-10">
                <img src="/KTX/image/shc.jpg" alt="h" width="100%" height="280px">
            </div>
        </div>
        
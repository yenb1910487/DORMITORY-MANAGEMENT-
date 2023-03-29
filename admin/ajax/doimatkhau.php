<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_POST['matkhaucu']) && isset($_POST['matkhaumoi']) && isset($_POST['nhaplaimkmoi'])){
            $taikhoan = $_SESSION['admin'];
            $sql ="SELECT * FROM admin where taikhoan='$taikhoan'";
            $run = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($run);
            $matkhauAdmin = $row['matkhau'];
            $idAdmin = $row['id'];
            $nhapmatkhaucu = $_POST['matkhaucu'];
            $nhapmatkhaumoi = $_POST['matkhaumoi'];
            $nhaplaimkmoi = $_POST['nhaplaimkmoi'];

            $nhapmatkhaucu = str_replace('\'','\\\'',$nhapmatkhaucu);
            $nhapmatkhaumoi = str_replace('\'','\\\'',$nhapmatkhaumoi);
            $nhaplaimkmoi = str_replace('\'','\\\'',$nhaplaimkmoi);
            $nhapmatkhaucu = md5($nhapmatkhaucu);
            
            if($nhapmatkhaucu == $matkhauAdmin){
                if($nhapmatkhaumoi == $nhaplaimkmoi){
                    $nhapmatkhaumoi = md5($nhapmatkhaumoi);
                    $nhaplaimkmoi = md5($nhaplaimkmoi);
                    $sql = "UPDATE admin set matkhau = '$nhapmatkhaumoi' where id = $idAdmin";
                    $run = mysqli_query($conn,$sql);
                    if($run == true){
                        echo '<script>
                        swal({
                                        title: "Success",
                                        text: "Thay đổi mật khẩu thành công",
                                        icon: "success"
                                    })
                        </script>';
                    }else{
                        echo '<script>
                        swal({
                                        title: "Error",
                                        text: "Thay đổi mật khẩu thất bại",
                                        icon: "error"
                                    })
                    </script>';
                    }
                }
                else{
                    echo '<script>
                    swal({
                                    title: "Error",
                                    text: "Mật khẩu mới và nhập lại mật khẩu mới phải giống nhau",
                                    icon: "error"
                                })
                </script>';
                }
            }
            else{
                echo '<script>
                swal({
                                title: "Error",
                                text: "Mật khẩu cũ không chính xác",
                                icon: "error"
                            })
            </script>';
            }
        }
    }else{
        header('location: ../dangnhap.php');
    }
?>
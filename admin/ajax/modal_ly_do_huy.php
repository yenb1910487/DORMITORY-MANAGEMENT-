<?php
    
    require_once '../../config/DB.php';
    if(isset($_SESSION['admin'])){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            echo $id;
        }else{

        }
    }else{
        header('location: ../dangnhap.php');
        die();
    }
?>
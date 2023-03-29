<?php 
 require_once '../config/DB.php';
    session_destroy();
    header('location: dangnhap.php');
?>
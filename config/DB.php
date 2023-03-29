<?php 
    session_start();
    $servername = 'localhost:3308';
    $hostname='root';
    $password='';
    $dbname = 'ktx1';
    $conn = mysqli_connect($servername,$hostname,$password,$dbname);
    mysqli_set_charset($conn, 'UTF8');
?>
<?php 
    require_once '../config/DB.php';
    
    // Check login
    function login($conn,$table_name,$username_field,$password_field,$username_input,$password_input){
        $password_input = md5($password_input);
        $sql = "SELECT * FROM ".$table_name." where ".$username_field." ='$username_input' and ".$password_field." ='$password_input'";
        $res = mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)> 0)
            return true;
        return false;
    }
    // Select All

    // Select One
    function select($conn,$sql){
        $res = mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){
            return mysqli_fetch_assoc($res);
        }
        return [];
    }
?>
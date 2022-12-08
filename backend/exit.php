<?php
    include "koneksi.php";
    session_start();
    mysqli_query($koneksi, 
    "update user set session_id=null, timestamp=null, device=null, login=null, ip_v4=null where id_user=$_SESSION[id]");
    session_unset();
    unset($_SESSION['user']);
    unset($_SESSION['id']);
    unset($_SESSION['aksi']);
    unset($_SESSION['level']);
    session_destroy();
    //update data pada user
    header("location:../index.html");
?>
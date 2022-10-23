<?php
    include "koneksi.php";
    $nama = $_POST['nama'];
    $pas = $_POST['pass'];
    $stat = $_POST['status'];
    $level = $_POST['level'];
    if(!$koneksi)
        die("error koneksi");
    if(mysqli_query($koneksi, "insert into user values('', '$nama', '$pas','$level','$stat')"))
        header("location:../index.html");
    else{
        echo(mysqli_error($koneksi));
        echo("nama:$nama<br />");
        echo("pass:$pas<br />");
        echo("level:$level<br />");
        echo("status:$stat<br />");
    }
    mysqli_close($koneksi);
?>
<?php
    session_start();
    //tidak ada yang login, langsung keluar saja
    $user = $_SESSION['user'];
    if(empty($user))
        header("location:../halaman/error.html?err=noLog");
        //echo("$user");
    else{
        //ada yang login, tapi check dulu usernya siapa
        if($_GET['user'] != $_SESSION['user']){
            //keluar jika bukan user yang benar
            header("location:../halaman/error.html?err=intr");
        }
    }
?>
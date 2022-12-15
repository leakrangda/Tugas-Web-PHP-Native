<?php
    include_once "koneksi.php";

    $cari = isset($_POST["cari"]) ? $_POST["cari"]:"*";
    $table = isset($_POST["table"]) ? $_POST["table"]: "user";
    $statement=null;
    $resultset=null;
    
    //untuk pencarian
    if($table == "user"){
        $statement = "select id_user, a.nama, level_id, b.nama as level, status from user a inner join level b on a.level_id = b.id_level where a.nama like '%$_POST[cari]%'";
    }else if($table=="transaksi"){
        $statement= "select id_transaksi, no_transaksi, tgl_transaksi, jenis_transaksi," . 
        "nama_barang, nama from transaksi a inner join barang b on a.barang_id = b.id_barang" .
        " inner join user c on a.user_id = c.id_user where a.tgl_transaksi between $_POST[dari] and $_POST[sampai]";
    }else if($table=="diskonbarang"){
        $field = ["id_user", "nama", "levelf_id", "level"];
        $statement= "select * from $table like $cari% or %cari";
    }else if($table=="diskonmember"){
        $field = ["id_user", "nama", "levelf_id", "level"];
        $statement = "select * from $table like $cari% or %cari";
    }else if($table=="kategori"){
        $field = ["id_user", "nama", "levelf_id", "level"];
        $statement= "select * from $table like $cari% or %cari";
    }else if($table=="level"){
        $field = ["id_user", "nama", "levelf_id", "level"];
        $statement= "select * from $table like $cari% or %cari";
    }else if($table=="barang"){
        $field = ["id_user", "nama", "levelf_id", "level"];
        $statement= "select * from $table like $cari% or %cari";
    }

    if(isset($_POST["tombol"])){
        $resultset= mysqli_query($koneksi, $statement);
    }
?>
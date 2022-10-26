<?php
    include "koneksi.php";
    $tgl = $_POST['tanggal'];
    $no = $_POST['no'];
    $jenis = $_POST['jenis'];
    $barang = $_POST['barang'];
    session_start();
    $user = $_SESSION['user'];

    $query = mysqli_query($koneksi, 
        "insert into transaksi values(default, '$tgl', '$no', '$jenis','$barang', '$user')");
    if($query)
        header("location:../halaman/berhasil.html?tipe=transaksi");
    else
        //header("location: ../halaman/error.html?err=transaksi");
        echo(mysqli_error($koneksi));
    mysqli_close($koneksi);
?>
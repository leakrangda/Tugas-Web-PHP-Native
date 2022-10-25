<?php
    include "koneksi.php";

    $nama = $_POST['nama'];
    $kode = $_POST['kode'];
    $id_kategori = $_POST['jenis'];
    $jumlah = $_POST['jml'];

    $query = mysqli_query($koneksi, 
        "insert into barang values(default, '$nama','$kode','$jumlah','$id_kategori')");
    if($query)
        header("location: ../halaman/berhasil.html?=barang");
    else
        header("location: ../halaman/error.html?=barang");
    mysqli_close($koneksi);
?>

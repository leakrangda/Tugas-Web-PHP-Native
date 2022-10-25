<?php
    include "koneksi.php";
    $nama = $_POST['nama'];
    $query = mysqli_query($koneksi, "insert into kategori values(default, '$nama')");
    if($query)
        header("location:../halaman/berhasil.html?tipe=kategori");
    else
        header("location:../halaman/error.html?err=kategori");
?>
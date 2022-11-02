<?php
include "koneksi.php";

if(!empty($_POST)){
    $diskon = $_POST['diskon'];
    $id_kategori = $_POST['kategori'];

    $statement = "insert into diskonBarang values(default, $id_kategori, $diskon)";
    $query = mysqli_query($koneksi, $statement);
    if($query)
        header("location: ../halaman/berhasil.html?tipe=diskonBarang");
    else
        header("location: ../halaman/error.html?tipe=diskonBarang");
}else{
    header("location: ../halaman/err?tipe=noData");
}
mysqli_close($koneksi);
?>
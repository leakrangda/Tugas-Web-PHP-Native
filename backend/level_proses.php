<?php
include "koneksi.php";

if(!empty($_POST)){
    $nama = $_POST['nama'];

    $statement = "insert into level values(default, $nama)";
    $query = mysqli_query($koneksi, $satement);
    if($query)
        header("location: ../halaman/berhasil.html?tipe=level");
    else
        header("location: ../halaman/err.html?tipe=level");
}else{
    header("location: ../halaman/err?tipe=noData");
}
mysqli_close($koneksi);
?>
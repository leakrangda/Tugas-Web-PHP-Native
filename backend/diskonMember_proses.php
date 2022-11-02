<?php
include "koneksi.php";

if(!empty($_POST)){
    $diskon = $_POST['diskon'];
    $id_level= $_POST['level'];

    $statement = "insert into diskonMember values(default, $id_level, $diskon)";
    $query = mysqli_query($koneksi, $statement);
    if($query)
        header("location: ../halaman/berhasil.html?tipe=diskonMember");
    else
        echo(mysqli_error());
        //header("location: ../halaman/err.html?tipe=diskonMember");
}else{
    echo(mysqli_error());
    //header("location: ../halaman/err?tipe=noData");
}
mysqli_close($koneksi);
?>
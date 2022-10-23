<?php
    $koneksi;
    if(empty($koneksi=mysqli_connect("localhost", "root", "", "keuangan")))
        echo("error menghubungkan ke database:".mysqli_connect_error());
?>
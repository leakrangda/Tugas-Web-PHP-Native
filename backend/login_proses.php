<?php   
    session_start();
    $_SESSION['aksi'] = "login";
    include "koneksi.php";
    if(empty($koneksi)){
        $_SESSION["bagian"] = "error";
        header("location:../halaman/error.html?err=koneksi");
    }
    else{
        //ambil query user
        $user = $_POST["akun"];
        if(!empty($user)){
            $hasil=mysqli_query($koneksi, "select id_user, password, level_id from user where nama='$user'");
            if(mysqli_num_rows($hasil)){
                $data = mysqli_fetch_assoc($hasil);
                if(hash('sha256', $_POST['pass'])==$data["password"]){
                    $_SESSION['id'] = $data['id_user'];
                    $_SESSION['user'] = $user;
                    $_SESSION['level'] = $data['level_id'];
                    header("location:../halaman/menu.html?user=$user&level=$data[level_id]");
                }
                else
                    header("location:../halaman/error.html?err=user");
            }
            else{
                header("location:../halaman/error.html?err=user");
            }
        }else{
            echo(mysqli_error($koneksi));
        }
    }
?>
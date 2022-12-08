<?php   
    session_start();
    include "koneksi.php";
    if(empty($koneksi)){
        header("location:../halaman/error.html?err=koneksi");
    }
    else{
        //ambil query user
        $user = $_POST["akun"];
        if(!empty($user)){
            $hasil=mysqli_query($koneksi, "select id_user, password, level_id, 
                session_id, ip_v4, device, login from user where nama='$user'");
            if(mysqli_num_rows($hasil)){
                $data = mysqli_fetch_assoc($hasil);
                if(hash('sha256', $_POST['pass'])==$data["password"]){
                    $_SESSION['aksi'] = "login";
                    $_SESSION['id'] = $data['id_user'];
                    $_SESSION['user'] = $user;
                    $_SESSION['level'] = $data['level_id'];
                    if(empty($data['session_id'])){
                        //baru login, ambil data device, ipv4, dan set login status jadi true
                        date_default_timezone_set('UTC+7');
                        $waktu = date("H:i:s");
                        $sesi = session_id();
                        $ip = $_POST['ip'];
                        $device = $_POST['device'];
                        $log = True;

                        //simpan ke database
                        $result=mysqli_query($koneksi, 
                            "update user set ip_v4='$ip', device='$device', timestamp='$waktu', 
                            session_id='$sesi', login='$log' where id_user=$data[id_user]");
                        if($result)
                                //berhasil, relocate ke menu
                                header("location:../halaman/menu.html?user=$user&level=$data[level_id]");
                        else
                            //ada masalah, langsung beri tahu kepada user
                            header("location: ../halaman/error.html?err=lainya");
                        
                    }else{
                        //user sudah login, maka jangan berikan akses lagi
                        header("location: ../halaman/error.html?err=double");
                    }
                }
                else
                    //user password salah
                    header("location:../halaman/error.html?err=password");
            }else{
                //tidak ada user dengan nama itu
                header("location:../halaman/error.html?err=user&nama=$user");
            }
        }else{
            echo(mysqli_error($koneksi));
        }
    }
?>
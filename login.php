<?php
session_start();
include 'admin/konek.php';
$error='coding error'; 
if (isset($_POST['proses'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username dan password tidak boleh kosong !";
        echo $error;
    }
else
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($koneksi,$username);
        $password = mysqli_real_escape_string($koneksi,$password);
        $query = mysqli_query($koneksi,"select * from login where password='$password' AND user='$username'");
        $rows = mysqli_num_rows($query);
        if ($rows == 1) {
            $_SESSION['login']=$username;
            header("location: admin/index.php"); 
        } else {
            $error = "Username dan password yang anda masukan salah !!!!!";

            echo $error;
        }
    }
}
?>
<a class="btn" href="index.php"> coba lagi</a> 
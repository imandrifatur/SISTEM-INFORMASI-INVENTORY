<?php
global $koneksi,$sesi;
include "config.php";
$koneksi = mysqli_connect($host,$user,$pass,$db);
$db=mysqli_select_db($koneksi,'inventori');
if(!$koneksi){
die("gagal koneksi " . mysqli_connect_error($koneksi));
}

?>
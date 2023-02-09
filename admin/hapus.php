<?php 
include 'konek.php';
$id=$_GET['id'];
mysqli_query($koneksi,"delete from daftar_barang where id='$id'");
header("location:barang.php");

?>
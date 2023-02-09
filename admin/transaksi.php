<?php
session_start();
if(!isset($_SESSION['login'])){
Header("Location:index.php");
}
include 'konek.php'; 
if(!empty($_POST['kode_transaksi'])){
    $kode = mysqli_real_escape_string($koneksi,$_POST['kode_transaksi']);
    $nama = mysqli_real_escape_string($koneksi,$_POST['nama_barang']);
    $jenis = mysqli_real_escape_string($koneksi,$_POST['jenis']);
    $untuk = mysqli_real_escape_string($koneksi,$_POST['brg_to']);
    $jumlah = mysqli_real_escape_string($koneksi,$_POST['jumlah']);
    $tanggal = date('Y-m-d');
    $q = "SELECT stock FROM daftar_barang where nama_barang='$nama'";
    $stockawal = mysqli_query($koneksi,$q);
    $stockawal = mysqli_fetch_array($stockawal);
    $stockakhir = 0;
    $stockawal = $stockawal['stock'];
    if($jenis=="Masuk")$stockakhir = $stockawal+$jumlah;
    if($jenis=="Keluar")$stockakhir = $stockawal - $jumlah;
    $q = "INSERT INTO transaksi (kode_trans,barang,jenis_trans,brg_to,jumlah_trans,tanggal) VALUES ('".strtoupper($kode)."','".strtoupper($nama)."','$jenis','$untuk','$jumlah',STR_TO_DATE('$tanggal','%Y-%m-%d'));";
    $q .= "INSERT INTO laporan_trans (kode_trans,nama_brg,jenis_trans,brg_to,jumlah_trans,stock_awal,stock_akhir,tanggal) VALUES ('".strtoupper($kode)."','".strtoupper($nama)."','$jenis','$untuk','$jumlah','$stockawal','$stockakhir',STR_TO_DATE('$tanggal','%Y-%m-%d'));";
    $q .= "UPDATE daftar_barang SET stock='$stockakhir' WHERE nama_barang='$nama';";
    mysqli_multi_query($koneksi,$q)or die("Error: ".mysqli_error($koneksi));
    header("location:laporan.php");
    echo "</div><h2>Sukses</h2>";
    echo "Berhasil di proses !<br/>";
}else{
}
?>
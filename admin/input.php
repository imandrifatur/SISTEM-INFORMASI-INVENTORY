<?php
include 'konek.php'; 
if(!empty($_POST['kode_barang'])){
    $kodebarang = $_POST["kode_barang"];
    $namabarang = $_POST["nama_barang"];
    $jenis = $_POST['jenis_brg'];
    $stock = $_POST['stock'];
    $spek = $_POST['spek_brg'];
    $satuan = $_POST['satuan_brg'];
    mysqli_query($koneksi,"INSERT INTO daftar_barang (kode,nama_barang,jenis,stock,spek,satuan) VALUES ('".strtoupper($kodebarang)."','".strtoupper($namabarang)."','$jenis','$stock','$spek','".strtoupper($satuan)."')");
       header("location:barang.php");
    echo "<script type=text/javascript>
    alert(data berhasil dimasukan)
</script>";
}else{
}
?>

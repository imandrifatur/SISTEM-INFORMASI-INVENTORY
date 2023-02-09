<!DOCTYPE html>
<html>
<body>
<?php
include 'menu.php';
?>
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
         <span class="glyphicon glyphicon-briefcase"></span> SPESIFIKASI BARANG
          </h1>
          </section>
          <br>
           <section class="content">
            <div class="row">           
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
             <div class="box-body table-responsive no-padding">
    <p><?php echo $_GET['nama_barang']; ?></p>
   
    
<?php
include 'konek.php';
$sql = "SELECT * FROM daftar_barang WHERE nama_barang='".@$_GET['nama_barang']."'";
$query = mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));
while ($r = mysqli_fetch_assoc($query)) {
?>
    <?php 
    $a = explode("-",$r['spek']);
    foreach($a as $data){
    echo $data."<br>";
    }
    ?>

<?php
}
?>
<a href="barang.php"><input type="submit" class="btn-primary" value="kembali">
</body>
</div>
</div>
</div>
</div>
</div>
</html>
<?php include 'foter.php'; ?>
<?php include "menu.php" ?>
<?php 
include 'konek.php';
session_start();
if(empty($_SESSION['login'])){
   header("location:../index.php");
  }
  ?>
<div class="content-wrapper">
 <section class="content">
 <section class="content-header">
          <h1>
            SISTEM INFORMASI PERSEDIAAN PERANGKAT KERAS KOMPUTER
          </h1>
        </section>
 <br>
 <br>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3> <?php include 'konek.php';
            $hitung= "SELECT COUNT(*) FROM daftar_barang"; 
$query = mysqli_query($koneksi, $hitung) or die (mysqli_error()); 
$row = mysqli_fetch_row($query);
echo  $row[0] ;
mysqli_free_result($query); 
mysqli_close($koneksi);; ?></h3>
                  <p>barang masuk</p>
                </div>
                <div class="icon">
                  <i class="fa fa-envelope"></i>
                </div>
                <a href="barang.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3> <?php include 'konek.php';
            $hitung= "SELECT COUNT(*) FROM laporan_trans"; 
$query = mysqli_query($koneksi, $hitung) or die (mysqli_error()); 
$row = mysqli_fetch_row($query);
echo  $row[0] ;
mysqli_free_result($query); 
mysqli_close($koneksi);; ?></h3>
                  <p>barang keluar</p>
                </div>
                <div class="icon">
                  <i class="fa fa-tag"></i>
                </div>
                <a href="laporan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
   <?php include 'foter.php'; ?>

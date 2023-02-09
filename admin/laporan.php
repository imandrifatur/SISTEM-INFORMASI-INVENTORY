<?php include 'menu.php'; ?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
         <span class="glyphicon glyphicon-pencil"></span> LAPORAN BARANG
          </h1>
          <br>
          <br>
          <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>+ ENTRY BARANG</a>
          </section>
          <br>
           <section class="content">
            <div class="row">           
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
             <div class="box-body table-responsive no-padding">
                 <a style="margin-bottom:10px" href="cetakbarang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
             <?
include 'konek.php';
$per_page=5;
$sql = "SELECT COUNT(*) as num FROM daftar_barang";
        $query=mysqli_query($koneksi,$sql)or die("Error: ".mysqli_error($koneksi));
        $total_pages = mysqli_fetch_array($query);
        $total_pages1 = ceil($total_pages['num']/10);
        $totalpage      = $total_pages1;
        $currentpage    = (isset($_GET['page']) ? $_GET['page'] : 1);
        $firstpage      = 1;
        $lastpage       = $totalpage;
        $loopcounter = ( ( ( $currentpage + 2 ) <= $lastpage ) ? ( $currentpage + 2 ) : $lastpage );
        $startCounter =  ( ( ( $currentpage - 2 ) >= 3 ) ? ( $currentpage - 2 ) : 1 );
        if($totalpage > 1)
            {
                }
 ?>
         <table class="table table-bordered table-hover table-striped">
        <th  scope="row">no</th>
        <th  scope="row">kode transaksi</th>
        <th  scope="row">Nama Barang</th>
        <th  scope="row">jenis transaksi</th>
        <th  scope="row">barang untuk</th>
        <th  scope="row">jumlah</th>
        <th  scope="row">stok awal </th>
        <th  scope="row">stok akhir </th>
        <th  scope="row">tanggal </th>
        </tr>


</div>
<?php
    $per_page=5;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        $startpoint = ($page * $per_page) - $per_page;
    }else { $startpoint = 0; }
    $sql = "SELECT * FROM laporan_trans LIMIT $startpoint,$per_page";
    $query = mysqli_query($koneksi,$sql) or die();
    $tes=mysqli_fetch_array($query);
    $tess=false;
    if($tes['kode_trans']!=NULL){
        $tess=true;
    }else{echo"<br/>Kosong";}
    mysqli_data_seek($query,0);
    $no = 0;
    if($tess==true){
        while ($row = mysqli_fetch_array($query))
        {
                $no += 1;
                echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$row['kode_trans']."</td>";
                echo "<td>".$row['nama_brg']."</td>";
                echo "<td>".$row['jenis_trans']."</td>";
                echo "<td>".$row['brg_to']."</td>";
                echo "<td>".$row['jumlah_trans']."</td>";
                echo "<td>".$row['stock_awal']."</td>";
                echo "<td>".$row['stock_akhir']."</td>";
                echo "<td>".date('d-m-Y',strtotime($row['tanggal']))."</td>";?>
                <?

        }
    }
     ?>
        </table>
<div class="container">
  <ul class="pagination">       
            <?php 
            for($x= $startCounter; $x <= $loopcounter; $x++){
                ?>
                <li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
                <?php
            }
            ?>
            <div class="modal fade" id="modal-id">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                              <form action="transaksi.php" method="post" name="form-input">
                    <legend>Form transaksi barang</legend>
                
                    <div class="form-group">
                        <label>kode barang</label>
                       <input type="text" name="kode_transaksi" class="form-control" style="text-transform:uppercase;" 
            value="<?php $sql = "SELECT COUNT(*) as num FROM transaksi";
            $query=mysqli_query($koneksi,$sql)or die("Error: ".mysqli_error($koneksi));
            $total = mysqli_fetch_array($query);
            if($total['num']>0){
                if($total['num']>1){
                    $i=$total['num'];
                }else{ $i=1;}
                echo "TR".$i;}
            else{
                echo "TR0";
            }
            ?>" readonly/>
                        </div>
                          <div class="form-group">
                        <label>Nama barang</label>
                        <select name="nama_barang" class="form-control">
<?php
$sql = "SELECT nama_barang from daftar_barang";
$result = mysqli_query($koneksi,$sql);
while ($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row['nama_barang']; ?>"><?php echo stripslashes($row['nama_barang']);?></option>
<?php
}  ?>
</select>
                        </div>
                         <div class="form-group">
                        <label>jenis</label>
                        <select name="jenis" class="form-control">
            <option value="Masuk">Masuk</option>
            <option value="Keluar">Keluar</option>
            </select></div>
             <div class="form-group">
                        <label>untuk</label>
                        <input type="text" name="brg_to" class="form-control" required="required" style="text-transform:uppercase;"/>
                        <div class="modal-footer"></div>
                         <div class="form-group">
                        <label>jumlah</label>
                        <input type="number" name="jumlah" class="form-control" required="required"/>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <input type="submit" class="btn btn-primary"  name="proses" value="Proses" />
                        </div>
                    </div>
                </div>
                </form>
            </div>
<?php 
include 'foter.php';
?>
<?php include 'menu.php'; ?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
         <span class="glyphicon glyphicon-briefcase"></span> DAFTAR BARANG
          </h1>
          <br>
          <br>
          <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>+ Tambah Barang</a>
          </section>
          <br>
           <section class="content">
            <div class="row">           
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
<?
include 'konek.php';
$per_page=5;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        $startpoint = ($page * $per_page) - $per_page;
    }else { $startpoint = 0; }
$sql = "SELECT COUNT(*) as num FROM daftar_barang";
        $query=mysqli_query($koneksi,$sql)or die("Error: ".mysqli_error($koneksi));
        $total_pages = mysqli_fetch_array($query);
        $total_pages1 = ceil($total_pages['num']/5);
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
        <th align='center' class="col-md-1">no</th>
        <th align='center' class="col-md-1">kode Barang</th>
        <th align='center' class="col-md-1">Nama Barang</th>
        <th align='center' class="col-md-1">Kategori</th>
        <th align='center' class="col-md-1">jumlah</th>
        <th align='center' class="col-md-1">Satuan</th>
        <th align='center' class="col-md-1">pilihan</th>
        </tr>
        <?php
    include "konek.php";
    $per_page=5;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        $startpoint = ($page * $per_page) - $per_page;
    }else { $startpoint = 0; }
    $sql = "SELECT * FROM daftar_barang LIMIT $startpoint,$per_page";
    $query = mysqli_query($koneksi,$sql) or die();
    $tes=mysqli_fetch_array($query);
    $tess=false;
    if($tes['nama_barang']!=NULL){
        $tess=true;
    }else{echo"<br/>Kosong";}
    mysqli_data_seek($query,0);
    $no = 0; 
    $juml = "SELECT stock FROM daftar_barang";
    $jum_=mysqli_query($koneksi,$juml)or die("Error: ".mysqli_error($koneksi));
    while ($row = mysqli_fetch_array($jum_)){
        $stock[] = $row['stock'];
    }
    if($tess==true){
        while ($row = mysqli_fetch_array($query))
        {
                $no ++;
                echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$row['kode']."</td>";
                ?>
                <td><a href="spek.php?nama_barang=<?php echo $row['nama_barang'];?>" style='text-decoration:none;color:green' >
                <?= $row['nama_barang']; ?></a></td>
                <?php
                echo "<td>".$row['jenis']."</td>";
                echo "<td>".$row['stock']."</td>";
                echo "<td>".ucfirst(strtolower($row['satuan']))."</td>";?>
                <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="glyphicon glyphicon-edit"></a>
                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ?')){ location.href='hapus.php?id=<?php echo $row['id']; ?>' }" class="glyphicon glyphicon-remove"></a>
                </td>
                <tr class="success">
                <?php
        }
        echo "<td></td><td><b>JUMLAH </b></td><td></td><td></td><td><b>".array_sum($stock)."</b></td><td></td></tr>";
    }
        ?>
</table>
 <div class="grid_3 grid_5">
  <ul class="pagination">       
            <?php 
            for($x= $startCounter; $x <= $loopcounter; $x++){
                ?>
                <li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
                <?php
            }
            ?>  
            </ul>
            </div>
            <div class="modal fade" id="modal-id">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form action="input.php" method="post" name="form-input">
                    <legend>Form input barang</legend>
                
                    <div class="form-group">
                        <label>kode barang</label>
                       <input type="text" class="form-control" name="kode_barang" placeholder="kode barang ......"  required="required">
                        </div>
                          <div class="form-group">
                        <label>Nama barang</label>
                      <input type="text" class="form-control" name="nama_barang" placeholder="nama barang ......" required="required">
                        </div>
                          <div class="form-group">
                                    <label>katagori</label>
                                <select name="jenis_brg" class="form-control">
<?php
$sql = "SELECT * FROM jenis";
$result = mysqli_query($koneksi,$sql);
while ($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row['jenis_barang']; ?>"><?php echo $row['jenis_barang'];?></option>
<?php
}  ?>
</select></div>

                                 <div class="form-group">
                                    <label>stock</label>
                                       <input type="number" class="form-control" name="stock" placeholder="jumlah barang ......" required="required" />
                                    </div>
                                    <div class="form-group">
                                    <label>spesifikasi</label>
                                    <textarea name="spek_brg" class="form-control" placeholder="spesifikasi barang ....."  required="required" /></textarea></div>
                                <div class="form-group">
                                    <label>satuan</label>
                                   <select name="satuan_brg" class="form-control">
<?php
$sql = "SELECT * FROM satuan";
$result = mysqli_query($koneksi,$sql);
while ($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row['satuan_barang']; ?>"><?php echo $row['satuan_barang'];?></option>
<?php
}  ?>
    </select></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="reset" class="btn btn-default" value="Reset">
                           <input type="submit" class="btn btn-primary" name="proses" value="Masukan" />
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <?php include 'foter.php'; ?>
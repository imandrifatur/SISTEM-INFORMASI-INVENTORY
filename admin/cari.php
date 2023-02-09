<?php include 'menu.php'; ?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h3>  SISTEM INFORMASI PERSEDIAAN PERANGKAT KERAS KOMPUTER</h3>
<h3><span class="glyphicon glyphicon-search"></span>  PENCARIAN BARANG</h3>
<br>
<br>
<?php include 'konek.php';?>
<form action="" method="post" name="postform">
  <div class="form-group">
                        <label>Dari Tanggal</label>
                         <input type="text" name="tanggal_awal" class="form-control3" /> <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" > <img src="calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a> 
                           <label>sampai tanggal</label>
                            <input type="text" name="tanggal_akhir" class="form-control3" />  <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_akhir);return false;" ><img src="calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>
                              <input type="submit" class="btn-primary" value="Pencarian Data" name="pencarian"/>
                           <input type="submit" class="btn-default" value="Reset" />
                        </div>
 </form>
        <p>
        <?php
            //proses jika sudah klik tombol pencarian data
            if(isset($_POST['pencarian'])){
            //menangkap nilai form
            $tanggal_awal=$_POST['tanggal_awal'];
            $tanggal_akhir=$_POST['tanggal_akhir'];
            if(empty($tanggal_awal) || empty($tanggal_akhir)){
            //jika data tanggal kosong
            ?>
            <script type="text/javascript" >
                  alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
                document.location='cari.php';
            </script>
            <?php
            }else{
            ?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['tanggal_awal']?></b> s/d <b><?php echo $_POST['tanggal_akhir']?></b></i>
            <?php
            $query=mysqli_query($koneksi,"select * from laporan_trans where tanggal between '$tanggal_awal' and '$tanggal_akhir'");
          }
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
        <?php
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
                ?>
<?php
            }
            ?>    
            <tr>
                <td colspan="4" align="center"> 
                <?php
                //jika pencarian data tidak ditemukan
                if(mysqli_num_rows($query)==0){
                    echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
                }
                ?>
                </td>
            </tr> 
        </table>
        <iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
    </body>
    </section>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
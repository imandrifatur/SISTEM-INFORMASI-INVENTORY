<?php include 'menu.php'; ?>
<html>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
<?php
global $values;
include 'konek.php';
session_start();
if(!empty($_POST['kode_barang'])){
$id=$_GET['id'];
$kode=$_POST['kode_barang'];
$nama=$_POST['nama_barang'];
$jenis=$_POST['jenis_brg'];
$satuan=$_POST['satuan_brg'];
$stock=$_POST['stock'];
$spek=$_POST['spek_brg'];
$sql = "UPDATE daftar_barang SET kode='$kode',nama_barang='$nama',jenis='$jenis',stock='$stock',satuan='$satuan',spek='$spek' WHERE id=$id";
mysqli_query($koneksi,$sql);
Header("Location:barang.php");
}

        $sql = "SELECT * FROM daftar_barang where id=".mysqli_real_escape_string($koneksi,$_GET['id'])."";
        $result = mysqli_query($koneksi,$sql);
         while($row = mysqli_fetch_array($result))
         {
           $values['kode'] = $row['kode'];
           $values['nama_barang'] = $row['nama_barang'];
           $values['jenis'] = $row['jenis'];
           $values['stock'] = $row['stock'];
           $values['spek'] = $row['spek'];
           $values['satuan'] = $row['satuan'];
    }
 ?>
  <div id="page-wrapper">
        <div class="col-md-12 graphs">
       <div class="xs">
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3>
<br>
<br>   
<div class="tab-content">
    <div class="tab-pane active" id="horizontal-form">
<form name="edit_data" action="#" method="post" class="form-horizontal">
<div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">kode barang</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="kode_barang" maxlength="30" required="required" class="form-control1" id="focusedinput" value="<?php echo $values['kode'] ?>"/>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">nama barang</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="nama_barang" maxlength="30" required="required" class="form-control1" id="focusedinput" value="<?php echo $values['nama_barang'] ?>"/>
                                    </div>
                                    </div>
                                      <div class="form-group">
                                    <label for="selector1" class="col-sm-2 control-label">jenis</label>
                                    <div class="col-sm-4"><select name="jenis_brg" id="selector1" class="form-control1" >
                                    <?php
$sql = "SELECT * FROM jenis";
$result = mysqli_query($koneksi,$sql);
$selected = $values['jenis'];
while ($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row['jenis_barang']; ?>" <?php if($selected == $row['jenis_barang']){echo("selected");}?>><?php echo $row['jenis_barang'];?></option>
<?php
}  ?>
</select></div></div>
<div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">stock</label>
                                    <div class="col-sm-4">
                                        <input type="number" name="stock" required="required" placeholder="jumlah...." class="form-control1" id="focusedinput" value="<?php echo $values['stock'] ?>" />
                                    </div>
                                    </div>
                                     <div class="form-group">
                                    <label for="txtarea1" class="col-sm-2 control-label">spesifikasi</label>
                                    <div class="col-sm-8"><textarea name="spek_brg" required="required" id="txtarea1" cols="50" rows="4" class="form-control1"><?php echo $values['spek'] ?> </textarea></div>
                                </div>
                                 <div class="form-group">
                                    <label for="selector1" class="col-sm-2 control-label">satuan</label>
                                    <div class="col-sm-4"><select name="satuan_brg" id="selector1" class="form-control1" >
                                    <?php
$sql = "SELECT * FROM satuan";
$result = mysqli_query($koneksi,$sql);
$selected = $values['satuan'];
while ($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row['satuan_barang']; ?>" <?php if($selected == $row['satuan_barang']){echo("selected");}?>><?php echo $row['satuan_barang'];?></option>
<?php
}  ?></select></div></div>
<div class="modal-footer">
        <a class="btn btn-warning warning_22" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a> 
        <input type="reset" class="btn btn-default" value="Reset">
           <input class="btn btn-primary" type="submit" name="proses" value="Update" />
           
            <?php include 'footer.php'; ?>
</body>
</html>
<?php include 'foter.php'; ?>
<!DOCTYPE html>
<html>
<head>
<?php 
  session_start();
  include 'cek.php';
  include 'konek.php';
  ?>
    <title>PT ANGELS PRODUCTS || INVENTORY</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" type="text/css" href="assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/datepicker/datepicker3.css">


</head>
<body class="hold-transition skin-blue sidebar-mini">
 <div class="wrapper">
   <header class="main-header">
        <!-- Logo -->
        <a class="logo">
          <span class="logo-lg"><b>PT ANGELS PRODUCTS</b></span>
        </a>
          <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">             
              <!-- User Account: style can be found in dropdown.less -->\
                <li class="dropdown user user-menu">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span><?php echo $_SESSION['login']?><i class="caret"></i></span>
                                </a>  
                               
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header bg-light-blue">
                                          <img class="thumbnail" src="../logo/ap.png">
                                        <p>
                                           USER | <?php echo $_SESSION['login']  ?>                                       <small>Welcome <?php echo $_SESSION['login']  ?> </small>
                                        </p> 
                                    </li> 
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">  
                                            <a href="loguot.php" class="btn btn-default btn-flat cmdExit">Logout</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
        </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
                <!-- Left side column. contains the logo and sidebar -->
                <aside class="left-side sidebar-offcanvas">
                <br>
                <div class="col-xs-4 col-md-12">
          <a class="thumbnail">
            <img class="img-responsive" src="../logo/ap.png">
       
                                <i class="fa fa-circle text-success"></i>
                                 <span id="oStatusOnline">Online</span></a>
          </a>
                <section class="sidebar">
                <ul class="sidebar-menu">
              <a href="index.php">
                <li  class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
              </li>
               <li>
              <a href="barang.php">
                <i class="fa fa-tag"></i> <span>Daftar Barang</span>
              </a>
            </li>
              <li>
              <a href="cari.php">
                <i class="glyphicon glyphicon-search"></i> <span>pencarian barang</span>
              </a>
            </li>        
              <li>
              <a href="laporan.php">
                <i class="glyphicon glyphicon-pencil"></i> <span>laporan barang</span>
              </a>
            </li>          
                </ul>
            </section>
        </aside>
</body>
</html>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="assets/plugins/js/jquery.min.js"></script>
<script src="assets/dist/js/app.min.js"></script>
<script src="assets/dist/js/pages/dashboard.js"></script>
<script src="assets/dist/js/demo.js"></script>

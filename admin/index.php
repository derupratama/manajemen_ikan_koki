<?php 

require '../function/koneksi.php';

if (!isset($_SESSION['idAdmin'])) {
    header("Location: ../auth/login.php");
    exit;
}

$username = $_SESSION['username'];
$name = $_SESSION['name'];
$idAdmin = $_SESSION['idAdmin'];

$admin = query("SELECT * FROM admin WHERE idAdmin = $idAdmin")[0];

if(isset($_POST['submitSetting'])) {
    $username = strtolower(trim(htmlspecialchars($_POST['username'])));
    $name = htmlspecialchars(trim($_POST['name']));
    $noHp = htmlspecialchars(trim($_POST['noHp']));
    $passwordLama = $_POST['passwordLama'];
    $passwordBaru = strtolower(trim($_POST['passwordBaru']));
    $konfirmasi = strtolower(trim($_POST['konfirmasiPassword']));

    if(!empty($passwordBaru)) {
        if($passwordBaru !== $konfirmasi) {
            echo "<script>alert('Password baru dan konfirmasi tidak sama');</script>";
            exit; 
        }
        $password = password_hash($passwordBaru, PASSWORD_DEFAULT);
    } else {
        $password = $passwordLama;
    }

    $stmt = $db->prepare("
        UPDATE admin
        SET username = :username,
            name = :name,
            password = :password,
            noHp = :noHp
        WHERE idAdmin = :idAdmin
    ");

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':noHp', $noHp);
    $stmt->bindParam(':idAdmin', $admin['idAdmin']);

    if($stmt->execute()) {
        echo "<script>alert('Data berhasil diperbarui');</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data');</script>";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kiyay Gold Fish - Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/img/logo.jpg">



  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
            
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?= $admin['username'] ?></span>
          <div class="dropdown-divider"></div>
          <button type="submit" class="dropdown-item" data-toggle="modal" data-target="#modal-setting">
            <i class="fa fa-cog"></i> Settings
          </button>
          <div class="dropdown-divider"></div>
          <a href="../auth/logout.php" class="dropdown-item">
            <i class="fa fa-power-off"></i> Logout
          </a>
          
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../assets/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Kiyay Gold Fish</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       
        <div class="info">
          <a href="#" class="d-block"><?= $admin['name'] ?></a>
        </div>
      </div>

      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php

          $pages = isset($_GET['page']) ? $_GET['page'] : 'beranda';

          ?>
        
          <li class="nav-item">
            <a href="?page=beranda" class="nav-link <?= $active = ($pages == 'beranda') ? 'active' : '' ?>" >
              <i class="fa fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
            <li class="nav-item">
              <a href="?page=jenis_daftar" class="nav-link <?= $active = ($pages == 'jenis_daftar') ? 'active' : '' ?>" >
                <i class="fa fa-tag" ></i>
                <p>
                  Jenis Ikan
                </p>
              </a>
            </li>
          <li class="nav-item">
            <a href="?page=ikan_daftar" class="nav-link <?= $active = ($pages == 'ikan_daftar') ? 'active' : '' ?>">
              <i class="fa fa-window-restore"></i>
              <p>
                Data Ikan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=penjualan_daftar" class="nav-link <?= $active = ($pages == 'penjualan_daftar') ? 'active' : '' ?>">
             <i class="fa fa-shopping-cart"></i>
              <p>
                Penjualan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=penjualan_history" class="nav-link <?= $active = ($pages == 'penjualan_history') ? 'active' : '' ?>">
             <i class="fa fa-shopping-cart"></i>
              <p>
                Histori Penjualan
              </p>
            </a>
         <li class="nav-item">
            <a href="?page=rating_daftar" class="nav-link <?= ($pages == 'rating_daftar') ? 'active' : '' ?>">
               <i class="nav-icon fas fa-star"></i>
               <p>Rating</p>
            </a>
        </li>
          <li class="nav-item">
            <a href="../auth/logout.php" class="nav-link">
              <i class="fa fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <?php
  
  require $pages . '.php';

  ?>
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2025 <a href="https://adminlte.io">Kiyay Gold Fish</a>.</strong>
    Solusi Ikan Mas Koki Premium Anda..
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Modal Setting -->
   <div class="modal fade" id="modal-setting">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Setting Akun</h4>
              <button type="button" class="close" data-dismiss="modal">
                  <span>&times;</span>
              </button>
          </div>

          <form method="post">
          <div class="modal-body">

              
                        
              <div class="form-group">
                  <label for="name">Nama Lengkap</label>
                  <input type="text" name="name" value="<?= $admin['name'] ?>" class="form-control" id="name">
              </div>

              <div class="form-group">
                  <label for="username">username</label>
                  <input type="text" name="username" value="<?= $admin['username'] ?>" class="form-control" id="username">
              </div>

              <div class="form-group">
                  <label for="passwordBaru">Password</label>
                  <input type="hidden" name="passwordLama" value="<?= $admin['password'] ?>">
                  <input type="password" name="passwordBaru" class="form-control" id="passwordBaru">
              </div>

              <div class="form-group">
                  <label for="konfirmasi">Konfirmasi Password</label>
                  <input type="password" name="konfirmasiPassword" class="form-control" id="konfirmasi" placeholder="Isi hanya jika ingin mengganti password">
              </div>
              
              <div class="form-group">
                  <label for="noHp">No WA</label>
                  <input type="text" name="noHp" value="<?= $admin['noHp'] ?>" class="form-control" id="noHp">
                  <sub>Note* No. diawali dengan 62..</sub>
              </div>


          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="submitSetting" class="btn btn-primary">Simpan Perubahan</button>
          </div>
          </form>

      </div>
      </div>
</div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../plugins/jszip/jszip.min.js"></script>
  <script src="../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/js/pages/dashboard.js"></script>
<?php

require 'modal.php';

?>
</body>
</html>

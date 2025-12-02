<?php
require '../function/koneksi.php';

if (isset($_POST['login'])) {

    $username = strtolower(trim($_POST['username'])) ?? '';
    $password = strtolower(trim($_POST['password'])) ?? '';

    if ($username === '' || $password === '') {
        $error = "Harap isi semua field!";
    } else {

        $stmt = $db->prepare("SELECT idAdmin, username, name, password FROM admin WHERE username = ?");
        $stmt->bindValue(1, $username, SQLITE3_TEXT);

        $result = $stmt->execute();
        $user = $result->fetchArray(SQLITE3_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {

                $_SESSION['idAdmin']  = $user['idAdmin'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['name']     = $user['name'];

                header("Location: ../admin/");
                exit;
            } else {
                $error = "Password salah!";
            }
        } else {
            $error = "Username tidak ditemukan!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kiyay Goldfish - Login Admin</title>
  <link rel="icon" type="image/jpeg" href="../assets/img/logo.jpg">


  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a><b>Admin</b></a>
  </div>

  <div class="card">
    <div class="card-body login-card-body">

      <p class="login-box-msg">Sign in to start your session</p>

      <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
      <?php endif; ?>

      <form method="post">

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>

      </form>

    </div>
  </div>
</div>

<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/adminlte.min.js"></script>

</body>
</html>

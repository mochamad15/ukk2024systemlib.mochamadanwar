<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>UKK PERPUS 2024 | Log in</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= urlTo('/public/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- sweetalert2 -->
  <link rel="stylesheet" type="text/css" href="<?= urlTo('/public/adminlte/plugins/sweetalert2/sweetalert2.css'); ?>">
</head>

<body class="hold-transition login-page">
    <div class="wrapper">
    <form action="<?= urlTo('/login/login'); ?>" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" class="form-control" name="Username" placeholder= "Username" required>
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input type="password" class="form-control" name="Password" placeholder= "Password" required>
                <i class="bx bxs-lock-alt"></i>
            </div>
           <div class="remember-forgot">
            <label><input type="checkbox"> Remember me</label>
           </div>

           <button type="submit" class="btn">Login</button>

           <div class="register-link">
            <p>Belum Mempunyai Akun? <a href="<?= urlTo('/login/register'); ?>" >Register</a></p>

           </div>

        </form>
    </div>
<!-- /.login-box -->
<!-- sweetalert2 -->
<script src="<?= urlTo('/public/adminlte/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
<!-- jQuery -->
<script src="<?= urlTo('/public/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= urlTo('/public/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= urlTo('/public/adminlte/js/adminlte.min.js'); ?>"></script>  
  <?php if (isset($_COOKIE['alert'])): ?>
  <?php $data = unserialize($_COOKIE['alert']); ?>
  <script>
    Swal.fire({
      title: "<?= $data[1]; ?>",
      icon: "<?= $data[0]; ?>",
      showConfirmButton: false,
      timer:2000
    });
  </script>
<?php endif ?>
</body>
</html>

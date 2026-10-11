<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>AdminLTE 3 | Log in</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
<?php
if (!empty($psn)) {
    echo "<script>alert('" . $psn . "');</script>";
}
?>
  <div class="login-logo"><a href="#"><b>Admin</b>LTE</a></div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      
      <form action="<?= base_url('?url=Login_C/CekLogin') ?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
          <div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>
        </div>
        <div class="row">
          <div class="col-8"><div class="icheck-primary"><input type="checkbox" id="remember"><label for="remember">Remember Me</label></div></div>
          <div class="col-4"><button type="submit" class="btn btn-primary btn-block">Sign In</button></div>
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary"><i class="fab fa-facebook mr-2"></i> Sign in using Facebook</a>
        <a href="#" class="btn btn-block btn-danger"><i class="fab fa-google-plus mr-2"></i> Sign in using Google+</a>
      </div>
      <p class="mb-1"><a href="#">I forgot my password</a></p>
      <p class="mb-0"><a href="#">Register a new membership</a></p>
    </div>
  </div>
</div>
</body>
</html>
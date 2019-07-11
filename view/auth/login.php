<?php

  session_start();
  if(isset($_SESSION['status'])){
    if($_SESSION['status']==1){
      header("location:/tb_pbd_icha/view/");
    }else{
      session_destroy();
    }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tugas Besar PBD Icha | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/tb_pbd_icha/editor/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/tb_pbd_icha/editor/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/tb_pbd_icha/editor/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/tb_pbd_icha/editor/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/tb_pbd_icha/editor/plugins/iCheck/square/blue.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition login-page">
      <div class="login-box">
        <div class="login-logo">
          <a href="#"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
          <p class="login-box-msg">Sign in to start your session</p>

          <form action="/tb_pbd_icha/controller/auth/login.php" method="post">
            <div class="form-group has-feedback">
              <input name="username" type="text" class="form-control" placeholder="Username">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input name="password" type="password" class="form-control" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-8">

              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>
        <!-- /.login-box-body -->
      </div>
      <!-- /.login-box -->
      <!-- jQuery 3 -->
      <script src="/tb_pbd_icha/editor/bower_components/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="/tb_pbd_icha/editor/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- iCheck -->
      <script src="/tb_pbd_icha/editor/plugins/iCheck/icheck.min.js"></script>
      <script>
        $(function () {
          $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
          });
        });
      </script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
      <script type="text/javascript">
          toastr.options.progressBar = true;
          <?php
            if(isset($_SESSION['pesan'])){
              $pesan = $_SESSION['pesan'];
              if(count($pesan)>0){
                for ($i=0; $i < count($pesan); $i++) {
          ?>
                  <?php if($pesan[$i][0]=='eror'){ ?>
                    toastr.error("<?php echo $pesan[$i][1] ?>", 'Eror', {timeOut: 5000});
                  <?php } ?>
          <?php
                }
              }
              $_SESSION['pesan'] = [];
            }
          ?>
      </script>
  </body>
</html>

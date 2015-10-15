<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Admin | Log in</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="<?php echo base_url('assets/backend/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <!-- Font Awesome Icons -->
  <link href="<?php echo base_url('assets/backend/Font-Awesome-master/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
  <!-- Ionicons -->
  <link href="<?php echo base_url('assets/backend/ionicons/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css">
  <!-- Theme style -->
  <link href="<?php echo base_url('assets/backend/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css">
  <!-- iCheck -->
  <link href="<?php echo base_url('assets/backend/plugins/iCheck/square/blue.css'); ?>" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
      </head>
      <body class="login-page">
        <div class="login-box">
          <div class="login-logo">
            <a href="#"><b>ADMIN</b></a>
          </div><!-- /.login-logo -->
          <div class="login-box-body">
            <p class="login-box-msg">Silahkan Login</p>
            <form name="login" action="<?php echo base_url('dashboard/auth/login'); ?>" method="POST">
              <div class="form-group has-feedback">
                <input name="username" type="text" class="form-control" placeholder="User Name"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input name="password" type="password" class="form-control" placeholder="Password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-xs-4 pull-right">
                  <button type="submit" class="btn btn-primary btn-block btn-flat ">Sign In</button>
                </div><!-- /.col -->
              </div>
            </form>
          </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/backend/plugins/jQuery/jQuery-2.1.3.min.js') ?>" type="text/javascript"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/backend/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/backend/plugins/iCheck/icheck.min.js'); ?>" rel="stylesheet" type="text/css" />

        <script>
        $(function () {
          $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
        });
        </script>
      </body>
      </html>
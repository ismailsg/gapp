
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> linventaire </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css'); ?>" >
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo site_url('assets/dist/css/AdminLTE.min.css'); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo site_url('assets/plugins/iCheck/square/blue.css'); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="" style="margin-left:165px;">
        <!--<img src="<?php //echo site_url('assets/myimg/icon.png'); ?> "width="200" height="150" />  <!-- width="160" height="160" -->
        <!-- <h6>Gestion des demandes des op</h6> -->
      </div>
      <div class="login-box-body" style="margin-top:20px;">

        <form id="form_login">

          <div class="alert hidden" id="alert_error_login">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span id="span_error_login"></span><strong> !</strong> 
          </div>

          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Pseudo" id="Login" name="Login">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Mot de passe" id="Mdp" name="Mdp">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
               <!--  <label>
                  <input type="checkbox"> Remember Me
                </label> -->
              </div>
            </div><!-- /.col -->
            <div class="col-xs-12">
              <button type="button" class="btn btn-warning btn-block btn-flat" onclick="Connect()">Connecter</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">

        </div><!-- /.social-auth-links -->

       <!--  <a href="#">Mot de passe oublier !</a><br> -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo site_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo site_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo site_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>

    <script src="<?php echo site_url('assets/myjs/login.js'); ?>"></script>

    <script>
      /*$(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });*/
    </script>
  </body>
</html>

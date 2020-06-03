<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SYSTEM INFORMASI PENGELOLAAN BARANG INVENTARIS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  
    <a><b><?php echo $log;?></b></a>
    
 
  
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo $login;?></p>
     <p class="login-box-msg"><img align="center" width="150" src="<?php echo base_url()?>assets/images/logo.jpg" /></p>
    

    <form action="<?php echo base_url()?>index.php/login/getlogin" method="post">
      <div class="form-group has-feedback">
        <input type="text" id="uu" name="uu" required class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="pp" name="pp" required class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
           
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
   
    <?php
															 $info=$this->session->flashdata('info');
															 if(!empty($info))
															 {
														echo '<i class="red">'.$info.'</i>';
																 
																 
																 }
															?>
    </div>
    <!-- /.social-auth-links -->
<li>JL. Hos Cokroaminoto Kawasan Bisnis CBD Blok A3 No. 19 Karang Tengah,Tangerang15157
</li>
<li>  Telp 021-7319597</li>
<li>Email 1 gp.mandiri@yahoo.com</li>
<li>Email 2 gepe_em@yahoo.com</li>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  $(document).bind("contextmenu",function(e) {
    e.preventDefault();
});
</script>

</body>
</html>

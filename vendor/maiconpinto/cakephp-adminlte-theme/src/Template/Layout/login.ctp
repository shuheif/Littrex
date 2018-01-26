<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo isset($theme['title']) ? $theme['title'] : 'AdminLTE 2 | Log in'; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <?php echo $this->Html->css('AdminLTE./bootstrap/css/bootstrap'); ?>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
  <!-- iCheck -->
  <?php echo $this->Html->css('AdminLTE./plugins/iCheck/square/blue'); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="login-page" style="">

  <div class="row">
    <div class="col-md-6" >
      <a href="http://littrex.com">
        <img height=100 width=250 style="margin-left: auto; margin-right: auto;" src="http://littrex.com/img/Littrex_Logo.png"><img>
      </a>
    </div>
  </div>

  <div class="login-box" style="font-size: 16px; border-radius: .28571429rem;
    box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;">
    <!-- /.login-logo -->
    <div class="login-box-body">
      <h3 class="login-box-msg"><?php echo __('Sign in to start learning') ?></h3>
      <p> <?php echo $this->Flash->render(); ?> </p>
      <!-- <p> <?php echo $this->Flash->render('auth'); ?> </p> -->

      <?php echo $this->fetch('content'); ?>

      <?php
      if (isset($theme['login']['show_remember']) && $theme['login']['show_remember']) {
      ?>
      <a href="#"><?php echo __('I forgot my password') ?></a><br>
      <?php
    }
    if (isset($theme['login']['show_register']) && $theme['login']['show_register']) {
    ?>
    <a href="#" class="text-center"><?php echo __('Register a new membership') ?></a>
    <?php
  }
  ?>

</div>
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<?php echo $this->Html->script('/plugins/jQuery/jQuery-2.1.4.min'); ?>
<!-- Bootstrap 3.3.5 -->
<?php echo $this->Html->script('/bootstrap/js/bootstrap'); ?>
<!-- iCheck -->
<?php echo $this->Html->script('/plugins/iCheck/icheck.min'); ?>
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

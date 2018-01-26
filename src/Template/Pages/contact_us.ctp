<?php
$this->layout = false;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Littrex: Learning Management System</title>
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

<body style="" height: 100%;">
  <nav class="navbar navbar-inverse navbar-static-top" style="height: 75px; font-size: 16px;">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://littrex.com"><img height=50px src="http://littrex.com/img/Littrex_Logo.png" alt="Littrex">
        </a>
      </div>
      <div id="navbar3" class="navbar-collapse collapse" style="margin-top: 10px;">
        <ul class="nav navbar-nav navbar-right">
          <li class="menu-item"><a href="http://littrex.com">Home</a></li>
          <li><a href="http://littrex.com/pages/what_is_littrex">What's Littrex</a></li>
          <li class="menu-item"><a href="http://littrex.com/pages/about_us">About Us</a></li>
          <li class="menu-item"><a href="http://littrex.com/pages/contact_us">Contact Us</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
  <div class="container">
   <div class="col-md-6 col-md-offset-3" style="background-color: white; border-radius: .28571429rem;
    box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;">
     <div style="text-align: center;">
      <h1> Have question about Littrex?</h1>
      <h2> We are here to help </h2>
    </div>
    <form role="form" style="margin-top: 30px;">
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label>Your Questions</label>
          <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
        </div>
        <!-- /.box-body --> 
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <div style="text-align: center;">
       <h4><strong>Phone number: </strong></h4>
       <h4>608-372-3245</h4>
       <h4><strong>Address: </strong></h4>
       <h4>700 College Street Beloit, WI 535511</h4>
     </div>
   </div>
 </div>
</body>
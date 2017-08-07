
<?php echo $this->Html->css('http://fonts.googleapis.com/css?family=Roboto:400,100,300,500'); ?>
<?php echo $this->Html->css("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"); ?>
<?php echo $this->Html->css('/font-awesome/css/font-awesome.min.css'); ?>
<?php echo $this->Html->css('form-elements.css'); ?>
<?php echo $this->Html->css('style.css'); ?>
<?php echo $this->Html->script("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"); ?>
<?php echo $this->Html->script('jquery-1.11.1.min.js'); ?>
<?php echo $this->Html->script('jquery.backstretch.min.js'); ?>
<?php echo $this->Html->script('scripts.js'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Littrex: Learning Management System</title>
</head>
    <body>
        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="row">
                    <div>
                      <div class="example3">
                        <nav class="navbar navbar-inverse navbar-static-top">
                          <div class="container">
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                              <a class="navbar-brand" href="http://disputebills.com"><img src="http://via.placeholder.com/350x150" alt="Dispute Bills">
                              </a>
                            </div>
                            <div id="navbar3" class="navbar-collapse collapse">
                              <ul class="nav navbar-nav navbar-right">
                                <li class="menu-item"><a href="http://littrex.com">Home</a></li>
                                <li class="menu-item"><a href="http://littrex.com/pages/about_us">About Us</a></li>
                                <li class="menu-item"><a href="http://littrex.com/pages/contact_us">Contact Us</a></li>
                              </ul>
                            </div>
                            <!--/.nav-collapse -->
                          </div>
                          <!--/.container-fluid -->
                        </nav>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Login to Littrex</h3>
                                    <p>Enter your email and password to log on:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <?= $this->Form->create('User') ?>
                                <form role="form" action="/littrex/users/login" method="post" class="login-form">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Email</label>
                                        <input type="text" name="email" placeholder="Email..." class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                    </div>
                                    <button type="submit" class="btn">Sign in!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                            <h3>...or login with:</h3>
                            <div class="social-login-buttons">
                                <a class="btn btn-link-1 btn-link-1-facebook" href="#">
                                    <i class="fa fa-facebook"></i> Facebook
                                </a>
                                <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                                    <i class="fa fa-twitter"></i> Twitter
                                </a>
                                <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                                    <i class="fa fa-google-plus"></i> Google Plus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
    </body>
</html>

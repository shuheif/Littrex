<?php
$this->layout = false;
echo $this->Html->css('http://fonts.googleapis.com/css?family=Roboto:400,100,300,500');
echo $this->Html->css('style.css');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Littrex: Learning Management System</title>
  <meta name="description" content="Littrex: Learning Management System" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- amCharts javascript sources -->
  <script type="text/javascript" src="https://www.amcharts.com/lib/3/ammap.js"></script>

  <style>
  #map {
   width:100%;
   height:700px !important;
 }
 .navbar-brand {
  padding: 0px;
}
nav.navbar.navbar-inverse.navbar-static-top {
  margin-bottom: 0px;
}
body{
  font-family: 'Roboto', sans-serif;
  font-size: 14px;
  font-weight: 300;
  background-color: white !important;
}

h2 {
  padding-bottom: 0px;
  margin-bottom: 0px;
}

p{
  padding-bottom: 0px;
  margin-bottom: 0px;
}

html {
    font-family: Lato, 'Helvetica Neue', Arial, Helvetica, sans-serif;
    font-size: 14px;
}

h5 {
    font-size: 1.28571429em;
    font-weight: 700;
    line-height: 1.2857em;
    margin: 0;
}

.card {
    font-size: 1em;
    overflow: hidden;
    padding: 0;
    border: none;
    border-radius: .28571429rem;
    box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
}

.card-block {
    font-size: 1em;
    position: relative;
    margin: 0;
    padding: 1em;
    border: none;
    border-top: 1px solid rgba(34, 36, 38, .1);
    box-shadow: none;
}

.card-img-top {
    display: block;
    width: 100%;
    height: auto;
}

.card-title {
    font-size: 1.28571429em;
    font-weight: 700;
    line-height: 1.2857em;
}

.card-text {
    clear: both;
    margin-top: .5em;
    color: rgba(0, 0, 0, .68);
}

.card-footer {
    font-size: 1em;
    position: static;
    top: 0;
    left: 0;
    max-width: 100%;
    padding: .75em 1em;
    color: rgba(0, 0, 0, .4);
    border-top: 1px solid rgba(0, 0, 0, .05) !important;
    background: #fff;
}

.card-inverse .btn {
    border: 1px solid rgba(0, 0, 0, .05);
}

.profile {
    position: absolute;
    top: -12px;
    display: inline-block;
    overflow: hidden;
    box-sizing: border-box;
    width: 25px;
    height: 25px;
    margin: 0;
    border: 1px solid #fff;
    border-radius: 50%;
}

.profile-avatar {
    display: block;
    width: 100%;
    height: auto;
    border-radius: 50%;
}

.profile-inline {
    position: relative;
    top: 0;
    display: inline-block;
}

.profile-inline ~ .card-title {
    display: inline-block;
    margin-left: 4px;
    vertical-align: top;
}

.text-bold {
    font-weight: 700;
}

.meta {
    font-size: 1em;
    color: rgba(0, 0, 0, .4);
}

.meta a {
    text-decoration: none;
    color: rgba(0, 0, 0, .4);
}

.meta a:hover {
    color: rgba(0, 0, 0, .87);
}
</style>
</head>
<body>
  <div class="row">
    <div>
      <div class="example3">
        <nav class="navbar navbar-inverse navbar-static-top" style="height: 75px">
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
            <div id="navbar3" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class=""><a href="http://littrex.com">Home</a></li>
                <li><a href="http://littrex.com/pages/what_is_littrex">What's Littrex</a></li>
                <li><a href="http://littrex.com/pages/about_us">About Us</a></li>
                <li><a href="http://littrex.com/pages/contact_us">Contact Us</a></li>
              </ul>
            </div>
            <!--/.nav-collapse -->
          </div>
          <!--/.container-fluid -->
        </nav>
      </div>
    </div>
  </div>
  <div class="container" style="background-color: white; margin-top: 50px">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
        <div class="card">
          <img class="card-img-top" src="http://littrex.com/img/portrait/hoodish.jpg">
          <div class="card-block">
            <h4 class="card-title">CEO: Hoodish Domun</h4>
            <div class="meta">
              <a href="mailto:hoodish.domun@littrex.com">hoodish.domun@littrex.com</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
        <div class="card">
          <img class="card-img-top" src="http://littrex.com/img/portrait/phuong.jpg">
          <div class="card-block">
            <h4 class="card-title">CIO: Phuong Bui</h4>
            <div class="meta">
              <a href="mailto:phuong.bui@littrex.com">phuong.bui@littrex.com</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
        <div class="card">
          <img class="card-img-top" src="http://littrex.com/img/portrait/shuhei.jpg">
          <div class="card-block">
            <h4 class="card-title">CTO: Shuhei Fujita</h4>
            <div class="meta">
              <a href="mailto:shuhei.fujita@littrex.com">shuhei.fujita@littrex.com</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
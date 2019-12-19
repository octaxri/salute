<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIPAS | Login</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
    <meta property="og:url" content="http://demo.madebytilde.com/elephant">
    <meta property="og:type" content="website">
    <meta property="og:title" content="The fastest way to build Modern Admin APPS for any platform, browser, or device.">
    <meta property="og:description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
    <meta property="og:image" content="http://demo.madebytilde.com/elephant.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@madebytilde">
    <meta name="twitter:creator" content="@madebytilde">
    <meta name="twitter:title" content="The fastest way to build Modern Admin APPS for any platform, browser, or device.">
    <meta name="twitter:description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
    <meta name="twitter:image" content="http://demo.madebytilde.com/elephant.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>assets/admin/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/admin/logo.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/admin/logo.png" sizes="16x16">
    <link rel="manifest" href="<?= base_url(); ?>assets/admin/manifest.json">
    <link rel="mask-icon" href="<?= base_url(); ?>assets/admin/safari-pinned-tab.svg" color="#0288d1">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/vendor.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/elephant.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/login-3.min.css">
  </head>
  <body>
    <div class="login">
    <?= $this->session->flashdata('message');?>
      <div class="login-body">
        <a class="login-brand" href="#">
          <img class="img-responsive" src="<?= base_url(); ?>assets/admin/img/logo.png" width="90%">
        </a>
        <h3 class="login-heading">Sign in</h3>
        <div class="login-form">
          <form method="post">
            <div class="md-form-group md-label-floating">
              <input class="md-form-control" type="text" name="username" spellcheck="false" autocomplete="off" data-msg-required="Please enter your username." required>
              <label class="md-control-label">Username / Email</label>
            </div>
            <div class="md-form-group md-label-floating">
              <input class="md-form-control" type="password" name="password" minlength="3" data-msg-minlength="Password must be 3 characters or more." data-msg-required="Please enter your password." required>
              <label class="md-control-label">Password</label>
            </div>
            <div class="md-form-group md-custom-controls">
              <label class="custom-control custom-control-primary custom-checkbox">
                <input class="custom-control-input" type="checkbox" checked="checked">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-label">Keep me signed in</span>
              </label>
              <span aria-hidden="true"> · </span>
              <a href="<?= base_url(); ?>auth/forgotPassword">Forgot password?</a>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
          </form>
        </div>
      </div>
      <div class="login-footer">
        Don't have an account? <a href="<?= base_url(); ?>auth/signup">Sign Up</a>
      </div>
    </div>
    <script src="<?= base_url(); ?>assets/admin/js/vendor.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/js/elephant.min.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
    </script>
  </body>
</html>
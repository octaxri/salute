<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SALUT | Pendaftaran Peserta</title>
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
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/admin/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/admin/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?= base_url(); ?>assets/admin/manifest.json">
    <link rel="mask-icon" href="<?= base_url(); ?>assets/admin/safari-pinned-tab.svg" color="#0288d1">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/vendor.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/elephant.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/signup-3.min.css">
  </head>
  <body>
    <div class="signup">
    <?= $this->session->flashdata('message');?>
      <div class="signup-body">
        <a class="signup-brand" href="index.html">
        <img class="img-responsive" src="<?= base_url(); ?>assets/admin/img/logo.png" width="90%">
        </a>
        <p class="signup-heading">
          <em>Pendaftaran peserta Sistem Aplikasi Evaluasi Pelatihan Online</em>
        </p>
        <h3 class="signup-heading">Sign up</h3>
        <div class="signup-form">
          <form data-toggle="md-validator" method="post">
            <div class="row">
              <div class="col-sm-12">
                <div class="md-form-group md-label-floating">
                  <input class="md-form-control" type="text" name="nama" spellcheck="false" autocomplete="off"required>
                  <label class="md-control-label">Nama</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="md-form-group md-label-floating">
                  <input class="md-form-control" type="email" name="email" spellcheck="false" autocomplete="off" data-msg-required="Please enter your email address." required>
                  <small class="form-text text-danger"><?= form_error('email');?></small>
                  <label class="md-control-label">Email</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="md-form-group md-label-floating">
                  <input class="md-form-control" type="text" name="username" spellcheck="false" autocomplete="off"required>
                  <small class="form-text text-danger"><?= form_error('username');?></small>
                  <label class="md-control-label">Username</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="md-form-group md-label-floating">
                  <input class="md-form-control" type="password" name="password1" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                  <small class="form-text text-danger"><?= form_error('password1');?></small>
                  <label class="md-control-label">Password</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="md-form-group md-label-floating">
                  <input class="md-form-control" type="password" name="password2" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                  <small class="form-text text-danger"><?= form_error('password2');?></small>
                  <label class="md-control-label">Retype Password</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <div class="md-form-group">
                  <select class="md-form-control" name="jk" data-msg-required="Please indicate your gender." required>
                    <option value="" disabled="disabled" selected="selected">Jenis Kelamin</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                  </select>
                  <label class="md-control-label"></label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="md-form-group md-label-floating">
                  <input class="md-form-control" type="number" name="usia" spellcheck="false" autocomplete="off"required>
                  <label class="md-control-label">Usia</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <div class="md-form-group">
                  <select class="md-form-control" name="tipe_peserta" data-msg-required="Please select your type." required>
                    <option value="" disabled="disabled" selected="selected">Tipe Peserta</option>
                    <option value="Menginap">Menginap</option>
                    <option value="Pulang">Pulang</option>
                  </select>
                  <label class="md-control-label"></label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <div class="md-form-group">
                  <select class="md-form-control" name="pendidikan" data-msg-required="Please select your education." required>
                    <option value="" disabled="disabled" selected="selected">Pendidikan</option>
                    <option value="SD">SD</option>
                    <option value="SMP/SLTP">SMP/SLTP</option>
                    <option value="SMA/SMK/SLTA">SMA/SMK/SLTA</option>
                    <option value="DIPLOMA">DIPLOMA</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                  </select>
                  <label class="md-control-label"></label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="md-form-group md-label-floating">
                  <input class="md-form-control" type="text" name="pekerjaan" spellcheck="false" autocomplete="off"required>
                  <label class="md-control-label">Pekerjaan</label>
                </div>
              </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Sign up</button>
          </form>
        </div>
      </div>
      <div class="signup-footer">
        Already have an account? <a href="<?= base_url(); ?>auth">Log in</a>
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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?= $title; ?></title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="icon" href="<?= base_url('assets/');  ?>assets/img/t.png" type="image/x-icon" />

  <!-- Fonts and icons -->
  <script src="<?= base_url('assets/');  ?>assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        "families": ["Lato:300,400,700,900"]
      },
      custom: {
        "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
        urls: ['<?= base_url('assets/');  ?>assets/css/fonts.min.css']
      },
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <style type="text/css">
    .auto-scroll {
      display: block;
      padding: 5px;
      margin-top: 5px;
      height: 400px;
      overflow: auto;
    }

    /* #style-1::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      border-radius: 10px;
      background-color: #F5F5F5;
    }

    #style-1::-webkit-scrollbar {
      width: 12px;
      background-color: #F5F5F5;
    }

    #style-1::-webkit-scrollbar-thumb {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
      background-color: #555;
    } */
  </style>

  <!-- CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/');  ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/');  ?>assets/css/atlantis.css">
  <link rel="stylesheet" href="<?= base_url('assets/');  ?>assets/css/jquery-ui.css">

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="<?= base_url('assets/');  ?>assets/css/demo.css">
</head>

<body>
  <script src="<?= base_url('assets/'); ?>assets/ckeditor/ckeditor.js"></script>
  <div class="wrapper">
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/dashboard.css'); ?>" rel="stylesheet">
    <!--Add Custom CSS here-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <!-- Begin Page Content -->
  <body>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">INPUT PESANAN</h1>

        </div>
        <div class="row">
          <div class="coL-lg-8">
            <ul class="nav nav-tabs"style="background-color:#FFFFFF">
              <li><a href="#">Makanan</a></li>
              <li><a href="#">Minuman</a></li>
            </ul>
          </div>
        <div class="row">
          <div class="coL-lg-4">
            <h5>Rincian Pesanan</h5>
            <table class="table table-borderless" align="right" style="background-color: #FFFFFF" id="myTable">
              <thead>
                <tr>
                  <td>No.</td>
                  <td>No Order</td>
                  <td>Nama Menu</td>
                  <td>Jumlah</td>
                  <td>Harga</td>
                  <td>Sub Total</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
            <a type="button" class="btn btn-outline-secondary" id="submit_pemesanan">Submit Pemesanan</a>
        </div>
    </div>
</html>

   
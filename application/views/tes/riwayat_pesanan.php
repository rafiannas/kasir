<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/DataTables/datatables.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/DataTables/datatables.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?php echo base_url('assets/js/vendor/holder.min.js'); ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js'); ?>"></script>
    <script src="<?php echo base_url('assets/DataTables/datatables.js'); ?>"></script>
    <script src="<?php echo base_url('assets/DataTables/datatables.min.js'); ?>"></script>
  </head>
       <!-- Begin Page Content -->
  <div class="container-fluid">
      <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Pesanan</h1>

    </div>
    <!-- Content Row -->
    <div class="content">
        <form action="" method="POST">
          <label style="margin-left: 0px"> Periode Tahun : </label>
          <input type ="year" name="periode_tahun">
          <label style="margin-left: 25px"> Sampai Tahun : </label>
          <input type ="year" name="sampai_tahun">
          <input style="margin-left: 20px"type="submit" name="simpan" value="Search">
        </form>
    </div>
    <div class="table" id='riwayat_pesanan'>
        <table class="table table-borderless" style="background-color: #FFFFFF" id="myTable">
          <thead>
            <tr>
                <th style="text-align:center">No.</th>
                <th style="text-align:center">No Pesanan</th>
                <th style="text-align:center">Tanggal</th>
                <th style="text-align:center">Karyawan</th>
                <th style="text-align:center">Status</th>
                <th style="text-align:center">Action</th>
            </tr>
          </thead>
        </table>
    </div>
  </div>
</html>
    <script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
  } );
  </script>
    <!-- End of Main Content -->
  <?php include 'template/header.php'; ?>

  <body>

      <?php include 'template/nav_header.php'; ?>
      <div class="container">
          <h1 align="center">Auto Komplete</h1>
          <div class="col-md-4" style="margin: 0 auto;">
              <label class="control-label">Nim Mahasiswa</label>
              <input type="text" name="title" id="title" placeholder="Masukan Nim Mahasiswa" class="form-control">
              <label class="control-label">Nama Mahasiswa</label>
              <input type="text" name="nama_mahasiswa" placeholder="Nama Mahasiswa" class="form-control">
          </div>
      </div>
      <?php include 'template/mahasiswa_input_modal.php'; ?>
  </body>
  <?php include 'template/footer.php'; ?>

  <script>
      $(document).ready(function() {
          $("#title").autocomplete({
              source: "<?php echo site_url('C_autocomplete/get_autocomplete') ?>",

              select: function(event, ui) {
                  $('[name="title"]').val(ui.item.label);
                  $('[name="nama_mahasiswa"]').val(ui.item.nama_mahasiswa);

              }
          });
      });
  </script>
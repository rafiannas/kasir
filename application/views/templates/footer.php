<!-- footer -->
</div>
<!--   Core JS Files   -->
<script src="<?= base_url('assets/');  ?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery-3.3.1.js ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/');  ?>assets/js/core/popper.min.js"></script>
<script src="<?= base_url('assets/');  ?>assets/js/core/bootstrap.min.js"></script>
<script src="<?= base_url() . 'assets/js/jquery-ui.js' ?>" type="text/javascript"></script>

<!-- jQuery UI -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url('assets/');  ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- Bootstrap Toggle -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/datatables/datatables.min.js"></script>
<script src="<?= base_url('assets/');  ?>assets/js/tabel.js"></script>
<script src="<?= base_url('assets/');  ?>assets/js/select.js"></script>
<script src="<?= base_url('assets/');  ?>assets/js/tabel2.js"></script>

<!-- Bootstrap Notify
<script src="<?= base_url('assets/');  ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> -->

<!-- jQuery Vector Maps -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/');  ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Google Maps Plugin -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Dropzone -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/dropzone/dropzone.min.js"></script>

<!-- Fullcalendar -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/fullcalendar/fullcalendar.min.js"></script>

<!-- DateTimePicker -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

<!-- Bootstrap Tagsinput -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

<!-- Bootstrap Wizard -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>

<!-- jQuery Validation -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>

<!-- Summernote -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/summernote/summernote-bs4.min.js"></script>

<!-- Select2 -->
<script src="<?= base_url('assets/'); ?>assets/js/plugin/select2/select2.full.min.js"></script>
<script src="<?= base_url('assets/'); ?>assets/js/form_validation.js"></script>

<!-- Sweet Alert -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url('assets/');  ?>assets/js/alert.js"></script>

<!-- Owl Carousel -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/owl-carousel/owl.carousel.min.js"></script>

<!-- Magnific Popup -->
<script src="<?= base_url('assets/');  ?>assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Atlantis JS -->
<script src="<?= base_url('assets/');  ?>assets/js/atlantis.min.js"></script>

<!-- Menu JS -->
<script src="<?= base_url('assets/'); ?>assets/js/menu.js"></script>

<!-- Format Rupiah JS -->
<script src="<?= base_url('assets/'); ?>assets/js/format_rupiah.js"></script>

<!-- Banner JS -->
<script src="<?= base_url('assets/'); ?>assets/js/banner.js"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="<?= base_url('assets/');  ?>assets/js/setting-demo2.js"></script>
<script src="<?= base_url('assets/');  ?>assets/js/demo.js"></script>

<!-- <script type="text/javascript">
		$(document).ready(function() {

			$('#title').autocomplete({
				source: "<?php echo site_url('blog/get_autocomplete'); ?>",

				select: function(event, ui) {
					$('[name="title"]').val(ui.item.label);
					$('[name="description"]').val(ui.item.description);
					$('[name="tambahan"]').val(ui.item.tambahan);
				}
			});

		});
	</script> -->

<script>
  $(document).ready(function() {
    $('#basic2').change(function() {
      var id_obat = $('#basic2').val();
      if (id_obat != '') {
        $.ajax({
          url: "<?= base_url() . 'admin/fetch_hargaobat'; ?>",
          method: "POST",
          data: {
            id_obat: id_obat
          },
          success: function(data) {
            $('#hargabeli').html(data);
          }
        })
      } else {
        $('#kabupaten').html('<option value="">Pilih Kota/Kabupaten</option>');
        $('#kecamatan').html('<option value="">Pilih Kecamatan</option>');
        $('#kelurahan').html('<option value="">Pilih Kelurahan</option>');
      }
    });
    $('#kabupaten').change(function() {
      var id_kab = $('#kabupaten').val();
      if (id_kab != '') {
        $.ajax({
          url: "<?= base_url() . 'alamat/fetch_kecamatan'; ?>",
          method: "POST",
          data: {
            id_kab: id_kab
          },
          success: function(data) {
            $('#kecamatan').html(data);

          }
        })
      } else {
        $('#kecamatan').html('<option value="">Pilih Kecamatan</option>');
        $('#kelurahan').html('<option value="">Pilih Kelurahan</option>');
      }
    });
    $('#kecamatan').change(function() {
      var id_kec = $('#kecamatan').val();
      if (id_kec != '') {
        $.ajax({
          url: "<?= base_url() . 'alamat/fetch_kelurahan'; ?>",
          method: "POST",
          data: {
            id_kec: id_kec
          },
          success: function(data) {
            $('#kelurahan').html(data);
          }
        })
      }
    });

  });
</script>

<script>
  Circles.create({
    id: 'circles-1',
    radius: 45,
    value: <?= $toko['jmh']; ?>,
    maxValue: 1000,
    width: 7,
    text: <?= $toko['jmh']; ?>,
    colors: ['#f1f1f1', '#FF9E27'],
    duration: 400,
    wrpClass: 'circles-wrp',
    textClass: 'circles-text',
    styleWrapper: true,
    styleText: true
  })

  Circles.create({
    id: 'circles-2',
    radius: 45,
    value: <?= $user['jmh']; ?>,
    maxValue: 1000,
    width: 7,
    text: <?= $user['jmh']; ?>,
    colors: ['#f1f1f1', '#2BB930'],
    duration: 400,
    wrpClass: 'circles-wrp',
    textClass: 'circles-text',
    styleWrapper: true,
    styleText: true
  })

  Circles.create({
    id: 'circles-3',
    radius: 45,
    value: <?= $sa['jmh']; ?>,
    maxValue: 1000,
    width: 7,
    text: <?= $sa['jmh']; ?>,
    colors: ['#f1f1f1', '#F25961'],
    duration: 400,
    wrpClass: 'circles-wrp',
    textClass: 'circles-text',
    styleWrapper: true,
    styleText: true
  })

  var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');
  //"Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Ming"
  var mytotalIncomeChart = new Chart(totalIncomeChart, {
    type: 'bar',
    data: {
      labels: [<?php
                if (count($statistik) > 0) {
                  foreach ($statistik as $data) {
                    $hasil = $data['hari'];
                    echo "\"$hasil\",";
                  }
                }
                ?>],
      datasets: [{
        label: "Total Pendapatan",
        backgroundColor: '#ff9e27',
        borderColor: 'rgb(23, 125, 255)',
        data: [<?php
                if (count($statistik) > 0) {
                  foreach ($statistik as $data) {
                    echo $data['pendapatan'] . ", ";
                  }
                }
                ?>],
      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        display: false,
      },
      scales: {
        yAxes: [{
          ticks: {
            display: false //this will remove only the label
          },
          gridLines: {
            drawBorder: false,
            display: false
          }
        }],
        xAxes: [{
          gridLines: {
            drawBorder: false,
            display: false
          }
        }]
      },
    }
  });
</script>

<script>
  var timeout = 3000; // in miliseconds (3*1000)
  $('.tutup').delay(timeout).fadeOut(300);

  $('#birth').datetimepicker({
    format: 'MM/DD/YYYY'
  });

  /* validate */

  // validation when select change
  $("#state").change(function() {
    $(this).valid();
  })

  // validation when inputfile change
  $("#uploadImg").on("change", function() {
    $(this).parent('form').validate();
  })

  $("#exampleValidation").validate({
    validClass: "success",
    rules: {
      gender: {
        required: true
      },
      confirmpassword: {
        equalTo: "#password"
      },
      birth: {
        date: true
      },
      uploadImg: {
        required: true,
      },
    },
    highlight: function(element) {
      $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function(element) {
      $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    },
  });
</script>

<script>
  // This will create a single gallery from all elements that have class "gallery-item"
  $('.image-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    removalDelay: 300,
    gallery: {
      enabled: true,
    },
    mainClass: 'mfp-with-zoom',
    zoom: {
      enabled: true,
      duration: 300,
      easing: 'ease-in-out',
      opener: function(openerElement) {
        return openerElement.is('img') ? openerElement : openerElement.find('img');
      }
    }
  });
</script>


<!-- <script>
  // nampilin nama file saat edit photo
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });

  //ajax, setting role
  $('.form-check-input').on('click', function() {

        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
          url: "<?= base_url('admin/changeaccess');  ?>",
          type: 'post',
          data: {
            menuId: menuId,
            roleId: roleId,
            success: function() {
              document.location.href = "<?= base_url('admin/roleaccess/'); ?> " + roleId;
            });
        });
</script> -->


</body>

</html>

<script type="text/javascript">
  $(document).ready(function() {

    $("#obat").autocomplete({
      source: "<?= base_url('admin/get_autocomplete'); ?>",

      select: function(event, ui) {
        $('[name="obat"]').val(ui.item.label);
        $('[name="harga_beli"]').val(ui.item.harga_beli);
        $('[name="satuan"]').val(ui.item.id_satuan);
      }
    });
  });
</script>
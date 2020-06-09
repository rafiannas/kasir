    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">SERVER</h1><br>
        <div class="container-fluid">


            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Pesanan</h6>
                </div>
                <div class="card-body">
                    <!-- <h2 id="refresh"><?= var_dump($riwayatPesanan); ?></h2> -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah Pesanan</th>
                                    <th>Total Harga</th>
                                    <th>Server</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($riwayatPesanan as $rp) : ?>
                                    <tr>

                                        <td><?= $i; ?></td>
                                        <?php $tgl = $rp['tanggal']; ?>
                                        <!-- <td><?php echo date($tgl, "d-m-Y H:i:s"); ?></td> -->
                                        <td><?= $rp['tanggal']; ?></td>
                                        <td><?= $rp['jumlah_pesanan']; ?></td>
                                        <td>Rp. <?= number_format($rp['total_harga']); ?></td>
                                        <td><?= $rp['nama']; ?></td>

                                        <td><a href="<?= base_url('server/s_detail') ?>/<?= $rp['id']; ?>" class="btn btn-primary btn-circle"><i class="fas fa-fw fa-info"></i></a></td>
                                    </tr>
                                <?php $i += 1;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->



    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>

    <script>
        setInterval(function() {
            $.ajax({
                url: "<?= base_url("server/cek_status_masak"); ?>",
                type: "POST",
                dataType: "json",
                data: {},
                success: function(data) {
                    $("refresh").html(data.cek);
                    console.log(data.cek);
                    //console.log(data.cek['jmh']);
                },
                error: function() {
                    console.log("gagal");
                }
            })

        }, 2000)
    </script>

    <!-- <script type="text/javascript">
        var auto_refresh = setInterval(
            function() {
                //$('#refresh').load('refresh.php').fadeIn("slow");

                console.log("okee");
            }, 3000); // refresh setiap 10000 milliseconds
    </script>  -->
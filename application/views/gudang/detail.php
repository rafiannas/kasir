    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">Detail</h1><br>
    </div>

    <div class="container-fluid">
        <h4 class="m-0 font-weight-bold text-primary"> Penganggung Jawab : <?= $bahan['nama']; ?></h4>
        <br>
        <h5 class="m-0 font-weight-bold text-secondary ">Tanggal : <?= $bahan['tgl']; ?></h5>
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow mb-8">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>Nama Bahan</th>
                                        <th>Jumlah Beli</th>
                                        <th>Harga Beli</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    $ttl = 0;
                                    foreach ($listBahan as $rp) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $rp['nama_bahan']; ?></td>
                                            <td><?= $rp['jumlah']; ?></td>
                                            <td>Rp. <?= number_format($rp['harga']);
                                                    $ttl += $rp['harga']; ?></td>

                                        </tr>
                                    <?php $i += 1;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <h3 class="m-0 font-weight-bold text-primary">Total : Rp. <?= number_format($ttl); ?> </h3>
                        <br>
                        <h5>Catatan : <?= $bahan['Catatan']; ?></h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div> <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
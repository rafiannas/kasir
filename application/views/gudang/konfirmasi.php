    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">Konfirmasi</h1><br>
    </div>

    <div class="container-fluid">
        <form action="<?= base_url('gudang/konfirmasi'); ?>" method="post">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="judul" class="m-0 font-weight-bold text-primary">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required autofocus>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <div class="form-group">
                        <label for="catatan" class="m-0 font-weight-bold text-primary">Catatan</label>
                        <input type="text" class="form-control" id="catatan" name="catatan" placeholder="Catatan">
                    </div>
                    <div class="card shadow mb-10">
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
                                                <td> <?= $rp['jumlah']; ?></td>
                                                <td>Rp. <?= number_format($rp['harga']);
                                                        $ttl += $rp['harga']; ?></td>

                                            </tr>
                                        <?php $i += 1;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <h3 class="m-0 font-weight-bold text-primary">Total : Rp. <?= number_format($ttl); ?> </h3>
                            <button type="submit" class="btn btn-primary mt-2" style="margin-left: 48%" href="<?= base_url('gudang/konfirmasi');  ?>">Oke</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    </div>
    </div> <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
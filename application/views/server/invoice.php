    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">Cetak Invoice</h1><br>


        <h1>Konfirmasi</h1>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">


                    <br>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            $ttl = 0;
                            foreach ($rinci as $k) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $k['nama_menu']; ?></td>
                                    <td><?= $k['jumlah']; ?></td>
                                    <td>Rp.<?= number_format($k['harga']); ?></td>
                                    <?php $tot = $k['harga'] * $k['jumlah'];
                                    $ttl += $tot; ?>
                                    <td>Rp.<?= number_format($tot); ?></td>
                                </tr>
                            <?php $i += 1;
                            endforeach; ?>

                        </tbody>
                    </table>
                    <th class="ml-3">Total ...</th>
                    <th><b>Rp. <?= number_format($ttl); ?></b></th>
                    <br><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a target="_blank" rel="nofollow" class="btn btn-primary" href="<?= base_url('Invoice'); ?>">Cetak Invoice</a>
                </div>
            </div>


        </div>
    </div>

    </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <h1>Detail Pesanan</h1>
        <h3>Kasir : <?= $pesanan['nama']; ?></h3>
        <br>

    </div>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6>Tanggal Pembelian</h6>
                            <h6 class="m-0 font-weight-bold text-primary"><?= $pesanan['tanggal']; ?></h6>
                        </div>
                        <div class="card-body">
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
                            <h5><a target="_blank" rel="nofollow"  href="<?= base_url('Invoice'); ?>">Cetak Invoice</a></h5>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

    </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
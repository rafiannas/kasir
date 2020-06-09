    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">SERVER</h1><br>


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
                            foreach ($konfirm as $k) :
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
                <div class="col-md-6">
                    <form action="<?= base_url('Server/cek'); ?>" method="post">
                        <span style="margin-left: 41%"><b>Uang Pembayaran</b></span>
                        <input type="number" class="form-control form-control-user" name="bayar" id="bayar" value="<?= $pesan['uang_bayar']; ?>"><br>

                        <button type="submit" class="btn btn-warning btn-user btn-block">
                            Cek
                        </button>
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="<?= base_url('Server/konfirmasi'); ?>" method="post">
                        <input type="hidden" name="hid" id="hid" value="<?= $pesan['id']; ?>">
                        <span style="margin-left: 41%"><b>Uang Kembalian</b></span>
                        <p type="number" class="form-control form-control-user" name="kembali" id="kembali" readonly><?= number_format($pesan['uang_kembali']); ?></p>

                        <button type="submit" class="btn btn-primary btn-user btn-block" style="margin-top: 4.5%;">
                            Pesan
                        </button>
                    </form>
                </div>
            </div>


        </div>
    </div>

    </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
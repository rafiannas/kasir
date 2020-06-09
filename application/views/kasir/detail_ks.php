    <!-- Begin Page Content -->
    <div class="container-fluid">

        <h1>Detail Pesanan</h1>

        <h2><?= $dipilih['atas_nama']; ?></h2>
        <br>
    </div>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
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
                    <?php if ($dipilih['id_status'] == 2) : ?>

                        <form action="" method="post">
                            <input type="hidden" id="id_p" name="id_p" value="<?= $dipilih['id']; ?>">
                            <div class="row">
                                <div class="col-md-5 ml-3">
                                    <div class="form-group">
                                        <label for="">Status Bayar</label>
                                        <select class="form-control" name="status2" id="status2">
                                            <?php foreach ($pilihan2 as $p) : ?>
                                                <?php if ($p['keterangan'] == $dipilih['keterangan']) : ?>
                                                    <option value="<?= $dipilih['id']; ?>" selected><?= $dipilih['keterangan']; ?> </option>
                                                <?php elseif ($p['keterangan'] == "menunggu server") : ?>
                                                    <option value="<?= $p['id']; ?>" hidden><?= $p['keterangan']; ?> </option>
                                                <?php else : ?>
                                                    <option value="<?= $p['id']; ?>"><?= $p['keterangan']; ?> </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary ml-3">Oke</button>

                                </div>
                            </div>
                        </form>
                        <br>
                        <form action="<?= base_url('kasih/cek_kembalian'); ?>">
                            <input type="number" placeholder="Uang Pembayaran">

                            <input type="number" placeholder="kembalian" required readonly>
                            <button type="submit">cek</button>
                        </form>
                    <?php endif; ?>

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
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-7">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Daftar Pembelian Obat</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama Obat</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total (Rp)</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0;
                                        $all = 0; ?>
                                        <?php foreach ($rincian_pembelian as $rp) : ?>
                                            <tr>
                                                <td><?= $rp['obat']; ?></td>
                                                <td><?= number_format($rp['harga']); ?></td>
                                                <td><?= $rp['jumlah']; ?></td>
                                                <?php $total = $rp['harga'] * $rp['jumlah']; ?>
                                                <?php $all += $total; ?>
                                                <td><?= number_format($total); ?></td>

                                            </tr>
                                        <?php endforeach; ?>

                                        <tr>
                                            <td colspan="3" align="right"><strong>Total </strong></td>
                                            <td><strong><?= number_format($all); ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="right"><strong>PPN (10%)</strong></td>
                                            <?php $ppn = $all * 0.1 ?>
                                            <td><strong><?= number_format($ppn); ?></strong></td>
                                        </tr>

                                        <tr>
                                            <td colspan="3" align="right"><strong>Total Harga</strong></td>
                                            <?php $ppn = $all * 0.1 ?>
                                            <td><strong><?= number_format($ppn + $all); ?></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Pembayaran</h4>
                            </div>
                        </div>
                        <form oninput="x.value=parseInt(a.value)-parseInt(b.value)" method="post" action="<?= base_url('kasir/proses_checkout'); ?>" target="_blank">
                            <div class="card-body">
                                <label class="mb-2">Total Harga</label>
                                <input class="form-control" type="number" id="b" value="<?= $ppn + $all ?>" readonly>

                                <label class="mb-2 mt-2">Nominal Bayar</label>
                                <input class="form-control" type="text" id="a" name="total_bayar">

                                <label class="mb-2 mt-2">Kembalian</label>
                                <input class="form-control" type="text" name="x" for="a b" readonly>
                                <!-- <output name="x" for="a b"></output> -->
                            </div>
                            <?php $total = $ppn + $all; ?>
                            <input type="hidden" name="ppn" value="<?= $ppn ?>">
                            <input type="hidden" name="total" value="<?= $total ?>">
                            <!-- <input type="hidden" name="kembalian" for="a b"> -->
                            <input type="hidden" name="idpembelian" value="<?= $rp['id_pembelian']; ?>">
                            <center><button type="submit" class=" btn btn-primary btn-round mb-3">Cetak Nota</a></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<footer class="footer">
    <div class="container-fluid">
        <div class="copyright ml-auto">
            <?= date('Y') ?>, Apotek Griya Cinere <i class="fa fa-heart heart text-danger"></i>
        </div>
    </div>
</footer>
</div>
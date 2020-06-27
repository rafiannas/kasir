<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-9">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="page-pretitle">
                                No. Pembelian
                            </h6>
                            <h4 class="page-title"><?= $bayar['id']?></h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?=base_url('admin/tambahpenjualan');?>" class="btn btn-success btn-border">
                                Simpan
                            </a>
                            <a href="#" class="ml-3 btn btn-primary btn-border" target="_blank">
                                <i class="fa fa-print"></i> Cetak
                            </a>
                        </div>
                    </div>
                    <div class="page-divider"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-invoice">
                                <div class="card-header">
                                    <div class="invoice-header">
                                       
                                        <div class="invoice-logo">
                                            <img src="<?= base_url('assets/apotek_logo.png'); ?>" alt="Apotek Griya Cinere">
                                        </div>
                                        <div class="invoice-desc">
                                        <h4>
                                        Ruko Griya Cinere II Blok 49 No. 13 <br>
                                        Limo, Depok - Jawa Barat <br /> Telp. 021-7530446
                                        </h4></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="separator-solid"></div>
                                    <div class="row">
                                        <div class="col-md-6 invoice-logo">
                                            <h5 class="sub">Tanggal : <?= $bayar['tgl']?> </h5>
                                        </div>
                                        <div class="col-md-6 invoice-desc">
                                            <font alignt="right"><h5 class="sub">No.Pembelian : <?= $bayar['id']?> </h5></font>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="invoice-detail">
                                                <div class="invoice-top">
                                                    <h3 class="title mt-2"><strong>Daftar Obat</strong></h3>
                                                </div>
                                                <div class="separator-solid"></div>
                                                <div class="invoice-item">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <td><strong>Item</strong></td>
                                                                    <td class="text-center"><strong>Harga(Rp)</strong></td>
                                                                    <td class="text-center"><strong>Jumlah(Rp)</strong></td>
                                                                    <td class="text-right"><strong>Total (Rp)</strong></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $total = 0;
                                                            $i = 0;
                                                            $all = 0; ?>
                                                                <?php foreach ($rincian_penjualan as $rp) : ?>
                                                                    <tr>
                                                                        <td><?= $rp['obat']; ?></td>
                                                                        <td align="right"><?= number_format($rp['harga_per_obat']); ?></td>
                                                                        <td align="center"><?= number_format($rp['jumlah']) ?></td>
                                                                        <?php $total = $rp['harga_per_obat'] * $rp['jumlah']; ?>
                                                                        <?php $all += $total; ?>
                                                                        <td align="right"><?= number_format($total); ?></td>
                                                                    </tr>
                                                            <?php endforeach; ?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="text-right"><strong>Total + PPN 10%</strong></td>
                                                                    <td class="text-right"><?= number_format($bayar['total+ppn']); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="text-right"><strong>Uang Bayar</strong></td>
                                                                    <td class="text-right"><?= number_format($bayar['total_bayar']); ?></td>
                                                                </tr>
                                                                <?php if ($bayar['kembalian'] != "0"):?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="text-right"><strong>Uang Kembalian</strong></td>
                                                                    <td class="text-right"><?= number_format($bayar['kembalian']); ?></td>
                                                                </tr>
                                                                <?php endif;?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="separator-solid"></div>
                                    <h6 class="text-uppercase mb-3 fw-bold">
                                        Catatan
                                    </h6>
                                    <p class="text-muted mb-0">
                                        <?php if ($bayar['catatan'] == null) { ?>
                                           Perhatikan Aturan Pakai
                                        <?php } else {
                                            echo $bayar['catatan'];
                                        } ?>
                                    </p>
                                    <div class="separator-dashed"></div>
                                    <h6 class="text-center mt-4 mb-3 fw-bold">
                                        Terimakasih Atas Kunjungan Anda, Semoga Lekas Sembuh
                                    </h6>
                                </div>
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
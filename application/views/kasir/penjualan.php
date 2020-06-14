<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><i class="far fa-edit"></i> Entri Data Penjualan</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="<?= base_url('admin/index') ?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Kasir</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#"><strong><?= $title ?></strong></a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <!-- <div class="auto-scroll"> -->
                    <form method="post" action="<?= base_url('kasir/penjualan'); ?>">
                        <div class="card">
                            <div class="card-body">
                                <label class="mb-2">Obat</label>
                                <input type="text" class="form-control" id="obat" name="obat" placeholder="Masukkan nama obat">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="mb-2 mt-2">Jumlah</label>
                                        <input type="number" min="1" class="form-control" name="jumlah" id="jumlah">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="mb-2 mt-2">Satuan</label>
                                        <input type="text" class="form-control" name="satuan" id="satuan" readonly>
                                    </div>


                                </div>

                                <label class="mb-2 mt-2">Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="username-addon">Rp.</span>
                                    </div>
                                    <input type="text" readonly class="form-control" aria-label="Harga beli" aria-describedby="username-addon" name="harga_beli" id="harga_beli" value="">
                                </div>

                                <button type="submit" class=" add_cart btn btn-primary btn-round ml-auto mt-3" style="width: 100%;">
                                    Tambah
                                </button>

                            </div>
                        </div>
                    </form>
                    <!-- </div> -->
                </div>
                <div class="col-md-8">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Daftar Pembelian Obat</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Obat</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Total</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0;
                                        $no = 1;
                                        $all = 0; ?>
                                        <?php foreach ($rincian_pembelian as $rp) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $rp['obat']; ?></td>
                                                <td><?= number_format($rp['harga']); ?></td>
                                                <td><?= $rp['jumlah']; ?></td>
                                                <?php $total = $rp['harga'] * $rp['jumlah']; ?>
                                                <?php $all += $total; ?>
                                                <td><?= number_format($total); ?></td>
                                                <td><a href="<?= base_url('kasir/hapus_barang'); ?>/<?= $rp['id']; ?>"><i class="fas fa-fw fa-trash text-danger"></i></a></td>
                                            </tr>
                                        <?php $no += 1;
                                        endforeach; ?>
                                        <tr>
                                            <td colspan="4" align="right">
                                                <label class="mt-2"><strong>Total </strong></label><br>
                                                <label class="mt-3"> <strong>PPN (10%)</strong></label><br>
                                                <label class="mt-3 mb-2"> <strong>Total Harga</strong></label>
                                            </td>
                                            <td>
                                                <label class="mt-2"><?= number_format($all); ?></label><br>
                                                <?php $ppn = $all * 0.1 ?>
                                                <label class="mt-3"><?= number_format($ppn); ?></label><br>
                                                <?php $ppn = $all * 0.1 ?>
                                                <label class="mt-3 mb-2"><?= number_format($ppn + $all) ?></label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="d-flex align-items-center">
                                    <div class="col-md-12">
                                        <a href="<?= base_url('kasir/checkout') ?>" class="btn btn-primary" type="submit">Checkout </a>
                                    </div>
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
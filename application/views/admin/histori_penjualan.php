<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><?= $title ?></h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="<?= base_url('superadmin/index') ?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Super Admin</a>
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
                <div class="col-md-12">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title"><?= $title ?></h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive ">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Waktu Transaksi</th>
                                            <th>Nama Obat</th>
                                            <th>Kemasan</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($histori as $su) : ?>
                                            <tr>
                                                <td align="center"><?=$su['id'];?></td>
                                                <td><?= $su['tgl']; ?></td>
                                                <td><?= $su['nama_obat']; ?></td>
                                                <td><?= $su['tipe']; ?>, <?= $su['netto']; ?> <?= $su['satuan']; ?></td>
                                                <td align="center"><?= number_format($su['jumlah_beli']) ?></td>
                                                <td align="right">Rp.<?= number_format($su['harga_per_obat']) ?></td>
                                                <td align="right">Rp.<?= number_format($su['harga_per_obat']) ?></td>
                                                <td align="center">
                                                    <a href="<?= base_url('admin/update_harga/'); ?><?= $su['id']; ?>" class="btn btn-success btn-sm editharga" data-toggle="modal" data-target="#edit" data-id="<?= $su['id']; ?>"><i class="fas fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Update Harga</span>
                    <span class="fw-light">
                        Penjualan
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/update_harga'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="netto" id="netto">
                    <input type="hidden" name="satuan" id="satuan">
                    <input type="hidden" name="id_obat" id="id_obat">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="largeInput">Nama Obat</label>
                                <input type="text" class="form-control form-control" id="namaobat" name="namaobat" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="largeInput">Kemasan</label>
                                <input type="text" class="form-control form-control" id="tipe" id="satuan" name="tipe" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="largeInput">Stok</label>
                                <input type="text" class="form-control form-control" id="stok" name="stok" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="largeInput">Harga Jual</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control form-control" id="hargajual" name="hargajual">
                                </div>
                                <small>**masukkan harga baru tanpa karakter titik maupun koma</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
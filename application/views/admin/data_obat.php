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
                        <a href="#"><strong>Data Obat</strong></a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card card-with-nav">
                        <div class="card-header">
                            <div class="row row-nav-line">
                                <ul class="nav nav-tabs nav-line nav-color-primary w-100 pl-4" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active show" href="<?= base_url('admin/dataobat'); ?>" role="tab" aria-selected="true">Daftar Obat</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/datasatuan'); ?>" role="tab" aria-selected="false">Satuan Obat</a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <a class="btn btn-primary btn-round ml-auto" href="<?= base_url('admin/tambahobat'); ?>">
                                    <i class="fa fa-plus"></i>
                                    Tambah Obat
                                </a>
                            </div>
                            <div class="table-responsive mt-4">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Obat</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Satuan</th>
                                            <th>Min. Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($dataobat as $su) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $su['nama_obat']; ?></td>
                                                <td>Rp.<?= number_format($su['harga_beli']) ?></td>
                                                <td>Rp.<?= number_format($su['harga_jual']) ?></td>
                                                <td><?= $su['satuan']; ?></td>
                                                <td><?= $su['minimum_stok']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/hapus_supplier'); ?>/<?= $su['id']; ?>" class="btn btn-danger btn-circle btn-sm ml-3" onclick="return confirm('Yakin Mau Hapus?');">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $i += 1;
                                        endforeach; ?>
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
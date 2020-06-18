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
                    <div class="card card-with-nav">
                        <div class="card-header">
                            <div class="row row-nav-line">
                                <ul class="nav nav-tabs nav-line nav-color-primary w-100 pl-4" role="tablist">
                                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/stok'); ?>" role="tab" aria-selected="true">Stok</a> </li>
                                    <li class="nav-item"> <a class="nav-link active show" href="<?= base_url('admin/histori_perubahan'); ?>" role="tab" aria-selected="false">Histori Perubahan</a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Nama Obat</th>
                                            <th>Kemasan</th>
                                            <th>Harga Sebelum</th>
                                            <th>Harga Sekarang</th>
                                            <th>Dirubah Oleh</th>
                                            <th>Tgl. Ubah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($histori as $su) : ?>
                                            <tr>
                                                <td align="center"><?= $i; ?></td>
                                                <td><?= $su['nama_obat']; ?></td>
                                                <td><?= $su['tipe']; ?>, <?= $su['netto']; ?> <?= $su['satuan']; ?></td>
                                                <td><?= $su['harga_sebelum']; ?></td>
                                                <td><?= $su['harga_sesudah']; ?></td>
                                                <td><?= $su['nama']; ?></td>
                                                <td><?= $su['tgl_ubah']; ?></td>
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

<!-- Modal -->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Entri Data</span>
                    <span class="fw-light">
                        Stok
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/obat/'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <p class="small">Menambahkan Stok Obat baru, harap semua terisi dengan benar.</p>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label class="mb-2">Nama Obat</label>
                                <select id="basic2" name="satuan" class="form-control mt-2 mb-2" required style="width:100%;">
                                    <option value="">- Pilih Satuan -</option>
                                    <?php foreach ($satuanobat as $st) : ?>
                                        <option value="<?= $st['id']; ?>"><?= $st['satuan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Harga Jual</label>
                                <input type="text" class="form-control" id="namaobat" name="namaobat" placeholder="Masukkan nama obat" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Edit Data</span>
                    <span class="fw-light">
                        Obat
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/edit_supplier/'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <p class="small">Mengupdate data obat, pastikan semua terisi dengan benar</p>
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Nama Obat</label>
                                <input type="text" class="form-control" id="namaobatku" name="namaobatku" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label class="mb-2">Satuan Obat</label>
                                <select id="basic" name="basic" class="form-control mt-2 mb-2" required style="width:100%;">
                                    <option value="">- Pilih Satuan -</option>
                                    <?php foreach ($satuanobat as $st) : ?>
                                        <option <?php if ($st['id'] == 'basic') {
                                                    echo "selected";
                                                } ?> value="<?= $st['id']; ?>"><?= $st['satuan']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
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
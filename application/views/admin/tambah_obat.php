<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><?= $title ?></h4>
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
                        <a href="#">Super Admin</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/dataobat') ?>">Daftar Obat</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#"><strong>Tambah Obat</strong></a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Tambah Obat</div>
                        </div>
                        <form action="<?= base_url('admin/tambahobat/'); ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Nama Obat <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" name="namaobat" placeholder="Masukkan nama obat" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Harga Beli <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="username-addon">Rp.</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Masukkan harga beli" aria-label="Harga beli" aria-describedby="username-addon" name="hargabeli" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Harga Jual <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="username-addon">Rp.</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Masukkan harga jual" aria-label="Harga Jual" aria-describedby="username-addon" name="hargajual" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Minimum Stok <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" name="minstok" placeholder="Enter Username" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="birth" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Satuan Obat <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <div class="select2-input">
                                            <select id="basic" name="satuan" class="form-control" required>
                                                <option value="">- Pilih Satuan -</option>
                                                <?php foreach ($satuanobat as $st) : ?>
                                                    <option value="<?= $st['id']; ?>"><?= $st['satuan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-primary ml-auto" type="submit">
                                            Simpan
                                        </button>
                                        <a class="btn btn-danger ml-2" href="<?= base_url('admin/dataobat') ?>">Batal</a>
                                    </div>
                                </div>
                        </form>
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
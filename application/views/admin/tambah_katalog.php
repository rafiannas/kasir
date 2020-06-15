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
                        <a href="<?= base_url('admin/katalog_obat') ?>">Katalog Obat</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#"><strong>Tambah Katalog Obat</strong></a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Katalog Obat</h4>
                                <button class="btn btn-primary btn-round btn-border ml-auto">
                                    <i class="fas fa-calendar-alt mr-2"></i> <?= date('d-M-yy') ?>
                                </button>
                            </div>
                        </div>
                        <form action="<?= base_url('admin/addkatalog/'); ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="birth" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Obat <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <div class="select2-input">
                                            <select id="basic" name="obat" class="form-control" required>
                                                <option value="">- Pilih Obat-</option>
                                                <?php foreach ($obat as $p) : ?>
                                                    <option value="<?= $p['id']; ?>"><?= $p['nama_obat']; ?> - <?= $p['satuan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="birth" class="col-lg-4 col-md-3 col-sm-4 text-right">Supplier <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <div class="select2-input">
                                            <select id="basic2" name="supplier" class="form-control" required>
                                                <option value="">- Pilih Supplier -</option>
                                                <?php foreach ($supplier as $sp) : ?>
                                                    <option value="<?= $sp['id']; ?>"><?= $sp['nama_supplier']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-lg-4 col-md-3 col-sm-4 text-right">Harga Beli <span class="required-label">*</span></label>
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
                                    <label for="name" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Stok Obat <span class="required-label">*</span></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" name="stok" placeholder="Masukkan stok" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right"></label>
                                    <div class="col-lg-6 col-md-9 col-sm-8">
                                        <button class="btn btn-primary ml-auto" type="submit">
                                            Simpan
                                        </button>
                                        <a class="btn btn-danger ml-2" href="<?= base_url('admin/katalog_obat') ?>">Batal</a>
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
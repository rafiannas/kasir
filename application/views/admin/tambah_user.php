<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah User</h4>
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
                        <a href="#">Utility</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/manage_user') ?>">Managemen User</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#"><strong>Tambah User</strong></a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Tambah User</div>
                        </div>
                        <form method="post" action="<?= base_url('Admin/tambah_user'); ?>" id="exampleValidation" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="name" name="namauser" placeholder="Masukkan nama" required>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Username <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" placeholder="username" aria-label="username" aria-describedby="username-addon" id="username" name="username" required>
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>');  ?>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">No. Handphone <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" placeholder="Masukkan No. Handphone" aria-label="no.handphone" aria-describedby="username-addon" id="username" name="no_hp" required>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="password" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Password <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="password" class="form-control" id="password" name="password1" placeholder="Masukkan password" required>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="confirmpassword" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Konfirmasi Password <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="password" class="form-control" id="confirmpassword" name="password2" placeholder="Konfirmasi password" required>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Jenis Kelamin <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8 d-flex align-items-center">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="male" name="gender" class="custom-control-input" value="L">
                                            <label class="custom-control-label" for="male">Laki-laki</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="female" name="gender" class="custom-control-input" value="P">
                                            <label class="custom-control-label" for="female">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Hak Akses <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <div class="select2-input">
                                            <select id="state" name="posisi" class="form-control" required>
                                                <option value="">&nbsp;</option>
                                                <optgroup label="Hak Akses">
                                                    <?php foreach ($akses as $st) : ?>
                                                        <option value="<?= $st['id']; ?>"><?= $st['role']; ?></option>
                                                    <?php endforeach; ?>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="birth" class="col-lg-3 col-md-3 col-sm-4 text-right">Status <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <div class="select2-input">
                                            <select id="basic" name="status" class="form-control" required>
                                                <option value="">&nbsp;</option>
                                                <optgroup label="Status User">
                                                    <?php foreach ($active as $ac) : ?>
                                                        <option value="<?= $ac['id']; ?>"><?= $ac['keterangan']; ?></option>
                                                    <?php endforeach; ?>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="submit">Simpan </button>
                                        <a href="<?= base_url('admin/manage_user') ?>" class="btn btn-danger">Batal</a>
                                    </div>
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
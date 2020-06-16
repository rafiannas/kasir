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
                        <a href="#">Profil</a>
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
                <div class="col-md-8">
                    <?= $this->session->flashdata('message');  ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Setting Profil</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="pills-without-border-tabContent">
                                <div class="tab-pane fade show active" id="pills-home-nobd" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                                    <form method="post" action="<?= base_url('setting/update'); ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label class="mb-2">Nama User</label>
                                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama" value="<?= $detail['nama']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label class="mb-2">Username</label>
                                                    <input type="text" class="form-control" name="username" placeholder="Masukkan nomor handphone" value="<?= $detail['username']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label class="mb-2">Nomor Handphone</label> <input type="text" class="form-control" name="no_hp" placeholder="Masukkan username" value="<?= $detail['no_hp']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label class="mb-2">Password Baru</label>
                                                    <input type="password" class="form-control" name="pass" placeholder="Kosongkan password jika tidak diubah">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control" name="id" value="<?= $detail['id']; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button class="btn btn-primary" type="submit">Simpan </button>
                                                <a href="<?= base_url('setting/batal/' . $detail['id']) ?>" class="btn btn-danger">Batal</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-header" style="background-image: url('<?= base_url('assets') ?>/assets/img/blogpost.jpg')">
                            <div class="profile-picture">
                                <div class="avatar avatar-xl">
                                    <img src="<?= base_url('assets/img_user/') . $detail['foto_user'] ?>" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="user-profile text-center">
                                <div class="name"> <?= $detail['nama']; ?></div>
                                <div class="job"> <?= $detail['role']; ?></div>
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
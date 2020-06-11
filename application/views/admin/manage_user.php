<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><?= $title ?></h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
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
                        <a href="#"><?= $title ?></a>
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
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Tambah User
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">
                                                    Entri Data</span>
                                                <span class="fw-light">
                                                    User
                                                </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('admin/tambah_karyawan/'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <p class="small">Menambahkan user baru, harap semua terisi dengan benar.</p>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Nama</label>
                                                            <input type="text" class="form-control" id="nama" Name="nama" placeholder="Masukkan nama" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Nomor Handphone</label>
                                                            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan nomor handphone" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Username</label>
                                                            <input type="text" class="form-control" id="username" Name="username" placeholder="Masukkan email" required>
                                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>');  ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Password</label>
                                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Hak Akses</label>
                                                            <select id="posisi" name="posisi" class="form-control">
                                                                <?php foreach ($status as $st) : ?>
                                                                    <option value="<?= $st['id']; ?>"><?= $st['role']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Status</label>
                                                            <select name="is_active" class="form-control">
                                                                <?php foreach ($active as $ac) : ?>
                                                                    <option value="<?= $ac['id']; ?>"><?= $ac['keterangan']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama User</th>
                                            <th>Username</th>
                                            <th>No. HP</th>
                                            <th>Hak Akses</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($daftarKaryawan as $dk) : ?>
                                            <tr>
                                                <td><?= $dk['nama']; ?></td>
                                                <td><?= $dk['username']; ?></td>
                                                <td><?= $dk['no_hp']; ?></td>
                                                <td><?= $dk['role']; ?></td>
                                                <td style="color: <?= $dk['warna']; ?>"><?= $dk['keterangan']; ?></td>
                                                <td><a href="<?= base_url('admin/beforeDetail'); ?>/<?= $dk['id']; ?>" class="btn btn-primary btn-circle btn-sm">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                    <a href="<?= base_url('admin/hapus_karyawan'); ?>/<?= $dk['id']; ?>" class="btn btn-danger btn-circle btn-sm ml-3" onclick="return confirm('Yakin Mau Hapus?');">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
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
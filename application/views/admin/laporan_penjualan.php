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
                        <a href="#"><strong><?= $title ?></strong></a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Filter Laporan</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Dari</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="datetime" name="datetime">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sampai</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="datepicker" name="datepicker">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tampilkan</label>
                                        <div class="input-group">
                                            <button type="submit" class="form-control btn btn-primary">
                                                Tampilkan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Result Laporan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>x</th>
                                            <th>xx</th>
                                            <th>xxx</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <?php
                                                $i = 1;
                                                foreach ($obat as $su) : ?>
                                            <tr>
                                                <td align="center"><?= $i; ?></td>
                                                <td><?= $su['nama_obat']; ?></td>
                                                <td><?= $su['satuan']; ?></td>
                                                <td align="center">
                                                    <a href="<?= base_url('kasit/edit_obat/'); ?><?= $su['id']; ?>" class="btn btn-success btn-sm editobat" data-toggle="modal" data-target="#edit" data-id="<?= $su['id']; ?>"><i class="fas fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        <?php $i += 1;
                                                endforeach; ?> -->
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
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">Gudang</h1><br>
    </div>
    <div class="container-fluid">
        <?= $this->session->flashdata('message');  ?>

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <a class="btn btn-primary ml-2 mb-3" href="<?= base_url('gudang/tambah_bahan') ?>">Tambah</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th>No</th>
                                <th>Tgl</th>
                                <th>Judul</th>
                                <th>Jumlah_bahan</th>
                                <th>Total Harga</th>
                                <th>Penanggung Jawab</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($bahan as $rp) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $rp['tgl']; ?></td>
                                    <td><?= $rp['judul']; ?></td>
                                    <td><?= $rp['jumlah_bahan']; ?></td>
                                    <td><?= $rp['total_harga']; ?></td>
                                    <td><?= $rp['nama']; ?></td>
                                    <td><a href="<?= base_url('gudang/s_detail'); ?>/<?= $rp['id']; ?>" class="btn btn-primary btn-circle btn-sm">
                                            <i class="fas fa-info-circle"></i>
                                        </a></td>
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
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
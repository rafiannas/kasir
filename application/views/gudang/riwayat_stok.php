    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Perubahan Stok</h1><br>
    </div>
    <div class="container-fluid">
        <?= $this->session->flashdata('message');  ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Riwayat Perubahan Stok</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th>No</th>
                                <th>Tgl</th>
                                <th>Menu</th>
                                <th>Kategori</th>
                                <th>Stok Sebelumnya</th>
                                <th>Stok Diubah</th>
                                <th>Penanggung Jawab</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($historyStok as $rp) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $rp['tgl']; ?></td>
                                    <td><?= $rp['nama_menu']; ?></td>
                                    <td><?= $rp['nama_kategori']; ?></td>
                                    <td><?= $rp['sebelum']; ?></td>
                                    <td><?= $rp['sesudah']; ?></td>
                                    <td><?= $rp['nama']; ?></td>

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
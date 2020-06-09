    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DAPUR</h1><br>
        </div>



        <div class="container-fluid">
            <?= $this->session->flashdata('message');  ?>

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tables</h1>
            <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

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
                                    <th>Detail</th>
                                    <th>Tanggal</th>
                                    <th>Atas Nama</th>
                                    <th>Jumlah Pesanan</th>
                                    <th>Proses</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($listPesanan as $rp) : ?>
                                    <tr>

                                        <td><?= $i; ?></td>
                                        <td><a href="<?= base_url('dapur/detail'); ?>/<?= $rp['id']; ?>" class="btn btn-info btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-info-circle"></i>
                                                </span>
                                                <span class="text">Details</span>
                                            </a></td>
                                        <td><?= $rp['tanggal']; ?></td>
                                        <td><?= $rp['atas_nama']; ?></td>
                                        <td><?= $rp['jumlah_pesanan']; ?></td>
                                        <td><a class="<?= $rp['class2']; ?>" href="<?= base_url('dapur/ganti'); ?>/<?= $rp['id']; ?>"><i class="<?= $rp['simbol2']; ?>"></i></a></td>

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
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
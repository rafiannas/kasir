    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">Tambah Bahan Gudang</h1><br>
    </div>

    <div class="container-fluid">
        <?= $this->session->flashdata('message');  ?>
        <!-- Page Heading -->


        <div class="row">
            <div class="col-lg-4">
                <!-- Brand Buttons -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form method="post" action="<?= base_url('gudang/tambah_bahan'); ?>">
                            <div class="form-group">
                                <label for="nama" class="m-0 font-weight-bold text-primary">Nama Bahan</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Bahan" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="jumlah" class="m-0 font-weight-bold text-primary">Jumlah Beli</label>
                                <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Beli" required>
                            </div>

                            <div class="form-group">
                                <label for="harga" class="m-0 font-weight-bold text-primary">Harga Beli</label>
                                <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga Beli" required min="0" value=" <?= set_value('harga'); ?> ">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-secondary btn-block">Tambahkan</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="card shadow mb-8">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>Nama Bahan</th>
                                        <th>Jumlah Beli</th>
                                        <th>Harga Beli</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    $ttl = 0;
                                    foreach ($listBahan as $rp) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $rp['nama_bahan']; ?></td>
                                            <td><?= $rp['jumlah']; ?></td>
                                            <td>Rp. <?= number_format($rp['harga']);
                                                    $ttl += $rp['harga']; ?></td>
                                            <td><a href="<?= base_url('gudang/detail'); ?>/<?= $rp['id']; ?>" class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a></td>
                                        </tr>
                                    <?php $i += 1;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <h3 class="m-0 font-weight-bold text-primary">Total : Rp. <?= number_format($ttl); ?> </h3>
                        <a class="btn btn-primary" style="margin-left: 48%" href="<?= base_url('gudang/konfirmasi');  ?>">Lanjut</a>
                    </div>
                </div>
            </div>
        </div>



    </div>
    </div>
    </div> <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
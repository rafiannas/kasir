    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">SERVER</h1><br>


        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-ayam-tab" data-toggle="pill" href="#pills-ayam" role="tab" aria-controls="pills-ayam" aria-selected="true">Ayam</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-ikan-tab" data-toggle="pill" href="#pills-ikan" role="tab" aria-controls="pills-ikan" aria-selected="false">Ikan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-minuman-tab" data-toggle="pill" href="#pills-minuman" role="tab" aria-controls="pills-minuman" aria-selected="false">Minuman</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-ayam" role="tabpanel" aria-labelledby="pills-ayam-tab">
                <div class="span3">
                    <div class="row">
                        <!-- Isi ayam  -->
                        <?php foreach ($listAyam as $i) : ?>
                            <div class="card ml-3" style="width: 15rem;">
                                <img style="width: 220px" ; height="100px" src="<?= base_url('assets'); ?>/img_menu/<?= $i['foto']; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><b><?= $i['nama_menu']; ?></b></h5>
                                    <p class="card-text"><?= $i['deskripsi']; ?></p>
                                    <p>Rp. <?= $i['harga']; ?></p>
                                    <table class="table table-boorderless">

                                        <form method="post">
                                            <th><input type="hidden" name="id_b" id="id_b" value="<?= $i['id']; ?>"></th>
                                            <th><input class="form-control" type="number" name="qty" id="qty" placeholder="Jumlah"></th>

                                            <th><button type="submit" name="btn_qty" id="btn_qty" class="btn btn-primary">Pilih</button></th>
                                        </form>

                                    </table>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- ikan -->
            <div class="tab-pane fade show" id="pills-ikan" role="tabpanel" aria-labelledby="pills-ikan-tab">
                <div class="span3">
                    <div class="row">
                        <!-- Isi ikan  -->
                        <?php foreach ($listIkan as $i) : ?>
                            <div class="card ml-3" style="width: 15rem;">
                                <img style="width: 220px" ; height="100px" src="<?= base_url('assets'); ?>/img_menu/<?= $i['foto']; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><b><?= $i['nama_menu']; ?></b></h5>
                                    <p class="card-text"><?= $i['deskripsi']; ?></p>
                                    <p>Rp. <?= $i['harga']; ?></p>
                                    <table class="table table-boorderless">

                                        <form method="post">
                                            <th><input type="hidden" name="id_b" id="id_b" value="<?= $i['id']; ?>"></th>
                                            <th><input class="form-control" type="number" name="qty" id="qty" placeholder="Jumlah"></th>
                                            <th><button type="submit" name="btn_qty" id="btn_qty" class="btn btn-primary">Pilih</button></th>
                                        </form>

                                    </table>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- minuman -->
            <div class="tab-pane fade show" id="pills-minuman" role="tabpanel" aria-labelledby="pills-minuman-tab">
                <div class="span3">
                    <div class="row">
                        <!-- Isi minuman  -->
                        <?php foreach ($listMinuman as $i) : ?>
                            <div class="card ml-3" style="width: 15rem;">
                                <img style="width: 220px" ; height="100px" src="<?= base_url('assets'); ?>/img_menu/<?= $i['foto']; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><b><?= $i['nama_menu']; ?></b></h5>
                                    <p class="card-text"><?= $i['deskripsi']; ?></p>
                                    <p>Rp. <?= $i['harga']; ?></p>
                                    <table class="table table-boorderless">

                                        <form method="post">
                                            <th><input type="hidden" name="id_b" id="id_b" value="<?= $i['id']; ?>"></th>
                                            <th><input class="form-control" type="number" name="qty" id="qty" placeholder="Jumlah"></th>

                                            <th><button type="submit" name="btn_qty" id="btn_qty" class="btn btn-primary">Pilih</button></th>
                                        </form>

                                    </table>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>



        <div class="row">
            <div class="col-md-4 float-right">
                <table class="table table-striped ml-3" style="margin-left: 40%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">X</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $ttl = 0;
                        foreach ($listPesanan as $lp) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><a href="<?= base_url(); ?>server/hapus_barang/<?= $lp['id']; ?>" class="badge badge-danger">X</a></td>
                                <td><?= $lp['nama_menu']; ?></td>
                                <td><?= $lp['jumlah']; ?></td>
                                <td>Rp. <?= number_format($lp['harga']); ?></td>
                                <?php $jm = $lp['harga'] * $lp['jumlah'];
                                $ttl += $jm; ?>
                                <td>Rp.<?= number_format($jm); ?></td>
                            </tr>

                        <?php
                            $i += 1;
                        endforeach; ?>

                    </tbody>
                </table>
                <th class="ml-3">Total ...</th>
                <th><b>Rp. <?= number_format($ttl); ?></b></th>
            </div>




        </div>
        <br>
        <a class="btn btn-primary ml-3" href="<?= base_url('server/konfirmasi'); ?>">Pesan</a>


        <br>










    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
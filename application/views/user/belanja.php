    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">Daftar Menu</h1><br>
        <?= $this->session->flashdata('message');  ?>
    </div>
    <!-- mulai dari sini -->

    <div class="row ml-3">
        <ul class="nav nav-pills mb-3">
            <?php foreach ($kategori as $kat) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('user/temp') ?>/<?= $kat['id']; ?>" aria-selected="true"><?= $kat['nama_kategori'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="row ml-3 mr-3">
        <div class="column">
            <!-- <h3 class="primary" class="ml-1 mb-3"><?= $judulMenu['nama_kategori']; ?></h3> -->
            <div class="row">
                <?php foreach ($byMenu as $i) : ?>
                    <div class="col-3">
                        <div class="card mb-3" style="width: 86;">
                            <img style="width: 220px" ; height="100px" src="<?= base_url('assets'); ?>/img_menu/<?= $i['foto']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><b><?= $i['nama_menu']; ?></b></h5>
                                <p class="card-text"><?= $i['deskripsi']; ?></p>
                                <p>Rp. <?= $i['harga']; ?></p>
                                <p><b>Stok : <?= $i['stok']; ?></b></p>
                                <table class="table table-boorderless">
                                    <form method="post">
                                        <th><input type="hidden" name="id_b" id="id_b" value="<?= $i['id']; ?>"></th>
                                        <th><input class="form-control" type="number" name="qty" id="qty" placeholder="Jumlah"></th>

                                        <th><button type="submit" name="btn_qty" id="btn_qty" class="btn btn-primary">Pilih</button></th>
                                    </form>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="column2" style="background-color:white;">
            <h2>Daftar Pesanan</h2>
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
                                    <td><a href="<?= base_url(); ?>user/hapus_barang/<?= $lp['id']; ?>" class="badge badge-danger">X</a></td>
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
            <a class="btn btn-primary ml-3" href="<?= base_url('user/konfirmasi'); ?>">Pesan</a>


            <br>
        </div>
    </div>


    </div>


    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
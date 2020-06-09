    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">SERVER</h1><br>


        <h1>Detail Pesanan</h1>

    </div>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($rinci as $k) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $k['nama_menu']; ?></td>
                                    <td><?= $k['jumlah']; ?></td>
                                </tr>
                            <?php $i += 1;
                            endforeach; ?>
                        </tbody>
                    </table>
                    <h2>Note :</h2>

                    <?= $dipilih['note']; ?>
                    <!-- Note -->
                </div>
            </div>
        </div>
    </div>

    </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
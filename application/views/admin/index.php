<div class="main-panel">
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold"><b>Halo,
                                <!-- <?php foreach ($profil as $p) : ?> <?= $p['nama']; ?> <?php endforeach; ?>!</b></h2> -->
                                <h5 class="text-white op-7 mb-2">Ini kabar terbaru dari tokomu</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd mt--2">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-coins text-success"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <!-- <?php $bulan = date('m');
                                                if ($bulan == "01") {
                                                    $bulan = "Januari";
                                                } elseif ($bulan == "02") {
                                                    $bulan = "Februari";
                                                } elseif ($bulan == "03") {
                                                    $bulan = "Maret";
                                                } elseif ($bulan == "04") {
                                                    $bulan = "April";
                                                } elseif ($bulan == "05") {
                                                    $bulan = "Mei";
                                                } elseif ($bulan == "06") {
                                                    $bulan = "Juni";
                                                } elseif ($bulan == "07") {
                                                    $bulan = "Juli";
                                                } elseif ($bulan == "08") {
                                                    $bulan = "Agustus";
                                                } elseif ($bulan == "09") {
                                                    $bulan = "September";
                                                } elseif ($bulan == "10") {
                                                    $bulan = "Oktober";
                                                } elseif ($bulan == "11") {
                                                    $bulan = "November";
                                                } elseif ($bulan == "12") {
                                                    $bulan = "Desember";
                                                }
                                                ?> -->
                                        <p class="card-category">Pendapatan: <?= $bulan; ?></p>
                                        <h4 class="card-title">
                                            <!-- <?php
                                                    if ($pendapatan['pendapatan_kotor'] == null) {
                                                        $pen = "0";
                                                        echo $pen;
                                                    } else {
                                                        echo number_format($pendapatan['pendapatan_kotor']);
                                                    }
                                                    ?> -->
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-cart-1"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <!-- <?php $i = 0;
                                                foreach ($belumdiproses as $p) : ?>
                                            <?php $i++; ?>
                                        <?php endforeach;
                                                $pesananbaru = $i; ?>
                                        <p class="card-category">Pesanan Baru</p>
                                        <h4 class="card-title"><?= $pesananbaru; ?></h4> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-box-2 text-primary"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Terjual</p>
                                        <!-- <h4 class="card-title"><?= $order['jmh']; ?></h4> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-success text-success"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <!-- <?php $i = 0;
                                                foreach ($produk_aktif as $p) : ?>
                                            <?php $i++; ?>
                                        <?php endforeach;
                                                $aktifproduk = $i; ?>
                                        <p class="card-category">Produk Aktif</p>
                                        <h4 class="card-title">
                                            <?= $aktifproduk; ?>
                                        </h4> -->
                                    </div>
                                </div>
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
                <?= date('Y') ?>, Develope with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.if.uai.ac.id">IF UAI</a>
            </div>
        </div>
    </footer>
</div>
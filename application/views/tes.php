<br><br>
<div class="body-content outer-top-xs">
    <div class="container">
        <h2 style="text-align: center"><?= $profil['nama_toko']; ?></h2>
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar-widget outer-bottom-xs wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                    <h3 class="section-title">Deskripsi Toko</h3>
                    <div class="sidebar-widget-body m-t-10">
                        <div class="accordion">

                            <h4><?= $profil['deskripsi_toko']; ?></h4>
                        </div><!-- /.accordion -->
                    </div><!-- /.sidebar-widget-body -->
                </div>
            </div>
            <div class="col-md-4">

                <div class="sidebar-widget outer-bottom-xs wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                    <h3 class="section-title">Alamat</h3>
                    <div class="sidebar-widget-body m-t-10">
                        <div class="accordion">

                            <h4><?= $profil['alamat']; ?></h4>
                        </div><!-- /.accordion -->
                    </div><!-- /.sidebar-widget-body -->
                </div>
            </div>
            <div class="col-md-4">


                <div class="sidebar-widget outer-bottom-xs wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                    <h3 class="section-title">Alamat</h3>
                    <div class="sidebar-widget-body m-t-10">
                        <div class="accordion">

                            <h4><?= date('d F Y', $profil['date_create']); ?></h4>
                        </div><!-- /.accordion -->
                    </div><!-- /.sidebar-widget-body -->
                </div>
            </div>
        </div>
    </div><!-- /.body-content -->
</div>

<br><br>
<div class="body-content outer-top-xs">
    <div class="container">
        <div class="row ">
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">Produk Lainnya</h3>
                <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

                    <?php foreach ($produk as $ot) : ?>
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="<?= base_url('jualbeli/s_view'); ?>/<?= $ot['id_produk']; ?>">
                                                <img width="250px" height="250px" src="<?= base_url('assets/image/produk'); ?>/<?= $ot['foto_utama']; ?>" alt=""></a>
                                        </div><!-- /.image -->

                                        <!-- <div class="tag sale"><span>sale</span></div> -->
                                    </div><!-- /.product-image -->


                                    <div class="product-info text-left">

                                        <h3 class="name"><a href="<?= base_url('jualbeli/s_view'); ?>/<?= $ot['id_produk']; ?>"><?= $ot['nama_produk']; ?></a></h3>
                                        <!-- <div class="rating rateit-small"></div> -->
                                        <div class="description"></div>

                                        <div class="product-price">
                                            <span class="price">
                                                Rp. <?= number_format($ot['harga']); ?></span>
                                            <!-- <span class="price-before-discount">$ 800</span> -->

                                        </div><!-- /.product-price -->

                                    </div><!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <a class="btn btn-primary icon" href="<?= base_url('jualbeli/s_view'); ?>/<?= $ot['id_produk']; ?>" type="button">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <button class="btn btn-primary cart-btn" type="button">Tambah ke Keranjang</button>

                                                </li>
                                                </a>
                                                </li>
                                            </ul>
                                        </div><!-- /.action -->
                                    </div><!-- /.cart -->
                                </div><!-- /.product -->

                            </div><!-- /.products -->
                        </div><!-- /.item -->
                    <?php endforeach; ?>

                </div><!-- /.home-owl-carousel -->
            </section><!-- /.section -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.dataTables.js' ?>"></script>
    <script type="text/javascript">
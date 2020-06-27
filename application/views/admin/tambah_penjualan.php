<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-4">
                    <form method="post" action="<?= base_url('admin/tambahpenjualan'); ?>">
                        <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title"><i class="far fa-edit"></i> Entri Obat</h4>
                            </div>                        
                        </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="mb-2">Obat</label>
                                        <div class="select2-input">
                                            <select id="basic" name="obat" class="form-control" required style="width:100%;">
                                                <option value="">Pilih Obat</option>
                                                <?php foreach ($dataobat as $p) : ?>
                                                <option value="<?= $p['id_daftar_obat']; ?>"><?= $p['nama_obat']; ?> <?= $p['tipe']; ?> <?= $p['netto']; ?> <?= $p['satuan']; ?> : Rp. <?= number_format($p['harga_jualan']); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label class="mb-2">Jumlah</label>
                                        <input type="number" min="1" class="form-control" name="jumlah" id="jumlah" required>
                                </div>
                                <button type="submit" class=" add_cart btn btn-primary btn-round ml-auto mt-3" style="width: 100%;">
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                    <div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Daftar Obat</div>
										<div class="card-tools">
                                            <b>No. Pembelian : <?php echo $invoice;?></b>
										</div>
									</div>
								</div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="display table table-bordered">
                                    <thead>
                                        <tr align="center">
                                            <th>Nama Obat</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th style="width:200px;">Total (Rp.)</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0;
                                        $i = 0;
                                        $all = 0; ?>
                                        <?php foreach ($rincian_penjualan as $rp) : ?>
                                            <tr>
                                                <td><?= $rp['obat']; ?></td>
                                                <td align="right"><?= number_format($rp['harga_per_obat']); ?></td>
                                                <td align="center"><?= number_format($rp['jumlah']) ?></td>
                                                <?php $total = $rp['harga_per_obat'] * $rp['jumlah']; ?>
                                                <?php $all += $total; ?>
                                                <td align="right"><?= number_format($total); ?></td>
                                                <td align="center"><a href="<?= base_url('admin/hapus_barang'); ?>/<?= $rp['id']; ?>"><i class="fas fa-fw fa-trash text-danger"></i></a></td>
                                            </tr>
                                        <?php $i += 1;
                                        endforeach; ?>
                                        <tr>
                                            <td colspan="3" align="right">
                                                <label class="mt-2"><b>Total</b></label><br>
                                                <label class="mt-2 mb-2"><b>PPN 10%</b></label>
                                            </td>
                                            <td align="right">
                                                <label class="mt-2" style="font-weight:bold;"><?= number_format($all); ?></label><br>
                                                <label class="mt-2 mb-2" style="font-weight:bold;">
                                                    <?php $ppn = $all * 0.1;
                                                        echo number_format($ppn);
                                                        ?>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="right">
                                                <label><b>Total Harga</b></label><br>
                                            </td>
                                            <td align="right">
                                                <span style="font-weight:bold;"><h2><?= number_format($ppn + $all); ?></h2></span> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="right">
                                                <label class="mb-2"><b>Uang Bayar</b></label><br>
                                                <label class="mt-3"><b>Kembalian</b></label>
                                            </td>
                                            <td align="right">
                                                <form oninput="x.value=parseInt(a.value)-parseInt(b.value)" method="post" action="<?= base_url('admin/checkout'); ?>">
                                                    <input type="hidden" name="total+ppn" id="b" class="form-control form-control-sm mt-2" value="<?= $ppn + $all; ?>" style="text-align:right; font-weight:bold;" readonly>
                                                    <?php if ($all == "0") :?>
                                                    <input type="text" name="uang_bayar" id="a" class="form-control form-control-sm mt-2" style="text-align:right; font-weight:bold;" autofocus readonly>
                                                    <?php else : ?>
                                                    <input type="text" name="uang_bayar" id="a" class="form-control form-control-sm mt-2" style="text-align:right; font-weight:bold;" autofocus required>
                                                    <?php endif ;?>
                                                    <input type="text" name="x" for="a b" class="form-control form-control-sm mt-3 mb-2" style="text-align:right; font-weight:bold;" readonly>
                                            </td>
                                        </tr>
                                        <input type="hidden" name="ppn" value="<?= $ppn; ?>">
                                        <input type="hidden" name="total_harga" value="<?= $all; ?>">
                                        <input type="hidden" name="jumlah_beli" value="<?= $i; ?>">
                                    </tbody>
                                </table>
                            </div>
                            <div class="separator-dashed"></div>
                            <center>
                                <div class="row">
                                    <div class="col-md-8">
                                    
                                        <textarea class="form-control" type="text" name="catatan" id="catatan" placeholder="Catatan"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class=" btn btn-primary btn-round" style="width:100%;">Checkout</button>
                                    </div>
                                </div>
                                </form>
                            </center>

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

<!-- <script type="text/javascript">
    $(document).ready(function() {

        $("#obat").autocomplete({
            source: "<?php echo site_url('admin/get_autocomplete'); ?>",

            select: function(event, ui) {
                $('[name="obat"]').val(ui.item.label);
                $('[name="harga_beli"]').val(ui.item.harga_beli);
                $('[name="satuan"]').val(ui.item.id_satuan);
                // $('[name="satuan"]').val(ui.item.satuan);
            }
        });
    });
</script> -->
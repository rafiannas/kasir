$(document).ready(function () {
    $('#provinsi').change(function () {
        var id_prov = $('#provinsi').val();
        if (id_prov != '') {
            $.ajax({
                url: "<?= base_url() . 'alamat/fetch_kabupaten'; ?>",
                method: "POST",
                data: {
                    id_prov: id_prov
                },
                success: function (data) {
                    $('#kabupaten').html(data);

                }
            })
        } else {
            $('#kabupaten').html('<option value="">Pilih Kota/Kabupaten</option>');
            $('#kecamatan').html('<option value="">Pilih Kecamatan</option>');
            $('#kelurahan').html('<option value="">Pilih Kelurahan</option>');
        }
    });
    $('#kabupaten').change(function () {
        var id_kab = $('#kabupaten').val();
        if (id_kab != '') {
            $.ajax({
                url: "<?= base_url() . 'alamat/fetch_kecamatan'; ?>",
                method: "POST",
                data: {
                    id_kab: id_kab
                },
                success: function (data) {
                    $('#kecamatan').html(data);

                }
            })
        } else {
            $('#kecamatan').html('<option value="">Pilih Kecamatan</option>');
            $('#kelurahan').html('<option value="">Pilih Kelurahan</option>');
        }
    });
    $('#kecamatan').change(function () {
        var id_kec = $('#kecamatan').val();
        if (id_kec != '') {
            $.ajax({
                url: "<?= base_url() . 'alamat/fetch_kelurahan'; ?>",
                method: "POST",
                data: {
                    id_kec: id_kec
                },
                success: function (data) {
                    $('#kelurahan').html(data);
                }
            })
        }
    });

});
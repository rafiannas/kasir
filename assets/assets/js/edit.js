$(function () {
    $('.editsupplier').on('click', function () {
        $('.modal-footer button[type=submit]').html('Update');
        $('.modal-content form').attr('action', 'http://localhost/kasir/admin/edit_supplier');
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/kasir/admin/geteditsupplier',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#alamatsu').val(data.alamat);
                $('#namasu').val(data.nama_supplier);
                $('#no_kontaksu').val(data.no_kontak);
                $('#id').val(data.id);
            }
        });
    });

    $('.editobat').on('click', function () {
        $('.modal-footer button[type=submit]').html('Update');
        $('.modal-content form').attr('action', 'http://localhost/kasir/admin/edit_obat');
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/kasir/admin/geteditobat',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#namaobatku').val(data.nama_obat);
                $('#id').val(data.id);
            }
        });
    });

    $('.editsatuan').on('click', function () {
        $('.modal-footer button[type=submit]').html('Update');
        $('.modal-content form').attr('action', 'http://localhost/kasir/admin/edit_satuan');
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/kasir/admin/geteditsatuan',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#satuan').val(data.satuan);
                $('#id').val(data.id);
            }
        });
    });

    $('.editipe').on('click', function () {
        $('.modal-footer button[type=submit]').html('Update');
        $('.modal-content form').attr('action', 'http://localhost/kasir/admin/edit_tipe');
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/kasir/admin/get_tipe',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#tpobat').val(data.tipe);
                $('#id').val(data.id);
            }
        });
    });

    $('.editharga').on('click', function () {
        $('.modal-footer button[type=submit]').html('Update');
        $('.modal-content form').attr('action', 'http://localhost/kasir/admin/update_harga');
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/kasir/admin/geteditharga',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#hargajual').val(data.harga_jualan);
                $('#stok').val(data.stok);
                $('#tipe').val(data.tipe);
                $('#namaobat').val(data.nama_obat);
                $('#satuan').val(data.satuan);
                $('#id').val(data.id);
            }
        });
    });

})
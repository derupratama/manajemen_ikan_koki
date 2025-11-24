<!-- Ubah Jenis Ikan -->
<script>
$('#modal-ubah-jenis-ikan').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var jenis = button.data('jenis');

    $('#edit_id').val(id);
    $('#edit_jenis').val(jenis);
});

$('#modal-edit-ikan').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget);

    var idIkan     = button.data('id');
    var ukuran     = button.data('ukuran');
    var gender     = button.data('gender');
    var stok       = button.data('stok');
    var harga      = button.data('harga');
    var deskripsi  = button.data('deskripsi');
    var gambar     = button.data('gambar');
    var idJenis = button.data('jenisid');

    // Set selected dropdown
    

    // Masukkan nilai ke input
    $('#edit_idIkan').val(idIkan);
    $('#edit_gambar_lama').val(gambar);
    $('#edit_jenisIkan').val(idJenis);
    $('#edit_ukuran').val(ukuran);
    $('#edit_gender').val(gender);
    $('#edit_stok').val(stok);
    $('#edit_harga').val(harga);
    $('#edit_deskripsi').val(deskripsi);

    // Gambar
    $('#edit_preview').attr('src', '../assets/img/ikan/' + gambar);
});

</script>
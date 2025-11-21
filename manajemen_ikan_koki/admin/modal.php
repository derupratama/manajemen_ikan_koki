<!-- Ubah Jenis Ikan -->
<script>
$('#modal-ubah-jenis-ikan').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var jenis = button.data('jenis');

    $('#edit_id').val(id);
    $('#edit_jenis').val(jenis);
});
</script>
<?php
require_once "../function/koneksi.php";

// ==================== QUERY AMBIL RATING ====================
$sql = "
    SELECT 
        r.idRating AS id,
        r.namaOrang,
        r.isiRating AS komentar,
        r.lokasi,
        r.tanggal,
        r.foto
    FROM rating r
    ORDER BY r.idRating DESC
";

$result = $db->query($sql);
?>

<div class='content-wrapper'>
<section class='content'>

<div class='card'>
    <div class='card-header'>
        <button class='btn btn-primary' data-toggle='modal' data-target='#modalTambahRating'>
            + Tambah Rating
        </button>
    </div>

    <div class='card-body'>
        <table class='table table-bordered' id='tabelRating'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Orang</th>
                    <th>Nama Ikan</th>
                    <th>Komentar</th>
                    <th>Lokasi</th>
                    <th>Tanggal</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                while($row = $result->fetchArray(SQLITE3_ASSOC)) { ?>
                <tr data-id="<?= $row['id']; ?>">
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['namaOrang']); ?></td>
                    <td><?= htmlspecialchars($row['komentar']); ?></td>
                    <td><?= htmlspecialchars($row['lokasi']); ?></td>
                    <td><?= htmlspecialchars($row['tanggal']); ?></td>
                    <td>
                        <?php if ($row['foto']) { ?>
                            <img src="../assets/img/rating/<?= $row['foto']; ?>" width="80">
                        <?php } else { echo "-"; } ?>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm btnHapusRating">Hapus</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</section>
</div>

<!-- ======================= MODAL ======================= -->
<div class="modal fade" id="modalTambahRating">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Tambah Rating</h4>
            </div>

            <div class="modal-body">
                <form id="formRating" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Orang</label>
                        <input type="text" name="nama_orang" class="form-control" required>
                    </div>


                    <div class="form-group">
                        <label>Komentar</label>
                        <textarea name="komentar" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Foto (opsional)</label>
                        <input type="file" name="foto" accept="image/*" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary" id="btnSimpanRating">Simpan</button>
            </div>

        </div>
    </div>
</div>

<!-- ======================= SCRIPT AJAX ======================= -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#btnSimpanRating").click(function(e) {
        e.preventDefault();

        let formData = new FormData($("#formRating")[0]);

        $.ajax({
            url: "rating_simpan.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                if (!res.success) {
                    alert(res.msg || "Gagal menyimpan rating");
                    return;
                }

                let fotoHtml = res.foto ? `<img src="../assets/img/rating/${res.foto}" width="80">` : "-";

                $("#tabelRating tbody").prepend(`
                    <tr data-id="${res.id}">
                        <td>NEW</td>
                        <td>${res.nama_orang}</td>
                        <td>${res.komentar}</td>
                        <td>${res.lokasi}</td>
                        <td>${res.tanggal}</td>
                        <td>${fotoHtml}</td>
                        <td><button class="btn btn-danger btn-sm btnHapusRating">Hapus</button></td>
                    </tr>
                `);

                $("#modalTambahRating").modal("hide");
                $("#formRating")[0].reset();
            },
            error: function(xhr) {
                alert("AJAX ERROR: " + xhr.responseText);
            }
        });
    });

    $(document).on("click", ".btnHapusRating", function() {
        let row = $(this).closest("tr");
        let id = row.data("id");

        if (!confirm("Yakin ingin menghapus rating ini?")) return;

        $.post("rating_hapus.php", { id: id }, function(res) {
            if (res.success) {
                row.remove();
            } else {
                alert(res.msg || "Gagal menghapus rating");
            }
        }, "json");
    });
});
</script>
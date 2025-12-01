  <?php

  $dataPenjualan = query("SELECT * FROM penjualan");
  $allIkan = query("SELECT ikan.*, jenisIkan.jenisIkan
      FROM ikan
      JOIN jenisIkan ON jenisIkan.idJenisIkan = ikan.idJenisIkan
  ");



  // Logika tambah penjualan
if (isset($_POST['submitTambah'])) {

    // --- Ambil data utama (header) ---
    $tanggalPenjualan = date('Y-m-d');  // sudah fixed disabled di modal

    // Mengambil array dari form
    $idIkan       = $_POST['idIkan'];        // array
    $jumlah       = $_POST['jumlah'];        // array
    $hargaSatuan  = $_POST['hargaSatuan'];   // array (hasil cek harga)

    // Cek jika tidak ada ikan yang dipilih
    if (!is_array($idIkan) || count($idIkan) == 0) {
        echo "<script>alert('Pilih minimal satu ikan!');</script>";
        return;
    }

    // Hitung total harga keseluruhan sebelum insert header
    $totalHarga = 0;
    for ($i = 0; $i < count($idIkan); $i++) {
        $subtotal = $jumlah[$i] * $hargaSatuan[$i];
        $totalHarga += $subtotal;
    }

    // --- Insert ke tabel penjualan (header) ---
    $stmt = $db->prepare("INSERT INTO penjualan (tanggalPenjualan, totalHarga) 
                          VALUES (:tanggalPenjualan, :totalHarga)");
    $stmt->bindValue(':tanggalPenjualan', $tanggalPenjualan, SQLITE3_TEXT);
    $stmt->bindValue(':totalHarga', $totalHarga, SQLITE3_INTEGER);

    $insertHeader = $stmt->execute();

    if (!$insertHeader) {
        echo "<script>alert('Gagal menambahkan penjualan!');</script>";
        return;
    }

    // Ambil ID terakhir (header) untuk detail
    $idPenjualan = $db->lastInsertRowID();

    // --- Insert detail penjualan (loop) ---
    for ($i = 0; $i < count($idIkan); $i++) {

        $subtotal = $jumlah[$i] * $hargaSatuan[$i];

        $stmt2 = $db->prepare("INSERT INTO detailPenjualan 
            (idPenjualan, idIkan, jumlahPembelian, subtotal)
            VALUES (:idPenjualan, :idIkan, :jumlah, :subtotal)");

        $stmt2->bindValue(':idPenjualan', $idPenjualan, SQLITE3_INTEGER);
        $stmt2->bindValue(':idIkan', $idIkan[$i], SQLITE3_INTEGER);
        $stmt2->bindValue(':jumlah', $jumlah[$i], SQLITE3_INTEGER);
        $stmt2->bindValue(':subtotal', $subtotal, SQLITE3_INTEGER);

        $stmt2->execute();
    }

    // --- Jika semua sukses ---
    echo "<script>
        alert('Penjualan berhasil ditambahkan!');
        window.location.href='?page=penjualan_daftar';
    </script>";
}


  // Logika Ubah Jenis Ikan
  if (isset($_POST['submitUbah'])) {

      $id = intval($_POST['idJenisIkan']);
      $jenisBaru = trim($_POST['jenisIkan']);

      if ($jenisBaru !== "") {
          $stmt = $db->prepare("UPDATE jenisIkan SET jenisIkan = :jenis WHERE idJenisIkan = :id");
          $stmt->bindValue(':jenis', $jenisBaru, SQLITE3_TEXT);
          $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

          if ($stmt->execute()) {
              echo "<script>
                  alert('Data berhasil diubah!');
                  window.location.href='?page=jenis_daftar';
              </script>";
          } else {
              echo "<script>alert('Gagal mengubah data!');</script>";
          }
      }
  }

  ?>

  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Data Penjualan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Penjualan</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                
                <!-- /.card-header -->
                
              </div>
              <!-- /.card -->

              <div class="card">
                
                <!-- /.card-header -->
                <div class="card-body">
                  <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-tambah">
                    Tambah Data
                  </button>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Id Penjualan</th>
                      <th>Ikan</th>
                      <th>Tanggal Penjualan</th>
                      <th>Total Harga</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($dataPenjualan as $index => $p) { ?>
                    <tr>
                      <td><?= $index + 1 ?></td>
                      <td><?= $p['idPenjualan'] ?></td>
                      <td>
                        <?php $subPenjualan = query("SELECT * FROM subPenjualan
                            JOIN penjualan ON penjualan.idPenjualan = subPenjualan.idPenjualan
                            JOIN ikan ON ikan.idIkan = subPenjualan.idIkan
                            JOIN jenisIkan ON jenisIkan.idJenisIkan = ikan.idJenisIkan
                            WHERE penjualan.idPenjualan = {$p['idPenjualan']}
                        ");
                        foreach($subPenjualan as $s) {?>
                        <?= $s['jenisIkan'] . " " . $s['ukuran'] . " " . $s['gender'] . "(" . $s['jumlahPembelian'] . ")" . "<br>" ?>
                        
                        <?php } ?>
                    </td>
                    <td><?= $p['tanggalPenjualan'] ?></td>
                    <td>Rp. <?= number_format($s['harga'], 0, ',', '.') ?></td>
                    <td><?= $p['statusPenjualan'] ?></td>
                      <td>
                        <button type="button" 
                      class="btn btn-warning btn-sm btn-edit" 
                      href="#"
                      data-toggle="modal" 
                      data-target="#modal-ubah-penjualan"
                      data-id="<?= $p['idPenjualan']; ?>"
                      data-status="<?= $p['statusPenjualan']; ?>"
                    >
                        <i class="fa fa-cog"></i>

                        </button>
                      <a class="btn btn-danger btn-sm" href="?page=jenis_hapus&id=<?= $p['idPenjualan'] ?>">
                          <i class="fa fa-times" aria-hidden="true"></i>
                      </a>
                      </td>
                    </tr>
                    <?php } ?>
                  
                    </tbody>
                    
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>


    <!-- Tambah data jenis -->
    <div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Tambah Penjualan</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form method="post">

                <div class="modal-body">

                    <!-- Tanggal -->
                    <div class="form-group">
                        <label>Tanggal Penjualan</label>
                        <input type="text" class="form-control" value="<?= date('Y-m-d') ?>" disabled>
                    </div>

                    <!-- MULTI SELECT IKAN -->
                    <div class="form-group">
                        <label>Pilih Ikan (Multi Select)</label>
                        <select id="selectIkan" class="form-control" multiple size="8">
                            <?php foreach($allIkan as $i): ?>
                                <option 
                                    value="<?= $i['idIkan'] ?>"
                                    data-harga="<?= $i['harga'] ?>"
                                    data-nama="<?= $i['jenisIkan'] . ' ' . $i['ukuran'] . ' (' . $i['gender'] . ')' ?>"
                                >
                                    <?= $i['jenisIkan'] ?> - <?= $i['ukuran'] ?> (<?= $i['gender'] ?>) - Rp <?= number_format($i['harga'],0,',','.') ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-muted">* tekan CTRL untuk memilih banyak ikan</small>
                    </div>

                    <!-- TEMPAT MENAMPILKAN INPUT JUMLAH -->
                    <div id="jumlahWrapper"></div>

                    <!-- TOTAL HARGA -->
                    <div class="mt-3">
                        <button type="button" id="cekHarga" class="btn btn-info">Cek Total Harga</button>

                        <h4 class="mt-3">
                            Total: <span id="totalHarga">Rp 0</span>
                        </h4>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" id="btnSimpan" name="submitTambah" class="btn btn-primary" disabled>
                        Tambah Penjualan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

        <!-- Tambah data jenis -->

        <div class="modal fade" id="modal-ubah-penjualan">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Update Status Penjualan</h4>
              <button type="button" class="close" data-dismiss="modal">
                  <span>&times;</span>
              </button>
          </div>

          <form method="post">
          <div class="modal-body">

              <input type="hidden" name="idJenisIkan" id="edit_id">
                        
              <div class="form-group">
                  <label for="edit_status">Update Status</label>
                  <select class="form-control" id="edit_status" name="statusPenjualan">
                    <option>Diproses</option>
                    <option>Selesai</option>
                    <option>Gagal</option>
                  </select>
              </div>

          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="submitUbah" class="btn btn-primary">Simpan Perubahan</button>
          </div>
          </form>

      </div>
      </div>
</div>

<script>
  // Fitur Tambah Penjualan
let selectIkan = document.getElementById("selectIkan");
let jumlahWrapper = document.getElementById("jumlahWrapper");
let totalHarga = document.getElementById("totalHarga");
let cekHarga = document.getElementById("cekHarga");
let btnSimpan = document.getElementById("btnSimpan");

// Saat memilih ikan → tampilkan input jumlah
selectIkan.addEventListener("change", function() {
    jumlahWrapper.innerHTML = ""; // reset

    [...this.selectedOptions].forEach(opt => {
        jumlahWrapper.innerHTML += `
            <div class="form-group">
                <label>${opt.dataset.nama} — Rp ${parseInt(opt.dataset.harga).toLocaleString('id-ID')}</label>
                <input type="number" min="1" value="1" 
                    class="form-control jumlahInput" 
                    name="jumlah[${opt.value}]">
            </div>
        `;
    });

    totalHarga.innerHTML = "Rp 0";
    btnSimpan.disabled = true; 
});

// Tombol cek harga
cekHarga.addEventListener("click", function() {
    let amount = 0;

    [...selectIkan.selectedOptions].forEach(opt => {
        let harga = parseInt(opt.dataset.harga);
        let jumlah = document.querySelector(`input[name="jumlah[${opt.value}]"]`).value;
        amount += harga * jumlah;
    });

    totalHarga.innerHTML = "Rp " + amount.toLocaleString('id-ID');

    // aktifkan tombol simpan
    btnSimpan.disabled = false;
});

</script>


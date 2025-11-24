  <?php

  $dataIkan = query("SELECT * FROM ikan
  JOIN jenisIKan ON ikan.idJenisIkan = jenisIkan.idJenisIkan
  ORDER BY idIkan DESC");
  $jenisIkan = query("SELECT * FROM jenisIKan");


//tambah jenis ikan
if (isset($_POST['submitTambah'])) {

    $idJenisIkan = trim($_POST['idJenisIkan']);
    $ukuran      = trim($_POST['ukuran']);
    $gender      = trim($_POST['gender']);
    $stokIkan    = trim($_POST['stokIkan']);
    $harga       = trim($_POST['harga']);
    $deskripsi   = trim($_POST['deskripsi']);
    $gambarIkan = uploadGambar($_FILES['gambarIkan']);

    $gambar = null;
    if ($gambarIkan['status']) {
        $gambar = $gambarIkan['file'];
    } else {
        echo "<script>alert('".$gambarIkan['msg']."'); window.location.href='?page=ikan_daftar';</script>";
        return;
    }

    $stmt = $db->prepare("
        INSERT INTO ikan (
            idJenisIkan,
            ukuran,
            gender,
            stokIkan,
            harga,
            deskripsi,
            gambarIkan
        ) VALUES (
            :idJenis,
            :ukuran,
            :gender,
            :stok,
            :harga,
            :deskripsi,
            :gambar
        )
    ");

    // Bind value
    $stmt->bindValue(':idJenis',    $idJenisIkan, SQLITE3_TEXT);
    $stmt->bindValue(':ukuran',     $ukuran,      SQLITE3_TEXT);
    $stmt->bindValue(':gender',     $gender,      SQLITE3_TEXT);
    $stmt->bindValue(':stok',       $stokIkan,    SQLITE3_INTEGER);
    $stmt->bindValue(':harga',      $harga,       SQLITE3_INTEGER);
    $stmt->bindValue(':deskripsi',  $deskripsi,   SQLITE3_TEXT);
    $stmt->bindValue(':gambar',     $gambar,  SQLITE3_TEXT);

    $execute = $stmt->execute();

    if ($execute) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            window.location.href='?page=ikan_daftar';
        </script>";
    } else {
        echo "<script>alert('Gagal menambahkan data!'); window.location.href='?page=ikan_daftar';</script>";
    }
}


 // Logika Ubah Data Ikan
if (isset($_POST['submitEdit'])) {

    $idIkan      = intval($_POST['idIkan']);
    $idJenisIkan = intval($_POST['idJenisIkan']);
    $ukuran      = trim($_POST['ukuran']);
    $gender      = trim($_POST['gender']);
    $stokIkan    = intval($_POST['stokIkan']);
    $harga       = intval($_POST['harga']);
    $deskripsi   = trim($_POST['deskripsi']);
    $gambarLama  = trim($_POST['gambarLama']); 
    // ===== CEK GAMBAR BARU =====
    if ($_FILES['gambarIkan']['error'] === UPLOAD_ERR_NO_FILE) {

        // Tidak ada file upload, pakai gambar lama
        $gambarFinal = $gambarLama;

    } else {

        // Upload gambar baru
        $upload = uploadGambar($_FILES['gambarIkan']);

        if ($upload['status']) {
            $gambarFinal = $upload['file'];

            // Hapus gambar lama
            $pathLama = "../assets/img/ikan/" . $gambarLama;
            if (file_exists($pathLama)) {
                unlink($pathLama);
            }

        } else {
            // Jika gagal upload maka tetap pakai yang lama
            $gambarFinal = $gambarLama;
        }
    }

    $stmt = $db->prepare("
        UPDATE ikan SET
            idJenisIkan = :jenis,
            ukuran      = :ukuran,
            gender      = :gender,
            stokIkan    = :stok,
            harga       = :harga,
            deskripsi   = :desk,
            gambarIkan  = :gambar
        WHERE idIkan = :id
    ");

    $stmt->bindValue(':jenis',  $idJenisIkan, SQLITE3_INTEGER);
    $stmt->bindValue(':ukuran', $ukuran,      SQLITE3_TEXT);
    $stmt->bindValue(':gender', $gender,      SQLITE3_TEXT);
    $stmt->bindValue(':stok',   $stokIkan,    SQLITE3_INTEGER);
    $stmt->bindValue(':harga',  $harga,       SQLITE3_INTEGER);
    $stmt->bindValue(':desk',   $deskripsi,   SQLITE3_TEXT);
    $stmt->bindValue(':gambar', $gambarFinal, SQLITE3_TEXT);
    $stmt->bindValue(':id',     $idIkan,      SQLITE3_INTEGER);

    if ($stmt->execute()) {
        echo "<script>
            alert('Data ikan berhasil diubah!');
            window.location.href='?page=ikan_daftar';
        </script>";
    } else {
        echo "<script>alert('Gagal mengubah data!');</script>";
    }
}



  ?>

  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Jenis Ikan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Jenis Ikan</li>
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
                      <th>Gambar</th>
                      <th>Jenis Ikan</th>
                      <th>Ukuran</th>
                      <th>Gender</th>
                      <th>Stok Ikan</th>
                      <th>Harga</th>
                      <th>Deskripsi</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($dataIkan as $index => $i) { ?>
                    <tr>
                      <td><?= $index + 1 ?></td>
                      <td><img src="../assets/img/ikan/<?= $i['gambarIkan'] ?>" class="img-fluid rounded"style="width: 80px; height: 80px; object-fit: cover;" alt="Gambar gagal di load"></td>
                      <td><?= $i['jenisIkan'] ?></td>
                      <td><?= $i['ukuran'] ?></td>
                      <td><?= $i['gender'] ?></td>
                      <td><?= $i['stokIkan'] ?></td>
                      <td><?= $i['harga'] ?></td>
                      <td><?= $i['deskripsi'] ?></td>
                      <td>
                        <button 
                            class="btn btn-warning btn-sm btn-edit-ikan"
                            data-toggle="modal"
                            data-target="#modal-edit-ikan"
                            data-id="<?= $i['idIkan'] ?>"
                            data-jenisid="<?= $i['idJenisIkan'] ?>"
                            data-ukuran="<?= $i['ukuran'] ?>"
                            data-gender="<?= $i['gender'] ?>"
                            data-stok="<?= $i['stokIkan'] ?>"
                            data-harga="<?= $i['harga'] ?>"
                            data-deskripsi="<?= $i['deskripsi'] ?>"
                            data-gambar="<?= $i['gambarIkan'] ?>"
                        >
                            <i class="fa fa-edit"></i>
                        </button>

                        <a href="?page=ikan_hapus&id=<?= $i['idIkan'] ?>" 
                          class="btn btn-danger btn-sm">
                          <i class="fa fa-trash"></i>
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
                <h4 class="modal-title">Tambah Data Ikan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                      <label for="Jenis">Jenis Ikan</label>
                      <select name="idJenisIkan" id="jenis" class="form-control" placeholder="Masukkan Jenis Ikan">
                        <option>--- Data Jenis Ikan ---</option>
                        <?php foreach($jenisIkan as $j) { ?>
                        <option value="<?= $j['idJenisIkan'] ?>"><?= $j['jenisIkan'] ?></option>
                        <?php } ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="ukuran">Ukuran</label>
                      <input type="text" name="ukuran" class="form-control" id="ukuran">
                  </div>
                  <div class="form-group">
                      <label for="gender">Gender</label>
                      <input type="text" name="gender" class="form-control" id="gender">
                  </div>
                  <div class="form-group">
                      <label for="stokIkan">Stok Ikan</label>
                      <input type="text" name="stokIkan" class="form-control" id="stokIkan">
                  </div>
                  <div class="form-group">
                      <label for="harga">Harga</label>
                      <input type="text" name="harga" class="form-control" id="harga">
                  </div>
                  <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <input type="text" name="deskripsi" class="form-control" id="deskripsi">
                  </div>
                  <div class="form-group">
                      <label for="gambarIkan">Gambar Ikan</label>
                      <input type="file" name="gambarIkan" class="form-control" id="gambarIkan">
                  </div>


              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="submitTambah" class="btn btn-primary">Save changes</button>
              </div>
            </form> 

            </div>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- Tambah data jenis -->

    <!-- Edit Data Ikan -->
    <div class="modal fade" id="modal-edit-ikan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Ikan</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <input type="hidden" name="idIkan" id="edit_idIkan">
                        <input type="hidden" name="gambarLama" id="edit_gambar_lama">

                        <div class="form-group">
                          <label for="Jenis">Jenis Ikan</label>
                          <select name="idJenisIkan" id="edit_jenisIkan" class="form-control">
                            <option value="">--- Pilih Jenis Ikan ---</option>
                            <?php foreach($jenisIkan as $j): ?>
                                <option value="<?= $j['idJenisIkan'] ?>">
                                    <?= $j['jenisIkan'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>


                        </div>

                        <div class="form-group">
                            <label>Ukuran</label>
                            <input type="text" name="ukuran" id="edit_ukuran" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <input type="text" name="gender" id="edit_gender" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" name="stokIkan" id="edit_stok" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" id="edit_harga" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" id="edit_deskripsi" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Gambar Saat Ini</label><br>
                            <img id="edit_preview" src="" width="120" style="border-radius:5px;">
                        </div>

                        <div class="form-group">
                            <label>Gambar Baru (opsional)</label>
                            <input type="file" name="gambarIkan" class="form-control">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="submitEdit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Ubah Data Ikan -->
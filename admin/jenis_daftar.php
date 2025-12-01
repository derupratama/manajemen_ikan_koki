  <?php

  $dataIkan = query("SELECT * FROM jenisIkan");


  //Logika tambah jenis ikan
  if (isset($_POST['submitTambah'])) {

      $jenisIkan = trim($_POST['jenisIkan']);

      if ($jenisIkan !== "") {
          $stmt = $db->prepare("INSERT INTO jenisIkan (jenisIkan) VALUES (:jenis)");
          $stmt->bindValue(':jenis', $jenisIkan, SQLITE3_TEXT);

          $execute = $stmt->execute();

          if ($execute) {
              echo "<script>
                  alert('Data berhasil ditambahkan!');
                  window.location.href='?page=jenis_daftar';
              </script>";
          } else {
              echo "<script>alert('Gagal menambahkan data!');</script>";
          }
      }
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
                      <th>Jenis Ikan</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($dataIkan as $index => $j) { ?>
                    <tr>
                      <td><?= $index + 1 ?></td>
                      <td><?= $j['jenisIkan'] ?></td>
                      <td>
                        <button type="button" 
                      class="btn btn-warning btn-sm btn-edit" 
                      href="#"
                      data-toggle="modal" 
                      data-target="#modal-ubah-jenis-ikan"
                      data-id="<?= $j['idJenisIkan']; ?>"
                      data-jenis="<?= $j['jenisIkan']; ?>"
                    >
                        <i class="fa fa-cog"></i>

                        </button>
                      <a class="btn btn-danger btn-sm" href="?page=jenis_hapus&id=<?= $j['idJenisIkan'] ?>">
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
                <h4 class="modal-title">Tambah Jenis Ikan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post">
              <div class="modal-body">
                <div class="form-group">
                      <label for="inputJenis">Jenis Ikan</label>
                      <input type="text" name="jenisIkan" class="form-control" id="inputJenis" placeholder="Masukkan Jenis Ikan">
                  </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="submitTambah" class="btn btn-primary">Save changes</button>
              </div>
            </form> 

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- Tambah data jenis -->

        <div class="modal fade" id="modal-ubah-jenis-ikan">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Ubah Data Jenis Ikan</h4>
              <button type="button" class="close" data-dismiss="modal">
                  <span>&times;</span>
              </button>
          </div>

          <form method="post">
          <div class="modal-body">

              <input type="hidden" name="idJenisIkan" id="edit_id">
                        
              <div class="form-group">
                  <label for="edit_jenis">Jenis Ikan</label>
                  <input type="text" name="jenisIkan" class="form-control" id="edit_jenis">
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


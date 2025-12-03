  <?php

  $dataPenjualan = query("SELECT * FROM penjualan
  WHERE statusPenjualan IN ('Gagal', 'Selesai')
  ORDER BY idPenjualan DESC");




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
                  
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Id Penjualan</th>
                      <th>Ikan</th>
                      <th>Tanggal Penjualan</th>
                      <th>Total Harga</th>
                      <th>Status</th>
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
                    <td>Rp. <?= number_format($p['totalHarga'], 0, ',', '.') ?></td>
                    <td><?= $p['statusPenjualan'] ?></td>
                      
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


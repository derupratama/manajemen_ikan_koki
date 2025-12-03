<?php

$dataIkan = query("SELECT * FROM ikan
  JOIN jenisIKan ON ikan.idJenisIkan = jenisIkan.idJenisIkan
  WHERE stokIkan != 0");


?>

<main>
    <section id="produk" class="produk-section py-5">
  <div class="container">
    <h2 class="text-center mb-4">Koleksi Mas Koki Pilihan</h2>

    <div class="row" id="product-list">

      <?php foreach($dataIkan as $index => $i) { ?>
          <div class="col-md-4 col-lg-3 mb-4">
              <div class="product-card card h-100 shadow-sm"
                data-name="<?= strtolower($i['jenisIkan'] . ' ' . $i['ukuran'] . ' ' . $i['gender']) ?>" >

                  <img src="../assets/img/ikan/<?= $i['gambarIkan'] ?>" 
                       class="card-img-top" 
                       alt="<?= $i['deskripsi'] ?>"
                       style="object-fit: cover; height: 180px;">

                  <div class="card-body d-flex flex-column">
                      <h5 class="card-title">
                        <?= $i['jenisIkan'] . ' ' . $i['ukuran'] . '(' . $i['gender'] . ')' ?>
                      </h5>

                      <p class="card-text text-muted" style="flex-grow:1;">
                        <?= $i['deskripsi'] ?>
                      </p>

                      <h6 class="text-primary font-weight-bold mb-3">
                        Rp. <?= $i['harga'] ?>
                      </h6>

                      <button 
                        class="btn btn-outline-primary mb-2 w-100" 
                        onclick="showDetail('<?= $i['jenisIkan'] ?>','<?= $i['ukuran'] ?> (<?= $i['gender'] ?>)',<?= $i['harga'] ?>,<?= $i['stokIkan']?>,'<?= $i['deskripsi'] ?>')">
                        Detail
                      </button>

                      <a href="https://wa.me/<?= $admin['noHp'] ?>?text=Halo, saya ingin membeli <?= $i['jenisIkan'] ?> seharga Rp <?= $i['harga'] ?>" 
                        target="_blank" 
                        class="btn btn-success w-100">
                        Beli Sekarang
                      </a>
                  </div>

              </div>
          </div>
      <?php } ?>

    </div>


</main>
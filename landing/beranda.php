<?php

$dataIkan = query("SELECT * FROM ikan
  JOIN jenisIKan ON ikan.idJenisIkan = jenisIkan.idJenisIkan
  WHERE stokIkan != 0
  ORDER BY idJenisIkan DESC");

$rating = query("SELECT * FROM rating");


?>

<section class="hero">
  <div class="container">
    <h1>Temukan Keindahan Mas Koki Premium Terbaik</h1>
    <p>Koleksi ikan hias dengan kualitas kontes, sehat, dan menawan.</p>
    <a href="?page=produk" class="cta-button">Lihat Koleksi Ikan </a>
  </div>
</section>

<section id="produk" class="produk-section py-5">
  <div class="container">
    <h2 class="text-center mb-4">Koleksi Mas Koki Pilihan</h2>

    <div class="row" id="product-list">

      <?php foreach($dataIkan as $index => $i) { 
        if($index >= 8) break;?>
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
                        Rp. <?= number_format($i['harga'], 0, ',', '.') ?>

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

    <div class="text-center mt-4">
      <a href="?page=produk" class="btn btn-primary px-4 py-2">
        Lihat Semua Ikan
      </a>
    </div>

  </div>
</section>

    <section id="testimoni" class="testimoni-section">
        <div class="container">
            <h2><i class="fas fa-quote-left"></i> Apa Kata Mereka?</h2>
            
            <div class="testimonial-carousel">
              <?php foreach($rating as $index => $r) { ?>
                <div class="testi-card <?= $index === 0 ? 'active' : '' ?>">
                    <div class="rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p class="quote">"<?= $r['isiRating'] ?>"</p>
                    <div class="author"><img src="../assets/img/rating/<?= $r['foto'] ?>" alt="Avatar Pelanggan A"><span><?= $r['namaOrang'] . " - " . $r['lokasi'] ?></span></div>
                </div>
              
                <?php } ?>

      
            </div>
            
            <div class="carousel-nav">
                <button onclick="prevTesti()" class="nav-button"><i class="fas fa-arrow-left"></i></button>
                <button onclick="nextTesti()" class="nav-button"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
    </section>

<div class="contact-section">
  <!-- Kiri: Teks Kontak -->
  <div class="contact-info">
    <h3>Contact Us</h3>
    <h4>Kiyay Gold Fish</h4>
    <p>Pringsewu, Margodadi, Ambarawa, Lampung 35376</p>
    <p>Phone: 0887 0649 7974</p>
    <p>Email: kiyaygoldfish@gmail.com</p>
    <p>Instagram: @kiyaygoldfish</p>
    <p>TikTok: @kiyaygoldfish</p>
  </div>

  <!-- Kanan: Peta -->
  <div class="contact-map">
    <iframe
      src="https://maps.google.com/maps?width=400&height=250&hl=en&q=Kiyay%20Gold%20Fish%20Pringsewu&t=&z=15&ie=UTF8&iwloc=B&output=embed"
      frameborder="0"
      allowfullscreen=""
      loading="lazy">
    </iframe>
  </div>
</div>


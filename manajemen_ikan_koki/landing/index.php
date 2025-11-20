<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kiyay Gold Fish - Jual Ikan Mas Koki Premium</title>
  <link rel="stylesheet" href="../assets/css/main.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<header class="header">
  <nav class="container">
    <a href="#" class="logo">🐠 Kiyay Gold Fish</a>
    <div class="header-right">
      <form id="search-form" class="search-form">
        <input type="text" id="search-input" placeholder="Cari Ikan..." aria-label="Cari Ikan">
        <button type="submit" title="Cari"><i class="fas fa-search"></i></button>
      </form>

      <ul>
        <li><a href="?page=beranda">Beranda</a></li>
        <li><a href="?page=semua_produk">Produk</a></li>
        <li><a href="?page=beranda#testimoni">Testimoni</a></li>
        <li><a href="?page=beranda#kontak" class="cta-nav">Hubungi Kami</a></li>
      </ul>
    </div>
  </nav>
</header>

<main>

  <?php
    $pages = (isset($_GET['page'])) ? $_GET['page'] : 'beranda';

    require $pages . '.php';

?>

</main>

    <footer id="kontak" class="footer">
        <div class="container">
            <p>&copy; 2025 Kiyay Gold Fish. Solusi Ikan Mas Koki Premium Anda.</p>
           
        </div>
    </footer>

    <a href="https://wa.me/6288706497974?text=Halo%20Kiyay%20Gold%20Fish%2C%20saya%20mau%20bertanya%20tentang%20koleksi%20ikan." target="_blank" class="floating-wa" title="Chat via WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
    
    <div id="detailModal" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="closeDetail()">&times;</span>
            <h3 id="detailName"></h3>
            <p id="detailSpecs"></p>
            <hr>
            <h4>Deskripsi:</h4>
            <p id="detailDesc"></p>
            <hr>
            <p class="detail-stock">Stok Tersisa: <span id="detailStock"></span> ekor</p>
            <p class="detail-price">Harga: <span id="detailPrice"></span></p>
            <a id="detailWaLink" href="#" target="_blank" class="wa-buy-button full-width-wa">Pesan Sekarang via WhatsApp</a>
        </div>
    </div>

    <div id="cartModal" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="toggleCartModal()">&times;</span>
            <h3><i class="fas fa-shopping-cart"></i> Keranjang Sementara</h3>
            <div id="cart-items">
                <p class="empty-cart-message">Keranjang Anda kosong.</p>
            </div>
            <div class="cart-summary">
                <p>Total Item: <span id="cart-total-items">0</span> ekor</p>
                <p>Total Harga: <span id="cart-total-price">Rp 0</span></p>
            </div>
            <a id="checkoutWaLink" href="#" target="_blank" class="wa-buy-button full-width-wa disabled"><i class="fab fa-whatsapp"></i> Proses Checkout (Kirim WA)</a>
        </div>
    </div>
    
<script src="../assets/js/main.js" defer></script>
   
</body>
</html>
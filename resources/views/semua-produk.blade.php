<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Semua Produk</title>
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}">
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
        <li><a href="/">Beranda</a></li>
        <li><a href="#produk">Produk</a></li>
        <li><a href="/#testimoni">Testimoni</a></li>
        <li><a href="/#kontak" class="cta-nav">Hubungi Kami</a></li>
      </ul>
    </div>
  </nav>
</header>

    <section class="produk-section">
        <div class="container">
            <h2><i class="fas fa-fish"></i> Semua Koleksi Mas Koki</h2>
            <div class="product-grid">

                {{-- 1 --}}
                <div class="product-card">
                    <img src="https://i0.wp.com/gpriority.co.id/wp-content/uploads/2023/01/images-45-1.jpeg?ssl=1" alt="Oranda Red Cap">
                    <h3>Oranda Red Cap</h3>
                    <p>Oranda dengan hood besar dan warna merah cerah, siap kontes.</p>
                    <span class="price">Rp 550.000</span>
                    <button class="detail-button" style="margin-bottom : 10px; border-radius: 8px; padding : 10px 18px; display: inline-block; width: 316px" onclick="showDetail('Ryukin Calico','Size S (8cm) | Grade A | Ekor Panjang',220000,8,'Jenis Ryukin dengan corak calico tiga warna.')">Detail</button>
                    <a href="https://wa.me/6288706497974?text={{ urlencode('Halo, saya ingin membeli Oranda Red Cap seharga Rp 550.000') }}" target="_blank" class="buy-button">Beli Sekarang</a>
                </div>

                {{-- 2 --}}
                <div class="product-card">
                    <img src="https://i0.wp.com/gpriority.co.id/wp-content/uploads/2023/01/images-45-1.jpeg?ssl=1" alt="Ranchu Premium">
                    <h3>Ranchu Premium</h3>
                    <p>Ranchu berekor pendek, kepala besar, dan tubuh kokoh.</p>
                    <span class="price">Rp 300.000</span>
                    <button class="detail-button" style="margin-bottom : 10px; border-radius: 8px; padding : 10px 18px; display: inline-block; width: 316px" onclick="showDetail('Ryukin Calico','Size S (8cm) | Grade A | Ekor Panjang',220000,8,'Jenis Ryukin dengan corak calico tiga warna.')">Detail</button>
                    <a href="https://wa.me/6288706497974?text={{ urlencode('Halo, saya ingin membeli Ranchu Premium seharga Rp 300.000') }}" target="_blank" class="buy-button">Beli Sekarang</a>
                </div>

                {{-- 3 --}}
                <div class="product-card">
                    <img src="https://i0.wp.com/gpriority.co.id/wp-content/uploads/2023/01/images-45-1.jpeg?ssl=1" alt="Ryukin Calico">
                    <h3>Ryukin Calico</h3>
                    <p>Ryukin dengan corak calico tiga warna dan sirip panjang elegan.</p>
                    <span class="price">Rp 220.000</span>
                    <button class="detail-button" style="margin-bottom : 10px; border-radius: 8px; padding : 10px 18px; display: inline-block; width: 316px" onclick="showDetail('Ryukin Calico','Size S (8cm) | Grade A | Ekor Panjang',220000,8,'Jenis Ryukin dengan corak calico tiga warna.')">Detail</button>
                    <a href="https://wa.me/6288706497974?text={{ urlencode('Halo, saya ingin membeli Ryukin Calico seharga Rp 220.000') }}" target="_blank" class="buy-button">Beli Sekarang</a>
                </div>

                {{-- 4 --}}
                <div class="product-card">
                    <img src="https://i0.wp.com/gpriority.co.id/wp-content/uploads/2023/01/images-45-1.jpeg?ssl=1" alt="Lionhead Gold">
                    <h3>Lionhead Gold</h3>
                    <p>Lionhead tanpa sirip punggung, tubuh bulat, warna keemasan memukau.</p>
                    <span class="price">Rp 280.000</span>
                    <button class="detail-button" style="margin-bottom : 10px; border-radius: 8px; padding : 10px 18px; display: inline-block; width: 316px" onclick="showDetail('Ryukin Calico','Size S (8cm) | Grade A | Ekor Panjang',220000,8,'Jenis Ryukin dengan corak calico tiga warna.')">Detail</button>
                    <a href="https://wa.me/6288706497974?text={{ urlencode('Halo, saya ingin membeli Lionhead Gold seharga Rp 280.000') }}" target="_blank" class="buy-button">Beli Sekarang</a>
                </div>

                {{-- 5 --}}
                <div class="product-card">
                    <img src="https://i0.wp.com/gpriority.co.id/wp-content/uploads/2023/01/images-45-1.jpeg?ssl=1" alt="Black Moor">
                    <h3>Black Moor</h3>
                    <p>Ikan eksotik berwarna hitam pekat dengan mata teleskop unik.</p>
                    <span class="price">Rp 250.000</span>
                    <button class="detail-button" style="margin-bottom : 10px; border-radius: 8px; padding : 10px 18px; display: inline-block; width: 316px" onclick="showDetail('Ryukin Calico','Size S (8cm) | Grade A | Ekor Panjang',220000,8,'Jenis Ryukin dengan corak calico tiga warna.')">Detail</button>
                    <a href="https://wa.me/6288706497974?text={{ urlencode('Halo, saya ingin membeli Black Moor seharga Rp 250.000') }}" target="_blank" class="buy-button">Beli Sekarang</a>
                </div>

                {{-- 6 --}}
                <div class="product-card">
                    <img src="https://i0.wp.com/gpriority.co.id/wp-content/uploads/2023/01/images-45-1.jpeg?ssl=1" alt="Bubble Eye">
                    <h3>Bubble Eye</h3>
                    <p>Memiliki gelembung di bawah mata dan gerakan renang yang lembut.</p>
                    <span class="price">Rp 270.000</span>
                    <button class="detail-button" style="margin-bottom : 10px; border-radius: 8px; padding : 10px 18px; display: inline-block; width: 316px" onclick="showDetail('Ryukin Calico','Size S (8cm) | Grade A | Ekor Panjang',220000,8,'Jenis Ryukin dengan corak calico tiga warna.')">Detail</button>
                    <a href="https://wa.me/6288706497974?text={{ urlencode('Halo, saya ingin membeli Bubble Eye seharga Rp 270.000') }}" target="_blank" class="buy-button">Beli Sekarang</a>
                </div>

            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Kiyay Gold Fish. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }
        
        .produk-section {
            padding: 60px 0;
            text-align: center;
        }
        .produk-section h2 {
            font-size: 2rem;
            color: #222;
            margin-bottom: 40px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
            gap: 25px;
        }
        .product-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .product-card img {
            width: 100%;
            border-radius: 12px;
            margin-bottom: 15px;
        }
        .product-card h3 {
            color: #1a237e;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .product-card p {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 10px;
        }
        .price {
            display: block;
            font-weight: 600;
            color: #e67e22;
            margin-bottom: 15px;
        }
        .buy-button {
            display: inline-block;
            background: #25D366;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.3s ease;
        }
        .buy-button:hover {
            background: #128C7E;
        }
        .footer {
            background: #1A237E;
            color: white;
            text-align: center;
            padding: 20px 10px;
            margin-top: 40px;
        }
        .back-home {
            color: #f1c40f;
            display: inline-block;
            margin-bottom: 10px;
            text-decoration: none;
        }
    </style>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kiyay Gold Fish - Jual Ikan Mas Koki Premium</title>
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
        <li><a href="#produk">Beranda</a></li>
        <li><a href="semua-produk">Produk</a></li>
        <li><a href="#testimoni">Testimoni</a></li>
        <li><a href="#kontak" class="cta-nav">Hubungi Kami</a></li>
      </ul>
    </div>
  </nav>
</header>

<section class="hero">
  <div class="container">
    <h1>Temukan Keindahan Mas Koki Premium Terbaik</h1>
    <p>Koleksi ikan hias dengan kualitas kontes, sehat, dan menawan.</p>
    <a href="#produk" class="cta-button">Lihat Koleksi Ikan </a>
  </div>
</section>

<section id="produk" class="produk-section">
  <div class="container">
    <h2>Koleksi Mas Koki Pilihan</h2>
    <div class="product-grid" id="product-list">

      {{-- PERUBAHAN DARI SINI: Tambahkan hingga 6 produk dan ubah tombol beli --}}
      <div class="product-card" data-name="Oranda Red Cap">
        <img src="https://i0.wp.com/gpriority.co.id/wp-content/uploads/2023/01/images-45-1.jpeg?ssl=1" alt="Oranda Red Cap">
        <h3>Oranda Red Cap</h3>
        <p>Oranda dengan hood besar dan warna merah cerah.</p>
        <span class="price">Rp 550.000</span>
        <button class="detail-button" style="margin-bottom : 10px; border-radius: 8px; padding : 10px 18px; display: inline-block; width: 295px" onclick="showDetail('Ryukin Calico','Size S (8cm) | Grade A | Ekor Panjang',220000,8,'Jenis Ryukin dengan corak calico tiga warna.')">Detail</button>
        <a href="https://wa.me/6288706497974?text={{ urlencode('Halo, saya ingin membeli Ranchu Premium seharga Rp 300.000') }}" target="_blank" class="buy-button">Beli Sekarang</a>
        
      </div>

      <div class="product-card" data-name="Ranchu Premium">
        <img src="https://i0.wp.com/gpriority.co.id/wp-content/uploads/2023/01/images-45-1.jpeg?ssl=1" alt="Ranchu Premium">
        <h3>Ranchu Premium</h3>
        <p>Ranchu dengan body kokoh dan warna stabil.</p>
        <span class="price">Rp 300.000</span>
        <button class="detail-button" style="margin-bottom : 10px; border-radius: 8px; padding : 10px 18px; display: inline-block; width: 295px" onclick="showDetail('Ryukin Calico','Size S (8cm) | Grade A | Ekor Panjang',220000,8,'Jenis Ryukin dengan corak calico tiga warna.')">Detail</button>
        <a href="https://wa.me/6288706497974?text={{ urlencode('Halo, saya ingin membeli Ranchu Premium seharga Rp 300.000') }}" target="_blank" class="buy-button">Beli Sekarang</a>
      </div>

      <div class="product-card" data-name="Ryukin Calico">
        <img src="https://i0.wp.com/gpriority.co.id/wp-content/uploads/2023/01/images-45-1.jpeg?ssl=1" alt="Ryukin Calico">
        <h3>Ryukin Calico</h3>
        <p>Ryukin dengan corak calico unik dan ekor panjang.</p>
        <span class="price">Rp 220.000</span>
        <button class="detail-button" style="margin-bottom : 10px; border-radius: 8px; padding : 10px 18px; display: inline-block; width: 295px" onclick="showDetail('Ryukin Calico','Size S (8cm) | Grade A | Ekor Panjang',220000,8,'Jenis Ryukin dengan corak calico tiga warna.')">Detail</button>
        <a href="https://wa.me/6288706497974?text={{ urlencode('Halo, saya ingin membeli Ranchu Premium seharga Rp 300.000') }}" target="_blank" class="buy-button">Beli Sekarang</a>
      </div>

      <div class="product-card" data-name="Lionhead Classic">
        <img src="https://i0.wp.com/gpriority.co.id/wp-content/uploads/2023/01/images-45-1.jpeg?ssl=1" alt="Lionhead Classic">
        <h3>Lionhead Classic</h3>
        <p>Ikan tanpa sirip punggung dengan kepala besar khas singa.</p>
        <span class="price">Rp 275.000</span>
        <button class="detail-button" style="margin-bottom : 10px; border-radius: 8px; padding : 10px 18px; display: inline-block; width: 295px" onclick="showDetail('Ryukin Calico','Size S (8cm) | Grade A | Ekor Panjang',220000,8,'Jenis Ryukin dengan corak calico tiga warna.')">Detail</button>
        <a href="https://wa.me/6288706497974?text={{ urlencode('Halo, saya ingin membeli Ranchu Premium seharga Rp 300.000') }}" target="_blank" class="buy-button">Beli Sekarang</a>
      </div>

      <div class="product-card" data-name="Tosakin Elegant">
        <img src="https://i0.wp.com/gpriority.co.id/wp-content/uploads/2023/01/images-45-1.jpeg?ssl=1" alt="Tosakin Elegant">
        <h3>Tosakin Elegant</h3>
        <p>Sirip ekor melebar seperti kipas, sangat indah dilihat dari atas.</p>
        <span class="price">Rp 400.000</span>
        <button class="detail-button" style="margin-bottom : 10px; border-radius: 8px; padding : 10px 18px; display: inline-block; width: 295px" onclick="showDetail('Ryukin Calico','Size S (8cm) | Grade A | Ekor Panjang',220000,8,'Jenis Ryukin dengan corak calico tiga warna.')">Detail</button>
        <a href="https://wa.me/6288706497974?text={{ urlencode('Halo, saya ingin membeli Ranchu Premium seharga Rp 300.000') }}" target="_blank" class="buy-button">Beli Sekarang</a>

      </div>

      <div class="product-card" data-name="Bubble Eye Fancy">
        <img src="https://i0.wp.com/gpriority.co.id/wp-content/uploads/2023/01/images-45-1.jpeg?ssl=1" alt="Bubble Eye Fancy">
        <h3>Bubble Eye Fancy</h3>
        <p>Ikan unik dengan kantung udara di bawah matanya.</p>
        <span class="price">Rp 330.000</span>
        <button class="detail-button" style="margin-bottom : 10px; border-radius: 8px; padding : 10px 18px; display: inline-block; width: 295px" onclick="showDetail('Ryukin Calico','Size S (8cm) | Grade A | Ekor Panjang',220000,8,'Jenis Ryukin dengan corak calico tiga warna.')">Detail</button>
        <a href="https://wa.me/6288706497974?text={{ urlencode('Halo, saya ingin membeli Ranchu Premium seharga Rp 300.000') }}" target="_blank" class="buy-button">Beli Sekarang</a>
      </div>
      {{-- SAMPAI SINI --}}
    </div>

    {{-- Tombol Lihat Semua --}}
    <div class="lihat-semua-container" style="text-align:center; margin-top:30px;">
      <a href="/semua-produk" class="cta-button">Lihat Semua Ikan</a>
    </div>
  </div>
</section>


{{-- Detail modal dan WA floating tetap sama --}}
<script>
function showDetail(name, specs, price, stock, desc) {
  document.getElementById('detailName').textContent = name;
  document.getElementById('detailSpecs').textContent = specs;
  document.getElementById('detailDesc').textContent = desc;
  document.getElementById('detailStock').textContent = stock;
  document.getElementById('detailPrice').textContent = "Rp " + price.toLocaleString('id-ID');
  const waText = encodeURIComponent(`Halo, saya tertarik dengan ikan ${name} (${formatRupiah(price)}).`);
  document.getElementById('detailWaLink').href = `https://wa.me/6288706497974?text=${waText}`;
  detailModal.style.display = 'block';
}
</script>

</body>
</html>

    
    <section id="testimoni" class="testimoni-section">
        <div class="container">
            <h2><i class="fas fa-quote-left"></i> Apa Kata Mereka?</h2>
            
            <div class="testimonial-carousel">
                <div class="testi-card active">
                    <div class="rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p class="quote">"Ikan sampai dengan selamat dan sehat! Warna Oranda-nya sesuai ekspektasi, benar-benar grade premium. Pelayanannya cepat."</p>
                    <div class="author"><img src="https://via.placeholder.com/50/ffc107/1a237e?text=A" alt="Avatar Pelanggan A"><span>**Andi S.** - Jakarta</span></div>
                </div>

                <div class="testi-card">
                    <div class="rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
                    <p class="quote">"Ranchu yang saya pesan bodinya kokoh, sudah seminggu di akuarium baru tetap aktif dan lincah. Recomended seller Mas Koki!"</p>
                    <div class="author"><img src="https://via.placeholder.com/50/00bcd4/ffffff?text=D" alt="Avatar Pelanggan B"><span>**Dewi P.** - Bandung</span></div>
                </div>

                <div class="testi-card">
                    <div class="rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p class="quote">"Pelayanan ramah, ikan dikirim dengan packaging terbaik. Tidak ada stres sama sekali. Pasti akan order lagi untuk nambah koleksi."</p>
                    <div class="author"><img src="https://via.placeholder.com/50/1a237e/ffc107?text=R" alt="Avatar Pelanggan C"><span>**Rizky K.** - Surabaya</span></div>
                </div>
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

<style>
  .contact-section {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    background-color: #222;
    color: white;
    padding: 30px;
    border-radius: 10px;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  }

  .contact-info {
    width: 48%;
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

  .contact-info h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #f1c40f;
  }

  .contact-info h4 {
    margin-bottom: 10px;
  }

  .contact-info p {
    margin: 4px 0;
    font-size: 1rem;
  }

  .contact-map {
    width: 48%;
    display: flex;
    justify-content: flex-end;
  }

  .contact-map iframe {
    width: 100%;
    max-width: 400px;
    height: 250px;
    border: 0;
    border-radius: 8px;
  }

  /* Responsif */
  @media (max-width: 768px) {
    .contact-section {
      flex-direction: column;
    }

    .contact-map {
      width: 100%;
      margin-top: 20px;
      justify-content: center;
    }
  }
</style>




    <footer id="kontak" class="footer">
        <div class="container">
            <p>&copy; 2025 Kiyay Gold Fish. Solusi Ikan Mas Koki Premium Anda.</p>
           
        </div>
    </footer>

    {{-- Tautan WA Floating --}}
    <a href="https://wa.me/6288706497974?text=Halo%20Kiyay%20Gold%20Fish%2C%20saya%20mau%20bertanya%20tentang%20koleksi%20ikan." target="_blank" class="floating-wa" title="Chat via WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
    
    {{-- MODAL DESKRIPSI DETAIL --}}
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

    {{-- MODAL KERANJANG SEMENTARA --}}
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
    
    {{-- Kode JavaScript untuk Interaktivitas (Pencarian, Keranjang, Modal, Carousel) --}}
    <script>
        const WA_NUMBER = "6288706497974"; // Nomor tujuan WA (diawali 62)
        
        // --- 1. Cart Management (Keranjang Sementara) ---
        let cart = JSON.parse(localStorage.getItem('kiyay_cart')) || [];

        function saveCart() {
            localStorage.setItem('kiyay_cart', JSON.stringify(cart));
            updateCartDisplay();
        }
        
        // Fungsi untuk format mata uang
        function formatRupiah(number) {
            return `Rp ${number.toLocaleString('id-ID')}`;
        }

        function updateCartDisplay() {
            const cartItemsEl = document.getElementById('cart-items');
            const cartCountEl = document.getElementById('cart-count');
            const cartTotalItemsEl = document.getElementById('cart-total-items');
            const cartTotalPriceEl = document.getElementById('cart-total-price');
            const checkoutWaLinkEl = document.getElementById('checkoutWaLink');
            let totalItems = 0;
            let totalPrice = 0;
            
            // PERBAIKAN: Menambahkan referensi gambar (nama produk) pada checkout
            let waMessage = "Halo Kiyay Gold Fish, saya mau order:\n\n";

            cartItemsEl.innerHTML = '';
            
            if (cart.length === 0) {
                cartItemsEl.innerHTML = '<p class="empty-cart-message">Keranjang Anda kosong.</p>';
                checkoutWaLinkEl.classList.add('disabled');
            } else {
                checkoutWaLinkEl.classList.remove('disabled');
                cart.forEach(item => {
                    const price = item.price;
                    const subtotal = item.qty * price;

                    totalItems += item.qty;
                    totalPrice += subtotal;
                    
                    // Detail item di pesan WA
                    waMessage += `* ${item.name} (${item.qty} ekor) - ${formatRupiah(subtotal)}\n`;

                    const itemEl = document.createElement('div');
                    itemEl.classList.add('cart-item');
                    itemEl.innerHTML = `
                        <div>
                            <span>${item.name} x ${item.qty}</span>
                            <span class="cart-item-price">${formatRupiah(subtotal)}</span>
                        </div>
                        <button onclick="removeFromCart('${item.id}')" class="remove-btn" title="Hapus">&times;</button>
                    `;
                    cartItemsEl.appendChild(itemEl);
                });
                waMessage += `\nTotal Belanja: ${formatRupiah(totalPrice)}\n\nMohon konfirmasi ketersediaan stok dan total biaya kirim. Terima kasih.`;
            }

            cartCountEl.textContent = totalItems;
            cartTotalItemsEl.textContent = totalItems;
            cartTotalPriceEl.textContent = formatRupiah(totalPrice);
            checkoutWaLinkEl.href = `https://wa.me/${WA_NUMBER}?text=${encodeURIComponent(waMessage)}`;

        }

        function addToCart(id) {
            const cardEl = document.querySelector(`.product-card[data-id="${id}"]`);
            const name = cardEl.getAttribute('data-name');
            const price = parseInt(cardEl.querySelector('.price').getAttribute('data-price'));
            let stock = parseInt(cardEl.querySelector('.stock').getAttribute('data-stock'));
            
            if (stock <= 0) {
                alert('Maaf, stok ikan ini habis!');
                return;
            }

            const existingItem = cart.find(item => item.id === id);

            if (existingItem) {
                if (existingItem.qty < stock) {
                    existingItem.qty += 1;
                } else {
                    alert(`Stok hanya tersisa ${stock} ekor untuk item ini.`);
                    return;
                }
            } else {
                cart.push({ id, name, price, qty: 1, stock });
            }

            saveCart();
            alert(`1 ekor ${name} ditambahkan ke keranjang!`);
        }

        function removeFromCart(id) {
            const index = cart.findIndex(item => item.id === id);
            if (index !== -1) {
                // Hapus satu item dari keranjang, bukan seluruh produk
                if (cart[index].qty > 1) {
                    cart[index].qty -= 1;
                } else {
                    cart.splice(index, 1);
                }
                saveCart();
                updateCartDisplay(); // Refresh setelah hapus/kurang
            }
        }
        
        // Listener untuk tombol 'Tambah ke Keranjang'
        document.querySelectorAll('.add-to-cart-button').forEach(button => {
            button.addEventListener('click', (e) => {
                addToCart(e.target.getAttribute('data-id'));
            });
        });

        // --- 2. Search Feature (Pencarian Ikan) ---
        document.getElementById('search-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const searchTerm = document.getElementById('search-input').value.toLowerCase();
            const cards = document.querySelectorAll('.product-card');
            let found = 0;
            
            cards.forEach(card => {
                const name = card.getAttribute('data-name').toLowerCase();
                if (name.includes(searchTerm)) {
                    card.style.display = 'flex';
                    found++;
                } else {
                    card.style.display = 'none';
                }
            });
            
            document.getElementById('no-results').style.display = found === 0 ? 'block' : 'none';
        });
        
        // Listener untuk reset pencarian
        document.getElementById('search-input').addEventListener('keyup', function(e) {
            if (e.target.value === '') {
                document.querySelectorAll('.product-card').forEach(card => card.style.display = 'flex');
                document.getElementById('no-results').style.display = 'none';
            }
        });

        // --- 3. Modal Management (Deskripsi Detail & Cart) ---
        const detailModal = document.getElementById('detailModal');
        const cartModal = document.getElementById('cartModal');

        function showDetail(name, specs, price, stock, desc) {
            document.getElementById('detailName').textContent = name;
            document.getElementById('detailSpecs').textContent = specs;
            document.getElementById('detailDesc').textContent = desc;
            document.getElementById('detailStock').textContent = stock;
            document.getElementById('detailPrice').textContent = formatRupiah(price);
            
            const waText = encodeURIComponent(`Halo, saya tertarik dengan ikan ${name} (${formatRupiah(price)}). Stok ${stock} ekor masih tersedia?`);
            document.getElementById('detailWaLink').href = `https://wa.me/${WA_NUMBER}?text=${waText}`;

            detailModal.style.display = 'block';
        }

        function closeDetail() {
            detailModal.style.display = 'none';
        }
        
        function toggleCartModal() {
            cartModal.style.display = cartModal.style.display === 'block' ? 'none' : 'block';
            updateCartDisplay(); 
        }

        window.onclick = function(event) {
            if (event.target == detailModal) {
                detailModal.style.display = "none";
            }
            if (event.target == cartModal) {
                cartModal.style.display = "none";
            }
        }

        // --- 4. Testimonial Carousel ---
        let currentTesti = 0;
        const testiCards = document.querySelectorAll('.testi-card');
        const totalCards = testiCards.length;
        
        function showTesti(index) {
            testiCards.forEach((card, i) => {
                card.classList.remove('active');
                if (i === index) {
                    card.classList.add('active');
                }
            });
        }
        
        function nextTesti() {
            currentTesti = (currentTesti + 1) % totalCards;
            showTesti(currentTesti);
        }
        
        function prevTesti() {
            currentTesti = (currentTesti - 1 + totalCards) % totalCards;
            showTesti(currentTesti);
        }
        
        // Autoplay (Opsional)
        // setInterval(nextTesti, 5000);
        
        // Initial load
        updateCartDisplay();
        showTesti(currentTesti); // Tampilkan kartu pertama saat load
    </script>
</body>
</html>
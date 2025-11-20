// ===============================
// 0. KONSTANTA
// ===============================
const WA_NUMBER = "6288706497974"; 
let cart = JSON.parse(localStorage.getItem('kiyay_cart')) || [];

// ===============================
// 1. UTILITAS (Format & Penyimpanan)
// ===============================
function saveCart() {
    localStorage.setItem('kiyay_cart', JSON.stringify(cart));
    updateCartDisplay();
}

function formatRupiah(number) {
    return `Rp ${number.toLocaleString('id-ID')}`;
}

// ===============================
// 2. SEARCH BAR (Pencarian Ikan)
// ===============================
const searchForm = document.getElementById('search-form');
const searchInput = document.getElementById('search-input');

searchForm.addEventListener('submit', function (e) {
    e.preventDefault();

    const searchTerm = searchInput.value.toLowerCase();
    const cards = document.querySelectorAll('.product-card');
    let found = 0;

    cards.forEach(card => {
        const name = card.getAttribute('data-name').toLowerCase();
        card.style.display = name.includes(searchTerm) ? 'flex' : 'none';
        if (name.includes(searchTerm)) found++;
    });

    document.getElementById('no-results').style.display = found === 0 ? 'block' : 'none';
});

// Reset hasil pencarian jika input kosong
searchInput.addEventListener('keyup', function () {
    if (this.value === '') {
        document.querySelectorAll('.product-card').forEach(card => {
            card.style.display = 'flex';
        });
        document.getElementById('no-results').style.display = 'none';
    }
});

// ===============================
// 3. MODAL DETAIL & CART
// ===============================
const detailModal = document.getElementById('detailModal');
const cartModal   = document.getElementById('cartModal');

function showDetail(name, specs, price, stock, desc) {
    document.getElementById('detailName').textContent = name;
    document.getElementById('detailSpecs').textContent = specs;
    document.getElementById('detailDesc').textContent = desc;
    document.getElementById('detailStock').textContent = stock;
    document.getElementById('detailPrice').textContent = formatRupiah(price);

    const waText = encodeURIComponent(
        `Halo, saya tertarik dengan ikan ${name} (${formatRupiah(price)}). Stok ${stock} ekor masih tersedia?`
    );

    document.getElementById('detailWaLink').href = 
        `https://wa.me/${WA_NUMBER}?text=${waText}`;

    detailModal.style.display = 'block';
}

function closeDetail() {
    detailModal.style.display = 'none';
}

// Tutup modal jika klik area luar
window.onclick = function (event) {
    if (event.target === detailModal) detailModal.style.display = "none";
    if (event.target === cartModal)   cartModal.style.display = "none";
};

// ===============================
// 4. TESTIMONIAL CAROUSEL
// ===============================
let currentTesti = 0;
const testiCards = document.querySelectorAll('.testi-card');
const totalCards = testiCards.length;

function showTesti(index) {
    testiCards.forEach((card, i) => {
        card.classList.toggle('active', i === index);
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

// ===============================
// 5. INIT AWAL
// ===============================
updateCartDisplay();
showTesti(currentTesti);

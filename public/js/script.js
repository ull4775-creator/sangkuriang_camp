/* =========================================
   SANGKURIANG - MODAL LOGIC (STATIC DATA)
   ========================================= */

let modalImages = [];
let currentModalSlide = 0;

// Fungsi openModal sekarang menerima OBJECT langsung, bukan ID
function openModal(product) {
    try {
        // Ambil gambar dari object product
        modalImages = product.images || [];
        currentModalSlide = 0;
        
        const sliderContainer = document.getElementById('modalSlider');
        const dotsContainer = document.getElementById('sliderDots');
        
        // Render Slider Images
        sliderContainer.innerHTML = modalImages.map(img => 
            `<img src="/uploads/products/${img}" alt="${product.name}">`
        ).join('');
        
        // Render Dots
        dotsContainer.innerHTML = modalImages.map((_, i) => 
            `<div class="slider-dot ${i === 0 ? 'active' : ''}" onclick="goToSlide(${i})"></div>`
        ).join('');
        
        updateSliderPosition();

        // Render Product Info
        let specsHtml = '';
        if(product.specs && typeof product.specs === 'object') {
            for(let [k,v] of Object.entries(product.specs)) {
                specsHtml += `<div class="spec-item"><span>${k}</span><strong>${v}</strong></div>`;
            }
        }

        let includesHtml = '';
        if(product.includes && Array.isArray(product.includes)) {
            product.includes.forEach(item => {
                includesHtml += `<li><i class="fas fa-check-circle"></i> ${item}</li>`;
            });
        }

        document.getElementById('modalBody').innerHTML = `
            <h2 style="margin-bottom:5px">${product.name}</h2>
            <p style="color:var(--gold);font-size:1.4rem;font-weight:700;margin-bottom:20px">${product.price}</p>
            <p style="color:var(--text-muted);line-height:1.8;margin-bottom:25px">${product.description}</p>
            
            ${specsHtml ? `<h4 style="margin-bottom:15px;color:var(--primary)"><i class="fas fa-sliders-h"></i> Spesifikasi</h4><div class="spec-grid">${specsHtml}</div>` : ''}
            ${includesHtml ? `<h4 style="margin-bottom:15px;color:var(--primary)"><i class="fas fa-box-open"></i> Sudah Termasuk</h4><ul class="includes-list">${includesHtml}</ul>` : ''}
            
            <div style="display:flex;gap:15px;margin-top:30px">
                <a href="https://wa.me/6281324481252?text=Halo%20Admin,%20saya%20mau%20booking%20${encodeURIComponent(product.name)}" target="_blank" class="btn btn-primary" style="flex:1;justify-content:center;padding:16px"><i class="fab fa-whatsapp"></i> Booking via WA</a>
                <a href="tel:081324481252" class="btn btn-outline" style="flex:1;justify-content:center;padding:16px"><i class="fas fa-phone"></i> Telepon</a>
            </div>`;

        document.getElementById('productModal').classList.add('active');
        document.body.style.overflow = 'hidden';
        
    } catch (error) {
        console.error("Error loading product:", error);
        alert("Gagal memuat detail produk.");
    }
}

// Slider Navigation Functions
function changeSlide(direction) {
    if(modalImages.length <= 1) return;
    currentModalSlide += direction;
    if(currentModalSlide < 0) currentModalSlide = modalImages.length - 1;
    if(currentModalSlide >= modalImages.length) currentModalSlide = 0;
    updateSliderPosition();
}

function goToSlide(index) {
    currentModalSlide = index;
    updateSliderPosition();
}

function updateSliderPosition() {
    const slider = document.getElementById('modalSlider');
    if(slider) slider.style.transform = `translateX(-${currentModalSlide * 100}%)`;
    
    document.querySelectorAll('.slider-dot').forEach((dot, i) => {
        dot.classList.toggle('active', i === currentModalSlide);
    });
}

function closeModal() {
    document.getElementById('productModal').classList.remove('active');
    document.body.style.overflow = '';
}
document.getElementById('productModal').addEventListener('click', (e) => {
    if(e.target.id === 'productModal') closeModal();
});
document.addEventListener('keydown', e => { 
    if(e.key === 'Escape') closeModal();
    if(document.getElementById('productModal').classList.contains('active')) {
        if(e.key === 'ArrowLeft') changeSlide(-1);
        if(e.key === 'ArrowRight') changeSlide(1);
    }
});

// 3D Tilt Effect
document.querySelectorAll('.tilt-3d').forEach(card => {
    card.addEventListener('mousemove', e => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const cx = rect.width / 2;
        const cy = rect.height / 2;
        card.style.transform = `perspective(1000px) rotateX(${(y-cy)/25}deg) rotateY(${(cx-x)/25}deg) scale(1.02)`;
    });
    card.addEventListener('mouseleave', () => {
        card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
    });
});

// Contact Form Handler
const contactForm = document.getElementById('contactForm');
if(contactForm) {
    contactForm.addEventListener('submit', e => {
        e.preventDefault();
        const n = document.getElementById('name').value;
        const p = document.getElementById('phone').value;
        const s = document.getElementById('subject').value;
        const m = document.getElementById('message').value;
        const msg = `Halo Admin Sangkuriang! \n\n*Nama:* ${n}\n*No HP:* ${p}\n*Subjek:* ${s}\n*Pesan:* ${m}`;
        window.open(`https://wa.me/6281324481252?text=${encodeURIComponent(msg)}`, '_blank');
        e.target.reset();
    });
}

// Mobile Menu Toggle
const ham = document.getElementById('hamburger');
const menu = document.getElementById('navMenu');
if(ham && menu) {
    ham.addEventListener('click', () => {
        ham.classList.toggle('active');
        menu.classList.toggle('active');
    });
    document.querySelectorAll('.nav-menu a').forEach(a => {
        a.addEventListener('click', () => {
            ham.classList.remove('active');
            menu.classList.remove('active');
        });
    });
}
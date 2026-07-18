<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>Sangkuriang - Sewa Tenda Premium</title>
    <!-- PATH ABSOLUT UNTUK FAVICON -->
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <style>
        :root { --primary: #4CAF50; --gold: #FFD54F; --dark: #0a0a0a; --glass-bg: rgba(20, 20, 20, 0.75); }
        * { margin: 0; padding: 0; box-sizing: border-box; scroll-behavior: smooth; }
        
        /* PERBAIKAN UTAMA: Mencegah navbar menutupi judul saat scroll */
        html { scroll-padding-top: 100px; }
        
        body { font-family: 'Poppins', sans-serif; color: #fff; background: var(--dark); overflow-x: hidden; }
        
        .fixed-video-bg { position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; z-index: -9999; pointer-events: none; overflow: hidden; background-color: #050505; background-image: url('/assets/images/logo.png'); background-size: cover; background-position: center; }
        .fixed-video-bg img { width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: -2; opacity: 0.5; }
        .fixed-video-bg video { width: 100%; height: 100%; object-fit: cover; position: relative; z-index: -1; }
        .global-overlay { position: fixed; inset: 0; background: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.9)); z-index: -9998; pointer-events: none; }
        
        .navbar { position: fixed; top: 0; width: 100%; z-index: 1000; padding: 20px 0; transition: 0.4s; background: transparent; }
        .navbar.scrolled { background: rgba(10,10,10,0.95); backdrop-filter: blur(20px); padding: 12px 0; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .nav-flex { display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0 24px; }
        .logo { font-size: 1.3rem; font-weight: 800; color: white; text-decoration: none; display: flex; align-items: center; gap: 10px; }
        .logo i { color: var(--primary); }
        .nav-menu { display: flex; gap: 32px; list-style: none; }
        .nav-menu a { color: rgba(255,255,255,0.85); text-decoration: none; font-weight: 500; transition: 0.3s; }
        .nav-menu a:hover, .nav-menu a.active { color: var(--primary); }
        .btn-nav { background: var(--primary); color: #fff; padding: 10px 24px; border-radius: 50px; text-decoration: none; font-weight: 600; transition: 0.3s; }
        .hamburger { display: none; cursor: pointer; flex-direction: column; gap: 6px; z-index: 1001; }
        .hamburger span { width: 28px; height: 2.5px; background: #fff; transition: 0.3s; }
        
        .hero-section { min-height: 100vh; display: flex; align-items: center; justify-content: center; text-align: center; padding: 100px 24px; position: relative; }
        .main-title { font-size: clamp(2.5rem, 8vw, 5rem); font-weight: 800; line-height: 1.1; margin-bottom: 20px; }
        .highlight { color: var(--primary); text-shadow: 0 0 40px rgba(76,175,80,0.4); }
        .hero-desc { font-size: 1.1rem; color: rgba(255,255,255,0.9); margin-bottom: 30px; max-width: 600px; margin-left: auto; margin-right: auto; }
        .btn-glass { background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); color: white; padding: 14px 32px; border-radius: 50px; text-decoration: none; display: inline-flex; align-items: center; gap: 10px; transition: 0.3s; backdrop-filter: blur(10px); }
        .btn-glass:hover { background: var(--primary); border-color: var(--primary); transform: translateY(-3px); }
        
        .section { padding: 80px 0; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }
        .section-header { text-align: center; margin-bottom: 50px; }
        .section-label { color: var(--primary); letter-spacing: 3px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; display: block; margin-bottom: 12px; }
        .section-title { font-size: 2.5rem; margin-bottom: 16px; }
        
        .grid-catalog { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 28px; }
        .glass-card { background: var(--glass-bg); border: 1px solid rgba(255,255,255,0.1); border-radius: 20px; overflow: hidden; transition: 0.4s; backdrop-filter: blur(15px); transform-style: preserve-3d; perspective: 1000px; }
        .glass-card:hover { transform: translateY(-8px) rotateX(2deg); border-color: rgba(76,175,80,0.4); box-shadow: 0 20px 40px rgba(0,0,0,0.4); }
        
        .product-img { height: 220px; position: relative; overflow: hidden; background: #111; }
        .product-img img { width: 100%; height: 100%; object-fit: cover; transition: 0.6s; }
        .glass-card:hover .product-img img { transform: scale(1.1); }
        .badge-best { position: absolute; top: 14px; left: 14px; background: var(--gold); color: #000; padding: 5px 14px; border-radius: 20px; font-size: 0.7rem; font-weight: 700; z-index: 2; }
        .badge-price { position: absolute; top: 14px; right: 14px; background: rgba(0,0,0,0.85); color: var(--gold); padding: 6px 14px; border-radius: 20px; font-weight: 700; font-size: 0.85rem; z-index: 2; }
        
        .product-body { padding: 24px; }
        .product-name { font-size: 1.15rem; font-weight: 600; margin-bottom: 10px; }
        .product-desc { color: #aaa; font-size: 0.9rem; margin-bottom: 20px; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
        .product-actions { display: flex; gap: 10px; }
        .btn-detail { flex: 1; padding: 12px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.15); color: white; border-radius: 12px; cursor: pointer; font-size: 0.85rem; transition: 0.3s; display: flex; align-items: center; justify-content: center; gap: 6px; }
        .btn-wa { background: #25D366; color: white; padding: 12px 18px; border-radius: 12px; text-decoration: none; display: flex; align-items: center; gap: 6px; font-size: 0.85rem; font-weight: 600; transition: 0.3s; }

        .grid-features, .social-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 24px; margin-top: 30px; }
        .feature-card, .contact-card { padding: 30px; text-align: center; }
        .feature-icon { width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary), var(--dark)); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; font-size: 1.5rem; }
        .contact-icon { font-size: 2rem; margin-bottom: 10px; display: inline-block; }
        .contact-link { display: inline-block; margin-top: 10px; padding: 8px 20px; border-radius: 50px; text-decoration: none; font-weight: 600; transition: 0.3s; }
        .contact-link.wa { background: #25D366; color: white; }
        .contact-link.phone { border: 1px solid var(--primary); color: var(--primary); }
        .contact-link.ig { border: 1px solid #E1306C; color: #E1306C; }

        .map-wrapper { position: relative; border-radius: 24px; overflow: hidden; height: 400px; border: 2px solid rgba(76, 175, 80, 0.3); box-shadow: 0 25px 60px rgba(0,0,0,0.6); transition: all 0.4s; cursor: pointer; display: block; margin-bottom: 32px; transform: perspective(1000px) rotateX(2deg); background: #111; }
        .map-wrapper:hover { border-color: var(--primary); transform: perspective(1000px) rotateX(0deg) scale(1.02); }
        .map-wrapper iframe { width:100%; height:100%; border:0; filter: invert(90%) hue-rotate(180deg) brightness(0.8) contrast(1.2); pointer-events: none; }
        .map-click-overlay { position: absolute; inset: 0; background: rgba(0,0,0,0.4); display: flex; flex-direction: column; align-items: center; justify-content: center; z-index: 10; transition: 0.4s; backdrop-filter: blur(2px); }
        .map-wrapper:hover .map-click-overlay { background: rgba(0,0,0,0.1); }
        .map-btn-float { background: rgba(76, 175, 80, 0.95); color: white; padding: 16px 32px; border-radius: 50px; font-weight: 700; backdrop-filter: blur(5px); box-shadow: 0 8px 25px rgba(0,0,0,0.4); animation: pulseMap 2.5s infinite; display: flex; align-items: center; gap: 10px; font-size: 1.1rem; text-decoration: none; border: 2px solid rgba(255,255,255,0.2); }
        @keyframes pulseMap { 0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.6); } 70% { transform: scale(1.05); box-shadow: 0 0 0 20px rgba(76, 175, 80, 0); } 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(76, 175, 80, 0); } }
        
        .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.92); z-index: 2000; align-items: center; justify-content: center; padding: 20px; backdrop-filter: blur(10px); }
        .modal-overlay.active { display: flex; animation: fadeIn 0.3s ease; }
        .modal-content { background: #1a1a1a; border-radius: 24px; max-width: 600px; width: 100%; position: relative; border: 1px solid rgba(255,255,255,0.1); overflow: hidden; max-height: 90vh; overflow-y: auto; }
        .modal-close { position: absolute; top: 16px; right: 16px; background: rgba(0,0,0,0.6); border: 1px solid rgba(255,255,255,0.2); color: white; width: 36px; height: 36px; border-radius: 50%; cursor: pointer; z-index: 10; display: flex; align-items: center; justify-content: center; }
        .modal-slider { height: 300px; background: #000; position: relative; }
        .modal-slider img { width: 100%; height: 100%; object-fit: cover; }
        .slider-nav { position: absolute; top: 50%; transform: translateY(-50%); background: rgba(0,0,0,0.6); border: 1px solid rgba(255,255,255,0.2); color: white; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; }
        .slider-prev { left: 12px; } .slider-next { right: 12px; }
        .slider-dots { position: absolute; bottom: 12px; left: 50%; transform: translateX(-50%); display: flex; gap: 6px; }
        .slider-dot { width: 8px; height: 8px; border-radius: 50%; background: rgba(255,255,255,0.4); cursor: pointer; }
        .slider-dot.active { background: var(--primary); width: 24px; border-radius: 4px; }
        .modal-body { padding: 28px; }
        .modal-specs { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin: 20px 0; }
        .spec-item { background: rgba(255,255,255,0.05); padding: 12px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.08); }
        .spec-label { font-size: 0.75rem; color: #aaa; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
        .spec-value { font-size: 0.95rem; font-weight: 600; }
        .includes-list { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 10px; }
        .include-tag { background: rgba(76,175,80,0.1); border: 1px solid rgba(76,175,80,0.3); color: #81C784; padding: 6px 12px; border-radius: 20px; font-size: 0.8rem; }
        .modal-book-btn { width: 100%; padding: 16px; background: #25D366; color: white; border: none; border-radius: 16px; font-size: 1.05rem; font-weight: 700; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 10px; margin-top: 20px; }
        
        footer { background: rgba(0,0,0,0.9); backdrop-filter: blur(10px); padding: 40px 0; text-align: center; border-top: 1px solid rgba(255,255,255,0.1); }
        .footer-logo { color: var(--primary); margin-bottom: 12px; font-size:1.3rem; font-weight:700; display:flex; align-items:center; justify-content:center; gap:8px; }
        .footer-copy { color: #666; font-size: 0.85rem; transition: 0.3s; display: inline-block; margin-top: 8px; text-decoration: none; }
        .footer-copy:hover { color: var(--primary); }

        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        
        @media(max-width: 768px) {
            .nav-menu { position: fixed; top: 0; right: -100%; width: 80%; height: 100vh; background: #050505; flex-direction: column; padding: 100px 32px; transition: 0.4s; z-index: 999; }
            .nav-menu.active { right: 0; }
            .hamburger { display: flex; }
            .btn-nav { display: none; }
            .grid-catalog, .grid-features, .social-grid { grid-template-columns: 1fr !important; gap: 20px; }
            .modal-specs { grid-template-columns: 1fr; }
            .map-wrapper { height: 280px; transform: none; border-radius: 16px; }
            .map-wrapper:hover { transform: scale(1.02); }
            .map-btn-float { font-size: 0.9rem; padding: 12px 24px; }
            .section-title { font-size: 2rem; }
            .hero-desc { font-size: 1rem; }
        }
    </style>
</head>
<body>

    <div class="fixed-video-bg">
        <img src="/assets/images/logo.png" alt="Background" style="width:100%; height:100%; object-fit:cover; position:absolute; top:0; left:0; z-index:-2;">
        <video id="bgVideo" autoplay muted loop playsinline preload="auto" poster="/assets/images/logo.png" style="position:relative; z-index:-1;">
            <source src="/uploads/products/bg.mp4" type="video/mp4">
        </video>
    </div>
    <div class="global-overlay"></div>

    <nav class="navbar" id="navbar">
        <div class="nav-flex">
            <a href="#" class="logo"><i class="fas fa-mountain"></i> SANGKURIANG</a>
            <ul class="nav-menu" id="navMenu">
                <!-- SEMUA MENU NAVBAR MENGGUNAKAN ANCHOR LINK (#) -->
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#katalog">Katalog</a></li>
                <li><a href="#keunggulan">Keunggulan</a></li>
                <li><a href="#kontak">Lokasi</a></li>
            </ul>
            <a href="https://wa.me/6281324481252" target="_blank" class="btn-nav"><i class="fab fa-whatsapp"></i> Hubungi Admin</a>
            <div class="hamburger" id="hamburger"><span></span><span></span><span></span></div>
        </div>
    </nav>

    <section class="hero-section" id="home">
        <div class="hero-content">
            <h1 class="main-title">Sewa Tenda <br><span class="highlight">Family Camp</span></h1>
            <p class="hero-desc">Nikmati petualangan keluarga yang tak terlupakan dengan perlengkapan camping premium berkualitas tinggi.</p>
            <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap;">
                <a href="#katalog" class="btn-glass"><i class="fas fa-list-ul"></i> Lihat Katalog</a>
                <a href="#kontak" class="btn-glass" style="background:transparent;"><i class="fas fa-map-marker-alt"></i> Cek Lokasi</a>
            </div>
        </div>
    </section>

    <section class="section" id="katalog">
        <div class="container">
            <div class="section-header">
                <span class="section-label">Produk Unggulan</span>
                <h2 class="section-title">Koleksi Tenda Premium</h2>
            </div>
            
            <div class="grid-catalog">
                @foreach($products as $product)
                    @if(!is_array($product)) @continue @endif
                    @php 
                        // PERBAIKAN PATH GAMBAR: Hardcode path untuk fb.jpg agar pasti terbaca
                        $rawImg = !empty($product['images']) ? $product['images'][0] : 'placeholder.jpg';
                        
                        // Jika nama file mengandung '&' atau huruf besar, paksa jadi lowercase
                        $safeImgName = strtolower(str_replace('&', '', $rawImg));
                        
                        // Path absolut lengkap
                        $firstImg = '/uploads/products/' . $safeImgName; 
                        
                        $safeProduct = [
                            'id' => $product['id'] ?? 0, 'name' => $product['name'] ?? 'Produk',
                            'price' => $product['price'] ?? '-', 'description' => $product['description'] ?? '',
                            'images' => is_array($product['images']) ? array_map(function($img) { 
                                return '/uploads/products/' . strtolower(str_replace('&', '', $img)); 
                            }, $product['images']) : ['/assets/images/placeholder.jpg'],
                            'specs' => is_array($product['specs']) ? $product['specs'] : [],
                            'includes' => is_array($product['includes']) ? $product['includes'] : [],
                            'is_best_seller' => $product['is_best_seller'] ?? false
                        ];
                        
                        // Encode URL WhatsApp dengan aman
                        $waText = rawurlencode("Halo Admin Sangkuriang, saya ingin booking " . ($product['name'] ?? '') . ". Apakah masih tersedia?");
                    @endphp
                    
                    <div class="glass-card">
                        <div class="product-img">
                            @if(!empty($product['is_best_seller'])) <span class="badge-best"><i class="fas fa-crown"></i> BEST SELLER</span> @endif
                            
                            <!-- PERBAIKAN: onerror fallback yang lebih kuat -->
                            <img src="{{ $firstImg }}" 
                                 alt="{{ $product['name'] ?? 'Produk' }}" 
                                 loading="lazy" 
                                 onerror="this.onerror=null; this.src='/assets/images/placeholder.jpg'; this.style.objectFit='contain'; this.style.padding='20px';">
                            
                            <span class="badge-price">{{ $product['price'] ?? '-' }}</span>
                        </div>
                        <div class="product-body">
                            <h3 class="product-name">{{ $product['name'] ?? 'Nama Produk' }}</h3>
                            <p class="product-desc">{{ Str::limit($product['description'] ?? '', 80) }}</p>
                            <div class="product-actions">
                                <button onclick='openModal(@json($safeProduct))' class="btn-detail"><i class="fas fa-images"></i> Detail</button>
                                <a href="https://wa.me/6281324481252?text={{ $waText }}" target="_blank" class="btn-wa"><i class="fab fa-whatsapp"></i> Booking</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section" id="keunggulan">
        <div class="container">
            <div class="section-header">
                <span class="section-label">Mengapa Memilih Kami?</span>
                <h2 class="section-title">Keunggulan Sangkuriang</h2>
            </div>
            <div class="grid-features">
                <div class="glass-card feature-card">
                    <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                    <h3>Kualitas Terjamin</h3>
                    <p style="color:#aaa; font-size:0.9rem;">Sterilisasi & pengecekan ketat setiap selesai sewa.</p>
                </div>
                <div class="glass-card feature-card">
                    <div class="feature-icon"><i class="fas fa-headset"></i></div>
                    <h3>Support 24/7</h3>
                    <p style="color:#aaa; font-size:0.9rem;">Tim siap bantu instalasi & kendala teknis kapan saja.</p>
                </div>
                <div class="glass-card feature-card">
                    <div class="feature-icon"><i class="fas fa-tags"></i></div>
                    <h3>Harga Transparan</h3>
                    <p style="color:#aaa; font-size:0.9rem;">Tanpa biaya tersembunyi, paket all-in essentials.</p>
                </div>
                <div class="glass-card feature-card">
                    <div class="feature-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <h3>Lokasi Terbaik</h3>
                    <p style="color:#aaa; font-size:0.9rem;">Mitra area camping terbaik di Subang & sekitarnya.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="kontak">
        <div class="container">
            <div class="section-header">
                <span class="section-label">Temukan Kami</span>
                <h2 class="section-title">Lokasi Basecamp Sangkuriang</h2>
                <p style="color:#aaa;">Klik tombol di bawah untuk langsung membuka navigasi Google Maps.</p>
            </div>
            
            <!-- Wrapper Peta dengan Link Navigasi Eksternal -->
            <a href="https://maps.app.goo.gl/Pvixba29j8ADjDdo9" target="_blank" class="map-wrapper">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31735.58888888889!2d107.62!3d-6.79!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e688c0c0c0c0c0c%3A0x0!2zNsKwNDcnMDAuMCJTIDEwN8KwMzcnMDAuMCJF!5e0!3m2!1sid!2sid!4v1700000000000" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="map-click-overlay">
                    <div class="map-btn-float"><i class="fas fa-location-arrow"></i> BUKA DI GOOGLE MAPS</div>
                </div>
            </a>

            <div class="social-grid">
                <div class="glass-card contact-card">
                    <i class="fab fa-whatsapp contact-icon" style="color: #25D366;"></i>
                    <h4>WhatsApp Admin</h4>
                    <a href="https://wa.me/6281324481252" target="_blank" class="contact-link wa"><i class="fab fa-whatsapp"></i> Chat Sekarang</a>
                </div>
                <div class="glass-card contact-card">
                    <i class="fas fa-phone-alt contact-icon" style="color: var(--primary);"></i>
                    <h4>Telepon Langsung</h4>
                    <a href="tel:081324481252" class="contact-link phone"><i class="fas fa-phone"></i> 081-324-481-252</a>
                </div>
                <div class="glass-card contact-card">
                    <i class="fab fa-instagram contact-icon" style="color: #E1306C;"></i>
                    <h4>Instagram</h4>
                    <a href="https://www.instagram.com/sewa_tenda_camp_ciater_subang?igsh=ejd4bTdud3QzNDJu" target="_blank" class="contact-link ig"><i class="fab fa-instagram"></i> Follow Us</a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-logo"><i class="fas fa-mountain"></i> Sangkuriang</div>
            <a href="https://maps.app.goo.gl/Mjfhnvq9FZZ1v5Ly6" target="_blank" rel="noopener noreferrer" class="footer-copy">
                &copy; Bengkel Komputer 2. All rights reserved.
            </a>
        </div>
    </footer>

    <div class="modal-overlay" id="productModal">
        <div class="modal-content" onclick="event.stopPropagation()">
            <button onclick="closeModal()" class="modal-close"><i class="fas fa-times"></i></button>
            <div class="modal-slider" id="modalSlider">
                <img id="modalMainImg" src="" alt="Product">
                <button onclick="changeSlide(-1)" class="slider-nav slider-prev"><i class="fas fa-chevron-left"></i></button>
                <button onclick="changeSlide(1)" class="slider-nav slider-next"><i class="fas fa-chevron-right"></i></button>
                <div class="slider-dots" id="sliderDots"></div>
            </div>
            <div class="modal-body">
                <h2 id="modalName" style="font-size:1.4rem; margin-bottom:8px;"></h2>
                <div style="font-size:1.3rem; color:var(--gold); font-weight:700; margin-bottom:16px;" id="modalPrice"></div>
                <p id="modalDesc" style="color:#aaa; line-height:1.7; margin-bottom:20px;"></p>
                
                <h4 style="font-size:0.9rem; color:var(--primary); margin-bottom:12px;"><i class="fas fa-cog"></i> Spesifikasi:</h4>
                <div class="modal-specs" id="modalSpecs"></div>
                
                <h4 style="font-size:0.9rem; color:var(--primary); margin-bottom:12px;"><i class="fas fa-check-circle"></i> Termasuk dalam Paket:</h4>
                <div class="includes-list" id="includesList"></div>
                
                <a id="modalBookBtn" href="#" target="_blank" class="modal-book-btn"><i class="fab fa-whatsapp"></i> Booking Sekarang</a>
            </div>
        </div>
    </div>

    <a href="https://wa.me/6281324481252" target="_blank" style="position:fixed; bottom:24px; right:24px; width:60px; height:60px; background:#25D366; border-radius:50%; display:flex; align-items:center; justify-content:center; color:white; font-size:2rem; box-shadow:0 8px 25px rgba(37,211,102,0.4); z-index:999; text-decoration:none;">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script>
        window.addEventListener('scroll', () => document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 50));
        const hamburger = document.getElementById('hamburger'), navMenu = document.getElementById('navMenu');
        
        // PERBAIKAN LOGIKA HAMBURGER MOBILE
        hamburger.addEventListener('click', () => { 
            hamburger.classList.toggle('active'); 
            navMenu.classList.toggle('active'); 
        });

        // Menutup menu mobile secara otomatis saat link diklik
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });
        
        let currentSlide = 0, productImages = [];
        function openModal(product) {
            if (!product || typeof product !== 'object') return;
            productImages = (Array.isArray(product.images) && product.images.length) ? product.images : ['/assets/images/placeholder.jpg'];
            currentSlide = 0; updateSlider();
            
            document.getElementById('modalName').textContent = product.name || 'Produk';
            document.getElementById('modalPrice').textContent = product.price || '-';
            document.getElementById('modalDesc').textContent = product.description || 'Deskripsi tidak tersedia.';
            
            document.getElementById('modalSpecs').innerHTML = Object.entries(product.specs || {}).map(([k,v]) => `<div class="spec-item"><div class="spec-label">${k}</div><div class="spec-value">${v}</div></div>`).join('') || '<p style="color:#aaa">Tidak ada spesifikasi.</p>';
            document.getElementById('includesList').innerHTML = (Array.isArray(product.includes) ? product.includes : []).map(item => `<span class="include-tag"><i class="fas fa-check"></i> ${item}</span>`).join('') || '<p style="color:#aaa">Tidak ada item tambahan.</p>';
            document.getElementById('sliderDots').innerHTML = productImages.map((_, i) => `<div class="slider-dot ${i===0?'active':''}" onclick="goToSlide(${i})"></div>`).join('');
            document.getElementById('modalBookBtn').href = `https://wa.me/6281324481252?text=${encodeURIComponent(`Halo Admin, saya ingin booking ${product.name} (${product.price}).`)}`;
            
            document.getElementById('productModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        function closeModal() { document.getElementById('productModal').classList.remove('active'); document.body.style.overflow = ''; }
        function updateSlider() { 
            document.getElementById('modalMainImg').src = productImages[currentSlide]; 
            document.querySelectorAll('.slider-dot').forEach((d,i) => d.classList.toggle('active', i===currentSlide)); 
        }
        function changeSlide(dir) { currentSlide = (currentSlide + dir + productImages.length) % productImages.length; updateSlider(); }
        function goToSlide(idx) { currentSlide = idx; updateSlider(); }
        
        document.getElementById('productModal').addEventListener('click', e => { if(e.target.id==='productModal') closeModal(); });
        document.addEventListener('keydown', e => {
            if(!document.getElementById('productModal').classList.contains('active')) return;
            if(e.key==='Escape') closeModal();
            if(e.key==='ArrowLeft') changeSlide(-1);
            if(e.key==='ArrowRight') changeSlide(1);
        });

        window.addEventListener('load', function() {
            var video = document.getElementById('bgVideo');
            if(video) {
                video.play().catch(function(error) {
                    video.muted = true;
                    video.play().catch(function(e) { console.log("Fallback image active"); });
                });
            }
        });
    </script>
</body>
</html>
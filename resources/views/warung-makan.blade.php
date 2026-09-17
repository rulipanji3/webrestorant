<!DOCTYPE html>
<html class="scroll-smooth" lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Warung Makan Mba Neni - Authentic Javanese restaurant in Purwokerto. Open 24 hours. Serving traditional Javanese cuisine with fresh ingredients. Star 4.6 rating from 2,436+ reviews.">
    <meta name="keywords" content="Warung Makan Purwokerto, Warung Makan Mba Neni, Restoran Jawa Purwokerto, Kuliner Purwokerto, Makanan Jawa Banyumas, Tempat Makan Murah Purwokerto, Warung Makan 24 Jam Purwokerto, Kuliner Jawa Tengah">
    <meta name="author" content="Warung Makan Mba Neni">
    <meta property="og:title" content="Warung Makan Mba Neni - Authentic Javanese Flavors, Served 24 Hours">
    <meta property="og:description" content="Traditional Indonesian cuisine made with fresh ingredients and family recipes loved by thousands of customers.">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="id_ID">
    <title>Warung Makan Mba Neni | Authentic Javanese Cuisine in Purwokerto</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Restaurant",
        "name": "Warung Makan Mba Neni",
        "description": "Traditional Javanese restaurant in Purwokerto serving authentic Indonesian cuisine with fresh ingredients and family recipes.",
        "url": "{{ url()->current() }}",
        "telephone": "+62 281 123 4567",
        "servesCuisine": "Javanese",
        "priceRange": "Rp",
        "aggregateRating": {
            "@@type": "AggregateRating",
            "ratingValue": "4.6",
            "reviewCount": "2436",
            "bestRating": "5"
        },
        "address": {
            "@@type": "PostalAddress",
            "streetAddress": "Pakembaran, Bancarkembar",
            "addressLocality": "Purwokerto Utara",
            "addressRegion": "Banyumas",
            "postalCode": "53121",
            "addressCountry": "ID"
        },
        "openingHoursSpecification": {
            "@@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],
            "opens": "00:00",
            "closes": "23:59"
        }
    }
    </script>
    @vite(['resources/css/warung-makan.css', 'resources/js/warung-makan.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="whatsapp-number" content="{{ env('WHATSAPP_NUMBER', '6285810405551') }}">
</head>
<body class="selection:bg-ember selection:text-white bg-[#FAF7F2] text-bone font-sans antialiased">
<header id="site-header" class="fixed inset-x-0 top-0 z-50 border-b border-line/70 bg-[#FAF7F2]/90 backdrop-blur-md transition-all duration-300">
    <nav class="mx-auto flex h-18 w-full max-w-[1400px] items-center justify-between px-4 md:px-8">
        <a href="/warung-makan-mba-neni" class="flex items-center gap-3" aria-label="Warung Makan Mba Neni">
            <span class="flex h-10 w-10 items-center justify-center rounded-full bg-ember/10 text-ember border border-ember/20 shadow-2xs">
                <span class="material-symbols-outlined" style="font-size:20px">restaurant</span>
            </span>
            <span class="font-display text-xl font-bold tracking-tight text-bone">Mba <span class="text-ember">Neni</span></span>
        </a>

        <div class="hidden items-center gap-8 lg:flex">
            <a class="font-mono text-[12px] uppercase tracking-[0.16em] text-sand font-semibold transition-colors hover:text-ember" href="#menu">Menu</a>
            <a class="font-mono text-[12px] uppercase tracking-[0.16em] text-sand font-semibold transition-colors hover:text-ember" href="#about">Tentang</a>
            <a class="font-mono text-[12px] uppercase tracking-[0.16em] text-sand font-semibold transition-colors hover:text-ember" href="#reviews">Ulasan</a>
            <a class="font-mono text-[12px] uppercase tracking-[0.16em] text-sand font-semibold transition-colors hover:text-ember" href="#gallery">Galeri</a>
            <a class="font-mono text-[12px] uppercase tracking-[0.16em] text-sand font-semibold transition-colors hover:text-ember" href="#location">Lokasi</a>
        </div>

        <div class="flex items-center gap-3">
            <span class="inline-flex items-center gap-1.5 rounded-full border border-herb/30 bg-herb-soft px-3.5 py-1 text-xs font-semibold text-herb shadow-2xs hidden sm:inline-flex">
                <span class="h-2 w-2 rounded-full bg-herb animate-pulse"></span>
                Buka 24 Jam
            </span>
            <div class="relative">
                <button id="cart-toggle" class="relative inline-flex h-10 w-10 items-center justify-center rounded-full border border-line bg-white text-bone shadow-2xs transition-all hover:border-ember/60 hover:text-ember cursor-pointer" aria-label="Buka keranjang">
                    <span class="material-symbols-outlined text-[20px]">shopping_bag</span>
                    <span id="cart-count" class="absolute -right-1 -top-1 inline-flex h-5 min-w-[1.25rem] items-center justify-center rounded-full bg-ember px-1 font-mono text-[10px] font-bold text-white shadow-xs">0</span>
                </button>
                <span id="cart-message" class="absolute right-0 top-12 z-50 hidden whitespace-nowrap rounded-full border border-line bg-white px-4 py-2 text-xs text-bone shadow-xl"></span>
            </div>
            <a href="/order" class="hidden rounded-full bg-ember px-5 py-2.5 font-mono text-[12px] font-bold uppercase tracking-[0.12em] text-white transition-all hover:bg-ember-600 shadow-sm shadow-ember/20 md:inline-flex">Order Now</a>
            <button id="mobile-menu-btn" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-line bg-white text-bone shadow-2xs lg:hidden cursor-pointer" aria-label="Menu navigasi">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </nav>

    <div id="mobile-menu-panel" class="hidden border-t border-line bg-[#FAF7F2] px-6 py-5 lg:hidden shadow-lg">
        <div class="flex flex-col gap-1.5">
            <a class="rounded-xl px-4 py-2.5 font-mono text-[13px] font-semibold uppercase tracking-[0.16em] text-sand hover:bg-white hover:text-ember" href="#menu">Menu</a>
            <a class="rounded-xl px-4 py-2.5 font-mono text-[13px] font-semibold uppercase tracking-[0.16em] text-sand hover:bg-white hover:text-ember" href="#about">Tentang</a>
            <a class="rounded-xl px-4 py-2.5 font-mono text-[13px] font-semibold uppercase tracking-[0.16em] text-sand hover:bg-white hover:text-ember" href="#reviews">Ulasan</a>
            <a class="rounded-xl px-4 py-2.5 font-mono text-[13px] font-semibold uppercase tracking-[0.16em] text-sand hover:bg-white hover:text-ember" href="#gallery">Galeri</a>
            <a class="rounded-xl px-4 py-2.5 font-mono text-[13px] font-semibold uppercase tracking-[0.16em] text-sand hover:bg-white hover:text-ember" href="#location">Lokasi</a>
            <div class="mt-3 border-t border-line/60 pt-3">
                <a href="/order" class="btn-ember w-full">Order Now</a>
            </div>
        </div>
    </div>
</header>

<main>
    <!-- Hero -->
    <section class="relative flex min-h-[92dvh] items-center overflow-hidden">
        <div class="absolute inset-0">
            <img alt="Interior Warung Makan Mba Neni" fetchpriority="high" class="h-full w-full object-cover scale-105 transition-transform duration-1000" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfTsojNOZmJM3taxnscL5viE47aSt_K26yQQ&s" />
            <div class="absolute inset-0 bg-gradient-to-r from-[#1C120C]/95 via-[#291A12]/80 to-[#1C120C]/35"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#1C120C]/90 via-transparent to-[#1C120C]/50"></div>
        </div>

        <div class="relative z-10 mx-auto w-full max-w-[1400px] px-4 pt-24 pb-16 md:px-8">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-amber-400/30 bg-amber-500/15 px-4 py-1.5 font-mono text-[11px] uppercase tracking-[0.18em] text-amber-300 backdrop-blur-xs font-semibold reveal active">
                    <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    Purwokerto · Est. 1998 · Buka 24 Jam
                </div>
                <h1 class="mt-6 font-display text-[clamp(2.6rem,6.2vw,5.2rem)] font-extrabold leading-[1.02] tracking-tight text-white reveal active">
                    Authentic Javanese<br />Flavors, <span class="text-amber-400">Served 24 Hours.</span>
                </h1>
                <p class="mt-6 max-w-xl text-base leading-relaxed text-stone-200 md:text-lg reveal active font-normal">
                    Masakan khas Jawa Banyumasan dengan bahan segar pilihan dan bumbu rempah warisan keluarga yang dicintai ribuan pelanggan.
                </p>
                <div class="mt-9 flex flex-wrap items-center gap-4 reveal active">
                    <button class="order-now btn-ember text-base cursor-pointer">
                        Pesan Sekarang
                        <span class="material-symbols-outlined" style="font-size:19px">shopping_cart</span>
                    </button>
                    <a href="#menu" class="btn-ghost !border-white/30 !bg-white/10 !text-white hover:!bg-white/20 text-base">Lihat Menu</a>
                </div>
                <div class="mt-10 flex items-center gap-6 pt-6 border-t border-white/15 reveal active">
                    <div class="flex items-center gap-2">
                        <div class="flex text-amber-400">
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings:'FILL' 1">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings:'FILL' 1">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings:'FILL' 1">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings:'FILL' 1">star</span>
                            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings:'FILL' 1">star_half</span>
                        </div>
                        <span class="font-bold text-white text-sm">4.6</span>
                        <span class="text-stone-300 text-xs">(2.436+ Ulasan)</span>
                    </div>
                    <div class="h-4 w-px bg-white/20"></div>
                    <div class="text-xs text-stone-300 flex items-center gap-1.5 font-medium">
                        <span class="material-symbols-outlined text-amber-400 text-[18px]">verified</span> Resep Keluarga Autentik
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats band -->
    <section class="border-b border-line bg-white shadow-xs">
        <div class="mx-auto grid w-full max-w-[1400px] grid-cols-2 gap-4 px-4 py-8 md:grid-cols-4 md:gap-6 md:px-8 lg:py-10">
            <div class="flex items-center gap-4 rounded-2xl border border-line/70 bg-[#FAF7F2] p-4 transition-all hover:border-ember/30 shadow-2xs">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-amber-500/15 text-amber-600">
                    <span class="material-symbols-outlined text-2xl" style="font-variation-settings:'FILL' 1">star</span>
                </div>
                <div>
                    <div class="flex items-baseline gap-1">
                        <span data-target="4.6" class="font-display text-2xl md:text-3xl font-extrabold text-bone">0</span>
                        <span class="text-xs font-semibold text-sand">/ 5.0</span>
                    </div>
                    <div class="font-mono text-[10px] font-bold uppercase tracking-[0.16em] text-sand">Google Rating</div>
                </div>
            </div>
            <div class="flex items-center gap-4 rounded-2xl border border-line/70 bg-[#FAF7F2] p-4 transition-all hover:border-ember/30 shadow-2xs">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-ember/15 text-ember">
                    <span class="material-symbols-outlined text-2xl" style="font-variation-settings:'FILL' 1">reviews</span>
                </div>
                <div>
                    <div class="font-display text-2xl md:text-3xl font-extrabold text-bone">
                        <span data-target="2436" data-suffix="+">0</span>
                    </div>
                    <div class="font-mono text-[10px] font-bold uppercase tracking-[0.16em] text-sand">Ulasan Tamu</div>
                </div>
            </div>
            <div class="flex items-center gap-4 rounded-2xl border border-line/70 bg-[#FAF7F2] p-4 transition-all hover:border-ember/30 shadow-2xs">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-herb-soft text-herb">
                    <span class="material-symbols-outlined text-2xl" style="font-variation-settings:'FILL' 1">schedule</span>
                </div>
                <div>
                    <div class="font-display text-2xl md:text-3xl font-extrabold text-bone">24/7</div>
                    <div class="font-mono text-[10px] font-bold uppercase tracking-[0.16em] text-sand">Buka Nonstop</div>
                </div>
            </div>
            <div class="flex items-center gap-4 rounded-2xl border border-line/70 bg-[#FAF7F2] p-4 transition-all hover:border-ember/30 shadow-2xs">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-ember/15 text-ember">
                    <span class="material-symbols-outlined text-2xl">payments</span>
                </div>
                <div>
                    <div class="font-display text-2xl md:text-3xl font-extrabold text-bone">Ramah</div>
                    <div class="font-mono text-[10px] font-bold uppercase tracking-[0.16em] text-sand">Harga Terjangkau</div>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section id="about" class="py-20 md:py-28 bg-[#FAF7F2]">
        <div class="mx-auto grid w-full max-w-[1400px] items-center gap-12 px-4 md:px-8 lg:grid-cols-2 lg:gap-16">
            <div class="reveal-left relative">
                <div class="overflow-hidden rounded-3xl border border-line shadow-xl bg-white">
                    <img alt="Interior Warung Makan Mba Neni" loading="lazy" class="aspect-[4/3] w-full object-cover transition-transform duration-700 hover:scale-105" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfTsojNOZmJM3taxnscL5viE47aSt_K26yQQ&s" />
                </div>
                <div class="absolute -bottom-6 right-6 hidden items-center gap-3.5 rounded-2xl border border-line bg-white px-5 py-3.5 shadow-xl lg:flex">
                    <span class="flex h-11 w-11 items-center justify-center rounded-full bg-ember/15 text-ember">
                        <span class="material-symbols-outlined" style="font-size:22px">restaurant</span>
                    </span>
                    <div>
                        <div class="font-display text-base font-bold text-bone">Est. 1998</div>
                        <div class="font-mono text-[10px] font-bold uppercase tracking-[0.18em] text-sand">Warisan Resep Otentik</div>
                    </div>
                </div>
            </div>

            <div class="reveal-right">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-ember/10 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-ember">
                    <span class="material-symbols-outlined text-sm">history_edu</span> Cerita Dapur Kami
                </span>
                <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-bone md:text-4xl">About Warung Makan Mba Neni</h2>
                <p class="mt-5 leading-relaxed text-sand text-base">
                    Berdiri sejak 1998 di Purwokerto, Warung Makan Mba Neni merawat warisan kuliner tradisional Jawa dengan sepenuh hati. Setiap racikan bumbu diolah dengan resep turun-temurun, menghadirkan rasa gurih, sedap, dan memikat yang khas Banyumasan.
                </p>
                <p class="mt-4 leading-relaxed text-sand text-base">
                    Kami percaya masakan lezat bermula dari bahan yang segar dan penuh kejujuran. Daging dan sayuran kami datangkan langsung setiap pagi dari pasar lokal. Buka 24 jam untuk memastikan Anda selalu mendapatkan sepiring hidangan hangat yang menenangkan kapan pun dibutuhkan.
                </p>
                <div class="mt-8 grid gap-3 sm:grid-cols-3">
                    <div class="flex items-center gap-2.5 rounded-2xl border border-line bg-white py-3.5 px-4 shadow-2xs">
                        <span class="material-symbols-outlined text-herb" style="font-size:20px;font-variation-settings:'FILL' 1">check_circle</span>
                        <span class="font-mono text-[11px] font-bold uppercase tracking-[0.12em] text-bone">Bahan Segar</span>
                    </div>
                    <div class="flex items-center gap-2.5 rounded-2xl border border-line bg-white py-3.5 px-4 shadow-2xs">
                        <span class="material-symbols-outlined text-herb" style="font-size:20px;font-variation-settings:'FILL' 1">check_circle</span>
                        <span class="font-mono text-[11px] font-bold uppercase tracking-[0.12em] text-bone">Resep Asli</span>
                    </div>
                    <div class="flex items-center gap-2.5 rounded-2xl border border-line bg-white py-3.5 px-4 shadow-2xs">
                        <span class="material-symbols-outlined text-herb" style="font-size:20px;font-variation-settings:'FILL' 1">check_circle</span>
                        <span class="font-mono text-[11px] font-bold uppercase tracking-[0.12em] text-bone">Purwokerto Asli</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Signature menu -->
    <section id="menu" class="bg-white py-20 md:py-28 border-t border-line">
        <div class="mx-auto w-full max-w-[1400px] px-4 md:px-8">
            <div class="reveal flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-ember/10 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-ember">
                        <span class="material-symbols-outlined text-sm">restaurant_menu</span> Menu Pilihan
                    </span>
                    <h2 class="mt-3 font-display text-3xl font-extrabold tracking-tight text-bone md:text-4xl">Our Signature Menu</h2>
                    <p class="mt-3 max-w-xl text-sand text-base">Nikmati hidangan andalan kami, dimasak dengan bumbu rempah tradisional dan disajikan hangat setiap saat.</p>
                </div>
            </div>

            @php
                $categories = \App\Models\Category::with('menuItems')->orderBy('name')->get();
                $menuItems = \App\Models\MenuItem::with('category')->orderBy('name')->get();
            @endphp

            <div id="category-tabs" class="mt-8 flex flex-wrap gap-2.5 reveal">
                <button class="category-tab is-active" data-category="all">Semua Menu</button>
                @foreach($categories as $cat)
                    <button class="category-tab" data-category="{{ $cat->id }}">{{ $cat->name }}</button>
                @endforeach
            </div>

            <div id="menu-grid" class="stagger-grid mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($menuItems as $item)
                <div class="menu-item stagger-item card-menu group relative flex flex-col justify-between {{ !$item->is_available ? 'opacity-60 grayscale-[0.3]' : '' }}" data-category="{{ $item->category_id }}">
                    <div class="relative aspect-[4/3] overflow-hidden bg-stone-100">
                        @php $img = $item->imageSrc(); @endphp
                        @if($img)
                            <img alt="{{ $item->name }}" loading="lazy" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{ $img }}"/>
                        @else
                            <div class="flex h-full w-full items-center justify-center bg-stone-100 text-stone-400">
                                <span class="material-symbols-outlined" style="font-size:40px">restaurant</span>
                            </div>
                        @endif
                        @if(!$item->is_available)
                            <span class="absolute right-3 top-3 rounded-full bg-stone-900/80 px-3 py-1 font-mono text-[10px] font-bold uppercase tracking-[0.14em] text-stone-200 backdrop-blur-xs">Habis</span>
                        @else
                            <span class="absolute left-3 top-3 rounded-full bg-white/90 px-2.5 py-0.5 font-mono text-[10px] font-bold uppercase tracking-wider text-sand backdrop-blur-xs shadow-2xs">
                                {{ $item->category?->name ?? 'Menu' }}
                            </span>
                        @endif
                    </div>
                    <div class="flex flex-1 flex-col p-5">
                        <div class="flex items-start justify-between gap-2">
                            <a href="/menu/{{ $item->id }}" class="font-display text-lg font-bold tracking-tight text-bone transition-colors hover:text-ember">{{ $item->name }}</a>
                        </div>
                        <p class="mt-2 flex-1 text-sm leading-relaxed text-sand line-clamp-2">{{ $item->description }}</p>
                        <div class="mt-5 flex items-center justify-between border-t border-line/60 pt-4">
                            <div>
                                <span class="text-[10px] uppercase tracking-wider font-semibold text-dust block">Harga</span>
                                <span class="font-mono text-base font-extrabold text-ember">Rp {{ number_format($item->price,0,',','.') }}</span>
                            </div>
                            <button data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}" class="add-to-cart inline-flex items-center justify-center gap-1.5 rounded-full px-4 py-2 font-mono text-[11px] font-bold uppercase tracking-[0.1em] transition-all {{ $item->is_available ? 'bg-ember/10 text-ember border border-ember/30 hover:bg-ember hover:text-white shadow-2xs cursor-pointer' : 'cursor-not-allowed bg-coal-3 text-dust border border-line' }}" {{ !$item->is_available ? 'disabled' : '' }}>
                                <span class="material-symbols-outlined text-[16px]">add_shopping_cart</span>
                                {{ $item->is_available ? 'Tambah' : 'Habis' }}
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why choose us -->
    <section class="py-20 md:py-28 bg-[#FAF7F2] border-t border-line">
        <div class="mx-auto grid w-full max-w-[1400px] gap-12 px-4 md:px-8 lg:grid-cols-[1fr,1.4fr] lg:gap-20 items-center">
            <div class="reveal">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-ember/10 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-ember">
                    <span class="material-symbols-outlined text-sm">auto_awesome</span> Keunggulan Kami
                </span>
                <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-bone md:text-4xl">Dapur Hangat yang Tak Pernah Tidur.</h2>
                <p class="mt-4 text-sand text-base leading-relaxed">Semua yang kami siapkan berakar dari tradisi, diolah segar setiap hari, siap menyambut Anda kapan pun rasa lapar datang.</p>
            </div>
            <div class="reveal grid gap-6 sm:grid-cols-2">
                <div class="rounded-2xl border border-line bg-white p-6 shadow-xs hover:border-ember/40 transition-colors">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-ember/10 text-ember mb-4">
                        <span class="material-symbols-outlined">menu_book</span>
                    </div>
                    <h4 class="font-display text-lg font-bold text-bone">Resep Autentik</h4>
                    <p class="mt-2 text-sm leading-relaxed text-sand">Racikan bumbu tradisional khas Banyumas yang diwariskan dari generasi ke generasi.</p>
                </div>
                <div class="rounded-2xl border border-line bg-white p-6 shadow-xs hover:border-ember/40 transition-colors">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-herb-soft text-herb mb-4">
                        <span class="material-symbols-outlined">schedule</span>
                    </div>
                    <h4 class="font-display text-lg font-bold text-bone">Buka 24 Jam</h4>
                    <p class="mt-2 text-sm leading-relaxed text-sand">Kapan pun Anda lapar, siang maupun larut malam, kami selalu siap menyajikan hidangan hangat.</p>
                </div>
                <div class="rounded-2xl border border-line bg-white p-6 shadow-xs hover:border-ember/40 transition-colors">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-500/15 text-amber-600 mb-4">
                        <span class="material-symbols-outlined">sell</span>
                    </div>
                    <h4 class="font-display text-lg font-bold text-bone">Harga Terjangkau</h4>
                    <p class="mt-2 text-sm leading-relaxed text-sand">Kualitas rasa istimewa dengan harga ramah untuk mahasiswa dan masyarakat Purwokerto.</p>
                </div>
                <div class="rounded-2xl border border-line bg-white p-6 shadow-xs hover:border-ember/40 transition-colors">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-ember/15 text-ember mb-4">
                        <span class="material-symbols-outlined">group</span>
                    </div>
                    <h4 class="font-display text-lg font-bold text-bone">Ramah Keluarga</h4>
                    <p class="mt-2 text-sm leading-relaxed text-sand">Tempat luas, bersih, dan nyaman untuk berkumpul bersama keluarga serta kawan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Reviews -->
    <section id="reviews" class="bg-white py-20 md:py-28 border-t border-line">
        <div class="mx-auto w-full max-w-[1400px] px-4 md:px-8">
            <div class="reveal max-w-2xl">
                <div class="flex items-center gap-1.5 text-amber-500 mb-3">
                    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">star_half</span>
                    <span class="ml-2 font-bold text-bone text-base">4.6 / 5.0</span>
                </div>
                <h2 class="font-display text-3xl font-extrabold tracking-tight text-bone md:text-4xl">4.6 Rating from 2,436+ Guests</h2>
                <p class="mt-3 text-sand text-base">Pengalaman nyata pelanggan setia yang menyukai kehangatan rasa masakan khas Warung Makan Mba Neni.</p>
            </div>

            <div class="stagger-grid mt-12 grid grid-cols-1 gap-6 md:grid-cols-3">
                <div class="stagger-item rounded-2xl border border-line bg-[#FAF7F2] p-7 shadow-xs flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div>
                        <div class="flex items-center gap-1 text-amber-500 mb-4">
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings:'FILL' 1">star</span>
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings:'FILL' 1">star</span>
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings:'FILL' 1">star</span>
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings:'FILL' 1">star</span>
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings:'FILL' 1">star</span>
                        </div>
                        <p class="font-display text-lg font-semibold leading-relaxed text-bone">&ldquo;The best Nasi Campur in Purwokerto. It tastes just like my grandmother's cooking. The service is fast even at 2 AM!&rdquo;</p>
                    </div>
                    <div class="mt-6 flex items-center gap-3 border-t border-line/60 pt-4">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-ember/15 font-mono text-xs font-bold text-ember">BS</span>
                        <div>
                            <div class="text-sm font-bold text-bone">Budi Santoso</div>
                            <div class="font-mono text-[10px] uppercase tracking-[0.16em] text-sand font-semibold">Local Guide</div>
                        </div>
                    </div>
                </div>
                <div class="stagger-item rounded-2xl border border-line bg-[#FAF7F2] p-7 shadow-xs flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div>
                        <div class="flex items-center gap-1 text-amber-500 mb-4">
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings:'FILL' 1">star</span>
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings:'FILL' 1">star</span>
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings:'FILL' 1">star</span>
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings:'FILL' 1">star</span>
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings:'FILL' 1">star</span>
                        </div>
                        <p class="font-display text-lg font-semibold leading-relaxed text-bone">&ldquo;Incredible value for money. The Ayam Bakar is perfectly seasoned and the sambal has the right amount of kick. Highly recommended!&rdquo;</p>
                    </div>
                    <div class="mt-6 flex items-center gap-3 border-t border-line/60 pt-4">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-ember/15 font-mono text-xs font-bold text-ember">SA</span>
                        <div>
                            <div class="text-sm font-bold text-bone">Siti Aminah</div>
                            <div class="font-mono text-[10px] uppercase tracking-[0.16em] text-sand font-semibold">Food Enthusiast</div>
                        </div>
                    </div>
                </div>
                <div class="stagger-item rounded-2xl border border-line bg-[#FAF7F2] p-7 shadow-xs flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div>
                        <div class="flex items-center gap-1 text-amber-500 mb-4">
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings:'FILL' 1">star</span>
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings:'FILL' 1">star</span>
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings:'FILL' 1">star</span>
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings:'FILL' 1">star</span>
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings:'FILL' 1">star</span>
                        </div>
                        <p class="font-display text-lg font-semibold leading-relaxed text-bone">&ldquo;Always my go-to place after a long shift. Clean, professional, and consistently delicious. Best Javanese restaurant in town.&rdquo;</p>
                    </div>
                    <div class="mt-6 flex items-center gap-3 border-t border-line/60 pt-4">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-ember/15 font-mono text-xs font-bold text-ember">AP</span>
                        <div>
                            <div class="text-sm font-bold text-bone">Andi Pratama</div>
                            <div class="font-mono text-[10px] uppercase tracking-[0.16em] text-sand font-semibold">Night Worker</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dining & delivery -->
    <section class="px-4 py-20 md:px-8 md:py-28 bg-[#FAF7F2] border-t border-line">
        <div class="relative mx-auto w-full max-w-[1400px] overflow-hidden rounded-3xl bg-gradient-to-br from-[#291A13] via-[#20140E] to-[#160D09] text-white px-6 py-14 md:px-14 md:py-16 shadow-2xl">
            <div class="pointer-events-none absolute -right-24 -top-24 h-80 w-80 rounded-full bg-ember/20 blur-3xl"></div>
            <div class="relative z-10 grid items-center gap-10 lg:grid-cols-[1.1fr,1fr]">
                <div class="reveal">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white/10 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-amber-400">
                        <span class="material-symbols-outlined text-sm">room_service</span> Layanan Fleksibel
                    </span>
                    <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-white md:text-4xl">Dine-In, Takeaway, or Delivered</h2>
                    <p class="mt-4 max-w-md text-stone-300 leading-relaxed text-base">Nikmati sajian khas Mba Neni di mana saja. Layanan pesan antar cepat, bungkus siap santap, serta ruang dine-in yang nyaman di Purwokerto.</p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="tel:+622811234567" class="btn-ember">
                            <span class="material-symbols-outlined" style="font-size:18px">call</span> Telepon Kami
                        </a>
                        <a href="/booking" class="btn-ghost !bg-white/10 !border-white/20 !text-white hover:!bg-white/20">Book a Table</a>
                    </div>
                </div>
                <div class="stagger-grid grid grid-cols-3 gap-3 md:gap-4">
                    <div class="stagger-item flex flex-col items-center gap-3 rounded-2xl border border-white/15 bg-white/5 p-6 backdrop-blur-xs text-center">
                        <span class="material-symbols-outlined text-amber-400" style="font-size:32px;font-variation-settings:'FILL' 1">restaurant</span>
                        <span class="font-mono text-xs uppercase tracking-[0.14em] text-white font-bold">Dine-In</span>
                        <span class="text-[11px] text-stone-300">Tempat Nyaman</span>
                    </div>
                    <div class="stagger-item flex flex-col items-center gap-3 rounded-2xl border border-white/15 bg-white/5 p-6 backdrop-blur-xs text-center">
                        <span class="material-symbols-outlined text-amber-400" style="font-size:32px;font-variation-settings:'FILL' 1">shopping_bag</span>
                        <span class="font-mono text-xs uppercase tracking-[0.14em] text-white font-bold">Takeaway</span>
                        <span class="text-[11px] text-stone-300">Bungkus Cepat</span>
                    </div>
                    <div class="stagger-item flex flex-col items-center gap-3 rounded-2xl border border-white/15 bg-white/5 p-6 backdrop-blur-xs text-center">
                        <span class="material-symbols-outlined text-amber-400" style="font-size:32px;font-variation-settings:'FILL' 1">delivery_dining</span>
                        <span class="font-mono text-xs uppercase tracking-[0.14em] text-white font-bold">Delivery</span>
                        <span class="text-[11px] text-stone-300">Pesan Antar</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section id="gallery" class="py-20 md:py-28 bg-white border-t border-line">
        <div class="mx-auto w-full max-w-[1400px] px-4 md:px-8">
            <div class="mx-auto max-w-2xl text-center reveal">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-ember/10 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-ember">
                    <span class="material-symbols-outlined text-sm">photo_library</span> Suasana Warung
                </span>
                <h2 class="mt-3 font-display text-3xl font-extrabold tracking-tight text-bone md:text-4xl">Gallery &amp; Atmosphere</h2>
                <p class="mt-3 text-sand text-base">Melihat lebih dekat kehangatan dapur dan suasana santap di Warung Makan Mba Neni.</p>
            </div>
            <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-3 reveal">
                <figure class="group overflow-hidden rounded-3xl border border-line bg-white shadow-xs">
                    <img alt="Suasana Warung Makan Mba Neni" loading="lazy" class="aspect-[3/4] w-full object-cover object-center transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/gps-cs-s/AHRPTWnJa3jDCtSgWwf307Ia9-N0KEvmcMEr29XSt9nWljWNsjAeI8gsDgbd_VDxTd4eAVvQpOCwuxTEaPj1HwkfeHnea9rJfJOzHfl4IS8VrfMSLv63BWRnvXZ8_h-C7vo5_ItCOzfOF1h59KAv=s680-w680-h510"/>
                </figure>
                <figure class="group overflow-hidden rounded-3xl border border-line bg-white shadow-xs">
                    <img alt="Atmosfer ruang makan" loading="lazy" class="aspect-[3/4] w-full object-cover object-center transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/gps-cs-s/AHRPTWlfYQtRY-fYOv6Wl7ZaDcVmgJ6v6VUBMBdpHv-kfs3EVG7guBMkk103hhfC2KAmauyiRE7rgYJvgjzSOssR9AAFFF136ij_QC1rzYkqbrHcuTFW8aHgbjdjkKB_0O31SVUWQNE=s680-w680-h510"/>
                </figure>
                <figure class="group overflow-hidden rounded-3xl border border-line bg-white shadow-xs">
                    <img alt="Detail penyajian masakan" loading="lazy" class="aspect-[3/4] w-full object-cover object-center transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/gps-cs-s/AHRPTWntuDXHh-6vPmrgqGHI7_HKafBVj7iArehhKHI5Sl4qGDSNoiSP-qrkMtAiJqkJ1vsuytEMV5Re0V7m5xqybEStKUwP_t7PwYVdH1cuQMemfAcDyUEvbQRcVPu1v6OX1FJbS46S=s680-w680-h510"/>
                </figure>
            </div>
        </div>
    </section>

    <!-- Location -->
    <section id="location" class="py-20 md:py-28 bg-[#FAF7F2] border-t border-line">
        <div class="mx-auto grid w-full max-w-[1400px] items-center gap-12 px-4 md:px-8 lg:grid-cols-2 lg:gap-16">
            <div class="reveal-left">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-ember/10 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-ember">
                    <span class="material-symbols-outlined text-sm">pin_drop</span> Lokasi Warung
                </span>
                <h2 class="mt-3 font-display text-3xl font-extrabold tracking-tight text-bone md:text-4xl">Visit Us</h2>
                <div class="mt-8 space-y-4">
                    <div class="flex items-start gap-4 rounded-2xl p-4 bg-white border border-line/70 shadow-2xs">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-ember/10 text-ember">
                            <span class="material-symbols-outlined text-xl">location_on</span>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-bone">Alamat Lengkap</div>
                            <p class="mt-1 text-sm leading-relaxed text-sand">Pakembaran, Bancarkembar, Kec. Purwokerto Utara, Kabupaten Banyumas, Jawa Tengah 53121</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 rounded-2xl p-4 bg-white border border-line/70 shadow-2xs">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-herb-soft text-herb">
                            <span class="material-symbols-outlined text-xl">schedule</span>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-bone">Jam Operasional</div>
                            <p class="mt-1 text-sm leading-relaxed text-sand">Buka 24 Jam Nonstop, 7 Hari Seminggu</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 rounded-2xl p-4 bg-white border border-line/70 shadow-2xs">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-amber-500/15 text-amber-600">
                            <span class="material-symbols-outlined text-xl">near_me</span>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-bone">Petunjuk Arah</div>
                            <p class="mt-1 text-sm leading-relaxed text-sand">Dekat Kampus Unsoed Purwokerto, sebelah selatan Pasar Tradisional Bancarkembar.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="https://www.google.com/maps/place/Warung+Makan+Mba+Neni/@-7.4088448,109.2386816,14z/data=!4m4!3m3!1s0x2e655fc39aaf7b49:0x41838457cd506e5e!8m2!3d-7.4084519!4d109.238324" target="_blank" rel="noopener noreferrer" class="btn-ember">
                        <span class="material-symbols-outlined" style="font-size:18px">directions</span> Buka di Google Maps
                    </a>
                </div>
            </div>
            <div class="reveal-right overflow-hidden rounded-3xl border border-line bg-white shadow-lg">
                <iframe class="aspect-video w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15822.436821488314!2d109.2386816!3d-7.4088448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655fc39aaf7b49%3A0x41838457cd506e5e!2sWarung%20Makan%20Mba%20Neni!5e0!3m2!1sid!2sid!4v1" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Peta Lokasi Warung Makan Mba Neni"></iframe>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="border-t border-[#382319] bg-[#221610] text-stone-300">
    <div class="mx-auto grid w-full max-w-[1400px] gap-10 px-4 py-16 md:grid-cols-2 md:px-8 lg:grid-cols-[1.5fr,1fr,1fr]">
        <div>
            <a href="/warung-makan-mba-neni" class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-ember/20 text-ember border border-ember/30">
                    <span class="material-symbols-outlined" style="font-size:20px">restaurant</span>
                </span>
                <span class="font-display text-xl font-bold tracking-tight text-white">Mba <span class="text-amber-400">Neni</span></span>
            </a>
            <p class="mt-5 max-w-sm text-sm leading-relaxed text-stone-300">
                Menghadirkan kehangatan dan cita rasa autentik masakan Jawa langsung ke meja Anda. Tempat santap favorit 24 jam di Purwokerto.
            </p>
            <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '6285810405551') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-full bg-white/10 hover:bg-white/15 px-4 py-2.5 text-xs font-semibold text-emerald-300 border border-emerald-500/30 mt-6 transition-colors shadow-2xs">
                <span class="material-symbols-outlined text-base">chat</span>
                Hubungi via WhatsApp
            </a>
        </div>
        <div>
            <h6 class="font-mono text-[11px] uppercase tracking-[0.2em] text-amber-400 font-bold">Navigasi</h6>
            <ul class="mt-5 space-y-3 text-sm">
                <li><a class="text-stone-300 transition-colors hover:text-white" href="#menu">Daftar Menu</a></li>
                <li><a class="text-stone-300 transition-colors hover:text-white" href="#about">Tentang Warung</a></li>
                <li><a class="text-stone-300 transition-colors hover:text-white" href="#reviews">Ulasan Pelanggan</a></li>
                <li><a class="text-stone-300 transition-colors hover:text-white" href="/booking">Booking Meja</a></li>
                <li><a class="text-stone-300 transition-colors hover:text-white" href="/order">Pesan Online</a></li>
            </ul>
        </div>
        <div>
            <h6 class="font-mono text-[11px] uppercase tracking-[0.2em] text-amber-400 font-bold">Kontak &amp; Jam Buka</h6>
            <ul class="mt-5 space-y-3 text-sm text-stone-300">
                <li class="flex items-center gap-3"><span class="material-symbols-outlined text-amber-400 text-lg">call</span>+62 281 123 4567</li>
                <li class="flex items-center gap-3"><span class="material-symbols-outlined text-amber-400 text-lg">mail</span>info@mbaneni.com</li>
                <li class="flex items-center gap-3"><span class="material-symbols-outlined text-emerald-400 text-lg">schedule</span>Buka 24 Jam Nonstop</li>
                <li class="flex items-center gap-3"><span class="material-symbols-outlined text-amber-400 text-lg">location_on</span>Purwokerto Utara, Banyumas</li>
            </ul>
        </div>
    </div>
    <div class="border-t border-white/10">
        <div class="mx-auto flex w-full max-w-[1400px] flex-col items-center justify-between gap-3 px-4 py-6 md:flex-row md:px-8">
            <p class="font-mono text-[11px] uppercase tracking-[0.14em] text-stone-400">&copy; {{ date('Y') }} Warung Makan Mba Neni. Hak Cipta Dilindungi.</p>
            <p class="flex items-center gap-2 font-mono text-[11px] uppercase tracking-[0.14em] text-stone-400">
                Authentic Javanese Heritage · Purwokerto
                <span class="material-symbols-outlined text-ember text-sm" style="font-variation-settings:'FILL' 1">favorite</span>
            </p>
        </div>
    </div>
</footer>

<!-- Cart drawer -->
<div id="cart-drawer" class="fixed bottom-4 right-4 z-50 hidden max-h-[85vh] w-[min(26rem,calc(100vw-2rem))] flex-col rounded-3xl border border-line bg-white p-6 shadow-2xl">
    <div class="flex items-center justify-between border-b border-line/60 pb-4">
        <div class="flex items-center gap-2.5">
            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-ember/10 text-ember">
                <span class="material-symbols-outlined text-lg">shopping_basket</span>
            </span>
            <h3 class="font-display text-lg font-bold text-bone">Keranjang Anda</h3>
        </div>
        <button id="cart-close" class="flex h-8 w-8 items-center justify-center rounded-full text-sand hover:bg-stone-100 hover:text-bone transition-colors cursor-pointer" aria-label="Tutup keranjang">
            <span class="material-symbols-outlined text-lg">close</span>
        </button>
    </div>
    <div class="mt-4 flex-1 overflow-y-auto pr-1">
        <ul id="cart-items" class="space-y-3"></ul>
    </div>
    <div class="flex-shrink-0 border-t border-line/60 pt-4 mt-4">
        <div class="flex items-center justify-between">
            <span class="font-mono text-xs uppercase tracking-wider text-sand font-semibold">Total Pembayaran</span>
            <span id="cart-total" class="font-mono text-xl font-extrabold text-ember">Rp 0</span>
        </div>
        <div class="mt-4 grid grid-cols-1 gap-2.5">
            <button id="cart-checkout" class="btn-ember w-full py-3! text-xs uppercase tracking-wider cursor-pointer">Lanjut ke Pembayaran</button>
            <a id="cart-whatsapp" href="#" data-whatsapp-phone="{{ env('WHATSAPP_NUMBER', '6285810405551') }}" class="btn-ghost w-full py-3! text-xs uppercase tracking-wider !text-herb !border-herb/30 hover:!bg-herb-soft">
                <span class="material-symbols-outlined" style="font-size:18px">chat</span> Pesan via WhatsApp
            </a>
        </div>
    </div>
</div>

<!-- Checkout modal -->
<div id="checkout-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-xs p-4">
    <div class="w-full max-w-lg rounded-3xl border border-line bg-white p-6 shadow-2xl md:p-8">
        <div class="flex items-center justify-between border-b border-line/60 pb-4">
            <div class="flex items-center gap-2.5">
                <span class="flex h-9 w-9 items-center justify-center rounded-full bg-ember/10 text-ember">
                    <span class="material-symbols-outlined text-xl">receipt_long</span>
                </span>
                <h3 class="font-display text-xl font-bold text-bone">Konfirmasi Pesanan</h3>
            </div>
            <button id="checkout-cancel" class="text-xs font-bold uppercase tracking-wider text-sand hover:text-ember transition-colors cursor-pointer">Tutup</button>
        </div>
        <div class="mt-6 space-y-4">
            <div>
                <label for="checkout-name" class="field-label">Nama Lengkap</label>
                <input id="checkout-name" type="text" placeholder="Contoh: Budi Santoso" class="field" required>
            </div>
            <div>
                <label for="checkout-phone" class="field-label">No. Telepon / WhatsApp</label>
                <input id="checkout-phone" type="tel" placeholder="Contoh: 08123456789" class="field">
            </div>
            <div>
                <label for="checkout-service" class="field-label">Metode Layanan</label>
                <select id="checkout-service" class="field">
                    <option value="dine_in">Makan di Tempat (Dine-in)</option>
                    <option value="takeaway">Bawa Pulang (Takeaway)</option>
                    <option value="delivery">Pesan Antar (Delivery)</option>
                </select>
            </div>
            <div>
                <span class="field-label">Ringkasan Pesanan</span>
                <div id="checkout-summary" class="max-h-[35vh] space-y-2.5 overflow-y-auto rounded-2xl border border-line bg-[#FAF7F2] p-4 text-sm"></div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-between border-t border-line/60 pt-4">
            <span class="font-mono text-xs uppercase tracking-wider text-sand font-semibold">Total Bayar</span>
            <span id="checkout-total" class="font-mono text-xl font-extrabold text-ember">Rp 0</span>
        </div>
        <div class="mt-6 grid grid-cols-1 gap-3 sm:grid-cols-2">
            <button id="checkout-confirm" class="btn-ember w-full py-3! uppercase tracking-wider text-xs cursor-pointer">Konfirmasi &amp; Bayar</button>
            <button id="checkout-close" class="btn-ghost w-full py-3! uppercase tracking-wider text-xs cursor-pointer">Kembali</button>
        </div>
    </div>
</div>

<!-- Order confirmation modal -->
<div id="order-confirmation-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-xs p-4">
    <div class="w-full max-w-lg rounded-3xl border border-line bg-white p-6 shadow-2xl md:p-8">
        <div class="flex items-center justify-between border-b border-line/60 pb-4">
            <div class="flex items-center gap-2">
                <span class="flex h-9 w-9 items-center justify-center rounded-full bg-herb-soft text-herb">
                    <span class="material-symbols-outlined text-xl">check_circle</span>
                </span>
                <h3 class="font-display text-xl font-bold text-bone">Pesanan Diterima!</h3>
            </div>
            <button id="order-confirmation-close" class="flex h-8 w-8 items-center justify-center rounded-full text-sand hover:bg-stone-100 hover:text-bone transition-colors cursor-pointer" aria-label="Tutup">
                <span class="material-symbols-outlined text-lg">close</span>
            </button>
        </div>
        <div class="mt-5 flex justify-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-herb/30 bg-herb-soft px-5 py-2 font-mono text-xs font-bold uppercase tracking-wider text-herb">
                <span class="material-symbols-outlined text-base" style="font-variation-settings:'FILL' 1">check_circle</span>
                Status: Lunas (Manual)
            </span>
        </div>
        <div class="mt-6 grid grid-cols-2 gap-4 rounded-2xl bg-[#FAF7F2] p-4 border border-line/60">
            <div>
                <div class="text-[11px] font-medium text-dust uppercase tracking-wider">Nama Pelanggan</div>
                <div id="order-confirmation-customer" class="mt-1 text-sm font-bold text-bone">-</div>
            </div>
            <div>
                <div class="text-[11px] font-medium text-dust uppercase tracking-wider">No. Telepon</div>
                <div id="order-confirmation-phone" class="mt-1 text-sm font-bold text-bone">-</div>
            </div>
            <div>
                <div class="text-[11px] font-medium text-dust uppercase tracking-wider">Metode Layanan</div>
                <div id="order-confirmation-service" class="mt-1 text-sm font-bold text-bone">-</div>
            </div>
            <div>
                <div class="text-[11px] font-medium text-dust uppercase tracking-wider">Kode Pesanan</div>
                <div id="order-confirmation-id" class="mt-1 font-mono text-sm font-extrabold text-ember">#-</div>
            </div>
        </div>
        <div class="mt-5">
            <div id="order-barcode-container" class="hidden flex-col items-center gap-2 rounded-2xl border border-line bg-[#FAF7F2] p-5">
                <img id="order-barcode-img" src="" alt="Barcode" class="h-20 w-auto">
                <div id="order-ref-code" class="font-mono text-xs tracking-widest text-sand font-bold">-</div>
            </div>
        </div>
        <div id="order-confirmation-items" class="mt-5 max-h-[30vh] space-y-2.5 overflow-y-auto rounded-2xl border border-line bg-[#FAF7F2] p-4 text-sm"></div>
        <div class="mt-5 flex items-center justify-between border-t border-line/60 pt-4">
            <span class="font-mono text-xs uppercase tracking-wider text-sand font-semibold">Total Bayar</span>
            <span id="order-confirmation-total" class="font-mono text-xl font-extrabold text-ember">Rp 0</span>
        </div>
        <div class="mt-5 grid grid-cols-1 gap-3 sm:grid-cols-2">
            <button id="order-confirmation-copy" class="btn-ember w-full py-3! uppercase tracking-wider text-xs cursor-pointer">
                <span class="material-symbols-outlined text-base">print</span> Cetak Struk
            </button>
            <button id="order-confirmation-close-2" class="btn-ghost w-full py-3! uppercase tracking-wider text-xs cursor-pointer">Selesai</button>
        </div>
    </div>
</div>

<!-- Remove confirm modal -->
<div id="remove-confirm-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-xs p-4">
    <div class="w-full max-w-sm rounded-3xl border border-line bg-white p-6 shadow-2xl">
        <h3 class="font-display text-xl font-bold text-bone">Hapus item?</h3>
        <p class="mt-2 text-sm text-sand leading-relaxed">Apakah Anda yakin ingin menghapus produk ini dari keranjang pesanan?</p>
        <div class="mt-6 flex gap-3">
            <button id="confirm-remove" class="btn-ember flex-1 py-2.5! px-4! text-xs uppercase tracking-wider cursor-pointer">Ya, Hapus</button>
            <button id="cancel-remove" class="btn-ghost flex-1 py-2.5! text-xs uppercase tracking-wider cursor-pointer">Batal</button>
        </div>
    </div>
</div>

<!-- Toast -->
<div id="site-toast" class="fixed inset-x-0 bottom-6 z-[70] hidden justify-center px-4">
    <div class="mx-auto flex w-max max-w-full items-center gap-3 rounded-full border border-line bg-white/95 py-2.5 pl-5 pr-3 shadow-xl backdrop-blur-xs">
        <p id="site-toast-text" class="text-sm font-medium text-bone"></p>
        <button id="site-toast-action" class="hidden rounded-full bg-ember px-4 py-1.5 font-mono text-[11px] font-bold uppercase tracking-[0.12em] text-white"></button>
        <button id="site-toast-close" class="text-sand hover:text-bone transition-colors cursor-pointer" aria-label="Tutup">
            <span class="material-symbols-outlined" style="font-size:18px">close</span>
        </button>
    </div>
</div>

</body>
</html>
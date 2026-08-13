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
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.bunny.net/css?family=manrope:500,600,700|outfit:600,700,800|jetbrains-mono:400,500,700" rel="stylesheet">
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
<body class="selection:bg-ember selection:text-ink">
<header id="site-header" class="fixed inset-x-0 top-0 z-50 border-b border-line/60 bg-ink/80 backdrop-blur-md">
    <nav class="mx-auto flex h-16 w-full max-w-[1400px] items-center justify-between px-4 md:px-8">
        <a href="/warung-makan-mba-neni" class="flex items-center gap-2.5" aria-label="Warung Makan Mba Neni">
            <span class="flex h-9 w-9 items-center justify-center rounded-full border border-ember/40 bg-coal-3">
                <span class="material-symbols-outlined text-ember" style="font-size:19px">restaurant</span>
            </span>
            <span class="font-display text-lg font-bold tracking-tight text-bone">Mba <span class="text-ember">Neni</span></span>
        </a>

        <div class="hidden items-center gap-8 lg:flex">
            <a class="font-mono text-[12px] uppercase tracking-[0.16em] text-sand transition-colors hover:text-bone" href="#menu">Menu</a>
            <a class="font-mono text-[12px] uppercase tracking-[0.16em] text-sand transition-colors hover:text-bone" href="#about">Tentang</a>
            <a class="font-mono text-[12px] uppercase tracking-[0.16em] text-sand transition-colors hover:text-bone" href="#reviews">Ulasan</a>
            <a class="font-mono text-[12px] uppercase tracking-[0.16em] text-sand transition-colors hover:text-bone" href="#gallery">Galeri</a>
            <a class="font-mono text-[12px] uppercase tracking-[0.16em] text-sand transition-colors hover:text-bone" href="#location">Lokasi</a>
        </div>

        <div class="flex items-center gap-3">
            <span class="chip hidden sm:inline-flex">
                <span class="h-1.5 w-1.5 rounded-full bg-ember"></span>
                Buka 24 Jam
            </span>
            <div class="relative">
                <button id="cart-toggle" class="relative inline-flex h-10 w-10 items-center justify-center rounded-full border border-line bg-coal-3 text-bone transition-colors hover:border-ember/40 hover:text-ember" aria-label="Buka keranjang">
                    <span class="material-symbols-outlined">shopping_cart</span>
                    <span id="cart-count" class="absolute -right-1 -top-1 inline-flex h-5 min-w-[1.25rem] items-center justify-center rounded-full bg-ember px-1 font-mono text-[10px] font-bold text-ink">0</span>
                </button>
                <span id="cart-message" class="absolute right-0 top-12 z-50 hidden whitespace-nowrap rounded-full border border-line bg-coal-2 px-4 py-2 text-xs text-bone shadow-xl"></span>
            </div>
            <a href="/order" class="hidden rounded-full border border-ember/50 px-5 py-2.5 font-mono text-[12px] uppercase tracking-[0.14em] text-ember transition-all hover:bg-ember hover:text-ink md:inline-flex">Order Now</a>
            <button id="mobile-menu-btn" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-line bg-coal-3 text-bone lg:hidden" aria-label="Menu navigasi">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </nav>

    <div id="mobile-menu-panel" class="hidden border-t border-line bg-ink px-6 py-5 lg:hidden">
        <div class="flex flex-col gap-1">
            <a class="rounded-lg px-3 py-2.5 font-mono text-[13px] uppercase tracking-[0.16em] text-sand hover:bg-coal-3 hover:text-bone" href="#menu">Menu</a>
            <a class="rounded-lg px-3 py-2.5 font-mono text-[13px] uppercase tracking-[0.16em] text-sand hover:bg-coal-3 hover:text-bone" href="#about">Tentang</a>
            <a class="rounded-lg px-3 py-2.5 font-mono text-[13px] uppercase tracking-[0.16em] text-sand hover:bg-coal-3 hover:text-bone" href="#reviews">Ulasan</a>
            <a class="rounded-lg px-3 py-2.5 font-mono text-[13px] uppercase tracking-[0.16em] text-sand hover:bg-coal-3 hover:text-bone" href="#gallery">Galeri</a>
            <a class="rounded-lg px-3 py-2.5 font-mono text-[13px] uppercase tracking-[0.16em] text-sand hover:bg-coal-3 hover:text-bone" href="#location">Lokasi</a>
            <div class="mt-2 border-t border-line pt-3">
                <a href="/order" class="btn-ember w-full">Order Now</a>
            </div>
        </div>
    </div>
</header>

<main>
    <!-- Hero -->
    <section class="relative flex min-h-[100dvh] items-center overflow-hidden">
        <div class="absolute inset-0">
            <img alt="Interior Warung Makan Mba Neni" fetchpriority="high" class="h-full w-full object-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfTsojNOZmJM3taxnscL5viE47aSt_K26yQQ&s" />
            <div class="absolute inset-0 bg-gradient-to-r from-ink via-ink/85 to-ink/20"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-ink/60 via-transparent to-ink"></div>
        </div>

        <div class="relative z-10 mx-auto w-full max-w-[1400px] px-4 pt-24 md:px-8">
            <div class="max-w-2xl">
                <p class="eyebrow reveal active">Purwokerto · Est. 1998</p>
                <h1 class="mt-5 font-display text-[clamp(2.5rem,6.5vw,5.4rem)] font-extrabold leading-[0.95] tracking-[-0.03em] text-bone reveal active">
                    Authentic Javanese<br />Flavors, <span class="text-ember">Served 24 Hours.</span>
                </h1>
                <p class="mt-6 max-w-xl text-base leading-relaxed text-sand md:text-lg reveal active">
                    Traditional Indonesian cuisine made with fresh ingredients and family recipes, loved by thousands of customers.
                </p>
                <div class="mt-9 flex flex-wrap items-center gap-4 reveal active">
                    <button class="order-now btn-ember">
                        Order Now
                        <span class="material-symbols-outlined" style="font-size:18px">shopping_cart</span>
                    </button>
                    <a href="#menu" class="btn-ghost">Lihat Menu</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats band -->
    <section class="border-y border-line bg-coal">
        <div class="mx-auto grid w-full max-w-[1400px] grid-cols-2 gap-x-6 gap-y-8 px-4 py-10 md:grid-cols-4 md:px-8 lg:py-12">
            <div>
                <div class="flex items-baseline gap-1.5">
                    <span data-target="4.6" class="font-display text-4xl font-extrabold text-ember">0</span>
                    <span class="material-symbols-outlined text-ember" style="font-size:20px;font-variation-settings:'FILL' 1">star</span>
                </div>
                <div class="mt-1 font-mono text-[11px] uppercase tracking-[0.2em] text-dust">Google Rating</div>
            </div>
            <div>
                <div class="font-display text-4xl font-extrabold text-ember">
                    <span data-target="2436" data-suffix="+">0</span>
                </div>
                <div class="mt-1 font-mono text-[11px] uppercase tracking-[0.2em] text-dust">Ulasan Tamu</div>
            </div>
            <div>
                <div class="font-display text-4xl font-extrabold text-ember">24/7</div>
                <div class="mt-1 font-mono text-[11px] uppercase tracking-[0.2em] text-dust">Jam Buka</div>
            </div>
            <div>
                <div class="flex items-baseline gap-1.5">
                    <span class="material-symbols-outlined text-ember" style="font-size:20px">payments</span>
                    <span class="font-display text-4xl font-extrabold text-ember">Low</span>
                </div>
                <div class="mt-1 font-mono text-[11px] uppercase tracking-[0.2em] text-dust">Kisaran Harga</div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section id="about" class="py-20 md:py-28">
        <div class="mx-auto grid w-full max-w-[1400px] items-center gap-12 px-4 md:px-8 lg:grid-cols-2 lg:gap-16">
            <div class="reveal-left relative">
                <div class="overflow-hidden rounded-2xl border border-line">
                    <img alt="Interior Warung Makan Mba Neni" loading="lazy" class="aspect-[4/3] w-full object-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfTsojNOZmJM3taxnscL5viE47aSt_K26yQQ&s" />
                    <div class="pointer-events-none absolute -inset-px rounded-2xl ring-1 ring-inset ring-white/10"></div>
                </div>
                <div class="absolute -bottom-5 right-4 hidden items-center gap-3 rounded-2xl border border-line bg-coal-2 px-5 py-3 shadow-xl lg:flex">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-ember/15">
                        <span class="material-symbols-outlined text-ember" style="font-size:20px">restaurant</span>
                    </span>
                    <div>
                        <div class="font-display text-sm font-bold text-bone">Est. 1998</div>
                        <div class="font-mono text-[10px] uppercase tracking-[0.18em] text-sand">Generations of Flavor</div>
                    </div>
                </div>
            </div>

            <div class="reveal-right">
                <p class="eyebrow">Tentang Warung</p>
                <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-bone md:text-4xl">About Warung Makan Mba Neni</h2>
                <p class="mt-6 leading-relaxed text-sand">
                    Nestled in the heart of Purwokerto, Warung Makan Mba Neni represents the pinnacle of authentic Javanese culinary heritage. Our kitchen is built upon time-honored family recipes that have been passed down through generations, ensuring every bite carries the soul of Banyumas.
                </p>
                <p class="mt-4 leading-relaxed text-sand">
                    We believe that great food starts with integrity. That's why we source our ingredients daily from local farmers, choosing only the freshest produce and highest quality meats to create our signature dishes. Our 24-hour service is a testament to our commitment to the community, providing a warm, home-style meal whenever you need it.
                </p>
                <div class="mt-8 grid gap-3 sm:grid-cols-3">
                    <div class="flex items-center gap-2.5 rounded-xl border border-line bg-coal py-3 px-4">
                        <span class="material-symbols-outlined text-ember" style="font-size:18px;font-variation-settings:'FILL' 1">check_circle</span>
                        <span class="font-mono text-[11px] uppercase tracking-[0.12em] text-bone">Daily Fresh</span>
                    </div>
                    <div class="flex items-center gap-2.5 rounded-xl border border-line bg-coal py-3 px-4">
                        <span class="material-symbols-outlined text-ember" style="font-size:18px;font-variation-settings:'FILL' 1">check_circle</span>
                        <span class="font-mono text-[11px] uppercase tracking-[0.12em] text-bone">Traditional Recipes</span>
                    </div>
                    <div class="flex items-center gap-2.5 rounded-xl border border-line bg-coal py-3 px-4">
                        <span class="material-symbols-outlined text-ember" style="font-size:18px;font-variation-settings:'FILL' 1">check_circle</span>
                        <span class="font-mono text-[11px] uppercase tracking-[0.12em] text-bone">Purwokerto Local</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Signature menu -->
    <section id="menu" class="bg-coal py-20 md:py-28">
        <div class="mx-auto w-full max-w-[1400px] px-4 md:px-8">
            <div class="reveal max-w-2xl">
                <p class="eyebrow">Menu</p>
                <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-bone md:text-4xl">Our Signature Menu</h2>
                <p class="mt-4 text-sand">Discover our most loved dishes, prepared with authentic Javanese spices and contemporary culinary precision.</p>
            </div>

            @php
                $categories = \App\Models\Category::with('menuItems')->orderBy('name')->get();
                $menuItems = \App\Models\MenuItem::with('category')->orderBy('name')->get();
            @endphp

            <div id="category-tabs" class="mt-10 flex flex-wrap gap-2.5 reveal">
                <button class="category-tab is-active" data-category="all">Semua</button>
                @foreach($categories as $cat)
                    <button class="category-tab" data-category="{{ $cat->id }}">{{ $cat->name }}</button>
                @endforeach
            </div>

            <div id="menu-grid" class="stagger-grid mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($menuItems as $item)
                <div class="menu-item stagger-item card-menu group {{ !$item->is_available ? 'opacity-50' : '' }}" data-category="{{ $item->category_id }}">
                    <div class="relative aspect-[4/3] overflow-hidden">
                        @php $img = $item->imageSrc(); @endphp
                        @if($img)
                            <img alt="{{ $item->name }}" loading="lazy" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{ $img }}"/>
                        @else
                            <div class="flex h-full w-full items-center justify-center bg-coal-3 text-dust">
                                <span class="material-symbols-outlined" style="font-size:40px">restaurant</span>
                            </div>
                        @endif
                        @if(!$item->is_available)
                            <span class="absolute right-3 top-3 rounded-full border border-ember/30 bg-ink/80 px-3 py-1 font-mono text-[10px] uppercase tracking-[0.14em] text-ember backdrop-blur-sm">Habis</span>
                        @endif
                    </div>
                    <div class="flex flex-1 flex-col p-5">
                        <div class="flex items-start justify-between gap-2">
                            <a href="/menu/{{ $item->id }}" class="font-display text-lg font-bold tracking-tight text-bone transition-colors hover:text-ember">{{ $item->name }}</a>
                            <span class="whitespace-nowrap font-mono text-sm font-bold text-ember">Rp {{ number_format($item->price,0,',','.') }}</span>
                        </div>
                        <p class="mt-2 flex-1 text-sm leading-relaxed text-sand">{{ $item->description }}</p>
                        <button data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}" class="add-to-cart mt-5 w-full rounded-full border py-3 font-mono text-[12px] uppercase tracking-[0.14em] transition-all {{ $item->is_available ? 'border-ember/50 text-ember hover:bg-ember hover:text-ink' : 'cursor-not-allowed border-line text-dust' }}" {{ !$item->is_available ? 'disabled' : '' }}>
                            {{ $item->is_available ? 'Add to Cart' : 'Habis' }}
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why choose us -->
    <section class="py-20 md:py-28">
        <div class="mx-auto grid w-full max-w-[1400px] gap-12 px-4 md:px-8 lg:grid-cols-[1fr,1.4fr] lg:gap-20">
            <div class="reveal">
                <p class="eyebrow">Kenapa Mba Neni?</p>
                <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-bone md:text-4xl">A kitchen that never sleeps.</h2>
                <p class="mt-4 text-sand">Semua yang kami siapkan dimulai dari resep keluarga dan bahan segar harian, dari dapur yang buka terus.</p>
            </div>
            <div class="reveal grid gap-x-10 sm:grid-cols-2">
                <div class="border-t border-line py-8">
                    <div class="font-mono text-xs tracking-[0.2em] text-ember">01</div>
                    <h4 class="mt-3 font-display text-xl font-bold text-bone">Authentic Recipes</h4>
                    <p class="mt-2 text-sm leading-relaxed text-sand">Passed down through generations of Javanese mastery.</p>
                </div>
                <div class="border-t border-line py-8">
                    <div class="font-mono text-xs tracking-[0.2em] text-ember">02</div>
                    <h4 class="mt-3 font-display text-xl font-bold text-bone">Open 24 Hours</h4>
                    <p class="mt-2 text-sm leading-relaxed text-sand">Whenever you're hungry, we're ready to serve you.</p>
                </div>
                <div class="border-t border-line py-8">
                    <div class="font-mono text-xs tracking-[0.2em] text-ember">03</div>
                    <h4 class="mt-3 font-display text-xl font-bold text-bone">Affordable</h4>
                    <p class="mt-2 text-sm leading-relaxed text-sand">Premium quality dining at local warung prices.</p>
                </div>
                <div class="border-t border-line py-8">
                    <div class="font-mono text-xs tracking-[0.2em] text-ember">04</div>
                    <h4 class="mt-3 font-display text-xl font-bold text-bone">Family Friendly</h4>
                    <p class="mt-2 text-sm leading-relaxed text-sand">Spacious and welcoming for all your loved ones.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Reviews -->
    <section id="reviews" class="bg-coal py-20 md:py-28">
        <div class="mx-auto w-full max-w-[1400px] px-4 md:px-8">
            <div class="reveal max-w-2xl">
                <div class="flex items-center gap-1 text-ember">
                    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">star_half</span>
                </div>
                <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-bone md:text-4xl">4.6 Rating from 2,436+ Guests</h2>
                <p class="mt-4 text-sand">Real experiences from our valued customers who appreciate the authentic taste of Banyumas.</p>
            </div>

            <div class="stagger-grid mt-12 grid grid-cols-1 gap-5 md:grid-cols-3">
                <div class="stagger-item panel flex flex-col p-7">
                    <span class="material-symbols-outlined text-ember" style="font-size:32px;font-variation-settings:'FILL' 1">format_quote</span>
                    <p class="mt-4 flex-1 font-display text-lg font-semibold leading-snug text-bone">&ldquo;The best Nasi Campur in Purwokerto. It tastes just like my grandmother's cooking. The service is fast even at 2 AM!&rdquo;</p>
                    <div class="mt-6 flex items-center gap-3 border-t border-line pt-5">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-ember/15 font-mono text-xs font-bold text-ember">BS</span>
                        <div>
                            <div class="text-sm font-semibold text-bone">Budi Santoso</div>
                            <div class="font-mono text-[10px] uppercase tracking-[0.16em] text-dust">Local Guide</div>
                        </div>
                    </div>
                </div>
                <div class="stagger-item panel flex flex-col p-7">
                    <span class="material-symbols-outlined text-ember" style="font-size:32px;font-variation-settings:'FILL' 1">format_quote</span>
                    <p class="mt-4 flex-1 font-display text-lg font-semibold leading-snug text-bone">&ldquo;Incredible value for money. The Ayam Bakar is perfectly seasoned and the sambal has the right amount of kick. Highly recommended!&rdquo;</p>
                    <div class="mt-6 flex items-center gap-3 border-t border-line pt-5">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-ember/15 font-mono text-xs font-bold text-ember">SA</span>
                        <div>
                            <div class="text-sm font-semibold text-bone">Siti Aminah</div>
                            <div class="font-mono text-[10px] uppercase tracking-[0.16em] text-dust">Food Enthusiast</div>
                        </div>
                    </div>
                </div>
                <div class="stagger-item panel flex flex-col p-7">
                    <span class="material-symbols-outlined text-ember" style="font-size:32px;font-variation-settings:'FILL' 1">format_quote</span>
                    <p class="mt-4 flex-1 font-display text-lg font-semibold leading-snug text-bone">&ldquo;Always my go-to place after a long shift. Clean, professional, and consistently delicious. Best Javanese restaurant in town.&rdquo;</p>
                    <div class="mt-6 flex items-center gap-3 border-t border-line pt-5">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-ember/15 font-mono text-xs font-bold text-ember">AP</span>
                        <div>
                            <div class="text-sm font-semibold text-bone">Andi Pratama</div>
                            <div class="font-mono text-[10px] uppercase tracking-[0.16em] text-dust">Night Worker</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dining & delivery -->
    <section class="px-4 py-20 md:px-8 md:py-28">
        <div class="relative mx-auto w-full max-w-[1400px] overflow-hidden rounded-3xl border border-line bg-coal-2 px-6 py-14 md:px-14 md:py-16">
            <div class="pointer-events-none absolute -right-24 -top-24 h-80 w-80 rounded-full bg-ember/10 blur-3xl"></div>
            <div class="relative z-10 grid items-center gap-10 lg:grid-cols-[1.1fr,1fr]">
                <div class="reveal">
                    <p class="eyebrow">Layanan</p>
                    <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-bone md:text-4xl">Dine-In, Takeaway, or Delivered</h2>
                    <p class="mt-4 max-w-md text-sand">Enjoy Mba Neni's cooking anywhere. We offer contactless delivery, quick takeaway, and a cozy dine-in experience in Purwokerto.</p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="tel:+622811234567" class="btn-ember">
                            <span class="material-symbols-outlined" style="font-size:18px">call</span> Call Us
                        </a>
                        <a href="/booking" class="btn-ghost">Book a Table</a>
                    </div>
                </div>
                <div class="stagger-grid grid grid-cols-3 gap-3">
                    <div class="stagger-item panel flex flex-col items-center gap-3 p-6">
                        <span class="material-symbols-outlined text-ember" style="font-size:32px;font-variation-settings:'FILL' 1">restaurant</span>
                        <span class="font-mono text-[11px] uppercase tracking-[0.14em] text-bone">Dine-In</span>
                    </div>
                    <div class="stagger-item panel flex flex-col items-center gap-3 p-6">
                        <span class="material-symbols-outlined text-ember" style="font-size:32px;font-variation-settings:'FILL' 1">shopping_bag</span>
                        <span class="font-mono text-[11px] uppercase tracking-[0.14em] text-bone">Takeaway</span>
                    </div>
                    <div class="stagger-item panel flex flex-col items-center gap-3 p-6">
                        <span class="material-symbols-outlined text-ember" style="font-size:32px;font-variation-settings:'FILL' 1">delivery_dining</span>
                        <span class="font-mono text-[11px] uppercase tracking-[0.14em] text-bone">Delivery</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Gallery -->
    <section id="gallery" class="py-20 md:py-28">
        <div class="mx-auto w-full max-w-[1400px] px-4 md:px-8">
            <div class="mx-auto max-w-2xl text-center reveal">
                <p class="eyebrow">Galeri</p>
                <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-bone md:text-4xl">Gallery &amp; Atmosphere</h2>
            </div>
                        <div class="mt-12 grid grid-cols-1 gap-5 sm:grid-cols-3 reveal">
                <figure class="group overflow-hidden rounded-2xl border border-line bg-coal">
                    <img alt="Suasana Warung Makan Mba Neni" loading="lazy" class="aspect-[3/4] w-full object-cover object-center transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/gps-cs-s/AHRPTWnJa3jDCtSgWwf307Ia9-N0KEvmcMEr29XSt9nWljWNsjAeI8gsDgbd_VDxTd4eAVvQpOCwuxTEaPj1HwkfeHnea9rJfJOzHfl4IS8VrfMSLv63BWRnvXZ8_h-C7vo5_ItCOzfOF1h59KAv=s680-w680-h510"/>                </figure>
                <figure class="group overflow-hidden rounded-2xl border border-line bg-coal">
                    <img alt="Atmosfer ruang makan" loading="lazy" class="aspect-[3/4] w-full object-cover object-center transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/gps-cs-s/AHRPTWlfYQtRY-fYOv6Wl7ZaDcVmgJ6v6VUBMBdpHv-kfs3EVG7guBMkk103hhfC2KAmauyiRE7rgYJvgjzSOssR9AAFFF136ij_QC1rzYkqbrHcuTFW8aHgbjdjkKB_0O31SVUWQNE=s680-w680-h510"/>                </figure>
                <figure class="group overflow-hidden rounded-2xl border border-line bg-coal">
                    <img alt="Detail penyajian masakan" loading="lazy" class="aspect-[3/4] w-full object-cover object-center transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/gps-cs-s/AHRPTWntuDXHh-6vPmrgqGHI7_HKafBVj7iArehhKHI5Sl4qGDSNoiSP-qrkMtAiJqkJ1vsuytEMV5Re0V7m5xqybEStKUwP_t7PwYVdH1cuQMemfAcDyUEvbQRcVPu1v6OX1FJbS46S=s680-w680-h510"/>                </figure>
            </div>
        </div>
    </section>

    <!-- Location -->
    <section id="location" class="bg-coal py-20 md:py-28">
        <div class="mx-auto grid w-full max-w-[1400px] items-center gap-12 px-4 md:px-8 lg:grid-cols-2 lg:gap-16">
            <div class="reveal-left">
                <p class="eyebrow">Kunjungi Kami</p>
                <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-bone md:text-4xl">Visit Us</h2>
                <div class="mt-8 space-y-6">
                    <div class="flex items-start gap-4 border-t border-line pt-6">
                        <span class="material-symbols-outlined text-ember" style="font-size:24px">location_on</span>
                        <div>
                            <div class="text-sm font-semibold text-bone">Address</div>
                            <p class="mt-1 text-sm leading-relaxed text-sand">Pakembaran, Bancarkembar, Kec. Purwokerto Utara, Kabupaten Banyumas, Jawa Tengah 53121</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 border-t border-line pt-6">
                        <span class="material-symbols-outlined text-ember" style="font-size:24px">schedule</span>
                        <div>
                            <div class="text-sm font-semibold text-bone">Opening Hours</div>
                            <p class="mt-1 text-sm leading-relaxed text-sand">Open 24 Hours, 7 Days a Week</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 border-t border-line pt-6">
                        <span class="material-symbols-outlined text-ember" style="font-size:24px">info</span>
                        <div>
                            <div class="text-sm font-semibold text-bone">Landmarks</div>
                            <p class="mt-1 text-sm leading-relaxed text-sand">Near Unsoed Campus, South of Bancarkembar Traditional Market.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="https://www.google.com/maps/place/Warung+Makan+Mba+Neni/@-7.4088448,109.2386816,14z/data=!4m4!3m3!1s0x2e655fc39aaf7b49:0x41838457cd506e5e!8m2!3d-7.4084519!4d109.238324" target="_blank" rel="noopener noreferrer" class="btn-ghost">
                        <span class="material-symbols-outlined" style="font-size:18px">directions</span> Google Maps
                    </a>
                </div>
            </div>
            <div class="reveal-right overflow-hidden rounded-2xl border border-line bg-ink">
                <iframe class="aspect-video w-full grayscale-[0.35]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15822.436821488314!2d109.2386816!3d-7.4088448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655fc39aaf7b49%3A0x41838457cd506e5e!2sWarung%20Makan%20Mba%20Neni!5e0!3m2!1sid!2sid!4v1" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Peta Lokasi Warung Makan Mba Neni"></iframe>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="border-t border-line bg-coal-2">
    <div class="mx-auto grid w-full max-w-[1400px] gap-10 px-4 py-16 md:grid-cols-2 md:px-8 lg:grid-cols-[1.5fr,1fr,1fr]">
        <div>
            <a href="/warung-makan-mba-neni" class="flex items-center gap-2.5">
                <span class="flex h-9 w-9 items-center justify-center rounded-full border border-ember/40 bg-coal-3">
                    <span class="material-symbols-outlined text-ember" style="font-size:18px">restaurant</span>
                </span>
                <span class="font-display text-lg font-bold tracking-tight text-bone">Mba <span class="text-ember">Neni</span></span>
            </a>
            <p class="mt-5 max-w-sm text-sm leading-relaxed text-sand">
                Bringing the authentic warmth and flavors of Javanese kitchen to your table. Purwokerto's favorite 24-hour traditional dining spot.
            </p>
            <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '6285810405551') }}" target="_blank" rel="noopener noreferrer" class="chip mt-6 text-ember! hover:border-ember/50">
                <span class="material-symbols-outlined" style="font-size:14px">chat</span>
                WhatsApp Kami
            </a>
        </div>
        <div>
            <h6 class="font-mono text-[11px] uppercase tracking-[0.2em] text-dust">Quick Links</h6>
            <ul class="mt-5 space-y-3">
                <li><a class="text-sm text-sand transition-colors hover:text-ember" href="#menu">Menu</a></li>
                <li><a class="text-sm text-sand transition-colors hover:text-ember" href="#about">Tentang Kami</a></li>
                <li><a class="text-sm text-sand transition-colors hover:text-ember" href="#reviews">Ulasan</a></li>
                <li><a class="text-sm text-sand transition-colors hover:text-ember" href="#booking">Booking</a></li>
                <li><a class="text-sm text-sand transition-colors hover:text-ember" href="/order">Order</a></li>
            </ul>
        </div>
        <div>
            <h6 class="font-mono text-[11px] uppercase tracking-[0.2em] text-dust">Kontak</h6>
            <ul class="mt-5 space-y-3 text-sm text-sand">
                <li class="flex items-center gap-3"><span class="material-symbols-outlined text-ember" style="font-size:18px">call</span>+62 281 123 4567</li>
                <li class="flex items-center gap-3"><span class="material-symbols-outlined text-ember" style="font-size:18px">mail</span>info@mbaneni.com</li>
                <li class="flex items-center gap-3"><span class="material-symbols-outlined text-ember" style="font-size:18px">schedule</span>Open 24/7</li>
            </ul>
        </div>
    </div>
    <div class="border-t border-line">
        <div class="mx-auto flex w-full max-w-[1400px] flex-col items-center justify-between gap-3 px-4 py-6 md:flex-row md:px-8">
            <p class="font-mono text-[11px] uppercase tracking-[0.14em] text-dust">&copy; {{ date('Y') }} Warung Makan Mba Neni.</p>
            <p class="flex items-center gap-2 font-mono text-[11px] uppercase tracking-[0.14em] text-dust">
                Made in Purwokerto
                <span class="material-symbols-outlined text-ember" style="font-size:14px;font-variation-settings:'FILL' 1">favorite</span>
            </p>
        </div>
    </div>
</footer>

<!-- Cart drawer -->
<div id="cart-drawer" class="fixed bottom-4 right-4 z-50 hidden max-h-[80vh] w-[min(24rem,calc(100vw-2rem))] flex-col rounded-2xl border border-line bg-coal-2 p-5 shadow-2xl">
    <div class="flex items-center justify-between">
        <h3 class="font-display text-lg font-bold text-bone">Keranjang Anda</h3>
        <button id="cart-close" class="flex h-9 w-9 items-center justify-center rounded-full text-sand transition-colors hover:text-bone" aria-label="Tutup keranjang">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>
    <div class="mt-4 flex-1 overflow-y-auto">
        <ul id="cart-items" class="space-y-3"></ul>
    </div>
    <div class="flex-shrink-0 border-t border-line pt-4">
        <div class="flex items-center justify-between">
            <span class="font-mono text-[11px] uppercase tracking-[0.18em] text-sand">Total</span>
            <span id="cart-total" class="font-display text-xl font-bold text-ember">Rp 0</span>
        </div>
        <div class="mt-4 grid grid-cols-1 gap-2">
            <button id="cart-checkout" class="btn-ember w-full">Checkout</button>
            <a id="cart-whatsapp" href="#" data-whatsapp-phone="{{ env('WHATSAPP_NUMBER', '6285810405551') }}" class="btn-ghost w-full">
                <span class="material-symbols-outlined" style="font-size:18px">chat</span> WhatsApp
            </a>
        </div>
    </div>
</div>

<!-- Checkout modal -->
<div id="checkout-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-ink/80 p-4">
    <div class="w-full max-w-lg rounded-2xl border border-line bg-coal-2 p-6 shadow-2xl md:p-8">
        <div class="flex items-center justify-between">
            <h3 class="font-display text-xl font-bold text-bone">Konfirmasi Checkout</h3>
            <button id="checkout-cancel" class="font-mono text-[11px] uppercase tracking-[0.16em] text-sand hover:text-bone">Tutup</button>
        </div>
        <div class="mt-6 space-y-4">
            <div>
                <label for="checkout-name" class="field-label">Nama Pelanggan</label>
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
                    <option value="delivery">Diantar (Delivery)</option>
                </select>
            </div>
            <div id="checkout-summary" class="max-h-[40vh] space-y-3 overflow-y-auto rounded-xl border border-line bg-coal p-4"></div>
        </div>
        <div class="mt-6 flex items-center justify-between border-t border-line pt-4">
            <span class="font-mono text-[11px] uppercase tracking-[0.18em] text-sand">Total Bayar</span>
            <span id="checkout-total" class="font-display text-xl font-bold text-ember">Rp 0</span>
        </div>
        <div class="mt-5 grid grid-cols-1 gap-3 sm:grid-cols-2">
            <button id="checkout-confirm" class="btn-ember w-full">Bayar</button>
            <button id="checkout-close" class="btn-ghost w-full">Tutup</button>
        </div>
    </div>
</div>

<!-- Order confirmation modal -->
<div id="order-confirmation-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-ink/80 p-4">
    <div class="w-full max-w-lg rounded-2xl border border-line bg-coal-2 p-6 shadow-2xl md:p-8">
        <div class="flex items-center justify-between">
            <h3 class="font-display text-xl font-bold text-bone">Pembayaran Berhasil</h3>
            <button id="order-confirmation-close" class="flex h-9 w-9 items-center justify-center rounded-full text-sand hover:text-bone" aria-label="Tutup">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <div class="mt-5 flex justify-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-ember/40 bg-ember/10 px-5 py-2 font-mono text-xs font-bold uppercase tracking-[0.16em] text-ember">
                <span class="material-symbols-outlined" style="font-size:16px;font-variation-settings:'FILL' 1">check_circle</span>
                Lunas
            </span>
        </div>
        <div class="mt-6 grid grid-cols-2 gap-4">
            <div>
                <div class="text-xs text-sand">Nama Pelanggan</div>
                <div id="order-confirmation-customer" class="mt-1 text-sm font-semibold text-bone">-</div>
            </div>
            <div>
                <div class="text-xs text-sand">No. Telepon</div>
                <div id="order-confirmation-phone" class="mt-1 text-sm font-semibold text-bone">-</div>
            </div>
            <div>
                <div class="text-xs text-sand">Metode Layanan</div>
                <div id="order-confirmation-service" class="mt-1 text-sm font-semibold text-bone">-</div>
            </div>
            <div>
                <div class="text-xs text-sand">Order ID</div>
                <div id="order-confirmation-id" class="mt-1 font-display text-sm font-bold text-ember">#-</div>
            </div>
        </div>
        <div class="mt-5">
            <div class="text-center font-mono text-[10px] uppercase tracking-[0.2em] text-sand">Invoice</div>
            <div id="order-barcode-container" class="mt-3 hidden justify-center">
                <div class="flex flex-col items-center gap-2 rounded-2xl border border-line bg-coal p-5">
                    <img id="order-barcode-img" src="" alt="Barcode" class="h-24 w-auto">
                    <div id="order-ref-code" class="font-mono text-xs tracking-[0.2em] text-sand">-</div>
                </div>
            </div>
        </div>
        <div id="order-confirmation-items" class="mt-5 max-h-[35vh] space-y-3 overflow-y-auto rounded-xl border border-line bg-coal p-4"></div>
        <div class="mt-5 flex items-center justify-between border-t border-line pt-4">
            <span class="font-mono text-[11px] uppercase tracking-[0.18em] text-sand">Total</span>
            <span id="order-confirmation-total" class="font-display text-xl font-bold text-ember">Rp 0</span>
        </div>
        <div class="mt-5 grid grid-cols-1 gap-3 sm:grid-cols-2">
            <button id="order-confirmation-copy" class="btn-ember w-full">
                <span class="material-symbols-outlined" style="font-size:18px">print</span> Cetak Struk
            </button>
            <button id="order-confirmation-close-2" class="btn-ghost w-full">Tutup</button>
        </div>
    </div>
</div>

<!-- Remove confirm modal -->
<div id="remove-confirm-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-ink/80 p-4">
    <div class="w-full max-w-sm rounded-2xl border border-line bg-coal-2 p-6 shadow-2xl">
        <h3 class="font-display text-xl font-bold text-bone">Hapus item?</h3>
        <p class="mt-2 text-sm text-sand">Apakah Anda yakin ingin menghapus produk ini dari keranjang?</p>
        <div class="mt-6 flex gap-3">
            <button id="confirm-remove" class="btn-ember flex-1 px-4!">Ya, Hapus</button>
            <button id="cancel-remove" class="btn-ghost flex-1">Batal</button>
        </div>
    </div>
</div>

<!-- Toast -->
<div id="site-toast" class="fixed inset-x-0 bottom-6 z-[70] hidden justify-center px-4">
    <div class="mx-auto flex w-max max-w-full items-center gap-3 rounded-full border border-line bg-coal-3/95 py-2.5 pl-5 pr-2.5 shadow-xl backdrop-blur">
        <p id="site-toast-text" class="text-sm text-bone"></p>
        <button id="site-toast-action" class="hidden rounded-full bg-ember px-4 py-2 font-mono text-[11px] font-bold uppercase tracking-[0.12em] text-ink"></button>
        <button id="site-toast-close" class="text-sand transition-colors hover:text-bone" aria-label="Tutup">
            <span class="material-symbols-outlined" style="font-size:18px">close</span>
        </button>
    </div>
</div>

</body>
</html>
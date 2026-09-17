<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Makanan | Warung Makan Mba Neni</title>
    <meta name="description" content="Pesan soto, ayam bakar, dan menu andalan Warung Makan Mba Neni untuk dine-in, takeaway, atau delivery di Purwokerto.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    @vite(['resources/css/order.css', 'resources/js/order.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="whatsapp-number" content="{{ env('WHATSAPP_NUMBER', '6285810405551') }}">
</head>
<body class="selection:bg-ember selection:text-white bg-[#FAF7F2] text-bone font-sans antialiased">
<header id="site-header" class="fixed inset-x-0 top-0 z-50 border-b border-line/70 bg-[#FAF7F2]/90 backdrop-blur-md transition-all duration-300">
    <nav class="mx-auto flex h-18 w-full max-w-[1400px] items-center justify-between px-4 md:px-8">
        <a href="/warung-makan-mba-neni" class="flex items-center gap-3">
            <span class="flex h-10 w-10 items-center justify-center rounded-full bg-ember/10 text-ember border border-ember/20 shadow-2xs">
                <span class="material-symbols-outlined" style="font-size:20px">restaurant</span>
            </span>
            <span class="font-display text-xl font-bold tracking-tight text-bone">Mba <span class="text-ember">Neni</span></span>
        </a>
        <div class="flex items-center gap-4">
            <a href="/booking" class="hidden font-mono text-[12px] uppercase tracking-[0.16em] text-sand font-semibold transition-colors hover:text-ember md:inline">Booking</a>
            <div class="relative">
                <button id="cart-toggle" class="relative inline-flex h-10 w-10 items-center justify-center rounded-full border border-line bg-white text-bone shadow-2xs transition-all hover:border-ember/60 hover:text-ember cursor-pointer" aria-label="Buka keranjang">
                    <span id="cart-message" class="absolute right-0 top-12 z-50 hidden whitespace-nowrap rounded-full border border-line bg-white px-4 py-2 text-xs text-bone shadow-xl"></span>
                    <span class="material-symbols-outlined text-[20px]">shopping_bag</span>
                    <span id="cart-count" class="absolute -right-1 -top-1 inline-flex h-5 min-w-[1.25rem] items-center justify-center rounded-full bg-ember px-1 font-mono text-[10px] font-bold text-white shadow-xs">0</span>
                </button>
            </div>
            <button id="order-now-btn" class="btn-ember py-2.5! px-5! text-xs uppercase tracking-wider cursor-pointer">
                <span class="material-symbols-outlined" style="font-size:18px">shopping_cart</span>
                Pesan
            </button>
        </div>
    </nav>
</header>

<main class="pt-18">
    <!-- Page header -->
    <section class="relative overflow-hidden border-b border-line bg-white shadow-xs">
        <div class="pointer-events-none absolute -left-28 -top-28 h-72 w-72 rounded-full bg-ember/10 blur-3xl"></div>
        <div class="mx-auto w-full max-w-[1400px] px-4 py-12 md:px-8 md:py-16">
            <span class="inline-flex items-center gap-1.5 rounded-full bg-ember/10 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-ember">
                <span class="material-symbols-outlined text-sm">restaurant_menu</span> Pesan Online
            </span>
            <h1 class="mt-3 font-display text-4xl font-extrabold tracking-tight text-bone md:text-5xl">Pesan Makanan</h1>
            <p class="mt-3 max-w-xl text-sand text-base">Pilih menu andalan favorit Anda dan nikmati sajian hangat untuk santap di tempat (dine-in), bawa pulang (takeaway), maupun pesan antar.</p>
        </div>
    </section>

    <!-- Menu -->
    <section class="py-12 md:py-16 bg-[#FAF7F2]">
        <div class="mx-auto w-full max-w-[1400px] px-4 md:px-8">
            <div class="mb-6 flex items-end justify-between gap-4">
                <div>
                    <h2 class="font-display text-2xl font-extrabold tracking-tight text-bone">Daftar Menu</h2>
                    <p class="mt-1 text-sm text-sand">Pilih kategori dan klik "Tambah" untuk memasukkan hidangan ke keranjang Anda.</p>
                </div>
            </div>

            @php
                $categories = \App\Models\Category::orderBy('name')->get();
                $menuItems = \App\Models\MenuItem::with('category')->orderBy('name')->get();
            @endphp

            <div id="category-tabs" class="flex flex-wrap gap-2.5">
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

    <!-- Location -->
    <section class="border-t border-line bg-white py-14 md:py-20">
        <div class="mx-auto grid w-full max-w-[1400px] items-center gap-10 px-4 md:px-8 lg:grid-cols-2 lg:gap-16">
            <div>
                <span class="inline-flex items-center gap-1.5 rounded-full bg-ember/10 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-ember">
                    <span class="material-symbols-outlined text-sm">pin_drop</span> Lokasi
                </span>
                <h2 class="mt-3 font-display text-3xl font-extrabold tracking-tight text-bone">Kunjungi Kami</h2>
                <div class="mt-8 space-y-4">
                    <div class="flex items-start gap-4 rounded-2xl p-4 bg-[#FAF7F2] border border-line/70">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-ember/10 text-ember">
                            <span class="material-symbols-outlined text-xl">location_on</span>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-bone">Alamat</div>
                            <p class="mt-1 text-sm text-sand">Pakembaran, Bancarkembar, Kec. Purwokerto Utara, Kabupaten Banyumas, Jawa Tengah 53121</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 rounded-2xl p-4 bg-[#FAF7F2] border border-line/70">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-herb-soft text-herb">
                            <span class="material-symbols-outlined text-xl">schedule</span>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-bone">Jam Buka</div>
                            <p class="mt-1 text-sm text-sand">Buka 24 Jam Nonstop, 7 Hari Seminggu</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="https://www.google.com/maps/place/Warung+Makan+Mba+Neni/@-7.4088448,109.2386816,14z/data=!4m6!3m5!1s0x2e655fc39aaf7b49:0x41838457cd506e5e!8m2!3d-7.4084519!4d109.238324!16s%2Fg%2F11c6f6fyc_" target="_blank" rel="noopener noreferrer" class="btn-ember">
                        <span class="material-symbols-outlined" style="font-size:18px">directions</span> Buka di Google Maps
                    </a>
                </div>
            </div>
            <div class="overflow-hidden rounded-3xl border border-line bg-white shadow-lg">
                <iframe class="aspect-video w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15822.436821488314!2d109.2386816!3d-7.4088448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655fc39aaf7b49%3A0x41838457cd506e5e!2sWarung%20Makan%20Mba%20Neni!5e0!3m2!1sid!2sid!4v1" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Peta Lokasi Warung Makan Mba Neni"></iframe>
            </div>
        </div>
    </section>
</main>

<footer class="border-t border-[#382319] bg-[#221610] text-stone-300 py-8">
    <div class="mx-auto flex w-full max-w-[1400px] flex-col items-center justify-between gap-4 px-4 md:flex-row md:px-8">
        <p class="font-mono text-[11px] uppercase tracking-[0.14em] text-stone-400">&copy; {{ date('Y') }} Warung Makan Mba Neni.</p>
        <a href="/warung-makan-mba-neni" class="font-mono text-[11px] uppercase tracking-[0.14em] text-amber-400 font-semibold transition-colors hover:text-white">← Kembali ke Beranda</a>
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
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Makanan | Warung Makan Mba Neni</title>
    <meta name="description" content="Pesan soto, ayam bakar, dan menu andalan Warung Makan Mba Neni untuk dine-in, takeaway, atau delivery di Purwokerto.">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manrope:500,600,700|outfit:600,700,800|jetbrains-mono:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    @vite(['resources/css/order.css', 'resources/js/order.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="whatsapp-number" content="{{ env('WHATSAPP_NUMBER', '6285810405551') }}">
</head>
<body class="selection:bg-ember selection:text-ink">
<header id="site-header" class="fixed inset-x-0 top-0 z-50 border-b border-line/60 bg-ink/80 backdrop-blur-md">
    <nav class="mx-auto flex h-16 w-full max-w-[1400px] items-center justify-between px-4 md:px-8">
        <a href="/warung-makan-mba-neni" class="flex items-center gap-2.5">
            <span class="flex h-9 w-9 items-center justify-center rounded-full border border-ember/40 bg-coal-3">
                <span class="material-symbols-outlined text-ember" style="font-size:19px">restaurant</span>
            </span>
            <span class="font-display text-lg font-bold tracking-tight text-bone">Mba <span class="text-ember">Neni</span></span>
        </a>
        <div class="flex items-center gap-4">
            <a href="/booking" class="hidden font-mono text-[12px] uppercase tracking-[0.16em] text-sand transition-colors hover:text-bone md:inline">Booking</a>
            <div class="relative">
                <button id="cart-toggle" class="relative inline-flex h-10 w-10 items-center justify-center rounded-full border border-line bg-coal-3 text-bone transition-colors hover:border-ember/40 hover:text-ember" aria-label="Buka keranjang">
        <span id="cart-message" class="absolute right-0 top-12 z-50 hidden whitespace-nowrap rounded-full border border-line bg-coal-2 px-4 py-2 text-xs text-bone shadow-xl"></span>
                    <span class="material-symbols-outlined">shopping_cart</span>
                    <span id="cart-count" class="absolute -right-1 -top-1 inline-flex h-5 min-w-[1.25rem] items-center justify-center rounded-full bg-ember px-1 font-mono text-[10px] font-bold text-ink">0</span>
                </button>
            </div>
            <button id="order-now-btn" class="btn-ember px-5! py-2.5!">
                <span class="material-symbols-outlined" style="font-size:18px">shopping_cart</span>
                Pesan
            </button>
        </div>
    </nav>
</header>

<main class="pt-16">
    <!-- Page header -->
    <section class="relative overflow-hidden border-b border-line bg-coal">
        <div class="pointer-events-none absolute -left-28 -top-28 h-72 w-72 rounded-full bg-ember/10 blur-3xl"></div>
        <div class="mx-auto w-full max-w-[1400px] px-4 py-14 md:px-8 md:py-20">
            <p class="eyebrow">Order</p>
            <h1 class="mt-4 font-display text-4xl font-extrabold tracking-tight text-bone md:text-5xl">Pesan Makanan</h1>
            <p class="mt-4 max-w-xl text-sand">Pilih menu favorit Anda dan pesan sekarang untuk dine-in, takeaway, atau delivery.</p>
        </div>
    </section>

    <!-- Menu -->
    <section class="py-12 md:py-16">
        <div class="mx-auto w-full max-w-[1400px] px-4 md:px-8">
            <div class="mb-6 flex items-end justify-between gap-4">
                <div>
                    <h2 class="font-display text-2xl font-extrabold tracking-tight text-bone">Menu Kami</h2>
                    <p class="mt-1 text-sm text-sand">Klik "Add to Cart" untuk menambahkan item ke pesanan Anda.</p>
                </div>
            </div>

            @php
                $categories = \App\Models\Category::orderBy('name')->get();
                $menuItems = \App\Models\MenuItem::with('category')->orderBy('name')->get();
            @endphp

            <div id="category-tabs" class="flex flex-wrap gap-2.5">
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

    <!-- Location -->
    <section class="border-t border-line bg-coal py-14 md:py-20">
        <div class="mx-auto grid w-full max-w-[1400px] items-center gap-10 px-4 md:px-8 lg:grid-cols-2 lg:gap-16">
            <div>
                <p class="eyebrow">Lokasi</p>
                <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-bone">Lokasi Kami</h2>
                <div class="mt-8 space-y-5">
                    <div class="flex items-start gap-4 border-t border-line pt-5">
                        <span class="material-symbols-outlined text-ember">location_on</span>
                        <div>
                            <div class="text-sm font-semibold text-bone">Address</div>
                            <p class="mt-1 text-sm text-sand">Pakembaran, Bancarkembar, Kec. Purwokerto Utara, Kabupaten Banyumas, Jawa Tengah 53121</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 border-t border-line pt-5">
                        <span class="material-symbols-outlined text-ember">schedule</span>
                        <div>
                            <div class="text-sm font-semibold text-bone">Opening Hours</div>
                            <p class="mt-1 text-sm text-sand">Open 24 Hours, 7 Days a Week</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="https://www.google.com/maps/place/Warung+Makan+Mba+Neni/@-7.4088448,109.2386816,14z/data=!4m6!3m5!1s0x2e655fc39aaf7b49:0x41838457cd506e5e!8m2!3d-7.4084519!4d109.238324!16s%2Fg%2F11c6f6fyc_" target="_blank" rel="noopener noreferrer" class="btn-ghost">
                        <span class="material-symbols-outlined" style="font-size:18px">directions</span> Google Maps
                    </a>
                </div>
            </div>
            <div class="overflow-hidden rounded-2xl border border-line bg-ink">
                <iframe class="aspect-video w-full grayscale-[0.35]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15822.436821488314!2d109.2386816!3d-7.4088448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655fc39aaf7b49%3A0x41838457cd506e5e!2sWarung%20Makan%20Mba%20Neni!5e0!3m2!1sid!2sid!4v1" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Peta Lokasi Warung Makan Mba Neni"></iframe>
            </div>
        </div>
    </section>
</main>

<footer class="border-t border-line py-8">
    <div class="mx-auto flex w-full max-w-[1400px] flex-col items-center justify-between gap-3 px-4 md:flex-row md:px-8">
        <p class="font-mono text-[11px] uppercase tracking-[0.14em] text-dust">&copy; {{ date('Y') }} Warung Makan Mba Neni.</p>
        <a href="/warung-makan-mba-neni" class="font-mono text-[11px] uppercase tracking-[0.14em] text-sand transition-colors hover:text-ember">Kembali ke Beranda →</a>
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
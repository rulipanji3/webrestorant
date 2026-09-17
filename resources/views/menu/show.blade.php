<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $menuItem->name }} | Warung Makan Mba Neni</title>
    <meta name="description" content="{{ $menuItem->description }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:600,700,800|plus-jakarta-sans:400,500,600,700|jetbrains-mono:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', system-ui, sans-serif; background: #FAF7F2; color: #231913; min-height: 100vh; display: flex; flex-direction: column; -webkit-font-smoothing: antialiased; }
        header { position: fixed; top: 0; left: 0; right: 0; z-index: 50; background: rgba(250, 247, 242, 0.92); backdrop-filter: blur(12px); border-bottom: 1px solid #E8DED1; }
        nav { display: flex; justify-content: space-between; align-items: center; max-width: 1280px; margin: 0 auto; height: 64px; padding: 0 16px; }
        .logo { display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .logo .mark { width: 36px; height: 36px; border-radius: 50%; background: #C84A22; display: grid; place-items: center; color: #FFFFFF; }
        .logo .name { font-family: 'Playfair Display', serif; font-size: 19px; font-weight: 700; color: #231913; letter-spacing: -0.01em; }
        .logo .name b { color: #C84A22; }
        nav .links { display: flex; align-items: center; gap: 20px; }
        nav a.lnk { font-family: 'JetBrains Mono', monospace; font-size: 12px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.14em; color: #63554A; text-decoration: none; transition: color 0.2s; }
        nav a.lnk:hover { color: #C84A22; }
        nav a.order { background: #C84A22; color: #FFFFFF; border-radius: 999px; padding: 10px 20px; font-family: 'JetBrains Mono', monospace; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.14em; text-decoration: none; box-shadow: 0 8px 20px -6px rgba(200, 74, 34, 0.4); transition: background 0.2s, transform 0.15s; }
        nav a.order:hover { background: #A33A18; transform: translateY(-1px); }
        main { flex: 1; margin-top: 64px; }
        .container { max-width: 880px; margin: 0 auto; padding: 40px 16px 64px; }
        .back-link { display: inline-flex; align-items: center; gap: 8px; color: #63554A; text-decoration: none; font-family: 'JetBrains Mono', monospace; font-size: 12px; text-transform: uppercase; letter-spacing: 0.14em; margin-bottom: 28px; transition: color 0.2s; }
        .back-link:hover { color: #C84A22; }
        .detail { background: #FFFFFF; border: 1px solid #E8DED1; border-radius: 20px; overflow: hidden; box-shadow: 0 12px 36px -12px rgba(35, 25, 19, 0.08); }
        .detail img { width: 100%; height: 380px; object-fit: cover; display: block; }
        .thumb { height: 380px; background: #F3ECE2; display: flex; align-items: center; justify-content: center; color: #9A897B; }
        .body { padding: 32px; }
        .header { display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; flex-wrap: wrap; margin-bottom: 16px; }
        .name { font-family: 'Playfair Display', serif; font-size: 32px; font-weight: 700; letter-spacing: -0.02em; color: #231913; }
        .price { font-family: 'JetBrains Mono', monospace; font-size: 22px; font-weight: 700; color: #C84A22; white-space: nowrap; }
        .tags { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 20px; }
        .tag { display: inline-block; padding: 6px 14px; border-radius: 999px; font-family: 'JetBrains Mono', monospace; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; }
        .tag.available { background: rgba(36, 122, 56, 0.09); color: #247A38; border: 1px solid rgba(36, 122, 56, 0.25); }
        .tag.unavailable { background: #FDE8E8; color: #9B1C1C; border: 1px solid #FBD5D5; }
        .tag.category { background: #F7F3EB; color: #63554A; border: 1px solid #E8DED1; }
        .desc { font-size: 15px; line-height: 1.75; color: #63554A; margin-bottom: 28px; }
        .actions { display: flex; gap: 12px; flex-wrap: wrap; }
        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 26px; border-radius: 999px; font-family: 'JetBrains Mono', monospace; font-weight: 700; font-size: 12px; text-transform: uppercase; letter-spacing: 0.14em; text-decoration: none; border: none; cursor: pointer; transition: all 0.2s; }
        .btn .mat { font-size: 18px; }
        .btn-primary { background: #C84A22; color: #FFFFFF; box-shadow: 0 10px 24px -8px rgba(200, 74, 34, 0.4); }
        .btn-primary:hover { background: #A33A18; transform: translateY(-1px); }
        .btn-primary:active { transform: scale(0.98); }
        .btn-outline { background: #FFFFFF; border: 1px solid #E8DED1; color: #231913; }
        .btn-outline:hover { background: #F7F3EB; border-color: #D6C7B4; }
        .btn-disabled { background: #E8DED1; color: #9A897B; cursor: not-allowed; }
        .foot { border-top: 1px solid #E8DED1; color: #63554A; padding: 24px 16px; text-align: center; font-family: 'JetBrains Mono', monospace; font-size: 11px; text-transform: uppercase; letter-spacing: 0.14em; background: #FAF7F2; }
        #site-toast { position: fixed; bottom: 24px; left: 50%; transform: translateX(-50%); z-index: 70; width: calc(100vw - 32px); max-width: 520px; display: none; }
        #site-toast .box { border-radius: 999px; background: #221610; padding: 12px 16px 12px 22px; box-shadow: 0 16px 36px rgba(34, 22, 16, 0.25); display: flex; align-items: center; gap: 12px; border: 1px solid rgba(255,255,255,0.1); }
        #site-toast-text { flex: 1; color: #FAF7F2; font-size: 13px; font-weight: 500; }
        #site-toast-close { background: none; border: none; cursor: pointer; color: #D6C7B4; }
        #site-toast-close span { font-size: 18px; }
        @media (max-width: 640px) {
            .detail .header { flex-direction: column; }
            .detail .name { font-size: 24px; }
            .detail img, .detail .no-img { height: 240px; }
            .detail .body { padding: 20px; }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="/warung-makan-mba-neni" class="logo">
                <span class="mark"><span class="material-symbols-outlined" style="font-size:19px">restaurant</span></span>
                <span class="name">Mba <b>Neni</b></span>
            </a>
            <div class="links">
                <a href="/order" class="lnk">Order</a>
                <a href="/booking" class="lnk">Booking</a>
                <a href="/order" class="order">Pesan</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <a href="/order" class="back-link">
                <span class="material-symbols-outlined" style="font-size:16px">arrow_back</span>
                Kembali ke Menu
            </a>

            <div class="detail">
                @php $img = $menuItem->imageSrc(); @endphp
                @if($img)
                    <img src="{{ $img }}" alt="{{ $menuItem->name }}">
                @else
                    <div class="detail no-img" style="height:360px;background:#262019;display:flex;align-items:center;justify-content:center;color:#6F675C">
                        <span class="material-symbols-outlined" style="font-size:64px">restaurant</span>
                    </div>
                @endif

                <div class="body">
                    <div class="header">
                        <h1 class="name">{{ $menuItem->name }}</h1>
                        <div class="price">Rp {{ number_format($menuItem->price,0,',','.') }}</div>
                    </div>

                    <div class="tags">
                        <span class="tag {{ $menuItem->is_available ? 'available' : 'unavailable' }}">
                            {{ $menuItem->is_available ? 'Tersedia' : 'Habis' }}
                        </span>
                        @if($menuItem->category)
                            <span class="tag category">{{ $menuItem->category->name }}</span>
                        @endif
                    </div>

                    <div class="desc">{{ $menuItem->description }}</div>

                    <div class="actions">
                        @if($menuItem->is_available)
                            <button class="btn btn-primary add-to-cart"
                                data-id="{{ $menuItem->id }}"
                                data-name="{{ $menuItem->name }}"
                                data-price="{{ $menuItem->price }}">
                                <span class="material-symbols-outlined mat">shopping_cart</span>
                                Add to Cart
                            </button>
                        @else
                            <button class="btn btn-disabled" disabled>
                                <span class="material-symbols-outlined mat">block</span>
                                Habis
                            </button>
                        @endif
                        <a href="/order" class="btn btn-outline">
                            <span class="material-symbols-outlined mat">menu_book</span>
                            Lihat Semua Menu
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="foot">
        &copy; {{ date('Y') }} Warung Makan Mba Neni.
    </footer>

    <div id="site-toast">
        <div class="box">
            <div id="site-toast-text"></div>
            <button id="site-toast-close">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
    </div>

    <script>
        const cartKey = 'warung_makan_cart';

        function loadCart() {
            try { const s = localStorage.getItem(cartKey); return s ? JSON.parse(s) : []; } catch { return []; }
        }

        function saveCart(cart) {
            try { localStorage.setItem(cartKey, JSON.stringify(cart)); } catch {}
        }

        const siteToast = document.getElementById('site-toast');
        const siteToastText = document.getElementById('site-toast-text');
        document.getElementById('site-toast-close').addEventListener('click', () => {
            siteToast.style.display = 'none';
        });

        function showToast(text, timeout = 3000) {
            siteToastText.textContent = text;
            siteToast.style.display = 'block';
            clearTimeout(showToast._t);
            showToast._t = setTimeout(() => { siteToast.style.display = 'none'; }, timeout);
        }

        document.querySelectorAll('.add-to-cart').forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.dataset.id;
                const name = this.dataset.name;
                const price = Number(this.dataset.price);
                if (!id || !name || !price) return;

                let cart = loadCart();
                const existing = cart.find(i => i.id === id);
                if (existing) {
                    existing.quantity += 1;
                } else {
                    cart.push({ id, name, price, quantity: 1 });
                }
                saveCart(cart);
                showToast('"' + name + '" ditambahkan ke keranjang.', 3000);
            });
        });
    </script>
</body>
</html>
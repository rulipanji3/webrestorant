<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $menuItem->name }} | Warung Makan Mba Neni</title>
    <meta name="description" content="{{ $menuItem->description }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manrope:500,600,700|outfit:600,700,800|jetbrains-mono:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Manrope', system-ui, sans-serif; background: #0F0D0B; color: #F2EBE1; min-height: 100vh; display: flex; flex-direction: column; }
        header { position: fixed; top: 0; left: 0; right: 0; z-index: 50; background: rgba(15, 13, 11, 0.82); backdrop-filter: blur(12px); border-bottom: 1px solid #2C2620; }
        nav { display: flex; justify-content: space-between; align-items: center; max-width: 1280px; margin: 0 auto; height: 64px; padding: 0 16px; }
        .logo { display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .logo .mark { width: 36px; height: 36px; border-radius: 50%; border: 1px solid rgba(240, 90, 19, 0.4); background: #262019; display: grid; place-items: center; color: #F05A13; }
        .logo .name { font-family: 'Outfit', sans-serif; font-size: 18px; font-weight: 700; color: #F2EBE1; letter-spacing: -0.01em; }
        .logo .name b { color: #F05A13; }
        nav .links { display: flex; align-items: center; gap: 20px; }
        nav a.lnk { font-family: 'JetBrains Mono', monospace; font-size: 12px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.16em; color: #B3A796; text-decoration: none; transition: color 0.2s; }
        nav a.lnk:hover { color: #F2EBE1; }
        nav a.order { background: #F05A13; color: #0F0D0B; border-radius: 999px; padding: 10px 20px; font-family: 'JetBrains Mono', monospace; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.14em; text-decoration: none; box-shadow: 0 10px 28px -10px rgba(240, 90, 19, 0.6); transition: background 0.2s; }
        nav a.order:hover { background: #D9540F; }
        main { flex: 1; margin-top: 64px; }
        .container { max-width: 880px; margin: 0 auto; padding: 40px 16px 64px; }
        .back-link { display: inline-flex; align-items: center; gap: 8px; color: #6F675C; text-decoration: none; font-family: 'JetBrains Mono', monospace; font-size: 12px; text-transform: uppercase; letter-spacing: 0.14em; margin-bottom: 28px; transition: color 0.2s; }
        .back-link:hover { color: #F05A13; }
        .detail { background: #1D1815; border: 1px solid #2C2620; border-radius: 16px; overflow: hidden; }
        .detail img { width: 100%; height: 360px; object-fit: cover; display: block; }
        .thumb { height: 360px; background: #262019; display: flex; align-items: center; justify-content: center; color: #6F675C; }
        .body { padding: 28px; }
        .header { display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; flex-wrap: wrap; margin-bottom: 16px; }
        .name { font-family: 'Outfit', sans-serif; font-size: 30px; font-weight: 800; letter-spacing: -0.02em; color: #F2EBE1; }
        .price { font-family: 'JetBrains Mono', monospace; font-size: 22px; font-weight: 700; color: #F05A13; white-space: nowrap; }
        .tags { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 20px; }
        .tag { display: inline-block; padding: 6px 14px; border-radius: 999px; font-family: 'JetBrains Mono', monospace; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.12em; }
        .tag.available { background: rgba(240, 90, 19, 0.14); color: #F05A13; border: 1px solid rgba(240, 90, 19, 0.4); }
        .tag.unavailable { background: #2A1A12; color: #D96B4A; border: 1px solid rgba(240, 90, 19, 0.3); }
        .tag.category { background: #262019; color: #B3A796; border: 1px solid #2C2620; }
        .desc { font-size: 16px; line-height: 1.75; color: #B3A796; margin-bottom: 28px; }
        .actions { display: flex; gap: 12px; flex-wrap: wrap; }
        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 26px; border-radius: 999px; font-family: 'JetBrains Mono', monospace; font-weight: 700; font-size: 12px; text-transform: uppercase; letter-spacing: 0.14em; text-decoration: none; border: none; cursor: pointer; transition: all 0.2s; }
        .btn .mat { font-size: 18px; }
        .btn-primary { background: #F05A13; color: #0F0D0B; box-shadow: 0 10px 28px -10px rgba(240, 90, 19, 0.6); }
        .btn-primary:hover { background: #D9540F; transform: translateY(-1px); }
        .btn-primary:active { transform: scale(0.97); }
        .btn-outline { background: transparent; border: 1px solid rgba(255, 255, 255, 0.22); color: #F2EBE1; }
        .btn-outline:hover { background: rgba(255, 255, 255, 0.05); }
        .btn-disabled { background: #2C2620; color: #6F675C; cursor: not-allowed; }
        .foot { border-top: 1px solid #2C2620; color: #6F675C; padding: 24px 16px; text-align: center; font-family: 'JetBrains Mono', monospace; font-size: 11px; text-transform: uppercase; letter-spacing: 0.14em; background: #0F0D0B; }
        #site-toast { position: fixed; bottom: 24px; left: 50%; transform: translateX(-50%); z-index: 70; width: calc(100vw - 32px); max-width: 560px; display: none; }
        #site-toast .box { border-radius: 999px; background: #262019; padding: 10px 12px 10px 20px; box-shadow: 0 16px 40px rgba(0,0,0,0.5); display: flex; align-items: center; gap: 12px; border: 1px solid #2C2620; }
        #site-toast-text { flex: 1; color: #F2EBE1; font-size: 14px; }
        #site-toast-close { background: none; border: none; cursor: pointer; color: #9F8F77; }
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
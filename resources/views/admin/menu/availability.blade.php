<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Atur Ketersediaan · Warung Makan Mba Neni</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:600,700,800|plus-jakarta-sans:400,500,600,700,800|jetbrains-mono:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <style>
        :root {
            --ink: #FAF7F2;
            --coal: #FFFFFF;
            --coal-2: #FFFFFF;
            --coal-3: #F4EFEA;
            --line: #E8DED1;
            --bone: #231913;
            --sand: #63554A;
            --salient: #4A3E34;
            --dust: #9A897B;
            --ember: #C84A22;
            --ember-600: #A33A18;
            --ok: #247A38;
            --ok-bg: rgba(36, 122, 56, 0.08);
            --danger: #9B1C1C;
            --danger-bg: #FDE8E8;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { color-scheme: light; }
        body {
            font-family: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif;
            background:
                radial-gradient(80rem 50rem at 85% -10%, rgba(200, 74, 34, 0.04), transparent 60%),
                var(--ink);
            color: var(--bone);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }
        img { max-width: 100%; display: block; }
        ::selection { background: var(--ember); color: #FFFFFF; }
        :focus-visible { outline: 2px solid var(--ember); outline-offset: 2px; }

        .layout { max-width: 960px; margin: 0 auto; padding: 28px 20px; }

        /* Topbar */
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            padding: 22px 26px;
            margin-bottom: 24px;
            background: var(--coal);
            border: 1px solid var(--line);
            border-radius: 20px;
            box-shadow: 0 4px 18px -4px rgba(35, 25, 19, 0.04);
        }
        .brand-mark { display: flex; align-items: center; gap: 14px; text-decoration: none; color: inherit; }
        .brand-tile {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            border-radius: 12px;
            background: rgba(200, 74, 34, 0.1);
            border: 1px solid rgba(200, 74, 34, 0.25);
            color: var(--ember);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .brand-tile .material-symbols-outlined { font-size: 24px; }
        .brand-name {
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--ember);
            margin-bottom: 3px;
            font-weight: 700;
        }
        h1 {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: var(--bone);
        }
        .bite { font-size: 13px; color: var(--sand); margin-top: 2px; }

        /* Nav Pills */
        .topbar-nav { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
        .nav-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            border-radius: 999px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            color: var(--sand);
            border: 1px solid var(--line);
            background: var(--coal);
            transition: all .15s ease;
        }
        .nav-link .material-symbols-outlined { font-size: 16px; }
        .nav-link:hover { color: var(--bone); border-color: var(--ember); background: #FAF7F2; }
        .nav-link.active { background: var(--ember); color: #FFFFFF; border-color: var(--ember); font-weight: 700; box-shadow: 0 4px 12px -3px rgba(200, 74, 34, 0.35); }

        .topbar-right { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 8px 16px;
            border: 1px solid transparent;
            border-radius: 999px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: background .18s ease, border-color .18s ease, color .18s ease, transform .12s ease;
        }
        .btn .material-symbols-outlined { font-size: 17px; }
        .btn-outline { background: var(--coal); border-color: var(--line); color: var(--bone); }
        .btn-outline:hover { border-color: #D6C7B4; background: #FAF7F2; }
        .btn:active { transform: scale(.98); }

        .flash {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            padding: 14px 18px;
            border-radius: 14px;
            background: var(--ok-bg);
            border: 1px solid rgba(36, 122, 56, 0.25);
            color: var(--ok);
            font-size: 13.5px;
            font-weight: 600;
        }

        .group-label {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 28px 0 14px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--line);
            font-family: 'JetBrains Mono', monospace;
            font-size: 12px;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--salient);
            font-weight: 700;
        }
        .group-label .material-symbols-outlined { font-size: 20px; }
        .group-label .count { font-weight: 600; color: var(--dust); font-size: 12px; }
        .group-label .ic-ok { color: var(--ok); }
        .group-label .ic-off { color: var(--danger); }

        .item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            background: var(--coal);
            border: 1px solid var(--line);
            padding: 14px 20px;
            border-radius: 18px;
            margin-bottom: 12px;
            box-shadow: 0 2px 8px rgba(35, 25, 19, 0.03);
            transition: border-color .2s ease, box-shadow .2s ease;
        }
        .item:hover { border-color: #D6C7B4; box-shadow: 0 4px 16px rgba(35, 25, 19, 0.06); }
        .item.unavailable { background: #FAF7F2; border-color: #E8DED1; opacity: .82; }
        .item.unavailable:hover { opacity: 1; border-color: #D6C7B4; }

        .item-left { display: flex; align-items: center; gap: 14px; flex: 1; min-width: 0; }
        .item-thumb { width: 48px; height: 48px; border-radius: 12px; object-fit: cover; background: #FAF7F2; flex-shrink: 0; border: 1px solid var(--line); }
        .item-no-thumb { width: 48px; height: 48px; border-radius: 12px; background: rgba(200, 74, 34, 0.1); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .item-no-thumb .material-symbols-outlined { font-size: 24px; color: var(--ember); }
        .item-info { min-width: 0; }
        .item-name { font-weight: 700; font-size: 15px; color: var(--bone); margin-bottom: 3px; }
        .item-price { font-family: 'JetBrains Mono', monospace; font-size: 13px; color: var(--ember); font-weight: 700; }
        .item-right { display: flex; align-items: center; gap: 12px; flex-shrink: 0; flex-wrap: wrap; }

        .item-badge { display: inline-flex; align-items: center; gap: 6px; padding: 5px 14px; border-radius: 999px; font-size: 12px; font-weight: 700; white-space: nowrap; }
        .item-badge .dot { width: 6px; height: 6px; border-radius: 50%; background: currentColor; }
        .item-badge.available { background: var(--ok-bg); border: 1px solid rgba(36, 122, 56, 0.25); color: var(--ok); }
        .item-badge.unavailable { background: var(--danger-bg); border: 1px solid #FBD5D5; color: var(--danger); }

        .toggle-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 8px 18px;
            border: 1px solid var(--line);
            border-radius: 999px;
            background: var(--coal);
            color: var(--bone);
            font-weight: 700;
            font-size: 12px;
            cursor: pointer;
            transition: .18s ease;
            font-family: 'JetBrains Mono', monospace;
            min-width: 140px;
        }
        .toggle-btn:hover { transform: translateY(-1px); }
        .toggle-btn.available { border-color: rgba(200, 74, 34, 0.35); color: var(--ember); }
        .toggle-btn.available:hover { background: rgba(200, 74, 34, 0.08); border-color: var(--ember); }
        .toggle-btn.unavailable { border-color: rgba(36, 122, 56, 0.35); color: var(--ok); }
        .toggle-btn.unavailable:hover { background: var(--ok-bg); border-color: var(--ok); }
        .toggle-btn:active { transform: scale(.98); }

        .empty { padding: 56px 24px; text-align: center; color: var(--sand); background: var(--coal); border: 1px dashed var(--line); border-radius: 20px; margin-top: 16px; }
        .empty .material-symbols-outlined { font-size: 46px; color: var(--dust); margin-bottom: 12px; }
        .empty h3 { font-family: 'Playfair Display', Georgia, serif; font-size: 19px; color: var(--bone); margin-bottom: 6px; font-weight: 700; }
        .empty p { font-size: 13.5px; }

        @media(max-width: 768px) {
            .layout { padding: 16px; }
            .topbar { flex-direction: column; align-items: flex-start; gap: 14px; }
            .topbar-nav { width: 100%; overflow-x: auto; padding-bottom: 4px; }
            h1 { font-size: 21px; }
            .item { padding: 14px 16px; flex-wrap: wrap; }
            .item-left { flex: 1 1 100%; }
            .toggle-btn { width: 100%; min-width: 0; }
        }
    </style>
</head>
<body>
    <div class="layout">

        <div class="topbar">
            <div class="brand-mark">
                <div class="brand-tile"><span class="material-symbols-outlined">toggle_on</span></div>
                <div>
                    <div class="brand-name">Warung Makan Mba Neni</div>
                    <h1>Atur Ketersediaan</h1>
                    <p class="bite">Klik tombol untuk mengubah status ketersediaan menu secara realtime.</p>
                </div>
            </div>

            <div class="topbar-nav">
                <a href="{{ route('admin.orders.index') }}" class="nav-link"><span class="material-symbols-outlined">receipt_long</span>Pesanan</a>
                <a href="{{ route('admin.menu.index') }}" class="nav-link"><span class="material-symbols-outlined">restaurant_menu</span>Menu</a>
                <a href="{{ route('admin.menu.availability') }}" class="nav-link active"><span class="material-symbols-outlined">toggle_on</span>Ketersediaan</a>
                <a href="{{ route('admin.categories.index') }}" class="nav-link"><span class="material-symbols-outlined">category</span>Kategori</a>
                <a href="{{ route('admin.bookings.index') }}" class="nav-link"><span class="material-symbols-outlined">event_available</span>Booking</a>
            </div>

            <div class="topbar-right">
                <a href="/" target="_blank" class="btn btn-outline" title="Lihat Website"><span class="material-symbols-outlined">storefront</span>Lihat Toko</a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline"><span class="material-symbols-outlined">logout</span>Keluar</button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="flash"><span class="material-symbols-outlined">check_circle</span>{{ session('success') }}</div>
        @endif

        @php
            $available = $items->where('is_available', true);
            $unavailable = $items->where('is_available', false);
        @endphp

        @if($available->isNotEmpty())
            <div class="group-label" id="available-label">
                <span class="material-symbols-outlined ic-ok">check_circle</span>
                Tersedia
                <span class="count">({{ $available->count() }})</span>
            </div>
            <div id="available-items">
            @foreach($available as $item)
                <div class="item" id="item-{{ $item->id }}">
                    <div class="item-left">
                        @php $img = $item->imageSrc(); @endphp
                        @if($img)
                            <img class="item-thumb" src="{{ $img }}" alt="{{ $item->name }}">
                        @else
                            <div class="item-no-thumb"><span class="material-symbols-outlined">restaurant</span></div>
                        @endif
                        <div class="item-info">
                            <div class="item-name">{{ $item->name }}</div>
                            <div class="item-price">Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                        </div>
                    </div>
                    <div class="item-right">
                        <span class="item-badge available"><span class="dot"></span>Tersedia</span>
                        <button type="button" class="toggle-btn available toggle-item" data-url="{{ route('admin.menu.toggle', $item) }}" title="Tandai habis">
                            <span class="material-symbols-outlined">visibility_off</span>Tandai Habis
                        </button>
                    </div>
                </div>
            @endforeach
            </div>
        @endif

        @if($unavailable->isNotEmpty())
            <div class="group-label" id="unavailable-label">
                <span class="material-symbols-outlined ic-off">cancel</span>
                Habis
                <span class="count">({{ $unavailable->count() }})</span>
            </div>
            <div id="unavailable-items">
            @foreach($unavailable as $item)
                <div class="item unavailable" id="item-{{ $item->id }}">
                    <div class="item-left">
                        @php $img = $item->imageSrc(); @endphp
                        @if($img)
                            <img class="item-thumb" src="{{ $img }}" alt="{{ $item->name }}" style="filter:grayscale(.5)">
                        @else
                            <div class="item-no-thumb" style="background:rgba(232,154,135,.14)">
                                <span class="material-symbols-outlined" style="color:var(--danger)">restaurant</span>
                            </div>
                        @endif
                        <div class="item-info">
                            <div class="item-name">{{ $item->name }}</div>
                            <div class="item-price">Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                        </div>
                    </div>
                    <div class="item-right">
                        <span class="item-badge unavailable"><span class="dot"></span>Habis</span>
                        <button type="button" class="toggle-btn unavailable toggle-item" data-url="{{ route('admin.menu.toggle', $item) }}" title="Tandai tersedia">
                            <span class="material-symbols-outlined">visibility</span>Tandai Tersedia
                        </button>
                    </div>
                </div>
            @endforeach
            </div>
        @endif

        @if($items->isEmpty())
            <div class="empty">
                <span class="material-symbols-outlined">restaurant</span>
                <h3>Belum ada menu</h3>
                <p>Tambahkan menu terlebih dahulu di halaman Kelola Menu.</p>
            </div>
        @endif
    </div>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        document.querySelectorAll('.toggle-item').forEach(btn => {
            btn.addEventListener('click', async function() {
                const url = this.dataset.url;
                const item = this.closest('.item');
                const wasAvailable = item.querySelector('.item-badge.available') !== null;
                const targetContainer = document.querySelector(wasAvailable ? '#unavailable-items' : '#available-items');

                this.disabled = true;
                this.innerHTML = '<span class="material-symbols-outlined">sync</span> Memproses...';

                try {
                    const params = new URLSearchParams();
                    params.append('_method', 'PUT');
                    params.append('_token', csrfToken);

                    const resp = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Accept': 'application/json',
                        },
                        body: params,
                    });

                    const json = await resp.json();

                    if (resp.ok && json.success) {
                        item.style.transition = 'all .3s ease';
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.9)';

                        setTimeout(() => {
                            const badge = item.querySelector('.item-badge');
                            const toggleBtn = item.querySelector('.toggle-btn');
                            const thumb = item.querySelector('.item-thumb');
                            const noThumb = item.querySelector('.item-no-thumb');
                            const icon = item.querySelector('.item-no-thumb .material-symbols-outlined');

                            if (wasAvailable) {
                                badge.className = 'item-badge unavailable';
                                badge.innerHTML = '<span style="width:6px;height:6px;border-radius:50%;background:currentColor"></span> Habis';
                                toggleBtn.className = 'toggle-btn unavailable toggle-item';
                                toggleBtn.innerHTML = '<span class="material-symbols-outlined">visibility</span> Tandai Tersedia';
                                toggleBtn.title = 'Tandai tersedia';
                                item.classList.add('unavailable');
                                if (thumb) thumb.style.filter = 'grayscale(.5)';
                                if (noThumb) noThumb.style.background = 'rgba(232,154,135,.14)';
                                if (icon) icon.style.color = 'var(--danger)';
                            } else {
                                badge.className = 'item-badge available';
                                badge.innerHTML = '<span style="width:6px;height:6px;border-radius:50%;background:currentColor"></span> Tersedia';
                                toggleBtn.className = 'toggle-btn available toggle-item';
                                toggleBtn.innerHTML = '<span class="material-symbols-outlined">visibility_off</span> Tandai Habis';
                                toggleBtn.title = 'Tandai habis';
                                item.classList.remove('unavailable');
                                if (thumb) thumb.style.filter = '';
                                if (noThumb) noThumb.style.background = '';
                                if (icon) icon.style.color = '';
                            }

                            if (targetContainer) {
                                targetContainer.appendChild(item);
                                updateCounts();
                            }

                            item.style.opacity = '1';
                            item.style.transform = '';
                            this.disabled = false;
                        }, 300);
                    } else {
                        this.innerHTML = wasAvailable
                            ? '<span class="material-symbols-outlined">visibility_off</span> Tandai Habis'
                            : '<span class="material-symbols-outlined">visibility</span> Tandai Tersedia';
                        this.disabled = false;
                        alert(json.message || 'Gagal mengubah status');
                    }
                } catch (err) {
                    this.innerHTML = wasAvailable
                        ? '<span class="material-symbols-outlined">visibility_off</span> Tandai Habis'
                        : '<span class="material-symbols-outlined">visibility</span> Tandai Tersedia';
                    this.disabled = false;
                    alert('Gagal terhubung ke server');
                }
            });
        });

        function updateCounts() {
            const availableItems = document.querySelectorAll('#available-items .item');
            const unavailableItems = document.querySelectorAll('#unavailable-items .item');
            const availCount = document.querySelector('#available-label .count');
            const unavailCount = document.querySelector('#unavailable-label .count');
            if (availCount) availCount.textContent = '(' + availableItems.length + ')';
            if (unavailCount) unavailCount.textContent = '(' + unavailableItems.length + ')';
        }
    </script>
</body>
</html>
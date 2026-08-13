<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Atur Ketersediaan · Warung Makan Mba Neni</title>
    <link href="https://fonts.bunny.net/css?family=manrope:500,600,700,800|outfit:600,700,800|jetbrains-mono:400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <style>
        :root {
            --ink:#0F0D0B; --coal:#161210; --coal-2:#1D1815; --coal-3:#262019; --line:#2C2620;
            --bone:#F2EBE1; --sand:#B3A796; --salient:#C8BCAE; --dust:#6F675C;
            --ember:#F05A13; --ember-600:#D9540F;
            --ok:#7BC3A6; --danger:#E89A87; --danger-bg:#8C3326;
        }
        *{margin:0;padding:0;box-sizing:border-box}
        html{color-scheme:dark}
        body{font-family:'Manrope',ui-sans-serif,system-ui,sans-serif;background:radial-gradient(90rem 60rem at 88% -12%, rgba(240,90,19,.07), transparent 60%),var(--ink);color:var(--bone);min-height:100vh;-webkit-font-smoothing:antialiased}
        img{max-width:100%;display:block}
        ::selection{background:var(--ember);color:var(--ink)}
        :focus-visible{outline:2px solid var(--ember);outline-offset:2px}
        .layout{max-width:860px;margin:0 auto;padding:24px}
        .topbar{display:flex;align-items:flex-end;justify-content:space-between;gap:20px;flex-wrap:wrap;padding:20px 24px;margin-bottom:20px;background:var(--coal-2);border:1px solid var(--line);border-radius:16px}
        .brand-mark{display:flex;align-items:center;gap:14px}
        .brand-tile{width:46px;height:46px;flex-shrink:0;border-radius:12px;background:rgba(240,90,19,.12);border:1px solid rgba(240,90,19,.35);color:var(--ember);display:flex;align-items:center;justify-content:center}
        .brand-tile .material-symbols-outlined{font-size:24px}
        .brand-name{font-family:'JetBrains Mono',ui-monospace,monospace;font-size:10px;letter-spacing:.2em;text-transform:uppercase;color:var(--ember);margin-bottom:4px}
        h1{font-family:'Outfit','Manrope',sans-serif;font-size:24px;font-weight:800;letter-spacing:-.02em;color:var(--bone)}
        .bite{font-size:13px;color:var(--sand);margin-top:2px}
        .topbar-right{display:flex;gap:8px;flex-wrap:wrap}
        .btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:9px 16px;border:1px solid transparent;border-radius:999px;font-family:inherit;font-size:13.5px;font-weight:700;cursor:pointer;text-decoration:none;transition:background .18s ease,border-color .18s ease,color .18s ease,transform .12s ease}
        .btn .material-symbols-outlined{font-size:18px}
        .btn-outline{background:transparent;border-color:var(--line);color:var(--bone)}
        .btn-outline:hover{border-color:rgba(240,90,19,.55);background:var(--coal-3)}
        .btn:active{transform:scale(.98)}
        .flash{display:flex;align-items:center;gap:10px;margin-bottom:20px;padding:13px 16px;border-radius:12px;background:rgba(123,195,166,.1);border:1px solid rgba(123,195,166,.32);color:var(--ok);font-size:14px;font-weight:600}

        .group-label{
            display:flex;align-items:center;gap:10px;margin:26px 0 12px;padding-bottom:10px;border-bottom:1px solid var(--line);
            font-family:'JetBrains Mono',ui-monospace,monospace;font-size:11px;letter-spacing:.2em;text-transform:uppercase;color:var(--sand);
        }
        .group-label .material-symbols-outlined{font-size:18px}
        .group-label .count{font-weight:400;color:var(--dust);letter-spacing:.05em;font-size:12px}
        .group-label .ic-ok{color:var(--ok)}
        .group-label .ic-off{color:var(--danger)}

        .item{display:flex;align-items:center;justify-content:space-between;gap:16px;background:var(--coal-2);border:1px solid var(--line);padding:14px 18px;border-radius:16px;margin-bottom:10px;transition:border-color .2s ease,opacity .2s ease}
        .item:hover{border-color:rgba(240,90,19,.4)}
        .item.unavailable{opacity:.72}
        .item.unavailable:hover{opacity:1}
        .item-left{display:flex;align-items:center;gap:14px;flex:1;min-width:0}
        .item-thumb{width:46px;height:46px;border-radius:12px;object-fit:cover;background:var(--coal-3);flex-shrink:0}
        .item-no-thumb{width:46px;height:46px;border-radius:12px;background:rgba(240,90,19,.12);display:flex;align-items:center;justify-content:center;flex-shrink:0}
        .item-no-thumb .material-symbols-outlined{font-size:23px;color:var(--ember)}
        .item-info{min-width:0}
        .item-name{font-weight:700;font-size:15px;color:var(--bone);margin-bottom:3px}
        .item-price{font-family:'JetBrains Mono',monospace;font-size:12.5px;color:var(--sand)}
        .item-right{display:flex;align-items:center;gap:12px;flex-shrink:0;flex-wrap:wrap}
        .item-badge{display:inline-flex;align-items:center;gap:5px;padding:4px 12px;border-radius:999px;font-size:12px;font-weight:700;white-space:nowrap}
        .item-badge .dot{width:6px;height:6px;border-radius:50%;background:currentColor}
        .item-badge.available{background:rgba(123,195,166,.12);border:1px solid rgba(123,195,166,.32);color:var(--ok)}
        .item-badge.unavailable{background:rgba(232,154,135,.12);border:1px solid rgba(232,154,135,.3);color:var(--danger)}
        .toggle-btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:9px 18px;border:1px solid var(--line);border-radius:999px;background:transparent;color:var(--bone);font-weight:700;font-size:13.5px;cursor:pointer;transition:.18s ease;font-family:inherit;min-width:140px}
        .toggle-btn:hover{transform:translateY(-1px)}
        .toggle-btn.available{border-color:rgba(240,90,19,.5);color:var(--ember)}
        .toggle-btn.available:hover{background:rgba(240,90,19,.12)}
        .toggle-btn.unavailable{border-color:rgba(232,154,135,.4);color:var(--danger)}
        .toggle-btn.unavailable:hover{background:rgba(232,154,135,.1)}
        .toggle-btn:active{transform:scale(.98)}
        .empty{padding:56px 24px;text-align:center;color:var(--sand);background:var(--coal-2);border:1px solid var(--line);border-radius:16px;margin-top:16px}
        .empty .material-symbols-outlined{font-size:46px;color:var(--dust);margin-bottom:12px}
        .empty h3{font-size:17px;color:var(--salient);margin-bottom:6px;font-weight:700}
        .empty p{font-size:13.5px}
        @media(max-width:600px){.layout{padding:16px}.topbar{align-items:flex-start}h1{font-size:21px}.item{padding:12px 16px;flex-wrap:wrap}.item-left{flex:1 1 100%}.toggle-btn{width:100%;min-width:0}}
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
                    <p class="bite">Klik tombol untuk mengubah status tersedia/habis.</p>
                </div>
            </div>
            <div class="topbar-right">
                <a href="{{ route('admin.menu.index') }}" class="btn btn-outline"><span class="material-symbols-outlined">restaurant_menu</span>Kelola Menu</a>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-outline"><span class="material-symbols-outlined">receipt_long</span>Pesanan</a>
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
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking · Warung Makan Mba Neni</title>
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
            --warn: #B45309;
            --warn-bg: #FEF3C7;
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
        .btn-danger { background: var(--danger-bg); color: var(--danger); border: 1px solid #FBD5D5; }
        .btn-danger:hover { background: #FBD5D5; }
        .btn:active { transform: scale(.98); }
        .btn-sm { padding: 6px 12px; font-size: 11.5px; }

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

        .empty {
            margin-top: 8px;
            padding: 56px 24px;
            text-align: center;
            background: var(--coal);
            border: 1px dashed var(--line);
            border-radius: 20px;
            color: var(--sand);
        }
        .empty .material-symbols-outlined { font-size: 46px; color: var(--dust); display: block; margin-bottom: 12px; }
        .empty h3 { font-family: 'Playfair Display', Georgia, serif; font-size: 19px; color: var(--bone); margin-bottom: 6px; font-weight: 700; }
        .empty p { font-size: 13.5px; color: var(--sand); }

        .booking-card {
            background: var(--coal);
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 22px 26px;
            margin-bottom: 16px;
            box-shadow: 0 3px 12px rgba(35, 25, 19, 0.03);
            transition: border-color .2s ease, box-shadow .2s ease;
        }
        .booking-card:hover { border-color: #D6C7B4; box-shadow: 0 6px 20px rgba(35, 25, 19, 0.06); }
        .bk-header { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; flex-wrap: wrap; }
        .bk-name { font-size: 17px; font-weight: 700; color: var(--bone); display: flex; align-items: center; gap: 8px; }
        .bk-name .material-symbols-outlined { color: var(--ember); font-size: 20px; }
        .bk-sub { font-family: 'JetBrains Mono', monospace; font-size: 13px; color: var(--sand); margin-top: 4px; }
        .badge { display: inline-flex; align-items: center; gap: 6px; padding: 6px 14px; border-radius: 999px; font-family: 'JetBrains Mono', monospace; font-size: 12px; font-weight: 600; letter-spacing: .02em; white-space: nowrap; }
        .badge-pending { background: var(--warn-bg); border: 1px solid #FDE68A; color: var(--warn); }
        .badge-pending .material-symbols-outlined { font-size: 16px; }

        .bk-meta { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 16px; padding-top: 16px; border-top: 1px solid var(--line); }
        .bk-tag { display: inline-flex; align-items: center; gap: 7px; background: #FAF7F2; border: 1px solid var(--line); border-radius: 999px; padding: 6px 14px; font-size: 13px; font-weight: 600; color: var(--bone); }
        .bk-tag .material-symbols-outlined { font-size: 17px; color: var(--ember); }
        .bk-notes { margin-top: 14px; font-size: 13.5px; line-height: 1.7; color: var(--sand); background: #FAF7F2; border: 1px solid var(--line); border-radius: 12px; padding: 12px 16px; }
        .bk-notes::before { content: 'Catatan Khusus'; display: block; font-family: 'JetBrains Mono', monospace; font-size: 10.5px; letter-spacing: .14em; text-transform: uppercase; color: var(--dust); margin-bottom: 4px; font-weight: 700; }
        .bk-actions { display: flex; justify-content: flex-end; margin-top: 16px; padding-top: 14px; border-top: 1px solid var(--line); }

        @media(max-width: 768px) {
            .layout { padding: 16px; }
            .topbar { flex-direction: column; align-items: flex-start; gap: 14px; }
            .topbar-nav { width: 100%; overflow-x: auto; padding-bottom: 4px; }
            h1 { font-size: 21px; }
            .bk-header { flex-direction: column; }
        }
    </style>
</head>
<body>
    <div class="layout">

        <div class="topbar">
            <div class="brand-mark">
                <div class="brand-tile"><span class="material-symbols-outlined">event_available</span></div>
                <div>
                    <div class="brand-name">Warung Makan Mba Neni</div>
                    <h1>Booking Meja</h1>
                    <p class="bite">Daftar reservasi meja dari pelanggan warung.</p>
                </div>
            </div>

            <div class="topbar-nav">
                <a href="{{ route('admin.orders.index') }}" class="nav-link"><span class="material-symbols-outlined">receipt_long</span>Pesanan</a>
                <a href="{{ route('admin.menu.index') }}" class="nav-link"><span class="material-symbols-outlined">restaurant_menu</span>Menu</a>
                <a href="{{ route('admin.menu.availability') }}" class="nav-link"><span class="material-symbols-outlined">toggle_on</span>Ketersediaan</a>
                <a href="{{ route('admin.categories.index') }}" class="nav-link"><span class="material-symbols-outlined">category</span>Kategori</a>
                <a href="{{ route('admin.bookings.index') }}" class="nav-link active"><span class="material-symbols-outlined">event_available</span>Booking</a>
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

        @if($bookings->isEmpty())
            <div class="empty">
                <span class="material-symbols-outlined">event_busy</span>
                <h3>Belum ada booking</h3>
                <p>Reservasi dari pelanggan akan muncul di sini.</p>
            </div>
        @else
            @foreach($bookings as $booking)
                <div class="booking-card">
                    <div class="bk-header">
                        <div>
                            <div class="bk-name">
                                <span class="material-symbols-outlined">person</span>
                                {{ $booking->name }}
                            </div>
                            <div class="bk-sub">{{ $booking->phone }}</div>
                        </div>
                        <span class="badge badge-pending"><span class="material-symbols-outlined">schedule</span>{{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }} • {{ $booking->time }}</span>
                    </div>
                    <div class="bk-meta">
                        <span class="bk-tag"><span class="material-symbols-outlined">group</span>{{ $booking->guests }} orang</span>
                        @if($booking->table_type)
                            <span class="bk-tag"><span class="material-symbols-outlined">table_bar</span>{{ $booking->table_type }}</span>
                        @endif
                        <span class="bk-tag"><span class="material-symbols-outlined">calendar_today</span>{{ $booking->date }}</span>
                    </div>
                    @if($booking->notes)
                        <div class="bk-notes">{{ $booking->notes }}</div>
                    @endif
                    <div class="bk-actions">
                        <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus booking ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <span class="material-symbols-outlined">delete</span>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>
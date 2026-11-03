<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pesanan · Warung Makan Mba Neni</title>
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
            --warn: #B45309;
            --warn-bg: #FEF3C7;
            --info: #1D4ED8;
            --info-bg: #DBEAFE;
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
        .layout { max-width: 1120px; margin: 0 auto; padding: 28px 20px; }

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
        .btn-primary { background: var(--ember); color: #FFFFFF; box-shadow: 0 6px 16px -4px rgba(200, 74, 34, 0.35); }
        .btn-primary:hover { background: var(--ember-600); transform: translateY(-1px); }
        .btn-sm { padding: 5px 12px; font-size: 11px; }
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

        /* Realtime Notification Banner */
        .realtime-banner {
            display: none;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 20px;
            padding: 14px 20px;
            border-radius: 16px;
            background: #FEF3C7;
            border: 1px solid #F59E0B;
            color: #92400E;
            font-size: 13.5px;
            font-weight: 700;
            animation: pulseBanner 2s infinite;
        }
        .realtime-banner.active { display: flex; }
        @keyframes pulseBanner {
            0%, 100% { box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.35); }
            50% { box-shadow: 0 0 0 8px rgba(245, 158, 11, 0); }
        }

        /* Status Filter Tabs */
        .filter-tabs {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 16px;
        }
        .filter-tab {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 14px;
            border-radius: 999px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 11.5px;
            font-weight: 600;
            text-decoration: none;
            color: var(--sand);
            background: var(--coal);
            border: 1px solid var(--line);
            transition: all .15s;
        }
        .filter-tab:hover { border-color: var(--ember); color: var(--bone); }
        .filter-tab.active { background: var(--bone); color: #FFF; border-color: var(--bone); }
        .filter-count {
            background: rgba(0,0,0,0.08);
            padding: 1px 7px;
            border-radius: 999px;
            font-size: 10.5px;
        }
        .filter-tab.active .filter-count { background: rgba(255,255,255,0.2); color: #FFF; }

        .search {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            margin-bottom: 22px;
            border-radius: 14px;
            border: 1px solid var(--line);
            background: var(--coal);
            box-shadow: 0 2px 8px rgba(35, 25, 19, 0.03);
            transition: border-color .2s;
        }
        .search:focus-within { border-color: var(--ember); }
        .search .material-symbols-outlined { color: var(--dust); }
        .search input { flex: 1; border: none; outline: none; background: transparent; color: var(--bone); font-family: inherit; font-size: 14px; }
        .search input::placeholder { color: var(--dust); }

        .empty {
            padding: 64px 24px;
            text-align: center;
            color: var(--sand);
            background: var(--coal);
            border: 1px dashed var(--line);
            border-radius: 20px;
        }
        .empty .material-symbols-outlined { font-size: 48px; color: var(--dust); margin-bottom: 12px; }
        .empty h3 { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; color: var(--bone); margin-bottom: 6px; font-weight: 700; }
        .empty p { font-size: 14px; color: var(--sand); }

        /* Order Cards */
        .order-card {
            background: var(--coal);
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 22px 26px;
            margin-bottom: 16px;
            box-shadow: 0 3px 12px rgba(35, 25, 19, 0.03);
            transition: border-color .2s ease, box-shadow .2s ease;
        }
        .order-card:hover { border-color: #D6C7B4; box-shadow: 0 6px 20px rgba(35, 25, 19, 0.06); }
        .order-card-head { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; flex-wrap: wrap; }
        .order-id { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; font-family: 'JetBrains Mono', monospace; font-size: 16px; font-weight: 700; color: var(--bone); }
        .order-id .material-symbols-outlined { font-size: 19px; color: var(--ember); }
        .meta { display: flex; align-items: center; gap: 6px; font-size: 13px; color: var(--sand); margin-top: 5px; }
        .meta .material-symbols-outlined { font-size: 15px; color: var(--dust); }
        .side { text-align: right; }
        .order-total { font-family: 'JetBrains Mono', monospace; font-size: 22px; font-weight: 700; color: var(--ember); }
        .order-barcode { margin-top: 6px; display: inline-flex; flex-direction: column; align-items: flex-end; }
        .order-barcode img { height: 48px; width: auto; border-radius: 4px; border: 1px solid var(--line); padding: 2px; background: #FFF; }
        .order-ref { font-family: 'JetBrains Mono', monospace; font-size: 11px; letter-spacing: .08em; color: var(--dust); margin-top: 4px; }
        .order-items { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 16px; padding-top: 16px; border-top: 1px solid var(--line); }
        .order-item-tag {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #FAF7F2;
            border: 1px solid var(--line);
            border-radius: 999px;
            padding: 6px 14px;
            font-size: 13px;
            color: var(--bone);
            font-weight: 500;
        }
        .order-item-tag .qty { font-family: 'JetBrains Mono', monospace; font-weight: 700; color: var(--ember); }
        .order-item-tag .item-price { font-family: 'JetBrains Mono', monospace; color: var(--dust); font-size: 11.5px; }
        .order-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid var(--line);
        }
        .status-actions { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }

        /* Status Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 12px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .05em;
            text-transform: uppercase;
        }
        .status-pending { background: var(--warn-bg); border: 1px solid #FDE68A; color: var(--warn); }
        .status-processing { background: var(--info-bg); border: 1px solid #BFDBFE; color: var(--info); }
        .status-completed { background: var(--ok-bg); border: 1px solid rgba(36, 122, 56, 0.25); color: var(--ok); }
        .status-cancelled { background: var(--danger-bg); border: 1px solid #FBD5D5; color: var(--danger); }

        .payment-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: #FAF7F2;
            border: 1px solid var(--line);
            color: var(--sand);
            padding: 3px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 600;
        }

        /* Modal */
        .modal-overlay { display: none; position: fixed; inset: 0; z-index: 1000; align-items: center; justify-content: center; padding: 16px; background: rgba(35, 25, 19, 0.55); backdrop-filter: blur(4px); }
        .modal-overlay.active { display: flex; }
        .modal {
            background: var(--coal);
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 28px 32px;
            width: 100%;
            max-width: 560px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 25px 60px -15px rgba(35, 25, 19, 0.2);
        }
        .modal-head { display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; margin-bottom: 18px; padding-bottom: 16px; border-bottom: 1px solid var(--line); }
        .modal-head h2 { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; font-family: 'Playfair Display', Georgia, serif; font-size: 21px; font-weight: 700; color: var(--bone); }
        .modal-close { background: none; border: none; font-size: 24px; cursor: pointer; color: var(--dust); padding: 4px; border-radius: 8px; line-height: 1; transition: .15s; }
        .modal-close:hover { background: #FAF7F2; color: var(--bone); }
        .modal-ref { font-size: 13px; color: var(--sand); margin-top: 4px; }
        .barcode-wrap { background: #FAF7F2; border: 1px solid var(--line); border-radius: 14px; padding: 14px 18px; display: flex; align-items: center; gap: 16px; margin-bottom: 20px; }
        .barcode-wrap img { height: 52px; width: auto; }
        .barcode-wrap .code { font-family: 'JetBrains Mono', monospace; font-size: 14px; font-weight: 700; letter-spacing: .08em; color: var(--bone); }
        .modal table { width: 100%; border-collapse: collapse; }
        .modal th { padding: 10px 8px; text-align: left; font-size: 11px; font-weight: 600; color: var(--dust); text-transform: uppercase; letter-spacing: .14em; border-bottom: 1px solid var(--line); font-family: 'JetBrains Mono', monospace; }
        .modal td { padding: 12px 8px; text-align: left; font-size: 14px; border-bottom: 1px solid var(--line); color: var(--bone); }
        .modal td:last-child, .modal th:last-child { text-align: right; }
        .modal td:nth-child(2), .modal th:nth-child(2) { text-align: center; }
        .modal .total-row td { padding-top: 16px; font-size: 15px; font-weight: 700; border-bottom: none; color: var(--bone); }
        .modal .total-row td:last-child { font-family: 'JetBrains Mono', monospace; font-size: 20px; color: var(--ember); font-weight: 700; }
        .modal-foot { display: flex; gap: 10px; justify-content: flex-end; margin-top: 22px; padding-top: 18px; border-top: 1px solid var(--line); flex-wrap: wrap; }

        /* Thermal POS 58mm/80mm Receipt Print Styling */
        #print-area { display: none; }
        @media print {
            @page { margin: 4mm; size: 80mm auto; }
            body > *:not(#print-area) { display: none !important; }
            #print-area {
                display: block !important;
                width: 72mm;
                margin: 0 auto;
                padding: 4px 0;
                font-family: 'JetBrains Mono', 'Courier New', monospace;
                font-size: 11px;
                color: #000;
                line-height: 1.45;
            }
            #print-area .thermal-header { text-align: center; margin-bottom: 8px; }
            #print-area .thermal-title { font-size: 14px; font-weight: 700; text-transform: uppercase; }
            #print-area .thermal-sub { font-size: 10px; color: #333; }
            #print-area .thermal-divider { border-top: 1px dashed #000; margin: 6px 0; }
            #print-area .thermal-meta { font-size: 10.5px; margin-bottom: 6px; }
            #print-area .thermal-meta div { display: flex; justify-content: space-between; }
            #print-area table { width: 100%; border-collapse: collapse; font-size: 10.5px; }
            #print-area th { text-align: left; padding: 3px 0; border-bottom: 1px dashed #000; font-size: 10px; }
            #print-area td { padding: 4px 0; vertical-align: top; }
            #print-area th:last-child, #print-area td:last-child { text-align: right; }
            #print-area .thermal-total {
                display: flex;
                justify-content: space-between;
                font-size: 13px;
                font-weight: 700;
                padding: 6px 0;
                border-top: 1px dashed #000;
                border-bottom: 1px dashed #000;
                margin-top: 4px;
            }
            #print-area .thermal-footer { text-align: center; margin-top: 10px; font-size: 10px; }
            #print-area .thermal-barcode { text-align: center; margin-top: 8px; }
            #print-area .thermal-barcode img { height: 36px; margin: 0 auto; }
        }
        nav[role=navigation] { display: flex; justify-content: center; margin-top: 24px; }
        .pagination { display: flex; gap: 6px; list-style: none; flex-wrap: wrap; justify-content: center; }
        .page-item .page-link { display: inline-flex; align-items: center; padding: 8px 14px; border-radius: 999px; background: var(--coal); color: var(--sand); font-size: 13px; font-weight: 600; text-decoration: none; border: 1px solid var(--line); transition: .15s; }
        .page-item .page-link:hover { color: var(--bone); border-color: var(--ember); }
        .page-item.active .page-link { background: var(--ember); color: #FFFFFF; border-color: var(--ember); font-weight: 700; }
        .page-item.disabled .page-link { opacity: .35; pointer-events: none; }
        @media(max-width: 768px) {
            .layout { padding: 16px; }
            .topbar { flex-direction: column; align-items: flex-start; gap: 14px; }
            .topbar-nav { width: 100%; overflow-x: auto; padding-bottom: 4px; }
            h1 { font-size: 21px; }
            .order-card { padding: 18px; }
            .order-card-head { flex-direction: column; }
            .side { text-align: left; }
            .order-barcode { align-items: flex-start; }
            .modal { padding: 20px; }
        }
    </style>
</head>
<body>
    <div class="layout">

        <div class="topbar">
            <div class="brand-mark">
                <div class="brand-tile"><span class="material-symbols-outlined">restaurant</span></div>
                <div>
                    <div class="brand-name">Warung Makan Mba Neni</div>
                    <h1>Pesanan</h1>
                    <p class="bite">Daftar pesanan masuk &amp; pengaturan status dapur secara realtime.</p>
                </div>
            </div>

            <div class="topbar-nav">
                <a href="{{ route('admin.orders.index') }}" class="nav-link active"><span class="material-symbols-outlined">receipt_long</span>Pesanan</a>
                <a href="{{ route('admin.menu.index') }}" class="nav-link"><span class="material-symbols-outlined">restaurant_menu</span>Menu</a>
                <a href="{{ route('admin.menu.availability') }}" class="nav-link"><span class="material-symbols-outlined">toggle_on</span>Ketersediaan</a>
                <a href="{{ route('admin.categories.index') }}" class="nav-link"><span class="material-symbols-outlined">category</span>Kategori</a>
                <a href="{{ route('admin.bookings.index') }}" class="nav-link"><span class="material-symbols-outlined">event_available</span>Booking</a>
                <a href="{{ route('admin.reports.index') }}" class="nav-link"><span class="material-symbols-outlined">analytics</span>Laporan</a>
            </div>

            <div class="topbar-right">
                <a href="/" target="_blank" class="btn btn-outline" title="Lihat Website"><span class="material-symbols-outlined">storefront</span>Lihat Toko</a>
                @if(!$orders->isEmpty())
                    <form action="{{ route('admin.orders.destroyAll') }}" method="POST" onsubmit="return confirm('Hapus SEMUA pesanan? Tindakan ini tidak bisa dibatalkan.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><span class="material-symbols-outlined">delete_sweep</span>Hapus Semua</button>
                    </form>
                @endif
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline"><span class="material-symbols-outlined">logout</span>Keluar</button>
                </form>
            </div>
        </div>

        <!-- Realtime New Order Notification Banner -->
        <div id="realtime-banner" class="realtime-banner">
            <div style="display:flex;align-items:center;gap:10px">
                <span class="material-symbols-outlined">notifications_active</span>
                <span id="realtime-banner-text">Pesanan baru telah masuk dari pelanggan!</span>
            </div>
            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.reload()">
                <span class="material-symbols-outlined">refresh</span>Muat Ulang
            </button>
        </div>

        @if(session('success'))
            <div class="flash"><span class="material-symbols-outlined">check_circle</span>{{ session('success') }}</div>
        @endif

        <!-- Filter Status Tabs -->
        <div class="filter-tabs">
            <a href="{{ route('admin.orders.index', array_filter(['q' => $q])) }}" class="filter-tab {{ empty($statusFilter) ? 'active' : '' }}">
                Semua <span class="filter-count">{{ $statusCounts['all'] ?? 0 }}</span>
            </a>
            <a href="{{ route('admin.orders.index', array_filter(['status' => 'pending', 'q' => $q])) }}" class="filter-tab {{ ($statusFilter ?? '') === 'pending' ? 'active' : '' }}">
                Menunggu <span class="filter-count">{{ $statusCounts['pending'] ?? 0 }}</span>
            </a>
            <a href="{{ route('admin.orders.index', array_filter(['status' => 'processing', 'q' => $q])) }}" class="filter-tab {{ ($statusFilter ?? '') === 'processing' ? 'active' : '' }}">
                Sedang Dimasak <span class="filter-count">{{ $statusCounts['processing'] ?? 0 }}</span>
            </a>
            <a href="{{ route('admin.orders.index', array_filter(['status' => 'completed', 'q' => $q])) }}" class="filter-tab {{ ($statusFilter ?? '') === 'completed' ? 'active' : '' }}">
                Selesai / Lunas <span class="filter-count">{{ $statusCounts['completed'] ?? 0 }}</span>
            </a>
            <a href="{{ route('admin.orders.index', array_filter(['status' => 'cancelled', 'q' => $q])) }}" class="filter-tab {{ ($statusFilter ?? '') === 'cancelled' ? 'active' : '' }}">
                Dibatalkan <span class="filter-count">{{ $statusCounts['cancelled'] ?? 0 }}</span>
            </a>
        </div>

        <form method="GET" action="{{ route('admin.orders.index') }}" class="search">
            @if(!empty($statusFilter))
                <input type="hidden" name="status" value="{{ $statusFilter }}">
            @endif
            <span class="material-symbols-outlined">search</span>
            <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Cari pesanan (nama pelanggan / no. telepon / kode struk)...">
            @if(request('q'))
                <a href="{{ route('admin.orders.index', array_filter(['status' => $statusFilter])) }}" title="Hapus pencarian" style="text-decoration:none;color:var(--dust);display:flex"><span class="material-symbols-outlined">close</span></a>
            @endif
        </form>

        @if($orders->isEmpty())
            <div class="empty">
                <span class="material-symbols-outlined">receipt_long</span>
                <h3>Belum ada pesanan</h3>
                <p>Pesanan dari pelanggan akan muncul di sini secara otomatis.</p>
            </div>
        @else
            @foreach($orders as $order)
                @php
                    $statusClass = match($order->status) {
                        'processing' => 'status-processing',
                        'completed' => 'status-completed',
                        'cancelled' => 'status-cancelled',
                        default => 'status-pending',
                    };
                @endphp
                <div class="order-card">
                    <div class="order-card-head">
                        <div>
                            <div class="order-id">
                                <span class="material-symbols-outlined">receipt</span>
                                Order #{{ $order->id }}
                                <span class="status-badge {{ $statusClass }}">
                                    {{ \App\Models\Order::statusLabel($order->status) }}
                                </span>
                                <span class="payment-badge">
                                    <span class="material-symbols-outlined" style="font-size:14px">payments</span>
                                    {{ \App\Models\Order::paymentLabel($order->payment_method) }}
                                </span>
                            </div>
                            <div class="meta"><span class="material-symbols-outlined">person</span><b>{{ $order->customer_name ?: 'Pelanggan' }}</b></div>
                            <div class="meta"><span class="material-symbols-outlined">phone</span>{{ $order->customer_phone ?: '—' }}</div>
                            <div class="meta"><span class="material-symbols-outlined">room_service</span>{{ \App\Models\Order::serviceLabel($order->service_type) }}</div>
                            <div class="meta"><span class="material-symbols-outlined">calendar_today</span>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}</div>
                        </div>
                        <div class="side">
                            <div class="order-total">Rp {{ number_format($order->total, 0, ',', '.') }}</div>
                            @if($order->reference_code)
                                <div class="order-barcode">
                                    <img src="https://barcode.tec-it.com/barcode.ashx?data={{ urlencode($order->reference_code) }}&code=Code128&translate-esc=true&dpi=72&imagetype=png" alt="{{ $order->reference_code }}">
                                    <div class="order-ref">{{ $order->reference_code }}</div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="order-items">
                        @foreach($order->items as $item)
                            <span class="order-item-tag">
                                <span class="qty">{{ $item->quantity }}×</span>
                                {{ $item->name }}
                                <span class="item-price">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                            </span>
                        @endforeach
                    </div>

                    <div class="order-actions">
                        <div class="status-actions">
                            <form action="{{ route('admin.orders.status', $order) }}" method="POST" style="display:inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="processing">
                                <button type="submit" class="btn btn-outline btn-sm" {{ $order->status === 'processing' ? 'disabled style=opacity:.5' : '' }}>
                                    <span class="material-symbols-outlined">skillet</span>Dimasak
                                </button>
                            </form>
                            <form action="{{ route('admin.orders.status', $order) }}" method="POST" style="display:inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="completed">
                                <button type="submit" class="btn btn-outline btn-sm" {{ $order->status === 'completed' ? 'disabled style=opacity:.5' : '' }}>
                                    <span class="material-symbols-outlined">check_circle</span>Selesai / Lunas
                                </button>
                            </form>
                            <form action="{{ route('admin.orders.status', $order) }}" method="POST" style="display:inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="cancelled">
                                <button type="submit" class="btn btn-outline btn-sm" {{ $order->status === 'cancelled' ? 'disabled style=opacity:.5' : '' }}>
                                    <span class="material-symbols-outlined">cancel</span>Batal
                                </button>
                            </form>
                        </div>

                        <div style="display:flex;gap:8px;flex-wrap:wrap">
                            <button class="btn btn-outline btn-sm" onclick="openModal({{ $order->id }})">
                                <span class="material-symbols-outlined">visibility</span>Detail &amp; Cetak Struk
                            </button>
                            <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Hapus pesanan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><span class="material-symbols-outlined">delete</span>Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <div style="margin-top:20px">{{ $orders->links() }}</div>
        @endif
    </div>

    <!-- Modal Detail -->
    <div id="modal-overlay" class="modal-overlay" onclick="closeModal(event)">
        <div class="modal" onclick="event.stopPropagation()">
            <div class="modal-head">
                <div>
                    <h2 id="modal-title">Rincian Pesanan</h2>
                    <div id="modal-ref" class="modal-ref"></div>
                </div>
                <button class="modal-close" onclick="closeModal()">&times;</button>
            </div>

            <div id="modal-barcode-wrap" class="barcode-wrap" style="display:none">
                <img id="modal-barcode-img" src="" alt="Barcode">
                <span id="modal-barcode-code" class="code"></span>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th style="text-align:center">Jml</th>
                        <th style="text-align:right">Harga</th>
                        <th style="text-align:right">Subtotal</th>
                    </tr>
                </thead>
                <tbody id="modal-body"></tbody>
                <tr class="total-row">
                    <td colspan="3">Total Pembayaran</td>
                    <td id="modal-total"></td>
                </tr>
            </table>

            <div class="modal-foot">
                <button class="btn btn-primary" onclick="printOrder()">
                    <span class="material-symbols-outlined">print</span>Cetak Struk Thermal (80mm)
                </button>
                <button class="btn btn-outline" onclick="closeModal()">Tutup</button>
            </div>
        </div>
    </div>

    <div id="print-area"></div>

    <script>
        const ordersData = @json($orders->getCollection());
        let currentModalOrder = null;

        function statusLabelText(status) {
            if (status === 'processing') return 'SEDANG DIMASAK';
            if (status === 'completed') return 'SELESAI / LUNAS';
            if (status === 'cancelled') return 'DIBATALKAN';
            return 'MENUNGGU DIPROSES';
        }

        function paymentLabelText(method) {
            if (method === 'qris') return 'QRIS';
            if (method === 'transfer') return 'Transfer Bank';
            return 'Tunai / Kasir';
        }

        function serviceLabelText(type) {
            if (type === 'takeaway') return 'Takeaway (Bungkus)';
            if (type === 'delivery') return 'Delivery (Antar)';
            return 'Dine-in (Makan di Tempat)';
        }

        function openModal(orderId) {
            const order = ordersData.find(o => o.id === orderId);
            if (!order) return;
            currentModalOrder = order;

            document.getElementById('modal-title').innerHTML =
                'Rincian Pesanan #' + order.id +
                ' <span class="status-badge status-' + (order.status || 'pending') + '" style="display:inline-flex">' + statusLabelText(order.status) + '</span>';

            const customerInfo =
                (order.customer_name ? order.customer_name : 'Pelanggan') +
                (order.customer_phone ? ' • ' + order.customer_phone : '') +
                (' • ' + serviceLabelText(order.service_type)) +
                (' • ' + paymentLabelText(order.payment_method));

            document.getElementById('modal-ref').textContent =
                customerInfo +
                (order.created_at ? ' • ' + new Date(order.created_at).toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' }) : '');

            const barcodeWrap = document.getElementById('modal-barcode-wrap');
            const barcodeImg = document.getElementById('modal-barcode-img');
            const barcodeCode = document.getElementById('modal-barcode-code');
            if (order.reference_code) {
                barcodeImg.src = 'https://barcode.tec-it.com/barcode.ashx?data=' + encodeURIComponent(order.reference_code) + '&code=Code128&translate-esc=true&dpi=96&imagetype=png';
                barcodeCode.textContent = order.reference_code;
                barcodeWrap.style.display = 'flex';
            } else {
                barcodeWrap.style.display = 'none';
            }

            const tbody = document.getElementById('modal-body');
            tbody.innerHTML = '';

            order.items.forEach(item => {
                const tr = document.createElement('tr');
                const subtotal = item.price * item.quantity;
                tr.innerHTML = `
                    <td>${item.name}</td>
                    <td style="text-align:center">${item.quantity}</td>
                    <td style="text-align:right">Rp ${Number(item.price).toLocaleString('id-ID')}</td>
                    <td style="text-align:right;font-weight:600">Rp ${subtotal.toLocaleString('id-ID')}</td>
                `;
                tbody.appendChild(tr);
            });

            document.getElementById('modal-total').textContent = 'Rp ' + Number(order.total).toLocaleString('id-ID');
            document.getElementById('modal-overlay').classList.add('active');
        }

        function closeModal(e) {
            if (e && e.target !== e.currentTarget) return;
            document.getElementById('modal-overlay').classList.remove('active');
            document.getElementById('print-area').innerHTML = '';
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeModal();
        });

        function printOrder() {
            if (!currentModalOrder) return;
            const order = currentModalOrder;
            const dateStr = order.created_at
                ? new Date(order.created_at).toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit' })
                : new Date().toLocaleDateString('id-ID');

            let rows = '';
            (order.items || []).forEach(item => {
                const sub = Number(item.price) * Number(item.quantity);
                rows += `
                    <tr>
                        <td colspan="2">${item.name}<br><small>${item.quantity} x Rp ${Number(item.price).toLocaleString('id-ID')}</small></td>
                        <td style="text-align:right;vertical-align:bottom">Rp ${sub.toLocaleString('id-ID')}</td>
                    </tr>
                `;
            });

            const barcodeHtml = order.reference_code
                ? `<div class="thermal-barcode">
                       <img src="https://barcode.tec-it.com/barcode.ashx?data=${encodeURIComponent(order.reference_code)}&code=Code128&translate-esc=true&dpi=96&imagetype=png" alt="${order.reference_code}">
                       <div>${order.reference_code}</div>
                   </div>`
                : '';

            const printArea = document.getElementById('print-area');
            printArea.innerHTML = `
                <div class="thermal-header">
                    <div class="thermal-title">WARUNG MAKAN MBA NENI</div>
                    <div class="thermal-sub">Pakembaran, Bancarkembar, Purwokerto Utara</div>
                    <div class="thermal-sub">Buka 24 Jam • WA: 0858-1040-5551</div>
                </div>
                <div class="thermal-divider"></div>
                <div class="thermal-meta">
                    <div><span>No. Order:</span><span>#${order.id} (${order.reference_code || '-'})</span></div>
                    <div><span>Tanggal:</span><span>${dateStr}</span></div>
                    <div><span>Pelanggan:</span><span>${order.customer_name || '-'}</span></div>
                    <div><span>Layanan:</span><span>${serviceLabelText(order.service_type)}</span></div>
                    <div><span>Pembayaran:</span><span>${paymentLabelText(order.payment_method)}</span></div>
                    <div><span>Status:</span><span>${statusLabelText(order.status)}</span></div>
                </div>
                <div class="thermal-divider"></div>
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">Item</th>
                            <th style="text-align:right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>${rows}</tbody>
                </table>
                <div class="thermal-total">
                    <span>TOTAL</span>
                    <span>Rp ${Number(order.total).toLocaleString('id-ID')}</span>
                </div>
                ${barcodeHtml}
                <div class="thermal-footer">
                    Terima kasih telah bersantap di<br><b>Warung Makan Mba Neni</b>!
                </div>
            `;

            window.print();
        }

        window.addEventListener('afterprint', function() {
            document.getElementById('print-area').innerHTML = '';
        });

        // Realtime polling for new orders every 12 seconds
        let knownLatestId = {{ (int) (\App\Models\Order::max('id') ?? 0) }};
        setInterval(async () => {
            try {
                const resp = await fetch('{{ route('admin.orders.poll') }}', {
                    headers: { 'Accept': 'application/json' }
                });
                if (!resp.ok) return;
                const data = await resp.json();
                if (data.latest_id && data.latest_id > knownLatestId) {
                    knownLatestId = data.latest_id;
                    const banner = document.getElementById('realtime-banner');
                    const bannerText = document.getElementById('realtime-banner-text');
                    if (banner && bannerText) {
                        bannerText.textContent = 'Pesanan baru (#' + data.latest_id + ') telah masuk! Total menunggu: ' + data.pending_count + ' pesanan.';
                        banner.classList.add('active');
                    }
                }
            } catch (e) {}
        }, 12000);
    </script>
</body>
</html>

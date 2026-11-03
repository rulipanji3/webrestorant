<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Penjualan · Warung Makan Mba Neni</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:600,700,800|plus-jakarta-sans:400,500,600,700,800|jetbrains-mono:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <style>
        :root {
            --ink: #FAF7F2;
            --coal: #FFFFFF;
            --coal-3: #F4EFEA;
            --line: #E8DED1;
            --bone: #231913;
            --sand: #63554A;
            --dust: #9A897B;
            --ember: #C84A22;
            --ember-600: #A33A18;
            --ok: #247A38;
            --ok-bg: rgba(36, 122, 56, 0.08);
            --warn: #B45309;
            --warn-bg: #FEF3C7;
            --info: #1D4ED8;
            --info-bg: #DBEAFE;
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
            transition: all .15s ease;
        }
        .btn .material-symbols-outlined { font-size: 17px; }
        .btn-outline { background: var(--coal); border-color: var(--line); color: var(--bone); }
        .btn-outline:hover { border-color: #D6C7B4; background: #FAF7F2; }

        /* KPI Cards */
        .kpi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }
        .kpi-card {
            background: var(--coal);
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 20px 22px;
            box-shadow: 0 3px 12px rgba(35, 25, 19, 0.03);
        }
        .kpi-label {
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--dust);
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .kpi-val {
            font-family: 'JetBrains Mono', monospace;
            font-size: 24px;
            font-weight: 700;
            color: var(--bone);
            margin-top: 10px;
        }
        .kpi-val.ember { color: var(--ember); }
        .kpi-val.ok { color: var(--ok); }
        .kpi-sub { font-size: 12.5px; color: var(--sand); margin-top: 6px; }

        /* Panels */
        .grid-2 {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 20px;
            margin-bottom: 24px;
        }
        .panel {
            background: var(--coal);
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 22px 26px;
            box-shadow: 0 3px 12px rgba(35, 25, 19, 0.03);
        }
        .panel-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 18px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--line);
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--bone);
        }
        .panel-title .t { display: flex; align-items: center; gap: 8px; }
        .panel-title .material-symbols-outlined { color: var(--ember); font-size: 21px; }

        table { width: 100%; border-collapse: collapse; font-size: 13.5px; }
        th {
            text-align: left;
            padding: 10px 8px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--dust);
            border-bottom: 1px solid var(--line);
        }
        td { padding: 12px 8px; border-bottom: 1px solid var(--line); color: var(--bone); }
        tr:last-child td { border-bottom: none; }
        .mono { font-family: 'JetBrains Mono', monospace; font-weight: 700; }

        /* Bar Chart */
        .bar-list { display: flex; flex-direction: column; gap: 12px; }
        .bar-row { display: flex; flex-direction: column; gap: 5px; }
        .bar-meta { display: flex; justify-content: space-between; font-size: 12.5px; font-weight: 600; }
        .bar-track { height: 10px; background: #FAF7F2; border-radius: 999px; overflow: hidden; border: 1px solid var(--line); }
        .bar-fill { height: 100%; background: var(--ember); border-radius: 999px; }

        @media(max-width: 860px) {
            .grid-2 { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="layout">

        <div class="topbar">
            <div class="brand-mark">
                <div class="brand-tile"><span class="material-symbols-outlined">analytics</span></div>
                <div>
                    <div class="brand-name">Warung Makan Mba Neni</div>
                    <h1>Laporan &amp; Analitik</h1>
                    <p class="bite">Ringkasan omzet penjualan, tren harian, dan menu terlaris warung.</p>
                </div>
            </div>

            <div class="topbar-nav">
                <a href="{{ route('admin.orders.index') }}" class="nav-link"><span class="material-symbols-outlined">receipt_long</span>Pesanan</a>
                <a href="{{ route('admin.menu.index') }}" class="nav-link"><span class="material-symbols-outlined">restaurant_menu</span>Menu</a>
                <a href="{{ route('admin.menu.availability') }}" class="nav-link"><span class="material-symbols-outlined">toggle_on</span>Ketersediaan</a>
                <a href="{{ route('admin.categories.index') }}" class="nav-link"><span class="material-symbols-outlined">category</span>Kategori</a>
                <a href="{{ route('admin.bookings.index') }}" class="nav-link"><span class="material-symbols-outlined">event_available</span>Booking</a>
                <a href="{{ route('admin.reports.index') }}" class="nav-link active"><span class="material-symbols-outlined">analytics</span>Laporan</a>
            </div>

            <div class="topbar-right">
                <button type="button" onclick="window.print()" class="btn btn-outline"><span class="material-symbols-outlined">print</span>Cetak Laporan</button>
                <a href="/" target="_blank" class="btn btn-outline"><span class="material-symbols-outlined">storefront</span>Lihat Toko</a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline"><span class="material-symbols-outlined">logout</span>Keluar</button>
                </form>
            </div>
        </div>

        <!-- KPI Summary Grid -->
        <div class="kpi-grid">
            <div class="kpi-card">
                <div class="kpi-label">Total Omzet Masuk <span class="material-symbols-outlined" style="color:var(--ember)">payments</span></div>
                <div class="kpi-val ember">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
                <div class="kpi-sub">Selesai/Lunas: Rp {{ number_format($completedRevenue, 0, ',', '.') }}</div>
            </div>
            <div class="kpi-card">
                <div class="kpi-label">Omzet Hari Ini <span class="material-symbols-outlined" style="color:var(--ok)">today</span></div>
                <div class="kpi-val ok">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</div>
                <div class="kpi-sub">Bulan Ini: Rp {{ number_format($monthRevenue, 0, ',', '.') }}</div>
            </div>
            <div class="kpi-card">
                <div class="kpi-label">Total Pesanan <span class="material-symbols-outlined" style="color:var(--info)">receipt_long</span></div>
                <div class="kpi-val">{{ $totalOrders }} Pesanan</div>
                <div class="kpi-sub">{{ $completedOrders }} selesai • {{ $pendingOrders + $processingOrders }} aktif • {{ $cancelledOrders }} batal</div>
            </div>
            <div class="kpi-card">
                <div class="kpi-label">Reservasi &amp; Stok Menu <span class="material-symbols-outlined" style="color:var(--warn)">event_seat</span></div>
                <div class="kpi-val">{{ $totalBookings }} Booking</div>
                <div class="kpi-sub">{{ $confirmedBookings }} terkonfirmasi • {{ $availableMenuItems }}/{{ $totalMenuItems }} menu tersedia</div>
            </div>
        </div>

        <div class="grid-2">
            <!-- Top Selling Menu Items -->
            <div class="panel">
                <div class="panel-title">
                    <div class="t"><span class="material-symbols-outlined">workspace_premium</span>Menu Terlaris (Best Sellers)</div>
                </div>
                @if($topItems->isEmpty())
                    <p style="color:var(--sand);font-size:13.5px;padding:18px 0">Belum ada data item terjual.</p>
                @else
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Hidangan</th>
                                <th style="text-align:center">Terjual</th>
                                <th style="text-align:right">Total Penjualan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topItems as $index => $item)
                                <tr>
                                    <td class="mono" style="color:var(--dust)">{{ $index + 1 }}</td>
                                    <td style="font-weight:700">{{ $item->name }}</td>
                                    <td class="mono" style="text-align:center;color:var(--ember)">{{ $item->total_qty }} porsi</td>
                                    <td class="mono" style="text-align:right">Rp {{ number_format($item->total_sales, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <!-- Daily Revenue Last 7 Days -->
            <div class="panel">
                <div class="panel-title">
                    <div class="t"><span class="material-symbols-outlined">bar_chart</span>Tren Pendapatan 7 Hari Terakhir</div>
                </div>
                @php
                    $maxDailyRev = max(1, (int) $dailyStats->max('revenue'));
                @endphp
                <div class="bar-list">
                    @foreach($dailyStats as $day)
                        @php
                            $pct = min(100, round(($day['revenue'] / $maxDailyRev) * 100));
                        @endphp
                        <div class="bar-row">
                            <div class="bar-meta">
                                <span>{{ $day['label'] }} <span style="color:var(--dust);font-weight:400">({{ $day['orders'] }} pesanan)</span></span>
                                <span class="mono" style="color:var(--ember)">Rp {{ number_format($day['revenue'], 0, ',', '.') }}</span>
                            </div>
                            <div class="bar-track">
                                <div class="bar-fill" style="width: {{ $pct }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="grid-2">
            <!-- Breakdown by Service Type -->
            <div class="panel">
                <div class="panel-title">
                    <div class="t"><span class="material-symbols-outlined">room_service</span>Distribusi Tipe Layanan</div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Tipe Layanan</th>
                            <th style="text-align:center">Jumlah Order</th>
                            <th style="text-align:right">Total Omzet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(['dine_in' => 'Dine-in (Makan di Tempat)', 'takeaway' => 'Takeaway (Bungkus)', 'delivery' => 'Delivery (Pesan Antar)'] as $key => $label)
                            @php
                                $row = $serviceStats->get($key) ?? $serviceStats->get(str_replace('_', '-', $key));
                                $cnt = $row ? (int) $row->count : 0;
                                $rev = $row ? (int) $row->revenue : 0;
                            @endphp
                            <tr>
                                <td style="font-weight:600">{{ $label }}</td>
                                <td class="mono" style="text-align:center">{{ $cnt }}</td>
                                <td class="mono" style="text-align:right;color:var(--ember)">Rp {{ number_format($rev, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Breakdown by Payment Method -->
            <div class="panel">
                <div class="panel-title">
                    <div class="t"><span class="material-symbols-outlined">account_balance_wallet</span>Distribusi Metode Pembayaran</div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Metode Pembayaran</th>
                            <th style="text-align:center">Transaksi</th>
                            <th style="text-align:right">Total Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(['cash' => 'Tunai / Kasir', 'qris' => 'QRIS Instant', 'transfer' => 'Transfer Bank'] as $key => $label)
                            @php
                                $row = $paymentStats->get($key);
                                $cnt = $row ? (int) $row->count : 0;
                                $rev = $row ? (int) $row->revenue : 0;
                            @endphp
                            <tr>
                                <td style="font-weight:600">{{ $label }}</td>
                                <td class="mono" style="text-align:center">{{ $cnt }}</td>
                                <td class="mono" style="text-align:right;color:var(--ember)">Rp {{ number_format($rev, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>

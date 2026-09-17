<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        .layout { max-width: 1100px; margin: 0 auto; padding: 28px 20px; }

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
        .order-id { display: flex; align-items: center; gap: 8px; font-family: 'JetBrains Mono', monospace; font-size: 16px; font-weight: 700; color: var(--bone); }
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
        .order-actions { display: flex; gap: 10px; margin-top: 16px; padding-top: 16px; border-top: 1px solid var(--line); }
        .lunas-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: var(--ok-bg);
            border: 1px solid rgba(36, 122, 56, 0.25);
            color: var(--ok);
            padding: 3px 12px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .05em;
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
        .modal-foot { display: flex; gap: 10px; justify-content: flex-end; margin-top: 22px; padding-top: 18px; border-top: 1px solid var(--line); }
        #print-area { display: none; }
        @media print {
            body > *:not(#print-area) { display: none !important; }
            #print-area { display: block !important; padding: 24px; font-family: 'Plus Jakarta Sans', system-ui, sans-serif; font-size: 12px; color: #111; }
            #print-area h2 { font-size: 18px; margin-bottom: 4px; }
            #print-area .ref { font-size: 12px; color: #666; margin-bottom: 16px; }
            #print-area table { width: 100%; border-collapse: collapse; }
            #print-area th { padding: 8px 6px; text-align: left; font-size: 11px; text-transform: uppercase; border-bottom: 2px solid #000; }
            #print-area td { padding: 8px 6px; text-align: left; border-bottom: 1px solid #ddd; }
            #print-area th:last-child, #print-area td:last-child { text-align: right; }
            #print-area th:nth-child(2), #print-area td:nth-child(2) { text-align: center; }
            #print-area .total-line { padding-top: 12px; font-size: 16px; font-weight: 700; text-align: right; border-top: 2px solid #000; margin-top: 8px; }
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
                    <p class="bite">Daftar pesanan masuk dari pelanggan.</p>
                </div>
            </div>

            <div class="topbar-nav">
                <a href="{{ route('admin.orders.index') }}" class="nav-link active"><span class="material-symbols-outlined">receipt_long</span>Pesanan</a>
                <a href="{{ route('admin.menu.index') }}" class="nav-link"><span class="material-symbols-outlined">restaurant_menu</span>Menu</a>
                <a href="{{ route('admin.menu.availability') }}" class="nav-link"><span class="material-symbols-outlined">toggle_on</span>Ketersediaan</a>
                <a href="{{ route('admin.categories.index') }}" class="nav-link"><span class="material-symbols-outlined">category</span>Kategori</a>
                <a href="{{ route('admin.bookings.index') }}" class="nav-link"><span class="material-symbols-outlined">event_available</span>Booking</a>
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

        @if(session('success'))
            <div class="flash"><span class="material-symbols-outlined">check_circle</span>{{ session('success') }}</div>
        @endif

        <form method="GET" action="{{ route('admin.orders.index') }}" class="search">
            <span class="material-symbols-outlined">search</span>
            <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Cari pesanan (nama pelanggan / no. pesanan / kode)...">
            @if(request('q'))
                <a href="{{ route('admin.orders.index') }}" title="Hapus pencarian" style="text-decoration:none;color:var(--dust);display:flex"><span class="material-symbols-outlined">close</span></a>
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
                <div class="order-card">
                    <div class="order-card-head">
                        <div>
                            <div class="order-id">
                                <span class="material-symbols-outlined">receipt</span>
                                Order #{{ $order->id }}
                                <span class="lunas-badge">LUNAS</span>
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
                        <button class="btn btn-outline" onclick="openModal({{ $order->id }})">
                            <span class="material-symbols-outlined">visibility</span>Detail Struk
                        </button>
                        <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Hapus pesanan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><span class="material-symbols-outlined">delete</span>Hapus</button>
                        </form>
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
                    <h2 id="modal-title">
                        Rincian Pesanan
                        <span id="modal-lunas-badge" class="lunas-badge" style="display:none">LUNAS</span>
                    </h2>
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
                    <span class="material-symbols-outlined">print</span>Cetak Struk
                </button>
                <button class="btn btn-outline" onclick="closeModal()">Tutup</button>
            </div>
        </div>
    </div>

    <div id="print-area"></div>

    <script>
        const ordersData = @json($orders->getCollection());

        function openModal(orderId) {
            const order = ordersData.find(o => o.id === orderId);
            if (!order) return;

            document.getElementById('modal-title').innerHTML = 'Rincian Pesanan #' + order.id + ' <span class="lunas-badge" style="display:inline-flex">LUNAS</span>';
            const customerInfo =
                (order.customer_name ? order.customer_name : '') +
                (order.customer_phone ? ' • ' + order.customer_phone : '') +
                (' • ' + (order.service_type === 'takeaway' ? 'Takeaway' : order.service_type === 'delivery' ? 'Delivery' : 'Dine-in'));
            document.getElementById('modal-ref').textContent = customerInfo + (order.created_at ? ' • ' + new Date(order.created_at).toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' }) : '');

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
            const title = document.getElementById('modal-title').textContent;
            const ref = document.getElementById('modal-ref').textContent;
            const tbody = document.getElementById('modal-body');
            const total = document.getElementById('modal-total').textContent;

            let rows = '';
            tbody.querySelectorAll('tr').forEach(tr => {
                const cells = tr.querySelectorAll('td');
                if (cells.length === 4) {
                    rows += `<tr>
                        <td>${cells[0].textContent}</td>
                        <td style="text-align:center">${cells[1].textContent}</td>
                        <td style="text-align:right">${cells[2].textContent}</td>
                        <td style="text-align:right;font-weight:600">${cells[3].textContent}</td>
                    </tr>`;
                }
            });

            const printArea = document.getElementById('print-area');
            printArea.innerHTML = `
                <h2>${title}</h2>
                <div class="ref">${ref}</div>
                <table>
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th style="text-align:center">Jml</th>
                            <th style="text-align:right">Harga</th>
                            <th style="text-align:right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>${rows}</tbody>
                </table>
                <div class="total-line">${total}</div>
            `;

            window.print();
            document.getElementById('print-area').innerHTML = '';
        }

        window.addEventListener('afterprint', function() {
            document.getElementById('print-area').innerHTML = '';
        });
    </script>
</body>
</html>
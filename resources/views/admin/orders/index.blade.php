<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesanan · Warung Makan Mba Neni</title>
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
        .layout{max-width:900px;margin:0 auto;padding:24px}
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
        .btn-danger{background:var(--danger-bg);color:#F4D6CF}
        .btn-danger:hover{background:#7A2B20}
        .btn:active{transform:scale(.98)}
        .flash{display:flex;align-items:center;gap:10px;margin-bottom:20px;padding:13px 16px;border-radius:12px;background:rgba(123,195,166,.1);border:1px solid rgba(123,195,166,.32);color:var(--ok);font-size:14px;font-weight:600}
        .search{display:flex;align-items:center;gap:10px;padding:11px 14px;margin-bottom:18px;border-radius:12px;border:1px solid var(--line);background:var(--coal)}
        .search .material-symbols-outlined{color:var(--dust)}
        .search input{flex:1;border:none;outline:none;background:transparent;color:var(--bone);font-family:inherit;font-size:14px}
        .search input::placeholder{color:#97897a}
        .empty{padding:64px 24px;text-align:center;color:var(--sand);background:var(--coal-2);border:1px solid var(--line);border-radius:16px}
        .empty .material-symbols-outlined{font-size:52px;color:var(--dust);margin-bottom:12px}
        .empty h3{font-size:19px;color:var(--salient);margin-bottom:6px;font-weight:700}
        .empty p{font-size:14px}
        .order-card{background:var(--coal-2);border:1px solid var(--line);border-radius:16px;padding:20px 24px;margin-bottom:14px;transition:border-color .2s ease}
        .order-card:hover{border-color:rgba(240,90,19,.35)}
        .order-card-head{display:flex;align-items:flex-start;justify-content:space-between;gap:16px;flex-wrap:wrap}
        .order-id{display:flex;align-items:center;gap:8px;font-family:'JetBrains Mono',monospace;font-size:15px;font-weight:700;color:var(--bone)}
        .order-id .material-symbols-outlined{font-size:18px;color:var(--ember)}
        .meta{display:flex;align-items:center;gap:6px;font-size:12.5px;color:var(--sand);margin-top:4px}
        .meta .material-symbols-outlined{font-size:14px;color:var(--dust)}
        .side{text-align:right}
        .order-total{font-family:'JetBrains Mono',monospace;font-size:21px;font-weight:700;color:var(--ember)}
        .order-barcode{margin-top:5px;display:inline-flex;flex-direction:column;align-items:flex-end}
        .order-barcode img{height:50px;width:auto;border-radius:4px}
        .order-ref{font-family:'JetBrains Mono',monospace;font-size:10.5px;letter-spacing:.08em;color:var(--dust);margin-top:3px}
        .order-items{display:flex;flex-wrap:wrap;gap:6px;margin-top:14px;padding-top:14px;border-top:1px solid var(--line)}
        .order-item-tag{display:inline-flex;align-items:center;gap:7px;background:var(--coal-3);border:1px solid var(--line);border-radius:999px;padding:6px 12px;font-size:13px;color:var(--sand)}
        .order-item-tag .qty{font-family:'JetBrains Mono',monospace;font-weight:700;color:var(--ember)}
        .order-item-tag .item-price{font-family:'JetBrains Mono',monospace;color:var(--dust);font-size:11.5px}
        .order-actions{display:flex;gap:10px;margin-top:16px;padding-top:14px;border-top:1px solid var(--line)}
        .lunas-badge{display:inline-flex;align-items:center;gap:4px;background:rgba(123,195,166,.12);border:1px solid rgba(123,195,166,.32);color:var(--ok);padding:3px 12px;border-radius:999px;font-size:11px;font-weight:700;letter-spacing:.05em}
        .modal-overlay{display:none;position:fixed;inset:0;z-index:1000;align-items:center;justify-content:center;padding:16px;background:rgba(15,13,11,.72);backdrop-filter:blur(4px)}
        .modal-overlay.active{display:flex}
        .modal{background:var(--coal-2);border:1px solid var(--line);border-radius:16px;padding:28px;width:100%;max-width:540px;max-height:90vh;overflow-y:auto;box-shadow:0 30px 70px -30px rgba(0,0,0,.7)}
        .modal-head{display:flex;align-items:flex-start;justify-content:space-between;gap:12px;margin-bottom:18px;padding-bottom:16px;border-bottom:1px solid var(--line)}
        .modal-head h2{display:flex;align-items:center;gap:10px;flex-wrap:wrap;font-family:'Outfit','Manrope',sans-serif;font-size:19px;font-weight:800;color:var(--bone)}
        .modal-close{background:none;border:none;font-size:24px;cursor:pointer;color:var(--sand);padding:4px;border-radius:8px;line-height:1;transition:.15s}
        .modal-close:hover{background:var(--coal-3);color:var(--bone)}
        .modal-ref{font-size:13px;color:var(--sand);margin-bottom:4px}
        .barcode-wrap{background:var(--coal);border:1px solid var(--line);border-radius:12px;padding:12px 16px;display:flex;align-items:center;gap:14px;margin-bottom:20px}
        .barcode-wrap img{height:54px;width:auto}
        .barcode-wrap .code{font-family:'JetBrains Mono',monospace;font-size:14px;font-weight:700;letter-spacing:.08em;color:var(--bone)}
        .modal table{width:100%;border-collapse:collapse}
        .modal th{padding:10px 8px;text-align:left;font-size:10.5px;font-weight:600;color:var(--dust);text-transform:uppercase;letter-spacing:.14em;border-bottom:1px solid var(--line);font-family:'JetBrains Mono',ui-monospace,monospace}
        .modal td{padding:12px 8px;text-align:left;font-size:14px;border-bottom:1px solid var(--line);color:var(--bone)}
        .modal td:last-child,.modal th:last-child{text-align:right}
        .modal td:nth-child(2),.modal th:nth-child(2){text-align:center}
        .modal .total-row td{padding-top:16px;font-size:16px;font-weight:700;border-bottom:none;color:var(--bone)}
        .modal .total-row td:last-child{font-family:'JetBrains Mono',monospace;font-size:19px;color:var(--ember)}
        .modal-foot{display:flex;gap:10px;justify-content:flex-end;margin-top:20px;padding-top:16px;border-top:1px solid var(--line)}
        #print-area{display:none}
        @media print{body>*:not(#print-area){display:none!important}#print-area{display:block!important;padding:24px;font-family:'Manrope',system-ui,sans-serif;font-size:12px;color:#111}#print-area h2{font-size:18px;margin-bottom:4px}#print-area .ref{font-size:12px;color:#666;margin-bottom:16px}#print-area table{width:100%;border-collapse:collapse}#print-area th{padding:8px 6px;text-align:left;font-size:11px;text-transform:uppercase;border-bottom:2px solid #000}#print-area td{padding:8px 6px;text-align:left;border-bottom:1px solid #ddd}#print-area th:last-child,#print-area td:last-child{text-align:right}#print-area th:nth-child(2),#print-area td:nth-child(2){text-align:center}#print-area .total-line{padding-top:12px;font-size:16px;font-weight:700;text-align:right;border-top:2px solid #000;margin-top:8px}}
        nav[role=navigation]{display:flex;justify-content:center;margin-top:20px}
        .pagination{display:flex;gap:6px;list-style:none;flex-wrap:wrap;justify-content:center}
        .page-item .page-link{display:inline-flex;align-items:center;padding:8px 14px;border-radius:999px;background:transparent;color:var(--sand);font-size:13px;font-weight:600;text-decoration:none;border:1px solid var(--line);transition:.15s}
        .page-item .page-link:hover{color:var(--bone);border-color:rgba(240,90,19,.5)}
        .page-item.active .page-link{background:var(--ember);color:var(--ink);border-color:var(--ember);font-weight:700}
        .page-item.disabled .page-link{opacity:.35;pointer-events:none}
        @media(max-width:600px){.layout{padding:16px}.topbar{align-items:flex-start}h1{font-size:21px}.order-card{padding:16px}.order-card-head{flex-direction:column}.side{text-align:left}.order-barcode{align-items:flex-start}.modal{padding:20px}}
    </style>
</head>
<body>
    <div class="layout">

        <div class="topbar">
            <div class="brand-mark">
                <div class="brand-tile"><span class="material-symbols-outlined">receipt_long</span></div>
                <div>
                    <div class="brand-name">Warung Makan Mba Neni</div>
                    <h1>Pesanan</h1>
                    <p class="bite">Daftar pesanan masuk dari pelanggan.</p>
                </div>
            </div>
            <div class="topbar-right">
                <a href="{{ route('admin.menu.index') }}" class="btn btn-outline"><span class="material-symbols-outlined">restaurant_menu</span>Kelola Menu</a>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline"><span class="material-symbols-outlined">event_available</span>Booking</a>
                <a href="{{ route('admin.menu.availability') }}" class="btn btn-outline"><span class="material-symbols-outlined">toggle_on</span>Ketersediaan</a>
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
            <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Cari pesanan (nama / no. invoice)...">
            @if(request('q'))
                <a href="{{ route('admin.orders.index') }}" title="Hapus pencarian" style="text-decoration:none;color:var(--dust);display:flex"><span class="material-symbols-outlined">close</span></a>
            @endif
        </form>

        @if($orders->isEmpty())
            <div class="empty">
                <span class="material-symbols-outlined">receipt_long</span>
                <h3>Belum ada pesanan</h3>
                <p>Pesanan dari pelanggan akan muncul di sini.</p>
            </div>
        @else
            @foreach($orders as $order)
                <div class="order-card">
                    <div class="order-card-head">
                        <div>
                            <div class="order-id">
                                <span class="material-symbols-outlined">receipt</span>
                                Order #{{ $order->id }}
                            </div>
                            <div class="meta"><span class="material-symbols-outlined">person</span>{{ $order->customer_name ?: 'Pelanggan' }}</div>
                            <div class="meta"><span class="material-symbols-outlined">phone</span>{{ $order->customer_phone ?: '—' }}</div>
                            <div class="meta"><span class="material-symbols-outlined">restaurant</span>{{ \App\Models\Order::serviceLabel($order->service_type) }}</div>
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
                            <span class="material-symbols-outlined">visibility</span>Detail
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
                    <h2>
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
                    <td colspan="3">Total</td>
                    <td id="modal-total"></td>
                </tr>
            </table>

            <div class="modal-foot">
                <button class="btn btn-outline" onclick="printOrder()">
                    <span class="material-symbols-outlined">print</span>Print
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
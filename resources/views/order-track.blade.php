<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacak Pesanan | Warung Makan Mba Neni</title>
    <meta name="description" content="Cek status pesanan makanan Anda secara realtime di Warung Makan Mba Neni.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    @vite(['resources/css/order.css'])
    <style>
        #thermal-print-area { display: none; }
        @media print {
            @page { margin: 4mm; size: 80mm auto; }
            body > *:not(#thermal-print-area) { display: none !important; }
            #thermal-print-area {
                display: block !important;
                width: 72mm;
                margin: 0 auto;
                padding: 4px 0;
                font-family: 'JetBrains Mono', 'Courier New', monospace;
                font-size: 11px;
                color: #000;
                line-height: 1.45;
            }
            #thermal-print-area .t-center { text-align: center; }
            #thermal-print-area .t-bold { font-weight: 700; }
            #thermal-print-area .t-divider { border-top: 1px dashed #000; margin: 6px 0; }
            #thermal-print-area .t-row { display: flex; justify-content: space-between; margin: 2px 0; }
        }
    </style>
</head>
<body class="selection:bg-ember selection:text-white bg-[#FAF7F2] text-bone font-sans antialiased">
<header id="site-header" class="fixed inset-x-0 top-0 z-50 border-b border-line/70 bg-[#FAF7F2]/90 backdrop-blur-md transition-all duration-300">
    <nav class="mx-auto flex h-18 w-full max-w-[1400px] items-center justify-between px-4 md:px-8">
        <a href="/warung-makan-mba-neni" class="flex items-center gap-3">
            <span class="flex h-10 w-10 items-center justify-center rounded-full bg-ember/10 text-ember border border-ember/20 shadow-2xs">
                <span class="material-symbols-outlined" style="font-size:20px">restaurant</span>
            </span>
            <span class="font-display text-xl font-bold tracking-tight text-bone">Mba <span class="text-ember">Neni</span></span>
        </a>
        <div class="flex items-center gap-4">
            <a href="/order" class="font-mono text-[12px] uppercase tracking-[0.16em] text-sand font-semibold transition-colors hover:text-ember">Menu &amp; Order</a>
            <a href="/booking" class="hidden font-mono text-[12px] uppercase tracking-[0.16em] text-sand font-semibold transition-colors hover:text-ember sm:inline">Booking Meja</a>
            <a href="/order" class="btn-ember py-2.5! px-5! text-xs uppercase tracking-wider">
                <span class="material-symbols-outlined" style="font-size:18px">shopping_cart</span>
                Pesan
            </a>
        </div>
    </nav>
</header>

<main class="pt-18 min-h-[82vh]">
    <section class="relative overflow-hidden border-b border-line bg-white shadow-xs">
        <div class="pointer-events-none absolute -left-28 -top-28 h-72 w-72 rounded-full bg-ember/10 blur-3xl"></div>
        <div class="mx-auto w-full max-w-[1400px] px-4 py-12 md:px-8 md:py-14">
            <span class="inline-flex items-center gap-1.5 rounded-full bg-ember/10 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-ember">
                <span class="material-symbols-outlined text-sm">manage_search</span> Status Realtime
            </span>
            <h1 class="mt-3 font-display text-4xl font-extrabold tracking-tight text-bone md:text-5xl">Lacak Pesanan</h1>
            <p class="mt-3 max-w-xl text-sand text-base">Masukkan kode referensi struk (misal: <span class="font-mono font-bold text-bone">INV-...</span>) atau nomor telepon untuk memantau status pesanan Anda.</p>
        </div>
    </section>

    <section class="py-12 md:py-16">
        <div class="mx-auto w-full max-w-3xl px-4 md:px-8">
            <!-- Form Pencarian -->
            <div class="rounded-3xl border border-line bg-white p-6 shadow-md md:p-8">
                <form method="GET" action="{{ route('order.track') }}" class="grid grid-cols-1 gap-4 sm:grid-cols-12">
                    <div class="sm:col-span-5">
                        <label for="ref" class="field-label">Kode Struk / No. Order</label>
                        <input type="text" id="ref" name="ref" value="{{ $ref }}" placeholder="Contoh: INV-261103-AB12CD" class="field">
                    </div>
                    <div class="sm:col-span-4">
                        <label for="phone" class="field-label">No. WhatsApp (Opsional)</label>
                        <input type="text" id="phone" name="phone" value="{{ $phone }}" placeholder="Contoh: 08123456789" class="field">
                    </div>
                    <div class="sm:col-span-3 flex items-end">
                        <button type="submit" class="btn-ember w-full py-3.5! text-xs uppercase tracking-wider cursor-pointer">
                            <span class="material-symbols-outlined" style="font-size:18px">search</span>
                            Cari
                        </button>
                    </div>
                </form>
            </div>

            @if(($ref !== '' || $phone !== '') && !$order)
                <div class="mt-8 rounded-3xl border border-line bg-white p-8 text-center shadow-xs">
                    <span class="material-symbols-outlined text-5xl text-dust">search_off</span>
                    <h2 class="mt-3 font-display text-2xl font-bold text-bone">Pesanan Tidak Ditemukan</h2>
                    <p class="mt-2 text-sm text-sand">Periksa kembali kode referensi struk atau nomor telepon yang Anda masukkan.</p>
                </div>
            @endif

            @if($order)
                @php
                    $waNumber = config('services.whatsapp.number', '6285810405551');
                    $waText = "Halo Warung Makan Mba Neni, saya ingin menanyakan status pesanan saya dengan kode *{$order->reference_code}* atas nama *{$order->customer_name}* (Total: Rp " . number_format($order->total, 0, ',', '.') . ").";
                @endphp
                <div class="mt-8 rounded-3xl border border-line bg-white p-6 shadow-lg md:p-8">
                    <div class="flex flex-wrap items-start justify-between gap-4 border-b border-line pb-6">
                        <div>
                            <div class="font-mono text-xs uppercase tracking-widest text-ember font-bold">Pesanan #{{ $order->id }}</div>
                            <h2 class="mt-1 font-display text-2xl font-extrabold text-bone">{{ $order->customer_name }}</h2>
                            <p class="mt-1 text-sm text-sand">
                                {{ \App\Models\Order::serviceLabel($order->service_type) }} •
                                {{ \App\Models\Order::paymentLabel($order->payment_method) }} •
                                {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}
                            </p>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center gap-1.5 rounded-full px-4 py-1.5 font-mono text-xs font-bold uppercase tracking-wider
                                {{ $order->status === 'completed' ? 'bg-herb-soft text-herb border border-herb/30' : ($order->status === 'processing' ? 'bg-blue-50 text-blue-700 border border-blue-200' : ($order->status === 'cancelled' ? 'bg-red-50 text-red-700 border border-red-200' : 'bg-amber-50 text-amber-700 border border-amber-200')) }}">
                                <span class="material-symbols-outlined text-base">
                                    {{ $order->status === 'completed' ? 'check_circle' : ($order->status === 'processing' ? 'skillet' : ($order->status === 'cancelled' ? 'cancel' : 'schedule')) }}
                                </span>
                                {{ \App\Models\Order::statusLabel($order->status) }}
                            </span>
                            <div class="mt-2 font-mono text-2xl font-extrabold text-ember">Rp {{ number_format($order->total, 0, ',', '.') }}</div>
                        </div>
                    </div>

                    <!-- Step Progress Bar -->
                    @if($order->status !== 'cancelled')
                        @php
                            $step = match($order->status) {
                                'processing' => 2,
                                'completed' => 3,
                                default => 1,
                            };
                        @endphp
                        <div class="mt-6 grid grid-cols-3 gap-3">
                            <div class="rounded-2xl border p-3.5 text-center {{ $step >= 1 ? 'border-ember/40 bg-ember/5 text-bone' : 'border-line bg-[#FAF7F2] text-dust' }}">
                                <span class="material-symbols-outlined text-2xl {{ $step >= 1 ? 'text-ember' : 'text-dust' }}">receipt_long</span>
                                <div class="mt-1 font-mono text-[11px] font-bold uppercase">1. Diterima</div>
                            </div>
                            <div class="rounded-2xl border p-3.5 text-center {{ $step >= 2 ? 'border-ember/40 bg-ember/5 text-bone' : 'border-line bg-[#FAF7F2] text-dust' }}">
                                <span class="material-symbols-outlined text-2xl {{ $step >= 2 ? 'text-ember' : 'text-dust' }}">skillet</span>
                                <div class="mt-1 font-mono text-[11px] font-bold uppercase">2. Dimasak</div>
                            </div>
                            <div class="rounded-2xl border p-3.5 text-center {{ $step >= 3 ? 'border-herb/40 bg-herb-soft text-herb' : 'border-line bg-[#FAF7F2] text-dust' }}">
                                <span class="material-symbols-outlined text-2xl {{ $step >= 3 ? 'text-herb' : 'text-dust' }}">check_circle</span>
                                <div class="mt-1 font-mono text-[11px] font-bold uppercase">3. Selesai</div>
                            </div>
                        </div>
                    @endif

                    <!-- Payment Method Instructions if QRIS / Transfer -->
                    @if($order->payment_method === 'qris' && $order->status !== 'completed')
                        <div class="mt-6 rounded-2xl border border-amber-300 bg-amber-50/70 p-4 text-sm text-stone-800">
                            <div class="font-bold text-bone flex items-center gap-2">
                                <span class="material-symbols-outlined text-ember">qr_code_2</span>
                                Instruksi Pembayaran QRIS
                            </div>
                            <p class="mt-1 text-sand">Silakan scan kode QRIS resmi <b>Warung Makan Mba Neni (NMID: ID10260001998)</b> di kasir atau kirim bukti pembayaran melalui tombol WhatsApp di bawah.</p>
                        </div>
                    @elseif($order->payment_method === 'transfer' && $order->status !== 'completed')
                        <div class="mt-6 rounded-2xl border border-amber-300 bg-amber-50/70 p-4 text-sm text-stone-800">
                            <div class="font-bold text-bone flex items-center gap-2">
                                <span class="material-symbols-outlined text-ember">account_balance</span>
                                Instruksi Transfer Bank
                            </div>
                            <p class="mt-1 text-sand">Transfer tepat sebesar <b>Rp {{ number_format($order->total, 0, ',', '.') }}</b> ke <b>Bank BRI 0077-01-019980-50-2</b> a.n. <b>Warung Makan Mba Neni</b>, lalu konfirmasi via WhatsApp.</p>
                        </div>
                    @endif

                    <!-- Barcode -->
                    @if($order->reference_code)
                        <div class="mt-6 flex flex-col items-center justify-center rounded-2xl border border-line bg-[#FAF7F2] p-4">
                            <img src="https://barcode.tec-it.com/barcode.ashx?data={{ urlencode($order->reference_code) }}&code=Code128&translate-esc=true&dpi=96&imagetype=png" alt="{{ $order->reference_code }}" class="h-16 w-auto">
                            <div class="mt-1.5 font-mono text-xs font-bold tracking-widest text-bone">{{ $order->reference_code }}</div>
                        </div>
                    @endif

                    <!-- Items List -->
                    <div class="mt-6 space-y-3 rounded-2xl border border-line bg-[#FAF7F2] p-5">
                        <div class="font-mono text-xs font-bold uppercase tracking-wider text-dust">Rincian Menu</div>
                        @foreach($order->items as $item)
                            <div class="flex items-center justify-between border-b border-line/60 pb-2.5 last:border-none last:pb-0 text-sm">
                                <div>
                                    <span class="font-mono font-bold text-ember">{{ $item->quantity }}×</span>
                                    <span class="font-semibold text-bone ml-1">{{ $item->name }}</span>
                                    <span class="text-xs text-sand ml-1">(@ Rp {{ number_format($item->price, 0, ',', '.') }})</span>
                                </div>
                                <div class="font-mono font-bold text-bone">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 flex flex-wrap gap-3">
                        <button type="button" onclick="window.print()" class="btn-ember py-3! px-5! text-xs uppercase tracking-wider cursor-pointer">
                            <span class="material-symbols-outlined" style="font-size:18px">print</span>
                            Cetak Struk Thermal
                        </button>
                        <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode($waText) }}" target="_blank" class="btn-ghost py-3! px-5! text-xs uppercase tracking-wider !text-herb !border-herb/30 hover:!bg-herb-soft">
                            <span class="material-symbols-outlined" style="font-size:18px">chat</span>
                            Konfirmasi via WhatsApp
                        </a>
                    </div>
                </div>

                <!-- Thermal Print Area -->
                <div id="thermal-print-area">
                    <div class="t-center">
                        <div class="t-bold" style="font-size:14px">WARUNG MAKAN MBA NENI</div>
                        <div>Pakembaran, Purwokerto Utara</div>
                        <div>Buka 24 Jam • WA: 0858-1040-5551</div>
                    </div>
                    <div class="t-divider"></div>
                    <div class="t-row"><span>Kode:</span><span>{{ $order->reference_code }}</span></div>
                    <div class="t-row"><span>Pelanggan:</span><span>{{ $order->customer_name }}</span></div>
                    <div class="t-row"><span>Layanan:</span><span>{{ \App\Models\Order::serviceLabel($order->service_type) }}</span></div>
                    <div class="t-row"><span>Pembayaran:</span><span>{{ \App\Models\Order::paymentLabel($order->payment_method) }}</span></div>
                    <div class="t-row"><span>Status:</span><span>{{ \App\Models\Order::statusLabel($order->status) }}</span></div>
                    <div class="t-divider"></div>
                    @foreach($order->items as $item)
                        <div class="t-row">
                            <span>{{ $item->quantity }}x {{ $item->name }}</span>
                            <span>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                    <div class="t-divider"></div>
                    <div class="t-row t-bold" style="font-size:13px">
                        <span>TOTAL</span>
                        <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                    </div>
                    <div class="t-divider"></div>
                    <div class="t-center" style="margin-top:6px">Terima kasih atas pesanan Anda!</div>
                </div>
            @endif

            @if($ordersByPhone->count() > 1)
                <div class="mt-8 rounded-3xl border border-line bg-white p-6 shadow-xs">
                    <h3 class="font-display text-lg font-bold text-bone">Riwayat Pesanan Nomor {{ $phone }}</h3>
                    <div class="mt-4 space-y-2.5">
                        @foreach($ordersByPhone as $hist)
                            <a href="{{ route('order.track', ['ref' => $hist->reference_code, 'phone' => $phone]) }}" class="flex items-center justify-between rounded-2xl border border-line bg-[#FAF7F2] px-4 py-3 text-sm transition-colors hover:border-ember">
                                <div>
                                    <span class="font-mono font-bold text-ember">{{ $hist->reference_code }}</span>
                                    <span class="text-sand ml-2">{{ $hist->customer_name }} • {{ \Carbon\Carbon::parse($hist->created_at)->format('d M Y H:i') }}</span>
                                </div>
                                <div class="font-mono font-bold text-bone">Rp {{ number_format($hist->total, 0, ',', '.') }}</div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
</main>

<footer class="border-t border-[#382319] bg-[#221610] text-stone-300 py-8">
    <div class="mx-auto flex w-full max-w-[1400px] flex-col items-center justify-between gap-4 px-4 md:flex-row md:px-8">
        <p class="font-mono text-[11px] uppercase tracking-[0.14em] text-stone-400">&copy; {{ date('Y') }} Warung Makan Mba Neni.</p>
        <a href="/warung-makan-mba-neni" class="font-mono text-[11px] uppercase tracking-[0.14em] text-amber-400 font-semibold transition-colors hover:text-white">← Kembali ke Beranda</a>
    </div>
</footer>
</body>
</html>

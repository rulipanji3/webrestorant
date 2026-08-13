<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking · Warung Makan Mba Neni</title>
    <link href="https://fonts.bunny.net/css?family=manrope:500,600,700,800|outfit:600,700,800|jetbrains-mono:400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <style>
        :root {
            --ink:#0F0D0B; --coal:#161210; --coal-2:#1D1815; --coal-3:#262019; --line:#2C2620;
            --bone:#F2EBE1; --sand:#B3A796; --salient:#C8BCAE; --dust:#6F675C;
            --ember:#F05A13; --ember-600:#D9540F;
            --ok:#7BC3A6; --danger:#E89A87; --danger-bg:#8C3326; --warn:#F2C14E; --warn-bg:#5A4411;
        }
        *{margin:0;padding:0;box-sizing:border-box}
        html{color-scheme:dark}
        body{font-family:'Manrope',ui-sans-serif,system-ui,sans-serif;background:radial-gradient(90rem 60rem at 88% -12%, rgba(240,90,19,.07), transparent 60%),var(--ink);color:var(--bone);min-height:100vh;-webkit-font-smoothing:antialiased}
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
        .btn-sm{padding:7px 13px;font-size:13px}
        .flash{display:flex;align-items:center;gap:10px;margin-bottom:20px;padding:13px 16px;border-radius:12px;background:rgba(123,195,166,.1);border:1px solid rgba(123,195,166,.32);color:var(--ok);font-size:14px;font-weight:600}
        .empty{margin-top:8px;padding:52px 24px;text-align:center;background:var(--coal-2);border:1px dashed var(--line);border-radius:16px;color:var(--dust)}
        .empty .material-symbols-outlined{font-size:44px;color:var(--line);display:block;margin-bottom:14px}
        .empty h3{font-family:'Outfit',sans-serif;font-size:17px;color:var(--sand);margin-bottom:6px}
        .empty p{font-size:13.5px}
        .booking-card{background:var(--coal-2);border:1px solid var(--line);border-radius:16px;padding:20px 24px;margin-bottom:14px;transition:border-color .2s ease,transform .15s ease}
        .booking-card:hover{border-color:#3A322A;transform:translateY(-1px)}
        .bk-header{display:flex;align-items:flex-start;justify-content:space-between;gap:16px;flex-wrap:wrap}
        .bk-name{font-size:17px;font-weight:800;color:var(--bone);display:flex;align-items:center;gap:8px}
        .bk-name .material-symbols-outlined{color:var(--ember)}
        .bk-sub{font-family:'JetBrains Mono',ui-monospace,monospace;font-size:13px;color:var(--sand);margin-top:4px}
        .badge{display:inline-flex;align-items:center;gap:6px;padding:7px 14px;border-radius:999px;font-family:'JetBrains Mono',ui-monospace,monospace;font-size:11.5px;font-weight:500;letter-spacing:.04em;white-space:nowrap}
        .badge-pending{background:var(--warn-bg);border:1px solid rgba(242,193,78,.35);color:var(--warn)}
        .bk-meta{display:flex;flex-wrap:wrap;gap:10px;margin-top:16px;padding-top:16px;border-top:1px solid var(--line)}
        .bk-tag{display:inline-flex;align-items:center;gap:7px;background:var(--coal);border:1px solid var(--line);border-radius:999px;padding:7px 14px;font-size:13px;font-weight:600;color:var(--sand)}
        .bk-tag .material-symbols-outlined{font-size:17px;color:var(--ember)}
        .bk-notes{margin-top:14px;font-size:13.5px;line-height:1.7;color:var(--sand);background:var(--coal);border:1px solid var(--line);border-radius:12px;padding:12px 16px}
        .bk-notes::before{content:'catatan';display:block;font-family:'JetBrains Mono',ui-monospace,monospace;font-size:10px;letter-spacing:.18em;text-transform:uppercase;color:var(--dust);margin-bottom:6px}
        .bk-actions{display:flex;justify-content:flex-end;margin-top:16px;padding-top:14px;border-top:1px solid var(--line)}
        @media(max-width:600px){.layout{padding:16px}.topbar{align-items:flex-start}h1{font-size:21px}.bk-header{flex-direction:column}}
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
                    <p class="bite">Daftar reservasi meja dari pelanggan.</p>
                </div>
            </div>
            <div class="topbar-right">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-outline"><span class="material-symbols-outlined">receipt_long</span>Pesanan</a>
                <a href="{{ route('admin.menu.index') }}" class="btn btn-outline"><span class="material-symbols-outlined">restaurant_menu</span>Menu</a>
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
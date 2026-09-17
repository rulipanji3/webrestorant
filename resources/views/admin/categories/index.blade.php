<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kategori · Warung Makan Mba Neni</title>
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
        ::selection { background: var(--ember); color: #FFFFFF; }
        :focus-visible { outline: 2px solid var(--ember); outline-offset: 2px; }

        .layout { max-width: 900px; margin: 0 auto; padding: 28px 20px; }

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
        .btn-primary { background: var(--ember); color: #FFFFFF; box-shadow: 0 6px 16px -4px rgba(200, 74, 34, 0.35); }
        .btn-primary:hover { background: var(--ember-600); transform: translateY(-1px); }
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

        .panel {
            background: var(--coal);
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 24px 28px;
            margin-bottom: 22px;
            box-shadow: 0 3px 12px rgba(35, 25, 19, 0.03);
        }
        .panel-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--line);
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 19px;
            font-weight: 700;
            color: var(--bone);
        }
        .panel-title .material-symbols-outlined { font-size: 22px; color: var(--ember); }

        .field label {
            display: block;
            margin-bottom: 7px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--salient);
            font-weight: 700;
        }
        .field input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: #FAF7F2;
            color: var(--bone);
            font-family: inherit;
            font-size: 14px;
            outline: none;
            transition: border-color .18s ease, box-shadow .18s ease, background .18s ease;
        }
        .field input::placeholder { color: var(--dust); }
        .field input:focus {
            background: #FFFFFF;
            border-color: var(--ember);
            box-shadow: 0 0 0 3px rgba(200, 74, 34, 0.14);
        }

        .add-row { display: flex; gap: 12px; align-items: flex-end; flex-wrap: wrap; }
        .add-row .field { flex: 1; min-width: 240px; }

        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        thead th {
            text-align: left;
            padding: 12px 10px;
            white-space: nowrap;
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--dust);
            border-bottom: 1px solid var(--line);
        }
        tbody td { padding: 14px 10px; border-bottom: 1px solid var(--line); vertical-align: middle; }
        tbody tr { transition: background .15s; }
        tbody tr:hover { background: #FAF7F2; }

        .badge-cat { display: inline-flex; padding: 5px 14px; border-radius: 999px; background: #FAF7F2; border: 1px solid var(--line); color: var(--bone); font-size: 13px; font-weight: 700; }
        .slug { font-family: 'JetBrains Mono', monospace; font-size: 11.5px; color: var(--dust); margin-top: 4px; }
        .cell-count { font-family: 'JetBrains Mono', monospace; font-size: 13px; color: var(--sand); white-space: nowrap; font-weight: 600; }
        .edit-form { display: flex; gap: 8px; align-items: center; }
        .edit-form input { flex: 1; min-width: 130px; padding: 8px 12px; border: 1px solid var(--line); border-radius: 10px; background: #FAF7F2; color: var(--bone); font-family: inherit; font-size: 13px; outline: none; transition: border-color .18s ease; }
        .edit-form input:focus { border-color: var(--ember); background: #FFF; }
        .td-actions { display: flex; gap: 8px; justify-content: flex-end; flex-wrap: wrap; align-items: center; }
        .empty { padding: 44px 24px; text-align: center; color: var(--sand); font-size: 14px; }

        @media(max-width: 768px) {
            .layout { padding: 16px; }
            .topbar { flex-direction: column; align-items: flex-start; gap: 14px; }
            .topbar-nav { width: 100%; overflow-x: auto; padding-bottom: 4px; }
            h1 { font-size: 21px; }
            .add-row { flex-direction: column; align-items: stretch; }
            .add-row .field { min-width: 0; }
        }
    </style>
</head>
<body>
    <div class="layout">

        <div class="topbar">
            <div class="brand-mark">
                <div class="brand-tile"><span class="material-symbols-outlined">category</span></div>
                <div>
                    <div class="brand-name">Warung Makan Mba Neni</div>
                    <h1>Kategori Menu</h1>
                    <p class="bite">Kelola kategori makanan untuk menu warung.</p>
                </div>
            </div>

            <div class="topbar-nav">
                <a href="{{ route('admin.orders.index') }}" class="nav-link"><span class="material-symbols-outlined">receipt_long</span>Pesanan</a>
                <a href="{{ route('admin.menu.index') }}" class="nav-link"><span class="material-symbols-outlined">restaurant_menu</span>Menu</a>
                <a href="{{ route('admin.menu.availability') }}" class="nav-link"><span class="material-symbols-outlined">toggle_on</span>Ketersediaan</a>
                <a href="{{ route('admin.categories.index') }}" class="nav-link active"><span class="material-symbols-outlined">category</span>Kategori</a>
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

        <div class="panel">
            <div class="panel-title"><span class="material-symbols-outlined">add_circle</span>Tambah Kategori</div>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="add-row">
                    <div class="field">
                        <label for="name">Nama Kategori</label>
                        <input id="name" name="name" placeholder="Contoh: Makanan, Minuman, Snack" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><span class="material-symbols-outlined">add</span>Tambahkan</button>
                </div>
            </form>
        </div>

        <div class="panel">
            <div class="panel-title" style="justify-content:space-between">
                <span style="display:flex;align-items:center;gap:10px"><span class="material-symbols-outlined">list</span>Daftar Kategori</span>
                <span style="font-family:'JetBrains Mono',monospace;font-size:12px;color:var(--dust)">{{ $categories->count() }} item</span>
            </div>
            @if($categories->isEmpty())
                <div class="empty">Belum ada kategori. Tambahkan kategori pertama Anda.</div>
            @else
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th style="text-align:right">Menu</th>
                                <th style="text-align:right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $cat)
                                <tr>
                                    <td>
                                        <span class="badge-cat">{{ $cat->name }}</span>
                                        <div class="slug">slug: {{ $cat->slug }}</div>
                                    </td>
                                    <td style="text-align:right"><span class="cell-count">{{ $cat->menu_items_count }} item</span></td>
                                    <td class="td-actions">
                                        <form action="{{ route('admin.categories.update', $cat) }}" method="POST" class="edit-form" onsubmit="return confirm('Perbarui kategori ini?');">
                                            @csrf
                                            @method('PUT')
                                            <input name="name" value="{{ $cat->name }}" required>
                                            <button type="submit" class="btn btn-sm btn-outline" title="Simpan">
                                                <span class="material-symbols-outlined">save</span>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST" onsubmit="return confirm('Hapus kategori &quot;{{ $cat->name }}&quot;? Menu dalam kategori ini akan ikut terhapus.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
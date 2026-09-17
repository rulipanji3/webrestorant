<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kelola Menu · Warung Makan Mba Neni</title>
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

        /* Buttons */
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

        /* Flash */
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

        /* Panel */
        .panel {
            background: var(--coal);
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 26px 28px;
            margin-bottom: 22px;
            box-shadow: 0 3px 12px rgba(35, 25, 19, 0.03);
        }
        .panel-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 22px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--line);
        }
        .panel-title .t {
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 20px;
            font-weight: 700;
            color: var(--bone);
        }
        .panel-title .t .material-symbols-outlined { font-size: 22px; color: var(--ember); }
        .panel-title .count { font-family: 'JetBrains Mono', monospace; font-size: 12px; color: var(--dust); font-weight: 600; }

        /* Form */
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 18px 20px; }
        .full { grid-column: 1/-1; }
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
        .field input, .field select, .field textarea {
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
        .field input::placeholder, .field textarea::placeholder { color: var(--dust); }
        .field input:focus, .field select:focus, .field textarea:focus {
            background: #FFFFFF;
            border-color: var(--ember);
            box-shadow: 0 0 0 3px rgba(200, 74, 34, 0.14);
        }
        .field textarea { resize: vertical; min-height: 80px; }
        .field .hint { font-size: 12px; color: var(--dust); margin-top: 5px; }
        .field .checkbox-wrap { display: flex; align-items: center; gap: 10px; padding-top: 4px; }
        .field .checkbox-wrap input[type=checkbox] { width: 19px; height: 19px; accent-color: var(--ember); cursor: pointer; }
        .field .checkbox-wrap label { margin: 0; cursor: pointer; text-transform: none; letter-spacing: 0; font-family: inherit; font-size: 14px; color: var(--bone); font-weight: 500; }
        .photo-panel {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 10px;
            padding: 10px 14px;
            background: #FAF7F2;
            border: 1px solid var(--line);
            border-radius: 12px;
        }
        .photo-panel img { width: 54px; height: 54px; border-radius: 10px; object-fit: cover; flex-shrink: 0; border: 1px solid var(--line); }
        .photo-panel span { font-size: 12.5px; color: var(--sand); }
        .form-actions { display: flex; gap: 10px; padding-top: 8px; }

        /* Search */
        .search {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 16px;
            margin-bottom: 18px;
            border-radius: 14px;
            border: 1px solid var(--line);
            background: #FAF7F2;
            transition: border-color .2s;
        }
        .search:focus-within { border-color: var(--ember); background: #FFF; }
        .search .material-symbols-outlined { color: var(--dust); }
        .search input { flex: 1; border: none; outline: none; background: transparent; color: var(--bone); font-family: inherit; font-size: 14px; }
        .search input::placeholder { color: var(--dust); }

        /* Table */
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
        .cell-menu { display: flex; align-items: center; gap: 12px; }
        .cell-menu .thumb { width: 44px; height: 44px; border-radius: 10px; object-fit: cover; background: #FAF7F2; flex-shrink: 0; border: 1px solid var(--line); }
        .cell-menu .no-thumb { width: 44px; height: 44px; border-radius: 10px; background: rgba(200, 74, 34, 0.1); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .cell-menu .no-thumb .material-symbols-outlined { font-size: 22px; color: var(--ember); }
        .cell-menu .m-name { font-weight: 700; color: var(--bone); font-size: 14px; }
        .cell-menu .m-desc { font-size: 12px; color: var(--sand); margin-top: 2px; }
        .cell-price { font-family: 'JetBrains Mono', monospace; font-weight: 700; color: var(--ember); white-space: nowrap; font-size: 14px; }
        .cell-cat { display: inline-flex; padding: 4px 10px; border-radius: 999px; background: #FAF7F2; border: 1px solid var(--line); color: var(--sand); font-size: 12px; font-weight: 600; }
        .cell-none { color: var(--dust); font-size: 13px; }
        .td-actions { display: flex; gap: 8px; justify-content: flex-end; flex-wrap: wrap; }

        .badge { display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; border-radius: 999px; font-size: 12px; font-weight: 700; white-space: nowrap; }
        .badge .dot { width: 6px; height: 6px; border-radius: 50%; background: currentColor; }
        .badge-available { background: var(--ok-bg); border: 1px solid rgba(36, 122, 56, 0.25); color: var(--ok); }
        .badge-unavailable { background: var(--danger-bg); border: 1px solid #FBD5D5; color: var(--danger); }

        .empty { padding: 56px 24px; text-align: center; color: var(--sand); }
        .empty .material-symbols-outlined { font-size: 46px; color: var(--dust); margin-bottom: 12px; }
        .empty h3 { font-family: 'Playfair Display', Georgia, serif; font-size: 19px; color: var(--bone); margin-bottom: 6px; font-weight: 700; }
        .empty p { font-size: 13.5px; color: var(--sand); }

        nav[role=navigation] { display: flex; justify-content: center; margin-top: 22px; }
        .pagination { display: flex; gap: 6px; list-style: none; flex-wrap: wrap; justify-content: center; }
        .page-item .page-link {
            display: inline-flex;
            align-items: center;
            padding: 8px 14px;
            border-radius: 999px;
            background: var(--coal);
            color: var(--sand);
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid var(--line);
            transition: .15s;
        }
        .page-item .page-link:hover { color: var(--bone); border-color: var(--ember); }
        .page-item.active .page-link { background: var(--ember); color: #FFFFFF; border-color: var(--ember); font-weight: 700; }
        .page-item.disabled .page-link { opacity: .35; pointer-events: none; }

        @media(max-width: 800px) {
            .layout { padding: 16px; }
            .topbar { flex-direction: column; align-items: flex-start; gap: 14px; }
            .topbar-nav { width: 100%; overflow-x: auto; padding-bottom: 4px; }
            h1 { font-size: 21px; }
            .form-grid { grid-template-columns: 1fr; }
            thead th, tbody td { padding: 10px 8px; }
            .td-actions { gap: 6px; }
        }
    </style>
</head>
<body>
    <div class="layout">

        <div class="topbar">
            <div class="brand-mark">
                <div class="brand-tile"><span class="material-symbols-outlined">restaurant_menu</span></div>
                <div>
                    <div class="brand-name">Warung Makan Mba Neni</div>
                    <h1>Kelola Menu</h1>
                    <p class="bite">Tambah, sunting, atau hapus daftar makanan untuk warung.</p>
                </div>
            </div>

            <div class="topbar-nav">
                <a href="{{ route('admin.orders.index') }}" class="nav-link"><span class="material-symbols-outlined">receipt_long</span>Pesanan</a>
                <a href="{{ route('admin.menu.index') }}" class="nav-link active"><span class="material-symbols-outlined">restaurant_menu</span>Menu</a>
                <a href="{{ route('admin.menu.availability') }}" class="nav-link"><span class="material-symbols-outlined">toggle_on</span>Ketersediaan</a>
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

        <div class="panel">
            <div class="panel-title">
                <div class="t">
                    <span class="material-symbols-outlined">{{ $editing ? 'edit' : 'add_circle' }}</span>
                    {{ $editing ? 'Sunting Menu' : 'Tambah Menu Baru' }}
                </div>
            </div>
            <form action="{{ $editing ? route('admin.menu.update', $editing) : route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($editing)
                    @method('PUT')
                @endif
                <div class="form-grid">
                    <div class="field">
                        <label for="name">Nama Menu</label>
                        <input id="name" name="name" value="{{ old('name', $editing->name ?? '') }}" placeholder="Contoh: Nasi Goreng Spesial" required>
                    </div>
                    <div class="field">
                        <label for="category_id">Kategori</label>
                        <select id="category_id" name="category_id">
                            <option value="">— Pilih Kategori —</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $editing->category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="price">Harga (Rp)</label>
                        <input id="price" name="price" type="number" min="0" value="{{ old('price', $editing->price ?? '') }}" placeholder="Contoh: 25000" required>
                    </div>
                    <div class="field">
                        <label for="image">Foto Menu {{ $editing && $editing->image ? '(opsional)' : '(wajib)' }}</label>
                        <input id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp" {{ $editing && $editing->image ? '' : 'required' }}>
                        <p class="hint">Maks 2MB. Format: JPG, PNG, WebP.</p>
                        <div id="image-preview-wrap" class="photo-panel" style="display:none">
                            <img id="image-preview" src="#" alt="Pratinjau foto">
                            <span>Pratinjau foto yang akan diunggah</span>
                        </div>
                        @if($editing && $editing->image)
                            <div class="photo-panel">
                                <img src="{{ $editing->imageSrc() }}" alt="{{ $editing->name }}">
                                <span>Foto saat ini — kosongkan jika tidak ingin mengganti</span>
                            </div>
                        @endif
                    </div>
                    <div class="field full">
                        <label for="description">Deskripsi</label>
                        <textarea id="description" name="description" rows="3" placeholder="Ceritakan tentang menu ini...">{{ old('description', $editing->description ?? '') }}</textarea>
                    </div>
                    <div class="field full">
                        <div class="checkbox-wrap">
                            <input type="hidden" name="is_available" value="0">
                            <input id="is_available" name="is_available" type="checkbox" value="1" {{ old('is_available', $editing->is_available ?? true) ? 'checked' : '' }}>
                            <label for="is_available">Tersedia untuk dipesan</label>
                        </div>
                    </div>
                    <div class="form-actions full">
                        <button type="submit" class="btn btn-primary">
                            <span class="material-symbols-outlined">{{ $editing ? 'save' : 'add' }}</span>
                            {{ $editing ? 'Perbarui Menu' : 'Tambahkan Menu' }}
                        </button>
                        @if($editing)
                            <a href="{{ route('admin.menu.index') }}" class="btn btn-outline">Batal</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        <div class="panel">
            <div class="panel-title">
                <div class="t"><span class="material-symbols-outlined">list</span>Daftar Menu</div>
                <span class="count">{{ method_exists($items, 'total') ? $items->total() : $items->count() }} item</span>
            </div>

            <form method="GET" action="{{ route('admin.menu.index') }}" class="search">
                <span class="material-symbols-outlined">search</span>
                <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Cari menu (nama / deskripsi)...">
                @if(request('q'))
                    <a href="{{ route('admin.menu.index') }}" title="Hapus pencarian" style="text-decoration:none;color:var(--dust);display:flex"><span class="material-symbols-outlined">close</span></a>
                @endif
                <button type="submit" class="btn btn-outline btn-sm" style="padding:6px 14px">Cari</button>
            </form>

            @if($items->isEmpty())
                <div class="empty">
                    <span class="material-symbols-outlined">restaurant</span>
                    <h3>Belum ada menu</h3>
                    <p>Tambahkan menu pertama Anda menggunakan form di atas.</p>
                </div>
            @else
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th style="text-align:right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>
                                        <div class="cell-menu">
                                            @php $img = $item->imageSrc(); @endphp
                                            @if($img)
                                                <img class="thumb" src="{{ $img }}" alt="{{ $item->name }}">
                                            @else
                                                <div class="no-thumb"><span class="material-symbols-outlined">restaurant</span></div>
                                            @endif
                                            <div>
                                                <div class="m-name">{{ $item->name }}</div>
                                                <div class="m-desc">{{ Str::limit($item->description, 50) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($item->category)
                                            <span class="cell-cat">{{ $item->category->name }}</span>
                                        @else
                                            <span class="cell-none">—</span>
                                        @endif
                                    </td>
                                    <td><span class="cell-price">Rp {{ number_format($item->price, 0, ',', '.') }}</span></td>
                                    <td>
                                        <span class="badge {{ $item->is_available ? 'badge-available' : 'badge-unavailable' }}">
                                            <span class="dot"></span>{{ $item->is_available ? 'Tersedia' : 'Habis' }}
                                        </span>
                                    </td>
                                    <td class="td-actions">
                                        <form action="{{ route('admin.menu.toggle', $item) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-outline" title="{{ $item->is_available ? 'Tandai Habis' : 'Tandai Tersedia' }}">
                                                <span class="material-symbols-outlined">{{ $item->is_available ? 'visibility_off' : 'visibility' }}</span>
                                                {{ $item->is_available ? 'Habis' : 'Tersedia' }}
                                            </button>
                                        </form>
                                        <a href="{{ route('admin.menu.edit', $item) }}" class="btn btn-sm btn-outline">
                                            <span class="material-symbols-outlined">edit</span>Edit
                                        </a>
                                        <form action="{{ route('admin.menu.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini? Tindakan ini tidak bisa dibatalkan.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <span class="material-symbols-outlined">delete</span>Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="margin-top:20px">@if(method_exists($items, 'links')){{ $items->links() }}@endif</div>
            @endif
        </div>
    </div>

    <script>
        const fileInput = document.getElementById('image');
        const previewWrap = document.getElementById('image-preview-wrap');
        const previewImg = document.getElementById('image-preview');

        @if($editing && $editing->image)
            previewImg.src = "{{ $editing->imageSrc() }}";
            previewWrap.style.display = 'flex';
        @endif

        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (!file) {
                previewWrap.style.display = 'none';
                previewImg.removeAttribute('src');
                return;
            }
            previewImg.src = URL.createObjectURL(file);
            previewWrap.style.display = 'flex';
        });
    </script>
</body>
</html>
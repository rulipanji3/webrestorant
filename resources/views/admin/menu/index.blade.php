<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kelola Menu · Warung Makan Mba Neni</title>
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
        body{
            font-family:'Manrope',ui-sans-serif,system-ui,sans-serif;
            background:
                radial-gradient(90rem 60rem at 88% -12%, rgba(240,90,19,.07), transparent 60%),
                var(--ink);
            color:var(--bone); min-height:100vh; -webkit-font-smoothing:antialiased;
        }
        img{max-width:100%;display:block}
        ::selection{background:var(--ember);color:var(--ink)}
        :focus-visible{outline:2px solid var(--ember);outline-offset:2px}

        .layout{max-width:1200px;margin:0 auto;padding:24px}

        /* Top bar */
        .topbar{
            display:flex;align-items:flex-end;justify-content:space-between;gap:20px;flex-wrap:wrap;
            padding:20px 24px;margin-bottom:20px;
            background:var(--coal-2);border:1px solid var(--line);border-radius:16px;
        }
        .brand-mark{display:flex;align-items:center;gap:14px}
        .brand-tile{
            width:46px;height:46px;flex-shrink:0;border-radius:12px;
            background:rgba(240,90,19,.12);border:1px solid rgba(240,90,19,.35);
            color:var(--ember);display:flex;align-items:center;justify-content:center;
        }
        .brand-tile .material-symbols-outlined{font-size:24px}
        .brand-name{
            font-family:'JetBrains Mono',ui-monospace,monospace;font-size:10px;letter-spacing:.2em;
            text-transform:uppercase;color:var(--ember);margin-bottom:4px;
        }
        h1{font-family:'Outfit','Manrope',sans-serif;font-size:24px;font-weight:800;letter-spacing:-.02em;color:var(--bone)}
        .bite{font-size:13px;color:var(--sand);margin-top:2px}
        .topbar-right{display:flex;gap:8px;flex-wrap:wrap}

        /* Buttons */
        .btn{
            display:inline-flex;align-items:center;justify-content:center;gap:8px;
            padding:9px 16px;border:1px solid transparent;border-radius:999px;
            font-family:inherit;font-size:13.5px;font-weight:700;cursor:pointer;text-decoration:none;
            transition:background .18s ease,border-color .18s ease,color .18s ease,transform .12s ease;
        }
        .btn .material-symbols-outlined{font-size:18px}
        .btn-primary{background:var(--ember);color:var(--ink)}
        .btn-primary:hover{background:var(--ember-600)}
        .btn-outline{background:transparent;border-color:var(--line);color:var(--bone)}
        .btn-outline:hover{border-color:rgba(240,90,19,.55);background:var(--coal-3)}
        .btn-danger{background:var(--danger-bg);color:#F4D6CF}
        .btn-danger:hover{background:#7A2B20}
        .btn:active{transform:scale(.98)}
        .btn-sm{padding:7px 13px;font-size:13px}

        /* Flash */
        .flash{
            display:flex;align-items:center;gap:10px;margin-bottom:20px;padding:13px 16px;border-radius:12px;
            background:rgba(123,195,166,.1);border:1px solid rgba(123,195,166,.32);
            color:var(--ok);font-size:14px;font-weight:600;
        }

        /* Panel */
        .panel{background:var(--coal-2);border:1px solid var(--line);border-radius:16px;padding:24px;margin-bottom:20px}
        .panel-title{
            display:flex;align-items:center;justify-content:space-between;gap:12px;
            margin-bottom:20px;padding-bottom:16px;border-bottom:1px solid var(--line);
        }
        .panel-title .t{display:flex;align-items:center;gap:10px;font-family:'Outfit','Manrope',sans-serif;font-size:17px;font-weight:700;color:var(--bone)}
        .panel-title .t .material-symbols-outlined{font-size:20px;color:var(--ember)}
        .panel-title .count{font-family:'JetBrains Mono',monospace;font-size:12px;color:var(--dust)}

        /* Form */
        .form-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px 20px}
        .full{grid-column:1/-1}
        .field label{
            display:block;margin-bottom:7px;
            font-family:'JetBrains Mono',ui-monospace,monospace;font-size:10.5px;letter-spacing:.16em;text-transform:uppercase;
            color:var(--salient);
        }
        .field input,.field select,.field textarea{
            width:100%;padding:12px 14px;border:1px solid var(--line);border-radius:12px;
            background:var(--ink);color:var(--bone);font-family:inherit;font-size:14px;
            outline:none;transition:border-color .18s ease,box-shadow .18s ease;
        }
        .field input::placeholder,.field textarea::placeholder{color:#97897a}
        .field input:focus,.field select:focus,.field textarea:focus{border-color:var(--ember);box-shadow:0 0 0 3px rgba(240,90,19,.18)}
        .field textarea{resize:vertical;min-height:80px}
        .field .hint{font-size:12px;color:var(--dust);margin-top:5px}
        .field .checkbox-wrap{display:flex;align-items:center;gap:10px;padding-top:4px}
        .field .checkbox-wrap input[type=checkbox]{width:19px;height:19px;accent-color:var(--ember);cursor:pointer}
        .field .checkbox-wrap label{margin:0;cursor:pointer;text-transform:none;letter-spacing:0;font-family:inherit;font-size:14px;color:var(--bone)}
        .photo-panel{
            display:flex;align-items:center;gap:12px;margin-top:10px;padding:10px 14px;
            background:var(--coal);border:1px solid var(--line);border-radius:12px;
        }
        .photo-panel img{width:54px;height:54px;border-radius:8px;object-fit:cover;flex-shrink:0}
        .photo-panel span{font-size:12.5px;color:var(--sand)}
        .form-actions{display:flex;gap:10px;padding-top:6px}

        /* Search */
        .search{display:flex;align-items:center;gap:10px;padding:11px 14px;margin-bottom:16px;border-radius:12px;border:1px solid var(--line);background:var(--coal)}
        .search .material-symbols-outlined{color:var(--dust)}
        .search input{flex:1;border:none;outline:none;background:transparent;color:var(--bone);font-family:inherit;font-size:14px}
        .search input::placeholder{color:#97897a}

        /* Table */
        .table-wrap{overflow-x:auto}
        table{width:100%;border-collapse:collapse;font-size:14px}
        thead th{
            text-align:left;padding:10px 10px;white-space:nowrap;
            font-family:'JetBrains Mono',ui-monospace,monospace;font-size:10.5px;letter-spacing:.16em;text-transform:uppercase;
            color:var(--dust);border-bottom:1px solid var(--line);
        }
        tbody td{padding:13px 10px;border-bottom:1px solid var(--line);vertical-align:middle}
        tbody tr{transition:background .15s}
        tbody tr:hover{background:var(--coal)}
        .cell-menu{display:flex;align-items:center;gap:12px}
        .cell-menu .thumb{width:40px;height:40px;border-radius:10px;object-fit:cover;background:var(--coal-3);flex-shrink:0}
        .cell-menu .no-thumb{width:40px;height:40px;border-radius:10px;background:rgba(240,90,19,.12);display:flex;align-items:center;justify-content:center;flex-shrink:0}
        .cell-menu .no-thumb .material-symbols-outlined{font-size:20px;color:var(--ember)}
        .cell-menu .m-name{font-weight:700;color:var(--bone);font-size:14px}
        .cell-menu .m-desc{font-size:12px;color:var(--sand);margin-top:2px}
        .cell-price{font-family:'JetBrains Mono',monospace;font-weight:700;color:var(--ember);white-space:nowrap}
        .cell-cat{display:inline-flex;padding:4px 10px;border-radius:999px;background:var(--coal-3);border:1px solid var(--line);color:var(--sand);font-size:12px;font-weight:600}
        .cell-none{color:var(--dust);font-size:13px}
        .td-actions{display:flex;gap:8px;justify-content:flex-end;flex-wrap:wrap}

        .badge{display:inline-flex;align-items:center;gap:6px;padding:4px 12px;border-radius:999px;font-size:12px;font-weight:700;white-space:nowrap}
        .badge .dot{width:6px;height:6px;border-radius:50%;background:currentColor}
        .badge-available{background:rgba(123,195,166,.12);border:1px solid rgba(123,195,166,.32);color:var(--ok)}
        .badge-unavailable{background:rgba(232,154,135,.12);border:1px solid rgba(232,154,135,.3);color:var(--danger)}

        .empty{padding:56px 24px;text-align:center;color:var(--sand)}
        .empty .material-symbols-outlined{font-size:46px;color:var(--dust);margin-bottom:12px}
        .empty h3{font-size:17px;color:var(--salient);margin-bottom:6px;font-weight:700}
        .empty p{font-size:13.5px}

        nav[role=navigation]{display:flex;justify-content:center;margin-top:22px}
        .pagination{display:flex;gap:6px;list-style:none;flex-wrap:wrap;justify-content:center}
        .page-item .page-link{
            display:inline-flex;align-items:center;padding:8px 14px;border-radius:999px;
            background:transparent;color:var(--sand);font-size:13px;font-weight:600;text-decoration:none;
            border:1px solid var(--line);transition:.15s;
        }
        .page-item .page-link:hover{color:var(--bone);border-color:rgba(240,90,19,.5)}
        .page-item.active .page-link{background:var(--ember);color:var(--ink);border-color:var(--ember);font-weight:700}
        .page-item.disabled .page-link{opacity:.35;pointer-events:none}

        @media(max-width:800px){
            .layout{padding:16px}
            .topbar{align-items:flex-start}
            h1{font-size:21px}
            .form-grid{grid-template-columns:1fr}
            thead th,tbody td{padding:10px 8px}
            .td-actions{gap:6px}
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
            <div class="topbar-right">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline"><span class="material-symbols-outlined">category</span>Kategori</a>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline"><span class="material-symbols-outlined">event_available</span>Booking</a>
                <a href="{{ route('admin.menu.availability') }}" class="btn btn-outline"><span class="material-symbols-outlined">toggle_on</span>Ketersediaan</a>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-outline"><span class="material-symbols-outlined">receipt_long</span>Pesanan</a>
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
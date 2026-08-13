<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kategori · Warung Makan Mba Neni</title>
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
        ::selection{background:var(--ember);color:var(--ink)}
        :focus-visible{outline:2px solid var(--ember);outline-offset:2px}
        .layout{max-width:760px;margin:0 auto;padding:24px}
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
        .btn-primary{background:var(--ember);color:var(--ink)}
        .btn-primary:hover{background:var(--ember-600)}
        .btn-outline{background:transparent;border-color:var(--line);color:var(--bone)}
        .btn-outline:hover{border-color:rgba(240,90,19,.55);background:var(--coal-3)}
        .btn-danger{background:var(--danger-bg);color:#F4D6CF}
        .btn-danger:hover{background:#7A2B20}
        .btn:active{transform:scale(.98)}
        .btn-sm{padding:7px 13px;font-size:13px}
        .flash{display:flex;align-items:center;gap:10px;margin-bottom:20px;padding:13px 16px;border-radius:12px;background:rgba(123,195,166,.1);border:1px solid rgba(123,195,166,.32);color:var(--ok);font-size:14px;font-weight:600}
        .panel{background:var(--coal-2);border:1px solid var(--line);border-radius:16px;padding:24px;margin-bottom:20px}
        .panel-title{display:flex;align-items:center;gap:10px;margin-bottom:18px;padding-bottom:14px;border-bottom:1px solid var(--line);font-family:'Outfit','Manrope',sans-serif;font-size:17px;font-weight:700;color:var(--bone)}
        .panel-title .material-symbols-outlined{font-size:20px;color:var(--ember)}
        .field label{display:block;margin-bottom:7px;font-family:'JetBrains Mono',ui-monospace,monospace;font-size:10.5px;letter-spacing:.16em;text-transform:uppercase;color:var(--salient)}
        .field input{width:100%;padding:12px 14px;border:1px solid var(--line);border-radius:12px;background:var(--ink);color:var(--bone);font-family:inherit;font-size:14px;outline:none;transition:border-color .18s ease,box-shadow .18s ease}
        .field input::placeholder{color:#97897a}
        .field input:focus{border-color:var(--ember);box-shadow:0 0 0 3px rgba(240,90,19,.18)}
        .add-row{display:flex;gap:12px;align-items:flex-end;flex-wrap:wrap}
        .add-row .field{flex:1;min-width:240px}
        .table-wrap{overflow-x:auto}
        table{width:100%;border-collapse:collapse;font-size:14px}
        thead th{text-align:left;padding:10px;white-space:nowrap;font-family:'JetBrains Mono',ui-monospace,monospace;font-size:10.5px;letter-spacing:.16em;text-transform:uppercase;color:var(--dust);border-bottom:1px solid var(--line)}
        tbody td{padding:13px 10px;border-bottom:1px solid var(--line);vertical-align:middle}
        tbody tr{transition:background .15s}
        tbody tr:hover{background:var(--coal)}
        .badge-cat{display:inline-flex;padding:4px 12px;border-radius:999px;background:var(--coal-3);border:1px solid var(--line);color:var(--sand);font-size:12px;font-weight:600}
        .slug{font-family:'JetBrains Mono',monospace;font-size:11.5px;color:var(--dust);margin-top:4px}
        .cell-count{font-family:'JetBrains Mono',monospace;font-size:13px;color:var(--sand);white-space:nowrap}
        .edit-form{display:flex;gap:8px;align-items:center}
        .edit-form input{flex:1;min-width:120px;padding:8px 12px;border:1px solid var(--line);border-radius:10px;background:var(--ink);color:var(--bone);font-family:inherit;font-size:13px;outline:none;transition:border-color .18s ease}
        .edit-form input:focus{border-color:var(--ember)}
        .td-actions{display:flex;gap:8px;justify-content:flex-end;flex-wrap:wrap;align-items:center}
        .empty{padding:44px 24px;text-align:center;color:var(--sand);font-size:14px}
        @media(max-width:600px){.layout{padding:16px}.topbar{align-items:flex-start}h1{font-size:21px}.add-row{flex-direction:column;align-items:stretch}.add-row .field{min-width:0}}
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
            <div class="topbar-right">
                <a href="{{ route('admin.menu.index') }}" class="btn btn-outline"><span class="material-symbols-outlined">restaurant_menu</span>Kelola Menu</a>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-outline"><span class="material-symbols-outlined">receipt_long</span>Lihat Pesanan</a>
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
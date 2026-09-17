<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin · Warung Makan Mba Neni</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:600,700,800|plus-jakarta-sans:400,500,600,700,800|jetbrains-mono:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        :root {
            --ink: #FAF7F2;
            --coal: #FFFFFF;
            --coal-2: #FFFFFF;
            --coal-3: #F5EFE6;
            --line: #E8DED1;
            --bone: #231913;
            --sand: #63554A;
            --salient: #4A3E34;
            --dust: #9A897B;
            --ember: #C84A22;
            --ember-600: #A33A18;
            --fail: #9B1C1C;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        html { color-scheme: light; }

        body {
            font-family: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif;
            background:
                radial-gradient(80rem 50rem at 85% -10%, rgba(200, 74, 34, 0.05), transparent 60%),
                radial-gradient(60rem 40rem at 10% 110%, rgba(245, 158, 11, 0.05), transparent 50%),
                var(--ink);
            min-height: 100dvh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            color: var(--bone);
            -webkit-font-smoothing: antialiased;
        }

        ::selection { background: var(--ember); color: #FFFFFF; }

        :focus-visible { outline: 2px solid var(--ember); outline-offset: 2px; }

        .wrap { width: 100%; }

        .card {
            width: 100%;
            max-width: 420px;
            margin: 0 auto;
            background: var(--coal);
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 40px 32px 30px;
            box-shadow: 0 20px 45px -12px rgba(35, 25, 19, 0.08);
        }

        .brand-mark { text-align: center; }

        .brand-tile {
            width: 58px;
            height: 58px;
            margin: 0 auto 16px;
            border-radius: 14px;
            background: rgba(200, 74, 34, 0.10);
            border: 1px solid rgba(200, 74, 34, 0.25);
            color: var(--ember);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-tile .material-symbols-outlined { font-size: 30px; }

        .eyebrow {
            font-family: 'JetBrains Mono', ui-monospace, monospace;
            font-size: 11px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--ember);
            margin-bottom: 6px;
            font-weight: 700;
        }

        h1 {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: var(--bone);
            margin-bottom: 6px;
        }

        .sub {
            font-size: 13.5px;
            line-height: 1.55;
            color: var(--sand);
            margin-bottom: 24px;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0 auto 20px;
        }

        .divider::before,
        .divider::after {
            content: "";
            height: 1px;
            flex: 1;
            background: var(--line);
        }

        .divider span {
            font-family: 'JetBrains Mono', ui-monospace, monospace;
            font-size: 10px;
            letter-spacing: 0.18em;
            color: var(--dust);
        }

        .field { margin-bottom: 18px; }

        .field label {
            display: block;
            margin-bottom: 7px;
            font-family: 'JetBrains Mono', ui-monospace, monospace;
            font-size: 10.5px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--salient);
            font-weight: 700;
        }

        .input-row { position: relative; }

        .field input {
            width: 100%;
            background: #FAF7F2;
            border: 1px solid var(--line);
            color: var(--bone);
            font-family: inherit;
            font-size: 14px;
            padding: 12px 14px;
            border-radius: 12px;
            outline: none;
            transition: border-color .18s ease, box-shadow .18s ease, background .18s ease;
        }

        .field input::placeholder { color: #9A897B; }

        .field input:focus {
            background: #FFFFFF;
            border-color: var(--ember);
            box-shadow: 0 0 0 3px rgba(200, 74, 34, 0.14);
        }

        .eye {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            background: none;
            border: none;
            padding: 2px;
            color: var(--dust);
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: color .18s ease;
        }

        .eye:hover { color: var(--bone); }

        .eye .material-symbols-outlined { font-size: 20px; }

        .error {
            margin: 4px 0 18px;
            padding: 12px 14px;
            border-radius: 12px;
            background: #FDE8E8;
            border: 1px solid #FBD5D5;
            color: var(--fail);
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .error .material-symbols-outlined { font-size: 18px; }

        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            margin-top: 6px;
            padding: 13px 16px;
            border: none;
            border-radius: 999px;
            background: var(--ember);
            color: #FFFFFF;
            font-family: 'JetBrains Mono', ui-monospace, monospace;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            cursor: pointer;
            transition: background .18s ease, transform .12s ease, box-shadow .18s ease;
            box-shadow: 0 8px 20px -6px rgba(200, 74, 34, 0.4);
        }

        .btn:hover { background: var(--ember-600); transform: translateY(-1px); }

        .btn:active { transform: scale(0.98); }

        .foot {
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .foot .clock {
            font-family: 'JetBrains Mono', ui-monospace, monospace;
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #247A38;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
        }

        .foot .clock::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #247A38;
        }

        .back {
            font-size: 13px;
            font-weight: 600;
            color: var(--sand);
            text-decoration: none;
            transition: color .18s ease;
        }

        .back:hover { color: var(--ember); }

        .card.enter { animation: rise .6s cubic-bezier(.16, 1, .3, 1) both; }

        @keyframes rise {
            from { opacity: 0; transform: translateY(14px) scale(0.99) }
            to   { opacity: 1; transform: none }
        }

        @media (prefers-reduced-motion: reduce) {
            .card.enter { animation: none; }
        }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="card enter">
            <div class="brand-mark">
                <div class="brand-tile">
                    <span class="material-symbols-outlined">restaurant_menu</span>
                </div>
                <p class="eyebrow">Warung Makan Mba Neni</p>
                <h1>Login Admin</h1>
                <p class="sub">Masuk untuk mengelola menu &amp; pesanan.</p>
            </div>

            @if($errors->any())
                <div class="error">
                    <span class="material-symbols-outlined">error</span>
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="field">
                    <label for="username">Username</label>
                    <input id="username" name="username" value="{{ old('username') }}" autocomplete="username" placeholder="Nama pengguna" required autofocus>
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <div class="input-row">
                        <input id="password" name="password" type="password" autocomplete="current-password" placeholder="••••••••" required>
                        <button type="button" class="eye" onclick="togglePass(this)" aria-label="Tampilkan kata sandi">
                            <span class="material-symbols-outlined">visibility</span>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn">Masuk</button>
            </form>

            <div class="foot">
                <span class="clock">Buka 24 jam</span>
                <a class="back" href="/">Kembali ke situs</a>
            </div>
        </div>
    </div>

    <script>
        function togglePass(btn) {
            const row = btn.closest('.input-row');
            const input = row.querySelector('input');
            const icon = btn.querySelector('.material-symbols-outlined');
            const show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            icon.textContent = show ? 'visibility_off' : 'visibility';
            btn.setAttribute('aria-label', show ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
        }
    </script>
</body>
</html>
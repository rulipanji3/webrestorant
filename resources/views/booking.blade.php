<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking | Warung Makan Mba Neni</title>
    <meta name="description" content="Reservasi meja di Warung Makan Mba Neni, Purwokerto. Buka 24 jam, konfirmasi cepat via WhatsApp.">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manrope:500,600,700|outfit:600,700,800|jetbrains-mono:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    @vite(['resources/css/booking.css', 'resources/js/booking.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="whatsapp-number" content="{{ env('WHATSAPP_NUMBER', '6285810405551') }}">
</head>
<body class="selection:bg-ember selection:text-ink">
<header id="site-header" class="fixed inset-x-0 top-0 z-50 border-b border-line/60 bg-ink/80 backdrop-blur-md">
    <nav class="mx-auto flex h-16 w-full max-w-[1400px] items-center justify-between px-4 md:px-8">
        <a href="/warung-makan-mba-neni" class="flex items-center gap-2.5">
            <span class="flex h-9 w-9 items-center justify-center rounded-full border border-ember/40 bg-coal-3">
                <span class="material-symbols-outlined text-ember" style="font-size:19px">restaurant</span>
            </span>
            <span class="font-display text-lg font-bold tracking-tight text-bone">Mba <span class="text-ember">Neni</span></span>
        </a>
        <div class="flex items-center gap-4">
            <a href="/order" class="font-mono text-[12px] uppercase tracking-[0.16em] text-sand transition-colors hover:text-bone">Order</a>
            <a href="/order" class="btn-ember px-5! py-2.5! hidden sm:inline-flex">
                <span class="material-symbols-outlined" style="font-size:18px">shopping_cart</span>
                Pesan
            </a>
        </div>
    </nav>
</header>

<main class="pt-16">
    <!-- Page header -->
    <section class="relative overflow-hidden border-b border-line bg-coal">
        <div class="pointer-events-none absolute -right-28 -top-28 h-72 w-72 rounded-full bg-ember/10 blur-3xl"></div>
        <div class="mx-auto w-full max-w-[1400px] px-4 py-14 md:px-8 md:py-20">
            <p class="eyebrow">Booking</p>
            <h1 class="mt-4 font-display text-4xl font-extrabold tracking-tight text-bone md:text-5xl">Reservasi Meja</h1>
            <p class="mt-4 max-w-xl text-sand">Pesan meja untuk dine-in bersama keluarga, teman, atau rekan kerja.</p>
        </div>
    </section>

    <!-- Booking form -->
    <section class="py-14 md:py-20">
        <div class="mx-auto w-full max-w-3xl px-4 md:px-8">
            <div class="panel p-6 md:p-10">
                <form id="booking-form" class="space-y-6">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label for="name" class="field-label">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required placeholder="Masukkan nama Anda" class="field">
                        </div>
                        <div>
                            <label for="phone" class="field-label">Nomor WhatsApp</label>
                            <input type="tel" id="phone" name="phone" required placeholder="08xxx" class="field">
                        </div>
                        <div>
                            <label for="date" class="field-label">Tanggal</label>
                            <input type="date" id="date" name="date" required class="field [color-scheme:dark]">
                        </div>
                        <div>
                            <label for="time" class="field-label">Jam</label>
                            <input type="time" id="time" name="time" required class="field [color-scheme:dark]">
                        </div>
                        <div>
                            <label for="guests" class="field-label">Jumlah Tamu</label>
                            <select id="guests" name="guests" required class="field">
                                <option value="">Pilih jumlah</option>
                                @for($i = 1; $i <= 20; $i++)
                                    <option value="{{ $i }}">{{ $i }} orang</option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label for="table" class="field-label">Tipe Meja</label>
                            <select id="table" name="table" class="field">
                                <option value="">Pilih (opsional)</option>
                                <option value="indoor">Indoor</option>
                                <option value="outdoor">Outdoor</option>
                                <option value="vip">VIP</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="notes" class="field-label">Catatan Tambahan</label>
                        <textarea id="notes" name="notes" rows="3" placeholder="Misal: ada alergi makanan, permintaan khusus, dll." class="field resize-none"></textarea>
                    </div>
                    <button type="submit" class="btn-ember w-full py-4!">
                        <span class="material-symbols-outlined" style="font-size:18px">event_seat</span>
                        Pesan Meja via WhatsApp
                    </button>
                </form>
            </div>

            <div class="mt-8 grid grid-cols-1 gap-3 sm:grid-cols-3">
                <div class="panel flex flex-col items-center gap-3 p-6 text-center">
                    <span class="material-symbols-outlined text-ember" style="font-size:28px;font-variation-settings:'FILL' 1">schedule</span>
                    <div>
                        <div class="font-display text-sm font-bold text-bone">Open 24 Jam</div>
                        <div class="mt-1 font-mono text-[10px] uppercase tracking-[0.16em] text-dust">Setiap hari</div>
                    </div>
                </div>
                <div class="panel flex flex-col items-center gap-3 p-6 text-center">
                    <span class="material-symbols-outlined text-ember" style="font-size:28px;font-variation-settings:'FILL' 1">group</span>
                    <div>
                        <div class="font-display text-sm font-bold text-bone">Kapasitas</div>
                        <div class="mt-1 font-mono text-[10px] uppercase tracking-[0.16em] text-dust">40+ orang</div>
                    </div>
                </div>
                <div class="panel flex flex-col items-center gap-3 p-6 text-center">
                    <span class="material-symbols-outlined text-ember" style="font-size:28px;font-variation-settings:'FILL' 1">call</span>
                    <div>
                        <div class="font-display text-sm font-bold text-bone">Konfirmasi Cepat</div>
                        <div class="mt-1 font-mono text-[10px] uppercase tracking-[0.16em] text-dust">Via WhatsApp</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Location -->
    <section class="border-t border-line bg-coal py-14 md:py-20">
        <div class="mx-auto grid w-full max-w-[1400px] items-center gap-10 px-4 md:px-8 lg:grid-cols-2 lg:gap-16">
            <div>
                <p class="eyebrow">Lokasi</p>
                <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-bone">Lokasi Kami</h2>
                <div class="mt-8 space-y-5">
                    <div class="flex items-start gap-4 border-t border-line pt-5">
                        <span class="material-symbols-outlined text-ember">location_on</span>
                        <div>
                            <div class="text-sm font-semibold text-bone">Address</div>
                            <p class="mt-1 text-sm text-sand">Pakembaran, Bancarkembar, Kec. Purwokerto Utara, Kabupaten Banyumas, Jawa Tengah 53121</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="https://www.google.com/maps/place/Warung+Makan+Mba+Neni/@-7.4088448,109.2386816,14z/data=!4m6!3m5!1s0x2e655fc39aaf7b49:0x41838457cd506e5e!8m2!3d-7.4084519!4d109.238324!16s%2Fg%2F11c6f6fyc_" target="_blank" rel="noopener noreferrer" class="btn-ghost">
                        <span class="material-symbols-outlined" style="font-size:18px">directions</span> Google Maps
                    </a>
                </div>
            </div>
            <div class="overflow-hidden rounded-2xl border border-line bg-ink">
                <iframe class="aspect-video w-full grayscale-[0.35]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15822.436821488314!2d109.2386816!3d-7.4088448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!8m2!1i40!1i30!2m3!1f0!2f0!3f0!3m3!1m2!1s0x2e655fc39a18a32f%3A0x41838457cd506e5e!2sWarung%20Makan%20Mba%20Neni" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Peta Lokasi Warung Makan Mba Neni"></iframe>
            </div>
        </div>
    </section>
</main>

<footer class="border-t border-line py-8">
    <div class="mx-auto flex w-full max-w-[1400px] flex-col items-center justify-between gap-3 px-4 md:flex-row md:px-8">
        <p class="font-mono text-[11px] uppercase tracking-[0.14em] text-dust">&copy; {{ date('Y') }} Warung Makan Mba Neni.</p>
        <a href="/warung-makan-mba-neni" class="font-mono text-[11px] uppercase tracking-[0.14em] text-sand transition-colors hover:text-ember">Kembali ke Beranda →</a>
    </div>
</footer>

<!-- Toast -->
<div id="site-toast" class="fixed inset-x-0 bottom-6 z-[70] hidden justify-center px-4">
    <div class="mx-auto flex w-max max-w-full items-center gap-3 rounded-full border border-line bg-coal-3/95 py-2.5 pl-5 pr-2.5 shadow-xl backdrop-blur">
        <p id="site-toast-text" class="text-sm text-bone"></p>
        <button id="site-toast-close" class="text-sand transition-colors hover:text-bone" aria-label="Tutup">
            <span class="material-symbols-outlined" style="font-size:18px">close</span>
        </button>
    </div>
</div>

</body>
</html>
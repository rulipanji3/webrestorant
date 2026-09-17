<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Meja | Warung Makan Mba Neni</title>
    <meta name="description" content="Reservasi meja di Warung Makan Mba Neni, Purwokerto. Buka 24 jam, konfirmasi cepat via WhatsApp.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    @vite(['resources/css/booking.css', 'resources/js/booking.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="whatsapp-number" content="{{ env('WHATSAPP_NUMBER', '6285810405551') }}">
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
            <a href="/order" class="btn-ember py-2.5! px-5! text-xs uppercase tracking-wider hidden sm:inline-flex">
                <span class="material-symbols-outlined" style="font-size:18px">shopping_cart</span>
                Pesan
            </a>
        </div>
    </nav>
</header>

<main class="pt-18">
    <!-- Page header -->
    <section class="relative overflow-hidden border-b border-line bg-white shadow-xs">
        <div class="pointer-events-none absolute -right-28 -top-28 h-72 w-72 rounded-full bg-ember/10 blur-3xl"></div>
        <div class="mx-auto w-full max-w-[1400px] px-4 py-12 md:px-8 md:py-16">
            <span class="inline-flex items-center gap-1.5 rounded-full bg-ember/10 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-ember">
                <span class="material-symbols-outlined text-sm">event_seat</span> Booking Meja
            </span>
            <h1 class="mt-3 font-display text-4xl font-extrabold tracking-tight text-bone md:text-5xl">Reservasi Meja</h1>
            <p class="mt-3 max-w-xl text-sand text-base">Pesan meja untuk santap bersama keluarga, teman, atau kawan kerja. Buka 24 jam nonstop dengan konfirmasi cepat via WhatsApp.</p>
        </div>
    </section>

    <!-- Booking form -->
    <section class="py-14 md:py-20 bg-[#FAF7F2]">
        <div class="mx-auto w-full max-w-3xl px-4 md:px-8">
            <div class="rounded-3xl border border-line bg-white p-6 md:p-10 shadow-md">
                <form id="booking-form" class="space-y-6">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label for="name" class="field-label">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required placeholder="Contoh: Budi Santoso" class="field">
                        </div>
                        <div>
                            <label for="phone" class="field-label">Nomor WhatsApp</label>
                            <input type="tel" id="phone" name="phone" required placeholder="08xxxxxxxxxx" class="field">
                        </div>
                        <div>
                            <label for="date" class="field-label">Tanggal Reservasi</label>
                            <input type="date" id="date" name="date" required class="field">
                        </div>
                        <div>
                            <label for="time" class="field-label">Jam Kedatangan</label>
                            <input type="time" id="time" name="time" required class="field">
                        </div>
                        <div>
                            <label for="guests" class="field-label">Jumlah Tamu</label>
                            <select id="guests" name="guests" required class="field">
                                <option value="">Pilih jumlah orang</option>
                                @for($i = 1; $i <= 20; $i++)
                                    <option value="{{ $i }}">{{ $i }} Orang</option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label for="table" class="field-label">Tipe Meja (Pilihan)</label>
                            <select id="table" name="table" class="field">
                                <option value="">Pilih area (opsional)</option>
                                <option value="indoor">Indoor (Bebas Asap Rokok)</option>
                                <option value="outdoor">Outdoor (Santai &amp; Terbuka)</option>
                                <option value="vip">VIP / Rombongan Besar</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="notes" class="field-label">Catatan Tambahan</label>
                        <textarea id="notes" name="notes" rows="3" placeholder="Misal: ada request khusus, kursi anak (baby chair), dll." class="field resize-none"></textarea>
                    </div>
                    <button type="submit" class="btn-ember w-full py-4! text-sm uppercase tracking-wider cursor-pointer">
                        <span class="material-symbols-outlined" style="font-size:20px">event_seat</span>
                        Pesan Meja via WhatsApp
                    </button>
                </form>
            </div>

            <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div class="rounded-2xl border border-line bg-white flex flex-col items-center gap-3 p-6 text-center shadow-2xs">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-herb-soft text-herb">
                        <span class="material-symbols-outlined" style="font-size:24px;font-variation-settings:'FILL' 1">schedule</span>
                    </div>
                    <div>
                        <div class="font-display text-sm font-bold text-bone">Buka 24 Jam</div>
                        <div class="mt-1 font-mono text-[10px] uppercase tracking-[0.16em] text-sand font-semibold">Siap Kapan Saja</div>
                    </div>
                </div>
                <div class="rounded-2xl border border-line bg-white flex flex-col items-center gap-3 p-6 text-center shadow-2xs">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-500/15 text-amber-600">
                        <span class="material-symbols-outlined" style="font-size:24px;font-variation-settings:'FILL' 1">group</span>
                    </div>
                    <div>
                        <div class="font-display text-sm font-bold text-bone">Kapasitas Luas</div>
                        <div class="mt-1 font-mono text-[10px] uppercase tracking-[0.16em] text-sand font-semibold">40+ Tamu Duduk</div>
                    </div>
                </div>
                <div class="rounded-2xl border border-line bg-white flex flex-col items-center gap-3 p-6 text-center shadow-2xs">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-ember/15 text-ember">
                        <span class="material-symbols-outlined" style="font-size:24px;font-variation-settings:'FILL' 1">chat</span>
                    </div>
                    <div>
                        <div class="font-display text-sm font-bold text-bone">Konfirmasi Cepat</div>
                        <div class="mt-1 font-mono text-[10px] uppercase tracking-[0.16em] text-sand font-semibold">Respon WhatsApp</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Location -->
    <section class="border-t border-line bg-white py-14 md:py-20">
        <div class="mx-auto grid w-full max-w-[1400px] items-center gap-10 px-4 md:px-8 lg:grid-cols-2 lg:gap-16">
            <div>
                <span class="inline-flex items-center gap-1.5 rounded-full bg-ember/10 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-ember">
                    <span class="material-symbols-outlined text-sm">pin_drop</span> Lokasi
                </span>
                <h2 class="mt-3 font-display text-3xl font-extrabold tracking-tight text-bone">Lokasi Warung</h2>
                <div class="mt-8 space-y-4">
                    <div class="flex items-start gap-4 rounded-2xl p-4 bg-[#FAF7F2] border border-line/70">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-ember/10 text-ember">
                            <span class="material-symbols-outlined text-xl">location_on</span>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-bone">Alamat Lengkap</div>
                            <p class="mt-1 text-sm text-sand">Pakembaran, Bancarkembar, Kec. Purwokerto Utara, Kabupaten Banyumas, Jawa Tengah 53121</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="https://www.google.com/maps/place/Warung+Makan+Mba+Neni/@-7.4088448,109.2386816,14z/data=!4m6!3m5!1s0x2e655fc39aaf7b49:0x41838457cd506e5e!8m2!3d-7.4084519!4d109.238324!16s%2Fg%2F11c6f6fyc_" target="_blank" rel="noopener noreferrer" class="btn-ember">
                        <span class="material-symbols-outlined" style="font-size:18px">directions</span> Buka di Google Maps
                    </a>
                </div>
            </div>
            <div class="overflow-hidden rounded-3xl border border-line bg-white shadow-lg">
                <iframe class="aspect-video w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15822.436821488314!2d109.2386816!3d-7.4088448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655fc39a18a32f%3A0x41838457cd506e5e!2sWarung%20Makan%20Mba%20Neni" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Peta Lokasi Warung Makan Mba Neni"></iframe>
            </div>
        </div>
    </section>
</main>

<footer class="border-t border-[#382319] bg-[#221610] text-stone-300 py-8">
    <div class="mx-auto flex w-full max-w-[1400px] flex-col items-center justify-between gap-4 px-4 md:flex-row md:px-8">
        <p class="font-mono text-[11px] uppercase tracking-[0.14em] text-stone-400">&copy; {{ date('Y') }} Warung Makan Mba Neni.</p>
        <a href="/warung-makan-mba-neni" class="font-mono text-[11px] uppercase tracking-[0.14em] text-amber-400 font-semibold transition-colors hover:text-white">← Kembali ke Beranda</a>
    </div>
</footer>

<!-- Toast -->
<div id="site-toast" class="fixed inset-x-0 bottom-6 z-[70] hidden justify-center px-4">
    <div class="mx-auto flex w-max max-w-full items-center gap-3 rounded-full border border-line bg-white/95 py-2.5 pl-5 pr-3 shadow-xl backdrop-blur-xs">
        <p id="site-toast-text" class="text-sm font-medium text-bone"></p>
        <button id="site-toast-close" class="text-sand hover:text-bone transition-colors cursor-pointer" aria-label="Tutup">
            <span class="material-symbols-outlined" style="font-size:18px">close</span>
        </button>
    </div>
</div>

</body>
</html>
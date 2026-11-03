# 🍲 Warung Makan Mba Neni — Web Application

> Sistem Web Pemesanan Makanan Online, Reservasi Meja, dan Manajemen Warung Makan Berbasis **Laravel 13**, **Tailwind CSS**, dan **SQLite**.

---

## 📸 Screenshots Showcase

### 1. Halaman Publik (Customer Facing)

| Landing Page (Beranda) | Menu & Pemesanan Online |
|:---:|:---:|
| ![Landing Page](screenshots/01-landing-page.png) | ![Pesan Online](screenshots/02-menu-order.png) |

| Reservasi Meja (Booking) | Login Admin Portal |
|:---:|:---:|
| ![Reservasi Meja](screenshots/03-table-booking.png) | ![Login Admin](screenshots/04-admin-login.png) |

---

### 2. Panel Admin (Management Dashboard)

| Manajemen Pesanan (Orders) | Kelola Menu & Produk |
|:---:|:---:|
| ![Pesanan Masuk](screenshots/05-admin-orders.png) | ![Kelola Menu](screenshots/06-admin-menu.png) |

| Pengaturan Ketersediaan (Stok Menu) | Manajemen Booking Meja |
|:---:|:---:|
| ![Ketersediaan Menu](screenshots/07-admin-availability.png) | ![Daftar Booking](screenshots/08-admin-bookings.png) |

| Kelola Kategori Menu |
|:---:|
| ![Kategori Menu](screenshots/09-admin-categories.png) |

---

## ✨ Fitur Utama

- 🏮 **Desain Estetika Kuliner Nusantara (Warm Culinary Aesthetic):**
  - Tema hangat berbasis nuansa krem (*cream/parchment*), oranye bata (*terracotta*), dan aksen hijau rempah.
  - Tipografi elegan kombinasi *Playfair Display*, *Plus Jakarta Sans*, dan *JetBrains Mono*.
- 🛒 **Pemesanan Makanan Online:**
  - Keranjang belanja interaktif realtime.
  - Pilihan layanan: Dine-in (Makan di Tempat), Takeaway (Bungkus), dan Delivery (Antar).
  - Integrasi nomor WhatsApp dan kode referensi unik pesanan.
- 📅 **Reservasi Meja (Table Booking):**
  - Formulir pemesanan meja dengan pilihan area (Indoor/Outdoor), tanggal, jam, dan jumlah tamu.
  - Konfirmasi pemesanan cepat via WhatsApp warung.
- 🔐 **Admin Dashboard Lengkap:**
  - **Pesanan:** Monitoring pesanan masuk, rincian struk belanja, dan barcode transaksi.
  - **Menu:** Tambah, edit, dan hapus menu makanan/minuman dengan foto hidangan.
  - **Ketersediaan:** Toggle cepat status menu (Tersedia / Habis) secara instan.
  - **Kategori:** Manajemen kategori makanan & minuman.
  - **Booking:** Daftar jadwal reservasi meja dan catatan khusus pelanggan.

---

## 🛠️ Tech Stack

- **Backend:** Laravel 13, PHP 8.3+
- **Database:** SQLite (default) / MySQL ready
- **Frontend:** Blade Templates, Tailwind CSS, Alpine.js, Vite
- **Icons & Fonts:** Google Material Symbols, Playfair Display, Plus Jakarta Sans, JetBrains Mono

---

## 🚀 Panduan Instalasi & Menjalankan Proyek

### 1. Clone Repositori
```bash
git clone https://github.com/rulipanji3/webrestorant.git
cd webrestorant
```

### 2. Install Dependensi PHP & JavaScript
```bash
composer install
npm install
```

### 3. Konfigurasi Environment (.env)
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Migrasi & Seed Database
```bash
php artisan migrate --seed
php artisan db:seed --class=DemoDataSeeder
```

### 5. Kompilasi Aset Frontend
```bash
npm run build
```

### 6. Jalankan Server Lokal
```bash
php artisan serve
```
Buka browser dan akses [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## 🔑 Kredensial Default Admin

- **URL:** [http://127.0.0.1:8000/admin/login](http://127.0.0.1:8000/admin/login)
- **Username:** `admin`
- **Password:** `secret`

---

## 🧪 Menjalankan Pengujian (Testing)

```bash
php artisan test
```

Semua unit & feature test siap dijalankan dengan SQLite in-memory database:
```
PASS  Tests\Unit\ExampleTest
PASS  Tests\Feature\AdminPagesTest
PASS  Tests\Feature\CheckoutTest
PASS  Tests\Feature\ExampleTest
PASS  Tests\Feature\WarungMakanPageTest
Tests: 7 passed (25 assertions)
```

---

## 📐 Arsitektur & Diagram UML (Visual Paradigm Standard)

Dokumentasi lengkap pemodelan sistem berbasis standar **Visual Paradigm** dan **Mermaid** tersedia di:
- 📄 **Dokumentasi Markdown UML:** [docs/UML_DIAGRAMS.md](docs/UML_DIAGRAMS.md)
- 🌐 **Interactive Diagram Viewer:** [docs/diagrams.html](docs/diagrams.html)

Diagram mencakup:
1. **Use Case Diagram:** Aktor (Pelanggan, Admin Warung, WhatsApp Gateway) & relasi `<<include>>`/`<<extend>>`.
2. **Class Diagram:** Struktur entitas model Eloquent (`Order`, `OrderItem`, `MenuItem`, `Category`, `Booking`), atribut, methods, kardinalitas, dan controller.
3. **Sequence Diagram:** Alur interaksi pemesanan online checkout, validasi stok realtime, reservasi meja, dan toggle stok admin.
4. **Activity Diagram:** Alur aktivitas pengguna (*Customer order flow*, *Table booking*, dan *Admin management flow*).
5. **PlantUML Ready:** Kode sumber PlantUML siap diimpor langsung ke [Visual Paradigm Online](https://online.visual-paradigm.com/app/diagrams/).

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

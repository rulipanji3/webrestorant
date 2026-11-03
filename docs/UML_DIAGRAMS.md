# 📐 Dokumentasi Diagram UML — Warung Makan Mba Neni
*(Visual Paradigm Standard & Mermaid Architecture)*

Dokumen ini memuat rancangan pemodelan perangkat lunak berstandar **UML (Unified Modeling Language)** untuk sistem **Warung Makan Mba Neni** (Laravel 13 & Tailwind CSS). Rancangan ini dirancang agar kompatibel dengan **Visual Paradigm** (baik desktop maupun [Visual Paradigm Online](https://online.visual-paradigm.com/app/diagrams/)).

---

## 📋 Daftar Isi
1. [Use Case Diagram](#1-use-case-diagram)
2. [Class Diagram](#2-class-diagram)
3. [Sequence Diagram](#3-sequence-diagram)
   - 3.1 Sequence: Pemesanan Makanan Online (*Customer Checkout*)
   - 3.2 Sequence: Reservasi Meja (*Table Booking*)
   - 3.3 Sequence: Toggle Ketersediaan Menu (*Admin Realtime Availability*)
4. [Activity Diagram](#4-activity-diagram)
   - 4.1 Activity: Alur Pemesanan Makanan Online (*Customer Flow*)
   - 4.2 Activity: Alur Reservasi Meja (*Booking Flow*)
   - 4.3 Activity: Alur Otentikasi & Manajemen Menu (*Admin Flow*)
5. [Kode PlantUML untuk Visual Paradigm Import](#5-kode-plantuml-untuk-visual-paradigm-online-import)

---

## 1. Use Case Diagram

Diagram ini mendefinisikan fungsionalitas sistem dari sudut pandang aktor:
- **Pelanggan (Customer)**: Pengunjung warung yang dapat melihat menu, melakukan pemesanan (dine-in, takeaway, delivery), dan melakukan reservasi meja.
- **Admin Warung**: Pengelola yang mengelola pesanan masuk, ketersediaan menu secara realtime, katalog hidangan, kategori, dan daftar reservasi.
- **Sistem Eksternal (WhatsApp / Mailer)**: Layanan perantara untuk notifikasi dan konfirmasi pemesanan.

### Visualisasi Diagram (Mermaid)

```mermaid
flowchart LR
    %% Actors
    subgraph Aktor ["Aktor Sistem"]
        Pelanggan["👤 Pelanggan (Customer)"]
        Admin["👤 Admin Warung"]
        WhatsApp["📱 WhatsApp / Mailer API"]
    end

    %% System Boundary
    subgraph Sistem ["Sistem Web Warung Makan Mba Neni"]
        UC01(["UC01: Melihat Menu & Info Warung"])
        UC02(["UC02: Cek Ketersediaan Menu Realtime"])
        UC03(["UC03: Melakukan Pemesanan Makanan"])
        UC04(["UC04: Memilih Tipe Layanan (Dine-in / Takeaway / Delivery)"])
        UC05(["UC05: Mendapatkan Struk Digital & Barcode Invoice"])
        UC06(["UC06: Melakukan Reservasi Meja (Booking)"])
        UC07(["UC07: Mengirim Konfirmasi WhatsApp"])

        UC08(["UC08: Login Admin"])
        UC09(["UC09: Memantau & Mengelola Pesanan Masuk"])
        UC10(["UC10: Mengelola Menu (CRUD & Upload Foto)"])
        UC11(["UC11: Mengatur Ketersediaan Stok Menu (Toggle)"])
        UC12(["UC12: Mengelola Kategori Menu"])
        UC13(["UC13: Memantau & Mengelola Reservasi Meja"])
    end

    %% Pelanggan Relations
    Pelanggan --> UC01
    Pelanggan --> UC03
    Pelanggan --> UC06

    UC01 -.->|"<<include>>"| UC02
    UC03 -.->|"<<include>>"| UC02
    UC03 -.->|"<<include>>"| UC04
    UC03 -.->|"<<include>>"| UC05
    UC03 -.->|"<<extend>>"| UC07
    UC06 -.->|"<<extend>>"| UC07
    UC07 --> WhatsApp

    %% Admin Relations
    Admin --> UC08
    Admin --> UC09
    Admin --> UC10
    Admin --> UC11
    Admin --> UC12
    Admin --> UC13
    UC09 -.->|"<<include>>"| UC08
    UC10 -.->|"<<include>>"| UC08
    UC11 -.->|"<<include>>"| UC08
    UC12 -.->|"<<include>>"| UC08
    UC13 -.->|"<<include>>"| UC08
```

---

## 2. Class Diagram

Diagram ini merepresentasikan struktur data, entitas model Eloquent, controller, serta relasi asosiasi pada arsitektur Laravel 13 di proyek ini:
- `Category` memiliki relasi **1 ke banyak (*One to Many*)** dengan `MenuItem`.
- `Order` memiliki relasi **komposisi (*Composition*)** dengan `OrderItem`.
- `MenuItem` direferensikan pada pesanan melalui atribut `product_id`.
- `Booking` mencatat data reservasi meja dan status reservasi.

### Visualisasi Diagram (Mermaid)

```mermaid
classDiagram
    %% Entitas Model
    class Category {
        +int id
        +string name
        +string slug
        +timestamp created_at
        +timestamp updated_at
        +booted() void
        +menuItems() HasMany
    }

    class MenuItem {
        +int id
        +int category_id
        +string name
        +string description
        +int price
        +string image_url
        +string image
        +boolean is_available
        +timestamp created_at
        +timestamp updated_at
        +category() BelongsTo
        +imageSrc() string
        +casts() array
    }

    class Order {
        +int id
        +string reference_code
        +string customer_name
        +string customer_phone
        +string service_type
        +string status
        +int total
        +timestamp created_at
        +timestamp updated_at
        +items() HasMany
        +serviceLabel(type) string
    }

    class OrderItem {
        +int id
        +int order_id
        +string product_id
        +string name
        +int price
        +int quantity
        +timestamp created_at
        +timestamp updated_at
        +order() BelongsTo
    }

    class Booking {
        +int id
        +string name
        +string phone
        +date date
        +string time
        +int guests
        +string table_type
        +string notes
        +string status
        +timestamp created_at
        +timestamp updated_at
        +casts() array
    }

    class User {
        +int id
        +string name
        +string email
        +string password
        +string remember_token
        +timestamp created_at
        +timestamp updated_at
    }

    %% Controllers
    class CheckoutController {
        +index(Request) View
        +store(Request) JsonResponse
        +destroy(Order) RedirectResponse
        +destroyAll() RedirectResponse
    }

    class MenuItemController {
        +index(Request) View
        +store(Request) RedirectResponse
        +edit(MenuItem) View
        +update(Request, MenuItem) RedirectResponse
        +destroy(MenuItem) RedirectResponse
        +availableIds() JsonResponse
        +availability() View
        +toggleAvailability(MenuItem, Request) Response
    }

    class CategoryController {
        +index() View
        +store(Request) RedirectResponse
        +update(Request, Category) RedirectResponse
        +destroy(Category) RedirectResponse
        +makeUniqueSlug(name, ignoreId) string
    }

    class BookingController {
        +index() View
        +store(Request) JsonResponse
        +destroy(Booking) RedirectResponse
    }

    class AuthController {
        +showLogin() View
        +login(Request) RedirectResponse
        +logout(Request) RedirectResponse
    }

    %% Relasi Model
    Category "1" --> "0..*" MenuItem : hasMany
    Order "1" *-- "1..*" OrderItem : composition
    MenuItem "0..1" ..> "0..*" OrderItem : referenced by

    %% Relasi Controller -> Model
    CheckoutController ..> Order : manages
    CheckoutController ..> OrderItem : creates
    CheckoutController ..> MenuItem : checks availability
    MenuItemController ..> MenuItem : manages
    MenuItemController ..> Category : references
    CategoryController ..> Category : manages
    BookingController ..> Booking : manages
    AuthController ..> User : authenticates
```

---

## 3. Sequence Diagram

### 3.1 Pemesanan Makanan Online (*Customer Checkout Flow*)

Diagram ini menggambarkan interaksi ketika pelanggan melakukan pesanan makanan dari halaman `/order`.

```mermaid
sequenceDiagram
    autonumber
    actor Pelanggan as "Pelanggan"
    participant Browser as "Browser / UI (AlpineJS)"
    participant Controller as "CheckoutController"
    participant MenuItemModel as "MenuItem Model"
    participant OrderModel as "Order Model"
    participant ItemModel as "OrderItem Model"
    participant DB as "Database (SQLite/MySQL)"
    participant Mailer as "Mail / WhatsApp Service"

    Pelanggan->>Browser: Pilih hidangan, jumlah, & tipe layanan (Dine-in/Takeaway/Delivery)
    Pelanggan->>Browser: Isi nama pelanggan & nomor telepon
    Pelanggan->>Browser: Klik tombol "Pesan Sekarang"
    Browser->>Controller: POST /checkout (items, total, customer_name, service_type)
    
    activate Controller
    Controller->>Controller: Validasi data payload (Request Validation)
    Controller->>MenuItemModel: Query MenuItem::where('is_available', true)
    MenuItemModel->>DB: SELECT id FROM menu_items WHERE is_available = 1
    DB-->>MenuItemModel: Return list available IDs
    MenuItemModel-->>Controller: Return Collection IDs

    alt Ada Item yang Habis / Tidak Tersedia
        Controller-->>Browser: Return JSON 409 (success: false, unavailable_items)
        Browser-->>Pelanggan: Tampilkan pesan peringatan item habis & update badge keranjang
    else Semua Item Tersedia
        Controller->>Controller: Generate ref_code: "INV-yymmdd-XXXXXX"
        Controller->>OrderModel: Order::create(total, status='pending', ref_code, customer_data)
        OrderModel->>DB: INSERT INTO orders ...
        DB-->>OrderModel: Return Order ID ($order)
        
        loop Setiap Item dalam Pesanan
            Controller->>ItemModel: OrderItem::create(order_id, product_id, name, price, qty)
            ItemModel->>DB: INSERT INTO order_items ...
        end

        opt Email / Notifikasi Dikonfigurasi
            Controller->>Mailer: Mail::to(admin)->send(OrderPlaced)
        end

        Controller->>Controller: Generate Barcode URL (Code128 tec-it API)
        Controller-->>Browser: Return JSON 200 (success: true, order_id, ref_code, barcode_url)
        deactivate Controller
        
        Browser-->>Pelanggan: Tampilkan Modal Struk Digital & Opsi Kirim WhatsApp
    end
```

---

### 3.2 Reservasi Meja (*Table Booking Flow*)

Diagram interaksi saat pelanggan mengisi formulir booking meja di halaman `/booking`.

```mermaid
sequenceDiagram
    autonumber
    actor Pelanggan as "Pelanggan"
    participant Browser as "Browser / UI (/booking)"
    participant Controller as "BookingController"
    participant Model as "Booking Model"
    participant DB as "Database"
    participant WA as "WhatsApp Gateway / App"

    Pelanggan->>Browser: Isi form (nama, WhatsApp, tanggal, jam, jumlah tamu, area meja, catatan)
    Pelanggan->>Browser: Klik tombol "Pesan Meja via WhatsApp"
    Browser->>Controller: POST /booking (name, phone, date, time, guests, table_type, notes)
    activate Controller
    Controller->>Controller: Validasi Request (required fields, format tanggal/jam)
    Controller->>Model: Booking::create($validatedData)
    Model->>DB: INSERT INTO bookings ...
    DB-->>Model: Return Booking Instance
    Model-->>Controller: Return $booking
    Controller-->>Browser: Return JSON (success: true, booking: $booking)
    deactivate Controller

    Browser->>Browser: Generate template teks pesan WhatsApp
    Browser->>WA: Redirect ke https://api.whatsapp.com/send?phone=...&text=...
    WA-->>Pelanggan: Terbuka chat WhatsApp Warung Mba Neni dengan format pesan rapi
```

---

### 3.3 Toggle Ketersediaan Stok Menu (*Admin Realtime Availability*)

Diagram interaksi admin mengubah status ketersediaan menu secara instan tanpa reload halaman.

```mermaid
sequenceDiagram
    autonumber
    actor Admin as "Admin Warung"
    participant UI as "Admin UI (/admin/menu/availability)"
    participant Controller as "MenuItemController"
    participant Model as "MenuItem Model"
    participant DB as "Database"

    Admin->>UI: Klik tombol toggle "Tandai Habis" / "Tersedia"
    UI->>Controller: PUT /admin/menu/{id}/toggle (Expects JSON)
    activate Controller
    Controller->>Model: MenuItem::findOrFail($id)
    Model->>DB: SELECT * FROM menu_items WHERE id = ?
    DB-->>Model: Return MenuItem
    Controller->>Model: $menuItem->update(['is_available' => !$is_available])
    Model->>DB: UPDATE menu_items SET is_available = ...
    DB-->>Model: Success
    Controller-->>UI: Return JSON {success: true, is_available: boolean, message: string}
    deactivate Controller
    UI->>UI: Update status badge & warna tombol seketika (DOM update)
    UI-->>Admin: Menampilkan status terbaru menu
```

---

## 4. Activity Diagram

### 4.1 Alur Pemesanan Makanan Online (*Customer Flow*)

```mermaid
flowchart TD
    Start([● Mulai]) --> BukaOrder["Membuka Halaman Menu & Order (/order)"]
    BukaOrder --> PilihKategori["Pilih Kategori Makanan / Minuman"]
    PilihKategori --> TambahMenu["Klik 'Tambah' pada Item yang Diinginkan"]
    TambahMenu --> CekKeranjang{"Periksa Keranjang Belanja"}
    
    CekKeranjang -->|Ingin Ubah Item| UbahQty["Ubah Jumlah Item / Hapus Item"]
    UbahQty --> CekKeranjang
    
    CekKeranjang -->|Lanjut Checkout| IsiForm["Pilih Layanan (Dine-in / Takeaway / Delivery)<br/>Isi Nama & Nomor Telepon"]
    IsiForm --> Submit["Klik 'Pesan Sekarang'"]
    
    Submit --> ValidasiClient{"Validasi Form & Stok Realtime"}
    ValidasiClient -->|Ada Item Tidak Tersedia| NotifHabis["Muncul Peringatan: Item Habis"]
    NotifHabis --> UbahQty
    
    ValidasiClient -->|Data Lengkap & Valid| SimpanPesanan["Backend Menyimpan Pesanan & Order Items"]
    SimpanPesanan --> BuatInvoice["Generate Kode Invoice (INV-...) & Barcode Struk"]
    BuatInvoice --> TampilStruk["Tampilkan Dialog Struk Pembelian & Rincian Total"]
    TampilStruk --> KirimWA["Pelanggan Konfirmasi via WhatsApp / Kasir"]
    KirimWA --> Selesai([◉ Selesai])
```

---

### 4.2 Alur Reservasi Meja (*Table Booking Flow*)

```mermaid
flowchart TD
    Start([● Mulai]) --> AksesBooking["Pelanggan Membuka Halaman /booking"]
    AksesBooking --> IsiForm["Mengisi Data Reservasi:<br/>- Nama Lengkap<br/>- Nomor WhatsApp<br/>- Tanggal & Jam Kedatangan<br/>- Jumlah Orang<br/>- Pilihan Meja (Indoor/Outdoor)<br/>- Catatan Khusus"]
    
    IsiForm --> KlikSubmit["Klik 'Pesan Meja via WhatsApp'"]
    KlikSubmit --> Validasi{"Apakah Data Lengkap & Valid?"}
    
    Validasi -->|Tidak Valid| PesanError["Tampilkan Pesan Error Validasi"]
    PesanError --> IsiForm
    
    Validasi -->|Valid| SimpanDB["Sistem Menyimpan Data Reservasi ke Tabel 'bookings'"]
    SimpanDB --> BuatTeksWA["Format Pesan Template WhatsApp Otomatis"]
    BuatTeksWA --> RedirectWA["Redirect Browser ke WhatsApp Chat Warung"]
    RedirectWA --> KonfirmasiKasir["Admin/Kasir Menerima Pesan & Menyiapkan Meja"]
    KonfirmasiKasir --> Selesai([◉ Selesai])
```

---

### 4.3 Alur Otentikasi & Manajemen Menu (*Admin Flow*)

```mermaid
flowchart TD
    Start([● Mulai]) --> AksesAdmin["Akses URL /admin"]
    AksesAdmin --> CekSesi{"Apakah Sudah Login Admin?"}
    
    CekSesi -->|Belum| FormLogin["Tampilkan Halaman Login (/admin/login)"]
    FormLogin --> InputKredensial["Input Username & Password"]
    InputKredensial --> CekKredensial{"Validasi Kredensial Admin"}
    CekKredensial -->|Salah| ErrorLogin["Tampilkan Pesan Error"] --> FormLogin
    CekKredensial -->|Benar| SetSession["Set Session: admin_authenticated = true"]
    
    CekSesi -->|Sudah| Dashboard["Masuk ke Dashboard Admin (/admin/orders)"]
    SetSession --> Dashboard
    
    Dashboard --> PilihMenu{"Pilih Menu Navigasi"}
    
    PilihMenu -->|Pesanan| MenuPesanan["Kelola Pesanan Masuk & Cetak/Lihat Struk"]
    PilihMenu -->|Menu| KelolaMenu["Tambah / Edit / Hapus Menu & Upload Gambar"]
    PilihMenu -->|Ketersediaan| ToggleStok["Toggle Status Tersedia / Habis Realtime"]
    PilihMenu -->|Kategori| KelolaKategori["Kelola Kategori Hidangan"]
    PilihMenu -->|Booking| KelolaBooking["Lihat & Kelola Daftar Reservasi Meja"]
    PilihMenu -->|Logout| Keluar["Hapus Session Admin & Redirect ke Login"]
    
    Keluar --> Selesai([◉ Selesai])
    MenuPesanan --> Dashboard
    KelolaMenu --> Dashboard
    ToggleStok --> Dashboard
    KelolaKategori --> Dashboard
    KelolaBooking --> Dashboard
```

---

## 5. Kode PlantUML untuk Visual Paradigm Online Import

Untuk Anda yang ingin mengimpor diagram langsung ke [Visual Paradigm Online](https://online.visual-paradigm.com/) (Menu: **File** -> **Import** -> **PlantUML**):

### 5.1 PlantUML — Use Case Diagram
```plantuml
@startuml WarungMbaNeni_UseCase
left to right direction
skinparam packageStyle rectangle
skinparam actorStyle awesome

actor "Pelanggan" as customer
actor "Admin Warung" as admin
actor "WhatsApp / Mailer" as ext

rectangle "Sistem Web Warung Makan Mba Neni" {
  usecase "UC01: Melihat Menu & Info" as UC1
  usecase "UC02: Cek Ketersediaan Menu" as UC2
  usecase "UC03: Pemesanan Makanan Online" as UC3
  usecase "UC04: Pilih Tipe Layanan" as UC4
  usecase "UC05: Cetak Struk & Barcode" as UC5
  usecase "UC06: Reservasi Meja" as UC6
  usecase "UC07: Konfirmasi WhatsApp" as UC7
  
  usecase "UC08: Login Admin" as UC8
  usecase "UC09: Kelola Pesanan Masuk" as UC9
  usecase "UC10: Kelola Katalog Menu" as UC10
  usecase "UC11: Atur Stok Ketersediaan" as UC11
  usecase "UC12: Kelola Kategori" as UC12
  usecase "UC13: Kelola Reservasi Meja" as UC13
}

customer --> UC1
customer --> UC3
customer --> UC6

UC1 ..> UC2 : <<include>>
UC3 ..> UC2 : <<include>>
UC3 ..> UC4 : <<include>>
UC3 ..> UC5 : <<include>>
UC3 ..> UC7 : <<extend>>
UC6 ..> UC7 : <<extend>>
UC7 --> ext

admin --> UC8
admin --> UC9
admin --> UC10
admin --> UC11
admin --> UC12
admin --> UC13
@enduml
```

### 5.2 PlantUML — Class Diagram
```plantuml
@startuml WarungMbaNeni_ClassDiagram
class Category {
  +id : int
  +name : string
  +slug : string
  +created_at : timestamp
  +updated_at : timestamp
  +menuItems() : HasMany
}

class MenuItem {
  +id : int
  +category_id : int
  +name : string
  +description : string
  +price : int
  +image_url : string
  +image : string
  +is_available : boolean
  +created_at : timestamp
  +updated_at : timestamp
  +category() : BelongsTo
  +imageSrc() : string
}

class Order {
  +id : int
  +reference_code : string
  +customer_name : string
  +customer_phone : string
  +service_type : string
  +status : string
  +total : int
  +created_at : timestamp
  +updated_at : timestamp
  +items() : HasMany
  +serviceLabel(type) : string
}

class OrderItem {
  +id : int
  +order_id : int
  +product_id : string
  +name : string
  +price : int
  +quantity : int
  +order() : BelongsTo
}

class Booking {
  +id : int
  +name : string
  +phone : string
  +date : date
  +time : string
  +guests : int
  +table_type : string
  +notes : string
  +status : string
}

Category "1" -- "0..*" MenuItem : contains >
Order "1" *-- "1..*" OrderItem : composed of >
MenuItem "0..1" .. "0..*" OrderItem : references <
@enduml
```

### 5.3 PlantUML — Sequence Diagram (Checkout)
```plantuml
@startuml WarungMbaNeni_Sequence_Checkout
autonumber
actor Pelanggan as C
participant "Web UI" as UI
participant "CheckoutController" as CTRL
participant "MenuItem Model" as MI
participant "Order Model" as ORD
participant "OrderItem Model" as OIT
database "Database" as DB

C -> UI : Klik "Pesan Sekarang"
UI -> CTRL : POST /checkout (payload)
activate CTRL

CTRL -> MI : where('is_available', true)
MI -> DB : SELECT available IDs
DB --> MI : IDs
MI --> CTRL : List available IDs

alt Item Tidak Tersedia
  CTRL --> UI : 409 Conflict (item habis)
  UI --> C : Tampilkan alert item habis
else Semua Tersedia
  CTRL -> ORD : create(order_data)
  ORD -> DB : INSERT orders
  DB --> ORD : order_id
  
  loop Setiap item
    CTRL -> OIT : create(item_data)
    OIT -> DB : INSERT order_items
  end
  
  CTRL --> UI : 200 OK (invoice, barcode_url)
  deactivate CTRL
  UI --> C : Tampilkan dialog struk & link WhatsApp
end
@enduml
```

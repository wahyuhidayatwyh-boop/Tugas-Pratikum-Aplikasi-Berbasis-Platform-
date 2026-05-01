# 🛒 Toko Wowo — Sistem Manajemen Produk

Aplikasi web manajemen produk berbasis **Laravel 12** dengan autentikasi menggunakan **Laravel Breeze**. Dibuat sebagai tugas praktikum Aplikasi Berbasis Platform.

---

## ✨ Fitur Utama

| Fitur | Keterangan |
|---|---|
| 🔐 **Autentikasi** | Login, Register, Logout via Laravel Breeze |
| 📋 **Data Table** | Tabel produk dengan live search tanpa reload |
| ➕ **Create** | Form tambah produk dengan validasi |
| ✏️ **Edit** | Form edit dengan data pre-filled |
| 🗑️ **Delete** | Hapus produk dengan konfirmasi modal animasi |
| 📊 **Dashboard Stats** | Kartu statistik: total produk, stok, nilai inventori |
| 🎨 **Stok Indikator** | Badge warna hijau/kuning/merah sesuai jumlah stok |
| 🌱 **Seeder & Factory** | 15 produk dummy otomatis saat fresh migration |

---

## 🚀 Cara Menjalankan

### Prasyarat
- PHP >= 8.2
- Composer
- Node.js & npm
- SQLite / MySQL

### Instalasi

```bash
# 1. Clone / masuk ke direktori project
cd toko-wowo

# 2. Install dependency PHP
composer install

# 3. Install dependency JavaScript
npm install

# 4. Salin file environment
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Jalankan migrasi + seeder (membuat tabel & data dummy)
php artisan migrate:fresh --seed

# 7. Build assets (CSS & JS)
npm run build

# 8. Jalankan server
php artisan serve
```

Buka browser di: **http://127.0.0.1:8000**

---

## 🔑 Kredensial Default

| Field | Value |
|---|---|
| Email | `wowo@toko.com` |
| Password | `password` |

---

## 📁 Struktur Project

```
toko-wowo/
├── app/
│   ├── Http/Controllers/
│   │   └── ProductController.php     ← CRUD produk
│   └── Models/
│       └── Product.php               ← Model produk
│
├── database/
│   ├── factories/
│   │   └── ProductFactory.php        ← Generator data dummy
│   ├── migrations/
│   │   └── ..._create_products_table.php
│   └── seeders/
│       └── DatabaseSeeder.php        ← Seeder user + 15 produk
│
├── resources/views/
│   ├── layouts/
│   │   └── navigation.blade.php      ← Navbar dengan link Produk
│   └── products/
│       ├── index.blade.php           ← Data table + modal hapus
│       ├── create.blade.php          ← Form tambah produk
│       └── edit.blade.php            ← Form edit produk
│
└── routes/
    └── web.php                       ← Route resource products
```

---

## 🗄️ Struktur Database

### Tabel `products`

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | BIGINT (PK) | Primary key auto-increment |
| `name` | VARCHAR(255) | Nama produk |
| `description` | TEXT (nullable) | Deskripsi produk |
| `price` | INTEGER | Harga dalam Rupiah |
| `stock` | INTEGER | Jumlah stok tersedia |
| `created_at` | TIMESTAMP | Waktu dibuat |
| `updated_at` | TIMESTAMP | Waktu diperbarui |

---

## 🛣️ Routes

```
GET    /products           → ProductController@index   (Daftar produk)
GET    /products/create    → ProductController@create  (Form tambah)
POST   /products           → ProductController@store   (Simpan produk)
GET    /products/{id}/edit → ProductController@edit    (Form edit)
PUT    /products/{id}      → ProductController@update  (Update produk)
DELETE /products/{id}      → ProductController@destroy (Hapus produk)
```

Semua route products dilindungi middleware `auth` (harus login).

---

## 🛠️ Teknologi

- **Laravel 12** — PHP Framework
- **Laravel Breeze** — Authentication starter kit
- **Tailwind CSS** — Utility-first CSS (via Breeze)
- **Alpine.js** — Reactive JS (via Breeze)
- **Vite** — Asset bundler
- **SQLite** — Default database (bisa diganti MySQL)

---

## 👨‍💻 Informasi Mahasiswa

| | |
|---|---|
| **Nama** | *(Nama Mahasiswa)* |
| **NIM** | 2311102178 |
| **Mata Kuliah** | Praktikum Aplikasi Berbasis Platform |
| **Pertemuan** | 5 — Laravel CRUD + Breeze Authentication |

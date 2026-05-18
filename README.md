Markdown

# Blog API dengan Kategori, Pagination, dan Pencarian Lanjutan

RESTful API untuk sistem manajemen blog yang memungkinkan pengguna untuk mengelola artikel (CRUD) dan kategori. API ini dibangun menggunakan **Laravel 11** dan **MySQL** sebagai sistem manajemen basis datanya, serta dilengkapi dengan fitur validasi input, pagination otomatis, dan pencarian lanjutan.

---

## 🚀 Fitur Utama

1. **Manajemen Kategori:** Membuat dan menampilkan daftar kategori artikel.
2. **Manajemen Artikel:** Operasi CRUD penuh (Create, Read, Update, Delete) untuk artikel.
3. **Validasi Data:** Proteksi input data kosong dan validasi relasi `category_id` yang wajib terdaftar di database MySQL (_Foreign Key Integrity_).
4. **Pagination Semantik:** Pengambilan daftar artikel berskala besar menggunakan parameter `page` dan `limit` dengan metadata pagination standar industri.
5. **Pencarian Lanjutan (Bonus):** Penyaringan artikel secara fleksibel berdasarkan `category_id`, kata kunci (`keyword`) pada judul & konten, hingga filter rentang tanggal (`start_date` & `end_date`).

---

## 🛠️ Persyaratan Sistem

Sebelum menjalankan aplikasi, pastikan komputer Anda sudah terpasang:

- PHP >= 8.2
- Composer >= 2.0
- MySQL Server (XAMPP / Laragon / Docker)

---

## 💻 Panduan Instalasi & Menjalankan Aplikasi

Ikuti langkah-langkah berikut untuk menjalankan proyek di lingkungan lokal Anda:

### 1. Kloning Repositori & Masuk ke Direktori

```bash
git clone [https://github.com/username/blog-api-laravel.git](https://github.com/username/blog-api-laravel.git)
cd blog-api-laravel
```

### 2. Install Dependensi PHP via Composer

```bash
composer install
```

### 3. Salin Konfigurasi Lingkungan (.env)

```bash
cp .env.example .env
```

### 4. Konfigurasi Database Lokal

Buka file .env yang baru dibuat menggunakan kode editor Anda, lalu sesuaikan pengaturan database dengan MySQL lokal Anda:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
```

(Pastikan Anda sudah membuat database kosong bernama nama_database_anda di phpMyAdmin atau aplikasi klien database Anda sebelum melangkah ke tahap berikutnya).

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Install Komponen API

```bash
php artisan install:api
```

### 7. Jalankan Migrasi Database

```bash
php artisan migrate:fresh --seed
```

### 8. Jalankan Server Aplikasi

```bash
php artisan serve
```

Aplikasi Anda sekarang aktif dan dapat diakses di: http://127.0.0.1:8000

## 📽️ Link Video Demo Aplikasi

Untuk melihat demonstrasi langsung cara menjalankan aplikasi dari awal serta simulasi pengujian seluruh endpoint API, silakan tonton video berikut:
https://drive.google.com/file/d/1qStexBVj4TjyeN_UqBgwpeIUt62TNItL/view?usp=drive_link

## 📑 Dokumentasi & Koleksi Postman API

https://documenter.getpostman.com/view/54915556/2sBXqRiwUP#ed66bc1b-8157-4e62-900e-994f3f16ce48

# EduFun Web Application

EduFun adalah aplikasi web berbasis Laravel yang dikembangkan untuk memenuhi kebutuhan ujian **Web Programming** BINUS University. Fokusnya adalah menyediakan konten pembelajaran gratis untuk mahasiswa IT dengan kategori **Data Science** dan **Network Security** lengkap dengan artikel populer, penulis, dan halaman dokumentasi.

## Tech Stack

- PHP 8.x & Laravel 10
- MySQL / MariaDB
- Vite, Bootstrap 5, dan Blade Template

## Persiapan Lingkungan

1. **Install dependensi**
   ```bash
   composer install
   npm install
   npm run build   # atau npm run dev saat development
   ```
2. **Salin dan konfigurasi `.env`**
   ```bash
   cp .env.example .env
   ```
3. **Setel koneksi database** pada `.env` (ubah `DB_COLLATION` agar sesuai dengan pengaturan database masing-masing):
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=edufun
   DB_USERNAME=root
   DB_PASSWORD=
   DB_COLLATION=utf8mb4_unicode_ci
   ```
4. **Generate key & migrasi database**
   ```bash
   php artisan key:generate
   php artisan migrate --seed
   ```

Seeder akan menyiapkan:
- 2 kategori (Data Science & Network Security)
- 4 writer dengan bio singkat
- 6 artikel populer lengkap dengan thumbnail Unsplash dan relasi writer/kategori

## Menjalankan Aplikasi
```bash
php artisan serve
```
Kunjungi `http://127.0.0.1:8000`.

## Fitur Utama

- **Home**: hero banner, artikel terbaru, ringkasan kategori, daftar writer, artikel populer, dan highlight EduFun.
- **Category**: daftar kategori, tombol “lihat detail”, serta preview artikel per kategori.
- **Category Detail**: menampilkan seluruh artikel di dalam kategori tertentu.
- **Article Detail**: memperlihatkan konten lengkap artikel beserta metadata.
- **Writers**: daftar penulis dengan jumlah artikel yang mereka tulis.
- **Writer Detail**: menampilkan profil writer berikut seluruh artikelnya.
- **Popular Page**: daftar artikel populer dengan pagination 3 artikel per halaman.
- **About**: penjelasan singkat mengenai visi EduFun.

## Dokumentasi Tambahan
Dokumen pendukung dalam format **.docx** dan **.pdf** tersedia di folder `docs/` pada root proyek.

---
Selamat mengerjakan & semoga sukses pada ujian Web Programming! 🎓

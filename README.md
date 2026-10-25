# KursusKu Laravel

## Deskripsi Proyek
KursusKu merupakan prototipe website kursus online yang dibuat menggunakan Laravel. Website ini menampilkan informasi kursus pilihan melalui halaman utama.

## Teknologi dan Kebutuhan
- PHP 8.3 atau lebih baru
- Composer
- Laravel
- Laragon atau web server yang mendukung PHP

## Cara Menjalankan Proyek
1. Buka terminal pada folder proyek.
2. Jalankan `composer install`.
3. Salin `.env.example` menjadi `.env` jika file `.env` belum tersedia.
4. Jalankan `php artisan key:generate`.
5. Jalankan `php artisan serve`.
6. Buka alamat yang ditampilkan terminal di browser.

## Fitur yang Tersedia
- Route bernama `home`.
- Controller `HomeController@index`.
- Halaman utama menggunakan Blade.
- Data kursus disiapkan melalui controller.
- Tampilan menggunakan CSS dan gambar.

## Fitur yang Belum Diimplementasikan
- Database untuk data kursus.
- CRUD (Create, Read, Update, Delete).
- Autentikasi pengguna.
- Relasi antartabel.

## Status Proyek
Proyek ini merupakan prototipe pembelajaran Laravel dan masih dapat dikembangkan lebih lanjut.
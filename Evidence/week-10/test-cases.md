# Dokumentasi Pengujian Aplikasi KursusKu

## Informasi Pengujian
- Nama aplikasi: KursusKu Laravel
- Database: kursusku_laravel
- Tabel yang diuji: courses
- Fitur: Create, Read, Update, Delete, dan Validasi

## Daftar Test Case

| No. | Fitur | Skenario Pengujian | Hasil yang Diharapkan | Status |
|---|---|---|---|---|
| 1 | Create | Menambahkan kursus dengan data valid | Data berhasil disimpan | Berhasil |
| 2 | Read | Membuka halaman daftar kursus | Daftar kursus ditampilkan | Berhasil |
| 3 | Detail | Membuka detail salah satu kursus | Detail kursus ditampilkan | Berhasil |
| 4 | Update | Mengubah data kursus | Perubahan berhasil disimpan | Berhasil |
| 5 | Delete | Menghapus kursus | Data terhapus dari daftar | Berhasil |
| 6 | Validasi | Menggunakan kode kursus yang sudah terdaftar | Muncul pesan kode sudah digunakan | Berhasil |
| 7 | Validasi | Mengosongkan nama kursus | Muncul pesan validasi nama wajib diisi | Berhasil |

## Kesimpulan
Berdasarkan pengujian yang dilakukan, fitur CRUD dan validasi pada aplikasi KursusKu Laravel berjalan sesuai hasil yang diharapkan.

# Tabel Pengujian Praktikum Pertemuan 11

| No. | Skenario Pengujian | Data Uji | Hasil yang Diharapkan | Status |
|---|---|---|---|---|
| 1 | Menambah kursus valid | Semua data valid | Kursus berhasil ditambahkan | Berhasil |
| 2 | Kode kursus duplikat | Kode yang sudah ada | Validasi menolak data | Berhasil |
| 3 | Nama kursus kosong | Nama dikosongkan | Validasi menolak data | Belum diuji |
| 4 | Nama kursus terlalu pendek | Nama 2 karakter | Validasi menolak data | Belum diuji |
| 5 | Biaya negatif | -1000 | Validasi menolak data | Belum diuji |
| 6 | Biaya bukan bilangan bulat | 1000.5 | Validasi menolak data | Belum diuji |
| 7 | Kuota nol | 0 | Validasi menolak data | Belum diuji |
| 8 | Kuota melebihi batas | 501 | Validasi menolak data | Berhasil |
| 9 | Kuota minimum | 1 | Data diterima | Belum diuji |
| 10 | Kuota maksimum | 500 | Data diterima | Belum diuji |
| 11 | Tanggal tidak valid | Tanggal salah | Validasi menolak data | Belum diuji |
| 12 | Status tidak valid | active | Validasi menolak data | Belum diuji |
| 13 | Update dengan kode sendiri | Kode tidak diubah | Update berhasil | Belum diuji |
| 14 | Update memakai kode kursus lain | Kode duplikat | Validasi menolak data | Berhasil |
| 15 | Hapus kursus percobaan | TEST-DEL-01 | Kursus terhapus | Berhasil |

Catatan: Ubah status pengujian sesuai hasil yang benar-benar diperoleh. Jangan menandai pengujian sebagai berhasil jika belum dilakukan.
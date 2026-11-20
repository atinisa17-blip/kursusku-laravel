# TEST MATRIX PERTEMUAN 13
## Pengujian Pencarian, Filter Status, dan Pagination KursusKu

| No. | Skenario Pengujian | Input | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|---|
| 1 | Pencarian 0 hasil | kursusxyz999 | Pesan data tidak ditemukan muncul | Pesan data kursus tidak ditemukan muncul | Pass |
| 2 | Pencarian 1 hasil | Laravel | Satu data kursus ditemukan | Satu data kursus berhasil ditemukan | Pass |
| 3 | Lebih dari 10 data | Semua Status | Pagination muncul dengan 10 data per halaman | Pagination berhasil menampilkan 10 data per halaman | Pass |
| 4 | Keyword dengan spasi | Kursus Uji | Data sesuai kata kunci ditampilkan | Data kursus sesuai kata kunci berhasil ditampilkan | Pass |
| 5 | Pencarian dan pindah halaman | Kursus Uji, halaman 2 | Kata kunci tetap dipertahankan | Kata kunci tetap muncul saat berpindah ke halaman 2 | Pass |

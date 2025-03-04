Sistem Workorder dengan PHP 8, MySQLi dan Booststrap 5
 Sistem Workorder ini dibangun menggunakan bahasa pemrograman PHP
versi 8 dan database MySQL. Untuk berkomunikasi dengan database menggunakan
MySQLi Extension dengan antarmuka Procedural.
Detail Pembuatan Sistem :
- Backend yang digunakan PHP 8
- Frondend yang digunakan Boostrap 5
- Sistem ini dibuat dengan bantuan chatgpt untuk membantu menyelesaikan masalah
bug yang terjadi saat proses pembuatan sistem.
- Database menggunakan MySQL untuk berkomunikasi menggunakan MySQLi
file database tersimpan di folder database dengan nama workorder_project.sql
Instruksi instalasi 
- Download file di https://github.com/Yunita6/SistemWorkorderPHP8.git
- Pilih code - HTTPS - Download ZIP
- Extrak file ZIP
- Pindahkan file tadi di xampp - htdocs - ubah nama folder menjadi workorder
- Buat database di localhost/phpmyadmin dengan nama workoder_project.sql
- Kemudian import file dari file database yang bernama workorder_project.sql
- Setelah berhasil di import
- Coba sistem workorder dengan localhost/workorder kemudian enter
2 hak akses untuk masuk ke sistem :
- Username : marcelo 
- Password : marcelo123 (level manager)
- Username : arya 
- Password : 123arya (level operator)

Detail halaman manager
- Menu pencarian, Memudahkan manager untuk mencari data status (Pending, In Progress, Completed, Canceled)
- Tambah data, Membuat workorder baru untuk di kerjakan operator
- Tampilan data workorder, Memperlihatkan semua data yang sudah di input sebelumnya
- Edit, Melakukan perubahan data jika ada kesalahan saat penginputan tapi hanya bisa merubah data jumlah,tanggal dan status
- View, Melihat data lebih detail dari inputan tadi
- Download Lap Rekapitulasi, File excel yang berisi semua data yang telah di input dan menampilkan nama serta jumlah dari status
(Pending, In Progress, Completed, Canceled)
- Download Lap Opertor, File excel yang berisi semua data yang telah di update operator dan menampilkan nama serta jumlah status
Completed

Detail halaman operator
- Tampilan data workorder, Memperlihatkan semua data yang sudah di input manager dan 
yang telah di update oleh operator di field jangka waktu dan keterangan
- Edit, Melakukan perubahan data atau penambahan data di jangka waktu dan keterangan
- View, Melihat data lebih detail dari inputan 
- Download Lap Opertor, File excel yang berisi semua data yang telah di update operator dan menampilkan nama serta jumlah status
Completed

Waktu yang di perlukan untuk menyelesaikan sistem ini kurang lebih 2 hari awal di buat di tanggal 2 maret selesai di tanggal 3

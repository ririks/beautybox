# README - Beauty Box

## Deskripsi

beauty Box adalah sebuah website e-commerce yang menjual skincare. Website ini dibangun menggunakan database MySQL phpMyAdmin, HTML, CSS, JavaScript.

## Fitur

1. **Home**: pengguna dapat melihat informasi awal tentang beauty box, seperti beberapa produk skincare, galery beauty box, lokasi, kontak, dan lain-lain.

2. **Shop**: Pengguna dapat melihat daftar keseluruhan produk skincare yang ditawarkan oleh Beauty Box, Setiap produk memiliki deskripsi, harga, dan gambar.

3. **Orders**: pengguna dapat melihat pesanan yang sebelumnya telah di checkout oleh si pengguna, sebagai history sebelumnya

4. **profil**: pengguna dapat mengisi informasi alamat pengiriman seperti, nama, nomor telepon, alamat, kecamatan, provinsi, negara, dan kode post. jika pengguna ingin mengorder, pengguna tidak perlu mengisi alamat lagi karena sudah otomatis tersimpan di halaman checkout

4. **edit profil**: pengguna dapat mengedite nama, alamat, nomor telepon, email,kecamatan, provinsi, negara, dan kode post.

5. **Wishlist**: Pengguna dapat me wishlist jenis skincare yang disukai ataupun yang nantinya akan pengguna beli.

6. **Cart**: pengguna dapat memasukkan produk skincare ke dalam cart/keranjang untuk nantinya bisa proses ke checkout.

7. **Checkout**: Pengguna dapat melihat informasi alamat pengiriman yang sudah diisi di halaman profile, seperti nama, nomor telepon alamat, kecamatan, provinsi, negara, kode post, memilih metode pembayaran, mengupload bukti pembayaran, setelah itu pengguna bisa langsung mengorder.

8. **Dashboard Admin**: Admin memiliki akses ke halaman dashboard admin. admin dapat menambah produk atau mengupdate produk, merubah status transaksi, melihat jumlah user, dan lain-lain

## Pengaturan Pengembangan

1. Pastikan Anda memiliki versi PHP 8.20 atau yang lebih baru terpasang di sistem Anda.

2. Salin repositori ini ke direktori web server Anda.

3. Import file SQL yang disediakan (`shop_db.sql`) ke dalam database MySQL Anda menggunakan phpMyAdmin.

4. Konfigurasikan koneksi database MySQL dengan mengedit berkas `config.php` dan mengganti nilai `DB_HOST`, `DB_USERNAME`, `DB_PASSWORD`, dan `DB_NAME` sesuai dengan pengaturan Anda.

```php
// Konfigurasi database
$servername = "localhost"; // nama host database
$username = "root"; // username database
$password = ""; // password database
$dbname = "shop_db"; // nama database

5. Akses halaman beranda melalui peramban web dengan mengunjungi URL `http://beautybox.seceria.com`. dan masukkan kata sandi yang ditetapkan dalam konfigurasi. bisa juga mengakses melalui `http://localhost/beautybox`

```user
// User Akun
Username : user
Password : 1234
```

6. Untuk mengakses halaman dashboard admin, buka URL `https://localhost/beautybox` atau kunjungi URL `https://beautybox.seceria.com` dan masukkan username dan password berikut :

```admin
// Admin Akun
Username : admin
Password : 111
```

## Kredit

Beauty Box dikembangkan oleh Riri Komalasari.

## Kontak

Jika Anda memiliki pertanyaan atau masalah terkait dengan Beauty Box, silakan hubungi Riri Komalasari melalui email di ririkomalasari870@gmail.com

## Note

Jika terjadi error atau halaman tidak muncul versi PHP yang seharusnya 5.6 atau 8.1 terganti di Hosting. Sehingga tidak muncul tampilannya

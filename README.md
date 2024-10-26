# Pemesanan Tiket Bioskop Sederhana

## Deskripsi
**Pemesanan Tiket** adalah aplikasi sederhana untuk pemesanan tiket bioskop. Aplikasi ini memungkinkan pengguna untuk login dan melihat daftar film, serta melakukan pemesanan tiket secara sederhana.

## Fitur
- **Login Pengguna**: Pengguna harus login untuk mengakses sistem.
- **Pencarian Film**: Pengguna dapat mencari film yang tersedia.
- **Daftar Film**: Menampilkan daftar film yang tersedia.
- **Pemesanan Tiket**: Mengelola pemesanan tiket (untuk pengembangan lebih lanjut).

## Persyaratan
- **PHP** (versi 7.0 ke atas)
- **MySQL** atau **MariaDB**
- **Server web** (seperti Apache atau Nginx)

## Instalasi
1. **Clone Repository**:
    ```bash
    git clone https://github.com/natasyahelmalia/pemesanan-tiket.git
    cd pemesanan-tiket
    ```

2. **Setup Database**:
   - Buat database baru di MySQL/MariaDB.
   - Import file `bioskop.sql` ke database tersebut.

3. **Konfigurasi Database**:
   - Ubah detail koneksi database di file `koneksi.php` sesuai dengan pengaturan server Anda.

## Cara Menjalankan
1. **Jalankan Server Web Lokal**:
   Pastikan server web (Apache atau Nginx) dan database MySQL/MariaDB berjalan.

2. **Akses Aplikasi**:
   Buka browser dan masukkan URL berikut:
   ```
   http://localhost/cinema_tickets/index.php
   ```

3. **Login**:
   Masukkan username dan password yang sesuai untuk masuk ke dalam aplikasi.


Terima Kasih!
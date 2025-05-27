# Jurnal Pribadi (JurnalKu)

Aplikasi web Jurnal Pribadi sederhana yang dibangun menggunakan Laravel dan Tailwind CSS. Pengguna dapat mendaftar, login, dan membuat serta mengelola catatan jurnal pribadi mereka.

## Fitur Utama

* **Autentikasi Pengguna:**
    * Registrasi Pengguna Baru
    * Login Pengguna
    * Logout
    * (Fitur dari Laravel Breeze seperti Lupa Password, Verifikasi Email juga tersedia)
* **Dashboard Pengguna:**
    * Menampilkan daftar entri jurnal milik pengguna yang sedang login.
    * Pagination untuk daftar jurnal.
* **Manajemen Jurnal (CRUD):**
    * **Create:** Membuat entri jurnal baru (judul, isi, tanggal entri).
    * **Read:** Melihat daftar jurnal dan detail masing-masing jurnal.
    * **Update:** Mengedit entri jurnal yang sudah ada.
    * **Delete:** Menghapus entri jurnal.
* **Desain Responsif:** Dibuat dengan Tailwind CSS agar nyaman diakses di berbagai perangkat.

## Teknologi yang Digunakan

* **Backend:** Laravel (PHP Framework)
* **Frontend:** Blade Templates, Tailwind CSS v3
* **Asset Bundling:** Vite
* **Database:** MySQL (atau database lain yang didukung Laravel, sesuai konfigurasi)
* **Autentikasi:** Laravel Breeze

## Prasyarat

Sebelum memulai, pastikan sistem kamu memiliki:

* PHP (versi yang sesuai dengan Laravel yang kamu gunakan, misal >= 8.1)
* Composer
* Node.js dan NPM
* Database Server (misalnya MySQL, MariaDB, PostgreSQL)

## Instalasi dan Setup Lokal

Berikut adalah langkah-langkah untuk menjalankan proyek ini di lingkungan lokal:

1.  **Clone Repository (Jika sudah ada di Git):**
    ```bash
    git clone https://github.com/albanysiswanto/tugas-webprog.git
    cd tugas-webprog
    ```
    Jika belum, pastikan kamu berada di direktori proyekmu.

2.  **Install Dependensi Composer:**
    ```bash
    composer install
    ```

3.  **Install Dependensi NPM:**
    ```bash
    npm install
    ```

4.  **Buat File Environment (`.env`):**
    Salin file `.env.example` menjadi `.env`.
    ```bash
    cp .env.example .env
    ```

5.  **Generate Application Key:**
    ```bash
    php artisan key:generate
    ```

6.  **Konfigurasi Database di `.env`:**
    Buka file `.env` dan sesuaikan pengaturan database berikut dengan konfigurasimu:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_kamu
    DB_USERNAME=username_database_kamu
    DB_PASSWORD=password_database_kamu
    ```
    Pastikan kamu sudah membuat database `nama_database_kamu` di server database-mu.

7.  **Jalankan Migrasi Database:**
    Perintah ini akan membuat tabel-tabel yang dibutuhkan (seperti `users`, `password_reset_tokens`, `journal_entries`, dll.) di database-mu.
    ```bash
    php artisan migrate
    ```

8.  **(Opsional) Jalankan Database Seeder:**
    Jika kamu memiliki seeder untuk data awal (misalnya, user admin atau data dummy).
    ```bash
    php artisan db:seed
    ```

9.  **Compile Aset Frontend:**
    Untuk pengembangan (dengan hot-reloading):
    ```bash
    npm run dev
    ```
    Untuk build produksi:
    ```bash
    npm run build
    ```

10. **Jalankan Server Pengembangan Laravel:**
    Di terminal lain (biarkan `npm run dev` tetap berjalan jika dalam mode pengembangan):
    ```bash
    php artisan serve
    ```
    Aplikasi akan tersedia di `http://localhost:8000` (atau port lain yang ditampilkan).

## Cara Penggunaan

1.  Buka aplikasi di browser.
2.  **Register:** Buat akun baru melalui halaman registrasi.
3.  **Login:** Masuk menggunakan akun yang sudah terdaftar.
4.  **Dashboard:** Setelah login, kamu akan diarahkan ke dashboard di mana kamu bisa melihat daftar jurnalmu.
5.  **Buat Jurnal:** Klik tombol "Tulis Jurnal Baru" untuk menambahkan entri jurnal.
6.  **Lihat, Edit, Hapus Jurnal:** Dari daftar jurnal, kamu bisa melihat detail, mengedit, atau menghapus jurnal yang ada.

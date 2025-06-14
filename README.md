# Simple & Unique Laravel Filament To-Do App

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Laravel v11.x](https://img.shields.io/badge/Laravel-v12.x-FF2D20?style=flat-square&logo=laravel)](https://laravel.com/)
[![Filament v3.x](https://img.shields.io/badge/Filament-v3.x-228B22?style=flat-square&logo=filament)](https://filamentphp.com/)

Aplikasi To-Do List sederhana namun unik yang dibangun dengan Laravel dan Filament Admin Panel. Aplikasi ini dirancang untuk membantu pengguna melacak tugas-tugas mereka, memisahkannya berdasarkan kategori proyek, dan memantau progres dengan cepat. Sangat cocok untuk individu yang ingin mengelola proyek koding, non-koding, atau tugas personal secara efektif.

## Fitur Utama

* **Manajemen Tugas:** Tambah, edit, dan tandai tugas sebagai selesai atau belum selesai.
* **Kategori Kustom:** Kelompokkan tugas ke dalam kategori yang dapat ditentukan sendiri (misalnya, "Proyek Koding", "Personal", "Pekerjaan Rumah").
* **Pelacakan Progres Kategori:** Lihat status progres (berapa banyak tugas yang belum selesai dari total) untuk setiap kategori langsung di daftar kategori. Angka tugas yang belum selesai diberi highlight visual.
* **UI Intuitif:** Antarmuka admin yang bersih dan mudah digunakan berkat Laravel Filament.

## Persyaratan Sistem

Pastikan sistem Anda memenuhi persyaratan Laravel dan Filament:

* PHP >= 8.2
* Composer
* Node.js & npm (untuk aset frontend Filament)
* Database (MySQL)

## Instalasi

Ikuti langkah-langkah di bawah ini untuk menginstal dan menjalankan aplikasi secara lokal:

1.  **Clone Repositori:**
    ```bash
    git clone [https://github.com/USERNAME_ANDA/NAMA_REPOSITORI_ANDA.git](https://github.com/USERNAME_ANDA/NAMA_REPOSITORI_ANDA.git)
    cd NAMA_REPOSITORI_ANDA
    ```
    *(Ganti `USERNAME_ANDA` dan `NAMA_REPOSITORI_ANDA` dengan detail GitHub-mu)*

2.  **Instal Dependensi Composer:**
    ```bash
    composer install
    ```

3.  **Salin File Environment:**
    ```bash
    cp .env.example .env
    ```

4.  **Buat Kunci Aplikasi:**
    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi Database:**
    Buka file `.env` dan konfigurasikan detail koneksi database Anda (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_anda
    DB_USERNAME=username_database_anda
    DB_PASSWORD=password_database_anda
    ```

6.  **Jalankan Migrasi Database:**
    ```bash
    php artisan migrate
    ```

7.  **Instal Node.js Dependencies & Build Assets:**
    ```bash
    npm install
    npm run build
    ```

8.  **Buat User Admin Filament:**
    ```bash
    php artisan make:filament-user
    ```
    Ikuti prompt untuk membuat user admin pertama Anda.

9.  **Jalankan Server Pengembangan:**
    ```bash
    php artisan serve
    ```

Aplikasi akan tersedia di `http://127.0.0.1:8000`. Panel admin Filament dapat diakses melalui `http://127.0.0.1:8000/admin`.

## Penggunaan

1.  **Login** ke panel admin Filament menggunakan kredensial user admin yang Anda buat.
2.  Navigasi ke **"Kategori Proyek"** di sidebar. Buat kategori-kategori Anda (misalnya, "Proyek Koding", "Personal", "Ide"). Anda dapat memberikan warna pada setiap kategori.
3.  Navigasi ke **"Daftar Tugas"** di sidebar.
4.  Klik tombol **"Buat Tugas Baru"** untuk menambahkan tugas baru. Pilih kategori yang sesuai, berikan judul, dan deskripsi (opsional).
5.  Pada daftar tugas, Anda dapat **mengedit** tugas, atau **menandainya sebagai selesai** menggunakan kolom "Selesai?".
6.  Pada daftar kategori, Anda dapat melihat **"Status Tugas"** yang menunjukkan berapa banyak tugas yang belum selesai dari total di setiap kategori, dengan highlight visual.

## Kontribusi

Kontribusi dipersilakan! Jika Anda menemukan bug atau memiliki saran fitur, silakan buka *issue* atau kirim *pull request*.

## Lisensi

Proyek ini dilisensikan di bawah Lisensi MIT.

---

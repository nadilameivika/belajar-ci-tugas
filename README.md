# Project Toko - Aplikasi Penjualan Berbasis Web dengan CodeIgniter 4

## Fitur

- **Manajemen Produk**  
  Pengguna dapat menambah, mengubah, menghapus, dan melihat daftar produk lengkap dengan foto produk.  
- **Manajemen Kategori Produk**  
  Pengelolaan kategori produk dengan fitur CRUD (Create, Read, Update, Delete).  
- **Keranjang Belanja**  
  Pengguna dapat menambahkan produk ke keranjang, mengubah jumlah produk, menghapus produk dari keranjang, dan mengosongkan keranjang.  
- **Proses Checkout dan Pembelian**  
  Pengguna dapat melakukan checkout produk di keranjang, menghitung ongkos kirim menggunakan API RajaOngkir, dan menyelesaikan pembelian yang akan disimpan sebagai transaksi.  
- **Manajemen Transaksi dan Status Pembelian**  
  Admin dapat melihat daftar pembelian dan mengubah status pesanan (misalnya dari belum diproses ke selesai).  
- **Autentikasi User**  
  Sistem login dan manajemen user untuk mengamankan akses aplikasi.  
- **Halaman FAQ dan Kontak**  
  Menyediakan halaman FAQ dan kontak untuk informasi dan bantuan pengguna.  
- **Fitur Diskon**  
  Mendukung pemberian diskon pada produk yang dapat diterapkan saat pembelian.  

## Instalasi

1. **Persyaratan Sistem**  
   - PHP versi 8.1 atau lebih tinggi  
   - Ekstensi PHP yang diperlukan: intl, mbstring, json, mysqlnd, libcurl  
   - Composer untuk manajemen dependensi  

2. **Instalasi Aplikasi**  
   - Clone atau download repository ini  
   - Jalankan perintah berikut untuk instalasi dependensi:  
     ```
     composer install
     ```  
   - Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi seperti `baseURL`, pengaturan database, dan API key RajaOngkir (`COST_KEY`).  

3. **Migrasi dan Seed Database**  
   - Jalankan migrasi database:  
     ```
     php spark migrate
     ```  
   - Jalankan seeder untuk data awal:  
     ```
     php spark db:seed UserSeeder
     php spark db:seed ProductCategorySeeder
     php spark db:seed ProductSeeder
     php spark db:seed DiskonSeeder
     ```  

4. **Konfigurasi Web Server**  
   - Arahkan root web server ke folder `public` pada project ini untuk keamanan dan pemisahan komponen.  
   - Contoh konfigurasi virtual host pada Apache atau Nginx diarahkan ke folder `public`.  

5. **Menjalankan Aplikasi**  
   - Jalankan server development CodeIgniter:  
     ```
     php spark serve
     ```  
   - Akses aplikasi melalui browser di alamat `http://localhost:8080` (atau sesuai konfigurasi `baseURL`).  

## Struktur Proyek

- `app/Controllers`  
  Berisi controller yang mengatur logika aplikasi, seperti pengelolaan produk, kategori, transaksi, autentikasi, dan halaman statis.  

- `app/Models`  
  Model yang berinteraksi dengan database, seperti model produk, kategori produk, transaksi, detail transaksi, diskon, dan user.  

- `app/Views`  
  Folder berisi file tampilan (view) aplikasi, termasuk layout, komponen, dan halaman seperti produk, keranjang, checkout, pembelian, FAQ, dan kontak.  

- `app/Database/Migrations`  
  Skrip migrasi database untuk membuat tabel-tabel yang dibutuhkan aplikasi.  

- `app/Database/Seeds`  
  Data awal untuk mengisi tabel database seperti user, kategori produk, produk, dan diskon.  

- `app/Config`  
  Konfigurasi aplikasi CodeIgniter, seperti routing, database, filter, dan layanan lainnya.  

- `public/`  
  Folder publik yang berisi file index.php, aset seperti gambar, CSS, dan JavaScript yang dapat diakses oleh pengguna.  

---

README ini memberikan gambaran lengkap mengenai fitur, cara instalasi, dan struktur proyek aplikasi Toko berbasis CodeIgniter 4.

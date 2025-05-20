# Anggrek AI

Anggrek AI adalah sistem informasi berbasis website yang berfungsi sebagai platform manajemen stok anggrek sekaligus alat deteksi penyakit tanaman anggrek berbasis kecerdasan buatan (AI). Sistem ini dikembangkan untuk membantu Kebun Anggrek Budi Vespa Endut dalam meningkatkan efisiensi operasional perkebunan serta mengoptimalkan pengelolaan inventaris dan deteksi dini penyakit pada tanaman anggrek.

## Fitur Utama

- **Manajemen Stok Anggrek**  
  Memudahkan pencatatan, pemantauan, dan pengelolaan stok anggrek secara digital.
- **Deteksi Penyakit Anggrek Berbasis AI**  
  Membantu mendeteksi dini penyakit pada tanaman anggrek menggunakan teknologi kecerdasan buatan.
- **Manajemen Inventaris Perkebunan**  
  Mengelola seluruh inventaris perkebunan agar lebih terorganisir.
- **Pengelolaan Karyawan**  
  Memudahkan dalam pencatatan dan manajemen data karyawan perkebunan.
- **Artikel dan Informasi**  
  Menyediakan artikel serta informasi terkait perawatan dan pengelolaan anggrek.

## Teknologi yang Digunakan

- **Blade dan Tailwind** (Frontend templating)
- **PHP** (Backend development)
- **Computer Vision** (untuk deteksi penyakit) 
- Database (contoh: MySQL)

## Cara Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/Saptamabar/PPL-G1.git
   cd PPL-G1
   ```

2. **Instalasi Dependency**
   - Pastikan sudah menginstall PHP, Composer, dan dependency lain yang dibutuhkan.
   - Jalankan:
     ```bash
     composer install
     npm install
     ```

3. **Konfigurasi Lingkungan**
   - Salin `.env.example` menjadi `.env`
   - Atur konfigurasi database dan environment sesuai kebutuhan.
   - Tambahkan API Key roboflow untuk deteksi penyakit
   - Tambahkan API cloudinary untuk object storage

4. **Migrasi Database**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. **Menjalankan Aplikasi**
   ```bash
   php artisan serve
   npm run dev
   ```

Made with ❤️ by PPL-G1

# [Intro](#intro)
Potret-Edu adalah sistem manajemen kafe yang komprehensif, dirancang untuk memperlancar operasi dengan melibatkan berbagai peran pengguna, termasuk Admin, Kasir, Pelayan, dan Staf Dapur. Proyek ini memastikan sinkronisasi data secara real-time untuk mencegah masalah dalam pemrosesan pesanan, sehingga meningkatkan efisiensi dan akurasi operasional kafe. Dari pengelolaan peran pengguna hingga penanganan pesanan secara mulus, Potret-Edu bertujuan untuk menyediakan solusi yang kokoh untuk manajemen kafe modern.

# Instalasi Dan Konfigurasi
- ## Tech
   #### - [Laravel 10]
   #### - [Tailwind CSS]
   #### - [Laravel Livewire]

 - ## Instalasi
   - #### Lakukan Clone pada Github Repositori ini
        - Klik tombol "Code" (berwarna hijau) untuk mendapatkan URL repository. Jika menggunakan HTTPS, salin URL tersebut. Jika menggunakan SSH, klik ikon SSH dan salin URL SSH.
        - Buka terminal, command prompt atau Git Bash(rekomendasi) di komputer Anda.
        - Pindah ke direktori di mana Anda ingin menyimpan salinan lokal repository. Gunakan perintah cd untuk berpindah ke direktori tersebut.
          #### Contoh:
              cd path/ke/direktori/tujuan
        - Gunakan perintah git clone dengan menyertakan URL repository yang telah Anda salin sebelumnya.
          #### Contoh untuk HTTPS:
              git clone https://github.com/nama-akun/nama-repo.git
          #### Atau untuk SSH:
              git clone git@github.com:nama-akun/nama-repo.git
   - #### Jalankan Di Code Editor
       - Buka Terminal di direktori penyimpanan project.
   - #### Install Dependensi
     #### - Jalankan perintah berikut:
         composer install
     #### - Selanjutnya, jalankan perintah berikut:
         npm install
   - #### Buat Salinan File Konfigurasi
     - Salin file `.env.example` dan beri nama baru menjadi `.env`
       #### Jalankan Perintah Berikut:
           cp .env.example .env
   - #### Konfigurasi file `.env`
     - # Masukkan pengaturan untuk storage file .env
             FILESYSTEM_DISK=public
   - #### Generate Application Key
     #### Jalankan perintah berikut di terminal:
         php artisan key:generate
   - #### Jalankan Migrasi dan Seeder
     Jalankan perintah migrasi untuk membuat struktur table
     #### jalankan perintah berikut:
         php artisan migrate
     Jalankan perintah seeder untuk mengisi data pada table dengan data dummy
     #### jalankan perintah berikut:
         php artisan db:seed
   - #### Jalankan Server Lokal
     #### jalankan perintah berikut:
         php artisan serve
     #### lalu
         php artisan storage:link
     #### dan
         npm run dev
   - #### Buka Proyek di Browser
      Buka browser dan kunjungi alamat yang ditampilkan di terminal. Biasanya, ini adalah `http://127.0.0.1:8000`.

     #### NB:
         Username: -cek dimysql-
         Password: password

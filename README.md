# 💻 TEMPLATE LAPORAN PROYEK: PENGEMBANGAN WEB SERVER DAN APLIKASI SEDERHANA

**Proyek:** [JUDUL PROYEK KELOMPOK KALIAN]

Proyek ini dibuat untuk memenuhi tugas mata pelajaran **Administrasi Sistem Jaringan (ASJ)**, yang merupakan salah satu elemen Capaian Pembelajaran Konsentrasi Keahlian Teknik Komputer dan Jaringan (**CP KKTKJ**) pada program TJKT. Proyek ini berfokus pada implementasi layanan Web Server, konfigurasi PHP, dan pengamanan koneksi menggunakan SSL/HTTPS.

---

### 1. 👥 Informasi Kelompok dan Spesifikasi Lingkungan Praktik

#### 1.1. Informasi Kelompok

| Peran | Nama Lengkap | Kelas |
| :--- | :--- | :--- |
| **Ketua Kelompok** | M. Albani Habib Busyron | XI TJKT 2 |
| Anggota 1 | Giovanni Azzahra | XI TJKT 2 |
| Anggota 2 | Riana Sri Agustiani | XI TJKT 2 |
| Anggota 3 | Widi Hesti Melani | XI TJKT 2 |
| **Nama Sekolah/Institusi** | [Nama Sekolah/Institusi Kalian] | |

#### 1.2. Spesifikasi Alat dan Bahan (Host) 🛠️

| Komponen | Deskripsi / Versi |
| :--- | :--- |
| **Virtualisasi** | VMware Workstation 17 Pro |
| **Sistem Operasi Host** | PC utama, VmWare 17 Pro |
| **RAM Host (Minimal)** | 8 GB |
| **CPU Host** | Intel Core i5 Generasi ke-4 |

#### 1.3. Spesifikasi Server Virtual (VM) 🖥️

| Spesifikasi | Detail |
| :--- | :--- |
| **Sistem Operasi Tamu (Guest OS)** | Debian Trixie (12.x) |
| **Alamat IP Server** | `192.168.1.7` |
| **RAM VM** |  2 GB |
| **vCPU** | 1 Core |
| **Web Server yang Dipilih** | Nginx |
| **Versi PHP yang Dipakai** | php-fpm |

---

### 2. 📝 Dokumentasi Teknis dan Langkah-Langkah Pengerjaan

Perbarui semua paket agar Debian siap digunakan
```bash
apt update && apt upgrade
```
Pasang web server Nginx
```bash
apt install nginx
```
Jalankan dan aktifkan otomatis saat boot:
```bash
systemctl start nginx
systemctl enable nginx
```
Cek status:
```bash
systemctl status nginx
```
Jika statusnya active (running), berarti Nginx sudah berjalan.
Buka browser dan akses: http://ip-server
Jika muncul halaman “Welcome to Nginx!”, berarti server aktif. 🎉
   
 **Instalasi PHP 8.4 🐘** 
Agar server bisa menjalankan file .php, pasang PHP dan modul pendukung:
```bash
apt install php8.4-fpm php8.4-cli
```
Periksa apakah PHP-FPM aktif:
```bash
systemctl status php8.4-fpm
```
 **Mengaktifkan PHP di Konfigurasi Default Nginx ⚙️📄**
Supaya mudah kita tulis ulang saja konfigurasinya, namun sebelumnya kita backup dulu file aslinya:
```bash
mv /etc/nginx/sites-available/default /etc/nginx/sites-available/default.asli
```
Buka/buat file konfigurasi bawaan Nginx:
```bash
nano /etc/nginx/sites-available/default
```
Sesuaikan atau edit seperti contoh berikut: (plis dibaca dan dipelajari bukan hanya copas🥺)
```bash
server {
    listen 80 default_server;          # Dengarkan koneksi HTTP di port 80 (standar web)
    listen [::]:80 default_server;     # Dukungan untuk IPv6

    root /var/www/html;                # Folder utama tempat file website disimpan
    index index.php index.html;        # Urutan file index yang akan dicari pertama kali

    server_name _;                     # "_" artinya menerima semua nama domain/host

    # Bagian utama untuk menangani request ke website
    location / {
        # Coba tampilkan file sesuai permintaan
        # Jika tidak ada, coba foldernya
        # Jika tetap tidak ada, arahkan ke index.php (penting untuk WordPress, Moodle, dll.)
        try_files $uri $uri/ /index.php?$query_string;
    }

    # Bagian untuk menjalankan file PHP
    location ~ \.php$ {
        include snippets/fastcgi-php.conf;             # Include konfigurasi standar PHP-FPM
        fastcgi_pass unix:/run/php/php8.4-fpm.sock;    # Jalur socket PHP-FPM versi 8.4

        # Beritahu PHP file mana yang harus dijalankan
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;                        # Include parameter tambahan untuk PHP
    }

    # Bagian untuk file statis (gambar, CSS, JS, font, dll.)
    # Dikasih aturan cache supaya website lebih cepat dibuka
    location ~* \.(?:ico|css|js|gif|jpe?g|png|woff2?|eot|ttf|svg|mp4)$ {
        expires 6M;             # Browser boleh menyimpan file ini 6 bulan
        access_log off;         # Jangan dicatat di log akses (hemat space/log)
        log_not_found off;      # Jangan catat kalau file statis tidak ditemukan
    }

    # Lindungi file .htaccess atau file tersembunyi (.ht*)
    # Biasanya digunakan Apache, tapi tetap diblokir di Nginx agar aman
    location ~ /\.ht {
        deny all;
    }
}
```
Simpan (Ctrl+O, Enter) dan keluar (Ctrl+X)
Uji konfigurasi:
```bash
nginx -t
```
Jika hasilnya syntax is ok, restart Nginx:
```bash
systemctl restart nginx
```
**Menguji PHP 🚀**
```bash
Buat file uji coba di direktori bawaan Nginx:
nano /var/www/html/info.php
```
Masukan script berikut:
```bash
<?php
   phpinfo();
?>
```
Buka web browser dan akses http://ip-server/info.php
Jika muncul halaman informasi PHP, artinya Nginx dan PHP sudah terhubung dengannano /var/www/html/info.php
Masukan script berikut:
<?php
   phpinfo();
?>
Buka web browser dan akses http://ip-server/info.php
Jika muncul halaman informasi PHP, artinya Nginx dan PHP sudah terhubung dengan baik.

### B. Konfigurasi Lanjutan: Menambahkan SSL Self-Signed di Nginx
SSL/TLS adalah teknologi yang membuat koneksi antara server dan pengguna jadi aman, karena data yang dikirim akan dienkripsi (disamarkan) agar tidak mudah dibaca orang lain.
Untuk latihan, kita coba buat sertifikat SSL sendiri (self-signed) dan pasang di Nginx supaya website kita bisa diakses lewat HTTPS

Menambahkan Sertifikat SSL Self-Signed 🔐
Pertama, buat folder untuk menyimpan sertifikat:
```bash
mkdir /etc/ssl/nginx
```
Pastikan openssl sudah ter-install:
```bash
apt install openssl
```
Lalu buat sertifikat dan key:
```bash
openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/nginx/selfsigned.key -out /etc/ssl/nginx/selfsigned.crt
```
Setelah selfsigned.key dan selfsigned.crt berhasil di buat, kita masukan kedalam konfigurasi website kita:
```bash
nano /etc/nginx/sites-available/default
```
Ubah isinya sekaligus pelajari scripnya seperti dibawah ini :
```bash
# ==========================
# Konfigurasi HTTP (port 80)
# ==========================
server {
    listen 80 default_server;          # Dengarkan koneksi HTTP di port 80
    listen [::]:80 default_server;     # Dukungan untuk IPv6

    root /var/www/html;                # Folder utama untuk file website
    index index.php index.html;        # File index yang akan dicari pertama

    server_name _;                     # "_" artinya menerima semua nama domain/host

    # Bagian utama untuk menangani request
    location / {
        # Coba tampilkan file/ folder sesuai permintaan
        # Jika tidak ada, teruskan ke index.php (penting untuk WordPress/Moodle)
        try_files $uri $uri/ /index.php?$query_string;
    }

    # Bagian untuk menjalankan file PHP
    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.4-fpm.sock; # Jalur socket PHP-FPM

        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # Lindungi file tersembunyi (.htaccess, .git, .env, dll.)
    location ~ /\.(?!well-known).* {
        deny all;
    }

    # Atur caching untuk file statis (gambar, css, js, font, video)
    location ~* \.(?:ico|css|js|gif|jpe?g|png|woff2?|eot|ttf|svg|mp4)$ {
        expires 6M;             # Simpan cache selama 6 bulan
        access_log off;         # Tidak perlu dicatat di access log
        log_not_found off;      # Jika file tidak ada, jangan penuhkan log
    }
}

# ==========================
# Konfigurasi HTTPS (port 443, SSL/TLS)
# ==========================
server {
    listen 443 ssl default_server;      # Dengarkan koneksi HTTPS di port 443
    listen [::]:443 ssl default_server; # Dukungan untuk IPv6

    root /var/www/html;                 # Sama seperti HTTP
    index index.php index.html;
    server_name _;

    # Lokasi sertifikat SSL self-signed
    ssl_certificate /etc/ssl/nginx/selfsigned.crt;
    ssl_certificate_key /etc/ssl/nginx/selfsigned.key;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.4-fpm.sock;

        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    location ~* \.(?:ico|css|js|gif|jpe?g|png|woff2?|eot|ttf|svg|mp4)$ {
        expires 6M;
        access_log off;
        log_not_found off;
    }
}
```
Uji dan Restart Nginx untuk melihat apakah ssl sudah terpasang
```bash
nginx -t
systemctl restart nginx
```
Buka di web browser
```bash
https://ip-server
```
Browser akan memberi peringatan “Not Secure” atau “Untrusted Certificate”. Klik Advanced → Proceed untuk lanjut.
Klik Lanjutkan dan anda akan ketemu error 404 😱, tenang, itu artinya halaman yang di tuju tidak ada, dan memang tidak ada karena kita belum buat file index.php, jadi silahkan buatkan dulu...
```bash
nano /var/www/html/index.php
```
Isi dengan script sederhana, boleh gunakan bahasa html
```bash
<?php
   echo 'Selamat datang di situs saya!';
?>
```
Jika beruntung, maka akan muncul halaman website kita... 🎉



### 3. 📊 Analisis Web Server

Berdasarkan pengalaman kami dalam proyek ini, berikut adalah analisis kelebihan dan kekurangan dari *Web Server* yang kami gunakan:

| Aspek | Kelebihan ([NAMA WEB SERVER]) 👍 | Kekurangan ([NAMA WEB SERVER]) 👎 |
| :--- | :--- | :--- |
| **Performa & Kecepatan** | Mampu menangani banyak koneksi secara bersamaan (high concurrency) | Performanya bisa turun jika konfigurasi tidak optimal |
| **Kemudahan Konfigurasi**| Konfigurasi cukup fleksibel dan mudah dipahami untuk kebutuhan umum | Untuk pemula, beberapa directive terasa membingungkan |
| **Fitur & Modularitas** | Mendukung reverse proxy, load balancing, caching, dan keamanan yang kuat | Modul tidak bisa dimuat secara dinamis (harus compile ulang jika ingin custom module) |

---

### 4. 🧠 Refleksi Proyek: Kesan dan Kendala

#### 4.1. Kesan Selama Proses Pengerjaan ✨

[Tuliskan kesan anggota kelompok, misalnya: "Kami merasa mendapatkan banyak ilmu baru, terutama dalam praktik Version Control menggunakan Git dan GitHub yang belum pernah kami lakukan sebelumnya."]

#### 4.2. Kendala dan Solusi yang Diterapkan 💡

| Kendala yang Kalian Hadapi 🚧 | Solusi yang Ditemukan ✅ |
| :--- | :--- |
| [Tuliskan kendala teknis atau kolaborasi lain yang Kalian hadapi.] | [Jelaskan solusi spesifik Kalian.] |

---

### 5. 📂 Dokumentasi Konten Website

Seluruh *source code* (Halaman Utama dan Halaman Profil) yang berada di *document root* server telah disalin dan di-*commit* ke dalam folder `/html` di *repository* GitHub ini.

---

### 6. 🎬 Dokumentasi Video Pengerjaan

Seluruh proses pengerjaan telah direkam dan diunggah ke YouTube.

**Link Video YouTube:**

[![Thumbnail Video](https://i.ytimg.com/vi/jhFOQtKPJRc/hqdefault.jpg)](https://youtu.be/jhFOQtKPJRc?si=0tClDtF_yx4SGV-j)


**PETUNJUK:** Ganti semua teks di dalam tanda kurung siku `[ ... ]` dengan informasi proyek yang relevan.

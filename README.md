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
| Anggota 2 | M. Albani Habib Busyron | XI TJKT 2 |
| Anggota 1 | Riana Sri Agustiani | XI TJKT 2 |
| Anggota 2 | Widi Hesti Melani | XI TJKT 2 |
| **Nama Sekolah/Institusi** | [Nama Sekolah/Institusi Kalian] | |

#### 1.2. Spesifikasi Alat dan Bahan (Host) 🛠️

| Komponen | Deskripsi / Versi |
| :--- | :--- |
| **Virtualisasi** | [Versi VMware Workstation yang Digunakan, contoh: VMware Workstation 17 Pro] |
| **Sistem Operasi Host** | [OS yang digunakan di laptop/PC utama, contoh: Windows 11 / macOS Sonoma] |
| **RAM Host (Minimal)** | [RAM Minimal yang digunakan di Host, contoh: 8 GB] |
| **CPU Host** | [Tuliskan jenis/seri CPU, contoh: Intel Core i5 Generasi ke-10] |

#### 1.3. Spesifikasi Server Virtual (VM) 🖥️

| Spesifikasi | Detail |
| :--- | :--- |
| **Sistem Operasi Tamu (Guest OS)** | Debian Trixie (12.x) |
| **Alamat IP Server** | `[Tuliskan Alamat IP Lokal Server]` |
| **RAM VM** | [Jumlah RAM yang dialokasikan untuk VM, contoh: 2 GB] |
| **vCPU** | [Jumlah Core CPU yang dialokasikan untuk VM, contoh: 2 Core] |
| **Web Server yang Dipilih** | **[Apache2 / Nginx / OpenLiteSpeed]** |
| **Versi PHP yang Dipakai** | **[mod_php / php-fpm / lsphp]** |

---

### 2. 📝 Dokumentasi Teknis dan Langkah-Langkah Pengerjaan

#### Perbarui semua paket agar Debian siap digunakan
```bash
apt update && apt upgrade
```
Pasang web server Nginx
apt install nginx
Jalankan dan aktifkan otomatis saat boot:
systemctl start nginx
systemctl enable nginx

#### 2.2. Instalasi dan Konfigurasi Web Server 🌐

Kami menggunakan **[NAMA WEB SERVER]**. Berikut langkah-langkah utamanya:

* **Instalasi:**
    ```bash
    # [Tuliskan perintah instalasi Web Server Kalian, contoh: sudo apt install nginx -y]
    ```
* **Konfigurasi Virtual Host/Server Block:**
    [Jelaskan secara singkat penyesuaian konfigurasi yang Kalian lakukan pada file utama, misalnya penentuan Document Root dan port.]

#### 2.3. Konfigurasi PHP 🐘

Kami menggunakan **[JENIS PHP: mod_php / php-fpm / lsphp]** untuk mengintegrasikan PHP dengan *Web Server*.

* **Instalasi PHP:**
    ```bash
    # [Tuliskan perintah instalasi PHP dan modul yang dibutuhkan]
    sudo apt install php-fpm php-mysql
    ```
* **Integrasi:**
    [Jelaskan langkah-langkah integrasi antara PHP dengan Web Server yang Kalian pilih.]

#### 2.4. Implementasi SSL (HTTPS) 🔒

Untuk mengaktifkan akses HTTPS, kami membuat *self-signed certificate*.

1.  Membuat direktori untuk *certificate*.
2.  Membuat *Key* dan *Certificate* menggunakan OpenSSL.
3.  Memodifikasi konfigurasi *Web Server* untuk menggunakan port **443** dan menunjuk ke *certificate* yang telah dibuat, serta memastikan akses dapat dilakukan melalui `https://[IP_SERVER]`.

---

### 3. 📊 Analisis Web Server

Berdasarkan pengalaman kami dalam proyek ini, berikut adalah analisis kelebihan dan kekurangan dari *Web Server* yang kami gunakan:

| Aspek | Kelebihan ([NAMA WEB SERVER]) 👍 | Kekurangan ([NAMA WEB SERVER]) 👎 |
| :--- | :--- | :--- |
| **Performa & Kecepatan** | [Tuliskan kelebihannya.] | [Tuliskan kekurangannya.] |
| **Kemudahan Konfigurasi**| [Tuliskan kelebihannya.] | [Tuliskan kekurangannya.] |
| **Fitur & Modularitas** | [Tuliskan kelebihannya.] | [Tuliskan kekurangannya.] |

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

[![Thumbnail Video Pengerjaan](https://img.youtube.com/vi/1-qlNtQS1OA/0.jpg)](https://www.youtube.com/watch?v=1-qlNtQS1OA)

**PETUNJUK:** Ganti semua teks di dalam tanda kurung siku `[ ... ]` dengan informasi proyek yang relevan.

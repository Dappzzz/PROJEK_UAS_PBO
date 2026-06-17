# 👟 ZXYAN Footwear - E-Commerce Application (UAS PBO)

Aplikasi *e-commerce* premium berbasis web untuk toko sepatu, dikembangkan menggunakan arsitektur **MVC (Model-View-Controller)** dan menerapkan prinsip **OOP (Object-Oriented Programming)** secara komprehensif menggunakan PHP Native. 

Proyek ini dibangun untuk memenuhi Tugas Ujian Akhir Semester (UAS) mata kuliah Pemrograman Berorientasi Objek.

---

## 🚀 Fitur Utama (CRUD & Fungsionalitas)

**1. Sisi Pengguna (Customer):**
*   **Katalog Interaktif:** Menampilkan produk sepatu dengan sistem **Pagination** (8 item per halaman).
*   **Detail Produk Cerdas:** Menampilkan *Key Features* yang menyesuaikan secara dinamis (*polymorphic*) berdasarkan tipe sepatu (Sport, Formal, Casual). Dilengkapi fitur Modal *Size Guide* dan *Tech Specs*.
*   **Keranjang Belanja:** Menambah produk ke keranjang belanja dengan desain antarmuka modern.
*   **Checkout & Pembayaran:** Proses *checkout* lengkap dengan kalkulasi total harga dan integrasi *dummy barcode* **QRIS**.

**2. Sisi Admin (Master Data):**
*   **Create:** Menambah data sepatu baru beserta atribut khususnya (Bahan, Teknologi, Gaya, dll).
*   **Read:** Melihat seluruh data sepatu dalam bentuk tabel.
*   **Update:** Mengedit data sepatu (termasuk mengganti gambar dan memperbarui atribut spesifik).
*   **Delete:** Menghapus data sepatu dari *database* secara permanen.

---

## 🧩 Implementasi Konsep PBO (OOP)

Aplikasi ini menerapkan standar industri dengan mengimplementasikan konsep-konsep inti PBO:

1.  **Inheritance (Pewarisan):** 
    Terdapat *Super Class* `Produk` yang menurunkan sifat (Atribut dasar seperti ID, Nama, Harga, Stok) ke *Sub Class* seperti `SepatuSport`, `SepatuFormal`, dan `SepatuCasual`. Model Database (`SepatuModel`) juga mewarisi fungsionalitas dari kelas `Database`.
2.  **Polymorphism (Polimorfisme):** 
    Objek diperlakukan sebagai kelas induk (`Produk`) saat ditampilkan di katalog utama. Namun, saat pengguna membuka halaman Detail, antarmuka (UI) akan mengeksekusi *method* yang berbeda sesuai dengan tipe kelas aslinya secara dinamis (Misal: memanggil `getJenisOlahraga()` untuk sepatu Sport, dan `getBahan()` untuk sepatu Formal).
3.  **Aggregation (Agregasi):** 
    Diterapkan pada kelas `KatalogToko`, di mana "Toko" memiliki atau menampung sekumpulan (*array*) objek "Produk".
4.  **Dependency (Ketergantungan):** 
    Kelas `KatalogController` sangat bergantung pada instansiasi objek `SepatuModel` untuk dapat berkomunikasi dengan basis data (MySQL).

---

## 🛠️ Teknologi yang Digunakan

*   **Bahasa Pemrograman:** PHP (Native / Vanilla OOP)
*   **Database:** MySQL (MariaDB)
*   **Styling / UI:** Tailwind CSS (via CDN) & HTML5
*   **Architecture:** MVC (Model, View, Controller)
*   **Local Environment:** Laragon / XAMPP

---

## ⚙️ Panduan Instalasi & Menjalankan Aplikasi
1. **Clone Repository:**
```bash
   git clone [https://github.com/Dappzzzz/PROJEK_UAS_PBO.git](https://github.com/Dappzzzz/PROJEK_UAS_PBO.git)

2. **Setup Direktori:** Pindahkan folder proyek ke dalam direktori *server* lokal Anda (contoh: `C:\laragon\www\` atau `C:\xampp\htdocs\`).

3. **Setup Database:**
   - Buka phpMyAdmin / HeidiSQL.
   - Buat *database* baru dengan nama **`db_tokosepatu`**.
   - Lakukan *Import* pada file **`db_tokosepatu.sql`** yang sudah disertakan di dalam *root* folder proyek ini.

4. **Jalankan Aplikasi:**
   - Buka *browser* dan akses: `http://localhost/PROJEK_UAS_PBO` (sesuaikan dengan nama folder Anda).

---

## 🔑 Akun Dummy untuk Testing

**👨‍💼 Akses Admin:**
- Username: `admin`
- Password: `admin123`

**👤 Akses Customer:**
- Username: `risyad`
- Password: `12345`

---

## 👨‍💻 Author

**Risyad Maulana Daffa_24081010057 ** *Pemrograman Berorientasi Objek*
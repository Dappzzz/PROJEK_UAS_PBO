<?php
// File: controllers/AdminController.php

// Panggil Model yang menampung koneksi dan fungsi database
require_once __DIR__ . '/../MODEL/SepatuModel.php';

class AdminController
{
    // Enkapsulasi: Object model disimpan private agar aman
    private $model;

    public function __construct()
    {
        $this->model = new SepatuModel();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Mencegah penyusup dan mengatur no-cache
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
            header("Location: auth.php?action=login");
            exit();
        }

        // Mencegah Browser Caching
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }

    // Fungsi utama untuk mengatur routing / perpindahan alur halaman
    public function handleRequest()
    {
        // Cek URL: misal admin.php?action=tambah
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';

        if ($action == 'tambah') {
            $this->tambahData();
        } elseif ($action == 'hapus') {
            $this->hapusData();
        } elseif ($action == 'edit') {
            $this->halamanEdit(); // Tampilkan halaman form edit
        } elseif ($action == 'proses_edit') {
            $this->prosesEdit(); // Simpan perubahan edit
        } else {
            $this->index(); // Tampilan awal (Tabel CRUD)
        }
    }

    // READ: Mengambil data dari Model, lalu melemparnya ke View utama
    public function index()
    {
        $dataSepatu = $this->model->getAllSepatu();
        require_once __DIR__ . '/../VIEW/admin_view.php';
    }

    // CREATE: Memproses form penambahan data sepatu
    public function tambahData()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $deskripsi = $_POST['deskripsi'];
            $stok = $_POST['stok'];
            $ukuran = $_POST['ukuran'];
            $warna = $_POST['warna'];
            $merek = $_POST['merek'];
            $gender = $_POST['gender'];
            $tipe = $_POST['tipe_sepatu'];

            // Atribut khusus Polimorfisme (diambil jika ada, dikosongkan jika tidak relevan)
            $jenis_olahraga = !empty($_POST['jenis_olahraga']) ? $_POST['jenis_olahraga'] : NULL;
            $teknologi = !empty($_POST['teknologi']) ? $_POST['teknologi'] : NULL;
            $berat_gram = !empty($_POST['berat_gram']) ? $_POST['berat_gram'] : NULL;
            $bahan = !empty($_POST['bahan']) ? $_POST['bahan'] : NULL;
            $tinggi_hak = !empty($_POST['tinggi_hak']) ? $_POST['tinggi_hak'] : NULL;
            $sertifikasi = !empty($_POST['sertifikasi']) ? $_POST['sertifikasi'] : NULL;
            $gaya = !empty($_POST['gaya']) ? $_POST['gaya'] : NULL;
            $material = !empty($_POST['material']) ? $_POST['material'] : NULL;
            $edisi_terbatas = isset($_POST['edisi_terbatas']) ? 1 : 0;

            // LOGIKA UPLOAD GAMBAR KE FOLDER ASSETS
            $gambar = 'default_shoes.png';
            if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != '') {
                $namaFile = $_FILES['gambar']['name'];
                $tmpName = $_FILES['gambar']['tmp_name'];

                // Ambil ekstensi (misal: .jpg, .png) dan ganti nama filenya agar unik
                $ext = pathinfo($namaFile, PATHINFO_EXTENSION);
                $gambarBaru = $id . '_' . time() . '.' . $ext;

                // Pindahkan file fisik ke folder assets/img
                $tujuan = __DIR__ . '/../assets/img/' . $gambarBaru;
                if (move_uploaded_file($tmpName, $tujuan)) {
                    $gambar = $gambarBaru;
                }
            }

            // Panggil fungsi tambahSepatu di Model
            $this->model->tambahSepatu($id, $nama, $harga, $deskripsi, $stok, $ukuran, $warna, $merek, $gender, $tipe, $gambar, $jenis_olahraga, $teknologi, $berat_gram, $bahan, $tinggi_hak, $sertifikasi, $gaya, $material, $edisi_terbatas);

            // Redirect ke halaman admin awal
            header("Location: admin.php");
            exit();
        }
    }

    // DELETE: Menghapus sepatu beserta file gambarnya
    public function hapusData()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Hapus file gambar dari folder (kecuali jika gambarnya default)
            $sepatu = $this->model->getSepatuById($id);
            if ($sepatu && $sepatu['gambar'] != 'default_shoes.png') {
                $pathGambar = __DIR__ . '/../assets/img/' . $sepatu['gambar'];
                if (file_exists($pathGambar)) {
                    unlink($pathGambar); // Menghapus file fisik gambar
                }
            }

            // Hapus baris data di database
            $this->model->hapusSepatu($id);
        }
        header("Location: admin.php");
        exit();
    }

    // READ (Edit): Menampilkan halaman form edit beserta data lamanya
    public function halamanEdit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // Ambil data sepatu yang mau diedit dari database
            $sepatu = $this->model->getSepatuById($id);

            // Lempar datanya ke view edit
            require_once __DIR__ . '/../VIEW/edit_view.php';
        }
    }

    // UPDATE: Memproses hasil dari form edit
    public function prosesEdit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id']; // ID tidak berubah
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $deskripsi = $_POST['deskripsi'];
            $stok = $_POST['stok'];
            $ukuran = $_POST['ukuran'];
            $warna = $_POST['warna'];
            $merek = $_POST['merek'];
            $gender = $_POST['gender'];
            $tipe = $_POST['tipe_sepatu'];

            $jenis_olahraga = !empty($_POST['jenis_olahraga']) ? $_POST['jenis_olahraga'] : NULL;
            $teknologi = !empty($_POST['teknologi']) ? $_POST['teknologi'] : NULL;
            $berat_gram = !empty($_POST['berat_gram']) ? $_POST['berat_gram'] : NULL;
            $bahan = !empty($_POST['bahan']) ? $_POST['bahan'] : NULL;
            $tinggi_hak = !empty($_POST['tinggi_hak']) ? $_POST['tinggi_hak'] : NULL;
            $sertifikasi = !empty($_POST['sertifikasi']) ? $_POST['sertifikasi'] : NULL;
            $gaya = !empty($_POST['gaya']) ? $_POST['gaya'] : NULL;
            $material = !empty($_POST['material']) ? $_POST['material'] : NULL;
            $edisi_terbatas = isset($_POST['edisi_terbatas']) ? 1 : 0;

            // Logika Gambar (Cek apakah ada gambar baru yang diunggah)
            $sepatuLama = $this->model->getSepatuById($id);
            $gambar = $sepatuLama['gambar'];

            if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != '') {
                $namaFile = $_FILES['gambar']['name'];
                $tmpName = $_FILES['gambar']['tmp_name'];
                $ext = pathinfo($namaFile, PATHINFO_EXTENSION);
                $gambarBaru = $id . '_update_' . time() . '.' . $ext;

                $tujuan = __DIR__ . '/../assets/img/' . $gambarBaru;
                // Jika gambar baru berhasil diupload...
                if (move_uploaded_file($tmpName, $tujuan)) {
                    $gambar = $gambarBaru; // Gunakan nama gambar yang baru

                    // ...lalu hapus gambar lama dari folder (selama bukan default)
                    if ($sepatuLama['gambar'] != 'default_shoes.png') {
                        $pathGambarLama = __DIR__ . '/../assets/img/' . $sepatuLama['gambar'];
                        if (file_exists($pathGambarLama)) {
                            unlink($pathGambarLama);
                        }
                    }
                }
            }

            // Simpan perubahan ke database
            $this->model->updateSepatu($id, $nama, $harga, $deskripsi, $stok, $ukuran, $warna, $merek, $gender, $tipe, $gambar, $jenis_olahraga, $teknologi, $berat_gram, $bahan, $tinggi_hak, $sertifikasi, $gaya, $material, $edisi_terbatas);

            // Redirect kembali ke dasbor utama admin
            header("Location: admin.php");
            exit();
        }
    }
}

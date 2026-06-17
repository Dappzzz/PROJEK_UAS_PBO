<?php
// File: CONTROLLER/KatalogController.php

require_once __DIR__ . '/../MODEL/SepatuModel.php';
require_once __DIR__ . '/../CLASS/SepatuSport.php';
require_once __DIR__ . '/../CLASS/SepatuFormal.php';
require_once __DIR__ . '/../CLASS/SepatuCasual.php';
require_once __DIR__ . '/../CLASS/KatalogToko.php';

class KatalogController
{
    private $model;

    public function __construct()
    {
        $this->model = new SepatuModel();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Mencegah Browser Caching
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }

    public function handleRequest()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';
        if ($action == 'detail') {
            $this->detail();
        } else {
            $this->index();
        }
    }

    public function index()
    {
        // Cek autentikasi
        if (!isset($_SESSION['user_id'])) {
            header("Location: auth.php?action=login");
            exit();
        }

        // ==========================================
        // LOGIKA PAGINATION
        // ==========================================
        $limit = 8; // Tampilkan 8 sepatu per halaman
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        $offset = ($page - 1) * $limit; // Rumus mencari titik awal potong data

        // Dapatkan total seluruh data untuk menghitung jumlah halaman
        $totalData = $this->model->getTotalSepatu();
        $totalPages = ceil($totalData / $limit); // ceil() membulatkan ke atas (misal 2.1 jadi 3 halaman)

        // Inisialisasi Toko
        $toko = new KatalogToko("ZXYAN Footwear");

        // MENGAMBIL DATA YANG SUDAH DIPOTONG SESUAI HALAMAN SAAT INI
        $dataSepatuMentah = $this->model->getSepatuPaginated($limit, $offset);

        foreach ($dataSepatuMentah as $row) {
            if ($row['tipe_sepatu'] == 'Sport') {
                $sepatu = new SepatuSport($row['id'], $row['nama'], $row['harga'], $row['deskripsi'], $row['stok'], $row['ukuran'], $row['warna'], $row['merek'], $row['gender'], $row['jenis_olahraga'], $row['teknologi'], $row['berat_gram']);
            } elseif ($row['tipe_sepatu'] == 'Formal') {
                $sepatu = new SepatuFormal($row['id'], $row['nama'], $row['harga'], $row['deskripsi'], $row['stok'], $row['ukuran'], $row['warna'], $row['merek'], $row['gender'], $row['bahan'], $row['tinggi_hak'], $row['sertifikasi']);
            } elseif ($row['tipe_sepatu'] == 'Casual') {
                $sepatu = new SepatuCasual($row['id'], $row['nama'], $row['harga'], $row['deskripsi'], $row['stok'], $row['ukuran'], $row['warna'], $row['merek'], $row['gender'], $row['gaya'], $row['material'], $row['edisi_terbatas']);
            }

            if (isset($sepatu)) {
                $sepatu->setGambar($row['gambar']);
                $toko->tambahProduk($sepatu);
            }
        }

        $daftar_sepatu = $toko->getProdukList();

        // Variabel $page dan $totalPages otomatis akan terbaca di dalam view ini
        require_once __DIR__ . '/../VIEW/index_view.php';
    }

    public function detail()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: auth.php?action=login");
            exit();
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $row = $this->model->getSepatuById($id);

            if ($row) {
                if ($row['tipe_sepatu'] == 'Sport') {
                    $sepatu = new SepatuSport($row['id'], $row['nama'], $row['harga'], $row['deskripsi'], $row['stok'], $row['ukuran'], $row['warna'], $row['merek'], $row['gender'], $row['jenis_olahraga'], $row['teknologi'], $row['berat_gram']);
                } elseif ($row['tipe_sepatu'] == 'Formal') {
                    $sepatu = new SepatuFormal($row['id'], $row['nama'], $row['harga'], $row['deskripsi'], $row['stok'], $row['ukuran'], $row['warna'], $row['merek'], $row['gender'], $row['bahan'], $row['tinggi_hak'], $row['sertifikasi']);
                } elseif ($row['tipe_sepatu'] == 'Casual') {
                    $sepatu = new SepatuCasual($row['id'], $row['nama'], $row['harga'], $row['deskripsi'], $row['stok'], $row['ukuran'], $row['warna'], $row['merek'], $row['gender'], $row['gaya'], $row['material'], $row['edisi_terbatas']);
                }
                $sepatu->setGambar($row['gambar']);

                require_once __DIR__ . '/../VIEW/detail_view.php';
            } else {
                header("Location: index.php");
            }
        }
    }
}

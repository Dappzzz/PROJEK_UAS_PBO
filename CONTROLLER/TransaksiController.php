<?php
// File: CONTROLLER/TransaksiController.php
require_once __DIR__ . '/../MODEL/TransaksiModel.php';
require_once __DIR__ . '/../MODEL/KeranjangModel.php'; // Butuh untuk menampilkan ringkasan di form

class TransaksiController
{
    private $trxModel;
    private $keranjangModel;

    public function __construct()
    {
        $this->trxModel = new TransaksiModel();
        $this->keranjangModel = new KeranjangModel();

        if (session_status() == PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: auth.php?action=login");
            exit();
        }
    }

    public function handleRequest()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';

        if ($action == 'proses') {
            $this->prosesCheckout();
        } elseif ($action == 'sukses') {
            $this->halamanSukses();
        } else {
            $this->index();
        }
    }

    // Menampilkan form checkout
    public function index()
    {
        $id_user = $_SESSION['user_id'];
        $dataKeranjang = $this->keranjangModel->getKeranjang($id_user);

        if (empty($dataKeranjang)) {
            header("Location: keranjang.php");
            exit();
        }

        $totalHarga = 0;
        foreach ($dataKeranjang as $item) {
            $totalHarga += ($item['harga'] * $item['jumlah']);
        }

        require_once __DIR__ . '/../VIEW/checkout_view.php';
    }

    // Memproses form yang dikirim user
    public function prosesCheckout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_user = $_SESSION['user_id'];
            $nama_penerima = $_POST['nama_penerima'];
            $alamat = $_POST['alamat'];
            $metode_pembayaran = $_POST['metode_pembayaran'];

            $id_transaksi = $this->trxModel->prosesCheckout($id_user, $nama_penerima, $alamat, $metode_pembayaran);

            if ($id_transaksi) {
                // Simpan ID Transaksi di session sementara untuk ditampilkan di halaman sukses
                $_SESSION['last_trx'] = $id_transaksi;
                header("Location: checkout.php?action=sukses");
                exit();
            }
        }
    }

    // Menampilkan halaman sukses
    public function halamanSukses()
    {
        if (!isset($_SESSION['last_trx'])) {
            header("Location: index.php");
            exit();
        }
        $id_transaksi = $_SESSION['last_trx'];
        require_once __DIR__ . '/../VIEW/sukses_view.php';
    }
}

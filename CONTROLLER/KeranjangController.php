<?php
// File: CONTROLLER/KeranjangController.php
require_once __DIR__ . '/../MODEL/KeranjangModel.php';

class KeranjangController
{
    private $model;

    public function __construct()
    {
        $this->model = new KeranjangModel();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id'])) {
            header("Location: auth.php?action=login");
            exit();
        }
    }

    public function handleRequest()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';

        if ($action == 'tambah') {
            $this->tambah();
        } elseif ($action == 'hapus') {
            $this->hapus();
        } else {
            $this->index();
        }
    }

    public function index()
    {
        $id_user = $_SESSION['user_id'];
        $dataKeranjang = $this->model->getKeranjang($id_user);

        $totalHarga = 0;
        foreach ($dataKeranjang as $item) {
            $totalHarga += ($item['harga'] * $item['jumlah']);
        }

        require_once __DIR__ . '/../VIEW/keranjang_view.php';
    }

    public function tambah()
    {
        if (isset($_GET['id'])) {
            $id_sepatu = $_GET['id'];
            $id_user = $_SESSION['user_id'];
            $this->model->tambahItem($id_user, $id_sepatu);
        }
        header("Location: keranjang.php");
        exit();
    }

    public function hapus()
    {
        if (isset($_GET['id'])) {
            $id_sepatu = $_GET['id'];
            $id_user = $_SESSION['user_id'];
            $this->model->hapusItem($id_user, $id_sepatu);
        }
        header("Location: keranjang.php");
        exit();
    }
}

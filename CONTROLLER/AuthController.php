<?php
// File: CONTROLLER/AuthController.php

// Memanggil MODEL dengan huruf kapital
require_once __DIR__ . '/../MODEL/UsersModel.php';

class AuthController
{
    private $model;

    public function __construct()
    {
        $this->model = new UserModel();
        // Memulai session jika belum dimulai
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function handleRequest()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : 'login';

        switch ($action) {
            case 'login':
                $this->halamanLogin();
                break;
            case 'proses_login':
                $this->prosesLogin();
                break;
            case 'register':
                $this->halamanRegister();
                break;
            case 'proses_register':
                $this->prosesRegister();
                break;
            case 'logout':
                $this->logout();
                break;
            default:
                $this->halamanLogin();
                break;
        }
    }

    public function halamanLogin()
    {
        // Jika sudah login, lempar ke index (katalog)
        if (isset($_SESSION['user_id'])) {
            header("Location: index.php");
            exit();
        }
        // Memanggil VIEW dengan huruf kapital
        require_once __DIR__ . '/../VIEW/login_view.php';
    }

    public function prosesLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->model->login($username, $password);

            if ($user) {
                // Simpan data ke session
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['nama'] = $user['nama_lengkap'];
                $_SESSION['role'] = $user['role'];

                // Arahkan admin ke dasbor admin, customer ke katalog biasa
                if ($user['role'] == 'admin') {
                    header("Location: admin.php");
                } else {
                    header("Location: index.php");
                }
                exit();
            } else {
                $error = "Username atau Password salah!";
                // Memanggil VIEW dengan huruf kapital
                require_once __DIR__ . '/../VIEW/login_view.php';
            }
        }
    }

    public function halamanRegister()
    {
        if (isset($_SESSION['user_id'])) {
            header("Location: index.php");
            exit();
        }
        // Memanggil VIEW dengan huruf kapital
        require_once __DIR__ . '/../VIEW/register_view.php';
    }

    public function prosesRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama_lengkap'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->model->cekUsernameGanda($username)) {
                $error = "Username sudah dipakai!";
                // Memanggil VIEW dengan huruf kapital
                require_once __DIR__ . '/../VIEW/register_view.php';
            } else {
                if ($this->model->register($username, $password, $nama)) {
                    echo "<script>alert('Pendaftaran Berhasil! Silakan Login.'); window.location='auth.php?action=login';</script>";
                    exit();
                }
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: auth.php?action=login");
        exit();
    }
}

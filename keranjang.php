<?php
// File: keranjang.php (Di folder utama/root)
require_once 'CONTROLLER/KeranjangController.php';

$keranjangController = new KeranjangController();
$keranjangController->handleRequest();

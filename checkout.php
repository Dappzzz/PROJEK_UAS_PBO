<?php
// File: checkout.php (Di folder utama/root)
require_once 'CONTROLLER/TransaksiController.php';

$transaksiController = new TransaksiController();
$transaksiController->handleRequest();

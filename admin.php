<?php
session_start();

require_once 'CONTROLLER/AdminController.php';

$controller = new AdminController();
$controller->handleRequest();

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Berhasil - ZXYAN Footwear</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="ASSETS/css/style.css">
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen font-sans">

    <div class="bg-white p-10 rounded-2xl shadow-xl max-w-md w-full text-center border-t-4 border-green-500">
        <div class="w-20 h-20 bg-green-100 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h1 class="text-2xl font-black text-gray-900 uppercase mb-2">Pesanan Berhasil!</h1>
        <p class="text-gray-500 font-bold mb-6">Terima kasih telah berbelanja di ZXYAN.</p>

        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-8 text-left">
            <p class="text-xs text-gray-400 font-bold uppercase mb-1">ID Transaksi Anda</p>
            <p class="font-mono text-gray-900 font-bold text-lg"><?= $id_transaksi ?></p>
        </div>

        <a href="index.php" class="block w-full bg-gray-900 text-white font-bold py-4 rounded-xl hover:bg-gray-800 transition uppercase tracking-widest">
            Kembali ke Katalog
        </a>
    </div>

</body>

</html>
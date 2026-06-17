<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - ZXYAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="ASSETS/css/style.css">
</head>

<body class="bg-white text-gray-900 font-sans pb-20">

    <nav class="bg-gray-900 text-white shadow-lg p-4 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="index.php" class="flex items-center gap-3 hover:opacity-80 transition">
                <div class="bg-white text-gray-900 font-black text-xl px-3 py-1 rounded tracking-widest">ZXYAN</div>
                <span class="font-bold tracking-wider text-sm text-gray-300 hidden md:block">FOOTWEAR</span>
            </a>

            <div class="flex items-center gap-5 md:gap-6">
                <span class="text-sm font-medium text-gray-300 hidden md:block">Halo, <?= $_SESSION['nama'] ?></span>
                <a href="keranjang.php" class="text-white hover:text-gray-400 transition" title="Keranjang">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                </a>
                <a href="auth.php?action=logout" class="text-red-400 hover:text-red-300 transition" title="Keluar">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                    </svg>
                </a>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-4 pt-12 flex flex-col lg:flex-row gap-12">

        <div class="lg:w-2/3">
            <h1 class="text-2xl font-medium mb-8">Keranjang Belanja</h1>

            <?php if (empty($dataKeranjang)): ?>
                <div class="text-gray-500 py-10 border-t border-gray-200">
                    <p class="mb-4">Keranjang belanja kamu masih kosong.</p>
                    <a href="index.php" class="underline font-medium text-gray-900">Mulai Belanja</a>
                </div>
            <?php else: ?>
                <div class="space-y-8">
                    <?php foreach ($dataKeranjang as $item): ?>
                        <div class="flex flex-col sm:flex-row gap-6 border-t border-gray-200 pt-8 relative">
                            <div class="w-full sm:w-40 h-40 bg-[#f6f6f6] rounded-md flex items-center justify-center p-2 flex-shrink-0">
                                <img src="assets/img/<?= $item['gambar'] ?>" alt="<?= $item['nama'] ?>" class="max-w-full max-h-full object-contain mix-blend-multiply">
                            </div>

                            <div class="flex-grow flex flex-col">
                                <div class="flex justify-between items-start mb-1">
                                    <h3 class="text-lg font-medium text-gray-900"><?= $item['nama'] ?></h3>
                                    <p class="font-medium text-gray-900">Rp <?= number_format($item['harga'], 0, ',', '.') ?></p>
                                </div>
                                <p class="text-gray-500 text-sm mb-1"><?= $item['id_sepatu'] ?></p>

                                <div class="text-gray-500 text-sm mb-4 space-x-4 flex">
                                    <span>Warna: Hitam</span>
                                </div>

                                <div class="flex items-center gap-6 mt-auto">
                                    <div class="flex items-center text-sm font-medium">
                                        <span class="mr-2">Jumlah:</span> <?= $item['jumlah'] ?>
                                    </div>
                                    <a href="keranjang.php?action=hapus&id=<?= $item['id_sepatu'] ?>" onclick="return confirm('Hapus item ini?')" class="text-gray-400 hover:text-red-500 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if (!empty($dataKeranjang)): ?>
            <div class="lg:w-1/3">
                <h2 class="text-2xl font-medium mb-8">Ringkasan</h2>

                <div class="space-y-4 mb-6 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-medium">Rp <?= number_format($totalHarga, 0, ',', '.') ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Estimasi Pengiriman</span>
                        <span class="font-medium text-green-600">Gratis</span>
                    </div>
                </div>

                <div class="border-t border-b border-gray-200 py-4 mb-8">
                    <div class="flex justify-between items-center">
                        <span class="font-medium">Total</span>
                        <span class="font-medium text-lg">Rp <?= number_format($totalHarga, 0, ',', '.') ?></span>
                    </div>
                </div>

                <a href="checkout.php" class="block w-full bg-black text-white text-center py-4 rounded-full font-medium hover:bg-gray-800 transition">
                    Checkout Pembayaran
                </a>
            </div>
        <?php endif; ?>

    </div>
</body>

</html>
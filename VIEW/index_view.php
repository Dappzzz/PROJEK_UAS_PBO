<?php

/**
 * @var array $daftar_sepatu 
 * @var int $totalPages 
 * @var int $page 
 */
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog - ZXYAN Footwear</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="ASSETS/css/style.css">
    <script>
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        });
    </script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans pb-20">

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

    <div class="bg-[url('https://images.unsplash.com/photo-1556906781-9a412961c28c?q=80&w=2000&auto=format&fit=crop')] bg-cover bg-center mb-10 relative">
        <div class="absolute inset-0 bg-gray-900/70"></div>
        <div class="relative max-w-7xl mx-auto px-4 py-20 md:py-32">
            <h2 class="text-4xl md:text-5xl font-black text-white mb-4 uppercase tracking-wide">New Arrivals</h2>
            <p class="text-gray-200 text-lg max-w-xl">Temukan koleksi sepatu premium terbaru untuk melengkapi gayamu di setiap langkah.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php foreach ($daftar_sepatu as $item): ?>
            <div class='bg-white p-5 rounded-xl shadow border border-gray-100 hover:shadow-xl transition transform hover:-translate-y-1 flex flex-col h-full'>
                <div class='mb-4'>
                    <span class='inline-block bg-gray-900 text-white text-xs px-3 py-1 rounded-sm font-bold uppercase tracking-wider'><?= $item->getKategori() ?></span>
                </div>
                <img src="assets/img/<?= $item->getGambar() ?>" alt="<?= $item->getNama() ?>" class="w-full h-48 object-cover rounded-lg mb-4 border border-gray-100 mix-blend-multiply">
                <h3 class='text-lg font-bold text-gray-900 leading-tight mb-2'><?= $item->getNama() ?></h3>
                <div class='text-xl text-gray-900 font-black mb-4'>Rp <?= number_format($item->getHarga(), 0, ',', '.') ?></div>
                <div class='mt-auto pt-2'>
                    <a href='index.php?action=detail&id=<?= $item->getId() ?>' class='block w-full text-center bg-gray-100 text-gray-900 border border-gray-300 font-bold py-3 rounded-lg hover:bg-gray-900 hover:text-white transition uppercase tracking-widest text-sm'>Lihat Detail</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if ($totalPages > 1): ?>
        <div class="max-w-7xl mx-auto px-4 mt-16 flex justify-center">
            <nav class="flex items-center gap-2">
                <?php if ($page > 1): ?>
                    <a href="index.php?page=<?= $page - 1 ?>" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-100 transition font-bold text-sm">Prev</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="index.php?page=<?= $i ?>" class="px-4 py-2 <?= ($i == $page) ? 'bg-gray-900 text-white shadow-md' : 'border border-gray-300 text-gray-600 hover:bg-gray-100' ?> rounded-lg transition font-bold text-sm">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>

                <?php if ($page < $totalPages): ?>
                    <a href="index.php?page=<?= $page + 1 ?>" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-100 transition font-bold text-sm">Next</a>
                <?php endif; ?>
            </nav>
        </div>
    <?php endif; ?>

</body>

</html>
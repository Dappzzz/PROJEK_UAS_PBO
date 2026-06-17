<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $sepatu->getNama() ?> - ZXYAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="ASSETS/css/style.css">
    <script>
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) window.location.reload();
        });
    </script>
</head>

<body class="bg-white text-gray-900 font-sans pb-10">

    <nav class="bg-gray-900 text-white shadow-lg p-4 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="index.php" class="flex items-center gap-3 hover:opacity-80 transition">
                <div class="bg-white text-gray-900 font-black text-xl px-3 py-1 rounded tracking-widest">ZXYAN</div>
                <span class="font-bold tracking-wider text-sm text-gray-300 hidden md:block">PRODUCT DETAIL</span>
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

    <div class="max-w-6xl mx-auto px-4 pt-8">
        <a href="index.php" class="inline-flex items-center text-sm font-bold text-gray-500 hover:text-gray-900 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
            </svg>
            Kembali ke Katalog
        </a>
    </div>

    <div class="max-w-6xl mx-auto px-4 py-6 flex flex-col lg:flex-row gap-12">
        <div class="lg:w-[60%] bg-[#f6f6f6] rounded-2xl p-10 flex items-center justify-center border border-gray-100">
            <img src="assets/img/<?= $sepatu->getGambar() ?>" alt="<?= $sepatu->getNama() ?>" class="w-full h-auto object-cover mix-blend-multiply drop-shadow-2xl hover:scale-105 transition duration-500">
        </div>

        <div class="lg:w-[40%] flex flex-col pt-4">
            <div class="flex justify-between items-start mb-2">
                <div class="text-sm font-bold text-gray-500 uppercase tracking-wider"><?= $sepatu->getGender() ?>'s <?= $sepatu->getKategori() ?> Shoes</div>
                <?php if (method_exists($sepatu, 'getEdisiTerbatas') && $sepatu->getEdisiTerbatas() == 1): ?>
                    <span class="bg-amber-100 text-amber-800 text-xs font-black px-2 py-1 rounded uppercase tracking-widest">Limited Edition</span>
                <?php endif; ?>
            </div>

            <h1 class="text-4xl font-black text-gray-900 mb-4 leading-tight"><?= $sepatu->getNama() ?></h1>
            <p class="text-2xl font-bold text-gray-900 mb-6">Rp <?= number_format($sepatu->getHarga(), 0, ',', '.') ?></p>

            <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 mb-6 space-y-2">
                <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Key Features</h3>
                <?php if ($sepatu->getKategori() == 'Sport'): ?>
                    <div class="flex justify-between text-sm"><span class="text-gray-500">Olahraga</span> <span class="font-bold"><?= $sepatu->getJenisOlahraga() ?></span></div>
                    <div class="flex justify-between text-sm"><span class="text-gray-500">Teknologi</span> <span class="font-bold"><?= $sepatu->getTeknologi() ?></span></div>
                    <div class="flex justify-between text-sm"><span class="text-gray-500">Berat</span> <span class="font-bold"><?= $sepatu->getBeratGram() ?> Gram</span></div>
                <?php elseif ($sepatu->getKategori() == 'Formal'): ?>
                    <div class="flex justify-between text-sm"><span class="text-gray-500">Bahan</span> <span class="font-bold"><?= $sepatu->getBahan() ?></span></div>
                    <div class="flex justify-between text-sm"><span class="text-gray-500">Tinggi Hak</span> <span class="font-bold"><?= $sepatu->getTinggiHak() ?> cm</span></div>
                    <div class="flex justify-between text-sm"><span class="text-gray-500">Sertifikasi</span> <span class="font-bold"><?= $sepatu->getSertifikasi() ?></span></div>
                <?php elseif (strpos($sepatu->getKategori(), 'Casual') !== false): ?>
                    <div class="flex justify-between text-sm"><span class="text-gray-500">Gaya</span> <span class="font-bold"><?= $sepatu->getGaya() ?></span></div>
                    <div class="flex justify-between text-sm"><span class="text-gray-500">Material</span> <span class="font-bold"><?= $sepatu->getMaterial() ?></span></div>
                <?php endif; ?>
            </div>

            <div class="mb-8">
                <div class="flex justify-between items-center mb-3">
                    <span class="font-bold text-gray-900">Select Size (EU)</span>
                    <button onclick="toggleModalSize()" class="text-sm font-medium text-gray-500 underline hover:text-gray-900">Size Guide</button>
                </div>
                <div class="grid grid-cols-3 gap-3">
                    <div class="border-2 border-gray-900 rounded-lg py-3 text-center font-bold cursor-default bg-gray-900 text-white shadow-md">
                        <?= $sepatu->getUkuran() ?>
                    </div>
                </div>
            </div>

            <?php if ($sepatu->getStok() > 0): ?>
                <?php if ($sepatu->getStok() <= 5): ?>
                    <p class="text-red-600 font-bold text-sm mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Just a few left. Order soon.
                    </p>
                <?php endif; ?>
                <a href="keranjang.php?action=tambah&id=<?= $sepatu->getId() ?>" class="w-full bg-gray-900 text-white rounded-full py-4 font-bold text-lg text-center hover:bg-black transition-all transform hover:scale-[1.02] shadow-xl mb-4 flex justify-center items-center gap-2">
                    Masukkan Keranjang
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            <?php else: ?>
                <button disabled class="w-full bg-gray-200 text-gray-500 rounded-full py-4 font-bold text-lg text-center cursor-not-allowed mb-4">
                    Sold Out
                </button>
            <?php endif; ?>

            <p class="text-gray-600 leading-relaxed text-sm mb-6 mt-4">
                <?= $sepatu->getDeskripsi() ?>
            </p>

            <div class="border-t border-gray-200 pt-6 mt-2 space-y-4">
                <div class="flex items-start gap-4">
                    <div class="bg-gray-100 p-2 rounded-full text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-gray-900">Gratis Ongkir</h4>
                        <p class="text-xs text-gray-500">Berlaku untuk pengiriman ke seluruh Pulau Jawa.</p>
                    </div>
                </div>
            </div>

            <button onclick="toggleModalSpec()" class="text-left font-bold underline decoration-2 decoration-gray-300 underline-offset-4 hover:decoration-gray-900 transition mt-8 max-w-max">
                Lihat Detail Produk
            </button>
        </div>
    </div>


    <div id="specModal" class="fixed inset-0 z-50 hidden bg-gray-900/60 backdrop-blur-sm flex justify-center items-center p-4 transition-opacity">
        <div class="bg-white w-full max-w-2xl rounded-2xl relative shadow-2xl max-h-[90vh] flex flex-col overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h3 class="font-black text-xl text-gray-900 uppercase tracking-widest">Spesifikasi Lengkap</h3>
                <button onclick="toggleModalSpec()" class="bg-white p-2 rounded-full shadow-sm hover:bg-gray-200 transition text-gray-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-8 overflow-y-auto">
                <div class="flex items-center gap-6 mb-8">
                    <img src="assets/img/<?= $sepatu->getGambar() ?>" class="w-24 h-24 object-cover rounded-xl bg-[#f6f6f6] border border-gray-100 mix-blend-multiply p-2">
                    <div>
                        <h3 class="font-black text-2xl text-gray-900 leading-tight mb-1"><?= $sepatu->getNama() ?></h3>
                        <p class="font-bold text-gray-500 text-lg">Rp <?= number_format($sepatu->getHarga(), 0, ',', '.') ?></p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">
                    <div class="border-b border-gray-100 pb-2">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Merek</p>
                        <p class="font-bold text-gray-900 text-lg"><?= $sepatu->getMerek() ?></p>
                    </div>
                    <div class="border-b border-gray-100 pb-2">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Warna</p>
                        <p class="font-bold text-gray-900 text-lg"><?= $sepatu->getWarna() ?></p>
                    </div>
                    <div class="border-b border-gray-100 pb-2">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Kategori</p>
                        <p class="font-bold text-gray-900 text-lg"><?= $sepatu->getKategori() ?> (<?= $sepatu->getGender() ?>)</p>
                    </div>
                    <div class="border-b border-gray-100 pb-2">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Style ID (SKU)</p>
                        <p class="font-mono text-gray-900 text-lg"><?= $sepatu->getId() ?></p>
                    </div>
                    <?php if ($sepatu->getKategori() == 'Sport'): ?>
                        <div class="border-b border-gray-100 pb-2">
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Tipe Olahraga</p>
                            <p class="font-bold text-gray-900 text-lg"><?= $sepatu->getJenisOlahraga() ?></p>
                        </div>
                        <div class="border-b border-gray-100 pb-2">
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Teknologi Bantalan</p>
                            <p class="font-bold text-gray-900 text-lg"><?= $sepatu->getTeknologi() ?></p>
                        </div>
                        <div class="border-b border-gray-100 pb-2">
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Berat Sepatu</p>
                            <p class="font-bold text-gray-900 text-lg"><?= $sepatu->getBeratGram() ?>g</p>
                        </div>
                    <?php elseif ($sepatu->getKategori() == 'Formal'): ?>
                        <div class="border-b border-gray-100 pb-2">
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Material Bahan</p>
                            <p class="font-bold text-gray-900 text-lg"><?= $sepatu->getBahan() ?></p>
                        </div>
                        <div class="border-b border-gray-100 pb-2">
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Sertifikasi</p>
                            <p class="font-bold text-gray-900 text-lg"><?= $sepatu->getSertifikasi() ?></p>
                        </div>
                    <?php elseif (strpos($sepatu->getKategori(), 'Casual') !== false): ?>
                        <div class="border-b border-gray-100 pb-2">
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Material</p>
                            <p class="font-bold text-gray-900 text-lg"><?= $sepatu->getMaterial() ?></p>
                        </div>
                        <div class="border-b border-gray-100 pb-2">
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Gaya / Style</p>
                            <p class="font-bold text-gray-900 text-lg"><?= $sepatu->getGaya() ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="border-b border-gray-100 pb-2">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Ketersediaan Stok</p>
                        <p class="font-bold <?= $sepatu->getStok() < 10 ? 'text-red-500' : 'text-gray-900' ?> text-lg"><?= $sepatu->getStok() ?> Pasang Tersisa</p>
                    </div>
                </div>
            </div>
            <div class="p-6 bg-gray-50 border-t border-gray-100">
                <button onclick="toggleModalSpec()" class="w-full bg-gray-900 text-white font-bold py-3 rounded-xl hover:bg-black transition uppercase tracking-widest">Tutup Spesifikasi</button>
            </div>
        </div>
    </div>


    <div id="sizeModal" class="fixed inset-0 z-50 hidden bg-gray-900/60 backdrop-blur-sm flex justify-center items-center p-4 transition-opacity">
        <div class="bg-white w-full max-w-lg rounded-2xl relative shadow-2xl flex flex-col overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h3 class="font-black text-xl text-gray-900 uppercase tracking-widest">Size Guide</h3>
                <button onclick="toggleModalSize()" class="bg-white p-2 rounded-full shadow-sm hover:bg-gray-200 transition text-gray-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-8">
                <p class="text-sm text-gray-600 mb-6">Gunakan tabel di bawah ini untuk mengonversi ukuran kaki Anda. Perhatikan bahwa ukuran dapat sedikit berbeda tergantung merek.</p>

                <table class="w-full text-left border-collapse border border-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-gray-900 text-white">
                        <tr>
                            <th class="py-3 px-4 font-bold text-sm border-r border-gray-700">EU (Eropa)</th>
                            <th class="py-3 px-4 font-bold text-sm border-r border-gray-700">US (Men)</th>
                            <th class="py-3 px-4 font-bold text-sm">CM (Panjang Kaki)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-gray-800 text-sm">
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-r">38</td>
                            <td class="py-3 px-4 border-r">6</td>
                            <td class="py-3 px-4">24.0 cm</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-r">39</td>
                            <td class="py-3 px-4 border-r">6.5</td>
                            <td class="py-3 px-4">24.5 cm</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-r">40</td>
                            <td class="py-3 px-4 border-r">7</td>
                            <td class="py-3 px-4">25.0 cm</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-r">41</td>
                            <td class="py-3 px-4 border-r">8</td>
                            <td class="py-3 px-4">26.0 cm</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-r">42</td>
                            <td class="py-3 px-4 border-r">8.5</td>
                            <td class="py-3 px-4">26.5 cm</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-r">43</td>
                            <td class="py-3 px-4 border-r">9.5</td>
                            <td class="py-3 px-4">27.5 cm</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-r">44</td>
                            <td class="py-3 px-4 border-r">10</td>
                            <td class="py-3 px-4">28.0 cm</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-r">45</td>
                            <td class="py-3 px-4 border-r">11</td>
                            <td class="py-3 px-4">29.0 cm</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function toggleModalSpec() {
            document.getElementById('specModal').classList.toggle('hidden');
        }

        function toggleModalSize() {
            document.getElementById('sizeModal').classList.toggle('hidden');
        }

        // Menutup modal jika area gelap di luar kotak diklik
        document.getElementById('specModal').addEventListener('click', function(e) {
            if (e.target === this) toggleModalSpec();
        });

        document.getElementById('sizeModal').addEventListener('click', function(e) {
            if (e.target === this) toggleModalSize();
        });
    </script>
</body>

</html>
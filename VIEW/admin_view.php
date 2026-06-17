<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Admin - ZXYAN Footwear</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="ASSETS/css/style.css">
    <script>
        window.addEventListener('pageshow', function(event) {
            // Jika halaman dimuat dari cache (tombol back)
            if (event.persisted) {
                window.location.reload(); // Paksa refresh halaman!
            }
        });
    </script>
</head>

<body class="bg-gray-50 text-gray-800">

    <nav class="bg-gray-900 text-white shadow-lg p-4 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="bg-white text-gray-900 font-black text-xl px-3 py-1 rounded tracking-widest">
                    ZXYAN
                </div>
                <span class="font-bold tracking-wider text-sm text-gray-300">ADMIN PANEL</span>
            </div>

            <div class="flex items-center gap-4">
                <a href="auth.php?action=logout" class="text-red-400 hover:text-red-300 transition" title="Keluar">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                    </svg>
                </a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 py-8">

        <div class="flex flex-col md:flex-row md:justify-between md:items-end mb-8 gap-4">
            <div class="max-w-2xl">
                <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight mb-2">Kelola Master Data</h1>
                <p class="text-gray-500 text-sm leading-relaxed font-medium">
                    <strong class="text-gray-700">Master Data</strong> adalah pusat kendali utama (Single Source of Truth) untuk seluruh inventaris. Di sini Anda dapat menambah produk baru, memperbarui informasi detail dan stok, serta menghapus data sepatu dari sistem ZXYAN Footwear.
                </p>
            </div>
            <button onclick="toggleModal('modalTambah')" class="bg-gray-900 hover:bg-black text-white font-bold py-3 px-6 rounded-lg shadow-lg transition flex items-center gap-2 whitespace-nowrap uppercase tracking-widest text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Tambah Sepatu
            </button>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-900 text-white uppercase text-xs tracking-widest font-bold">
                            <th class="py-4 px-6 border-b border-gray-800">ID</th>
                            <th class="py-4 px-6 border-b border-gray-800">Gambar</th>
                            <th class="py-4 px-6 border-b border-gray-800">Nama & Kategori</th>
                            <th class="py-4 px-6 border-b border-gray-800">Harga</th>
                            <th class="py-4 px-6 border-b border-gray-800 text-center">Stok</th>
                            <th class="py-4 px-6 border-b border-gray-800 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php foreach ($dataSepatu as $item): ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-4 px-6 font-mono text-sm text-gray-500 font-medium"><?= $item['id'] ?></td>
                                <td class="py-4 px-6">
                                    <img src="assets/img/<?= $item['gambar'] ?>" alt="<?= $item['nama'] ?>" class="w-16 h-16 object-cover rounded-lg border border-gray-200 shadow-sm mix-blend-multiply">
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-900 text-lg"><?= $item['nama'] ?></div>
                                    <div class="text-xs text-gray-500 font-bold uppercase mt-1">
                                        <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded"><?= $item['tipe_sepatu'] ?></span>
                                        <span class="ml-2"><?= $item['merek'] ?></span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 font-bold text-gray-900">Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                                <td class="py-4 px-6 text-center">
                                    <span class="<?= $item['stok'] < 10 ? 'text-red-600 bg-red-50 px-2 py-1 rounded' : 'text-gray-900' ?> font-bold">
                                        <?= $item['stok'] ?>
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex justify-center items-center gap-3">
                                        <a href="admin.php?action=edit&id=<?= $item['id'] ?>" class="p-2 text-gray-400 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition" title="Edit Data">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                        <a href="admin.php?action=hapus&id=<?= $item['id'] ?>" onclick="return confirm('Yakin ingin menghapus sepatu ini? File gambar juga akan terhapus.')" class="p-2 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus Data">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if (empty($dataSepatu)): ?>
                            <tr>
                                <td colspan="6" class="py-8 text-center text-gray-500 font-bold">Belum ada data sepatu. Silakan tambah data.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modalTambah" class="fixed inset-0 bg-black/60 z-[60] hidden flex justify-center items-center backdrop-blur-sm p-4 overflow-y-auto">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl my-8">
            <div class="flex justify-between items-center p-6 border-b border-gray-100">
                <h2 class="text-xl font-black text-gray-900 uppercase">Tambah Sepatu Baru</h2>
                <button onclick="toggleModal('modalTambah')" class="text-gray-400 hover:text-red-500 transition bg-gray-100 hover:bg-red-50 p-2 rounded-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form action="admin.php?action=tambah" method="POST" enctype="multipart/form-data" class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">ID Sepatu</label>
                        <input type="text" name="id" required placeholder="Contoh: SPT-001" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Nama Sepatu</label>
                        <input type="text" name="nama" required class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Harga (Rp)</label>
                        <input type="number" name="harga" required class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Stok</label>
                        <input type="number" name="stok" required class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Kategori / Tipe</label>
                        <select name="tipe_sepatu" id="tipe_sepatu" required onchange="toggleAtributKhusus()" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 outline-none font-bold">
                            <option value="">-- Pilih Tipe --</option>
                            <option value="Sport">Sport</option>
                            <option value="Formal">Formal</option>
                            <option value="Casual">Casual</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Upload Gambar</label>
                        <input type="file" name="gambar" accept="image/*" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm">
                    </div>

                    <div class="md:col-span-2 grid grid-cols-4 gap-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Merek</label>
                            <input type="text" name="merek" required class="w-full px-3 py-1 border rounded">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Ukuran</label>
                            <input type="number" name="ukuran" required class="w-full px-3 py-1 border rounded">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Warna</label>
                            <input type="text" name="warna" required class="w-full px-3 py-1 border rounded">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Gender</label>
                            <select name="gender" required class="w-full px-3 py-1 border rounded">
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                                <option value="Unisex">Unisex</option>
                            </select>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Deskripsi Lengkap</label>
                        <textarea name="deskripsi" rows="2" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 outline-none"></textarea>
                    </div>

                    <div id="areaSport" class="md:col-span-2 hidden bg-blue-50 p-4 rounded-lg border border-blue-100">
                        <h3 class="text-sm font-bold text-blue-800 mb-3 uppercase">Atribut Khusus: Sepatu Sport</h3>
                        <div class="grid grid-cols-3 gap-4">
                            <input type="text" name="jenis_olahraga" placeholder="Jenis Olahraga" class="px-3 py-2 rounded border">
                            <input type="text" name="teknologi" placeholder="Teknologi" class="px-3 py-2 rounded border">
                            <input type="number" name="berat_gram" placeholder="Berat (gram)" class="px-3 py-2 rounded border">
                        </div>
                    </div>

                    <div id="areaFormal" class="md:col-span-2 hidden bg-gray-800 p-4 rounded-lg border border-gray-900">
                        <h3 class="text-sm font-bold text-white mb-3 uppercase">Atribut Khusus: Sepatu Formal</h3>
                        <div class="grid grid-cols-3 gap-4">
                            <input type="text" name="bahan" placeholder="Bahan" class="px-3 py-2 rounded border">
                            <input type="number" name="tinggi_hak" placeholder="Tinggi Hak (cm)" class="px-3 py-2 rounded border">
                            <input type="text" name="sertifikasi" placeholder="Sertifikasi" class="px-3 py-2 rounded border">
                        </div>
                    </div>

                    <div id="areaCasual" class="md:col-span-2 hidden bg-green-50 p-4 rounded-lg border border-green-100">
                        <h3 class="text-sm font-bold text-green-800 mb-3 uppercase">Atribut Khusus: Sepatu Casual</h3>
                        <div class="grid grid-cols-3 gap-4">
                            <input type="text" name="gaya" placeholder="Gaya" class="px-3 py-2 rounded border">
                            <input type="text" name="material" placeholder="Material" class="px-3 py-2 rounded border">
                            <label class="flex items-center space-x-2 bg-white px-3 py-2 rounded border cursor-pointer">
                                <input type="checkbox" name="edisi_terbatas" value="1" class="w-5 h-5 text-green-600 rounded">
                                <span class="text-sm font-bold text-gray-700">Edisi Terbatas</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                    <button type="button" onclick="toggleModal('modalTambah')" class="px-6 py-2 bg-gray-100 text-gray-600 font-bold rounded-lg hover:bg-gray-200 transition">Batal</button>
                    <button type="submit" class="px-6 py-2 bg-gray-900 text-white font-bold rounded-lg hover:bg-black transition uppercase tracking-widest text-sm">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle('hidden');
        }

        function toggleAtributKhusus() {
            const tipe = document.getElementById('tipe_sepatu').value;
            document.getElementById('areaSport').classList.add('hidden');
            document.getElementById('areaFormal').classList.add('hidden');
            document.getElementById('areaCasual').classList.add('hidden');

            if (tipe === 'Sport') document.getElementById('areaSport').classList.remove('hidden');
            if (tipe === 'Formal') document.getElementById('areaFormal').classList.remove('hidden');
            if (tipe === 'Casual') document.getElementById('areaCasual').classList.remove('hidden');
        }
    </script>
</body>

</html>
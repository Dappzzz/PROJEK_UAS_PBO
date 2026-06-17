<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sepatu - ZXYAN Footwear</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="ASSETS/css/style.css">
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
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Edit Data Sepatu</h1>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8">
            <form action="admin.php?action=proses_edit" method="POST" enctype="multipart/form-data">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">ID Sepatu (Readonly)</label>
                        <input type="text" name="id" value="<?= $sepatu['id'] ?>" readonly class="w-full px-4 py-2 bg-gray-200 text-gray-600 border border-gray-300 rounded-lg cursor-not-allowed">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Nama Sepatu</label>
                        <input type="text" name="nama" value="<?= $sepatu['nama'] ?>" required class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-900 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Harga (Rp)</label>
                        <input type="number" name="harga" value="<?= $sepatu['harga'] ?>" required class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Stok</label>
                        <input type="number" name="stok" value="<?= $sepatu['stok'] ?>" required class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Kategori / Tipe</label>
                        <select name="tipe_sepatu" id="tipe_sepatu" required onchange="toggleAtributKhusus()" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg outline-none font-bold">
                            <option value="Sport" <?= $sepatu['tipe_sepatu'] == 'Sport' ? 'selected' : '' ?>>Sport</option>
                            <option value="Formal" <?= $sepatu['tipe_sepatu'] == 'Formal' ? 'selected' : '' ?>>Formal</option>
                            <option value="Casual" <?= $sepatu['tipe_sepatu'] == 'Casual' ? 'selected' : '' ?>>Casual</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Ganti Gambar (Kosongkan jika tidak diganti)</label>
                        <input type="file" name="gambar" accept="image/*" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm">
                        <p class="text-xs text-gray-400 mt-1">Gambar saat ini: <?= $sepatu['gambar'] ?></p>
                    </div>

                    <div class="md:col-span-2 grid grid-cols-4 gap-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Merek</label>
                            <input type="text" name="merek" value="<?= $sepatu['merek'] ?>" required class="w-full px-3 py-1 border rounded">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Ukuran</label>
                            <input type="number" name="ukuran" value="<?= $sepatu['ukuran'] ?>" required class="w-full px-3 py-1 border rounded">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Warna</label>
                            <input type="text" name="warna" value="<?= $sepatu['warna'] ?>" required class="w-full px-3 py-1 border rounded">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Gender</label>
                            <select name="gender" required class="w-full px-3 py-1 border rounded">
                                <option value="Pria" <?= $sepatu['gender'] == 'Pria' ? 'selected' : '' ?>>Pria</option>
                                <option value="Wanita" <?= $sepatu['gender'] == 'Wanita' ? 'selected' : '' ?>>Wanita</option>
                                <option value="Unisex" <?= $sepatu['gender'] == 'Unisex' ? 'selected' : '' ?>>Unisex</option>
                            </select>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Deskripsi Lengkap</label>
                        <textarea name="deskripsi" rows="2" class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg outline-none"><?= $sepatu['deskripsi'] ?></textarea>
                    </div>

                    <div id="areaSport" class="md:col-span-2 hidden bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <h3 class="text-sm font-bold text-gray-800 mb-3 uppercase">Atribut Khusus: Sepatu Sport</h3>
                        <div class="grid grid-cols-3 gap-4">
                            <input type="text" name="jenis_olahraga" value="<?= $sepatu['jenis_olahraga'] ?>" placeholder="Jenis Olahraga" class="px-3 py-2 rounded border focus:ring-2 focus:ring-gray-900 outline-none">
                            <input type="text" name="teknologi" value="<?= $sepatu['teknologi'] ?>" placeholder="Teknologi" class="px-3 py-2 rounded border focus:ring-2 focus:ring-gray-900 outline-none">
                            <input type="number" name="berat_gram" value="<?= $sepatu['berat_gram'] ?>" placeholder="Berat (gram)" class="px-3 py-2 rounded border focus:ring-2 focus:ring-gray-900 outline-none">
                        </div>
                    </div>

                    <div id="areaFormal" class="md:col-span-2 hidden bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <h3 class="text-sm font-bold text-gray-800 mb-3 uppercase">Atribut Khusus: Sepatu Formal</h3>
                        <div class="grid grid-cols-3 gap-4">
                            <input type="text" name="bahan" value="<?= $sepatu['bahan'] ?>" placeholder="Bahan" class="px-3 py-2 rounded border focus:ring-2 focus:ring-gray-900 outline-none">
                            <input type="number" name="tinggi_hak" value="<?= $sepatu['tinggi_hak'] ?>" placeholder="Tinggi Hak (cm)" class="px-3 py-2 rounded border focus:ring-2 focus:ring-gray-900 outline-none">
                            <input type="text" name="sertifikasi" value="<?= $sepatu['sertifikasi'] ?>" placeholder="Sertifikasi" class="px-3 py-2 rounded border focus:ring-2 focus:ring-gray-900 outline-none">
                        </div>
                    </div>

                    <div id="areaCasual" class="md:col-span-2 hidden bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <h3 class="text-sm font-bold text-gray-800 mb-3 uppercase">Atribut Khusus: Sepatu Casual</h3>
                        <div class="grid grid-cols-3 gap-4">
                            <input type="text" name="gaya" value="<?= $sepatu['gaya'] ?>" placeholder="Gaya" class="px-3 py-2 rounded border focus:ring-2 focus:ring-gray-900 outline-none">
                            <input type="text" name="material" value="<?= $sepatu['material'] ?>" placeholder="Material" class="px-3 py-2 rounded border focus:ring-2 focus:ring-gray-900 outline-none">
                            <label class="flex items-center space-x-2 bg-white px-3 py-2 rounded border cursor-pointer">
                                <input type="checkbox" name="edisi_terbatas" value="1" <?= $sepatu['edisi_terbatas'] == 1 ? 'checked' : '' ?> class="w-5 h-5 text-gray-800 rounded">
                                <span class="text-sm font-bold text-gray-700">Edisi Terbatas</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <a href="admin.php" class="px-6 py-2 bg-gray-100 text-gray-600 font-bold rounded-lg hover:bg-gray-200 transition">Kembali</a>
                        <button type="submit" class="px-6 py-2 bg-gray-900 text-white font-bold rounded-lg hover:bg-gray-800 transition">Update Data</button>
                    </div>
            </form>
        </div>
    </div>

    <script>
        function toggleAtributKhusus() {
            const tipe = document.getElementById('tipe_sepatu').value;
            document.getElementById('areaSport').classList.add('hidden');
            document.getElementById('areaFormal').classList.add('hidden');
            document.getElementById('areaCasual').classList.add('hidden');

            if (tipe === 'Sport') document.getElementById('areaSport').classList.remove('hidden');
            if (tipe === 'Formal') document.getElementById('areaFormal').classList.remove('hidden');
            if (tipe === 'Casual') document.getElementById('areaCasual').classList.remove('hidden');
        }

        window.onload = toggleAtributKhusus;
    </script>
</body>

</html>
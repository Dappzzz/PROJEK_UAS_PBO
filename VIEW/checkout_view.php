<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - ZXYAN Footwear</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="ASSETS/css/style.css">
</head>

<body class="bg-gray-50 text-gray-900 font-sans pb-20">

    <nav class="bg-gray-900 text-white shadow-lg p-4 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-center">
            <div class="bg-white text-gray-900 font-black text-xl px-3 py-1 rounded tracking-widest">ZXYAN</div>
            <span class="font-bold tracking-wider text-sm text-gray-300 ml-4">SECURE CHECKOUT</span>
        </div>
    </nav>

    <div class="max-w-3xl mx-auto px-4 pt-12">
        <h1 class="text-2xl font-medium mb-8">Detail Pengiriman & Pembayaran</h1>

        <form action="checkout.php?action=proses" method="POST" class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200">

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Penerima</label>
                <input type="text" name="nama_penerima" value="<?= $_SESSION['nama'] ?>" required class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-black">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Pengiriman Lengkap</label>
                <textarea name="alamat" rows="3" required placeholder="Detail jalan, nomor rumah, kota..." class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-black"></textarea>
            </div>

            <div class="mb-8">
                <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Metode Pembayaran</label>
                <select name="metode_pembayaran" id="metode_pembayaran" required onchange="toggleQris()" class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg outline-none font-medium cursor-pointer focus:ring-2 focus:ring-black">
                    <option value="">-- Pilih Metode --</option>
                    <option value="Transfer Bank">Transfer Bank (BCA/Mandiri/BRI)</option>
                    <option value="E-Wallet">E-Wallet (GoPay/OVO/Dana)</option>
                    <option value="QRIS">QRIS (Scan Barcode)</option>
                </select>
            </div>

            <div id="qris-area" class="hidden mb-8 p-6 bg-gray-50 border border-gray-200 rounded-xl text-center">
                <h3 class="font-medium text-lg mb-2">Scan QRIS Pembayaran</h3>
                <p class="text-gray-500 text-sm mb-4">Arahkan kamera aplikasi m-Banking atau E-Wallet Anda ke kode berikut:</p>

                <div class="bg-white p-4 inline-block rounded-xl shadow-sm mb-4">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=Pembayaran+ZXYAN+Footwear" alt="QRIS ZXYAN" class="mx-auto w-48 h-48">
                </div>

                <div class="text-sm">
                    <p class="text-gray-500">Merchant: <span class="font-bold text-gray-900">ZXYAN FOOTWEAR</span></p>
                    <p class="text-gray-500">Total Tagihan: <span class="font-bold text-gray-900 text-lg">Rp <?= number_format($totalHarga, 0, ',', '.') ?></span></p>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-6 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <p class="text-sm text-gray-500 font-medium mb-1">Total yang harus dibayar</p>
                    <p class="text-2xl font-medium text-gray-900">Rp <?= number_format($totalHarga, 0, ',', '.') ?></p>
                </div>
                <button type="submit" class="w-full md:w-auto bg-black text-white px-10 py-4 rounded-full font-medium hover:bg-gray-800 transition">
                    Selesaikan Pesanan
                </button>
            </div>
        </form>
    </div>

    <script>
        function toggleQris() {
            const metode = document.getElementById('metode_pembayaran').value;
            const qrisArea = document.getElementById('qris-area');

            if (metode === 'QRIS') {
                qrisArea.classList.remove('hidden');
            } else {
                qrisArea.classList.add('hidden');
            }
        }
    </script>
</body>

</html>
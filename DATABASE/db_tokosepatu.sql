-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

CREATE DATABASE IF NOT EXISTS `db_tokosepatu` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_tokosepatu`;

-- Dumping structure for table db_tokosepatu.detail_transaksi
CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id_detail` int NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(50) NOT NULL,
  `id_sepatu` varchar(20) NOT NULL,
  `jumlah` int NOT NULL,
  `harga_satuan` int NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_tokosepatu.detail_transaksi: ~2 rows (approximately)
INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_sepatu`, `jumlah`, `harga_satuan`) VALUES
	(1, 'TRX-1781717242', 'SPT-009', 1, 950000),
	(2, 'TRX-1781717262', 'SPT-008', 1, 1100000);

-- Dumping structure for table db_tokosepatu.katalog_sepatu
CREATE TABLE IF NOT EXISTS `katalog_sepatu` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int NOT NULL,
  `ukuran` int NOT NULL,
  `warna` varchar(50) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `gender` enum('Pria','Wanita','Unisex') NOT NULL,
  `tipe_sepatu` enum('Sport','Formal','Casual') NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default_shoes.jpg',
  `jenis_olahraga` varchar(50) DEFAULT NULL,
  `teknologi` varchar(100) DEFAULT NULL,
  `berat_gram` int DEFAULT NULL,
  `bahan` varchar(50) DEFAULT NULL,
  `tinggi_hak` int DEFAULT NULL,
  `sertifikasi` varchar(50) DEFAULT NULL,
  `gaya` varchar(50) DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL,
  `edisi_terbatas` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_tokosepatu.katalog_sepatu: ~50 rows (approximately)
INSERT INTO `katalog_sepatu` (`id`, `nama`, `harga`, `deskripsi`, `stok`, `ukuran`, `warna`, `merek`, `gender`, `tipe_sepatu`, `gambar`, `jenis_olahraga`, `teknologi`, `berat_gram`, `bahan`, `tinggi_hak`, `sertifikasi`, `gaya`, `material`, `edisi_terbatas`) VALUES
	('CSL-001', 'Converse Chuck 70', 850000, 'Sneakers kanvas klasik yang cocok untuk gaya sehari-hari.', 30, 40, 'Parchment', 'Converse', 'Unisex', 'Casual', 'default_shoes.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Streetwear', 'Kanvas Premium', 0),
	('CSL-002', 'Vans Old Skool High', 990000, 'Sepatu skate legendaris dengan siluet tinggi.', 40, 39, 'Black/White', 'Vans', 'Unisex', 'Casual', 'default_shoes.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Skate', 'Kanvas Suede', 0),
	('CSL-003', 'Nike Air Force 1', 1500000, 'Ikon streetwear sejati yang tak pernah lekang oleh waktu.', 5, 43, 'All White', 'Nike', 'Unisex', 'Casual', 'default_shoes.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Lifestyle', 'Leather', 0),
	('CSL-004', 'Ventela Public Low', 300000, 'Sneakers lokal kualitas terbaik dengan harga terjangkau.', 50, 42, 'Yellow', 'Ventela', 'Unisex', 'Casual', 'default_shoes.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Retro', 'Kanvas', 0),
	('CSL-005', 'Adidas Stan Smith', 1200000, 'Sepatu tenis klasik yang dialihfungsikan menjadi raja jalanan.', 11, 40, 'White/Green', 'Adidas', 'Unisex', 'Casual', 'default_shoes.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Classic', 'Leather', 0),
	('CSL-006', 'Compass Gazelle High', 450000, 'Sepatu lokal yang sangat hype dan sering gaib di pasaran.', 4, 41, 'Mustard', 'Compass', 'Unisex', 'Casual', 'default_shoes.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Vintage', 'Kanvas 12oz', 1),
	('CSL-007', 'Nike Dunk Low Panda', 2100000, 'Warna ikonik hitam putih yang cocok dengan segala outfit.', 3, 42, 'Black/White', 'Nike', 'Unisex', 'Casual', 'default_shoes.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Streetwear', 'Leather Premium', 1),
	('CSL-008', 'Onitsuka Tiger Mexico 66', 1700000, 'Siluet tipis dan retro khas Jepang.', 8, 40, 'Yellow/Black', 'Onitsuka Tiger', 'Unisex', 'Casual', 'default_shoes.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Retro Classic', 'Leather', 0),
	('CSL-009', 'Nike Air Max 90', 1950000, 'Desain retro yang mempopulerkan tren bantalan udara terekspos.', 14, 43, 'Infrared', 'Nike', 'Unisex', 'Casual', 'default_shoes.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Retro Running', 'Mesh/Leather', 0),
	('CSL-010', 'Adidas Samba OG', 2200000, 'Sepatu sepak bola indoor yang beralih menjadi primadona skena fesyen jalanan.', 6, 40, 'Cloud White', 'Adidas', 'Unisex', 'Casual', 'default_shoes.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Classic', 'Suede/Leather', 1),
	('CSL-011', 'Puma Suede Classic', 1200000, 'Warisan b-boy tahun 80-an dengan material suede mewah yang menonjol.', 20, 42, 'Peacoat Blue', 'Puma', 'Unisex', 'Casual', 'default_shoes.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Streetwear', 'Full Suede', 0),
	('CSL-012', 'Vans Slip-On Checkerboard', 950000, 'Motif papan catur ikonik yang sangat praktis digunakan kapan saja.', 35, 39, 'Black/White', 'Vans', 'Unisex', 'Casual', 'default_shoes.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Skate', 'Kanvas', 0),
	('CSL-013', 'Converse Jack Purcell', 1100000, 'Senyum khas di ujung sepatu memberikan tampilan unik dan minimalis.', 15, 41, 'White', 'Converse', 'Unisex', 'Casual', 'default_shoes.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Lifestyle', 'Kanvas Twill', 0),
	('CSL-014', 'Aerostreet Hoops Low', 1700000, 'Gaya retro basket era 90-an buatan lokal yang sangat tangguh.', 25, 42, 'White/Green', 'Aerostreet', 'Pria', 'Casual', 'default_shoes.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Retro Hoops', 'Kulit Sintetis', 0),
	('CSL-015', 'Nah Project FlexKnit', 650000, 'Teknologi rajut yang elastis dan mengikuti bentuk kaki, sirkulasi udara sangat baik.', 10, 40, 'Carbon Black', 'Nah Project', 'Unisex', 'Casual', 'default_shoes.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Modern', 'Knit', 1),
	('CSL-016', 'Geoff Max Authentic', 350000, 'Sneakers tangguh untuk melibas jalanan dan aspal dengan harga yang sangat bersahabat.', 45, 43, 'Black/Gum', 'Geoff Max', 'Unisex', 'Casual', 'default_shoes.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Skate', 'Kanvas 12oz', 0),
	('FML-001', 'Oxford Classic Leather', 1200000, 'Sepatu formal kulit asli dengan desain timeless elegan.', 10, 41, 'Brown', 'Brodo', 'Pria', 'Formal', 'default_shoes.jpg', NULL, NULL, NULL, 'Kulit Sapi Asli', 3, 'SNI', NULL, NULL, 0),
	('FML-002', 'Derby Black Executive', 1450000, 'Cocok untuk meeting penting dan acara resmi perusahaan.', 8, 42, 'Black', 'Mario Minardi', 'Pria', 'Formal', 'default_shoes.jpg', NULL, NULL, NULL, 'Kulit Sintetis', 2, 'ISO', NULL, NULL, 0),
	('FML-003', 'Stiletto Pointy Heels', 1100000, 'Sepatu hak tinggi elegan untuk wanita karir.', 22, 38, 'Nude', 'Charles & Keith', 'Wanita', 'Formal', 'default_shoes.jpg', NULL, NULL, NULL, 'Suede', 7, 'Global', NULL, NULL, 0),
	('FML-004', 'Loafer Suede Classic', 890000, 'Sepatu slip-on formal yang nyaman dipakai seharian tanpa kaos kaki.', 14, 41, 'Navy', 'Gino Mariani', 'Pria', 'Formal', 'default_shoes.jpg', NULL, NULL, NULL, 'Suede', 2, 'SNI', NULL, NULL, 0),
	('FML-005', 'Wedges Formal Office', 750000, 'Nyaman dan menunjang tinggi badan secara proporsional.', 16, 37, 'Black', 'Bata', 'Wanita', 'Formal', 'default_shoes.jpg', NULL, NULL, NULL, 'Kulit PU', 5, 'Lokal', NULL, NULL, 0),
	('FML-006', 'Chelsea Boots', 1600000, 'Sepatu formal dengan ankle tinggi tanpa tali yang maskulin.', 7, 43, 'Dark Brown', 'Dr. Martens', 'Pria', 'Formal', 'default_shoes.jpg', NULL, NULL, NULL, 'Smooth Leather', 3, 'UK Standard', NULL, NULL, 0),
	('FML-007', 'Monk Strap Leather', 1350000, 'Sepatu formal bergaya Eropa dengan strap buckle yang unik.', 9, 44, 'Tan', 'Hush Puppies', 'Pria', 'Formal', 'default_shoes.jpg', NULL, NULL, NULL, 'Full Grain Leather', 2, 'ISO', NULL, NULL, 0),
	('FML-008', 'Hush Puppies Detroit Oxford', 1500000, 'Gaya profesional dengan kenyamanan insole memori.', 12, 42, 'Dark Brown', 'Hush Puppies', 'Pria', 'Formal', 'default_shoes.jpg', NULL, NULL, NULL, 'Genuine Leather', 3, 'Standar', NULL, NULL, 0),
	('FML-009', 'Clarks Tilden Walk', 1450000, 'Sepatu derby klasik dengan teknologi OrthoLite agar kaki tidak gerah.', 15, 41, 'Black', 'Clarks', 'Pria', 'Formal', 'default_shoes.jpg', NULL, NULL, NULL, 'Premium Leather', 2, 'OrthoLite', NULL, NULL, 0),
	('FML-010', 'Cole Haan OriginalGrand', 2800000, 'Desain formal oxford yang dipadukan dengan sol empuk ala sneakers.', 5, 43, 'Woodbury', 'Cole Haan', 'Pria', 'Formal', 'default_shoes.jpg', NULL, NULL, NULL, 'Leather/EVA', 3, 'GrandOS', NULL, NULL, 0),
	('FML-011', 'Buccheri Pantofel Man', 950000, 'Pilihan tangguh dan tahan lama dari brand kulit ternama Indonesia.', 25, 40, 'Black', 'Buccheri', 'Pria', 'Formal', 'default_shoes.jpg', NULL, NULL, NULL, 'Kulit Sapi Asli', 3, 'Lokal Premium', NULL, NULL, 0),
	('FML-012', 'The Executive Block Heels', 650000, 'Hak tahu yang stabil untuk kenyamanan bekerja seharian di kantor.', 30, 38, 'Beige', 'The Executive', 'Wanita', 'Formal', 'default_shoes.jpg', NULL, NULL, NULL, 'PU Leather', 5, 'Office Std', NULL, NULL, 0),
	('FML-013', 'Zara Man Formal Derby', 1300000, 'Siluet minimalis modern khas Eropa untuk acara resmi.', 18, 44, 'Navy', 'Zara', 'Pria', 'Formal', 'default_shoes.jpg', NULL, NULL, NULL, 'Faux Leather', 2, 'Zara Premium', NULL, NULL, 0),
	('FML-014', 'Marks & Spencer Cap Toe', 1700000, 'Detail jahitan depan yang tegas menambah kesan maskulin.', 7, 42, 'Tan', 'Marks & Spencer', 'Pria', 'Formal', 'default_shoes.jpg', NULL, NULL, NULL, 'Vegan Leather', 2, 'UK Std', NULL, NULL, 0),
	('FML-015', 'Fladeo Office Men', 450000, 'Solusi terjangkau namun tetap tampil necis untuk ke kantor.', 40, 41, 'Black', 'Fladeo', 'Pria', 'Formal', 'default_shoes.jpg', NULL, NULL, NULL, 'Kulit Sintetis', 3, 'SNI', NULL, NULL, 0),
	('SPT-001', 'Nike Air Zoom Pegasus', 1850000, 'Sepatu lari ringan dan responsif untuk lari harian.', 25, 42, 'Black/White', 'Nike', 'Pria', 'Sport', 'default_shoes.jpg', 'Lari', 'Air Zoom', 280, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-002', 'Adidas Ultraboost 40', 2100000, 'Bantalan luar biasa dengan energi yang kembali di setiap langkah.', 15, 43, 'Core Black', 'Adidas', 'Pria', 'Sport', 'default_shoes.jpg', 'Lari', 'Boost', 310, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-003', 'Puma X Ray Speed', 950000, 'Desain retro futuristik yang cocok untuk nge-gym.', 18, 44, 'White/Blue', 'Puma', 'Pria', 'Sport', 'default_shoes.jpg', 'Gym/Training', 'SoftFoam+', 350, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-004', 'Asics Nitrofuze 2', 780000, 'Sepatu lari entry-level dengan sirkulasi udara maksimal.', 12, 41, 'Grey', 'Asics', 'Pria', 'Sport', 'default_shoes.jpg', 'Lari', 'FuzeGel', 260, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-005', 'Ortuseight Hyperglide', 450000, 'Sepatu lari lokal kebanggaan Indonesia dengan sol empuk.', 2, 40, 'Cyan', 'Ortuseight', 'Pria', 'Sport', 'default_shoes.jpg', 'Lari', 'Cumulus Foam', 250, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-006', 'Under Armour Retaliate', 1300000, 'Durabilitas tinggi untuk sesi lari jarak jauh.', 9, 44, 'Red/Black', 'Under Armour', 'Pria', 'Sport', 'default_shoes.jpg', 'Marathon', 'Charged Cushioning', 320, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-007', 'New Balance Gel-Kayano', 2200000, 'Support terbaik untuk pronasi telapak kaki yang berlebih.', 6, 42, 'Silver', 'New Balance', 'Pria', 'Sport', 'default_shoes.jpg', 'Lari', 'GEL Technology', 315, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-008', 'Reebok Fresh Foam', 1100000, 'Ringan bagai awan untuk lari di aspal.', 12, 39, 'Pink', 'Reebok', 'Wanita', 'Sport', 'default_shoes.jpg', 'Lari', 'Fresh Foam', 220, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-009', 'Skechers Nano', 950000, 'Sepatu khusus angkat beban dengan sol yang rata dan stabil.', 10, 41, 'Grey/Orange', 'Skechers', 'Pria', 'Sport', 'default_shoes.jpg', 'Crossfit', 'NanoWeb', 340, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-010', 'Specs Accelerator', 550000, 'Sepatu futsal ringan untuk kelincahan ekstra di lapangan.', 20, 42, 'Neon Green', 'Specs', 'Pria', 'Sport', 'default_shoes.jpg', 'Futsal', 'Vertecs', 210, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-011', 'Puma Deviate Nitro 2', 2599000, 'Sepatu lari dengan pelat karbon untuk dorongan maksimal di setiap langkah.', 14, 43, 'Fire Orchid', 'Puma', 'Pria', 'Sport', 'default_shoes.jpg', 'Lari', 'Nitro Elite Carbon', 260, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-012', 'Adidas Predator Accuracy', 1800000, 'Kontrol bola sempurna dengan tekstur grip tinggi untuk pemain sepak bola modern.', 20, 42, 'Core Black', 'Adidas', 'Pria', 'Sport', 'default_shoes.jpg', 'Sepak Bola', 'High Definition Grip', 240, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-013', 'Nike LeBron XX', 3100000, 'Sepatu basket ringan dan responsif, dirancang khusus untuk generasi berikutnya.', 8, 45, 'Vivid Purple', 'Nike', 'Pria', 'Sport', 'default_shoes.jpg', 'Basket', 'Zoom Air Turbo', 380, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-014', 'Asics Gel-Resolution 9', 2300000, 'Stabilitas luar biasa di lapangan tenis untuk pergerakan lateral yang agresif.', 12, 41, 'White/Tuna Blue', 'Asics', 'Pria', 'Sport', 'default_shoes.jpg', 'Tenis', 'GEL Technology', 350, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-015', 'Under Armour Curry 10', 2700000, 'Cengkeraman tanpa selip berkat teknologi outsole tanpa karet.', 15, 44, 'Iron Sharpens Iron', 'Under Armour', 'Pria', 'Sport', 'default_shoes.jpg', 'Basket', 'UA Flow', 345, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-016', 'Hoka Clifton 9', 2400000, 'Bantalan super tebal namun sangat ringan untuk lari santai sehari-hari.', 18, 40, 'Aero Blue', 'Hoka', 'Wanita', 'Sport', 'default_shoes.jpg', 'Lari', 'CMEVA Foam', 248, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-017', 'Mizuno Wave Rider 27', 1900000, 'Keseimbangan sempurna antara pendaratan mulus dan tolakan kuat.', 10, 42, 'Estate Blue', 'Mizuno', 'Pria', 'Sport', 'default_shoes.jpg', 'Lari', 'Mizuno Enerzy', 280, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-018', 'New Balance FuelCell Rebel', 2100000, 'Sensasi lari yang membal dan energik untuk latihan tempo.', 9, 39, 'Cosmic Rose', 'New Balance', 'Wanita', 'Sport', 'default_shoes.jpg', 'Lari', 'FuelCell', 230, NULL, NULL, NULL, NULL, NULL, 0),
	('SPT-019', 'Reebok Nano X3', 1700000, 'Sepatu serbaguna untuk angkat beban berat maupun lari kardio ringan.', 22, 41, 'Core Black', 'Reebok', 'Pria', 'Sport', 'default_shoes.jpg', 'Crossfit', 'Lift and Run Chassis', 330, NULL, NULL, NULL, NULL, NULL, 0);

-- Dumping structure for table db_tokosepatu.keranjang
CREATE TABLE IF NOT EXISTS `keranjang` (
  `id_keranjang` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_sepatu` varchar(20) NOT NULL,
  `jumlah` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_keranjang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_tokosepatu.keranjang: ~1 rows (approximately)
INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `id_sepatu`, `jumlah`) VALUES
	(3, 2, 'SPT-010', 1);

-- Dumping structure for table db_tokosepatu.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` varchar(50) NOT NULL,
  `id_user` int NOT NULL,
  `tanggal` datetime NOT NULL,
  `total_harga` int NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Lunas',
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_tokosepatu.transaksi: ~1 rows (approximately)
INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `tanggal`, `total_harga`, `nama_penerima`, `alamat`, `metode_pembayaran`, `status`) VALUES
	('TRX-1781717242', 2, '2026-06-17 17:27:22', 950000, 'Risyad Maulana Daffa', 'jln rungkut madya', 'QRIS', 'Lunas'),
	('TRX-1781717262', 2, '2026-06-17 17:27:42', 1100000, 'Risyad Maulana Daffa', 'jln rungkut', 'Transfer Bank', 'Lunas');

-- Dumping structure for table db_tokosepatu.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_tokosepatu.users: ~3 rows (approximately)
INSERT INTO `users` (`id_user`, `username`, `password`, `nama_lengkap`, `role`) VALUES
	(1, 'admin', 'admin123', 'Risyad Admin', 'admin'),
	(2, 'risyad', '12345', 'Risyad Maulana Daffa', 'customer'),
	(3, 'Rizky', '123', 'Muhammad Rizky Puspojati', 'customer');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

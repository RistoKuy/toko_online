CREATE TABLE `tb_barang` (
  `id_brg` int PRIMARY KEY NOT NULL,
  `nama_brg` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `kategori` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  `gambar` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Sepatu', 'Merk All Star', 'Pakaian Pria', 300000, 10, 'sepatu.jpg'),
(2, 'Smartphone', 'Samsung', 'Elektronik', 2000000, 10, 'hp.jpg'),
(3, 'Kamera', 'Canon', 'Elektronik', 1000000, 12, 'kamera.jpg'),
(4, 'Laptop', 'Asus', 'Elektronik', 4000000, 10, 'laptop.jpg');
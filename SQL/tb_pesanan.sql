CREATE TABLE `tb_pesanan` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_invoice` int NOT NULL,
  `id_brg` int NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int NOT NULL,
  `harga` int NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
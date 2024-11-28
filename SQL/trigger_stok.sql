/*
trigger name: pesanan_penjualan
table name: tb_pesanan
time: AFTER
event: INSERT
action: 
BEGIN
    UPDATE tb_stok SET stok = stok - NEW.jumlah 
    WHERE id_brg = NEW.id_brg;
END
*/

CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN UPDATE tb_barang SET stok = stok - NEW.jumlah WHERE id_brg = NEW.id_brg; END
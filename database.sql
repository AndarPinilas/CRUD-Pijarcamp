create database pijarcamp;
use pijarcamp;

create table produk(
  id  int(11) auto_increment primary key,
  nama_produk varchar(255) not null,
  keterangan varchar(255) not null,
  harga varchar(255) not null,
  jumlah int(100) not null
);
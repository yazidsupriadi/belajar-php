<?php
require_once 'app/init.php';

$produk1= new komik("One piece","oda","oda",30000,100);

$produk2= new game("Mobile Legend","Moonton","Moonton",800000,50);

$cetakProduk = new cetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();
echo "<hr>";


new app\service\user() ;
<?php
//produk
//komik dan game
class Produk{

    public $judul,$penulis,
    $penerbit,$harga;
    //constructor
    public function __construct($judul,$penulis,
    $penerbit,$harga){
        $this->judul=$judul;
        $this->penulis=$penulis;
        $this->penerbit=$penerbit;
        $this->harga=$harga;

    }
    public function sayHello(){
        return "hello world";
    }
    
    public function getLabel(){
    return "$this->judul,
        $this->penerbit";
    }

}
class CetakInfoProduk{
    public function cetak($produk){
        $str ="{$produk->penulis}|{$produk->getLabel()} ({$produk->harga})";
        return $str;
    }
}
$produk1= new Produk("One piece","oda","oda",30000);

echo $produk1->getLabel();
$infoProduk1 = new CetakInfoProduk();
echo $infoProduk1->cetak($produk1);


$produk2= new Produk("Mobile Legend","Moonton","Moonton",0);
echo $produk2->getLabel();

$produk3= new Produk("fifa 2018","fifa",
"fifa",100000);
echo $produk3->getLabel();
?>
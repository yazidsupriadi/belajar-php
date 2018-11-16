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
    return "$this->penulis,$this->penerbit";
    }
    public function getInfoProduk(){
        
        $str="{ $this->judul}| {$this->getLabel()} (Rp.{$this->harga})";
        return $str;

    }

}
class komik extends Produk{
    public $jmlHalaman;
    public function __construct($judul,$penulis,$penerbit,$harga,$jmlHalaman){
        parent ::__construct($judul,$penulis,$penerbit,$harga);
        $this->jmlHalaman=$jmlHalaman;

    }
    public function getInfoProduk(){

        $str="komik : ".parent::getInfoProduk() . " -{$this->jmlHalaman}";
        return $str;

    }

}
//inheritance
class game extends Produk{
    public $waktuMain;
    public function __construct($judul,$penulis,$penerbit,$harga,$waktuMain){
        parent ::__construct($judul,$penulis,$penerbit,$harga);
        $this->waktuMain=$waktuMain;
    }
    public function getInfoProduk(){

        $str="Game :" .parent::getInfoProduk()."-{$this->waktuMain}";
        return $str;

    }
}
//inheritance
class CetakInfoProduk{
    public function cetak($produk){
        $str ="{$produk->penulis}|{$produk->getLabel()} ({$produk->harga})";
        return $str;
    }
}







$produk1= new komik("One piece","oda","oda",30000,100);

echo $produk1->getInfoProduk();
echo "<br>";  

$produk2= new game("Mobile Legend","Moonton","Moonton",NULL,50);
echo $produk2->getInfoProduk();
echo "<br>";
$produk3= new Produk("fifa 2018","fifa","fifa",100000,0,0);
echo $produk3->getLabel();
echo "<br>";
$infoProduk1 = new CetakInfoProduk();
echo $infoProduk1->cetak($produk1);

?>
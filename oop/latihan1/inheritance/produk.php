<?php
//produk
//komik dan game
class Produk{

    public $judul,$penulis,
    $penerbit,$harga,$jmlHalaman,$waktuMain;
    //constructor
    public function __construct($judul,$penulis,
    $penerbit,$harga,$jmlHalaman,$waktuMain){
        $this->judul=$judul;
        $this->penulis=$penulis;
        $this->penerbit=$penerbit;
        $this->harga=$harga;
        $this->jmlHalaman=$jmlHalaman;
        $this->waktuMain=$waktuMain;
    }
    public function sayHello(){
        return "hello world";
    }
    
    public function getLabel(){
    return "$this->penulis,$this->penerbit";
    }
    public function getInfoProduk(){
        
        $str="komik : { $this->judul}| {$this->getLabel()} (Rp.{$this->harga})";
        return $str;

    }

}
class komik extends Produk{
    public function getInfoKomik(){

        $str="komik : { $this->judul}| {$this->getLabel()} (Rp.{$this->harga})-{$this->jmlHalaman}";
        return $str;

    }

}
//inheritance
class game extends Produk{
    public function getInfoGame(){

        $str="Game : { $this->judul}| {$this->getLabel()} (Rp.{$this->harga})-{$this->waktuMain}";
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







$produk1= new komik("One piece","oda","oda",30000,100,0);

echo $produk1->getInfoKomik();
echo "<br>";  

$produk2= new game("Mobile Legend","Moonton","Moonton",0,0,50);
echo $produk2->getInfoGame();
echo "<br>";
$produk3= new Produk("fifa 2018","fifa","fifa",100000,0,0);
echo $produk3->getLabel();
echo "<br>";
$infoProduk1 = new CetakInfoProduk();
echo $infoProduk1->cetak($produk1);

?>
<?php
//produk
//komik dan game
class Produk{

    public $judul,$penulis,
    $penerbit;
    protected $diskon=0;
    private $harga;
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
    
    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon/100);
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
    
    public function setDiskon($diskon){
        $this->diskon=$diskon;
    }
    public function getInfoProduk(){

        $str="Game :" .parent::getInfoProduk()."-{$this->waktuMain}";
        return $str;

    }
}








$produk1= new komik("One piece","oda","oda",30000,100);

echo $produk1->getInfoProduk();
echo "<br>";  

$produk2= new game("Mobile Legend","Moonton","Moonton",800000,50);
echo $produk2->getInfoProduk();
echo "<hr>";
echo $produk2->setDiskon(70);
echo $produk2->getHarga();

?>
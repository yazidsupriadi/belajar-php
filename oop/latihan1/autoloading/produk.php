<?php
//produk
//komik dan game
interface infoProduk{
    
     public function getInfoProduk();
}
abstract class Produk{

    protected $judul,$penulis,
    $penerbit;
    protected $diskon=0;
    protected $harga;
    //constructor
    public function __construct($judul,$penulis,$penerbit,$harga){
        $this->judul=$judul;
        $this->penulis=$penulis;
        $this->penerbit=$penerbit;
        $this->harga=$harga;
    }
    public function sayHello(){
        return "hello world";
    }
    public function setJudul($judul){
    
        $this->judul=$judul;
    }
    public function getJudul(){
        return $this->judul;
    }
    public function setPenulis($penulis){
    
        $this->penulis=$penulis;
    }
    public function getPenulis(){
        return $this->penulis;
    }
    public function setPenerbit($penerbit){
    
        $this->penerbit=$penerbit;
    }
    public function getPenerbit(){
        return $this->penerbit;
    }

    public function getLabel(){
    return "$this->penulis,$this->penerbit";
    }
    
    abstract public function getInfo();

    
    public function setDiskon($diskon){
        $this->diskon=$diskon;
    }
    public function getDiskon(){
        return $this->diskon;
    }
    
    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon/100);
     }

}
class komik extends Produk implements infoProduk{
    public $jmlHalaman;
    public function __construct($judul,$penulis,$penerbit,$harga,$jmlHalaman){
        parent ::__construct($judul,$penulis,$penerbit,$harga);
        $this->jmlHalaman=$jmlHalaman;

    }
    public function getInfo(){
        
        $str="{ $this->judul}| {$this->getLabel()} (Rp.{$this->harga})";
        return $str;

    }
    public function getInfoProduk(){

        $str="komik : ".$this->getInfo() . " -{$this->jmlHalaman}";
        return $str;

    }

}
//inheritance
class game extends Produk implements infoProduk{
    public $waktuMain;
    public function __construct($judul,$penulis,$penerbit,$harga,$waktuMain){
        parent ::__construct($judul,$penulis,$penerbit,$harga);
        $this->waktuMain=$waktuMain;
    }
    public function getInfo(){
        
        $str="{ $this->judul}| {$this->getLabel()} (Rp.{$this->harga})";
        return $str;

    }
    public function getInfoProduk(){

        $str="Game :" .$this->getInfo() . "-{$this->waktuMain}";
        return $str;

    }
    
}


class cetakInfoProduk{
    public $daftarProduk=array();

    public function tambahProduk(Produk $produk){
        $this->daftarProduk[]=$produk;
    }
    public function cetak(){
        $str="Daftar produk : <br>";
        foreach($this->daftarProduk as $p){
            $str .=" -{$p->getInfoProduk()}<br>";
        }
        return $str;

    }
}





$produk1= new komik("One piece","oda","oda",30000,100);

$produk2= new game("Mobile Legend","Moonton","Moonton",800000,50);

$cetakProduk = new cetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();
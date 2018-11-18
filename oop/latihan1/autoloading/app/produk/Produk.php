<?php
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
?>
<?php
//koneksi ke dbms
require 'fungsi.php';
$link=mysqli_connect("localhost","root","","phpdasar");

//cek
if(isset($_POST["submit"])){
    //ambil data dari form
    if(tambah($_POST)>0){
     echo   "<script>
    alert('data berhasil ditambah!');
    document.location.href ='index.php';
    </script> ";

    }else{
      echo  "<script>
    alert('data gagal ditambah!');
    document.location.href ='index.php';
    </script> ";

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tambah</title>
</head>
<body>
    <h1>Tambah</h1>
    <form action="" method="post">
    <ul>
    
    <li>
    <label for="nama"> nama =</label>
    <input type="text" name="nama" id="nama">
    </li>
    <li>
    <label for="nim"> Nim =</label>
    <input type="text" name="nim" id="name">
    </li>
    <li>
    <label for="email"> email =</label>
    <input type="email" name="email" id="email"></li>
    </li>
    <label for="jurusan"> jurusan =</label>
    <input type="text" name="jurusan" id="jurusan"></li>
    <li>
    <label for="gambar"> gambar =</label>
    <input type="text" name="gambar" id="gamber"></li>
    </li>
    <button type="submit" name="submit">Tambah</button>
    
    </ul>
    
    
    
    </form>
</body>
</html>
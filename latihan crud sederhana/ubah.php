<?php
//koneksi ke dbms
require 'fungsi.php';
$link=mysqli_connect("localhost","root","","phpdasar");
$id = $_GET["id"];

//query ubah
$mahasiswa=mysqli_query($link,"SELECT * FROM mahasiswa WHERE id =$id");


//cek
if(isset($_POST["submit"])){
    //ambil data dari form
    if(ubah($_POST)>0){
     echo   "<script>
    alert('data berhasil diubah!');
    document.location.href ='index.php';
    </script> ";

    }else{
      echo  "<script>
    alert('data gagal diubah!');
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
    <title>ubah</title>
</head>
<body>
    <h1>ubah</h1>
    <form action="" method="post">
    <input type="hidden" name="id"value="<?=$mhs["id"];?>">
    <ul>
    
    <li>
    <label for="nama"> nama =</label>
    <input type="text" name="nama" id="nama" value="<?=$mhs["nama"];?>">
    </li>
    <li>
    <label for="nim"> Nim =</label>
    <input type="text" name="nim" id="name"value="<?=$mhs["nim"];?>">
    </li>
    <li>
    <label for="email"> email =</label>
    <input type="email" name="email" id="email" value="<?=$mhs["email"];?>"></li>
    </li>
    <label for="jurusan"> jurusan =</label>
    <input type="text" name="jurusan" id="jurusan" value="<?=$mhs["jurusan"];?>"></li>
    <li>
    <label for="gambar"> gambar =</label>
    <input type="text" name="gambar" id="gambar"value="<?=$mhs["gambar"];?>"></li>
    </li>
    <button type="submit" name="submit">Ubah</button>
    
    </ul>
    
    
    
    </form>
</body>
</html>
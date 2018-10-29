<?php
session_start();
if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
require 'fungsi.php';
//pagination
//konfigurasi
$jumlahPerhalaman=4;
$jumlahData=count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman=round($jumlahData/$jumlahPerhalaman);
$halamanAktif=(isset($_GET["halaman"]))?$_GET["halaman"]:1;
$awalData=($jumlahPerhalaman*$halamanAktif)-$jumlahPerhalaman;
$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData,$jumlahPerhalaman");

if(isset($_POST["cari"])){
    $mahasiswa=cari($_POST["keyword"]);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>halaman admin</title>
</head>
<body >

<a href="logout.php">Logout</a>
    <h2 style=" text-align:center;">Daftar mahasiswa</h2>
    <div style=" text-align:center;">
    <form action="" method="post">
    <input type="text" name="keyword" placeholder="silahkan cari.." autocompleted>
    <button type="submit" name="cari">Cari</button>
    </form>
    <br><br>
    <!--nav-->
    <?php for($i=1;$i<=$jumlahHalaman;$i++):?>
    <a href="?halaman<?=$i?>"><?= $i;?></a>
    <?php endfor;?>

    <table border align="center" border="1" cellpadding="10" cellspacing="0" style=" text-align:center;">
    <tr>
    <th>No.</th>
  
    <th>Aksi</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Nim</th>
    <th>Email</th>
    <th>Jurusan</th>
    </tr>
    <?php $i=1; ?>
    <?php foreach($mahasiswa as $row):?>
    <tr>
    <td><?=$i ?></td>
    <td>
    <a href="ubah.php?id=<?=$row["id"];?>" onclick="return confirm('yakin');">Change</a>
    <a href="hapus.php?id=<?=$row["id"];?>" onclick="return confirm('yakin');">Delete</a>
    </td>
    <td><img src="img/<?=$row["gambar"];?>" alt="gamber"width="50px" height="50px"></td>
    <td><?=$row["nama"];?></td>
    <td><?=$row["nim"];?></td>
    <td><?=$row["email"];?></td>
    <td><?=$row["jurusan"];?></td>
    
    </tr>
<?= $i++?>
<?php endforeach;?>
    </table>

    <a href="tambah.php">Add</a>
    </div>
</body>
</html>
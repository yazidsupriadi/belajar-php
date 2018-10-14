<?php
//menyambungkan database
//caranya (host,user,password,namadatabase)
/*$link=mysqli_connect('localhost','root','','sekolah');

//menguji error
if(!$link){
    die('ada error'.mysqli_connect_error());
}
$query="CREATE DATABASE aw";
if(mysqli_query($link,$query)){
    echo "berhasil";
}else{
    echo "gagal!";
}
*/
$link=mysqli_connect('localhost','root','','sekolah');
/*$query="SELECT * FROM murid";
$hasil=mysqli_query($link,$query);
if(mysqli_num_rows($hasil)>0){
    while($data=mysqli_fetch_assoc($hasil)){
        echo $data['nama'];
    }
}
//filter where, orderby ,limit
*/
$query="INSERT INTO murid(nama,nis,alamat,jurusan,no_telp)
        values ('fulan',090909,'selatan','ti','0901910')";
if(mysqli_query($link,$query)){
   echo "berhasil";
}
//menutup koneksi
mysqli_close($link);

?>
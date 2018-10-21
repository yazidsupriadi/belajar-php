<?php

//koneksi
$link=mysqli_connect("localhost","root","","phpdasar");
$result=mysqli_query($link,"SELECT * FROM mahasiswa");
//mysqli_fetch_row()  --mengembailikan array numerik
//mysqli_fetch_assoc() -- mengembalikan array assosiative
//mysqli_fetch_array() -- mengembalikan keduanya
//mysqli_fetch_object()
function query($query){
    global $link;
    $result=mysqli_query($link,$query);
    $rows=[];
    while($row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
}
function tambah($data){
    global $link;
    $nim= htmlspecialchars($data["nim"]);
    
    $nama= htmlspecialchars($data["nama"]);
    $email= htmlspecialchars($data["email"]);
    $jurusan=htmlspecialchars($data["jurusan"]);
    $gambar= htmlspecialchars($data["gambar"]);

     //query insert
     $insert ="INSERT INTO mahasiswa
      VALUES
    ('','$nama','$nim','$email','$jurusan','$gambar')";
     mysqli_query($link,$insert);
 return mysqli_affected_rows($link);
 
}
function hapus($id){
    global $link;
    mysqli_query($link,"DELETE FROM mahasiswa WHERE id =$id");
    return mysqli_affected_rows($link);
}

function ubah($data){
    $id=$data["id"];
    global $link;
    $nim= htmlspecialchars($data["nim"]);
    
    $nama= htmlspecialchars($data["nama"]);
    $email= htmlspecialchars($data["email"]);
    $jurusan=htmlspecialchars($data["jurusan"]);
    $gambar= htmlspecialchars($data["gambar"]);

     //query insert
     $insert ="UPDATE  mahasiswa SET
                nama='$nama',
                nim='$nim',            
                email='$email',                
                jurusan='$jurusan',
                gambar='$gambar'
                WHERE id=$id;
     ";
     mysqli_query($link,$insert);
 return mysqli_affected_rows($link);
 

}

function cari($keyword){
    $query = "SELECT * FROM mahasiswa WHERE
    nama LIKE '%$keyword%'
    OR nim LIKE '%$keyword%'
    OR email LIKE '%$keyword%'
    OR jurusan LIKE '%$keyword%'
    ";
    return query($query);
}
?>
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
    $gambar= upload();
    if(!$gambar){
        return false;
    }
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

function upload(){

    $namaFile=$_FILES['gambar']['name'];
    $ukuranFile=$_FILES['gambar']['size'];
    $error=$_FILES['gambar']['name'];
    $tmp_name=$_FILES['gambar']['tmp_name'];

    if($error === 4){
        echo "<script>
        alert('pilih dulu');
        </script>  ";
        return false;
    }

    //cek gambar atau bukan
    $ekstensiValid=['jpg','jpeg','png'];
    $ekstensiGambar=explode('.',$namaFile);
    $ekstensiGambar=strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar,$ekstensiValid)){
        echo "<script>
        alert('yang di upload bukan gambar');
        </script>  ";
        return false;
    }
    if($ukuranFile>1000000){
        echo "<script>
        alert('yang di upload bukan gambar');
        </script>  ";
        return false;
    }
    move_uploaded_file($tmp_name,'img/'.$namaFileBaru);
    return $namaFileBaru;

    //generate nama gambar baru
    $namaFileBaru=uniqid();
    $namaFileBaru .='.';
    $namaFileBaru=$ekstensiGambar;
    
    
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

function register($data){
    global $link;
    $username = strtolower(stripslashes($data["username"]));
    $password=mysqli_real_escape_string($link,$data["password"]);
    $password2=mysqli_real_escape_string($link,$data["password2"]);
    //cek username
    $row=mysqli_query($link,"SELECT username FROM user WHERE username='$username'");
    if(mysqli_fetch_assoc($row)){
        echo "<script>
        alert('yang dikonfirmasi salah');
        </script> " ;
        return false;
    }
    //cek konfirm password
    if($password !== $password2){
        echo "<script>
        alert('yang dikonfirmasi salah');
        </script> " ;
        return false;
    }
    //enkripsi password
    $password=password_hash($password,PASSWORD_DEFAULT);
    //tambah user ke database
    mysqli_query($link,"INSERT INTO user VALUES('','$username','$password')");
    return mysqli_affected_rows($link);
}
?>
<main>
<h2>Explode implode</h2>
<?php
$pekerjaan =["programmer","desainer","manager"];
echo implode(",",$pekerjaan);
$pelajaran ="html css js ";
print_r(explode(" ",$pelajaran));
?>
<h2>Fungsi Date</h2>
<?php
echo date('D,d-M-Y');

?>

<!--belajar bikin login-->
<h2>GET AND POST<h2>
<form action="index.php" method="post" value>
<input type="text" name ='nama'>

<input type="password" name ='password'>
<input type="submit" name ="submit">
</form>
<br>
<?php

$user  = 'yazid';
$password = '123';
if(isset($_POST['submit'])){
    if($_POST['nama']==$user && $_POST['password']==$password){
     //cookie
     //setcookie(key,nilai,expire)
    setcookie("nama_user",$_POST['nama'],time()+120); 
    header('location: profile.php');
    }else{
        echo "login gagal";
    }
}else{
    echo "gak ada";
}

?>
<br>
<h2>Cara upload<h2>
<form action="index.php"method="post" enctype="multipart/form-data">
    <input type="file"name="gambar">
    <input type="submit"name="submit"value="upload">
    
</form>
<?php
if(isset($_POST['submit'])){
    
    $time = time();
    $nama =$_FILES['gambar']['name'];
    $lok =$_FILES['gambar']['tmp_name'];
    $error =$_FILES['gambar']['error'];
    $size =$_FILES['gambar']['size'];
    $format =$_FILES['gambar']['type'];
    $namafile ='upload/'.$nama;
    if($error==0){
        if($size<1000000){
            if($format=='image/jpeg'){    
            if(file_exists($namafile)){
                $namafile =str_replace(".jpg","",$namafile);
                $namafile =$namafile."_".$time.".jpg";
                
            }
            
                //mengupload

            move_uploaded_file($lok,'upload/'.$nama);
    
            }else{
                echo "formatnya kegedean";
            }
        }else{
            echo "gambarnya kegedean";
        }
    }

}
?>


</main>
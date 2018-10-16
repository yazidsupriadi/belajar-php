<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    
    $subject = $_POST['subject'];
    
    $pesan = $_POST['pesan'];
    die($email.' '.$subject.' '.$pesan);
    //mail(to,subjek,message)
    if(mail($email,$subject,$pesan)){
        echo "email berhasil terkirim";
    }else{
        echo "email tidak terkirim";

    }
}

?>
<form action="email.php" method="post">
<input type="email" name="email" placeholder="email">

<input type="subject" name="subject" placeholder="subjek">
<textarea name="pesan"  cols="30" rows="8"></textarea>
<input type="submit" name="submit" value="kirim email">
</form>

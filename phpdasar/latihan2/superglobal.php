<?php
//super global
if(isset($_POST['submit'])){
    if($_POST["username"]=="admin" 
    && $_POST["password"]==123){
        header("Location : login.php");
        exit;
    }else{
        $error=true;
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POST</title>
</head>
<body>
<?php  if(isset($error)):?>
<p>Password salah</p>
<?php   endif;?>
<form action="login.php" method="post">
    <br>
    <label for="">Username</label>
    <input type="text" name="username">
    <br>
    <label for="">Password</label>
    <input type="password" name="password">
    <input type="submit" name="submit">


</form>    
</body>
</html>
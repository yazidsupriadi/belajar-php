<?php

session_start();

if(isset($_COOKIE['login'])){
    if($_COOKIE['login']=='true'){
        $_SESSION['login']=true;
    }
}

if(isset($_SESSION["login"])){
    header("location: index.php");
    exit;
}
require 'fungsi.php';
if(isset($_POST["login"])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $result = mysqli_query($link,"SELECT * from user WHERE username='$username'");

    //cek username
    if(mysqli_num_rows($result)===1){

        //cek password
        $row=mysqli_fetch_assoc($result);
        if(password_verify($password,$row["password"])){
            //set session
            $_SESSION["login"]=true;

            //cek cookie
            if(isset($_POST['remember'])){
                //bust cookie
                setcookie('login','true',time()+60);
            }
            header("location: index.php");
            exit;
        }
    }    
    $error=true;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>
</head>
<body>
    <h1>Halaman Login</h1>
    <?php if(isset($error)):?>
    <p>username/password salah</p>
    <?php endif;?>
    <form action="" method="post">
    <ul>
    
    <li>
    <label for="username">username :</label>
    <input type="text"name="username">
    </li>
     
    <li>
    <label for="password">password :</label>
    <input type="password"name="password">
    </li>
    <li>
    <label for="remember">Remember Me</label>
    <input type="checkbox" name="remember" id="remember">
    </li>
    
    
    <button type="submit" name="login">Login here</button>
    </ul>
    
    
    </form>
</body>
</html>
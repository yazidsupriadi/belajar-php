<?php
require 'fungsi.php'; 
if (isset($_POST["register"])){
    if(register($_POST)>0){
        echo "berhasil ditambah";
    }else{
        echo mysqli_error($link);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>

    label{
        display:block;
    }
    
    </style>
</head>
<body>
    <h1>registrasi</h1>
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
    <label for="password2">retype password :</label>
    <input type="password"name="password2">
    </li>
    <button type="submit" name="register">register here</button>
    </ul>
    
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN - SMK Taruna Bangsa</title>
    <style>
        html, body{
            width: 100%
        }
        .login-container{
            width: 350px;
            margin: auto;
            border: solid 1px;
            padding: 25px;
            background: lightblue;
        }
        .title{
            text-align: center;
        }
        .input-label{
            width: 200px;
            display: block;
        }
        .input{
            padding: 5px 0px;
        }
        .input{
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="title">
            <h1>LOGIN USER</h1>
        </div>
        <form action="" method="post">
            <div class="input">
                <label for="username" class="input-label">Nama Pengguna</label>
                <input type="text" id="username" name="username" placeholder="Nama Pengguna">
            </div>
            <div class="input">
                <label for="password" class="input-label">Kata Sandi</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="input">
                <center><button type="submit" class="button" name="login">LOGIN</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php

include('koneksi.php');

// $username = "joko";
// $password = "1234";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM user 
    WHERE username = '$username' && password = '$password'");

    // if ($user == $_POST['username'] && $katasandi == $_POST['password']){
        if (mysqli_num_rows($query)>0) {
        header('location:sukses.php');
    }else{
        ?>
            <script>
                alert("username / password salah !!!")
            </script>
        <?php
    }
}
?>
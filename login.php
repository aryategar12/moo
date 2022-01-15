<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - SMK Taruna Bangsa</title>
</head>
<style> html, body {
    width:100%;
}
.login-container{
    width:350px;
    margin:100px auto auto auto;
    border:solid 1px;
    padding: 25px;
    background: skyblue;
    box-shadow: 15px 5px 10px rgba(0,0,0,9);
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
input{
    width:100%;
    color:black;
}
</style>
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
                <button type="submit" class="button" name="login">LOGIN</button>
                </div>
            </form>
        </div>
<?php
include('koneksi.php');


    if(isset($_POST['login'])){
    $username  = $_POST['username'];
    $password  = $_POST['password'];

    $querry = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' && password = '$password'");
    // if($username == $_POST['username'] && $password == $_POST['password']){
        if (mysqli_num_rows($querry)>0){
        header('location:sukses.php');
    }else {
        ?>
        <script>
        alert("Username/Password salah")
        </script>
        <?php
    }
}



?>

    
</body>
</html>

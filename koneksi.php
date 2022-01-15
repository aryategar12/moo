<?php

$server   = "localhost";
$username = "root";
$password = "";
$db  = "06_aryamywebsite_12rpl2";

$konek = mysqli_connect($server,$username,$password,$db);

if (!$konek){
    die("koneksi gagal<br>".mysqli_connect_error()."<br>".mysqli_connect_errno());
}
// else{
//     echo "koneksi berhasil";
// }


?>
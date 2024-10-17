<?php
session_start();
require('dbconfig.php');
$username=$_POST['username'];
$password=$_POST['password'];

if($username == "" || $password == ""){
    header("location:login.php?pesan=gagal");
exit;
}

$password_new = sha1($password);

$data = mysqli_query($mysqli,"select * from admin where username='$username' and password='$password_new'");
$cek = mysqli_num_rows($data);
if($cek > 0){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:index.php");
}else{
    header("location:login.php?pesan=tidak_cocok");
}
?>
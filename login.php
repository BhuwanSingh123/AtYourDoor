<?php
include('database.php');
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

if(isset($_POST['submit']) && !empty($email) && !empty($password)){
    $sql = "SELECT email, password from users where email= '$email' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if($count){
        header("location: products.html");
    }else{
        echo '<script>';
        echo 'alert("Login Unsuccessful")';
        echo '</script>';
        header("location: register.html");
    }
}
?>
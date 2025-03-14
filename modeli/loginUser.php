<?php


function loginUser($username, $password)
{
    if (!isset ($_POST["email"]) || empty($_POST["email"])) {
        die ("Niste uneli korisničko ime");
    }
    if (!isset ($_POST["passwordUser"]) || empty($_POST["passwordUser"])) {
        die ("Niste uneli lozinku ");
    }
    $email = $_POST['email'];
    $passwordAdd = $_POST['passwordUser'];
    require_once "base.php";
    require_once "session_start.php";
    $result = $base->query("SELECT * FROM korisnici WHERE email = '$email'");
    if ($result->num_rows == 1) {
        $addUser = $result->fetch_assoc();

        $passwordVerified = password_verify($passwordAdd, $addUser['sifra']);
        if ($passwordVerified == true) {
            $_SESSION['email'] = $email;
            $_SESSION['passwordUser'] = $passwordAdd;
            $_SESSION['user_id'] = $addUser['id'];
            $_SESSION['log'] = true;
            echo "<script> alert ('Uspesno ste se prijavili'); 
            window.location.href = '../index.php';</script>";
        } else {
            echo "<script> alert ('Pogresna lozinka'); 
            window.location.href = '../index.php';</script>";
        }
    } else {
        echo "<script> alert ('Korisnik ne postoji');
            window.location.href = '../index.php';</script>";

    }
}
loginUser($_POST["email"], $_POST["passwordUser"]);




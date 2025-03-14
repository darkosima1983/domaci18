<?php

function registerUser($username,$password)
{
    if ( !isset ($_POST["email"]) || empty($_POST["email"]))
    {
        die ("Niste uneli korisničko ime");
    }
    if ( !isset ($_POST["passwordUser"]) || empty($_POST["passwordUser"]))
    {
        die ("Niste uneli lozinku ");

    }
    $password = password_hash($password, PASSWORD_BCRYPT);
    require_once "base.php";
    $result = $base -> query ("SELECT * FROM korisnici WHERE email= '$username'");

    if ($result -> num_rows >= 1)
    {
        echo "<script> alert ('Korisnik vec postoji'); 
                    window.location.href = '../register.php';</script>";

    }
    else
    {
        $base-> query  ("INSERT INTO korisnici (email, sifra) VALUES ('$username','$password')");
        echo "<script> alert ('Uspesno ste se registrovali'); 
                    window.location.href = '../index.php';</script>";


    }
}
registerUser($_POST["email"],$_POST["passwordUser"]);
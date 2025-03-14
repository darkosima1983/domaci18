<?php

    function  productAdd( $productName, $productDescription, $productPrice, $productQuantity )
    {

        require_once "base.php";
        if ( !isset ($_POST["ime"]) || empty($_POST["ime"]))
        {
            die ("Niste uneli ime proizvoda");
        }
        if ( !isset ($_POST["opis"]) || empty($_POST["opis"]))
        {
            die ("Niste uneli opis proizvoda ");
        }
        if ( !isset ($_POST["cena"]) || empty($_POST["cena"]))
        {
            die ("Niste uneli cenu proizvoda");
        }

        if ( !isset ($_POST["kolicina"]) || empty($_POST["kolicina"]))
        {
            die ("Niste uneli kolicinu proizvoda ");
        }
        $productName = $base->real_escape_string($productName);
        $productDescription = $base->real_escape_string($productDescription);
        $productPrice = $base->real_escape_string($productPrice);
        $productQuantity = $base->real_escape_string($productQuantity);

        $query = "INSERT INTO proizvodi (ime, opis, cena, kolicina) VALUES ('$productName','$productDescription','$productPrice','$productQuantity')";

        $base-> query ($query);

        echo "<script> alert ('Uspesno ste se uneli proizvod'); 
               window.location.href = '../index.php';</script>";


    }
    productAdd($_POST ["ime"], $_POST ["opis"],$_POST["cena"], $_POST ["kolicina"] );
?>

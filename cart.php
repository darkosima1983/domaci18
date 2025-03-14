<?php
require_once "modeli/session_start.php";
if (!isset ($_POST['id_']) || empty ($_POST['id_']))
{
    die ("Morate uneti id proizvoda");
}
if (!isset ($_POST['kolicina']) || empty ($_POST['kolicina']))
{
    die ("Morate uneti kolicinu");
}
require_once "modeli/base.php";

$idProduct = $_POST['id_proizvoda'];
$quantity= $_POST['kolicina'];
$idUser = $_SESSION['user_id'];
$result = $base-> query ("SELECT cena FROM proizvodi WHERE id = '$idProizvoda'");

$rowBase = $result-> fetch_assoc(); // ["cena"]=> "1199.99"
$price = $rowBase['cena'];
$price = $price * $quantity; // 10* 1999.99 = 19999.9

$idProduct = $basese->real_escape_string($idProizvoda); // MYSQL Injection - zastita
$quantity =  $basese->real_escape_string($kolicina);
$price =  $basese->real_escape_string($cena);
$idUser =  $basese->real_escape_string($idKorisnika);
$query = "INSERT INTO narudzbine (id_proizvoda, id_korisnika, cena, kolicina) VALUES ('$idProduct','$idUser','$price','$quantity')";

$basese-> query ($query);
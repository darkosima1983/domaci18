<?php
require_once "modeli/session_start.php";

require_once "modeli/base.php";

if (!isset ($_SESSION['user_id']) || empty ($_SESSION['user_id']))
{
    die ("Morate se ulogovati");
}
$idUser = $_SESSION['user_id'];
$result = $base->query("SELECT narudzbine.kolicina, narudzbine.cena, proizvodi.ime 
FROM narudzbine 
INNER JOIN proizvodi ON proizvodi.id = narudzbine.id_proizvoda
WHERE narudzbine.id_korisnika = $idUser
");

$orders = $result -> fetch_all(MYSQLI_ASSOC);


?>


<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobi Net - Korpa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            text-align: center;
            margin: 0;
            padding: 20px;
        }

        .product-card {
            background-color: #6ec1e4;
            padding: 20px;
            border-radius: 10px;
            max-width: 350px;
            margin: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .product-card h1 {
            font-size: 22px;
            color: black;
        }

        .product-card p {
            font-size: 16px;
            color: black;
            margin: 5px 0;
        }

        .stock {
            background-color: #008cdd;
            color: white;
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 5px;
            display: inline-block;
            margin: 10px 0;
        }

        .quantity-label {
            font-size: 16px;
            font-weight: bold;
            color: black;
            display: block;
            margin-bottom: 5px;
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .add-to-cart-btn {
            background-color: #4a4a4a;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            display: block;
            width: 100%;
        }

        .add-to-cart-btn:hover {
            background-color: #333;
        }
    </style>
</head>
<body>

<h1>Mobi Net</h1>

<div class="product-card">
    <?php if($result->num_rows == 0): ?>
    <p>Nemate nijedan proizvod u korpi!</p>
    <?php else: ?>
    <?php foreach ($orders as $order) :?>
    <h1><?= $order['ime'] ?> </h1>
    <p><strong>Cena:</strong> <?= $order['cena'] ?> RSD</p>
    <p><strong>Kolicina:</strong> <?= $order['kolicina'] ?></p>
    <?php endforeach;?>
</div>
<?php endif; ?>

</body>
</html>


